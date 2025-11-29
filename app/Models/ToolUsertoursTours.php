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
 * Model ToolUsertoursTours
 * List of tours
 */
class ToolUsertoursTours extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_usertours_tours';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'pathmatch' => 'string',
        'enabled' => 'boolean',
        'sortorder' => 'integer',
        'endtourlabel' => 'string',
        'configdata' => 'string',
        'displaystepnumbers' => 'boolean',
    ];

    // Relationships: HasMany
    public function toolUsertoursStepss()
    {
        return $this->hasMany(ToolUsertoursSteps::class, 'tourid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'description' => (string)$this->description,
            'pathmatch' => (string)$this->pathmatch,
            'enabled' => (int)$this->enabled,
            'sortorder' => (int)$this->sortorder,
            'endtourlabel' => (string)$this->endtourlabel,
            'configdata' => (string)$this->configdata,
            'displaystepnumbers' => (int)$this->displaystepnumbers,
        ];
    }

    public function searchableAs()
    {
        return 'tool_usertours_tours_index';
    }
}
