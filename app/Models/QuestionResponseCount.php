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
 * Model QuestionResponseCount
 * Count for each responses for each try at a question.
 */
class QuestionResponseCount extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_response_count';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'analysisid' => 'integer',
        'try' => 'integer',
        'rcount' => 'integer',
    ];

    // Relationships: BelongsTo
    public function questionResponseAnalysis()
    {
        return $this->belongsTo(QuestionResponseAnalysis::class, 'analysisid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'analysisid' => (int)$this->analysisid,
            'try' => (int)$this->try,
            'rcount' => (int)$this->rcount,
        ];
    }

    public function searchableAs()
    {
        return 'question_response_count_index';
    }
}
