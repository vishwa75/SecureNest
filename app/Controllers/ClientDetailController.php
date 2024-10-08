<?php

namespace App\Controllers;

use App\Models\ClientDetailModel;
use App\Models\ServerDetailModel;
use App\Models\TableDetailModel;
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
        $tableDetailModel = new TableDetailModel();
        $clienDetails = $clientDetailModel->findAll();
        $tableDetail = $tableDetailModel->where('TABLE_NAME', $clientDetailModel->getTableName())->findAll();

        if($clienDetails == null){
            $response = [
                "status" => false,
                "message" => "Get Client Detail Empty",
                "data" => [$clienDetails],
                "header" => $tableDetail
            ]; 
        }else{
            $response = [
                "status" => true,
                "message" => "Get Client Detail",
                "data" => [$clienDetails],
                "header" => $tableDetail
            ];
        }

            return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_OK)
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
                        ->setStatusCode(ResponseInterface::HTTP_OK)
                        ->setJSON($response);
            } 
        } catch (\Exception $e) {
            // Log or display the error message
            $errorMessage = $e->getMessage() . "\n" . $e->getTraceAsString();
            error_log($errorMessage);
            return $errorMessage;
        }

    }


    public function getServerdetail()
    {
        try {
            $clientId = $this->request->getVar("clientid");
            if ($clientId !== null) {
                $serverDetailModel = new ServerDetailModel();
                $serverDetail = $serverDetailModel->where('CLIENT_ID',$clientId)->findAll();
                    if($serverDetail == null){
                        $response = [
                            "status" => false,
                            "message" => "Server Detail Empty",
                            "data" => [$serverDetail]
                        ]; 
                    }else{
                        $response = [
                            "status" => true,
                            "message" => "Server Detail Result",
                            "data" => [$serverDetail]
                        ];
                    }

                    return $this->response
                        ->setStatusCode(ResponseInterface::HTTP_OK)
                        ->setJSON($response);
            } 
        } catch (\Exception $e) {
            // Log or display the error message
            $errorMessage = $e->getMessage() . "\n" . $e->getTraceAsString();
            error_log($errorMessage);
            return $errorMessage;
        }

    }


    public function updateClientDetail()
{
    try {
        $clientId = $this->request->getVar("CLIENT_ID");
        $PCM = $this->request->getVar('PREFERRED_CONTACT_METHOD');
        $clientSpoc = $this->request->getVar('CLIENT_SPOC');
        $clientSpocContactDetail = $this->request->getVar('CLIENT_SPOC_CONTACT_DETAIL');
        $supportSpoc = $this->request->getVar('SUPPORT_SPOC');
        $supportSpocContactDetail = $this->request->getVar('SUPPORT_SPOC_CONTACT_DETAIL');
        $additionNotes = $this->request->getVar('ADDITIONAL_NOTES');

        if ($clientId !== null) {
            $clientDetailModel = new ClientDetailModel();
            $editClientDetail = $clientDetailModel
                ->set('PREFERRED_CONTACT_METHOD', $PCM)
                ->set('CLIENT_SPOC', $clientSpoc)
                ->set('CLIENT_SPOC_CONTACT_DETAIL', $clientSpocContactDetail)
                ->set('SUPPORT_SPOC', $supportSpoc)
                ->set('SUPPORT_SPOC_CONTACT_DETAIL', $supportSpocContactDetail)
                ->set('ADDITIONAL_NOTES', $additionNotes)
                ->where('CLIENT_ID', $clientId)
                ->update();
                
            if ($editClientDetail) {
                $response = [
                    "status" => true,
                    "message" => "Client detail updated successfully",
                ];
            } else {
                $response = [
                    "status" => false,
                    "message" => "Failed to update client detail",
                ];
            }

            return $this->response
                ->setStatusCode(ResponseInterface::HTTP_OK)
                ->setJSON($response);
        } else {
            return $this->response
                ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON([
                    "status" => false,
                    "message" => "Client ID is required",
                ]);
        }
    } catch (\Exception $e) {
        // Log or display the error message
        $errorMessage = $e->getMessage() . "\n" . $e->getTraceAsString();
        error_log($errorMessage);
        return $this->response
            ->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
            ->setJSON([
                "status" => false,
                "message" => "An error occurred while updating client detail",
            ]);
    }
}


}
