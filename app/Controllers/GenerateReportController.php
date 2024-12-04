<?php

namespace App\Controllers;

use App\Models\ServerDetailsModel;
use App\Models\ServiceDetailsModel;
use App\Models\ConnectivityDetailsModel;
use App\Models\CollectionTableModel;
use App\Models\ShowMenuModel;
use App\Models\TableDetailModel;
use App\Models\SaveSheetTableModel;
use Exception;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Log\Logger;
use Dompdf\Dompdf;
use HeadlessChromium\BrowserFactory;


class GenerateReportController extends BaseController
{
    public function pagelaod(): string
        {

            $getSheetData = new SaveSheetTableModel();

            $getSaveData = $getSheetData->select('sheetdata')->where('id', '4')->first();

            $viewObject = [
                'sheetData' => json_encode($getSaveData)
            ];
            return view('generateReport/GenerateReportView', $viewObject);
        }

        public function saveSheet(): ResponseInterface
{
    try {
        // Get the posted data from the AJAX request as JSON
        $sheetData = $this->request->getJSON();

        // Validate the data (optional but recommended)
        if (empty($sheetData)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No data received.'
            ])->setStatusCode(400);
        }

        // Save the data to the database
        $saveSheetData = new SaveSheetTableModel();
        $saveSheetData->insert([
            'sheetdata' => json_encode($sheetData) // Ensure the data is stored as a JSON string in the database
        ]);

        // Send a success response
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Sheet data saved successfully.'
        ]);

    } catch (\Exception $e) {
        // Handle any errors and send an error response
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Failed to save sheet data.',
            'error' => $e->getMessage()
        ])->setStatusCode(500);
    }
}

        

    

}



