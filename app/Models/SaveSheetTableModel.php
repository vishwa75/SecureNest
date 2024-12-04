<?php

namespace App\Models;

use CodeIgniter\Model;

class SaveSheetTableModel extends Model
{
    protected $table = 'savesheettable';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sheetdata'];

    public function getTableName()
    {
        return $this->table;
    }

}