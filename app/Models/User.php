<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\TimAuditor;
use App\Models\Unit;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [
        'id'
    ];
    protected $table = "user";

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // TODO hanya bisa diakses kalo user tipe AUDITOR  
    // public function tim_auditor(){ return $this->belongsTo(TimAuditor::class, "id_tim_auditor");}

    // TODO hanya bisa diakses kalo user tipe AUDITEE
    // public function unit(){ return $this->belongsTo(Unit::class, "id_unit");}
}
