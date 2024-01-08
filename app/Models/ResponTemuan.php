<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Temuan;
use App\Models\AnalisaLanjutan;
use App\Models\FileUploadLanjutan;

class ResponTemuan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = "respon_temuan";

    public function temuan(){ return $this->belongsTo(Temuan::class, "id_temuan");}
    public function analisa_lanjutan(){ return $this->hasOne(AnalisaLanjutan::class, "id_respon_temuan");}
    public function file_upload_lanjutan(){ return $this->hasOne(FileUploadLanjutan::class, "id_respon_temuan");}
}
