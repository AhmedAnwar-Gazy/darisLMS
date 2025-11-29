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
 * Model Oauth2Issuer
 * Details for an oauth 2 connect identity issuer.
 */
class Oauth2Issuer extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'oauth2_issuer';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
        'name' => 'string',
        'image' => 'string',
        'baseurl' => 'string',
        'clientid' => 'string',
        'clientsecret' => 'string',
        'loginscopes' => 'string',
        'loginscopesoffline' => 'string',
        'loginparams' => 'string',
        'loginparamsoffline' => 'string',
        'alloweddomains' => 'string',
        'scopessupported' => 'string',
        'enabled' => 'integer',
        'showonloginpage' => 'integer',
        'basicauth' => 'integer',
        'sortorder' => 'integer',
        'requireconfirmation' => 'integer',
        'servicetype' => 'string',
        'loginpagename' => 'string',
    ];

    // Relationships: HasMany
    public function oauth2RefreshTokens()
    {
        return $this->hasMany(Oauth2RefreshToken::class, 'issuerid');
    }

    public function badgeExternalBackpacks()
    {
        return $this->hasMany(BadgeExternalBackpack::class, 'oauth2_issuerid');
    }

    public function oauth2Endpoints()
    {
        return $this->hasMany(Oauth2Endpoint::class, 'issuerid');
    }

    public function authOauth2LinkedLogins()
    {
        return $this->hasMany(AuthOauth2LinkedLogin::class, 'issuerid');
    }

    public function oauth2UserFieldMappings()
    {
        return $this->hasMany(Oauth2UserFieldMapping::class, 'issuerid');
    }

    public function badgeBackpackOauth2s()
    {
        return $this->hasMany(BadgeBackpackOauth2::class, 'issuerid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
            'name' => (string)$this->name,
            'image' => (string)$this->image,
            'baseurl' => (string)$this->baseurl,
            'clientid' => (string)$this->clientid,
            'clientsecret' => (string)$this->clientsecret,
            'loginscopes' => (string)$this->loginscopes,
            'loginscopesoffline' => (string)$this->loginscopesoffline,
            'loginparams' => (string)$this->loginparams,
            'loginparamsoffline' => (string)$this->loginparamsoffline,
            'alloweddomains' => (string)$this->alloweddomains,
            'scopessupported' => (string)$this->scopessupported,
            'enabled' => (int)$this->enabled,
            'showonloginpage' => (int)$this->showonloginpage,
            'basicauth' => (int)$this->basicauth,
            'sortorder' => (int)$this->sortorder,
            'requireconfirmation' => (int)$this->requireconfirmation,
            'servicetype' => (string)$this->servicetype,
            'loginpagename' => (string)$this->loginpagename,
        ];
    }

    public function searchableAs()
    {
        return 'oauth2_issuer_index';
    }
}
