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
 * Model AssignUserMapping
 * Map an assignment specific id number to a user
 */
class AssignUserMapping extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assign_user_mapping';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'assignment' => 'integer',
        'userid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function assign()
    {
        return $this->belongsTo(Assign::class, 'assignment');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'assignment' => (int)$this->assignment,
            'userid' => (int)$this->userid,
        ];
    }

    public function searchableAs()
    {
        return 'assign_user_mapping_index';
    }
}
