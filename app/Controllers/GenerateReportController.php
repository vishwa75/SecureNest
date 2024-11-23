<?php

namespace App\Controllers;

use App\Models\ServerDetailsModel;
use App\Models\ServiceDetailsModel;
use App\Models\ConnectivityDetailsModel;
use App\Models\CollectionTableModel;
use App\Models\ShowMenuModel;
use App\Models\TableDetailModel;
use Exception;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Log\Logger;
use Dompdf\Dompdf;


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

    
       
        


        public function generate(): void
        {
            // Fetch the data from GET request
            $data = $this->request->getGet('gdata');
        
            // Debug: Log the data to verify it's received
            log_message('info', 'Data received for PDF generation: ' . $data);
        
            // Check if data is empty and provide fallback content
            if (empty($data)) {
                $data = '<h1>No Content Provided</h1><p>Please provide valid HTML data to generate a PDF.</p>';
            } else {
                // Wrap the data in a basic HTML structure if necessary
                $data = '<html><body>' . $data . '</body></html>';
            }
        
            // Initialize Dompdf
            $dompdf = new Dompdf();
            $dompdf->loadHtml($data);
        
            // Set paper size and orientation
            $dompdf->setPaper('A4', 'portrait');
        
            // Enable debug options for troubleshooting
            // $dompdf->set_option('isHtml5ParserEnabled', true);
            // $dompdf->set_option('isRemoteEnabled', true);
        
            // Render the PDF
            $dompdf->render();
        
            // Stream the PDF to the browser
            $dompdf->stream('generated_report.pdf', ['Attachment' => 1]);
        
            // End the script to ensure no further output
            exit(0);
        }
        
        

        
    



}



