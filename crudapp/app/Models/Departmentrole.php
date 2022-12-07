<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departmentrole extends Model
{
    use HasFactory;
    protected $fillable = ['dep_id', 'role_id'];
}
