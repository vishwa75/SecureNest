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

    public function GetClientDataByClientID(): string
{
    // Log the incoming client ID
    $ClientID = $this->request->getGet('clientID');
    log_message('error', "Fetching data for ClientID: {$ClientID}");

    // Initialize models
    $serverDetails = new ServerDetailsModel();
    $ServiceDetails = new ServiceDetailsModel();
    $ConnectivityDetails = new ConnectivityDetailsModel();
    $CollectionTable = new CollectionTableModel();
    $TableDetail = new TableDetailModel();

    // Fetch Service Details Table Data
    $ServiceDetailsTableData = $TableDetail->where('TableName', 'ServiceDetails')->first();
    log_message('error', 'ServiceDetailsTableData: ' . json_encode($ServiceDetailsTableData));

    $ServiceDetailsHeader = explode(",", $ServiceDetailsTableData['ColumnHeader']);
    $ServiceDetailsMore = explode(",", $ServiceDetailsTableData['ColumnModeDetails']);
    log_message('error', 'ServiceDetailsHeader: ' . json_encode($ServiceDetailsHeader));
    log_message('error', 'ServiceDetailsMore: ' . json_encode($ServiceDetailsMore));

    // Fetch Server Details Table Data
    $ServerDetailsTableDate = $TableDetail->where('TableName', 'ServerDetails')->first();
    log_message('error', 'ServerDetailsTableDate: ' . json_encode($ServerDetailsTableDate));

    $ServerDetailsHeader = explode(",", $ServerDetailsTableDate['ColumnHeader']);
    log_message('error', 'ServerDetailsHeader: ' . json_encode($ServerDetailsHeader));

    // Fetch Connectivity Details Table Data
    $ConnectivityDetailsData = $TableDetail->where('TableName', 'ConnectivityDetails')->first();
    log_message('error', 'ConnectivityDetailsData: ' . json_encode($ConnectivityDetailsData));

    $ConnectivityDetailsDataHeader = explode(",", $ConnectivityDetailsData['ColumnHeader']);
    log_message('error', 'ConnectivityDetailsDataHeader: ' . json_encode($ConnectivityDetailsDataHeader));

    // Prepare view object
    $viewObject = [
        'serverDetailsTableHeader' => $ServerDetailsHeader,
        'serverDetailsTableHeaderData' => $serverDetails->select($ServerDetailsTableDate['ColumnHeader'])->where('ClientID', $ClientID)->findAll(),
        
        'serviceDetailsTableHeader' => $ServiceDetailsHeader,
        'serviceDetailsTableHeaderData' => $ServiceDetails->select($ServiceDetailsTableData['ColumnHeader'])->where('ClientID', $ClientID)->findAll(),
        'serviceDetailsTableMore' => $ServiceDetailsMore,
        'serviceDetailsTableMoreData' => $ServiceDetails->select($ServiceDetailsTableData['ColumnModeDetails'])->where('ClientID', $ClientID)->findAll(),
        
        'connectivityDetailsHeader' => $ConnectivityDetailsDataHeader,
        'connectivityDetailsHeaderData' => $ConnectivityDetails->select($ConnectivityDetailsData['ColumnHeader'])->where('ClientID', $ClientID)->findAll(),
    ];
    
    // Log the prepared view object
    log_message('error', 'Prepared viewObject: ' . json_encode($viewObject));

    // Render and return the view
    log_message('error', 'Rendering view: home/tableContentView');
    return View('home/tableContentView', $viewObject);
}

}

