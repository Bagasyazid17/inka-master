<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Karir;
use App\Document;

class KarirController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.karir';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karir = Karir::all();

        return view($this->view.'.'.__FUNCTION__, compact('karir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karir = [];

        return view($this->view.'.'.__FUNCTION__, compact('karir'));
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
            'content' => 'required',
            'content_index' => 'required|numeric',
            'mulai' => 'required|date',
            'selesai' => 'required|date'
        ]);

        $karir = new Karir($request->except('_method', '_token'));
        $karir->save();

        if ($request->document) {
            foreach ($request->document as $index => $item) {
                $ext    = $item->getClientOriginalExtension();
                $name   = $item->getClientOriginalName();
                $path   = '/uploads/karir/';
                $item->move(public_path($path), $name);

                Document::create(['karir_id' => $karir->id,
                                'nama' => $name,
                                'link' => $path.$name.$ext,
                                ]);
            }
        }
        
        return redirect()->route('karir.index')
            ->with('success','Data Karir baru berhasil ditambahkan');
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
        $karir = Karir::find($id);
        
        return view($this->view.'.'.__FUNCTION__, compact('karir'));
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
            'content' => 'required',
            'content_index' => 'required|numeric',
            'mulai' => 'required|date',
            'selesai' => 'required|date'
        ]);

        $karir = Karir::find($id);
        $karir->fill($request->except('_method','_token'))->save();

        if ($request->document) {
            foreach ($request->document as $index => $item) {
                $ext    = $item->getClientOriginalExtension();
                $name   = $item->getClientOriginalName();
                $path   = '/uploads/karir/';
                $item->move(public_path($path), $name);

                Document::create(['karir_id' => $karir->id,
                                'nama' => $name,
                                'link' => $path.$name,
                                ]);
            }
        }

        return redirect()->route('karir.index')
            ->with('success','Data Karir berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karir::find($id)->delete();
        
        return redirect()->route('karir.index')
                ->with('success', 'Data Karir berhasil dihapus');
    }

    public function deleteDocument(Request $request){
        Document::find($request->document_id)->delete();
        return response()->json(array('status' => 'Success', 'message' => 'Document telah dihapus!'));
    }

    public function downloadDocument($id){
        $document = Document::find($id);
        return response()->download(public_path($document->link));
    }

    public function status($id, $status)
    {
        // dd($id, $status);
        $karir = Karir::find($id);
        
        switch ($status) {
            case 'draft':
                $status = 0;
                break;
            case 'publish':
                $status = 1;
                // $karir->published_at = Carbon::now();
                break;
            case 'archive':
                $status = 2;
                break;
        }

        $karir->status = $status;
        $karir->save();

        return response()->json([
            'status' => 'Update Status Karir Sukses'
        ]);
    }
}
