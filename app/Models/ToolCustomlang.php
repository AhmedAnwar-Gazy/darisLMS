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
 * Model ToolCustomlang
 * Contains the working checkout of all strings and their customization
 */
class ToolCustomlang extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_customlang';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'lang' => 'string',
        'componentid' => 'integer',
        'stringid' => 'string',
        'original' => 'string',
        'master' => 'string',
        'local' => 'string',
        'timemodified' => 'integer',
        'timecustomized' => 'integer',
        'outdated' => 'integer',
        'modified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function toolCustomlangComponents()
    {
        return $this->belongsTo(ToolCustomlangComponents::class, 'componentid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'lang' => (string)$this->lang,
            'componentid' => (int)$this->componentid,
            'stringid' => (string)$this->stringid,
            'original' => (string)$this->original,
            'master' => (string)$this->master,
            'local' => (string)$this->local,
            'timemodified' => (int)$this->timemodified,
            'timecustomized' => (int)$this->timecustomized,
            'outdated' => (int)$this->outdated,
            'modified' => (int)$this->modified,
        ];
    }

    public function searchableAs()
    {
        return 'tool_customlang_index';
    }
}
