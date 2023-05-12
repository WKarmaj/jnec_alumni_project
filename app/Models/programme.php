<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme_name',
        'department_id',
        'created_at',
        'updated_at'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function users()
    {
    return $this->hasMany(User::class);
    }

}
