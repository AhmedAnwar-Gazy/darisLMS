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
 * Model TagCorrelation
 * The rationale for the 'tag_correlation' table is performance.   It works as a cache for a potentially heavy load query done at the 'tag_instance' table.   So, the 'tag_correlation' table stores redundant information derived from the 'tag_instance' table
 */
class TagCorrelation extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tag_correlation';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'tagid' => 'integer',
        'correlatedtags' => 'string',
    ];

    // Relationships: BelongsTo
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tagid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'tagid' => (int)$this->tagid,
            'correlatedtags' => (string)$this->correlatedtags,
        ];
    }

    public function searchableAs()
    {
        return 'tag_correlation_index';
    }
}
