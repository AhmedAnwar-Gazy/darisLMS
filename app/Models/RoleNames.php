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
 * Model RoleNames
 * role names in native strings
 */
class RoleNames extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'role_names';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'roleid' => 'integer',
        'contextid' => 'integer',
        'name' => 'string',
    ];

    // Relationships: BelongsTo
    public function role()
    {
        return $this->belongsTo(Role::class, 'roleid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'roleid' => (int)$this->roleid,
            'contextid' => (int)$this->contextid,
            'name' => (string)$this->name,
        ];
    }

    public function searchableAs()
    {
        return 'role_names_index';
    }
}
