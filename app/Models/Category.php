<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name'];

    public function income():HasMany {
        return $this->hasMany(Income::class);
    }

    public function expense():HasMany {
        return $this->hasMany(Expense::class);
    }
}
