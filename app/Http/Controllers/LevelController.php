<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
class LevelController extends Controller{

    public function index(){
        $levels=Level::all();
        return view('levels.index',compact('levels'));
    }
    public function create(){
        return view('levels.create');
    }
    public function store(Request $request){
        $rules=[
            'name'=>'required',
            'description'=>'required',
        ];
        $message=[
                'name.required'=>'Es necesario ingresar un nombre para el nivel',
                'description.required'=>'Es necesario ingresar una description',
        ];
        $this->validate($request,$rules,$message);
        Level::create($request->only('name','description')
        );
        return redirect ()-> route('levels.index')->with('success','Nivel guardado con exito');
    }
    public function show($id){
        //
    }
    public function edit($id){
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
