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
 * Model PortfolioInstance
 * base table (not including config data) for instances of portfolio plugins.
 */
class PortfolioInstance extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'portfolio_instance';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'plugin' => 'string',
        'name' => 'string',
        'visible' => 'boolean',
    ];

    // Relationships: HasMany
    public function portfolioTempdatas()
    {
        return $this->hasMany(PortfolioTempdata::class, 'instance');
    }

    public function portfolioInstanceConfigs()
    {
        return $this->hasMany(PortfolioInstanceConfig::class, 'instance');
    }

    public function portfolioInstanceUsers()
    {
        return $this->hasMany(PortfolioInstanceUser::class, 'instance');
    }

    public function portfolioLogs()
    {
        return $this->hasMany(PortfolioLog::class, 'portfolio');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'plugin' => (string)$this->plugin,
            'name' => (string)$this->name,
            'visible' => (int)$this->visible,
        ];
    }

    public function searchableAs()
    {
        return 'portfolio_instance_index';
    }
}
