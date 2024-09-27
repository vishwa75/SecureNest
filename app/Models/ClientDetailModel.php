<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientDetailModel extends Model
{
    protected $table = 'CLIENT_DETAIL';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'CLIENT_ID',
        'ESTABLISHMENT_NAME',
        'COUNTRY',
        'PREFERRED_CONTACT_METHOD',
        'CLIENT_SPOC',
        'CLIENT_SPOC_CONTACT_DETAIL',
        'SUPPORT_SPOC',
        'SUPPORT_SPOC_CONTACT_DETAIL',
        'ADDITIONAL_NOTES',
        'CREATED_AT',
        'UPDATED_AT'
    ];

    public function getTableName()
    {
        return $this->table;
    }

}
