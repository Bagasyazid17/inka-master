<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Contact;
use Mail;
use App\Mail\ReplyMail;
use App\UserHasSubTopik;
use Auth;
use Carbon\Carbon;

class ContactController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.contact';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == 1)
            $contact = Contact::all();
        else{
            $subTopik = UserHasSubTopik::select('sub_topik_id')->where('user_id', Auth::user()->id)->get()->toArray();
            // dd($subTopik);
            $contact = Contact::whereIn('sub_topik_id', $subTopik)->get();
        }

        return view($this->view.'.'.__FUNCTION__, compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        if ($contact->status != 2) {
            $contact->status = 1;
        }
        $contact->save();

        return view($this->view.'.'.__FUNCTION__, compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        Mail::to($contact->email)
            ->queue(new ReplyMail(Auth::user()->name, $contact->nama, $contact->subTopik->nama_en, $request->reply));

        $contact->status = 2;
        $contact->reply = $request->reply;
        $contact->replied_by = Auth::user()->id;
        $contact->replied_at = Carbon::now();
        $contact->save();

        return redirect()->route('contact.index')
                ->with('success', 'Pesan Terkirim');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        
        return redirect()->route('contact.index')
                ->with('success', 'Data Pesan berhasil dihapus');
    }
}
