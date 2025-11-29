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
 * Model AssignfeedbackFile
 * Stores info about the number of files submitted by a student.
 */
class AssignfeedbackFile extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assignfeedback_file';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'assignment' => 'integer',
        'grade' => 'integer',
        'numfiles' => 'integer',
    ];

    // Relationships: BelongsTo
    public function assign()
    {
        return $this->belongsTo(Assign::class, 'assignment');
    }

    public function assignGrades()
    {
        return $this->belongsTo(AssignGrades::class, 'grade');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'assignment' => (int)$this->assignment,
            'grade' => (int)$this->grade,
            'numfiles' => (int)$this->numfiles,
        ];
    }

    public function searchableAs()
    {
        return 'assignfeedback_file_index';
    }
}
