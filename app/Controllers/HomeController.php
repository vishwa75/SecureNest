<?php

namespace App\Controllers;

use App\Models\ServerDetailsModel;
use App\Models\ServiceDetailsModel;
use App\Models\ConnectivityDetailsModel;

class HomeController extends BaseController
{
    public function index(): string
    {   
        $serverDetails = new ServerDetailsModel();
        $ServiceDetails = new ServiceDetailsModel();
        $ConnectivityDetails = new ConnectivityDetailsModel();
        
        $viewObject = [
            'serverDetails' => $serverDetails->findAll(),
            'serviceDetails' => $ServiceDetails->findAll(),
            'connectivityDetails' => $ConnectivityDetails->findAll()
        ];
        
        return view('homeView', $viewObject);
    }
}

