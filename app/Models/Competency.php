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
 * Model Competency
 * This table contains the master record of each competency in a framework
 */
class Competency extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'competency';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'shortname' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'idnumber' => 'string',
        'competencyframeworkid' => 'integer',
        'parentid' => 'integer',
        'path' => 'string',
        'sortorder' => 'integer',
        'ruletype' => 'string',
        'ruleoutcome' => 'integer',
        'ruleconfig' => 'string',
        'scaleid' => 'integer',
        'scaleconfiguration' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function scale()
    {
        return $this->belongsTo(Scale::class, 'scaleid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Relationships: HasMany
    public function competencyModulecomps()
    {
        return $this->hasMany(CompetencyModulecomp::class, 'competencyid');
    }

    public function competencyRelatedcomps()
    {
        return $this->hasMany(CompetencyRelatedcomp::class, 'competencyid');
    }

    public function competencyRelatedcomps()
    {
        return $this->hasMany(CompetencyRelatedcomp::class, 'relatedcompetencyid');
    }

    public function competencyCoursecomps()
    {
        return $this->hasMany(CompetencyCoursecomp::class, 'competencyid');
    }

    public function competencyTemplatecomps()
    {
        return $this->hasMany(CompetencyTemplatecomp::class, 'competencyid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'shortname' => (string)$this->shortname,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'idnumber' => (string)$this->idnumber,
            'competencyframeworkid' => (int)$this->competencyframeworkid,
            'parentid' => (int)$this->parentid,
            'path' => (string)$this->path,
            'sortorder' => (int)$this->sortorder,
            'ruletype' => (string)$this->ruletype,
            'ruleoutcome' => (int)$this->ruleoutcome,
            'ruleconfig' => (string)$this->ruleconfig,
            'scaleid' => (int)$this->scaleid,
            'scaleconfiguration' => (string)$this->scaleconfiguration,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
        ];
    }

    public function searchableAs()
    {
        return 'competency_index';
    }
}
