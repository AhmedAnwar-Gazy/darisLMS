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
 * Model ScormScoes
 * each SCO part of the SCORM module
 */
class ScormScoes extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scorm_scoes';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'scorm' => 'integer',
        'manifest' => 'string',
        'organization' => 'string',
        'parent' => 'string',
        'identifier' => 'string',
        'launch' => 'string',
        'scormtype' => 'string',
        'title' => 'string',
        'sortorder' => 'integer',
    ];

    // Relationships: BelongsTo
    public function scormRelation()
    {
        return $this->belongsTo(Scorm::class, 'scorm');
    }

    // Relationships: HasMany
    public function scormScoesDatas()
    {
        return $this->hasMany(ScormScoesData::class, 'scoid');
    }

    public function scormSeqObjectives()
    {
        return $this->hasMany(ScormSeqObjective::class, 'scoid');
    }

    public function scormSeqRolluprules()
    {
        return $this->hasMany(ScormSeqRolluprule::class, 'scoid');
    }

    public function scormSeqRulecondss()
    {
        return $this->hasMany(ScormSeqRuleconds::class, 'scoid');
    }

    public function scormScoesValues()
    {
        return $this->hasMany(ScormScoesValue::class, 'scoid');
    }

    public function scormSeqMapinfos()
    {
        return $this->hasMany(ScormSeqMapinfo::class, 'scoid');
    }

    public function scormSeqRollupruleconds()
    {
        return $this->hasMany(ScormSeqRolluprulecond::class, 'scoid');
    }

    public function scormSeqRuleconds()
    {
        return $this->hasMany(ScormSeqRulecond::class, 'scoid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'scorm' => (int)$this->scorm,
            'manifest' => (string)$this->manifest,
            'organization' => (string)$this->organization,
            'parent' => (string)$this->parent,
            'identifier' => (string)$this->identifier,
            'launch' => (string)$this->launch,
            'scormtype' => (string)$this->scormtype,
            'title' => (string)$this->title,
            'sortorder' => (int)$this->sortorder,
        ];
    }

    public function searchableAs()
    {
        return 'scorm_scoes_index';
    }
}
