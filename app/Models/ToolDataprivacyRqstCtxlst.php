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
 * Model ToolDataprivacyRqstCtxlst
 * Association table joining requests and contextlists
 */
class ToolDataprivacyRqstCtxlst extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_dataprivacy_rqst_ctxlst';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'requestid' => 'integer',
        'contextlistid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function toolDataprivacyRequest()
    {
        return $this->belongsTo(ToolDataprivacyRequest::class, 'requestid');
    }

    public function toolDataprivacyContextlist()
    {
        return $this->belongsTo(ToolDataprivacyContextlist::class, 'contextlistid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'requestid' => (int)$this->requestid,
            'contextlistid' => (int)$this->contextlistid,
        ];
    }

    public function searchableAs()
    {
        return 'tool_dataprivacy_rqst_ctxlst_index';
    }
}
