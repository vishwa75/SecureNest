<?php

namespace App\Controllers;

use App\Models\ServerDetailsModel;
use App\Models\ServiceDetailsModel;
use App\Models\ConnectivityDetailsModel;
use App\Models\CollectionTableModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use Exception;

class HomeController extends BaseController
{
    public function index(): string
    {   
        $serverDetails = new ServerDetailsModel();
        $ServiceDetails = new ServiceDetailsModel();
        $ConnectivityDetails = new ConnectivityDetailsModel();
        $CollectionTable = new CollectionTableModel();
        
        $viewObject = [
            'serverDetails' => $serverDetails->findAll(),
            'serviceDetails' => $ServiceDetails->findAll(),
            'connectivityDetails' => $ConnectivityDetails->findAll(),
            'collectionTable' => $CollectionTable->findAll(),
        ];
        
        return view('home/homeView', $viewObject);
    }

    public function SaveCollection(): string
    {

        $collectionName = $this->request->getPost('collectionName');
        $collectionDescription = $this->request->getPost('collectionDescription');
        $clientId = $this->request->getPost('clientID');

        $CollectionTable = new CollectionTableModel();

      
            $CollectionTable->insert([
                'ClientID' => $clientId,
                'CollectionName' => $collectionName,
                'collectionDescription' => $collectionDescription,
                'MakerId' => '2345',
                'Maker' => 'YouAndI'
            ]);
           
        

        $viewObject = [
            'collectionTable' => $CollectionTable->findAll(),
        ];

        return view('home/collectionList', $viewObject); 
    }

    public function GetClientDataByClientID(): string{

        $ClientID = $this->request->getGet('clientID');

        $serverDetails = new ServerDetailsModel();
        $ServiceDetails = new ServiceDetailsModel();
        $ConnectivityDetails = new ConnectivityDetailsModel();

        $viewObject = [
            'serverDetails' => $serverDetails->where('ClientID', $ClientID)->findAll(),
            'serviceDetails' => $ServiceDetails->where('ClientID', $ClientID)->findAll(),
            'connectivityDetails' => $ConnectivityDetails->where('ClientID', $ClientID)->findAll(),
        ];

        return View('home/tableContentView', $viewObject);
    }
}

