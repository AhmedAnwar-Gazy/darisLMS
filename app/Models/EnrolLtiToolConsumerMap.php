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
 * Model EnrolLtiToolConsumerMap
 * Table that maps the published tool to tool consumers.
 */
class EnrolLtiToolConsumerMap extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_tool_consumer_map';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'toolid' => 'integer',
        'consumerid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function enrolLtiTools()
    {
        return $this->belongsTo(EnrolLtiTools::class, 'toolid');
    }

    public function enrolLtiLti2Consumer()
    {
        return $this->belongsTo(EnrolLtiLti2Consumer::class, 'consumerid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'toolid' => (int)$this->toolid,
            'consumerid' => (int)$this->consumerid,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_tool_consumer_map_index';
    }
}
