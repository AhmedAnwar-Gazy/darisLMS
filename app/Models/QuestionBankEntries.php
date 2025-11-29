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
 * Model QuestionBankEntries
 * Each question bank entry. This table has one row for each question that appears in the question bank.
 */
class QuestionBankEntries extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_bank_entries';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questioncategoryid' => 'integer',
        'idnumber' => 'string',
        'ownerid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function questionCategories()
    {
        return $this->belongsTo(QuestionCategories::class, 'questioncategoryid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'ownerid');
    }

    // Relationships: HasMany
    public function questionReferencess()
    {
        return $this->hasMany(QuestionReferences::class, 'questionbankentryid');
    }

    public function questionVersionss()
    {
        return $this->hasMany(QuestionVersions::class, 'questionbankentryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'questioncategoryid' => (int)$this->questioncategoryid,
            'idnumber' => (string)$this->idnumber,
            'ownerid' => (int)$this->ownerid,
        ];
    }

    public function searchableAs()
    {
        return 'question_bank_entries_index';
    }
}
