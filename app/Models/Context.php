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
 * Model Context
 * one of these must be set
 */
class Context extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'context';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextlevel' => 'integer',
        'instanceid' => 'integer',
        'path' => 'string',
        'depth' => 'integer',
        'locked' => 'integer',
    ];

    // Relationships: HasMany
    public function gradingAreass()
    {
        return $this->hasMany(GradingAreas::class, 'contextid');
    }

    public function customfieldCategorys()
    {
        return $this->hasMany(CustomfieldCategory::class, 'contextid');
    }

    public function paymentAccountss()
    {
        return $this->hasMany(PaymentAccounts::class, 'contextid');
    }

    public function messageConversationss()
    {
        return $this->hasMany(MessageConversations::class, 'contextid');
    }

    public function filterConfigs()
    {
        return $this->hasMany(FilterConfig::class, 'contextid');
    }

    public function competencyEvidences()
    {
        return $this->hasMany(CompetencyEvidence::class, 'contextid');
    }

    public function toolMonitorEventss()
    {
        return $this->hasMany(ToolMonitorEvents::class, 'contextid');
    }

    public function toolMonitorEventss()
    {
        return $this->hasMany(ToolMonitorEvents::class, 'contextinstanceid');
    }

    public function questionSetReferencess()
    {
        return $this->hasMany(QuestionSetReferences::class, 'usingcontextid');
    }

    public function questionSetReferencess()
    {
        return $this->hasMany(QuestionSetReferences::class, 'questionscontextid');
    }

    public function contentbankContents()
    {
        return $this->hasMany(ContentbankContent::class, 'contextid');
    }

    public function blockInstancess()
    {
        return $this->hasMany(BlockInstances::class, 'parentcontextid');
    }

    public function roleNamess()
    {
        return $this->hasMany(RoleNames::class, 'contextid');
    }

    public function roleAssignmentss()
    {
        return $this->hasMany(RoleAssignments::class, 'contextid');
    }

    public function searchIndexRequestss()
    {
        return $this->hasMany(SearchIndexRequests::class, 'contextid');
    }

    public function filterActives()
    {
        return $this->hasMany(FilterActive::class, 'contextid');
    }

    public function logstoreStandardLogs()
    {
        return $this->hasMany(LogstoreStandardLog::class, 'contextid');
    }

    public function cohorts()
    {
        return $this->hasMany(Cohort::class, 'contextid');
    }

    public function questionUsagess()
    {
        return $this->hasMany(QuestionUsages::class, 'contextid');
    }

    public function analyticsIndicatorCalcs()
    {
        return $this->hasMany(AnalyticsIndicatorCalc::class, 'contextid');
    }

    public function communications()
    {
        return $this->hasMany(Communication::class, 'contextid');
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class, 'contextid');
    }

    public function competencyTemplates()
    {
        return $this->hasMany(CompetencyTemplate::class, 'contextid');
    }

    public function reportbuilderReports()
    {
        return $this->hasMany(ReportbuilderReport::class, 'contextid');
    }

    public function repositoryInstancess()
    {
        return $this->hasMany(RepositoryInstances::class, 'contextid');
    }

    public function roleCapabilitiess()
    {
        return $this->hasMany(RoleCapabilities::class, 'contextid');
    }

    public function externalTokenss()
    {
        return $this->hasMany(ExternalTokens::class, 'contextid');
    }

    public function competencyFrameworks()
    {
        return $this->hasMany(CompetencyFramework::class, 'contextid');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'contextid');
    }

    public function analyticsPredictionss()
    {
        return $this->hasMany(AnalyticsPredictions::class, 'contextid');
    }

    public function enrolLtiToolss()
    {
        return $this->hasMany(EnrolLtiTools::class, 'contextid');
    }

    public function blockPositionss()
    {
        return $this->hasMany(BlockPositions::class, 'contextid');
    }

    public function questionReferencess()
    {
        return $this->hasMany(QuestionReferences::class, 'usingcontextid');
    }

    public function tagInstances()
    {
        return $this->hasMany(TagInstance::class, 'contextid');
    }

    public function toolBrickfieldAreass()
    {
        return $this->hasMany(ToolBrickfieldAreas::class, 'contextid');
    }

    public function customfieldDatas()
    {
        return $this->hasMany(CustomfieldData::class, 'contextid');
    }

    public function filess()
    {
        return $this->hasMany(Files::class, 'contextid');
    }

    public function blogAssociations()
    {
        return $this->hasMany(BlogAssociation::class, 'contextid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextlevel' => (int)$this->contextlevel,
            'instanceid' => (int)$this->instanceid,
            'path' => (string)$this->path,
            'depth' => (int)$this->depth,
            'locked' => (int)$this->locked,
        ];
    }

    public function searchableAs()
    {
        return 'context_index';
    }
}
