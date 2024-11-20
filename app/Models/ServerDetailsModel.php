<?php

namespace App\Models;

use CodeIgniter\Model;

class ServerDetailsModel extends Model
{
    protected $table = 'serverdetails';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['ClientID', 'Environment', 'Country', 'IP', 'UserName', 'Password','Memory','DiskSpace','OSVersion','AdditionalDetails','CreateDate','LastUpdatedDate','IsActive'];

    public function getTableName()
    {
        return $this->table;
    }

}