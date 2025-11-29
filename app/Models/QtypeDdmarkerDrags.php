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
 * Model QtypeDdmarkerDrags
 * Labels for markers to drag.
 */
class QtypeDdmarkerDrags extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'qtype_ddmarker_drags';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionid' => 'integer',
        'no' => 'integer',
        'label' => 'string',
        'infinite' => 'integer',
        'noofdrags' => 'integer',
    ];

    // Relationships: BelongsTo
    public function question()
    {
        return $this->belongsTo(Question::class, 'questionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'questionid' => (int)$this->questionid,
            'no' => (int)$this->no,
            'label' => (string)$this->label,
            'infinite' => (int)$this->infinite,
            'noofdrags' => (int)$this->noofdrags,
        ];
    }

    public function searchableAs()
    {
        return 'qtype_ddmarker_drags_index';
    }
}
