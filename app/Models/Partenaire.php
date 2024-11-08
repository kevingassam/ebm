<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Partenaire extends Model
{
    use HasFactory;


    public function Cover()
    {
        $photoPath = $this->logo;
        if (str_starts_with($photoPath, 'https://')) {
            return $photoPath;
        }else{
            return Storage::url($photoPath);
        }
    }

}
