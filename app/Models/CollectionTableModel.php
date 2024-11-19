<?php

namespace App\Models;

use CodeIgniter\Model;

class CollectionTableModel extends Model
{
    protected $table = 'CollectionTable';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['ClientID', 'CollectionName', 'collectionDescription', 'MakerId', 'Maker', 'CreateDate', 'LastUpdatedDate', 'IsActive'];

    public function getTableName()
    {
        return $this->table;
    }

    

}