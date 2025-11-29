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
 * Model ReportbuilderAudience
 * Defines report audience
 */
class ReportbuilderAudience extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'reportbuilder_audience';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'reportid' => 'integer',
        'heading' => 'string',
        'classname' => 'string',
        'configdata' => 'string',
        'usercreated' => 'integer',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function reportbuilderReport()
    {
        return $this->belongsTo(ReportbuilderReport::class, 'reportid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usercreated');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'reportid' => (int)$this->reportid,
            'heading' => (string)$this->heading,
            'classname' => (string)$this->classname,
            'configdata' => (string)$this->configdata,
            'usercreated' => (int)$this->usercreated,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'reportbuilder_audience_index';
    }
}
