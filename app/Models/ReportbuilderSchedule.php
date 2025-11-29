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
 * Model ReportbuilderSchedule
 * Table to represent a report schedule
 */
class ReportbuilderSchedule extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'reportbuilder_schedule';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'reportid' => 'integer',
        'name' => 'string',
        'enabled' => 'boolean',
        'audiences' => 'string',
        'format' => 'string',
        'subject' => 'string',
        'message' => 'string',
        'messageformat' => 'integer',
        'userviewas' => 'integer',
        'timescheduled' => 'integer',
        'recurrence' => 'integer',
        'reportempty' => 'integer',
        'timelastsent' => 'integer',
        'timenextsend' => 'integer',
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
        return $this->belongsTo(User::class, 'userviewas');
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
            'name' => (string)$this->name,
            'enabled' => (int)$this->enabled,
            'audiences' => (string)$this->audiences,
            'format' => (string)$this->format,
            'subject' => (string)$this->subject,
            'message' => (string)$this->message,
            'messageformat' => (int)$this->messageformat,
            'userviewas' => (int)$this->userviewas,
            'timescheduled' => (int)$this->timescheduled,
            'recurrence' => (int)$this->recurrence,
            'reportempty' => (int)$this->reportempty,
            'timelastsent' => (int)$this->timelastsent,
            'timenextsend' => (int)$this->timenextsend,
            'usercreated' => (int)$this->usercreated,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'reportbuilder_schedule_index';
    }
}
