<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

public function tags(){
    return $this->belongsToMany(Tag::class);
}
public function offers(){
    return $this->belongsToMany(Offer::class);
}



}
