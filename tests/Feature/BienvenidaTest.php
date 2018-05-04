<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BienvenidaTest extends TestCase
{
    /**
     * Se cargara la pagina de inicio .
     */
    public function testBienvenidaMensaje()
    {
        $this->visit(route('/'))
            ->see('Sistema Bancario En Linea');
    }
}
