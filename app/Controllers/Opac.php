<?php

namespace App\Controllers;

class Opac extends BaseController
{
    public function index()
    {
        echo view('opac');
    }
}