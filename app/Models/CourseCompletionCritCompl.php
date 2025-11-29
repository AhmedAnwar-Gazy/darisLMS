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
 * Model CourseCompletionCritCompl
 * Course completion user records
 */
class CourseCompletionCritCompl extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course_completion_crit_compl';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'course' => 'integer',
        'criteriaid' => 'integer',
        'gradefinal' => 'float',
        'unenroled' => 'integer',
        'timecompleted' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'course' => (int)$this->course,
            'criteriaid' => (int)$this->criteriaid,
            'gradefinal' => (float)$this->gradefinal,
            'unenroled' => (int)$this->unenroled,
            'timecompleted' => (int)$this->timecompleted,
        ];
    }

    public function searchableAs()
    {
        return 'course_completion_crit_compl_index';
    }
}
