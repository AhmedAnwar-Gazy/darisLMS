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
 * Model Imscp
 * each record is one imscp resource
 */
class Imscp extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'imscp';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'revision' => 'integer',
        'keepold' => 'integer',
        'structure' => 'string',
        'timemodified' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'revision' => (int)$this->revision,
            'keepold' => (int)$this->keepold,
            'structure' => (string)$this->structure,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'imscp_index';
    }
}
