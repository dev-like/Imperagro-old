<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    public const PATH_ANEXO = 'uploads/banners';

    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'title',
        'sub_title',
        'image',
    ];

    /**
     * @param  UploadedFile  $value
     */
    public function setImageAttribute(UploadedFile $value)
    {
        if ($this->image) {
            Storage::disk('public_upload')
                ->delete(sprintf('%s%s', 'banners/', $this->image));
        }
        $this->attributes['image'] = $value
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
                ->delete(sprintf('%s%s', 'banners/', $banner->image));
        };
        static::deleting($deleteCallback);
    }
}
