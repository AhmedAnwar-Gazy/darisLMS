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
 * Model WorkshopformNumerrorsMap
 * This maps the number of errors to a percentual grade for submission
 */
class WorkshopformNumerrorsMap extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'workshopform_numerrors_map';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'workshopid' => 'integer',
        'nonegative' => 'integer',
        'grade' => 'float',
    ];

    // Relationships: BelongsTo
    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshopid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'workshopid' => (int)$this->workshopid,
            'nonegative' => (int)$this->nonegative,
            'grade' => (float)$this->grade,
        ];
    }

    public function searchableAs()
    {
        return 'workshopform_numerrors_map_index';
    }
}
