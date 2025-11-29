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
 * Model WorkshopformRubric
 * The assessment dimensions definitions of Rubric grading strategy forms
 */
class WorkshopformRubric extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'workshopform_rubric';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'workshopid' => 'integer',
        'sort' => 'integer',
        'description' => 'string',
        'descriptionformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshopid');
    }

    // Relationships: HasMany
    public function workshopformRubricLevelss()
    {
        return $this->hasMany(WorkshopformRubricLevels::class, 'dimensionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'workshopid' => (int)$this->workshopid,
            'sort' => (int)$this->sort,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
        ];
    }

    public function searchableAs()
    {
        return 'workshopform_rubric_index';
    }
}
