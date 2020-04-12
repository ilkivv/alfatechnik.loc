<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'catalogs';

    public function getCatalogItems()
    {
        return $this->where('active', 1)->get();
    }
}
