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
 * Model ScormAttempt
 * List of SCORM attempts made by user.
 */
class ScormAttempt extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scorm_attempt';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'scormid' => 'integer',
        'attempt' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function scorm()
    {
        return $this->belongsTo(Scorm::class, 'scormid');
    }

    // Relationships: HasMany
    public function scormScoesValues()
    {
        return $this->hasMany(ScormScoesValue::class, 'attemptid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'scormid' => (int)$this->scormid,
            'attempt' => (int)$this->attempt,
        ];
    }

    public function searchableAs()
    {
        return 'scorm_attempt_index';
    }
}
