<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Corporation;
use Carbon\Carbon;

class CorporationController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.corporation';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporation_id = Corporation::where([
            ['has_sub', '!=', 2],
            ['bahasa', 'id']
        ])->orderBy('urutan')->get();
        $corporation_en = Corporation::where([
            ['has_sub', '!=', 2],
            ['bahasa', 'en']
        ])->orderBy('urutan')->get();

        return view($this->view.'.'.__FUNCTION__, compact('corporation_id', 'corporation_en'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $corporation = [];
        $corporationId = Corporation::pluck('nama', 'id');
        $parentCorporation = Corporation::where('has_sub', 1)->pluck('nama', 'id');

        return view($this->view.'.'.__FUNCTION__, compact('corporation', 'corporationId', 'parentCorporation'));
    }

    public function parentCorporation(){
        return Corporation::where('has_sub', 1)->get()->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            // 'bahasa' => 'required',
        ]);
        $corporation = new Corporation($request->except('_method', '_token'));
        if ($request->has_sub != 2) {
            $corporation->urutan = Corporation::where('bahasa', $request->bahasa)->pluck('urutan')->max() + 1;
        }

        $corporation->save();

        return redirect()->route('corporation.index')
            ->with('success','Data Corporation baru berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corporation = Corporation::find($id);
        $corporationId = Corporation::where('has_sub', 1)->pluck('nama', 'id');
        $parentCorporation = Corporation::where('has_sub', 1)->pluck('nama', 'id');
        
        return view($this->view.'.'.__FUNCTION__, compact('corporation', 'corporationId', 'parentCorporation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            // 'bahasa' => 'required',
        ]);
        $corporation = Corporation::find($id);
        $corporation->fill($request->except('_method','_token'));
        $corporation->save();

        return redirect()->route('corporation.index')
            ->with('success','Data Corporation berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Corporation::find($id)->delete();

        return redirect()->route('corporation.index')
                ->with('success', 'Data Corporation berhasil dihapus');
    }
    
    public function status($id, $status)
    {
        // dd($id, $status);
        $corporation = Corporation::find($id);
        
        switch ($status) {
            case 'draft':
                $status = 0;
                break;
            case 'publish':
                $status = 1;
                $corporation->published_at = Carbon::now();
                break;
            case 'archive':
                $status = 2;
                break;
        }

        $corporation->status = $status;
        $corporation->save();

        return response()->json([
            'status' => 'Update Status Corporation Sukses'
        ]);
    }

    public function urutan($id, $action)
    {
        $corporation1 = Corporation::find($id);
        $urutan1 = $corporation1->urutan;

        if ($action == 'up') {
            $corporation2 = Corporation::where([
                ['urutan', $urutan1-1],
                ['bahasa', $corporation1->bahasa]
            ])->first();
        }
        else if ($action == 'down'){
            $corporation2 = Corporation::where([
                ['urutan', $urutan1+1],
                ['bahasa', $corporation1->bahasa]
            ])->first();
        }

        $urutan2 = $corporation2->urutan;

        $corporation1->urutan = $urutan2;
        $corporation2->urutan = $urutan1;

        $corporation1->save();
        $corporation2->save();

        return response()->json([
            'status' => 'Update Urutan Corporation Sukses'
        ]);
    }

    public function urutanChild($id, $action){
        $corporation1 = Corporation::findOrFail($id);
        if ($action == 'up') {
            $corporation2 = Corporation::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        elseif ($action == 'down') {
            $corporation2 = Corporation::where('id', '>', $id)->first();
        }

        $corporation1->id = $corporation2->id;
        $corporation2->id = 4294967295;
        $corporation2->save();
        $corporation1->save();

        $corporation2->id = $id;
        $corporation2->save();
        


        return response()->json([
            'status' => 'Update Urutan Corporation Sukses'
        ]);
    }
}
