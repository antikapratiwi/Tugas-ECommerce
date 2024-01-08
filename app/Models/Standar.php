<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Standar extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
<<<<<<< Updated upstream
=======

    protected $dates = [
        'tgl_rilis'
    ];
    
    protected $table = "standar";

    public function unit_audits(){ return $this->hasMany(UnitAudit::class, 'id_standar');}
    public function klausuls(){ return $this->hasMany(Klausul::class, 'id_standar');}
>>>>>>> Stashed changes
}
