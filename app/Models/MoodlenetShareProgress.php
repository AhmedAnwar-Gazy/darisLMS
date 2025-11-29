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
 * Model MoodlenetShareProgress
 * Records MoodleNet share progress
 */
class MoodlenetShareProgress extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'moodlenet_share_progress';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        'courseid' => 'integer',
        'cmid' => 'integer',
        'userid' => 'integer',
        'timecreated' => 'integer',
        'resourceurl' => 'string',
        'status' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'type' => (int)$this->type,
            'courseid' => (int)$this->courseid,
            'cmid' => (int)$this->cmid,
            'userid' => (int)$this->userid,
            'timecreated' => (int)$this->timecreated,
            'resourceurl' => (string)$this->resourceurl,
            'status' => (int)$this->status,
        ];
    }

    public function searchableAs()
    {
        return 'moodlenet_share_progress_index';
    }
}
