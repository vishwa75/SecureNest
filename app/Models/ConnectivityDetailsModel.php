<?php

namespace App\Models;

use CodeIgniter\Model;

class ConnectivityDetailsModel extends Model
{
    protected $table = 'ConnectivityDetails';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['ClientID', 'ConnectionType', 'RDPType', 'RDPIP', 'ConnectionLink','SPOC','AdditionalDetails','CreateDate','LastUpdatedDate','IsActive'];

    public function getTableName()
    {
        return $this->table;
    }

}