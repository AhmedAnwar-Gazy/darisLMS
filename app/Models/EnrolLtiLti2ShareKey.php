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
 * Model EnrolLtiLti2ShareKey
 * Resource link share key
 */
class EnrolLtiLti2ShareKey extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_lti_lti2_share_key';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'sharekey' => 'string',
        'resourcelinkid' => 'integer',
        'autoapprove' => 'boolean',
        'expires' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'sharekey' => (string)$this->sharekey,
            'resourcelinkid' => (int)$this->resourcelinkid,
            'autoapprove' => (int)$this->autoapprove,
            'expires' => (int)$this->expires,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_lti_lti2_share_key_index';
    }
}
