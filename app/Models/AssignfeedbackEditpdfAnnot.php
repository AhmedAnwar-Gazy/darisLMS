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
 * Model AssignfeedbackEditpdfAnnot
 * stores annotations added to pdfs submitted by students
 */
class AssignfeedbackEditpdfAnnot extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assignfeedback_editpdf_annot';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'gradeid' => 'integer',
        'pageno' => 'integer',
        'x' => 'integer',
        'y' => 'integer',
        'endx' => 'integer',
        'endy' => 'integer',
        'path' => 'string',
        'type' => 'string',
        'colour' => 'string',
        'draft' => 'integer',
    ];

    // Relationships: BelongsTo
    public function assignGrades()
    {
        return $this->belongsTo(AssignGrades::class, 'gradeid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'gradeid' => (int)$this->gradeid,
            'pageno' => (int)$this->pageno,
            'x' => (int)$this->x,
            'y' => (int)$this->y,
            'endx' => (int)$this->endx,
            'endy' => (int)$this->endy,
            'path' => (string)$this->path,
            'type' => (string)$this->type,
            'colour' => (string)$this->colour,
            'draft' => (int)$this->draft,
        ];
    }

    public function searchableAs()
    {
        return 'assignfeedback_editpdf_annot_index';
    }
}
