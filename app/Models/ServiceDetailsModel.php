<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceDetailsModel extends Model
{
    protected $table = 'ServiceDetails';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['ID', 'ClientID', 'AppName', 'AppVersion', 'AppType', 'AppWebServer', 'AppWebServerVersion', 'AppWebServerPath', 'StartUp', 'ShutDown', 'AppDependency', 'AdditionalDetails', 'CreateDate', 'LastUpdatedDate', 'IsActive'];

    public function getTableName()
    {
        return $this->table;
    }

    

}