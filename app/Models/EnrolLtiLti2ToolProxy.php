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
 * Model EnrolLtiLti2ToolProxy
 * A tool proxy between moodle and a consumer
 */
class EnrolLtiLti2ToolProxy extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_lti2_tool_proxy';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'toolproxykey' => 'string',
        'consumerid' => 'integer',
        'toolproxy' => 'string',
        'created' => 'integer',
        'updated' => 'integer',
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
            'toolproxykey' => (string)$this->toolproxykey,
            'consumerid' => (int)$this->consumerid,
            'toolproxy' => (string)$this->toolproxy,
            'created' => (int)$this->created,
            'updated' => (int)$this->updated,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_lti2_tool_proxy_index';
    }
}
