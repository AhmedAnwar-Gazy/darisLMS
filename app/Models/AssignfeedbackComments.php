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
 * Model AssignfeedbackComments
 * Text feedback for submitted assignments
 */
class AssignfeedbackComments extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assignfeedback_comments';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'assignment' => 'integer',
        'grade' => 'integer',
        'commenttext' => 'string',
        'commentformat' => 'integer',
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
            'commenttext' => (string)$this->commenttext,
            'commentformat' => (int)$this->commentformat,
        ];
    }

    public function searchableAs()
    {
        return 'assignfeedback_comments_index';
    }
}
