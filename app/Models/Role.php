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
 * Model Role
 * moodle roles
 */
class Role extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'role';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'shortname' => 'string',
        'description' => 'string',
        'sortorder' => 'integer',
        'archetype' => 'string',
    ];

    // Relationships: HasMany
    public function roleAllowSwitchs()
    {
        return $this->hasMany(RoleAllowSwitch::class, 'roleid');
    }

    public function roleAllowSwitchs()
    {
        return $this->hasMany(RoleAllowSwitch::class, 'allowswitch');
    }

    public function roleContextLevelss()
    {
        return $this->hasMany(RoleContextLevels::class, 'roleid');
    }

    public function enrolFlatfiles()
    {
        return $this->hasMany(EnrolFlatfile::class, 'roleid');
    }

    public function roleAllowViews()
    {
        return $this->hasMany(RoleAllowView::class, 'roleid');
    }

    public function roleAllowViews()
    {
        return $this->hasMany(RoleAllowView::class, 'allowview');
    }

    public function toolDataprivacyPurposeroles()
    {
        return $this->hasMany(ToolDataprivacyPurposerole::class, 'roleid');
    }

    public function roleAllowOverrides()
    {
        return $this->hasMany(RoleAllowOverride::class, 'roleid');
    }

    public function roleAllowOverrides()
    {
        return $this->hasMany(RoleAllowOverride::class, 'allowoverride');
    }

    public function roleAllowAssigns()
    {
        return $this->hasMany(RoleAllowAssign::class, 'roleid');
    }

    public function roleAllowAssigns()
    {
        return $this->hasMany(RoleAllowAssign::class, 'allowassign');
    }

    public function enrols()
    {
        return $this->hasMany(Enrol::class, 'roleid');
    }

    public function roleNamess()
    {
        return $this->hasMany(RoleNames::class, 'roleid');
    }

    public function roleAssignmentss()
    {
        return $this->hasMany(RoleAssignments::class, 'roleid');
    }

    public function roleCapabilitiess()
    {
        return $this->hasMany(RoleCapabilities::class, 'roleid');
    }

    public function badgeManualAwards()
    {
        return $this->hasMany(BadgeManualAward::class, 'issuerrole');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'shortname' => (string)$this->shortname,
            'description' => (string)$this->description,
            'sortorder' => (int)$this->sortorder,
            'archetype' => (string)$this->archetype,
        ];
    }

    public function searchableAs()
    {
        return 'role_index';
    }
}
