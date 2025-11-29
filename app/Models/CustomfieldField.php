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
 * Model CustomfieldField
 * core_customfield field table
 */
class CustomfieldField extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'customfield_field';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'shortname' => 'string',
        'name' => 'string',
        'type' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'sortorder' => 'integer',
        'categoryid' => 'integer',
        'configdata' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function customfieldCategory()
    {
        return $this->belongsTo(CustomfieldCategory::class, 'categoryid');
    }

    // Relationships: HasMany
    public function customfieldDatas()
    {
        return $this->hasMany(CustomfieldData::class, 'fieldid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'shortname' => (string)$this->shortname,
            'name' => (string)$this->name,
            'type' => (string)$this->type,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'sortorder' => (int)$this->sortorder,
            'categoryid' => (int)$this->categoryid,
            'configdata' => (string)$this->configdata,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'customfield_field_index';
    }
}
