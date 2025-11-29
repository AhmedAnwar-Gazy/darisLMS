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
 * Model MnetserviceEnrolEnrolments
 * Caches the information about enrolments of our local users in courses on remote hosts
 */
class MnetserviceEnrolEnrolments extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'mnetservice_enrol_enrolments';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'hostid' => 'integer',
        'userid' => 'integer',
        'remotecourseid' => 'integer',
        'rolename' => 'string',
        'enroltime' => 'integer',
        'enroltype' => 'string',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function mnetHost()
    {
        return $this->belongsTo(MnetHost::class, 'hostid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'hostid' => (int)$this->hostid,
            'userid' => (int)$this->userid,
            'remotecourseid' => (int)$this->remotecourseid,
            'rolename' => (string)$this->rolename,
            'enroltime' => (int)$this->enroltime,
            'enroltype' => (string)$this->enroltype,
        ];
    }

    public function searchableAs()
    {
        return 'mnetservice_enrol_enrolments_index';
    }
}
