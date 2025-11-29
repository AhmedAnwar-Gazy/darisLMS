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
 * Model QuizaccessSebTemplate
 * Templates for Safe Exam Browser configuration.
 */
class QuizaccessSebTemplate extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'quizaccess_seb_template';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'content' => 'string',
        'enabled' => 'boolean',
        'sortorder' => 'integer',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Relationships: HasMany
    public function quizaccessSebQuizsettingss()
    {
        return $this->hasMany(QuizaccessSebQuizsettings::class, 'templateid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'description' => (string)$this->description,
            'content' => (string)$this->content,
            'enabled' => (int)$this->enabled,
            'sortorder' => (int)$this->sortorder,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'quizaccess_seb_template_index';
    }
}
