<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Pembayaran;
use App\Models\UnitAudit;

class Billing extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = "billing";

    public function pembayarans(){ return $this->hasMany(Pembayaran::class, "id_billing");}
    public function unit_audit(){ return $this->belongsTo(UnitAudit::class, "id_unit_audit");}
}
