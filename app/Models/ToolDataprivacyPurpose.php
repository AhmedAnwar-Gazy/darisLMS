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
 * Model ToolDataprivacyPurpose
 * Data purposes
 */
class ToolDataprivacyPurpose extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_dataprivacy_purpose';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'descriptionformat' => 'boolean',
        'lawfulbases' => 'string',
        'sensitivedatareasons' => 'string',
        'retentionperiod' => 'string',
        'protected' => 'boolean',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: HasMany
    public function toolDataprivacyCtxlevels()
    {
        return $this->hasMany(ToolDataprivacyCtxlevel::class, 'purposeid');
    }

    public function toolDataprivacyCtxinstances()
    {
        return $this->hasMany(ToolDataprivacyCtxinstance::class, 'purposeid');
    }

    public function toolDataprivacyPurposeroles()
    {
        return $this->hasMany(ToolDataprivacyPurposerole::class, 'purposeid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'lawfulbases' => (string)$this->lawfulbases,
            'sensitivedatareasons' => (string)$this->sensitivedatareasons,
            'retentionperiod' => (string)$this->retentionperiod,
            'protected' => (int)$this->protected,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'tool_dataprivacy_purpose_index';
    }
}
