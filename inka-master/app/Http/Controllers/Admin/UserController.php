<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use Auth;
use File;
use Hash;
use App\User;
use App\Role;
use Carbon\Carbon;
use App\SubTopik;
use App\UserHasSubTopik;

class UserController extends Controller
{
    /**
    * Display folder name which includes blade 
    *
    * @return folder name
    */
    private $view = 'admin.user';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view($this->view.'.'.__FUNCTION__, compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = [];
        $role = Role::pluck('nama', 'id');
        $subTopik = SubTopik::pluck('nama_id', 'id');

        return view($this->view.'.'.__FUNCTION__, compact('user', 'role', 'subTopik'));
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
            'name' => 'required|max:191',
            'email' => 'required|email|max:191|unique:users',
            'alamat' => 'required|max:255',
            'nomor_ktp' => 'bail|required|numeric|digits:16',
            'nomor_telpon' => 'bail|required|numeric|digits_between:7,16',
            'departemen' => 'required|max:255',
            'foto' => 'required|image',
            'password' => 'required|max:191|confirmed',
            'role_id' => 'required|integer'
        ]);

        $user = new User($request->except('_method', '_token'));
        $user->password = bcrypt($request->password);

        $name  = preg_replace('/[^a-zA-Z0-9\-\._\/\\\\]/','', $request->name);
        $ext    = $request->file('foto')->getClientOriginalExtension();
        $name   = Carbon::now()->format('Ymd-His').'-'.$name.'.'.$ext;
        $path   = '/images/users/';
        $request->file('foto')->move(public_path($path), $name);
        
        $user->foto = $path.$name;
        $user->save();

        if($user->role_id != 1) {
            UserHasSubTopik::where('user_id', $user->id)->delete();
            foreach ($request->sub_topik_id as $key => $subTopik) {
                UserHasSubTopik::create([
                        'user_id' => $user->id,
                        'sub_topik_id' => $subTopik
                    ]);
            }
        }

        return redirect()->route('user.index')
            ->with('success','Data User baru berhasil ditambahkan');
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
        $user = User::find($id);
        $role = Role::pluck('nama', 'id');
        $subTopik = SubTopik::pluck('nama_id', 'id');

        return view($this->view.'.'.__FUNCTION__, compact('user', 'role', 'subTopik'));
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
            'name' => 'required|max:191',
            'email' => 'required|email|max:191|unique:users,email,'.$id,
            'alamat' => 'required|max:255',
            'nomor_ktp' => 'bail|required|numeric|digits:16',
            'nomor_telpon' => 'bail|required|numeric|digits_between:7,16',
            'departemen' => 'required|max:255',
            'role_id' => 'required|integer'
        ]);
        $user = User::find($id);
        if($request->foto != null)
        {
            $name  = preg_replace('/[^a-zA-Z0-9\-\._\/\\\\]/','', $request->name);
            $ext    = $request->file('foto')->getClientOriginalExtension();
            $name   = Carbon::now()->format('Ymd-His').'-'.$name.'.'.$ext;
            $path   = '/images/users/';

            $request->file('foto')->move(public_path($path), $name);
            File::delete(public_path($user->foto));

            $user->fill($request->except('_method','_token'));
            $user->foto = $path.$name;
            
            $user->save();
        }
        else
            $user->fill($request->except('_method','_token','foto'))->save();

        if($user->role_id != 1) {
            UserHasSubTopik::where('user_id', $user->id)->delete();
            foreach ($request->sub_topik_id as $key => $subTopik) {
                UserHasSubTopik::create([
                        'user_id' => $user->id,
                        'sub_topik_id' => $subTopik
                    ]);
            }
        }

        return redirect()->route('user.index')
            ->with('success','Data User berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('user.index')
                ->with('success', 'Data User berhasil dihapus');
    }

    public function passwordEdit()
    {
        $user = [];

        return response()->view($this->view.'.'.__FUNCTION__, compact('user'));
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'password_lama' => 'required|string|max:191',
            'password' => 'required|string|max:191|confirmed|different:password_lama',
        ]);

        $user = Auth::user();
        if(Hash::check($request->password_lama, $user->password))
        {
            User::find($user->id)->update(['password' => bcrypt($request->password)]);

            return redirect()->route('dashboard.index')
                    ->with('success', 'Password berhasil diubah!');
        }

        return redirect()->route('password.edit')
            ->with('error', 'Password lama salah!');
    }    
}
