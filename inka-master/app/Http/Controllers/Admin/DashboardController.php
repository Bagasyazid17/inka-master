<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Berita;
use App\Contact;
use App\Corporation;
use App\Product;
use Carbon\Carbon;

class DashboardController extends Controller
{
    private $view = 'admin.dashboard';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::today()->subDays(30);
        $berita = Berita::where('created_at', '>=', $date)->orderBy('created_at')->get();
        $contact = Contact::where('created_at', '>=', $date)->orderBy('created_at')->get();
        $corporation = Corporation::where('created_at', '>=', $date)->orderBy('created_at')->get();
        $product = Product::where([
            ['created_at', '>=', $date],
            ['is_catalogue', 0]
        ])->orderBy('created_at')->get();
        $catalogue = Product::where([
            ['created_at', '>=', $date],
            ['is_catalogue', 1]
        ])->orderBy('created_at')->get();

        $contactBaru = Contact::where('status', 0)->count();
        $contactBaca = Contact::where('status', 1)->count();
        $contactBalas = Contact::where('status', 2)->count();
        $contactTotal = Contact::count();

        return view($this->view.'.'.__FUNCTION__, compact('berita', 'contact', 'corporation', 'product', 'catalogue', 'contactBaru', 'contactBaca', 'contactBalas', 'contactTotal'));
    }

    public function check(){
        return redirect()->route('dashboard.index')->with('success', 'success messagge');
    }
}
