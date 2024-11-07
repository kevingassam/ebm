<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Projet extends Model
{
    use HasFactory;



    public function Cover()
    {
        $photoPath = $this->photo;
        if ($photoPath && Storage::exists($photoPath)) {
            return Storage::url($photoPath);
        }
        return $photoPath;
    }


}
