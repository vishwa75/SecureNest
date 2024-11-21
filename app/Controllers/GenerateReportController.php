<?php

namespace App\Controllers;

use App\Models\ServerDetailsModel;
use App\Models\ServiceDetailsModel;
use App\Models\ConnectivityDetailsModel;
use App\Models\CollectionTableModel;
use App\Models\ShowMenuModel;
use App\Models\TableDetailModel;
use Exception;

class GenerateReportController extends BaseController
{
    public function pagelaod(): string
        {
            $ShowMenu = new ShowMenuModel();

            $viewObject = [

                'showMenu' => $ShowMenu->findAll(),

            ];

            return view('generateReport/GenerateReportView', $viewObject);
        }

}



