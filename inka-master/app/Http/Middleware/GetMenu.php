<?php

namespace App\Http\Middleware;

use Closure;

use App\MasterProduct;
use App\Corporation;
use App\Galeri;
use App\MasterProcurement;
use App\Menu;
use App\Page;

class GetMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $masterProduct = MasterProduct::orderBy('urutan')->get();
        $corporation = Corporation::where([
            ['has_sub', '!=', 2],
            ['bahasa', session('lang')],
            ['status', 1]
        ])->orderBy('urutan')->get();

        $galeri = Galeri::all();
        $masterProcurement = MasterProcurement::all();
        $menu = Menu::where('status', 1)->where('bahasa', session('lang'))->orderBy('urutan')->get();

        $page = Page::where('status', 1)->get();
        // dd($page->toArray(), $menu->toArray());

        $request->session()->flash('masterProduct', $masterProduct);
        $request->session()->flash('corporation', $corporation);
        $request->session()->flash('galeri', $galeri);
        $request->session()->flash('masterProcurement', $masterProcurement);
        $request->session()->flash('menu', $menu);
        $request->session()->flash('page', $page);
        return $next($request);
    }
}
