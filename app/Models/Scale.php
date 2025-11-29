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
 * Model Scale
 * Defines grading scales
 */
class Scale extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scale';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'userid' => 'integer',
        'name' => 'string',
        'scale' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Relationships: HasMany
    public function gradeOutcomess()
    {
        return $this->hasMany(GradeOutcomes::class, 'scaleid');
    }

    public function competencyFrameworks()
    {
        return $this->hasMany(CompetencyFramework::class, 'scaleid');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'scaleid');
    }

    public function competencys()
    {
        return $this->hasMany(Competency::class, 'scaleid');
    }

    public function scaleHistorys()
    {
        return $this->hasMany(ScaleHistory::class, 'oldid');
    }

    public function gradeOutcomesHistorys()
    {
        return $this->hasMany(GradeOutcomesHistory::class, 'scaleid');
    }

    public function gradeItemss()
    {
        return $this->hasMany(GradeItems::class, 'scaleid');
    }

    public function gradeGradess()
    {
        return $this->hasMany(GradeGrades::class, 'rawscaleid');
    }

    public function gradeItemsHistorys()
    {
        return $this->hasMany(GradeItemsHistory::class, 'scaleid');
    }

    public function gradeGradesHistorys()
    {
        return $this->hasMany(GradeGradesHistory::class, 'rawscaleid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'userid' => (int)$this->userid,
            'name' => (string)$this->name,
            'scale' => (string)$this->scale,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'scale_index';
    }
}
