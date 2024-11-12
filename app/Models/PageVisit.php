<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    protected $fillable = ['page_name', 'user_ip', 'visit_date'];

    use HasFactory;
}
