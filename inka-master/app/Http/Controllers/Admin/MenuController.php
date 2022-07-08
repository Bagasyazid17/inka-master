<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Menu;

class MenuController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.menu';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_id = Menu::where('bahasa','id')->orderBy('urutan')->get();
        $menu_en = Menu::where('bahasa','en')->orderBy('urutan')->get();

        return view($this->view.'.'.__FUNCTION__, compact('menu_id', 'menu_en'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = [];

        return view($this->view.'.'.__FUNCTION__, compact('menu'));
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
            'bahasa' => 'required|max:255',
        ]);
        $menu = new Menu($request->except('_method', '_token'));
        $menu->urutan = Menu::where('bahasa', $request->bahasa)->pluck('urutan')->max() + 1;

        $menu->save();

        return redirect()->route('menu.index')
            ->with('success','Data Menu baru berhasil ditambahkan');
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
        $menu = Menu::find($id);

        return view($this->view.'.'.__FUNCTION__, compact('menu'));
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
            'bahasa' => 'required|max:255',
        ]);
        $menu = Menu::find($id);
        $menu->fill($request->except('_method','_token'));
        $menu->save();

        return redirect()->route('menu.index')
            ->with('success','Data Menu berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();

        return redirect()->route('menu.index')
                ->with('success', 'Data Menu berhasil dihapus');
    }

    public function urutan($id, $action)
    {
        $menu1 = Menu::find($id);
        $urutan1 = $menu1->urutan;

        if ($action == 'up') {
            $menu2 = Menu::where([
                ['urutan', $urutan1-1],
                ['bahasa', $menu1->bahasa]
            ])->first();
        }
        else if ($action == 'down'){
            $menu2 = Menu::where([
                ['urutan', $urutan1+1],
                ['bahasa', $menu1->bahasa]
            ])->first();
        }

        $urutan2 = $menu2->urutan;

        $menu1->urutan = $urutan2;
        $menu2->urutan = $urutan1;

        $menu1->save();
        $menu2->save();

        return response()->json([
            'status' => 'Update Urutan Menu Sukses'
        ]);
    }

    public function status($id, $status)
    {
        $menu = Menu::find($id);
        
        switch ($status) {
            case 'draft':
                $status = 0;
                break;
            case 'publish':
                $status = 1;
                $menu->published_at = Carbon::now();
                break;
            case 'archive':
                $status = 2;
                break;
        }

        $menu->status = $status;
        $menu->save();

        return response()->json([
            'status' => 'Update Status Procurement Sukses'
        ]);
    }
}
