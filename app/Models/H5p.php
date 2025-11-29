<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

/**
 * Model H5p
 * Stores H5P content information
 */
class H5p extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'h5p';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'jsoncontent' => 'string',
        'mainlibraryid' => 'integer',
        'displayoptions' => 'integer',
        'pathnamehash' => 'string',
        'contenthash' => 'string',
        'filtered' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function h5pLibraries()
    {
        return $this->belongsTo(H5pLibraries::class, 'mainlibraryid');
    }

    // Relationships: HasMany
    public function h5pContentsLibrariess()
    {
        return $this->hasMany(H5pContentsLibraries::class, 'h5pid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'jsoncontent' => (string)$this->jsoncontent,
            'mainlibraryid' => (int)$this->mainlibraryid,
            'displayoptions' => (int)$this->displayoptions,
            'pathnamehash' => (string)$this->pathnamehash,
            'contenthash' => (string)$this->contenthash,
            'filtered' => (string)$this->filtered,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'h5p_index';
    }
}
