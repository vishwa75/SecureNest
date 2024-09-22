<?php

namespace App\Controllers\Authentication;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;

class LoginAndRegisterController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    public function register(): ResponseInterface{
        // Define validation rules
        log_message('debug', 'Auth CONTROLLER @@@@@@@@@@@@');
        $rules = [
            "username" => "required|is_unique[users.username]",
            "email" => "required|valid_email|is_unique[auth_identities.secret]",
            "password" => "required"
        ];

        // Check if validation passes
        if (!$this->validate($rules)) {
            // Validation failed, return errors
            $response = [
                "status" => false,
                "message" => $this->validator->getErrors(), // get all validation errors
                "data" => []
            ];

            return $this->response->setJSON($response); // Return the JSON response
        } else {
            // Validation passed, save user data
            $userObject = new UserModel();

            $userEntityObject = new User([
                "username" => $this->request->getVar("username"),
                "email" => $this->request->getVar("email"),
                "password" => $this->request->getVar("password")
            ]);

            $userObject->save($userEntityObject);

            $response =[
            "status"=> true,
            "message"=> "user saved successfully",
            "data" => []
            ];
        }
        return $this->response
                ->setStatusCode(ResponseInterface::HTTP_CREATED) // Set status code 201
                ->setJSON($response);
    }
}
