<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Periode;
use App\Models\Unit;
use App\Models\TimAuditor;
use App\Models\Standar;
use App\Models\KlausulAudit;
use App\Models\Billing;
use App\Models\PutusanAudit;

class UnitAudit extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = "unit_audit";

    public function periode(){ return $this->belongsTo(Periode::class, 'id_periode');}
    public function unit(){ return $this->belongsTo(Unit::class, 'id_unit');}
    public function standar(){ return $this->belongsTo(Standar::class, 'id_standar');}
    public function tim_auditor(){ return $this->hasOne(TimAuditor::class, "id_unit_audit");}
    public function putusan_audit(){ return $this->hasOne(PutusanAudit::class, "id_unit_audit");}
    public function billing(){ return $this->hasOne(Billing::class, "id_unit_audit");}
    public function klausul_audits(){ return $this->hasMany(KlausulAudit::class, "id_unit_audit");}
}
