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
 * Model UserInfoField
 * Customisable user profile fields
 */
class UserInfoField extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'user_info_field';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'shortname' => 'string',
        'name' => 'string',
        'datatype' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'categoryid' => 'integer',
        'sortorder' => 'integer',
        'required' => 'integer',
        'locked' => 'integer',
        'visible' => 'integer',
        'forceunique' => 'integer',
        'signup' => 'integer',
        'defaultdata' => 'string',
        'defaultdataformat' => 'integer',
        'param1' => 'string',
        'param2' => 'string',
        'param3' => 'string',
        'param4' => 'string',
        'param5' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'shortname' => (string)$this->shortname,
            'name' => (string)$this->name,
            'datatype' => (string)$this->datatype,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'categoryid' => (int)$this->categoryid,
            'sortorder' => (int)$this->sortorder,
            'required' => (int)$this->required,
            'locked' => (int)$this->locked,
            'visible' => (int)$this->visible,
            'forceunique' => (int)$this->forceunique,
            'signup' => (int)$this->signup,
            'defaultdata' => (string)$this->defaultdata,
            'defaultdataformat' => (int)$this->defaultdataformat,
            'param1' => (string)$this->param1,
            'param2' => (string)$this->param2,
            'param3' => (string)$this->param3,
            'param4' => (string)$this->param4,
            'param5' => (string)$this->param5,
        ];
    }

    public function searchableAs()
    {
        return 'user_info_field_index';
    }
}
