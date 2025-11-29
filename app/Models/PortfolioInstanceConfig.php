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
 * Model PortfolioInstanceConfig
 * config for portfolio plugin instances
 */
class PortfolioInstanceConfig extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'portfolio_instance_config';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'instance' => 'integer',
        'name' => 'string',
        'value' => 'string',
    ];

    // Relationships: BelongsTo
    public function portfolioInstance()
    {
        return $this->belongsTo(PortfolioInstance::class, 'instance');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'instance' => (int)$this->instance,
            'name' => (string)$this->name,
            'value' => (string)$this->value,
        ];
    }

    public function searchableAs()
    {
        return 'portfolio_instance_config_index';
    }
}
