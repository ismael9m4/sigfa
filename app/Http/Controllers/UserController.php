<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } 
    
    public function index(){
        $users=User::paginate(5);
        return view('users.index',compact('users'));
    }
    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        User::create($request->only('name','username','email','role')
        +[
        'password'=>bcrypt($request->input('password')),
        ]);
        //return redirect ()-> route('users.index')->with('success','Usuario creado con exito');
        return redirect()->route('users.index')->with('notification','Usuario creado con exito');
        //return back()->with('notification','Usuario creado exitosamente');
    }
    public function show(User $user){//$id){
            //$user=User::findOrFail($id);
        // dd($user);
        return view('users.show',compact('user'));
    }
    public function edit($id){
        $user=User::findOrFail($id);
        return view('users.edit',compact('user'));
    }
    public function update(Request $request, $id){
        $user=User::findOrFail($id);
        $user->name=$request->input('name');
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->role=$request->input('role');
        $password=$request->input('password');
        if($password){
            $user->password=bcrypt($password);
        }
        $user->save();
        return redirect()->route('users.index')->with('notification','Usuario modificado con éxito');
    }
    public function destroy(User $user){
        $usu= User::find($user->id);
        $usu->delete();
        return redirect ()-> route('users.index')->with('notification','Usuario eliminado con éxito');
    }

}
