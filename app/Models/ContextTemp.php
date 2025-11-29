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
 * Model ContextTemp
 * Used by build_context_path() in upgrade and cron to keep context depths and paths in sync.
 */
class ContextTemp extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'context_temp';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'path' => 'string',
        'depth' => 'integer',
        'locked' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'path' => (string)$this->path,
            'depth' => (int)$this->depth,
            'locked' => (int)$this->locked,
        ];
    }

    public function searchableAs()
    {
        return 'context_temp_index';
    }
}
