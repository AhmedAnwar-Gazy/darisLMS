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
 * Model Payments
 * Stores information about payments
 */
class Payments extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'payments';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'component' => 'string',
        'paymentarea' => 'string',
        'itemid' => 'integer',
        'userid' => 'integer',
        'amount' => 'string',
        'currency' => 'string',
        'accountid' => 'integer',
        'gateway' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function paymentAccounts()
    {
        return $this->belongsTo(PaymentAccounts::class, 'accountid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'component' => (string)$this->component,
            'paymentarea' => (string)$this->paymentarea,
            'itemid' => (int)$this->itemid,
            'userid' => (int)$this->userid,
            'amount' => (string)$this->amount,
            'currency' => (string)$this->currency,
            'accountid' => (int)$this->accountid,
            'gateway' => (string)$this->gateway,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'payments_index';
    }
}
