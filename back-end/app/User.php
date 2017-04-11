<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname','username','email', 'password',
    ];

    public function recipes(): HasMany
    {
        return $this->hasMany('App/Recipe');
    }

}
