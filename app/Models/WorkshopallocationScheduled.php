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
 * Model WorkshopallocationScheduled
 * Stores the allocation settings for the scheduled allocator
 */
class WorkshopallocationScheduled extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'workshopallocation_scheduled';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'workshopid' => 'integer',
        'enabled' => 'integer',
        'submissionend' => 'integer',
        'timeallocated' => 'integer',
        'settings' => 'string',
        'resultstatus' => 'integer',
        'resultmessage' => 'string',
        'resultlog' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'workshopid' => (int)$this->workshopid,
            'enabled' => (int)$this->enabled,
            'submissionend' => (int)$this->submissionend,
            'timeallocated' => (int)$this->timeallocated,
            'settings' => (string)$this->settings,
            'resultstatus' => (int)$this->resultstatus,
            'resultmessage' => (string)$this->resultmessage,
            'resultlog' => (string)$this->resultlog,
        ];
    }

    public function searchableAs()
    {
        return 'workshopallocation_scheduled_index';
    }
}
