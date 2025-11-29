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
 * Model Badge
 * Defines badge
 */
class Badge extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usercreated' => 'integer',
        'usermodified' => 'integer',
        'issuername' => 'string',
        'issuerurl' => 'string',
        'issuercontact' => 'string',
        'expiredate' => 'integer',
        'expireperiod' => 'integer',
        'type' => 'boolean',
        'courseid' => 'integer',
        'message' => 'string',
        'messagesubject' => 'string',
        'attachment' => 'boolean',
        'notification' => 'boolean',
        'status' => 'boolean',
        'nextcron' => 'integer',
        'version' => 'string',
        'language' => 'string',
        'imageauthorname' => 'string',
        'imageauthoremail' => 'string',
        'imageauthorurl' => 'string',
        'imagecaption' => 'string',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usercreated');
    }

    // Relationships: HasMany
    public function badgeIssueds()
    {
        return $this->hasMany(BadgeIssued::class, 'badgeid');
    }

    public function badgeCriterias()
    {
        return $this->hasMany(BadgeCriteria::class, 'badgeid');
    }

    public function badgeRelateds()
    {
        return $this->hasMany(BadgeRelated::class, 'badgeid');
    }

    public function badgeRelateds()
    {
        return $this->hasMany(BadgeRelated::class, 'relatedbadgeid');
    }

    public function badgeEndorsements()
    {
        return $this->hasMany(BadgeEndorsement::class, 'badgeid');
    }

    public function badgeManualAwards()
    {
        return $this->hasMany(BadgeManualAward::class, 'badgeid');
    }

    public function badgeAlignments()
    {
        return $this->hasMany(BadgeAlignment::class, 'badgeid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'description' => (string)$this->description,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usercreated' => (int)$this->usercreated,
            'usermodified' => (int)$this->usermodified,
            'issuername' => (string)$this->issuername,
            'issuerurl' => (string)$this->issuerurl,
            'issuercontact' => (string)$this->issuercontact,
            'expiredate' => (int)$this->expiredate,
            'expireperiod' => (int)$this->expireperiod,
            'type' => (int)$this->type,
            'courseid' => (int)$this->courseid,
            'message' => (string)$this->message,
            'messagesubject' => (string)$this->messagesubject,
            'attachment' => (int)$this->attachment,
            'notification' => (int)$this->notification,
            'status' => (int)$this->status,
            'nextcron' => (int)$this->nextcron,
            'version' => (string)$this->version,
            'language' => (string)$this->language,
            'imageauthorname' => (string)$this->imageauthorname,
            'imageauthoremail' => (string)$this->imageauthoremail,
            'imageauthorurl' => (string)$this->imageauthorurl,
            'imagecaption' => (string)$this->imagecaption,
        ];
    }

    public function searchableAs()
    {
        return 'badge_index';
    }
}
