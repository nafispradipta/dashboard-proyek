<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'notes'
    ];
    
    protected $hidden = ['created_at', 'updated_at'];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
