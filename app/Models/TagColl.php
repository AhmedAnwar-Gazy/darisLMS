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
 * Model TagColl
 * Defines different set of tags
 */
class TagColl extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tag_coll';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'isdefault' => 'integer',
        'component' => 'string',
        'sortorder' => 'integer',
        'searchable' => 'integer',
        'customurl' => 'string',
    ];

    // Relationships: HasMany
    public function tags()
    {
        return $this->hasMany(Tag::class, 'tagcollid');
    }

    public function tagAreas()
    {
        return $this->hasMany(TagArea::class, 'tagcollid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'isdefault' => (int)$this->isdefault,
            'component' => (string)$this->component,
            'sortorder' => (int)$this->sortorder,
            'searchable' => (int)$this->searchable,
            'customurl' => (string)$this->customurl,
        ];
    }

    public function searchableAs()
    {
        return 'tag_coll_index';
    }
}
