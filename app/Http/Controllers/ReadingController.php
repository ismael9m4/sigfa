<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reading;
use Illuminate\Support\Facades\DB;
class ReadingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function index()
    {
        //$readings=Reading::paginate(5);
        $readings=DB::table('sensors')
            ->join('devices', 'sensors.fk_device', '=', 'devices.id')
            ->join('readings', 'readings.fk_sensor', '=', 'sensors.id')
            ->select('readings.id', 'readings.created_at', 'readings.value','readings.unit','devices.id as serie','sensors.type')
            ->get();
        return view('readings.index',compact('readings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    
    public function show(Reading $reading)
    {
        return view('readings.show',compact('reading'));
    }

    public function edit($id)
    {
        //
    }

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

    public static function newRegistrations(){
        if($contador==null){
            $contador = DB::table('readings')->count();
            return false;
        }else{
            $auxiliar=DB::table('readings')->count();
            if($contador<$auxiliar){
                $contador=$auxiliar;
                return true;
            }else{
                if($contador==$auxiliar){
                    return false;
                }
            }
        }
        
    }
}
