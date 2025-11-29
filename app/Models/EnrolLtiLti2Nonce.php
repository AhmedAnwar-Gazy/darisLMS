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
 * Model EnrolLtiLti2Nonce
 * Nonce used for authentication between moodle and a consumer
 */
class EnrolLtiLti2Nonce extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_lti2_nonce';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'consumerid' => 'integer',
        'value' => 'string',
        'expires' => 'integer',
    ];

    // Relationships: BelongsTo
    public function enrolLtiLti2Consumer()
    {
        return $this->belongsTo(EnrolLtiLti2Consumer::class, 'consumerid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'consumerid' => (int)$this->consumerid,
            'value' => (string)$this->value,
            'expires' => (int)$this->expires,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_lti2_nonce_index';
    }
}
