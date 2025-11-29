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
 * Model PaymentGateways
 * Configuration for one gateway for one payment account
 */
class PaymentGateways extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'payment_gateways';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'accountid' => 'integer',
        'gateway' => 'string',
        'enabled' => 'boolean',
        'config' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function paymentAccounts()
    {
        return $this->belongsTo(PaymentAccounts::class, 'accountid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'accountid' => (int)$this->accountid,
            'gateway' => (string)$this->gateway,
            'enabled' => (int)$this->enabled,
            'config' => (string)$this->config,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'payment_gateways_index';
    }
}
