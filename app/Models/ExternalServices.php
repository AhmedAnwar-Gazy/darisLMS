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
 * Model ExternalServices
 * built in and custom external services
 */
class ExternalServices extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'external_services';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'enabled' => 'boolean',
        'requiredcapability' => 'string',
        'restrictedusers' => 'boolean',
        'component' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'shortname' => 'string',
        'downloadfiles' => 'boolean',
        'uploadfiles' => 'boolean',
    ];

    // Relationships: HasMany
    public function externalServicesUserss()
    {
        return $this->hasMany(ExternalServicesUsers::class, 'externalserviceid');
    }

    public function externalServicesFunctionss()
    {
        return $this->hasMany(ExternalServicesFunctions::class, 'externalserviceid');
    }

    public function externalTokenss()
    {
        return $this->hasMany(ExternalTokens::class, 'externalserviceid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'enabled' => (int)$this->enabled,
            'requiredcapability' => (string)$this->requiredcapability,
            'restrictedusers' => (int)$this->restrictedusers,
            'component' => (string)$this->component,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'shortname' => (string)$this->shortname,
            'downloadfiles' => (int)$this->downloadfiles,
            'uploadfiles' => (int)$this->uploadfiles,
        ];
    }

    public function searchableAs()
    {
        return 'external_services_index';
    }
}
