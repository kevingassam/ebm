<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Information extends Model
{
    use HasFactory;


    public function GetLogo(){
        if ($this->logo) {
            return Storage::url($this->logo);
        } else {
            return "https://e-build.tn/assets/images/brand-logo.png";
        }

    }

    public function GetIcon(){
        if ($this->icon) {
            return Storage::url($this->icon);
        } else {
            return "https://e-build.tn/assets/favicon/apple-touch-icon.png";
        }

    }

    public function GetVideo(){
        if ($this->video) {
           return Storage::url($this->video);
        } else {
            return "/front/img/hero/hero-3-video.mp4";
        }

    }

    public function GetTypeMedia(){
        $media = $this->GetVideo();

        if ($media) {
            $extension = strtolower(pathinfo($media, PATHINFO_EXTENSION));
            $imageExtensions = ['jpeg', 'jpg', 'png', 'gif', 'svg'];
            $videoExtensions = ['mp4', 'mov', 'avi', 'mkv'];
            if (in_array($extension, $imageExtensions)) {
                return 'image';
            } elseif (in_array($extension, $videoExtensions)) {
                return 'video';
            } else {
                return 'unknown';
            }
        }

        return null;
    }


}
