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
 * Model PortfolioTempdata
 * stores temporary data for portfolio exports. the id of this table is used for the itemid for the temporary files area.  cron can clean up stale records (and associated file data) after expirytime.
 */
class PortfolioTempdata extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'portfolio_tempdata';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'data' => 'string',
        'expirytime' => 'integer',
        'userid' => 'integer',
        'instance' => 'integer',
        'queued' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function portfolioInstance()
    {
        return $this->belongsTo(PortfolioInstance::class, 'instance');
    }

    // Relationships: HasMany
    public function portfolioLogs()
    {
        return $this->hasMany(PortfolioLog::class, 'tempdataid');
    }

    public function portfolioMaharaQueues()
    {
        return $this->hasMany(PortfolioMaharaQueue::class, 'transferid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'data' => (string)$this->data,
            'expirytime' => (int)$this->expirytime,
            'userid' => (int)$this->userid,
            'instance' => (int)$this->instance,
            'queued' => (int)$this->queued,
        ];
    }

    public function searchableAs()
    {
        return 'portfolio_tempdata_index';
    }
}
