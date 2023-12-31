<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public $timestamps = FALSE;

    public function card()
    {
        return $this->hasMany(Card::class);
    }
}
