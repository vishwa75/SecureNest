<?php

namespace App\Models;

use CodeIgniter\Model;

class TableDetailModel extends Model
{
    protected $table = 'TABLE_DETAIL';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'TABLE_NAME',
        'COLUMNS',
        'EXCLUDE_COLUMNS',
        'COLUMN_HEADER',
        'PRIMARY_KEY',
        'UNIQUE_VALUE',
        'AUTO_FILL_FIELDS',
        'CREATED_AT',
        'UPDATED_AT'
    ];

    public function getTableName()
    {
        return $this->table;
    }

}
