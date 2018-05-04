<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;

use Illuminate\Http\Request;
use Validator;
use Auth;

class SaldoController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function consultasaldo()
    {
        return view('saldo');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function transferenciasaldo()
    {
        return view('transferencia');
    }

    /**
     * Realiza la trasnferncia de saldo.
     *
     * @param  Request  $data
     * @return \Illuminate\Http\Response
     */
    public function realizartransferencia(Request $request){

        $data = ['countnumber'=> $request->countnumber,'cantidad'=> $request->cantidad];

        $messages = array(
            'exists' => 'La cuenta debe ser una cuenta existente.',
            'dentrode' => 'El numero debe estar dentro del rango de su saldo',
            'unique' => 'La cuenta debe ser distinta a la suya',
        );

        $rules = [
            'countnumber' => 'required|integer|exists:users',
            'cantidad' => 'required|min:1|dentrode:' . Auth::user()->balance,
        ];

        $result = Validator::make($data,$rules,$messages);

        if ($result->fails()) {
            return redirect('transferenciasaldo')
                ->withErrors($result)
                ->withInput();
        }

        //ejecucion
        $otrousuario = User::where('countnumber',$request->countnumber)->first();
        $otrousuario->balance = $otrousuario->balance + $request->cantidad;
        Auth::user()->balance = Auth::user()->balance - $request->cantidad;
        $otrousuario->save();
        Auth::user()->save();       
        

        return redirect('transferenciasaldo') 
            ->with('message', 'Transferencia Realizada!');         
    }

}
