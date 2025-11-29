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
 * Model ToolDataprivacyRequest
 * Table for data requests
 */
class ToolDataprivacyRequest extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_dataprivacy_request';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        'comments' => 'string',
        'commentsformat' => 'integer',
        'userid' => 'integer',
        'requestedby' => 'integer',
        'status' => 'integer',
        'dpo' => 'integer',
        'dpocomment' => 'string',
        'dpocommentformat' => 'integer',
        'systemapproved' => 'integer',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'creationmethod' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'requestedby');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'dpo');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Relationships: HasMany
    public function toolDataprivacyRqstCtxlsts()
    {
        return $this->hasMany(ToolDataprivacyRqstCtxlst::class, 'requestid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'type' => (int)$this->type,
            'comments' => (string)$this->comments,
            'commentsformat' => (int)$this->commentsformat,
            'userid' => (int)$this->userid,
            'requestedby' => (int)$this->requestedby,
            'status' => (int)$this->status,
            'dpo' => (int)$this->dpo,
            'dpocomment' => (string)$this->dpocomment,
            'dpocommentformat' => (int)$this->dpocommentformat,
            'systemapproved' => (int)$this->systemapproved,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'creationmethod' => (int)$this->creationmethod,
        ];
    }

    public function searchableAs()
    {
        return 'tool_dataprivacy_request_index';
    }
}
