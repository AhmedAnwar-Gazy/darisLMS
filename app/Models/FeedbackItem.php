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
 * Model FeedbackItem
 * feedback_items
 */
class FeedbackItem extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'feedback_item';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'feedback' => 'integer',
        'template' => 'integer',
        'name' => 'string',
        'label' => 'string',
        'presentation' => 'string',
        'typ' => 'string',
        'hasvalue' => 'boolean',
        'position' => 'integer',
        'required' => 'boolean',
        'dependitem' => 'integer',
        'dependvalue' => 'string',
        'options' => 'string',
    ];

    // Relationships: BelongsTo
    public function feedbackRelation()
    {
        return $this->belongsTo(Feedback::class, 'feedback');
    }

    public function feedbackTemplate()
    {
        return $this->belongsTo(FeedbackTemplate::class, 'template');
    }

    // Relationships: HasMany
    public function feedbackValues()
    {
        return $this->hasMany(FeedbackValue::class, 'item');
    }

    public function feedbackValuetmps()
    {
        return $this->hasMany(FeedbackValuetmp::class, 'item');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'feedback' => (int)$this->feedback,
            'template' => (int)$this->template,
            'name' => (string)$this->name,
            'label' => (string)$this->label,
            'presentation' => (string)$this->presentation,
            'typ' => (string)$this->typ,
            'hasvalue' => (int)$this->hasvalue,
            'position' => (int)$this->position,
            'required' => (int)$this->required,
            'dependitem' => (int)$this->dependitem,
            'dependvalue' => (string)$this->dependvalue,
            'options' => (string)$this->options,
        ];
    }

    public function searchableAs()
    {
        return 'feedback_item_index';
    }
}
