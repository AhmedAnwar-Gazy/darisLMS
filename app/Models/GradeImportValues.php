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
 * Model GradeImportValues
 * Temporary table for importing grades
 */
class GradeImportValues extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grade_import_values';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'itemid' => 'integer',
        'newgradeitem' => 'integer',
        'userid' => 'integer',
        'finalgrade' => 'float',
        'feedback' => 'string',
        'importcode' => 'integer',
        'importer' => 'integer',
        'importonlyfeedback' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function gradeItems()
    {
        return $this->belongsTo(GradeItems::class, 'itemid');
    }

    public function gradeImportNewitem()
    {
        return $this->belongsTo(GradeImportNewitem::class, 'newgradeitem');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'importer');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'itemid' => (int)$this->itemid,
            'newgradeitem' => (int)$this->newgradeitem,
            'userid' => (int)$this->userid,
            'finalgrade' => (float)$this->finalgrade,
            'feedback' => (string)$this->feedback,
            'importcode' => (int)$this->importcode,
            'importer' => (int)$this->importer,
            'importonlyfeedback' => (int)$this->importonlyfeedback,
        ];
    }

    public function searchableAs()
    {
        return 'grade_import_values_index';
    }
}
