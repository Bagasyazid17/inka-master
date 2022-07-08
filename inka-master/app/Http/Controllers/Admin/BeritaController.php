<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Berita;
use Carbon\Carbon;
use File;

class BeritaController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.berita';

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $berita = new Berita();
        if($request->year){
            $berita = $berita->whereYear('created_at', '=', $request->year);
        }
        if ($request->month) {
            $berita = $berita->whereMonth('created_at', '=', $request->month);
        }
        $berita = $berita->get();

        $list = Berita::select('created_at')->groupBy('created_at')->get();
        $year = [];
        for ($i=0; $i < sizeof($list); $i++) { 
            $value = new Carbon($list[$i]->created_at);
            $value = $value->year;
            $year[$value] = $value;
        }

        $month = [1 => 'Januari',
                2 => 'Pebruari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember',
                ];

        return view($this->view.'.'.__FUNCTION__, compact('berita', 'year', 'month'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $berita = [];

        // __FUNCTION__ = create
        return view($this->view.'.'.__FUNCTION__, compact('berita'));
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
            'content' => 'required',
            'thumbnail' => 'required',
            'content_index' => 'required'
        ]);
        
        $berita = new Berita($request->except('_method', '_token'));
        
        // $judul  = preg_replace('/[^a-zA-Z0-9\-\._\/\\\\]/','', $request->judul);
        // $ext    = $request->file('thumbnail')->getClientOriginalExtension();
        // $name   = Carbon::now()->format('Ymd-His').'-'.$judul.'.'.$ext;
        // $path   = '/images/berita/';

        // $request->file('thumbnail')->move(public_path($path), $name);
        // $berita->thumbnail = $path.$name;
        if ($request->tanggal) {
            $berita->created_at = $request->tanggal;
        }
        $berita->status = 0;
        $berita->save();

        return redirect()->route('berita.index')
            ->with('success','Data Berita baru berhasil ditambahkan');
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
        $berita = Berita::find($id);
        
        return view($this->view.'.'.__FUNCTION__, compact('berita'));
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
            'content' => 'required',
            'content_index' => 'required'
        ]);
        $berita = Berita::find($id);
        $berita->fill($request->except('_method','_token'));
        if ($request->tanggal) {
            $berita->created_at = $request->tanggal;
        }
        $berita->save();

        // if($request->thumbnail != null)
        // {
        //     $judul  = preg_replace('/[^a-zA-Z0-9\-\._\/\\\\]/','', $request->judul);
        //     $ext    = $request->file('thumbnail')->getClientOriginalExtension();
        //     $name   = Carbon::now()->format('Ymd-His').'-'.$judul.'.'.$ext;
        //     $path   = '/images/berita/';

        //     $request->file('thumbnail')->move(public_path($path), $name);
        //     File::delete(public_path($berita->thumbnail));
            
        //     $berita->fill($request->except('_method','_token'));
        //     $berita->thumbnail = $path.$name;
            
        //     $berita->save();
        // }
        
        // else
        // {
        //     $berita->fill($request->except('_method','_token','thumbnail'))->save();
        // }

        return redirect()->route('berita.index')
            ->with('success','Data Berita berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        File::delete(public_path($berita->thumbnail));

        $berita->delete();

        return redirect()->route('berita.index')
                ->with('success', 'Data Berita berhasil dihapus');
    }

    public function status($id, $status)
    {
        // dd($id, $status);
        $berita = Berita::find($id);
        
        switch ($status) {
            case 'draft':
                $status = 0;
                break;
            case 'publish':
                $status = 1;
                $berita->published_at = Carbon::now();
                break;
            case 'archive':
                $status = 2;
                break;
        }

        $berita->status = $status;
        $berita->save();

        return response()->json([
            'status' => 'Update Status Berita Sukses'
        ]);
    }

    public function trash()
    {
        $berita = Berita::onlyTrashed()->get();

        return view($this->view.'.trash', compact('berita'));
    }

    public function restore($id)
    {
        Berita::withTrashed()->where('id', $id)->restore();

        return redirect()->route('berita.trash')->with('success','Data Berita berhasil dikembalikan');;
    }

    public function permanentlyDelete($id)
    {
        Berita::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('berita.trash')->with('success','Data Berita berhasil dihapus secara permanen');;
    }
}
