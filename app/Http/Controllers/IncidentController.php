<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Level;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class IncidentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 
    public function index(){
        $incidents=DB::table('users')
        ->join('incidents', 'incidents.fk_support', '=', 'users.id')
        ->select('incidents.id', 'incidents.title', 'incidents.severity','users.name')
        ->get();
        return view('incidents.index',compact('incidents'));
    }

    
    public function create(){
        $levels= Level::all();
        $nameAuth=auth()->user();
        $users= User::where('name','<>',$nameAuth->name)->get();
        return view('incidents.create')->with(compact('levels','users','nameAuth'));
    }

    
    public function store(Request $request){
        $rules=[
            'title'=>'required',
            'description'=>'required',
            'severity'=>'required|in:B,N,A',
            'fk_level'=>'required|integer',
            'fk_support'=>'required|exists:users,id',
        ];

        $message=[
                'title.required'=>'Es necesario ingresar un titulo',
                'description.required'=>'Es necesario ingresar una descripcion',
                'fk_level.integer'=>'Seleccione un Nivel valido',
        ];

        $this->validate($request,$rules,$message);

        Incident::create($request->only('title','description','severity','fk_level',
        'fk_client','fk_support')
        );
            return redirect ()-> route('incidents.index')->with('success','Incidente guardado con exito');
            //return $request->input('severity');
    }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
