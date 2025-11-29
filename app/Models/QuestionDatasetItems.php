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
 * Model QuestionDatasetItems
 * Individual dataset items
 */
class QuestionDatasetItems extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_dataset_items';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'definition' => 'integer',
        'itemnumber' => 'integer',
        'value' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'definition' => (int)$this->definition,
            'itemnumber' => (int)$this->itemnumber,
            'value' => (string)$this->value,
        ];
    }

    public function searchableAs()
    {
        return 'question_dataset_items_index';
    }
}
