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
 * Model CompetencyFramework
 * List of competency frameworks.
 */
class CompetencyFramework extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'competency_framework';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'shortname' => 'string',
        'contextid' => 'integer',
        'idnumber' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'scaleid' => 'integer',
        'scaleconfiguration' => 'string',
        'visible' => 'integer',
        'taxonomies' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    public function scale()
    {
        return $this->belongsTo(Scale::class, 'scaleid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'shortname' => (string)$this->shortname,
            'contextid' => (int)$this->contextid,
            'idnumber' => (string)$this->idnumber,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'scaleid' => (int)$this->scaleid,
            'scaleconfiguration' => (string)$this->scaleconfiguration,
            'visible' => (int)$this->visible,
            'taxonomies' => (string)$this->taxonomies,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
        ];
    }

    public function searchableAs()
    {
        return 'competency_framework_index';
    }
}
