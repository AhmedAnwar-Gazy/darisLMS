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
 * Model LogDisplay
 * For a particular module/action, specifies a moodle table/field
 */
class LogDisplay extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'log_display';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'module' => 'string',
        'action' => 'string',
        'mtable' => 'string',
        'field' => 'string',
        'component' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'module' => (string)$this->module,
            'action' => (string)$this->action,
            'mtable' => (string)$this->mtable,
            'field' => (string)$this->field,
            'component' => (string)$this->component,
        ];
    }

    public function searchableAs()
    {
        return 'log_display_index';
    }
}
