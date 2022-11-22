<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Kegiatan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kegiatan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_kegiatan',
        'datetime_mulai',
        'datetime_akhir',
        'is_lomba',
        'id_lomba',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'datetime_mulai' => 'datetime:Y-m-d H:i',
        'datetime_akhir' => 'datetime:Y-m-d H:i',
        'is_lomba' => 'boolean',
        'id_lomba' => 'integer'
    ];

    public function user() {
        return $this->hasOne(User::class, 'username', 'username');
    }
}
