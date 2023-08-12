<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class leakagesTest extends TestCase
{
    /**
     * Prueba del metodo calculode fuga
     */
    public function testCalculoDeFuga()
    {
        //valores que no serian fuga
        $result = detectarFugaDeAgua(0.4, 14, 4.5);
        $this->assertTrue($result);
        //valores que serian fuga, por exceso en girovalvula
        $result = detectarFugaDeAgua(0.6, 14, 4.5);
        $this->assertFalse($result);
        //valores que serian fuga, por exceso en presion
        $result = detectarFugaDeAgua(0.4, 120, 4.5);
        $this->assertFalse($result);
        //valores que serian fuga, por exceso en caudal
        $result = detectarFugaDeAgua(0.4, 14, 10.5);
        $this->assertFalse($result);
        //valores que serian fuga, por exceso en caudal y girovalvula
        $result = detectarFugaDeAgua(0.55, 14, 10.5);
        $this->assertFalse($result);
         //valores que serian fuga, por exceso en caudal y presion
         $result = detectarFugaDeAgua(0.4, 114, 10.5);
         $this->assertFalse($result);
          //valores que serian fuga, por exceso en caudal, girovalvula y presion
        $result = detectarFugaDeAgua(0.54, 144, 10.5);
        $this->assertFalse($result);
          //valores que no serian fuga, por errores de valores en caudal, girovalvula y presion
          $result = detectarFugaDeAgua('a', 'a', null);
          $this->assertFalse($result);
    }
}
