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
 * Model LtiTypesCategories
 * Link LTI types to course categories
 */
class LtiTypesCategories extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lti_types_categories';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'typeid' => 'integer',
        'categoryid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function ltiTypes()
    {
        return $this->belongsTo(LtiTypes::class, 'typeid');
    }

    public function courseCategories()
    {
        return $this->belongsTo(CourseCategories::class, 'categoryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'typeid' => (int)$this->typeid,
            'categoryid' => (int)$this->categoryid,
        ];
    }

    public function searchableAs()
    {
        return 'lti_types_categories_index';
    }
}
