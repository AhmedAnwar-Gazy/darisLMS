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
 * Model XapiStates
 * The stored xAPI states
 */
class XapiStates extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'xapi_states';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'component' => 'string',
        'userid' => 'integer',
        'itemid' => 'integer',
        'stateid' => 'string',
        'statedata' => 'string',
        'registration' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'component' => (string)$this->component,
            'userid' => (int)$this->userid,
            'itemid' => (int)$this->itemid,
            'stateid' => (string)$this->stateid,
            'statedata' => (string)$this->statedata,
            'registration' => (string)$this->registration,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'xapi_states_index';
    }
}
