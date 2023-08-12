<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Route;

class calculoFugaTest extends TestCase
{
   
    public function testVistaFuga()
    {
        $response = $this->get('/leakages');
        $response->assertStatus(302);
    }
    public function testNotificacionFuga(){    
        $response = test2();
        $this->assertIsString($response); 
        $this->assertEquals('Se ha detectado una posible amenaza de fuga', $response);

        $response = $this->get('/panels');
        $response->assertStatus(302)
        ->assertRedirect('http://localhost/login')        //se redirecciona asi que para acceder a la vista es necesario la autentificacion
        ->assertSessionMissing(['cantidadFugas', 'name']);//No estan estas variables

        $sessionData = $this->app['session']->all();
        $variableCount = count($sessionData);
        $this->assertGreaterThan(0, $variableCount);

        $response = enviarNotificacion(1);
        $this->assertTrue($response);
        $response =enviarNotificacion(null);
        $this->assertFalse($response);
        
        $response = $this->get('/shownotificaciones/1');
        $response->assertStatus(302);
    }

  
}

