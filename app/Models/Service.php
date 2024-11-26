<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
        protected $fillable = ['titre', 'image', 'description', 'type'];


    use HasFactory;


    public function Cover()
    {
        $photoPath = $this->image;
        if (str_starts_with($photoPath, 'https://')) {
            return $photoPath;
        }else{
            return Storage::url($photoPath);
        }
    }



    public function SousServices(){
        return $this->hasMany(SousService::class);
    }


}
