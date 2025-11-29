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
 * Model Files
 * description of files, content is stored in sha1 file pool
 */
class Files extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'files';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contenthash' => 'string',
        'pathnamehash' => 'string',
        'contextid' => 'integer',
        'component' => 'string',
        'filearea' => 'string',
        'itemid' => 'integer',
        'filepath' => 'string',
        'filename' => 'string',
        'userid' => 'integer',
        'filesize' => 'integer',
        'mimetype' => 'string',
        'status' => 'integer',
        'source' => 'string',
        'author' => 'string',
        'license' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'sortorder' => 'integer',
        'referencefileid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function filesReference()
    {
        return $this->belongsTo(FilesReference::class, 'referencefileid');
    }

    // Relationships: HasMany
    public function analyticsUsedFiless()
    {
        return $this->hasMany(AnalyticsUsedFiles::class, 'fileid');
    }

    public function fileConversions()
    {
        return $this->hasMany(FileConversion::class, 'sourcefileid');
    }

    public function fileConversions()
    {
        return $this->hasMany(FileConversion::class, 'destfileid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contenthash' => (string)$this->contenthash,
            'pathnamehash' => (string)$this->pathnamehash,
            'contextid' => (int)$this->contextid,
            'component' => (string)$this->component,
            'filearea' => (string)$this->filearea,
            'itemid' => (int)$this->itemid,
            'filepath' => (string)$this->filepath,
            'filename' => (string)$this->filename,
            'userid' => (int)$this->userid,
            'filesize' => (int)$this->filesize,
            'mimetype' => (string)$this->mimetype,
            'status' => (int)$this->status,
            'source' => (string)$this->source,
            'author' => (string)$this->author,
            'license' => (string)$this->license,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'sortorder' => (int)$this->sortorder,
            'referencefileid' => (int)$this->referencefileid,
        ];
    }

    public function searchableAs()
    {
        return 'files_index';
    }
}
