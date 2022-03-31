<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    /*public function plain_email() {
        $data = array('name'=>"Gerb. x");

        Mail::send(['text'=>'mail'], $data, function($message) {
           $message->to('ruta.plac@gmail.com', 'Rūta Plač')->subject
              ('Testas iš Laravel');
           $message->from('testinispastas9@gmail.com','SVAKO IST20');
        });
        echo "Išsiųstas laiškas";
    }*/
    public function html_email() {
        $data = array('name'=>"Gerb. x");
        Mail::send('mail', $data, function($message) {
            $message->to('ruta.plac@gmail.com', 'Rūta Plač')->subject
            ('Testas iš Laravel');
        $message->from('testinispastas9@gmail.com','SVAKO IST20');
        });

        return redirect()->route('dashboard')
                        ->with('success','Laiškas išsiųstas sėkmingai.');
    }
}
