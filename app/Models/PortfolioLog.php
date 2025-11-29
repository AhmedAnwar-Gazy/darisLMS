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
 * Model PortfolioLog
 * log of portfolio transfers (used to later check for duplicates)
 */
class PortfolioLog extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'portfolio_log';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'time' => 'integer',
        'portfolio' => 'integer',
        'caller_class' => 'string',
        'caller_file' => 'string',
        'caller_component' => 'string',
        'caller_sha1' => 'string',
        'tempdataid' => 'integer',
        'returnurl' => 'string',
        'continueurl' => 'string',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function portfolioInstance()
    {
        return $this->belongsTo(PortfolioInstance::class, 'portfolio');
    }

    public function portfolioTempdata()
    {
        return $this->belongsTo(PortfolioTempdata::class, 'tempdataid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'time' => (int)$this->time,
            'portfolio' => (int)$this->portfolio,
            'caller_class' => (string)$this->caller_class,
            'caller_file' => (string)$this->caller_file,
            'caller_component' => (string)$this->caller_component,
            'caller_sha1' => (string)$this->caller_sha1,
            'tempdataid' => (int)$this->tempdataid,
            'returnurl' => (string)$this->returnurl,
            'continueurl' => (string)$this->continueurl,
        ];
    }

    public function searchableAs()
    {
        return 'portfolio_log_index';
    }
}
