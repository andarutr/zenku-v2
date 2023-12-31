<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public $timestamps = FALSE;

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
