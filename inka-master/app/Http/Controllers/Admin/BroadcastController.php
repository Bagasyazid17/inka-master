<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Broadcast;

class BroadcastController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.broadcast';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $broadcast = Broadcast::all();

        return view($this->view.'.'.__FUNCTION__, compact('broadcast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $broadcast = [];

        return view($this->view.'.'.__FUNCTION__, compact('broadcast'));
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
            'judul' => 'required|max:255',
            'content' => 'required'
        ]);

        $broadcast = new Broadcast($request->except('_method', '_token'));
        $broadcast->save();

        return redirect()->route('broadcast.index')
            ->with('success','Data Broadcast baru berhasil ditambahkan');
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
        $broadcast = Broadcast::find($id);
        
        return view($this->view.'.'.__FUNCTION__, compact('broadcast'));
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
            'judul' => 'required|max:255',
            'content' => 'required'
        ]);

        $broadcast = Broadcast::find($id);
        $broadcast->fill($request->except('_method','_token'))->save();

        return redirect()->route('broadcast.index')
            ->with('success','Data Broadcast berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Broadcast::find($id)->delete();
        
        return redirect()->route('broadcast.index')
                ->with('success', 'Data Broadcast berhasil dihapus');
    }
}
