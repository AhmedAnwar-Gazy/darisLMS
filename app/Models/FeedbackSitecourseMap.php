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
 * Model FeedbackSitecourseMap
 * feedback sitecourse map
 */
class FeedbackSitecourseMap extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'feedback_sitecourse_map';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'feedbackid' => 'integer',
        'courseid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function feedback()
    {
        return $this->belongsTo(Feedback::class, 'feedbackid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'feedbackid' => (int)$this->feedbackid,
            'courseid' => (int)$this->courseid,
        ];
    }

    public function searchableAs()
    {
        return 'feedback_sitecourse_map_index';
    }
}
