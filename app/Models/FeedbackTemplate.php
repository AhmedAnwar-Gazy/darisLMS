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
 * Model FeedbackTemplate
 * templates of feedbackstructures
 */
class FeedbackTemplate extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'feedback_template';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'ispublic' => 'boolean',
        'name' => 'string',
    ];

    // Relationships: HasMany
    public function feedbackItems()
    {
        return $this->hasMany(FeedbackItem::class, 'template');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'ispublic' => (int)$this->ispublic,
            'name' => (string)$this->name,
        ];
    }

    public function searchableAs()
    {
        return 'feedback_template_index';
    }
}
