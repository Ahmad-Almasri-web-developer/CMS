<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public function clients(){
        return $this->belongsToMany(Client::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
