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
 * Model AssignfeedbackEditpdfRot
 * Stores rotation information of a page.
 */
class AssignfeedbackEditpdfRot extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assignfeedback_editpdf_rot';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'gradeid' => 'integer',
        'pageno' => 'integer',
        'pathnamehash' => 'string',
        'isrotated' => 'boolean',
        'degree' => 'integer',
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
            'pathnamehash' => (string)$this->pathnamehash,
            'isrotated' => (int)$this->isrotated,
            'degree' => (int)$this->degree,
        ];
    }

    public function searchableAs()
    {
        return 'assignfeedback_editpdf_rot_index';
    }
}
