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
 * Model DataRecords
 * every record introduced
 */
class DataRecords extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'data_records';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'groupid' => 'integer',
        'dataid' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'approved' => 'integer',
    ];

    // Relationships: BelongsTo
    public function data()
    {
        return $this->belongsTo(Data::class, 'dataid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Relationships: HasMany
    public function dataContents()
    {
        return $this->hasMany(DataContent::class, 'recordid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'groupid' => (int)$this->groupid,
            'dataid' => (int)$this->dataid,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'approved' => (int)$this->approved,
        ];
    }

    public function searchableAs()
    {
        return 'data_records_index';
    }
}
