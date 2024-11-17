<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceDetailsModel extends Model
{
    protected $table = 'ServiceDetails';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['ClientID', 'AppName', 'AppVersion', 'AppType', 'ApplicationServer','ApplicationServerVersion','WebserverVersion','AppDependency','AdditionalDetails','CreateDate','LastUpdatedDate','IsActive'];

    public function getTableName()
    {
        return $this->table;
    }

}