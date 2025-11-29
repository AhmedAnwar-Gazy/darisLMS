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
 * Model ToolDataprivacyCtxlevel
 * Default comment for the table, please edit me
 */
class ToolDataprivacyCtxlevel extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_dataprivacy_ctxlevel';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextlevel' => 'integer',
        'purposeid' => 'integer',
        'categoryid' => 'integer',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function toolDataprivacyCategory()
    {
        return $this->belongsTo(ToolDataprivacyCategory::class, 'categoryid');
    }

    public function toolDataprivacyPurpose()
    {
        return $this->belongsTo(ToolDataprivacyPurpose::class, 'purposeid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextlevel' => (int)$this->contextlevel,
            'purposeid' => (int)$this->purposeid,
            'categoryid' => (int)$this->categoryid,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'tool_dataprivacy_ctxlevel_index';
    }
}
