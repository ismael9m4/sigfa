<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pipeline;
use Illuminate\Testing\TestResponse;

class lecturaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGenerarReportePDF()
    {
        $zonas=zonas();
        $this->assertCount(2, Pipeline::all());
        $volumenNocturno= calculoVolumenNocturno();
        $this ->assertGreaterThanOrEqual(0, $volumenNocturno);
        $cantidad = usuariosAdmin();
        $this ->assertGreaterThanOrEqual(0,count($cantidad));
        $cantidadDeteccion = cantdeteccionAñoActual();
        $this ->assertGreaterThanOrEqual(0,$cantidadDeteccion);
        $response = $this->get('/reporte/pdf');
        $response->assertStatus(302)
        ->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $content = $response->getContent();
    }
}
