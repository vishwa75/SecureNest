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
use HeadlessChromium\BrowserFactory;


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

    
       
        


        // public function generate(): void
        // {
        //     // Fetch the data from GET request
        //     $data = $this->request->getGet('gdata');
        
        //     // Debug: Log the data to verify it's received
        //     log_message('info', 'Data received for PDF generation: ' . $data);
        
        //     // Check if data is empty and provide fallback content
        //     if (empty($data)) {
        //         $data = '<h1>No Content Provided</h1><p>Please provide valid HTML data to generate a PDF.</p>';
        //     } else {
        //         // Wrap the data in a basic HTML structure if necessary
        //         $data = '<html><body>' . $data . '</body></html>';
        //     }
        
        //     // Initialize Dompdf
        //     $dompdf = new Dompdf();
        //     $dompdf->loadHtml($data);
        
        //     // Set paper size and orientation
        //     $dompdf->setPaper('A4', 'portrait');
        
        //     // Enable debug options for troubleshooting
        //     // $dompdf->set_option('isHtml5ParserEnabled', true);
        //     // $dompdf->set_option('isRemoteEnabled', true);
        
        //     // Render the PDF
        //     $dompdf->render();
        
        //     // Stream the PDF to the browser
        //     $dompdf->stream('generated_report.pdf', ['Attachment' => 1]);
        
        //     // End the script to ensure no further output
        //     exit(0);
        // }
        
        

        public function generate(): void
        {
           // Instantiate the BrowserFactory
    $browserFactory = new BrowserFactory();

    // Start the browser
    $browser = $browserFactory->createBrowser([
        'keepAlive' => true,    // Keep the browser alive for debugging
    'connectionDelay' => 0, // Minimize connection delays
    'timeout' => 60000,     // Set timeout to 60 seconds
    ]);

    try {
        // Create a new page
        $page = $browser->createPage();

        // Navigate to the desired URL
        $page->navigate(base_url())->waitForNavigation();

        // Generate the PDF
        $pdf = $page->pdf([
            'printBackground' => true, // Optional: include background in the PDF
            'format' => 'A4',         // Set the paper size
        ]);

        // Save the PDF to a file
        $pdf->saveToFile(FCPATH . 'generated_report.pdf'); // Use the correct path for saving

        // Optionally stream the PDF to the browser
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="generated_report.pdf"');
        readfile(FCPATH . 'generated_report.pdf');
        exit;
    } catch (\Exception $e) {
        // Log errors for debugging
        log_message('error', $e->getMessage());
        throw $e;
    } finally {
        // Ensure the browser is closed to free resources
        $browser->close();
    }
        }
    



}



