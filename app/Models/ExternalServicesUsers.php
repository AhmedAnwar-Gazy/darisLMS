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
 * Model ExternalServicesUsers
 * users allowed to use services with restricted users flag
 */
class ExternalServicesUsers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'external_services_users';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'externalserviceid' => 'integer',
        'userid' => 'integer',
        'iprestriction' => 'string',
        'validuntil' => 'integer',
        'timecreated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function externalServices()
    {
        return $this->belongsTo(ExternalServices::class, 'externalserviceid');
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
            'externalserviceid' => (int)$this->externalserviceid,
            'userid' => (int)$this->userid,
            'iprestriction' => (string)$this->iprestriction,
            'validuntil' => (int)$this->validuntil,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'external_services_users_index';
    }
}
