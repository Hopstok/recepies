<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    /** @var string $table */
    protected $table = 'users';

    /** @var array $fillable */
    protected $fillable = [
        'name',
        'surname',
        'username',
        'email',
        'password',
    ];

    /** @var array $hidden */
    protected $hidden = ['created_at', 'updated_at', 'password'];

    public function recipes(): HasMany
    {
        return $this->hasMany('Recipe');
    }
}
