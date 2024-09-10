<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Eventos extends Model
{
    public const PATH_ANEXO = 'uploads/eventos';

    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'data_evento' => 'datetime:Y-m-d',
    ];
    protected $fillable = [
        "titulo",
        "sub_titulo",
        "descricao",
        "slug",
        "data_evento",
        "categoria_id",
        "foto",
    ];

    /**
     * @param  UploadedFile  $value
     */
    public function setFotoAttribute(UploadedFile $value)
    {
        if ($this->foto) {
            Storage::disk('public_upload')
                ->delete(sprintf('%s%s', 'eventos/', $this->foto));
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

    public function setTituloAttribute($value)
    {
        $this->attributes['titulo'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    /**
     * @return BelongsTo
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categorias::class);
    }

    /**
     * @return HasMany
     */
    public function galeria(): HasMany
    {
        return $this->hasMany(Galeria::class, 'evento_id');
    }

    protected static function boot()
    {
        parent::boot();

        $deleteCallback = function ($evento) {
            Storage::disk('public_upload')
                ->delete(sprintf('%s%s', 'eventos/', $evento->foto));
        };
        static::deleting($deleteCallback);
    }
}
