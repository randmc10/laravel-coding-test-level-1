<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory; 
    use Uuid;

    protected $table = 'events';
    protected $fillable = ['name', 'slug', 'startAt', 'endAt'];
}
