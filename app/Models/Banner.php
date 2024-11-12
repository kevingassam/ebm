<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
        protected $fillable = ['titre', 'photo', 'btn_text'];


    use HasFactory;


    public function Cover()
    {
        $photoPath = $this->photo;
        if (str_starts_with($photoPath, 'https://')) {
            return $photoPath;
        }else{
            return Storage::url($photoPath);
        }
    }


}
