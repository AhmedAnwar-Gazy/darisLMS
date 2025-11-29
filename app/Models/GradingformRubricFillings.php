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
 * Model GradingformRubricFillings
 * Stores the data of how the rubric is filled by a particular rater
 */
class GradingformRubricFillings extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'gradingform_rubric_fillings';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'instanceid' => 'integer',
        'criterionid' => 'integer',
        'levelid' => 'integer',
        'remark' => 'string',
        'remarkformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function gradingInstances()
    {
        return $this->belongsTo(GradingInstances::class, 'instanceid');
    }

    public function gradingformRubricCriteria()
    {
        return $this->belongsTo(GradingformRubricCriteria::class, 'criterionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'instanceid' => (int)$this->instanceid,
            'criterionid' => (int)$this->criterionid,
            'levelid' => (int)$this->levelid,
            'remark' => (string)$this->remark,
            'remarkformat' => (int)$this->remarkformat,
        ];
    }

    public function searchableAs()
    {
        return 'gradingform_rubric_fillings_index';
    }
}
