<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Projet extends Model
{
    protected $fillable = ['nom', 'photo', 'photos', 'description'];

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
