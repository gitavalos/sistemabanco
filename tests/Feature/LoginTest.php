<?php

//namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        parent::setUp(); // performs set up
        
        Session::start(); // starts session, this is what handles csrf token part

        $user1 = App\User::where('countnumber','1122')->first();
        if($user1 != null){
            $user1->delete();
        }

        factory(App\User::class)->create([
            'id' => '1122',
            'balance' => '100',
            'firstname' => 'Antonio',
            'lastname' => 'Avalos',
            'countnumber' => '1122', 
            'password' => bcrypt('123456')
        ]);

        $user1 = App\User::where('countnumber','1122')->first();

        $result = $this->visit(route('login'))
            ->type($user1->countnumber, 'countnumber')
            ->type('123456', 'password')
            ->press('Login')    
            ->see('Analisis2018');
    }
}
