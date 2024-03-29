<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndTime extends Model
{
    use HasFactory;
    protected $table = 'end_times';
    protected $guarded = false;
}
