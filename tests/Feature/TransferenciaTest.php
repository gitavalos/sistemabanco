<?php

//namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransferenciaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        parent::setUp(); // performs set up
        
        Session::start(); // starts session, this is what handles csrf token part

        $user1 = App\User::where('countnumber','1122')->first();
        if($user1 != null){
            $user1->delete();
        }

        $user2 = App\User::where('countnumber','1123')->first();
        if($user2 != null){
            $user2->delete();
        }

        factory(App\User::class)->create([
            'id' => '1122',
            'balance' => '100',
            'firstname' => 'Antonio',
            'lastname' => 'Avalos',
            'countnumber' => '1122', 
            'password' => bcrypt('123456')
        ]);

        factory(App\User::class)->create([
            'id' => '1123',
            'balance' => '100',
            'firstname' => 'Sergio',
            'lastname' => 'Esquivel',
            'countnumber' => '1123', 
            'password' => bcrypt('123456')
        ]);

        $user1 = App\User::where('countnumber','1122')->first();
        
        $this->actingAs($user1)
            ->withSession(['foo' => 'bar'])
            ->visit('/transferenciasaldo')
            ->type('20','cantidad')
            ->type('1123','countnumber')
            ->press('transferencia')
            ->see('Transferencia Realizada!')
            ;     
         
        $user2 = App\User::where('countnumber','1123')->first();

        $this->actingAs($user2)
            ->withSession(['foo1' => 'bar1'])
            ->get('/consultasaldo')
            ->see('120'); 

    }
}
