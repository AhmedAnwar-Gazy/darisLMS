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
 * Model CustomfieldCategory
 * core_customfield category table
 */
class CustomfieldCategory extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'customfield_category';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'sortorder' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'component' => 'string',
        'area' => 'string',
        'itemid' => 'integer',
        'contextid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function customfieldFields()
    {
        return $this->hasMany(CustomfieldField::class, 'categoryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'sortorder' => (int)$this->sortorder,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'component' => (string)$this->component,
            'area' => (string)$this->area,
            'itemid' => (int)$this->itemid,
            'contextid' => (int)$this->contextid,
        ];
    }

    public function searchableAs()
    {
        return 'customfield_category_index';
    }
}
