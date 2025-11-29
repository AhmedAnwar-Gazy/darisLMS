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
 * Model ResourceOld
 * backup of all old resource instances from 1.9
 */
class ResourceOld extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'resource_old';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'type' => 'string',
        'reference' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'alltext' => 'string',
        'popup' => 'string',
        'options' => 'string',
        'timemodified' => 'integer',
        'oldid' => 'integer',
        'cmid' => 'integer',
        'newmodule' => 'string',
        'newid' => 'integer',
        'migrated' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'type' => (string)$this->type,
            'reference' => (string)$this->reference,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'alltext' => (string)$this->alltext,
            'popup' => (string)$this->popup,
            'options' => (string)$this->options,
            'timemodified' => (int)$this->timemodified,
            'oldid' => (int)$this->oldid,
            'cmid' => (int)$this->cmid,
            'newmodule' => (string)$this->newmodule,
            'newid' => (int)$this->newid,
            'migrated' => (int)$this->migrated,
        ];
    }

    public function searchableAs()
    {
        return 'resource_old_index';
    }
}
