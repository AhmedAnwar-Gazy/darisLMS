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
 * Model Bigbluebuttonbn
 * The bigbluebuttonbn table to store information about a meeting activities.
 */
class Bigbluebuttonbn extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'bigbluebuttonbn';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'meetingid' => 'string',
        'moderatorpass' => 'string',
        'viewerpass' => 'string',
        'wait' => 'boolean',
        'record' => 'boolean',
        'recordallfromstart' => 'boolean',
        'recordhidebutton' => 'boolean',
        'welcome' => 'string',
        'voicebridge' => 'integer',
        'openingtime' => 'integer',
        'closingtime' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'presentation' => 'string',
        'participants' => 'string',
        'userlimit' => 'integer',
        'recordings_html' => 'boolean',
        'recordings_deleted' => 'boolean',
        'recordings_imported' => 'boolean',
        'recordings_preview' => 'boolean',
        'clienttype' => 'boolean',
        'muteonstart' => 'boolean',
        'disablecam' => 'boolean',
        'disablemic' => 'boolean',
        'disableprivatechat' => 'boolean',
        'disablepublicchat' => 'boolean',
        'disablenote' => 'boolean',
        'hideuserlist' => 'boolean',
        'completionattendance' => 'integer',
        'completionengagementchats' => 'integer',
        'completionengagementtalks' => 'integer',
        'completionengagementraisehand' => 'integer',
        'completionengagementpollvotes' => 'integer',
        'completionengagementemojis' => 'integer',
        'guestallowed' => 'integer',
        'mustapproveuser' => 'integer',
        'guestlinkuid' => 'string',
        'guestpassword' => 'string',
    ];

    // Relationships: HasMany
    public function bigbluebuttonbnRecordingss()
    {
        return $this->hasMany(BigbluebuttonbnRecordings::class, 'bigbluebuttonbnid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'type' => (int)$this->type,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'meetingid' => (string)$this->meetingid,
            'moderatorpass' => (string)$this->moderatorpass,
            'viewerpass' => (string)$this->viewerpass,
            'wait' => (int)$this->wait,
            'record' => (int)$this->record,
            'recordallfromstart' => (int)$this->recordallfromstart,
            'recordhidebutton' => (int)$this->recordhidebutton,
            'welcome' => (string)$this->welcome,
            'voicebridge' => (int)$this->voicebridge,
            'openingtime' => (int)$this->openingtime,
            'closingtime' => (int)$this->closingtime,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'presentation' => (string)$this->presentation,
            'participants' => (string)$this->participants,
            'userlimit' => (int)$this->userlimit,
            'recordings_html' => (int)$this->recordings_html,
            'recordings_deleted' => (int)$this->recordings_deleted,
            'recordings_imported' => (int)$this->recordings_imported,
            'recordings_preview' => (int)$this->recordings_preview,
            'clienttype' => (int)$this->clienttype,
            'muteonstart' => (int)$this->muteonstart,
            'disablecam' => (int)$this->disablecam,
            'disablemic' => (int)$this->disablemic,
            'disableprivatechat' => (int)$this->disableprivatechat,
            'disablepublicchat' => (int)$this->disablepublicchat,
            'disablenote' => (int)$this->disablenote,
            'hideuserlist' => (int)$this->hideuserlist,
            'completionattendance' => (int)$this->completionattendance,
            'completionengagementchats' => (int)$this->completionengagementchats,
            'completionengagementtalks' => (int)$this->completionengagementtalks,
            'completionengagementraisehand' => (int)$this->completionengagementraisehand,
            'completionengagementpollvotes' => (int)$this->completionengagementpollvotes,
            'completionengagementemojis' => (int)$this->completionengagementemojis,
            'guestallowed' => (int)$this->guestallowed,
            'mustapproveuser' => (int)$this->mustapproveuser,
            'guestlinkuid' => (string)$this->guestlinkuid,
            'guestpassword' => (string)$this->guestpassword,
        ];
    }

    public function searchableAs()
    {
        return 'bigbluebuttonbn_index';
    }
}
