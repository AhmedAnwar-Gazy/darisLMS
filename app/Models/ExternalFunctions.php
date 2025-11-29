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
 * Model ExternalFunctions
 * list of all external functions
 */
class ExternalFunctions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'external_functions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'classname' => 'string',
        'methodname' => 'string',
        'classpath' => 'string',
        'component' => 'string',
        'capabilities' => 'string',
        'services' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'classname' => (string)$this->classname,
            'methodname' => (string)$this->methodname,
            'classpath' => (string)$this->classpath,
            'component' => (string)$this->component,
            'capabilities' => (string)$this->capabilities,
            'services' => (string)$this->services,
        ];
    }

    public function searchableAs()
    {
        return 'external_functions_index';
    }
}
