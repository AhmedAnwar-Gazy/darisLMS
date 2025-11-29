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
 * Model ContentbankContent
 * This table stores content data in the content bank.
 */
class ContentbankContent extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'contentbank_content';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'contenttype' => 'string',
        'contextid' => 'integer',
        'visibility' => 'boolean',
        'instanceid' => 'integer',
        'configdata' => 'string',
        'usercreated' => 'integer',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usercreated');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'contenttype' => (string)$this->contenttype,
            'contextid' => (int)$this->contextid,
            'visibility' => (int)$this->visibility,
            'instanceid' => (int)$this->instanceid,
            'configdata' => (string)$this->configdata,
            'usercreated' => (int)$this->usercreated,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'contentbank_content_index';
    }
}
