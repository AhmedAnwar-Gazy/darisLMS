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
 * Model FileConversion
 * Table to track file conversions.
 */
class FileConversion extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'file_conversion';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'sourcefileid' => 'integer',
        'targetformat' => 'string',
        'status' => 'integer',
        'statusmessage' => 'string',
        'converter' => 'string',
        'destfileid' => 'integer',
        'data' => 'string',
    ];

    // Relationships: BelongsTo
    public function files()
    {
        return $this->belongsTo(Files::class, 'sourcefileid');
    }

    public function files()
    {
        return $this->belongsTo(Files::class, 'destfileid');
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
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'sourcefileid' => (int)$this->sourcefileid,
            'targetformat' => (string)$this->targetformat,
            'status' => (int)$this->status,
            'statusmessage' => (string)$this->statusmessage,
            'converter' => (string)$this->converter,
            'destfileid' => (int)$this->destfileid,
            'data' => (string)$this->data,
        ];
    }

    public function searchableAs()
    {
        return 'file_conversion_index';
    }
}
