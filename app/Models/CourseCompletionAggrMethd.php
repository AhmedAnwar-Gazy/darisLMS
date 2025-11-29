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
 * Model CourseCompletionAggrMethd
 * Course completion aggregation methods for criteria
 */
class CourseCompletionAggrMethd extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course_completion_aggr_methd';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'criteriatype' => 'integer',
        'method' => 'boolean',
        'value' => 'float',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'criteriatype' => (int)$this->criteriatype,
            'method' => (int)$this->method,
            'value' => (float)$this->value,
        ];
    }

    public function searchableAs()
    {
        return 'course_completion_aggr_methd_index';
    }
}
