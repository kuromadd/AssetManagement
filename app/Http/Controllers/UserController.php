<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    public function test2(){

        return view('test2')->with('user',Auth()->user());
    }
    public function test3(){

        return view('test3')->with('user',Auth()->user());
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

    public function modelsPer(){
        $user = Auth()->user();
        $users = User::orderBy('id','asc')->get();
        
        return view('admin.user.indexPM')->with('users',$users)->with('user',$user);
    }

    public function updateAll(Request $request){
        foreach (User::all() as $user) {
            $r=$user->name;
            if (($request->has($r))) {
                $user->syncPermissions($request->input($r));
            }
        }
        return redirect()->route('indexPM')->with('success','you update user permissions successfully ');
    }    

    public function index(Request $request)
    {
        $user = Auth::user();
        $users = \App\User::all();
        return view('users.index',compact('users'))
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
            'qrcode'=>Str::random(15),           
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
        $user->save();
        DB::table('model_has_roles')->where('Model_id',$id)->delete();
        $user->assignRole($request->input('role'));
        return redirect()->route('indexUser')->with('success','you are successfuly updated user account');

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
        DB::table("profiles")->where('user_id',$id)->delete();
        $user->delete();
        return redirect()->back()->with('success','you deleted a user account');
    }
}

