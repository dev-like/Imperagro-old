<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Galeria extends Model
{
    public const PATH_ANEXO = 'uploads/galeria';

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'file',
        'descricao',
        'evento_id',
    ];

    /**
     * @param  UploadedFile  $value
     */
    public function setFileAttribute(UploadedFile $value)
    {
        if ($this->file) {
            Storage::disk('public_upload')
                ->delete(sprintf('%s%s', 'galeria/', $this->file));
        }
        $this->attributes['file'] = $value
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

        $deleteCallback = function ($galeria) {
            Storage::disk('public_upload')
                ->delete(sprintf('%s%s', 'galeria/', $galeria->file));
        };
        static::deleting($deleteCallback);
    }
}
