<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SousService extends Model
{
    use HasFactory;


    public function service(){
        return $this->belongsTo(Service::class,  'service_id','id');
    }


    public function Cover()
    {
        $photoPath = $this->image;
        if (str_starts_with($photoPath, 'https://')) {
            return $photoPath;
        }else{
            return Storage::url($photoPath);
        }
    }


}
