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
 * Model PaymentAccounts
 * Payment accounts
 */
class PaymentAccounts extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'payment_accounts';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'idnumber' => 'string',
        'contextid' => 'integer',
        'enabled' => 'boolean',
        'archived' => 'boolean',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function paymentGatewayss()
    {
        return $this->hasMany(PaymentGateways::class, 'accountid');
    }

    public function paymentss()
    {
        return $this->hasMany(Payments::class, 'accountid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'idnumber' => (string)$this->idnumber,
            'contextid' => (int)$this->contextid,
            'enabled' => (int)$this->enabled,
            'archived' => (int)$this->archived,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'payment_accounts_index';
    }
}
