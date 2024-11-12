<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Information extends Model
{
        protected $fillable = ['app_name', 'email1', 'email2', 'tel1', 'tel2', 'logo', 'icon', 'adresse1', 'adresse2', 'text_footer', 'slogan', 'map', 'video', 'facebook', 'twitter', 'youtube', 'instagram', 'linkedin', 'about_cover', 'about_titre', 'about_texte'];


    use HasFactory;


    public function GetLogo()
    {
        if ($this->logo) {
            return Storage::url($this->logo);
        } else {
            return "/img/logo.png";
        }
    }

    public function GetIcon()
    {
        if ($this->icon) {
            return Storage::url($this->icon);
        } else {
            return "/img/logo.png";
        }
    }

    public function GetVideo()
    {
        if ($this->video) {
            return Storage::url($this->video);
        } else {
            return "/front/img/hero/hero-3-video.mp4";
        }
    }


    public function GetAboutPhotoCover()
    {
        if ($this->about_cover) {
            return Storage::url($this->about_cover);
        } else {
            return "https://fakeimg.pl/750x349/?text=750x349";
        }
    }

    public function GetTypeMedia()
    {
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
