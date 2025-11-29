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
 * Model QuestionNumericalUnits
 * Optional unit options for numerical questions. This table is also used by the calculated question type.
 */
class QuestionNumericalUnits extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_numerical_units';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'question' => 'integer',
        'multiplier' => 'float',
        'unit' => 'string',
    ];

    // Relationships: BelongsTo
    public function questionRelation()
    {
        return $this->belongsTo(Question::class, 'question');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'question' => (int)$this->question,
            'multiplier' => (float)$this->multiplier,
            'unit' => (string)$this->unit,
        ];
    }

    public function searchableAs()
    {
        return 'question_numerical_units_index';
    }
}
