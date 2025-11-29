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
 * Model PortfolioMaharaQueue
 * maps mahara tokens to transfer ids
 */
class PortfolioMaharaQueue extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'portfolio_mahara_queue';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'transferid' => 'integer',
        'token' => 'string',
    ];

    // Relationships: BelongsTo
    public function portfolioTempdata()
    {
        return $this->belongsTo(PortfolioTempdata::class, 'transferid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'transferid' => (int)$this->transferid,
            'token' => (string)$this->token,
        ];
    }

    public function searchableAs()
    {
        return 'portfolio_mahara_queue_index';
    }
}
