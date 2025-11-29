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
 * Model QuizaccessSebQuizsettings
 * Stores the quiz level Safe Exam Browser configuration.
 */
class QuizaccessSebQuizsettings extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'quizaccess_seb_quizsettings';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'quizid' => 'integer',
        'cmid' => 'integer',
        'templateid' => 'integer',
        'requiresafeexambrowser' => 'boolean',
        'showsebtaskbar' => 'boolean',
        'showwificontrol' => 'boolean',
        'showreloadbutton' => 'boolean',
        'showtime' => 'boolean',
        'showkeyboardlayout' => 'boolean',
        'allowuserquitseb' => 'boolean',
        'quitpassword' => 'string',
        'linkquitseb' => 'string',
        'userconfirmquit' => 'boolean',
        'enableaudiocontrol' => 'boolean',
        'muteonstartup' => 'boolean',
        'allowspellchecking' => 'boolean',
        'allowreloadinexam' => 'boolean',
        'activateurlfiltering' => 'boolean',
        'filterembeddedcontent' => 'boolean',
        'expressionsallowed' => 'string',
        'regexallowed' => 'string',
        'expressionsblocked' => 'string',
        'regexblocked' => 'string',
        'allowedbrowserexamkeys' => 'string',
        'showsebdownloadlink' => 'boolean',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function quizaccessSebTemplate()
    {
        return $this->belongsTo(QuizaccessSebTemplate::class, 'templateid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'quizid' => (int)$this->quizid,
            'cmid' => (int)$this->cmid,
            'templateid' => (int)$this->templateid,
            'requiresafeexambrowser' => (int)$this->requiresafeexambrowser,
            'showsebtaskbar' => (int)$this->showsebtaskbar,
            'showwificontrol' => (int)$this->showwificontrol,
            'showreloadbutton' => (int)$this->showreloadbutton,
            'showtime' => (int)$this->showtime,
            'showkeyboardlayout' => (int)$this->showkeyboardlayout,
            'allowuserquitseb' => (int)$this->allowuserquitseb,
            'quitpassword' => (string)$this->quitpassword,
            'linkquitseb' => (string)$this->linkquitseb,
            'userconfirmquit' => (int)$this->userconfirmquit,
            'enableaudiocontrol' => (int)$this->enableaudiocontrol,
            'muteonstartup' => (int)$this->muteonstartup,
            'allowspellchecking' => (int)$this->allowspellchecking,
            'allowreloadinexam' => (int)$this->allowreloadinexam,
            'activateurlfiltering' => (int)$this->activateurlfiltering,
            'filterembeddedcontent' => (int)$this->filterembeddedcontent,
            'expressionsallowed' => (string)$this->expressionsallowed,
            'regexallowed' => (string)$this->regexallowed,
            'expressionsblocked' => (string)$this->expressionsblocked,
            'regexblocked' => (string)$this->regexblocked,
            'allowedbrowserexamkeys' => (string)$this->allowedbrowserexamkeys,
            'showsebdownloadlink' => (int)$this->showsebdownloadlink,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'quizaccess_seb_quizsettings_index';
    }
}
