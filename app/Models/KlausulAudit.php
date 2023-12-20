<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\UnitAudit;
use App\Models\SubKlausulAudit;

class KlausulAudit extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function unit_audit(){ return $this->belongsTo(UnitAudit::class);}
    public function sub_klausul_audits(){ return $this->hasMany(SubKlausulAudit::class);}
}
