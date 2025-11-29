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
 * Model Modules
 * modules available in the site
 */
class Modules extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'modules';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'cron' => 'integer',
        'lastcron' => 'integer',
        'search' => 'string',
        'visible' => 'boolean',
    ];

    // Relationships: HasMany
    public function courseCompletionDefaultss()
    {
        return $this->hasMany(CourseCompletionDefaults::class, 'module');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'cron' => (int)$this->cron,
            'lastcron' => (int)$this->lastcron,
            'search' => (string)$this->search,
            'visible' => (int)$this->visible,
        ];
    }

    public function searchableAs()
    {
        return 'modules_index';
    }
}
