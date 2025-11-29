<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

/**
 * Model CommunicationUser
 * Communication user records mapping
 */
class CommunicationUser extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels, SoftDeletes;

    protected $table = 'communication_user';
    public $timestamps = false;
    const DELETED_AT = 'deleted';

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'commid' => 'integer',
        'userid' => 'integer',
        'synced' => 'boolean',
        'deleted' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function communication()
    {
        return $this->belongsTo(Communication::class, 'commid');
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
            'commid' => (int)$this->commid,
            'userid' => (int)$this->userid,
            'synced' => (int)$this->synced,
            'deleted' => (int)$this->deleted,
        ];
    }

    public function searchableAs()
    {
        return 'communication_user_index';
    }
}
