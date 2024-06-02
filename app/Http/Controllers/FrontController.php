<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function contact(){
        return view('contact');
    }
    public function mail(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required'
        ]);

        $data=[
            'nome'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
           
        ];


        Mail::to('admin@fracesco.it')->send(new Contact($data));
        
        return redirect()->route('contact')->with('success', 'Messaggio inviato con successo');




    }





}
