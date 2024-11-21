<?php

namespace App\Models;

use CodeIgniter\Model;

class ShowMenuModel extends Model
{
    protected $table = 'showmenu';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['MenuId', 'MenuTile', 'MenuIcon', 'CreateDate', 'LastUpdatedDate', 'IsActive'];

    public function getTableName()
    {
        return $this->table;
    }

    

}