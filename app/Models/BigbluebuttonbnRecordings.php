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
 * Model BigbluebuttonbnRecordings
 * The bigbluebuttonbn table to store references to recordings
 */
class BigbluebuttonbnRecordings extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'bigbluebuttonbn_recordings';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'bigbluebuttonbnid' => 'integer',
        'groupid' => 'integer',
        'recordingid' => 'string',
        'headless' => 'boolean',
        'imported' => 'boolean',
        'status' => 'boolean',
        'importeddata' => 'string',
        'timecreated' => 'integer',
        'usermodified' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function bigbluebuttonbn()
    {
        return $this->belongsTo(Bigbluebuttonbn::class, 'bigbluebuttonbnid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'bigbluebuttonbnid' => (int)$this->bigbluebuttonbnid,
            'groupid' => (int)$this->groupid,
            'recordingid' => (string)$this->recordingid,
            'headless' => (int)$this->headless,
            'imported' => (int)$this->imported,
            'status' => (int)$this->status,
            'importeddata' => (string)$this->importeddata,
            'timecreated' => (int)$this->timecreated,
            'usermodified' => (int)$this->usermodified,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'bigbluebuttonbn_recordings_index';
    }
}
