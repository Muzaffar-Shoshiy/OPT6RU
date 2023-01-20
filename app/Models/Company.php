<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $table = 'companies';
    public $fillable = [
        'user_id',
        'name',
        'email',
        'logotip',
        'address',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
