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
 * Model AssignsubmissionOnlinetext
 * Info about onlinetext submission
 */
class AssignsubmissionOnlinetext extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assignsubmission_onlinetext';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'assignment' => 'integer',
        'submission' => 'integer',
        'onlinetext' => 'string',
        'onlineformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function assign()
    {
        return $this->belongsTo(Assign::class, 'assignment');
    }

    public function assignSubmission()
    {
        return $this->belongsTo(AssignSubmission::class, 'submission');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'assignment' => (int)$this->assignment,
            'submission' => (int)$this->submission,
            'onlinetext' => (string)$this->onlinetext,
            'onlineformat' => (int)$this->onlineformat,
        ];
    }

    public function searchableAs()
    {
        return 'assignsubmission_onlinetext_index';
    }
}
