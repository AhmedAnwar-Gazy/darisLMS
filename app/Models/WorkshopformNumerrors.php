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
 * Model WorkshopformNumerrors
 * The assessment dimensions definitions of Number of errors grading strategy forms
 */
class WorkshopformNumerrors extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'workshopform_numerrors';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'workshopid' => 'integer',
        'sort' => 'integer',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'descriptiontrust' => 'integer',
        'grade0' => 'string',
        'grade1' => 'string',
        'weight' => 'integer',
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
            'sort' => (int)$this->sort,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'descriptiontrust' => (int)$this->descriptiontrust,
            'grade0' => (string)$this->grade0,
            'grade1' => (string)$this->grade1,
            'weight' => (int)$this->weight,
        ];
    }

    public function searchableAs()
    {
        return 'workshopform_numerrors_index';
    }
}
