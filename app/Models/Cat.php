<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'birthday', 'description'];

    protected $casts = ['birthday' => 'datetime'];

    public function getAgeAttribute(){
        return $this->birthday->diffInYears(\Carbon\Carbon::now());
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function breed(){
        return $this->belongsTo(Breed::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
