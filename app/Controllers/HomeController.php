<?php

namespace App\Controllers;

use App\Models\ServerDetailsModel;

class HomeController extends BaseController
{
    public function index(): string
    {   
        $serverDetails = new ServerDetailsModel();
        
        $viewObject = [
            'serverDetails' => $serverDetails->findAll(),
        ];
        
        return view('homeView', $viewObject);
    }
}

