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
 * Model TagInstance
 * tag_instance table holds the information of associations between tags and other items
 */
class TagInstance extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tag_instance';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'tagid' => 'integer',
        'component' => 'string',
        'itemtype' => 'string',
        'itemid' => 'integer',
        'contextid' => 'integer',
        'tiuserid' => 'integer',
        'ordering' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tagid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'tagid' => (int)$this->tagid,
            'component' => (string)$this->component,
            'itemtype' => (string)$this->itemtype,
            'itemid' => (int)$this->itemid,
            'contextid' => (int)$this->contextid,
            'tiuserid' => (int)$this->tiuserid,
            'ordering' => (int)$this->ordering,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'tag_instance_index';
    }
}
