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
 * Model ToolRecyclebinCategory
 * A list of items in the category recycle bin
 */
class ToolRecyclebinCategory extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_recyclebin_category';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'categoryid' => 'integer',
        'shortname' => 'string',
        'fullname' => 'string',
        'timecreated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function courseCategories()
    {
        return $this->belongsTo(CourseCategories::class, 'categoryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'categoryid' => (int)$this->categoryid,
            'shortname' => (string)$this->shortname,
            'fullname' => (string)$this->fullname,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'tool_recyclebin_category_index';
    }
}
