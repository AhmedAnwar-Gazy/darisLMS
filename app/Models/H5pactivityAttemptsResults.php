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
 * Model H5pactivityAttemptsResults
 * H5Pactivities_attempts tracking info
 */
class H5pactivityAttemptsResults extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'h5pactivity_attempts_results';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'attemptid' => 'integer',
        'subcontent' => 'string',
        'timecreated' => 'integer',
        'interactiontype' => 'string',
        'description' => 'string',
        'correctpattern' => 'string',
        'response' => 'string',
        'additionals' => 'string',
        'rawscore' => 'integer',
        'maxscore' => 'integer',
        'duration' => 'integer',
        'completion' => 'boolean',
        'success' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function h5pactivityAttempts()
    {
        return $this->belongsTo(H5pactivityAttempts::class, 'attemptid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'attemptid' => (int)$this->attemptid,
            'subcontent' => (string)$this->subcontent,
            'timecreated' => (int)$this->timecreated,
            'interactiontype' => (string)$this->interactiontype,
            'description' => (string)$this->description,
            'correctpattern' => (string)$this->correctpattern,
            'response' => (string)$this->response,
            'additionals' => (string)$this->additionals,
            'rawscore' => (int)$this->rawscore,
            'maxscore' => (int)$this->maxscore,
            'duration' => (int)$this->duration,
            'completion' => (int)$this->completion,
            'success' => (int)$this->success,
        ];
    }

    public function searchableAs()
    {
        return 'h5pactivity_attempts_results_index';
    }
}
