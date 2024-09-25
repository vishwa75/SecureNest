<?php

namespace App\Controllers;

use App\Models\ClientDetailModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ClientDetailController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    public function getClientDetails(){
        $clientDetailModel = new ClientDetailModel();
        $clienDetails = $clientDetailModel->findAll();

        if($clienDetails == null){
            $response = [
                "status" => false,
                "message" => "Get Client Detail Empty",
                "data" => [$clienDetails]
            ]; 
        }else{
            $response = [
                "status" => true,
                "message" => "Get Client Detail",
                "data" => [$clienDetails]
            ];
        }

            return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_CREATED)
                    ->setJSON($response);

    }



    public function ClientSearch()
    {
        try {
            $search = $this->request->getVar("search");
            if ($search !== null) {
                $clientDetailModel = new ClientDetailModel();
                $searchclientDetail = $clientDetailModel
                    ->like("CLIENT_ID", $search)
                    ->orLike("ESTABLISHMENT_NAME", $search)
                    ->orLike("COUNTRY", $search)
                    ->orLike("CLIENT_SPOC", $search)
                    ->orLike("SUPPORT_SPOC", $search)
                    ->orderBy('id', 'ASC')
                    ->findAll();
                    //log_message('info', 'Dash : ' . $db->getLastQuery());
                    // $tableCount = $secureClientsModel
                    // ->like("bank_name", $search)
                    // ->orLike("country", $search)
                    // ->orLike("contact_name", $search)
                    // ->orLike("email", $search)
                    // ->orLike("phone", $search)
                    // ->orLike("support_team", $search)
                    // ->orLike("support_person", $search)
                    // ->orderBy('id', 'ASC')
                    // ->countAllResults();
                   

                    if($searchclientDetail == null){
                        $response = [
                            "status" => false,
                            "message" => "Search Client Detail Empty",
                            "data" => [$searchclientDetail]
                        ]; 
                    }else{
                        $response = [
                            "status" => true,
                            "message" => "Client Detail Result",
                            "data" => [$searchclientDetail]
                        ];
                    }

                    return $this->response
                        ->setStatusCode(ResponseInterface::HTTP_CREATED)
                        ->setJSON($response);
            } 
        } catch (\Exception $e) {
            // Log or display the error message
            $errorMessage = $e->getMessage() . "\n" . $e->getTraceAsString();
            error_log($errorMessage);
            return $errorMessage;
        }

    }

}
