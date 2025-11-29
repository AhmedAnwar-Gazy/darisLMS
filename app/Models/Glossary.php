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
 * Model Glossary
 * all glossaries
 */
class Glossary extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'glossary';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'allowduplicatedentries' => 'integer',
        'displayformat' => 'string',
        'mainglossary' => 'integer',
        'showspecial' => 'integer',
        'showalphabet' => 'integer',
        'showall' => 'integer',
        'allowcomments' => 'integer',
        'allowprintview' => 'integer',
        'usedynalink' => 'integer',
        'defaultapproval' => 'integer',
        'approvaldisplayformat' => 'string',
        'globalglossary' => 'integer',
        'entbypage' => 'integer',
        'editalways' => 'integer',
        'rsstype' => 'integer',
        'rssarticles' => 'integer',
        'assessed' => 'integer',
        'assesstimestart' => 'integer',
        'assesstimefinish' => 'integer',
        'scale' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'completionentries' => 'integer',
    ];

    // Relationships: HasMany
    public function glossaryEntriess()
    {
        return $this->hasMany(GlossaryEntries::class, 'glossaryid');
    }

    public function glossaryCategoriess()
    {
        return $this->hasMany(GlossaryCategories::class, 'glossaryid');
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
            'allowduplicatedentries' => (int)$this->allowduplicatedentries,
            'displayformat' => (string)$this->displayformat,
            'mainglossary' => (int)$this->mainglossary,
            'showspecial' => (int)$this->showspecial,
            'showalphabet' => (int)$this->showalphabet,
            'showall' => (int)$this->showall,
            'allowcomments' => (int)$this->allowcomments,
            'allowprintview' => (int)$this->allowprintview,
            'usedynalink' => (int)$this->usedynalink,
            'defaultapproval' => (int)$this->defaultapproval,
            'approvaldisplayformat' => (string)$this->approvaldisplayformat,
            'globalglossary' => (int)$this->globalglossary,
            'entbypage' => (int)$this->entbypage,
            'editalways' => (int)$this->editalways,
            'rsstype' => (int)$this->rsstype,
            'rssarticles' => (int)$this->rssarticles,
            'assessed' => (int)$this->assessed,
            'assesstimestart' => (int)$this->assesstimestart,
            'assesstimefinish' => (int)$this->assesstimefinish,
            'scale' => (int)$this->scale,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'completionentries' => (int)$this->completionentries,
        ];
    }

    public function searchableAs()
    {
        return 'glossary_index';
    }
}
