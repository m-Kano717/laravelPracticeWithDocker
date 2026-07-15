<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{   

    public $timestamps = false;

    public function categories(){
        return $this->belongsTo(categories::class, "categorie_id");
    }
}
