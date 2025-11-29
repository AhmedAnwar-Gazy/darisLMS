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
 * Model ExternalServicesFunctions
 * lists functions available in each service group
 */
class ExternalServicesFunctions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'external_services_functions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'externalserviceid' => 'integer',
        'functionname' => 'string',
    ];

    // Relationships: BelongsTo
    public function externalServices()
    {
        return $this->belongsTo(ExternalServices::class, 'externalserviceid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'externalserviceid' => (int)$this->externalserviceid,
            'functionname' => (string)$this->functionname,
        ];
    }

    public function searchableAs()
    {
        return 'external_services_functions_index';
    }
}
