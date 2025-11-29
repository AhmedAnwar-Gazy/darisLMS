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
 * Model Data
 * all database activities
 */
class Data extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'data';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'comments' => 'integer',
        'timeavailablefrom' => 'integer',
        'timeavailableto' => 'integer',
        'timeviewfrom' => 'integer',
        'timeviewto' => 'integer',
        'requiredentries' => 'integer',
        'requiredentriestoview' => 'integer',
        'maxentries' => 'integer',
        'rssarticles' => 'integer',
        'singletemplate' => 'string',
        'listtemplate' => 'string',
        'listtemplateheader' => 'string',
        'listtemplatefooter' => 'string',
        'addtemplate' => 'string',
        'rsstemplate' => 'string',
        'rsstitletemplate' => 'string',
        'csstemplate' => 'string',
        'jstemplate' => 'string',
        'asearchtemplate' => 'string',
        'approval' => 'integer',
        'manageapproved' => 'integer',
        'scale' => 'integer',
        'assessed' => 'integer',
        'assesstimestart' => 'integer',
        'assesstimefinish' => 'integer',
        'defaultsort' => 'integer',
        'defaultsortdir' => 'integer',
        'editany' => 'integer',
        'notification' => 'integer',
        'timemodified' => 'integer',
        'config' => 'string',
        'completionentries' => 'integer',
    ];

    // Relationships: HasMany
    public function dataRecordss()
    {
        return $this->hasMany(DataRecords::class, 'dataid');
    }

    public function dataFieldss()
    {
        return $this->hasMany(DataFields::class, 'dataid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'comments' => (int)$this->comments,
            'timeavailablefrom' => (int)$this->timeavailablefrom,
            'timeavailableto' => (int)$this->timeavailableto,
            'timeviewfrom' => (int)$this->timeviewfrom,
            'timeviewto' => (int)$this->timeviewto,
            'requiredentries' => (int)$this->requiredentries,
            'requiredentriestoview' => (int)$this->requiredentriestoview,
            'maxentries' => (int)$this->maxentries,
            'rssarticles' => (int)$this->rssarticles,
            'singletemplate' => (string)$this->singletemplate,
            'listtemplate' => (string)$this->listtemplate,
            'listtemplateheader' => (string)$this->listtemplateheader,
            'listtemplatefooter' => (string)$this->listtemplatefooter,
            'addtemplate' => (string)$this->addtemplate,
            'rsstemplate' => (string)$this->rsstemplate,
            'rsstitletemplate' => (string)$this->rsstitletemplate,
            'csstemplate' => (string)$this->csstemplate,
            'jstemplate' => (string)$this->jstemplate,
            'asearchtemplate' => (string)$this->asearchtemplate,
            'approval' => (int)$this->approval,
            'manageapproved' => (int)$this->manageapproved,
            'scale' => (int)$this->scale,
            'assessed' => (int)$this->assessed,
            'assesstimestart' => (int)$this->assesstimestart,
            'assesstimefinish' => (int)$this->assesstimefinish,
            'defaultsort' => (int)$this->defaultsort,
            'defaultsortdir' => (int)$this->defaultsortdir,
            'editany' => (int)$this->editany,
            'notification' => (int)$this->notification,
            'timemodified' => (int)$this->timemodified,
            'config' => (string)$this->config,
            'completionentries' => (int)$this->completionentries,
        ];
    }

    public function searchableAs()
    {
        return 'data_index';
    }
}
