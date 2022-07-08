<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Procurement;
use App\MasterProcurement;
use App\ProcurementDocument;
use Illuminate\Support\Facades\Storage;
use File;

class ProcurementController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.procurement';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procurement = Procurement::all();

        return view($this->view.'.'.__FUNCTION__, compact('procurement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $procurement = [];
        $masterProcurement = MasterProcurement::pluck('nama', 'id');

        return view($this->view.'.'.__FUNCTION__, compact('procurement','masterProcurement'));
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
            'master_procurement_id' => 'required|integer',
            'judul' => 'required|max:255',
            'content' => 'required',
            'content_index' => 'required|numeric',
            'mulai' => 'required|date',
            'selesai' => 'required|date'
        ]);

        $procurement = new Procurement($request->except('_method', '_token'));
        $procurement->save();

        if ($request->document) {
            foreach ($request->document as $index => $item) {
                $ext    = $item->getClientOriginalExtension();
                $name   = $item->getClientOriginalName();
                $path   = '/uploads/procurement/';
                $item->move(public_path($path), time().' --- '.$name);

                ProcurementDocument::create(['procurement_id' => $procurement->id,
                                'nama' => $name,
                                'link' => $path.time().' --- '.$name,
                                ]);
            }
        }

        return redirect()->route('procurement.index')
            ->with('success','Data Procurement baru berhasil ditambahkan');
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
        $procurement = Procurement::find($id);
        $masterProcurement = MasterProcurement::pluck('nama', 'id');
        
        return view($this->view.'.'.__FUNCTION__, compact('procurement', 'masterProcurement'));
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
            'master_procurement_id' => 'required|numeric',
            'judul' => 'required|max:255',
            'content' => 'required',
            'content_index' => 'required|numeric',
            'mulai' => 'required|date',
            'selesai' => 'required|date'
        ]);

        $procurement = Procurement::find($id);
        $procurement->fill($request->except('_method','_token'))->save();

        if ($request->document) {
            foreach ($request->document as $index => $item) {
                $ext    = $item->getClientOriginalExtension();
                $name   = $item->getClientOriginalName();
                $path   = '/uploads/procurement/';
                $item->move(public_path($path), time().' --- '.$name);

                ProcurementDocument::create(['procurement_id' => $procurement->id,
                                'nama' => $name,
                                'link' => $path.time().' --- '.$name,
                                ]);
            }
        }

        return redirect()->route('procurement.index')
            ->with('success','Data Procurement berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Procurement::find($id)->delete();
        
        return redirect()->route('procurement.index')
                ->with('success', 'Data Procurement berhasil dihapus');
    }

    public function deleteDocument(Request $request){
        $document =  ProcurementDocument::find($request->document_id);
        File::delete(public_path($document->link));
        $document->delete();
        return response()->json(array('status' => 'Success', 'message' => 'Document telah dihapus!'));
    }

    public function downloadDocument($id){
        $document = ProcurementDocument::find($id);
        return response()->download(public_path($document->link));
    }

    public function status($id, $status)
    {
        $procurement = Procurement::find($id);
        
        switch ($status) {
            case 'draft':
                $status = 0;
                break;
            case 'publish':
                $status = 1;
                $procurement->published_at = Carbon::now();
                break;
            case 'archive':
                $status = 2;
                break;
        }

        $procurement->status = $status;
        $procurement->save();

        return response()->json([
            'status' => 'Update Status Procurement Sukses'
        ]);
    }
}
