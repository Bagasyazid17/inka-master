<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SubTopik;
use App\Topik;
use App\UserHasSubTopik;

class SubTopikController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.sub_topik';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($topikId)
    {
        $subTopik = SubTopik::where('topik_id', $topikId)->get();
        $topik = Topik::find($topikId);
     
        return view($this->view.'.'.__FUNCTION__, compact('subTopik', 'topik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($topikId)
    {
        $subTopik = [];
        $topik = Topik::find($topikId);

        return view($this->view.'.'.__FUNCTION__, compact('subTopik', 'topik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $topikId)
    {
        $this->validate($request, [
            'nama_id' => 'required|max:255',
            'nama_en' => 'required|max:255',
            'email' => 'nullable|email|max:255',
        ]);
        $subTopik = new SubTopik($request->except('_method', '_token'));
        $subTopik->topik_id = $topikId;
        $subTopik->save();

        return redirect()->route('sub-topik.index', $topikId)
            ->with('success','Data Sub Topik baru berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($topikId, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($topikId, $id)
    {
        $subTopik = SubTopik::find($id);
        $topik = Topik::find($topikId);
        
        return view($this->view.'.'.__FUNCTION__, compact('subTopik', 'topik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $topikId, $id)
    {
        $this->validate($request, [
            'nama_id' => 'required|max:255',
            'nama_en' => 'required|max:255',
            'email' => 'nullable|email|max:255',
        ]);
        $subTopik = SubTopik::find($id);
        $subTopik->fill($request->except('_method','_token'));
        $subTopik->save();

        return redirect()->route('sub-topik.index', $topikId)
            ->with('success','Data Sub Topik berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($topikId, $id)
    {
        UserHasSubTopik::where('sub_topik_id', $id)->delete();
        SubTopik::find($id)->delete();

        return redirect()->route('sub-topik.index', $topikId)
                ->with('success', 'Data Sub Topik berhasil dihapus');
    }
}
