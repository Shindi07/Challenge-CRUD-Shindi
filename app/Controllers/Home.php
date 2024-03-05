<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Home'
        ];
        return view('home', $data);
    }
    public function about(): string
    {
        $data = [
            'title' => 'About'
        ];
        return view('about', $data);
    }
}
