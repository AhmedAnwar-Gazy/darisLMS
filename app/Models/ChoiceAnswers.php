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
 * Model ChoiceAnswers
 * choices performed by users
 */
class ChoiceAnswers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'choice_answers';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'choiceid' => 'integer',
        'userid' => 'integer',
        'optionid' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function choice()
    {
        return $this->belongsTo(Choice::class, 'choiceid');
    }

    public function choiceOptions()
    {
        return $this->belongsTo(ChoiceOptions::class, 'optionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'choiceid' => (int)$this->choiceid,
            'userid' => (int)$this->userid,
            'optionid' => (int)$this->optionid,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'choice_answers_index';
    }
}
