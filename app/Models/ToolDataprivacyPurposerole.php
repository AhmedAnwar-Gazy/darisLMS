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
 * Model ToolDataprivacyPurposerole
 * Data purpose overrides for a specific role
 */
class ToolDataprivacyPurposerole extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_dataprivacy_purposerole';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'purposeid' => 'integer',
        'roleid' => 'integer',
        'lawfulbases' => 'string',
        'sensitivedatareasons' => 'string',
        'retentionperiod' => 'string',
        'protected' => 'boolean',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function toolDataprivacyPurpose()
    {
        return $this->belongsTo(ToolDataprivacyPurpose::class, 'purposeid');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleid');
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
            'purposeid' => (int)$this->purposeid,
            'roleid' => (int)$this->roleid,
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
        return 'tool_dataprivacy_purposerole_index';
    }
}
