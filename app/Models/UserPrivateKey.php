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
 * Model UserPrivateKey
 * access keys used in cookieless scripts - rss, etc.
 */
class UserPrivateKey extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'user_private_key';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'script' => 'string',
        'value' => 'string',
        'userid' => 'integer',
        'instance' => 'integer',
        'iprestriction' => 'string',
        'validuntil' => 'integer',
        'timecreated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'script' => (string)$this->script,
            'value' => (string)$this->value,
            'userid' => (int)$this->userid,
            'instance' => (int)$this->instance,
            'iprestriction' => (string)$this->iprestriction,
            'validuntil' => (int)$this->validuntil,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'user_private_key_index';
    }
}
