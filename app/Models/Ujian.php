<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ujian extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ujian';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'datetime_mulai',
        'datetime_akhir',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'datetime_mulai' => 'datetime:Y-m-d H:i',
        'datetime_akhir' => 'datetime:Y-m-d H:i',
    ];

    public function user() {
        return $this->hasOne(User::class, 'username', 'username');
    }
}
