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
 * Model GradingformGuideFillings
 * Stores the data of how the guide is filled by a particular rater
 */
class GradingformGuideFillings extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'gradingform_guide_fillings';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'instanceid' => 'integer',
        'criterionid' => 'integer',
        'remark' => 'string',
        'remarkformat' => 'integer',
        'score' => 'float',
    ];

    // Relationships: BelongsTo
    public function gradingInstances()
    {
        return $this->belongsTo(GradingInstances::class, 'instanceid');
    }

    public function gradingformGuideCriteria()
    {
        return $this->belongsTo(GradingformGuideCriteria::class, 'criterionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'instanceid' => (int)$this->instanceid,
            'criterionid' => (int)$this->criterionid,
            'remark' => (string)$this->remark,
            'remarkformat' => (int)$this->remarkformat,
            'score' => (float)$this->score,
        ];
    }

    public function searchableAs()
    {
        return 'gradingform_guide_fillings_index';
    }
}
