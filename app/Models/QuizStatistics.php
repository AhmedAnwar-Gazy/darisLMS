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
 * Model QuizStatistics
 * table to cache results from analysis done in statistics report for quizzes.
 */
class QuizStatistics extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'quiz_statistics';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'hashcode' => 'string',
        'whichattempts' => 'integer',
        'timemodified' => 'integer',
        'firstattemptscount' => 'integer',
        'highestattemptscount' => 'integer',
        'lastattemptscount' => 'integer',
        'allattemptscount' => 'integer',
        'firstattemptsavg' => 'float',
        'highestattemptsavg' => 'float',
        'lastattemptsavg' => 'float',
        'allattemptsavg' => 'float',
        'median' => 'float',
        'standarddeviation' => 'float',
        'skewness' => 'float',
        'kurtosis' => 'float',
        'cic' => 'float',
        'errorratio' => 'float',
        'standarderror' => 'float',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'hashcode' => (string)$this->hashcode,
            'whichattempts' => (int)$this->whichattempts,
            'timemodified' => (int)$this->timemodified,
            'firstattemptscount' => (int)$this->firstattemptscount,
            'highestattemptscount' => (int)$this->highestattemptscount,
            'lastattemptscount' => (int)$this->lastattemptscount,
            'allattemptscount' => (int)$this->allattemptscount,
            'firstattemptsavg' => (float)$this->firstattemptsavg,
            'highestattemptsavg' => (float)$this->highestattemptsavg,
            'lastattemptsavg' => (float)$this->lastattemptsavg,
            'allattemptsavg' => (float)$this->allattemptsavg,
            'median' => (float)$this->median,
            'standarddeviation' => (float)$this->standarddeviation,
            'skewness' => (float)$this->skewness,
            'kurtosis' => (float)$this->kurtosis,
            'cic' => (float)$this->cic,
            'errorratio' => (float)$this->errorratio,
            'standarderror' => (float)$this->standarderror,
        ];
    }

    public function searchableAs()
    {
        return 'quiz_statistics_index';
    }
}
