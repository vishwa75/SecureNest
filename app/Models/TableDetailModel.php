<?php

namespace App\Models;

use CodeIgniter\Model;

class TableDetailModel extends Model
{
    protected $table = 'tabledetails';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['TableName', 'ColumnPrimaryKey', 'ColumnUnique', 'ColumnFullList', 'ColumnHeader', 'ColumnHidden', 'ColumnModeDetails', 'CreateDate', 'LastUpdatedDate', 'IsActive'];

    public function getTableName()
    {
        return $this->table;
    }

    

}