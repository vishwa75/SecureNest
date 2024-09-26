<?php

namespace App\Models;

use CodeIgniter\Model;

class ServerDetailModel extends Model
{
    protected $table = 'SERVER_DETAILS';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'CLIENT_ID',
        'SERVER_NAME',
        'ENVIRONMENT',
        'IP_ADDRESS',
        'PORT',
        'OPERATING_SYSTEM',
        'STATUS',
        'USERNAME',
        'PASSWORD',
        'DISK_SPACE',
        'MEMORY',
        'ADDITIONAL_NOTES',
        'CREATED_AT',
        'UPDATED_AT'
    ];

    public function getTableName()
    {
        return $this->table;
    }

}
