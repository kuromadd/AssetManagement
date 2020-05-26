<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */

    function __construct()
    {
         $this->middleware('permission:User-list|User-create|User-edit|User-delete', ['only' => ['index','show']]);
         $this->middleware('permission:User-create', ['only' => ['create','store']]);
         $this->middleware('permission:User-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:User-delete', ['only' => ['destroy']]);
    }

    public function test(){

        return view('test')->with('user',Auth()->user());
    }

    public function list(){
        $assets = \App\asset::all();
        return view('app.assetList')->with('assets',$assets);
    }

    public function replaceList(){
        $assets = \App\asset::all();
        return view('app.lostAsset')->with('assets',$assets);
    }

    public function repairList(){
        $assets = \App\asset::all();
        return view('app.damagedAsset')->with('assets', $assets);
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $users = \App\User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5)
            ->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $roles = Role::pluck('name','name')->all();
        return view('admin.user.create',compact('roles'));
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'role' =>'required'
        ]);

        $user = \App\User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('00000000'),
            'role_id'=>$request->role ,            
        ]);

        \App\profile::create([
            'user_id' =>$user->id,
            'image' => '/uploads/profile.png',
            'back_image'=> '/uploads/back.png'
            

        ]);

        $user->assignRole($request->role);
        return redirect()->back()->with('success','User stored successfuly');
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
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.user.edit',compact('user','roles','userRole'));
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
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'role' =>'required'
        ]);

        $user = \App\User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
        return redirect()->back()->with('success','you are successfuly updated user account');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::find($id);
        DB::table("profile")->where('user_id',$id)->delete();
        $user->delete();
        return redirect()->back()->with('success','you deleted a user account');
    }
}

