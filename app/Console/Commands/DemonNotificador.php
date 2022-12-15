<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reading;
use App\Models\Detection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Notifications\DetectNotification;
class DemonNotificador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'runnotify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Avisa cuando haya una lectura nueva y chequea si hay una nueva fuga';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //$inicio = Reading::newRegistrations();
        $inicio=sensores();
        if($inicio!=null){//si hay fugas nuevas detection()  
            //avisare mediante un notificador a todos
            //enviarnotify();
                //$texto="[". date("Y-m-d H:i:s") . "]: Hola, encontre una fuga";
                //Storage::append("archivo.txt",$texto);
            if(count(fugaexistio(sensores()))==0){
                $sensores=fugaexistio(sensores());
                foreach($sensores as $sensor => $id){
                    DB::table('detections')->insert([
                        'id_device' => getDevice($id),
                        'id_sensor' => $id,
                        'positiong' => getUbicacion($id),
                        'neighborhood' => getBarrio($id),
                        'variacionvalvula' => variacionValvula(),
                        'variacionpresion' => variacionPresion($id),
                        'cause' => 'Desconocido',]);  
                }
                $volumenNocturno=getBarrio(8050240);
            }else{
                return 0;
            }     
            $cantidadFugas=count(sensores());
            //dump($volumenNocturno);
            User::all()//->except($post->)
            ->each(function(User $user){
            $user->notify(new DetectNotification());
            });
        }else{
            return false;
            //$texto="[". date("Y-m-d H:i:s") . "]: Hola, No encontre una fuga";
            //Storage::append("archivo.txt",$texto);
        }
        
    }
}
