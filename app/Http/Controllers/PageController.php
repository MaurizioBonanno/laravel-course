<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    protected $data = [
        [
            'name'=>'Maurizio',
            'lastname'=>'Bonanno'
        ]
    ];



    public function about(){
        return view('about');
    }

    public function staff(){
        return view('staff',[
            'title'=>'il nostro staff',
            'staff'=>$this->data,
            'img_url'=>'http://lorempixel.com/400/200',
            'img_title'=>'immagine',
            'slot'=>''
            ]);
    }
}
