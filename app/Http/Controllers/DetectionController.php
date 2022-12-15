<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Detection;
use App\Models\User;
use App\Notifications\DetectNotification;
class DetectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $detections=DB::table('detections')
            ->select('detections.id', 'detections.created_at', 'detections.cause','detections.neighborhood')
            ->get();
        return view('detections.index',compact('detections'));
    }
    public function create(){
        //
    }
    public function store(Request $request){
        $detection= Detection::create($request->only('id_sensor','id_device','positiong','neighborhood',
        'variacionpresion','variacionvalvula','cause')
        );
                
        return ;
    }
    public function show($id){
        $detection=Detection::findOrFail($id);
        return view('detections.show',compact('detection'));
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
