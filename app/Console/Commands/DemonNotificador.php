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
    public function handle(){
        //$inicio=sensores();
        if(test2()==1){    
            $cantidadFugas=count(sensores());
            User::all()
            ->each(function(User $user){
            $user->notify(new DetectNotification());
            });
        }else{
            return 0;
    
        }
        
    }
}
