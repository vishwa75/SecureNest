<?php

namespace App\Controllers;

use App\Models\ServerDetailsModel;
use App\Models\ServiceDetailsModel;
use App\Models\ConnectivityDetailsModel;
use App\Models\CollectionTableModel;
use App\Models\TableDetailModel;
use Exception;

class HomeController extends BaseController
{
    public function index(): string
        {
            $serverDetails = new ServerDetailsModel();
            $ServiceDetails = new ServiceDetailsModel();
            $ConnectivityDetails = new ConnectivityDetailsModel();
            $CollectionTable = new CollectionTableModel();
            $TableDetail = new TableDetailModel();

            $ServiceDetailsTableData = $TableDetail->where('TableName', 'ServiceDetails')->first();
            $ServiceDetailsHeader = explode(",",$ServiceDetailsTableData['ColumnHeader']);
            $ServiceDetailsMore = explode(",",$ServiceDetailsTableData['ColumnModeDetails']);

            $ServerDetailsTableDate = $TableDetail->where('TableName','ServerDetails')->first();
            $ServerDetailsHeader = explode(",",$ServerDetailsTableDate['ColumnHeader']);

            $ConnectivityDetailsData = $TableDetail->where('TableName','ConnectivityDetails')->first();
            $ConnectivityDetailsDataHeader = explode(",",$ConnectivityDetailsData['ColumnHeader']);
            
            $viewObject = [
                'serverDetailsTableHeader' => $ServerDetailsHeader,
                'serverDetailsTableHeaderData' => $serverDetails->select($ServerDetailsTableDate['ColumnHeader'])->findAll(),

                'serviceDetailsTableHeader' => $ServiceDetailsHeader,
                'serviceDetailsTableHeaderData' => $ServiceDetails->select($ServiceDetailsTableData['ColumnHeader'])->findAll(),
                'serviceDetailsTableMore' => $ServiceDetailsMore,
                'serviceDetailsTableMoreData' => $ServiceDetails->select($ServiceDetailsTableData['ColumnModeDetails'])->findAll(),

                'connectivityDetailsHeader' => $ConnectivityDetailsDataHeader,
                'connectivityDetailsHeaderData' => $ConnectivityDetails->select($ConnectivityDetailsData['ColumnHeader'])->findAll(),

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

        return view('home/collectionListView', $viewObject); 
    }

    public function GetClientDataByClientID(): string{

        $ClientID = $this->request->getGet('clientID');

        $serverDetails = new ServerDetailsModel();
        $ServiceDetails = new ServiceDetailsModel();
        $ConnectivityDetails = new ConnectivityDetailsModel();
        $TableDetail = new TableDetailModel();

            $ServiceDetailsTableData = $TableDetail->where('TableName', 'ServiceDetails')->first();
            $ServiceDetailsHeader = explode(",",$ServiceDetailsTableData['ColumnHeader']);
            $ServiceDetailsMore = explode(",",$ServiceDetailsTableData['ColumnModeDetails']);

        $viewObject = [
            'serverDetails' => $serverDetails->where('ClientID', $ClientID)->findAll(),
            'serviceDetailsTableHeader' => $ServiceDetailsHeader,
            'serviceDetailsTableHeaderData' => $ServiceDetails->select($ServiceDetailsTableData['ColumnHeader'])->where('ClientID', $ClientID)->findAll(),
            'serviceDetailsTableMore' => $ServiceDetailsMore,
            'serviceDetailsTableMoreData' => $ServiceDetails->select($ServiceDetailsTableData['ColumnModeDetails'])->where('ClientID', $ClientID)->findAll(),
            'serviceDetails' => $ServiceDetails->where('ClientID', $ClientID)->findAll(),
            'connectivityDetails' => $ConnectivityDetails->where('ClientID', $ClientID)->findAll(),
        ];
        return View('home/tableContentView', $viewObject);
    }
}

