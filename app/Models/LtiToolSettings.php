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
 * Model LtiToolSettings
 * LTI tool setting values
 */
class LtiToolSettings extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lti_tool_settings';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'toolproxyid' => 'integer',
        'typeid' => 'integer',
        'course' => 'integer',
        'coursemoduleid' => 'integer',
        'settings' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function ltiToolProxies()
    {
        return $this->belongsTo(LtiToolProxies::class, 'toolproxyid');
    }

    public function ltiTypes()
    {
        return $this->belongsTo(LtiTypes::class, 'typeid');
    }

    public function courseRelation()
    {
        return $this->belongsTo(Course::class, 'course');
    }

    public function lti()
    {
        return $this->belongsTo(Lti::class, 'coursemoduleid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'toolproxyid' => (int)$this->toolproxyid,
            'typeid' => (int)$this->typeid,
            'course' => (int)$this->course,
            'coursemoduleid' => (int)$this->coursemoduleid,
            'settings' => (string)$this->settings,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'lti_tool_settings_index';
    }
}
