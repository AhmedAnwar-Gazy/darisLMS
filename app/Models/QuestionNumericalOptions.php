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
 * Model QuestionNumericalOptions
 * Options for questions of type numerical This table is also used by the calculated question type
 */
class QuestionNumericalOptions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_numerical_options';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'question' => 'integer',
        'showunits' => 'integer',
        'unitsleft' => 'integer',
        'unitgradingtype' => 'integer',
        'unitpenalty' => 'float',
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
            'showunits' => (int)$this->showunits,
            'unitsleft' => (int)$this->unitsleft,
            'unitgradingtype' => (int)$this->unitgradingtype,
            'unitpenalty' => (float)$this->unitpenalty,
        ];
    }

    public function searchableAs()
    {
        return 'question_numerical_options_index';
    }
}
