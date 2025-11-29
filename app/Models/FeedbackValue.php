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
 * Model FeedbackValue
 * values of the completeds
 */
class FeedbackValue extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'feedback_value';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'item' => 'integer',
        'completed' => 'integer',
        'tmp_completed' => 'integer',
        'value' => 'string',
    ];

    // Relationships: BelongsTo
    public function feedbackItem()
    {
        return $this->belongsTo(FeedbackItem::class, 'item');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course_id' => (int)$this->course_id,
            'item' => (int)$this->item,
            'completed' => (int)$this->completed,
            'tmp_completed' => (int)$this->tmp_completed,
            'value' => (string)$this->value,
        ];
    }

    public function searchableAs()
    {
        return 'feedback_value_index';
    }
}
