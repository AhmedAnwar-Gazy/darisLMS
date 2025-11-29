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
 * Model DataFields
 * every field available
 */
class DataFields extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'data_fields';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'dataid' => 'integer',
        'type' => 'string',
        'name' => 'string',
        'description' => 'string',
        'required' => 'boolean',
        'param1' => 'string',
        'param2' => 'string',
        'param3' => 'string',
        'param4' => 'string',
        'param5' => 'string',
        'param6' => 'string',
        'param7' => 'string',
        'param8' => 'string',
        'param9' => 'string',
        'param10' => 'string',
    ];

    // Relationships: BelongsTo
    public function data()
    {
        return $this->belongsTo(Data::class, 'dataid');
    }

    // Relationships: HasMany
    public function dataContents()
    {
        return $this->hasMany(DataContent::class, 'fieldid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'dataid' => (int)$this->dataid,
            'type' => (string)$this->type,
            'name' => (string)$this->name,
            'description' => (string)$this->description,
            'required' => (int)$this->required,
            'param1' => (string)$this->param1,
            'param2' => (string)$this->param2,
            'param3' => (string)$this->param3,
            'param4' => (string)$this->param4,
            'param5' => (string)$this->param5,
            'param6' => (string)$this->param6,
            'param7' => (string)$this->param7,
            'param8' => (string)$this->param8,
            'param9' => (string)$this->param9,
            'param10' => (string)$this->param10,
        ];
    }

    public function searchableAs()
    {
        return 'data_fields_index';
    }
}
