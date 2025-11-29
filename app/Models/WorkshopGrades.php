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
 * Model WorkshopGrades
 * How the reviewers filled-up the grading forms, given grades and comments
 */
class WorkshopGrades extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'workshop_grades';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'assessmentid' => 'integer',
        'strategy' => 'string',
        'dimensionid' => 'integer',
        'grade' => 'float',
        'peercomment' => 'string',
        'peercommentformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function workshopAssessments()
    {
        return $this->belongsTo(WorkshopAssessments::class, 'assessmentid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'assessmentid' => (int)$this->assessmentid,
            'strategy' => (string)$this->strategy,
            'dimensionid' => (int)$this->dimensionid,
            'grade' => (float)$this->grade,
            'peercomment' => (string)$this->peercomment,
            'peercommentformat' => (int)$this->peercommentformat,
        ];
    }

    public function searchableAs()
    {
        return 'workshop_grades_index';
    }
}
