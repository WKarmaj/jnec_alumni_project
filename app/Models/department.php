<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    public function users()
    {
    return $this->hasMany(User::class);
    }
    protected $fillable = [
        'id',
        'department_name',
        'created_at',
        'updated_at'
    ];

    public function programmes()
    {
    return $this->hasMany(Programme::class);
    }
}
