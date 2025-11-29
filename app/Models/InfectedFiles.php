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
 * Model InfectedFiles
 * Table to store infected file details.
 */
class InfectedFiles extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'infected_files';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'filename' => 'string',
        'quarantinedfile' => 'string',
        'userid' => 'integer',
        'reason' => 'string',
        'timecreated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'filename' => (string)$this->filename,
            'quarantinedfile' => (string)$this->quarantinedfile,
            'userid' => (int)$this->userid,
            'reason' => (string)$this->reason,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'infected_files_index';
    }
}
