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
 * Model ToolBrickfieldSummary
 * Contains accessibility check results summary information.
 */
class ToolBrickfieldSummary extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_brickfield_summary';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'status' => 'boolean',
        'activities' => 'integer',
        'activitiespassed' => 'integer',
        'activitiesfailed' => 'integer',
        'errorschecktype1' => 'integer',
        'errorschecktype2' => 'integer',
        'errorschecktype3' => 'integer',
        'errorschecktype4' => 'integer',
        'errorschecktype5' => 'integer',
        'errorschecktype6' => 'integer',
        'errorschecktype7' => 'integer',
        'failedchecktype1' => 'integer',
        'failedchecktype2' => 'integer',
        'failedchecktype3' => 'integer',
        'failedchecktype4' => 'integer',
        'failedchecktype5' => 'integer',
        'failedchecktype6' => 'integer',
        'failedchecktype7' => 'integer',
        'percentchecktype1' => 'integer',
        'percentchecktype2' => 'integer',
        'percentchecktype3' => 'integer',
        'percentchecktype4' => 'integer',
        'percentchecktype5' => 'integer',
        'percentchecktype6' => 'integer',
        'percentchecktype7' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'status' => (int)$this->status,
            'activities' => (int)$this->activities,
            'activitiespassed' => (int)$this->activitiespassed,
            'activitiesfailed' => (int)$this->activitiesfailed,
            'errorschecktype1' => (int)$this->errorschecktype1,
            'errorschecktype2' => (int)$this->errorschecktype2,
            'errorschecktype3' => (int)$this->errorschecktype3,
            'errorschecktype4' => (int)$this->errorschecktype4,
            'errorschecktype5' => (int)$this->errorschecktype5,
            'errorschecktype6' => (int)$this->errorschecktype6,
            'errorschecktype7' => (int)$this->errorschecktype7,
            'failedchecktype1' => (int)$this->failedchecktype1,
            'failedchecktype2' => (int)$this->failedchecktype2,
            'failedchecktype3' => (int)$this->failedchecktype3,
            'failedchecktype4' => (int)$this->failedchecktype4,
            'failedchecktype5' => (int)$this->failedchecktype5,
            'failedchecktype6' => (int)$this->failedchecktype6,
            'failedchecktype7' => (int)$this->failedchecktype7,
            'percentchecktype1' => (int)$this->percentchecktype1,
            'percentchecktype2' => (int)$this->percentchecktype2,
            'percentchecktype3' => (int)$this->percentchecktype3,
            'percentchecktype4' => (int)$this->percentchecktype4,
            'percentchecktype5' => (int)$this->percentchecktype5,
            'percentchecktype6' => (int)$this->percentchecktype6,
            'percentchecktype7' => (int)$this->percentchecktype7,
        ];
    }

    public function searchableAs()
    {
        return 'tool_brickfield_summary_index';
    }
}
