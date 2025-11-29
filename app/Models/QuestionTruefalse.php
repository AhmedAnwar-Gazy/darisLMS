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
 * Model QuestionTruefalse
 * Options for True-False questions
 */
class QuestionTruefalse extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_truefalse';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'question' => 'integer',
        'trueanswer' => 'integer',
        'falseanswer' => 'integer',
        'showstandardinstruction' => 'integer',
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
            'trueanswer' => (int)$this->trueanswer,
            'falseanswer' => (int)$this->falseanswer,
            'showstandardinstruction' => (int)$this->showstandardinstruction,
        ];
    }

    public function searchableAs()
    {
        return 'question_truefalse_index';
    }
}
