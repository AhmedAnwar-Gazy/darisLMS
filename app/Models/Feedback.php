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
 * Model Feedback
 * all feedbacks
 */
class Feedback extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'feedback';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'anonymous' => 'boolean',
        'email_notification' => 'boolean',
        'multiple_submit' => 'boolean',
        'autonumbering' => 'boolean',
        'site_after_submit' => 'string',
        'page_after_submit' => 'string',
        'page_after_submitformat' => 'integer',
        'publish_stats' => 'boolean',
        'timeopen' => 'integer',
        'timeclose' => 'integer',
        'timemodified' => 'integer',
        'completionsubmit' => 'boolean',
    ];

    // Relationships: HasMany
    public function feedbackCompleteds()
    {
        return $this->hasMany(FeedbackCompleted::class, 'feedback');
    }

    public function feedbackSitecourseMaps()
    {
        return $this->hasMany(FeedbackSitecourseMap::class, 'feedbackid');
    }

    public function feedbackCompletedtmps()
    {
        return $this->hasMany(FeedbackCompletedtmp::class, 'feedback');
    }

    public function feedbackItems()
    {
        return $this->hasMany(FeedbackItem::class, 'feedback');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'anonymous' => (int)$this->anonymous,
            'email_notification' => (int)$this->email_notification,
            'multiple_submit' => (int)$this->multiple_submit,
            'autonumbering' => (int)$this->autonumbering,
            'site_after_submit' => (string)$this->site_after_submit,
            'page_after_submit' => (string)$this->page_after_submit,
            'page_after_submitformat' => (int)$this->page_after_submitformat,
            'publish_stats' => (int)$this->publish_stats,
            'timeopen' => (int)$this->timeopen,
            'timeclose' => (int)$this->timeclose,
            'timemodified' => (int)$this->timemodified,
            'completionsubmit' => (int)$this->completionsubmit,
        ];
    }

    public function searchableAs()
    {
        return 'feedback_index';
    }
}
