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
 * Model CourseRequest
 * course requests
 */
class CourseRequest extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course_request';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'fullname' => 'string',
        'shortname' => 'string',
        'summary' => 'string',
        'summaryformat' => 'integer',
        'category' => 'integer',
        'reason' => 'string',
        'requester' => 'integer',
        'password' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'fullname' => (string)$this->fullname,
            'shortname' => (string)$this->shortname,
            'summary' => (string)$this->summary,
            'summaryformat' => (int)$this->summaryformat,
            'category' => (int)$this->category,
            'reason' => (string)$this->reason,
            'requester' => (int)$this->requester,
            'password' => (string)$this->password,
        ];
    }

    public function searchableAs()
    {
        return 'course_request_index';
    }
}
