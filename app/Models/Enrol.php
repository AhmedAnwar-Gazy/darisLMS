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
 * Model Enrol
 * Instances of enrolment plugins used in courses, fields marked as custom have a plugin defined meaning, core does not touch them. Create a new linked table if you need even more custom fields.
 */
class Enrol extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'enrol' => 'string',
        'status' => 'integer',
        'courseid' => 'integer',
        'sortorder' => 'integer',
        'name' => 'string',
        'enrolperiod' => 'integer',
        'enrolstartdate' => 'integer',
        'enrolenddate' => 'integer',
        'expirynotify' => 'boolean',
        'expirythreshold' => 'integer',
        'notifyall' => 'boolean',
        'password' => 'string',
        'cost' => 'string',
        'currency' => 'string',
        'roleid' => 'integer',
        'customint1' => 'integer',
        'customint2' => 'integer',
        'customint3' => 'integer',
        'customint4' => 'integer',
        'customint5' => 'integer',
        'customint6' => 'integer',
        'customint7' => 'integer',
        'customint8' => 'integer',
        'customchar1' => 'string',
        'customchar2' => 'string',
        'customchar3' => 'string',
        'customdec1' => 'float',
        'customdec2' => 'float',
        'customtext1' => 'string',
        'customtext2' => 'string',
        'customtext3' => 'string',
        'customtext4' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleid');
    }

    // Relationships: HasMany
    public function userEnrolmentss()
    {
        return $this->hasMany(UserEnrolments::class, 'enrolid');
    }

    public function enrolPaypals()
    {
        return $this->hasMany(EnrolPaypal::class, 'instanceid');
    }

    public function enrolLtiToolss()
    {
        return $this->hasMany(EnrolLtiTools::class, 'enrolid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'enrol' => (string)$this->enrol,
            'status' => (int)$this->status,
            'courseid' => (int)$this->courseid,
            'sortorder' => (int)$this->sortorder,
            'name' => (string)$this->name,
            'enrolperiod' => (int)$this->enrolperiod,
            'enrolstartdate' => (int)$this->enrolstartdate,
            'enrolenddate' => (int)$this->enrolenddate,
            'expirynotify' => (int)$this->expirynotify,
            'expirythreshold' => (int)$this->expirythreshold,
            'notifyall' => (int)$this->notifyall,
            'password' => (string)$this->password,
            'cost' => (string)$this->cost,
            'currency' => (string)$this->currency,
            'roleid' => (int)$this->roleid,
            'customint1' => (int)$this->customint1,
            'customint2' => (int)$this->customint2,
            'customint3' => (int)$this->customint3,
            'customint4' => (int)$this->customint4,
            'customint5' => (int)$this->customint5,
            'customint6' => (int)$this->customint6,
            'customint7' => (int)$this->customint7,
            'customint8' => (int)$this->customint8,
            'customchar1' => (string)$this->customchar1,
            'customchar2' => (string)$this->customchar2,
            'customchar3' => (string)$this->customchar3,
            'customdec1' => (float)$this->customdec1,
            'customdec2' => (float)$this->customdec2,
            'customtext1' => (string)$this->customtext1,
            'customtext2' => (string)$this->customtext2,
            'customtext3' => (string)$this->customtext3,
            'customtext4' => (string)$this->customtext4,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_index';
    }
}
