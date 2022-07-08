<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Page;
use App\Menu;

class PageController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.page';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($menuId)
    {
        $page = Page::where([
            ['menu_id', $menuId],
            ['has_sub', '!=', 2]
        ])->get();
        $menu = Menu::find($menuId);

        return view($this->view.'.'.__FUNCTION__, compact('page', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($menuId)
    {
        $page = [];
        $menu = Menu::find($menuId);
        $pageId = Page::pluck('nama', 'id');
        $parentPage = Page::where([
            ['has_sub', 1],
            ['menu_id', $menuId]
        ])->pluck('nama', 'id');

        $categoryOption = [0 => 'Main', 1 => 'Parent', 2 => 'Child'];

        return view($this->view.'.'.__FUNCTION__, compact('page', 'menu', 'pageId', 'parentPage', 'categoryOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $menuId)
    {
        $request['category']    = $request->has_sub;
        $request['category_']   = $request->has_sub == 0 ? 'Main' : $request->has_sub == 1 ? 'Parent' : 'Child';
        $request['parent']      = $request->page_id;

        $this->validate($request, [
            'nama'      => 'required|max:255',
            'category'  => 'required|between:0,2',
            'parent'    => 'required_if:category_, "Child"'
        ]);

        $page = new Page($request->except('_method', '_token'));
        $page->menu_id = $menuId;
        $page->save();

        return redirect()->route('page.index', $menuId)
            ->with('success','Data Page baru berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($menuId, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($menuId, $id)
    {
        $page = Page::find($id);
        $menu = Menu::find($menuId);
        $pageId = Page::pluck('nama', 'id');
        $parentPage = Page::where([
            ['has_sub', 1],
            ['menu_id', $menuId]
        ])->pluck('nama', 'id');
        unset($parentPage[$id]);

        $categoryOption = [0 => 'Main', 1 => 'Parent', 2 => 'Child'];

        return view($this->view.'.'.__FUNCTION__, compact('page', 'menu', 'pageId', 'parentPage', 'categoryOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $menuId, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
        ]);
        $page = Page::find($id);
        $page->fill($request->except('_method','_token'));
        $page->save();

        return redirect()->route('page.index', $menuId)
            ->with('success','Data Page berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($menuId, $id)
    {
        Page::find($id)->delete();

        return redirect()->route('page.index', $menuId)
                ->with('success', 'Data Page berhasil dihapus');
    }

    public function status($menuId, $id, $status)
    {
        $page = Page::find($id);
        
        switch ($status) {
            case 'draft':
                $status = 0;
                break;
            case 'publish':
                $status = 1;
                $page->published_at = Carbon::now();
                break;
            case 'archive':
                $status = 2;
                break;
        }

        $page->status = $status;
        $page->save();

        return response()->json([
            'status' => 'Update Status Procurement Sukses'
        ]);
    }
}
