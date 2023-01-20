<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $table = 'employees';
    public $fillable = [
        'user_id',
        'name',
        'company_name',
        'email',
        'phone',
    ];
}
