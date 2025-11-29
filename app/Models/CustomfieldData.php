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
 * Model CustomfieldData
 * core_customfield data table
 */
class CustomfieldData extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'customfield_data';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'fieldid' => 'integer',
        'instanceid' => 'integer',
        'intvalue' => 'integer',
        'decvalue' => 'float',
        'shortcharvalue' => 'string',
        'charvalue' => 'string',
        'value' => 'string',
        'valueformat' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'contextid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function customfieldField()
    {
        return $this->belongsTo(CustomfieldField::class, 'fieldid');
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
            'fieldid' => (int)$this->fieldid,
            'instanceid' => (int)$this->instanceid,
            'intvalue' => (int)$this->intvalue,
            'decvalue' => (float)$this->decvalue,
            'shortcharvalue' => (string)$this->shortcharvalue,
            'charvalue' => (string)$this->charvalue,
            'value' => (string)$this->value,
            'valueformat' => (int)$this->valueformat,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'contextid' => (int)$this->contextid,
        ];
    }

    public function searchableAs()
    {
        return 'customfield_data_index';
    }
}
