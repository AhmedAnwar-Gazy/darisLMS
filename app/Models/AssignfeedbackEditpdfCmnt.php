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
 * Model AssignfeedbackEditpdfCmnt
 * Stores comments added to pdfs
 */
class AssignfeedbackEditpdfCmnt extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assignfeedback_editpdf_cmnt';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'gradeid' => 'integer',
        'x' => 'integer',
        'y' => 'integer',
        'width' => 'integer',
        'rawtext' => 'string',
        'pageno' => 'integer',
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
            'x' => (int)$this->x,
            'y' => (int)$this->y,
            'width' => (int)$this->width,
            'rawtext' => (string)$this->rawtext,
            'pageno' => (int)$this->pageno,
            'colour' => (string)$this->colour,
            'draft' => (int)$this->draft,
        ];
    }

    public function searchableAs()
    {
        return 'assignfeedback_editpdf_cmnt_index';
    }
}
