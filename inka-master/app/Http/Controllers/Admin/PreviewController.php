<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Preview;

class PreviewController extends Controller
{
    private $view = 'admin';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function preview(Request $request)
    {
        $preview = new Preview;
        
        // dd($request);
        $id = random_int(1000000, 9999999);
        $preview->id = $id;
        $preview->content = $request->content;
        $preview->save();

        return($id);
    }

    public function show($id)
    {
        $preview = Preview::find($id);
        // dd($preview);

        return view($this->view.'.'.__FUNCTION__, compact('preview'));
    }
}
