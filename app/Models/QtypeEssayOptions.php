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
 * Model QtypeEssayOptions
 * Extra options for essay questions.
 */
class QtypeEssayOptions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'qtype_essay_options';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionid' => 'integer',
        'responseformat' => 'string',
        'responserequired' => 'integer',
        'responsefieldlines' => 'integer',
        'minwordlimit' => 'integer',
        'maxwordlimit' => 'integer',
        'attachments' => 'integer',
        'attachmentsrequired' => 'integer',
        'graderinfo' => 'string',
        'graderinfoformat' => 'integer',
        'responsetemplate' => 'string',
        'responsetemplateformat' => 'integer',
        'maxbytes' => 'integer',
        'filetypeslist' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'questionid' => (int)$this->questionid,
            'responseformat' => (string)$this->responseformat,
            'responserequired' => (int)$this->responserequired,
            'responsefieldlines' => (int)$this->responsefieldlines,
            'minwordlimit' => (int)$this->minwordlimit,
            'maxwordlimit' => (int)$this->maxwordlimit,
            'attachments' => (int)$this->attachments,
            'attachmentsrequired' => (int)$this->attachmentsrequired,
            'graderinfo' => (string)$this->graderinfo,
            'graderinfoformat' => (int)$this->graderinfoformat,
            'responsetemplate' => (string)$this->responsetemplate,
            'responsetemplateformat' => (int)$this->responsetemplateformat,
            'maxbytes' => (int)$this->maxbytes,
            'filetypeslist' => (string)$this->filetypeslist,
        ];
    }

    public function searchableAs()
    {
        return 'qtype_essay_options_index';
    }
}
