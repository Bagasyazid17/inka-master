<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Media;
use App\Galeri;
use App\MediaTag;

class MediaController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.media';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($galeriId)
    {
        $media = Media::where('galeri_id', $galeriId)->get();
        $galeri = Galeri::find($galeriId);

        return view($this->view.'.'.__FUNCTION__, compact('media', 'galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($galeriId)
    {
        $media = [];
        $galeri = Galeri::find($galeriId);

        return view($this->view.'.'.__FUNCTION__, compact('media','galeri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $galeriId)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'type' => 'required|integer',
        ]);
        // dd($request);
        $media = new Media($request->except('_method', '_token'));
        $media->galeri_id = $galeriId;

        if($request->type == 1)
            $media->link = $request->gambar;

        $media->save();

        // $path = '/images/galeri/';
        // if ($request->hasFile('gambar')) {
        //     $getImageName = time().' - '.$request->nama;
        //     $imageExt = '.'.$request->gambar->getClientOriginalExtension();
        //     $request->gambar->move(public_path($path), $getImageName.$imageExt);
        //     $media->link = $path.$getImageName.$imageExt;
        // }

        $tag = explode(' ', $request->tag);
        foreach ($tag as $index => $item) {
            MediaTag::create(['media_id' => $media->id,
                                'nama' => $item
                            ]);
        }

        return redirect()->route('media.index', $galeriId)
            ->with('success','Data Media baru berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($galeriId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($galeriId, $id)
    {
        $media = Media::find($id);
        $galeri = Galeri::find($galeriId);
        
        return view($this->view.'.'.__FUNCTION__, compact('media', 'galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $galeriId, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            // 'type' => 'required|max:255',
        ]);
        // dd($request);
        $media = Media::find($id);
        $media->fill($request->except('_method','_token'));
        
        if($request->type == 1)
            $media->link = $request->gambar;

        // if ($request->type == 2) {
        //     $media->fill($request->except('_method','_token'));
        // }
        // elseif($request->type == 1){
        //     $media->fill($request->except('_method','_token', 'link'));
        //     if ($request->hasFile('gambar')) {
        //         $path = '/images/galeri/';
        //         $getImageName = time().' - '.$request->nama;
        //         $imageExt = '.'.$request->gambar->getClientOriginalExtension();
        //         $request->gambar->move(public_path($path), $getImageName.$imageExt);
        //         $media->link = $path.$getImageName.$imageExt;
        //     }
        //     else{
        //         $media->link = $media->link;
        //     }
        // }
        $media->save();

        MediaTag::where('media_id', $id)->forceDelete();
        $tag = explode(' ', $request->tag);
        foreach ($tag as $index => $item) {
            MediaTag::create(['media_id' => $media->id,
                                'nama' => $item
                            ]);
        }

        return redirect()->route('media.index', $galeriId)
            ->with('success','Data Media berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($galeriId, $id)
    {
        Media::find($id)->delete();
        
        return redirect()->route('media.index', $galeriId)
                ->with('success', 'Data Media berhasil dihapus');
    }
}
