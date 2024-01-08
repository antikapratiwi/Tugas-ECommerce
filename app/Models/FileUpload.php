<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\SubKlausulAudit;

class FileUpload extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = "file_upload";

    public function sub_klausul_audit(){ return $this->belongsTo(SubKlausulAudit::class);}
}
