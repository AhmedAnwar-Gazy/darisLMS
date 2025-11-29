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
 * Model QtypeDdimageortextDrops
 * Drop boxes
 */
class QtypeDdimageortextDrops extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'qtype_ddimageortext_drops';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionid' => 'integer',
        'no' => 'integer',
        'xleft' => 'integer',
        'ytop' => 'integer',
        'choice' => 'integer',
        'label' => 'string',
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
            'xleft' => (int)$this->xleft,
            'ytop' => (int)$this->ytop,
            'choice' => (int)$this->choice,
            'label' => (string)$this->label,
        ];
    }

    public function searchableAs()
    {
        return 'qtype_ddimageortext_drops_index';
    }
}
