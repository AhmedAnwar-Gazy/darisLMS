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
 * Model EnrolPaypal
 * Holds all known information about PayPal transactions
 */
class EnrolPaypal extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_paypal';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'business' => 'string',
        'receiver_email' => 'string',
        'receiver_id' => 'string',
        'item_name' => 'string',
        'courseid' => 'integer',
        'userid' => 'integer',
        'instanceid' => 'integer',
        'memo' => 'string',
        'tax' => 'string',
        'option_name1' => 'string',
        'option_selection1_x' => 'string',
        'option_name2' => 'string',
        'option_selection2_x' => 'string',
        'payment_status' => 'string',
        'pending_reason' => 'string',
        'reason_code' => 'string',
        'txn_id' => 'string',
        'parent_txn_id' => 'string',
        'payment_type' => 'string',
        'timeupdated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function enrol()
    {
        return $this->belongsTo(Enrol::class, 'instanceid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'business' => (string)$this->business,
            'receiver_email' => (string)$this->receiver_email,
            'receiver_id' => (string)$this->receiver_id,
            'item_name' => (string)$this->item_name,
            'courseid' => (int)$this->courseid,
            'userid' => (int)$this->userid,
            'instanceid' => (int)$this->instanceid,
            'memo' => (string)$this->memo,
            'tax' => (string)$this->tax,
            'option_name1' => (string)$this->option_name1,
            'option_selection1_x' => (string)$this->option_selection1_x,
            'option_name2' => (string)$this->option_name2,
            'option_selection2_x' => (string)$this->option_selection2_x,
            'payment_status' => (string)$this->payment_status,
            'pending_reason' => (string)$this->pending_reason,
            'reason_code' => (string)$this->reason_code,
            'txn_id' => (string)$this->txn_id,
            'parent_txn_id' => (string)$this->parent_txn_id,
            'payment_type' => (string)$this->payment_type,
            'timeupdated' => (int)$this->timeupdated,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_paypal_index';
    }
}
