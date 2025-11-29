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
 * Model CompetencyPlan
 * Learning plans
 */
class CompetencyPlan extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'competency_plan';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'userid' => 'integer',
        'templateid' => 'integer',
        'origtemplateid' => 'integer',
        'status' => 'boolean',
        'duedate' => 'integer',
        'reviewerid' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'userid' => (int)$this->userid,
            'templateid' => (int)$this->templateid,
            'origtemplateid' => (int)$this->origtemplateid,
            'status' => (int)$this->status,
            'duedate' => (int)$this->duedate,
            'reviewerid' => (int)$this->reviewerid,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
        ];
    }

    public function searchableAs()
    {
        return 'competency_plan_index';
    }
}
