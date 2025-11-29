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
 * Model DataContent
 * the content introduced in each record/fields
 */
class DataContent extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'data_content';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'fieldid' => 'integer',
        'recordid' => 'integer',
        'content' => 'string',
        'content1' => 'string',
        'content2' => 'string',
        'content3' => 'string',
        'content4' => 'string',
    ];

    // Relationships: BelongsTo
    public function dataRecords()
    {
        return $this->belongsTo(DataRecords::class, 'recordid');
    }

    public function dataFields()
    {
        return $this->belongsTo(DataFields::class, 'fieldid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'fieldid' => (int)$this->fieldid,
            'recordid' => (int)$this->recordid,
            'content' => (string)$this->content,
            'content1' => (string)$this->content1,
            'content2' => (string)$this->content2,
            'content3' => (string)$this->content3,
            'content4' => (string)$this->content4,
        ];
    }

    public function searchableAs()
    {
        return 'data_content_index';
    }
}
