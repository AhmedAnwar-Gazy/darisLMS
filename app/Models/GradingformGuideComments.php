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
 * Model GradingformGuideComments
 * frequently used comments used in marking guide
 */
class GradingformGuideComments extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'gradingform_guide_comments';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'definitionid' => 'integer',
        'sortorder' => 'integer',
        'description' => 'string',
        'descriptionformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function gradingDefinitions()
    {
        return $this->belongsTo(GradingDefinitions::class, 'definitionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'definitionid' => (int)$this->definitionid,
            'sortorder' => (int)$this->sortorder,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
        ];
    }

    public function searchableAs()
    {
        return 'gradingform_guide_comments_index';
    }
}
