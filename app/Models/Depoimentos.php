<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Depoimentos extends Model
{
    public const PATH_ANEXO = 'uploads/depoimentos';

    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        "nome",
        "profissao",
        "foto",
        "texto",
    ];

    /**
     * @param  UploadedFile  $value
     */
    public function setFotoAttribute(UploadedFile $value)
    {
        if ($this->foto) {
            Storage::disk('public_upload')
                ->delete(sprintf('%s/%s', 'depoimentos', $this->foto));
        }
        $this->attributes['foto'] = $value
            ->move(
                public_path(
                    self::PATH_ANEXO
                ),
                sprintf('%s.%s', md5(Carbon::now()), $value->extension())
            )
            ->getFilename();
    }

    protected static function boot()
    {
        parent::boot();

        $deleteCallback = function ($banner) {
            Storage::disk('public_upload')
                ->delete(sprintf('%s%s', 'depoimentos/', $banner->foto));
        };
        static::deleting($deleteCallback);
    }
}
