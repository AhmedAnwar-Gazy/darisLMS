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
 * Model QtypeDdimageortextDrags
 * Images to drag. Actual file names are not stored here we use the file names as found in the file storage area.
 */
class QtypeDdimageortextDrags extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'qtype_ddimageortext_drags';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionid' => 'integer',
        'no' => 'integer',
        'draggroup' => 'integer',
        'infinite' => 'integer',
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
            'draggroup' => (int)$this->draggroup,
            'infinite' => (int)$this->infinite,
            'label' => (string)$this->label,
        ];
    }

    public function searchableAs()
    {
        return 'qtype_ddimageortext_drags_index';
    }
}
