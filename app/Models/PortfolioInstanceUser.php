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
 * Model PortfolioInstanceUser
 * user data for portfolio instances.
 */
class PortfolioInstanceUser extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'portfolio_instance_user';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'instance' => 'integer',
        'userid' => 'integer',
        'name' => 'string',
        'value' => 'string',
    ];

    // Relationships: BelongsTo
    public function portfolioInstance()
    {
        return $this->belongsTo(PortfolioInstance::class, 'instance');
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
            'instance' => (int)$this->instance,
            'userid' => (int)$this->userid,
            'name' => (string)$this->name,
            'value' => (string)$this->value,
        ];
    }

    public function searchableAs()
    {
        return 'portfolio_instance_user_index';
    }
}
