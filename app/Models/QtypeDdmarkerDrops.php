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
 * Model QtypeDdmarkerDrops
 * drop regions
 */
class QtypeDdmarkerDrops extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'qtype_ddmarker_drops';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionid' => 'integer',
        'no' => 'integer',
        'shape' => 'string',
        'coords' => 'string',
        'choice' => 'integer',
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
            'shape' => (string)$this->shape,
            'coords' => (string)$this->coords,
            'choice' => (int)$this->choice,
        ];
    }

    public function searchableAs()
    {
        return 'qtype_ddmarker_drops_index';
    }
}
