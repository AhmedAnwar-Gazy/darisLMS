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
 * Model GlossaryFormats
 * Setting of the display formats
 */
class GlossaryFormats extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'glossary_formats';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'popupformatname' => 'string',
        'visible' => 'integer',
        'showgroup' => 'integer',
        'showtabs' => 'string',
        'defaultmode' => 'string',
        'defaulthook' => 'string',
        'sortkey' => 'string',
        'sortorder' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'popupformatname' => (string)$this->popupformatname,
            'visible' => (int)$this->visible,
            'showgroup' => (int)$this->showgroup,
            'showtabs' => (string)$this->showtabs,
            'defaultmode' => (string)$this->defaultmode,
            'defaulthook' => (string)$this->defaulthook,
            'sortkey' => (string)$this->sortkey,
            'sortorder' => (string)$this->sortorder,
        ];
    }

    public function searchableAs()
    {
        return 'glossary_formats_index';
    }
}
