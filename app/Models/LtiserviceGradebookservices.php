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
 * Model LtiserviceGradebookservices
 * This file records the grade items created by the LTI Gradebook Services service
 */
class LtiserviceGradebookservices extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'ltiservice_gradebookservices';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'gradeitemid' => 'integer',
        'courseid' => 'integer',
        'toolproxyid' => 'integer',
        'typeid' => 'integer',
        'baseurl' => 'string',
        'ltilinkid' => 'integer',
        'resourceid' => 'string',
        'tag' => 'string',
        'subreviewurl' => 'string',
        'subreviewparams' => 'string',
    ];

    // Relationships: BelongsTo
    public function lti()
    {
        return $this->belongsTo(Lti::class, 'ltilinkid');
    }

    public function gradeItems()
    {
        return $this->belongsTo(GradeItems::class, 'gradeitemid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'gradeitemid' => (int)$this->gradeitemid,
            'courseid' => (int)$this->courseid,
            'toolproxyid' => (int)$this->toolproxyid,
            'typeid' => (int)$this->typeid,
            'baseurl' => (string)$this->baseurl,
            'ltilinkid' => (int)$this->ltilinkid,
            'resourceid' => (string)$this->resourceid,
            'tag' => (string)$this->tag,
            'subreviewurl' => (string)$this->subreviewurl,
            'subreviewparams' => (string)$this->subreviewparams,
        ];
    }

    public function searchableAs()
    {
        return 'ltiservice_gradebookservices_index';
    }
}
