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
 * Model QuizOverviewRegrades
 * This table records which question attempts need regrading and the grade they will be regraded to.
 */
class QuizOverviewRegrades extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'quiz_overview_regrades';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionusageid' => 'integer',
        'slot' => 'integer',
        'newfraction' => 'float',
        'oldfraction' => 'float',
        'regraded' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function questionAttempts()
    {
        return $this->belongsTo(QuestionAttempts::class, 'questionusageid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'questionusageid' => (int)$this->questionusageid,
            'slot' => (int)$this->slot,
            'newfraction' => (float)$this->newfraction,
            'oldfraction' => (float)$this->oldfraction,
            'regraded' => (int)$this->regraded,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'quiz_overview_regrades_index';
    }
}
