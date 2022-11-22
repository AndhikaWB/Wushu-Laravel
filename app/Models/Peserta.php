<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Peserta extends Model
{
    use HasFactory;

    public function nama() {
        return $this->hasOne(User::class, 'username')->name;
    }
}
