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
 * Model GradeImportNewitem
 * temporary table for storing new grade_item names from grade import
 */
class GradeImportNewitem extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grade_import_newitem';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'itemname' => 'string',
        'importcode' => 'integer',
        'importer' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'importer');
    }

    // Relationships: HasMany
    public function gradeImportValuess()
    {
        return $this->hasMany(GradeImportValues::class, 'newgradeitem');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'itemname' => (string)$this->itemname,
            'importcode' => (int)$this->importcode,
            'importer' => (int)$this->importer,
        ];
    }

    public function searchableAs()
    {
        return 'grade_import_newitem_index';
    }
}
