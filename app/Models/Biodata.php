<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'biodata';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'sabuk',
        'tgl_lahir',
        'alamat',
        'prestasi',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tgl_lahir' => 'date:Y-m-d',
        'prestasi' => 'array',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function dokumen() {
        return $this->hasMany(Dokumen::class, 'username', 'username');
    }

    public function biodata_ortu() {
        return $this->hasOne(BiodataOrtu::class, 'username', 'username');
    }
}
