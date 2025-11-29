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
 * Model CompetencyModulecomp
 * Link a competency to a module.
 */
class CompetencyModulecomp extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'competency_modulecomp';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'cmid' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
        'sortorder' => 'integer',
        'competencyid' => 'integer',
        'ruleoutcome' => 'integer',
        'overridegrade' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function courseModules()
    {
        return $this->belongsTo(CourseModules::class, 'cmid');
    }

    public function competency()
    {
        return $this->belongsTo(Competency::class, 'competencyid');
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
            'cmid' => (int)$this->cmid,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
            'sortorder' => (int)$this->sortorder,
            'competencyid' => (int)$this->competencyid,
            'ruleoutcome' => (int)$this->ruleoutcome,
            'overridegrade' => (int)$this->overridegrade,
        ];
    }

    public function searchableAs()
    {
        return 'competency_modulecomp_index';
    }
}
