<?php

namespace App\Models;

use \http\Url;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    public function cat(){
        return $this->belongsTo(Cat::class);
    }

    public function getFullPathAttribute(){
        if(isset(parse_url($this->path)['scheme'])){
            return $this->path;
        }
        return Storage::disk('public')->url($this->path);
    }
}
