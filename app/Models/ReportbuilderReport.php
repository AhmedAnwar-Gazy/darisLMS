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
 * Model ReportbuilderReport
 * Table to represent a report
 */
class ReportbuilderReport extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'reportbuilder_report';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'source' => 'string',
        'type' => 'integer',
        'uniquerows' => 'boolean',
        'conditiondata' => 'string',
        'settingsdata' => 'string',
        'contextid' => 'integer',
        'component' => 'string',
        'area' => 'string',
        'itemid' => 'integer',
        'usercreated' => 'integer',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'usercreated');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function reportbuilderSchedules()
    {
        return $this->hasMany(ReportbuilderSchedule::class, 'reportid');
    }

    public function reportbuilderAudiences()
    {
        return $this->hasMany(ReportbuilderAudience::class, 'reportid');
    }

    public function reportbuilderColumns()
    {
        return $this->hasMany(ReportbuilderColumn::class, 'reportid');
    }

    public function reportbuilderFilters()
    {
        return $this->hasMany(ReportbuilderFilter::class, 'reportid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'source' => (string)$this->source,
            'type' => (int)$this->type,
            'uniquerows' => (int)$this->uniquerows,
            'conditiondata' => (string)$this->conditiondata,
            'settingsdata' => (string)$this->settingsdata,
            'contextid' => (int)$this->contextid,
            'component' => (string)$this->component,
            'area' => (string)$this->area,
            'itemid' => (int)$this->itemid,
            'usercreated' => (int)$this->usercreated,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'reportbuilder_report_index';
    }
}
