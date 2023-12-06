<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\KlausulAudit;
use App\Models\Analisa;
use App\Models\FileUpload;

class SubKlausulAudit extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function klausul_audit(){ return $this->belongsTo(KlausulAudit::class);}
    public function file_upload(){ return $this->hasOne(FileUpload::class);}
    public function analisa(){ return $this->hasOne(Analisa::class);}
}
