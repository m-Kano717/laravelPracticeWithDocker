<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{   

    public $timestamps = false;

    public function categories(){
        return $this->belongsTo(Category::class, "categorie_id");
    }
}
