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


    //recuperatin des couvertures
    public function GetCoverBlog(){
        if ($this->cover_blog) {
            return Storage::url($this->cover_blog);
        } else {
            return "/front/img/bg/breadcumb-bg.jpg";
        }
    }
    public function GetCoverContact(){
        if ($this->cover_contact) {
            return Storage::url($this->cover_contact);
        } else {
            return "/front/img/bg/breadcumb-bg.jpg";
        }
    }
    public function GetCoverProjet(){
        if ($this->cover_projet) {
            return Storage::url($this->cover_projet);
        } else {
            return "/front/img/bg/breadcumb-bg.jpg";
        }
    }
    public function GetCoverAbout(){
        if ($this->cover_about) {
            return Storage::url($this->cover_about);
        } else {
            return "/front/img/bg/breadcumb-bg.jpg";
        }
    }

    public function GetCoverContact2(){
        if ($this->cover_contact2) {
            return Storage::url($this->cover_contact2);
        } else {
            return "/front/img/bg/contact-bg-1-1.png";
        }
    }

}
