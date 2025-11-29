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
 * Model LtiCoursevisible
 * Table to store coursevisible setting for site tool on course level
 */
class LtiCoursevisible extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lti_coursevisible';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'typeid' => 'integer',
        'courseid' => 'integer',
        'coursevisible' => 'boolean',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'typeid' => (int)$this->typeid,
            'courseid' => (int)$this->courseid,
            'coursevisible' => (int)$this->coursevisible,
        ];
    }

    public function searchableAs()
    {
        return 'lti_coursevisible_index';
    }
}
