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
 * Model GradeLetters
 * Repository for grade letters, for courses and other moodle entities that use grades.
 */
class GradeLetters extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grade_letters';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextid' => 'integer',
        'lowerboundary' => 'float',
        'letter' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextid' => (int)$this->contextid,
            'lowerboundary' => (float)$this->lowerboundary,
            'letter' => (string)$this->letter,
        ];
    }

    public function searchableAs()
    {
        return 'grade_letters_index';
    }
}
