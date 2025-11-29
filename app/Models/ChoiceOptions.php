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
 * Model ChoiceOptions
 * available options to choice
 */
class ChoiceOptions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'choice_options';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'choiceid' => 'integer',
        'text' => 'string',
        'maxanswers' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function choice()
    {
        return $this->belongsTo(Choice::class, 'choiceid');
    }

    // Relationships: HasMany
    public function choiceAnswerss()
    {
        return $this->hasMany(ChoiceAnswers::class, 'optionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'choiceid' => (int)$this->choiceid,
            'text' => (string)$this->text,
            'maxanswers' => (int)$this->maxanswers,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'choice_options_index';
    }
}
