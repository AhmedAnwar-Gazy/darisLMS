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
 * Model Tag
 * Tag table - this generic table will replace the old "tags" table.
 */
class Tag extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tag';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'tagcollid' => 'integer',
        'name' => 'string',
        'rawname' => 'string',
        'isstandard' => 'boolean',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'flag' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function tagColl()
    {
        return $this->belongsTo(TagColl::class, 'tagcollid');
    }

    // Relationships: HasMany
    public function tagCorrelations()
    {
        return $this->hasMany(TagCorrelation::class, 'tagid');
    }

    public function tagInstances()
    {
        return $this->hasMany(TagInstance::class, 'tagid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'tagcollid' => (int)$this->tagcollid,
            'name' => (string)$this->name,
            'rawname' => (string)$this->rawname,
            'isstandard' => (int)$this->isstandard,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'flag' => (int)$this->flag,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'tag_index';
    }
}
