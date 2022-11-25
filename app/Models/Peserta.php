<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Lomba;

class Peserta extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'peserta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_lomba',
        'username',
        'kategori',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id_lomba' => 'integer',
        'kategori' => 'array',
    ];

    public function user() {
        return $this->hasOne(User::class, 'username', 'username');
    }

    public function lomba() {
        return $this->hasOne(Lomba::class, 'id', 'id_lomba');
    }
}
