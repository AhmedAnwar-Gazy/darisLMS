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
 * Model BackupCourses
 * To store every course backup status
 */
class BackupCourses extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'backup_courses';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'laststarttime' => 'integer',
        'lastendtime' => 'integer',
        'laststatus' => 'string',
        'nextstarttime' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'laststarttime' => (int)$this->laststarttime,
            'lastendtime' => (int)$this->lastendtime,
            'laststatus' => (string)$this->laststatus,
            'nextstarttime' => (int)$this->nextstarttime,
        ];
    }

    public function searchableAs()
    {
        return 'backup_courses_index';
    }
}
