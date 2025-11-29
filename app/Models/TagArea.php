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
 * Model TagArea
 * Defines various tag areas, one area is identified by component and itemtype
 */
class TagArea extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tag_area';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'component' => 'string',
        'itemtype' => 'string',
        'enabled' => 'boolean',
        'tagcollid' => 'integer',
        'callback' => 'string',
        'callbackfile' => 'string',
        'showstandard' => 'boolean',
        'multiplecontexts' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function tagColl()
    {
        return $this->belongsTo(TagColl::class, 'tagcollid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'component' => (string)$this->component,
            'itemtype' => (string)$this->itemtype,
            'enabled' => (int)$this->enabled,
            'tagcollid' => (int)$this->tagcollid,
            'callback' => (string)$this->callback,
            'callbackfile' => (string)$this->callbackfile,
            'showstandard' => (int)$this->showstandard,
            'multiplecontexts' => (int)$this->multiplecontexts,
        ];
    }

    public function searchableAs()
    {
        return 'tag_area_index';
    }
}
