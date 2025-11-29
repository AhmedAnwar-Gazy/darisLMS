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
 * Model Choice
 * Available choices are stored here
 */
class Choice extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'choice';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'publish' => 'integer',
        'showresults' => 'integer',
        'display' => 'integer',
        'allowupdate' => 'integer',
        'allowmultiple' => 'integer',
        'showunanswered' => 'integer',
        'includeinactive' => 'integer',
        'limitanswers' => 'integer',
        'timeopen' => 'integer',
        'timeclose' => 'integer',
        'showpreview' => 'integer',
        'timemodified' => 'integer',
        'completionsubmit' => 'boolean',
        'showavailable' => 'boolean',
    ];

    // Relationships: HasMany
    public function choiceOptionss()
    {
        return $this->hasMany(ChoiceOptions::class, 'choiceid');
    }

    public function choiceAnswerss()
    {
        return $this->hasMany(ChoiceAnswers::class, 'choiceid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'publish' => (int)$this->publish,
            'showresults' => (int)$this->showresults,
            'display' => (int)$this->display,
            'allowupdate' => (int)$this->allowupdate,
            'allowmultiple' => (int)$this->allowmultiple,
            'showunanswered' => (int)$this->showunanswered,
            'includeinactive' => (int)$this->includeinactive,
            'limitanswers' => (int)$this->limitanswers,
            'timeopen' => (int)$this->timeopen,
            'timeclose' => (int)$this->timeclose,
            'showpreview' => (int)$this->showpreview,
            'timemodified' => (int)$this->timemodified,
            'completionsubmit' => (int)$this->completionsubmit,
            'showavailable' => (int)$this->showavailable,
        ];
    }

    public function searchableAs()
    {
        return 'choice_index';
    }
}
