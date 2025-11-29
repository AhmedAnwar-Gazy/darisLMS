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
 * Model MnetserviceEnrolCourses
 * Caches the information fetched via XML-RPC about courses on remote hosts that are offered for our users
 */
class MnetserviceEnrolCourses extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'mnetservice_enrol_courses';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'hostid' => 'integer',
        'remoteid' => 'integer',
        'categoryid' => 'integer',
        'categoryname' => 'string',
        'sortorder' => 'integer',
        'fullname' => 'string',
        'shortname' => 'string',
        'idnumber' => 'string',
        'summary' => 'string',
        'summaryformat' => 'integer',
        'startdate' => 'integer',
        'roleid' => 'integer',
        'rolename' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'hostid' => (int)$this->hostid,
            'remoteid' => (int)$this->remoteid,
            'categoryid' => (int)$this->categoryid,
            'categoryname' => (string)$this->categoryname,
            'sortorder' => (int)$this->sortorder,
            'fullname' => (string)$this->fullname,
            'shortname' => (string)$this->shortname,
            'idnumber' => (string)$this->idnumber,
            'summary' => (string)$this->summary,
            'summaryformat' => (int)$this->summaryformat,
            'startdate' => (int)$this->startdate,
            'roleid' => (int)$this->roleid,
            'rolename' => (string)$this->rolename,
        ];
    }

    public function searchableAs()
    {
        return 'mnetservice_enrol_courses_index';
    }
}
