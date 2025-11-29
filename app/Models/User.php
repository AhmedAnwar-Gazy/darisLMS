<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

/**
 * Model User
 * One record for each person
 */
class User extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels, SoftDeletes;

    protected $table = 'user';
    public $timestamps = false;
    const DELETED_AT = 'deleted';

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'auth' => 'string',
        'confirmed' => 'boolean',
        'policyagreed' => 'boolean',
        'deleted' => 'boolean',
        'suspended' => 'boolean',
        'mnethostid' => 'integer',
        'username' => 'string',
        'password' => 'string',
        'idnumber' => 'string',
        'firstname' => 'string',
        'lastname' => 'string',
        'email' => 'string',
        'emailstop' => 'boolean',
        'phone1' => 'string',
        'phone2' => 'string',
        'institution' => 'string',
        'department' => 'string',
        'address' => 'string',
        'city' => 'string',
        'country' => 'string',
        'lang' => 'string',
        'calendartype' => 'string',
        'theme' => 'string',
        'timezone' => 'string',
        'firstaccess' => 'integer',
        'lastaccess' => 'integer',
        'lastlogin' => 'integer',
        'currentlogin' => 'integer',
        'lastip' => 'string',
        'secret' => 'string',
        'picture' => 'integer',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'mailformat' => 'boolean',
        'maildigest' => 'boolean',
        'maildisplay' => 'integer',
        'autosubscribe' => 'boolean',
        'trackforums' => 'boolean',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'trustbitmask' => 'integer',
        'imagealt' => 'string',
        'lastnamephonetic' => 'string',
        'firstnamephonetic' => 'string',
        'middlename' => 'string',
        'alternatename' => 'string',
        'moodlenetprofile' => 'string',
    ];

    // Relationships: HasMany
    public function gradeImportNewitems()
    {
        return $this->hasMany(GradeImportNewitem::class, 'importer');
    }

    public function eventSubscriptionss()
    {
        return $this->hasMany(EventSubscriptions::class, 'userid');
    }

    public function messageContactRequestss()
    {
        return $this->hasMany(MessageContactRequests::class, 'userid');
    }

    public function messageContactRequestss()
    {
        return $this->hasMany(MessageContactRequests::class, 'requesteduserid');
    }

    public function competencyCoursecompsettings()
    {
        return $this->hasMany(CompetencyCoursecompsetting::class, 'usermodified');
    }

    public function competencyUsercompplans()
    {
        return $this->hasMany(CompetencyUsercompplan::class, 'usermodified');
    }

    public function eventsQueues()
    {
        return $this->hasMany(EventsQueue::class, 'userid');
    }

    public function sessionss()
    {
        return $this->hasMany(Sessions::class, 'userid');
    }

    public function taskAdhocs()
    {
        return $this->hasMany(TaskAdhoc::class, 'userid');
    }

    public function toolMfaAuths()
    {
        return $this->hasMany(ToolMfaAuth::class, 'userid');
    }

    public function infectedFiless()
    {
        return $this->hasMany(InfectedFiles::class, 'userid');
    }

    public function repositoryOnedriveAccesss()
    {
        return $this->hasMany(RepositoryOnedriveAccess::class, 'usermodified');
    }

    public function scales()
    {
        return $this->hasMany(Scale::class, 'userid');
    }

    public function quizaccessSebTemplates()
    {
        return $this->hasMany(QuizaccessSebTemplate::class, 'usermodified');
    }

    public function blogExternals()
    {
        return $this->hasMany(BlogExternal::class, 'userid');
    }

    public function competencyUserevidences()
    {
        return $this->hasMany(CompetencyUserevidence::class, 'usermodified');
    }

    public function commentss()
    {
        return $this->hasMany(Comments::class, 'userid');
    }

    public function messageinboundMessagelists()
    {
        return $this->hasMany(MessageinboundMessagelist::class, 'userid');
    }

    public function toolDataprivacyRequests()
    {
        return $this->hasMany(ToolDataprivacyRequest::class, 'userid');
    }

    public function toolDataprivacyRequests()
    {
        return $this->hasMany(ToolDataprivacyRequest::class, 'requestedby');
    }

    public function toolDataprivacyRequests()
    {
        return $this->hasMany(ToolDataprivacyRequest::class, 'dpo');
    }

    public function toolDataprivacyRequests()
    {
        return $this->hasMany(ToolDataprivacyRequest::class, 'usermodified');
    }

    public function competencyTemplatecohorts()
    {
        return $this->hasMany(CompetencyTemplatecohort::class, 'usermodified');
    }

    public function competencyPlans()
    {
        return $this->hasMany(CompetencyPlan::class, 'usermodified');
    }

    public function userPasswordHistorys()
    {
        return $this->hasMany(UserPasswordHistory::class, 'userid');
    }

    public function userPasswordResetss()
    {
        return $this->hasMany(UserPasswordResets::class, 'userid');
    }

    public function assignfeedbackEditpdfQuicks()
    {
        return $this->hasMany(AssignfeedbackEditpdfQuick::class, 'userid');
    }

    public function configLogs()
    {
        return $this->hasMany(ConfigLog::class, 'userid');
    }

    public function badges()
    {
        return $this->hasMany(Badge::class, 'usermodified');
    }

    public function badges()
    {
        return $this->hasMany(Badge::class, 'usercreated');
    }

    public function backupControllerss()
    {
        return $this->hasMany(BackupControllers::class, 'userid');
    }

    public function messageUsersBlockeds()
    {
        return $this->hasMany(MessageUsersBlocked::class, 'userid');
    }

    public function messageUsersBlockeds()
    {
        return $this->hasMany(MessageUsersBlocked::class, 'blockeduserid');
    }

    public function competencyUsercompcourses()
    {
        return $this->hasMany(CompetencyUsercompcourse::class, 'usermodified');
    }

    public function competencyUserevidencecomps()
    {
        return $this->hasMany(CompetencyUserevidencecomp::class, 'usermodified');
    }

    public function authLtiLinkedLogins()
    {
        return $this->hasMany(AuthLtiLinkedLogin::class, 'userid');
    }

    public function taskLogs()
    {
        return $this->hasMany(TaskLog::class, 'userid');
    }

    public function competencyPlancomps()
    {
        return $this->hasMany(CompetencyPlancomp::class, 'usermodified');
    }

    public function userDevicess()
    {
        return $this->hasMany(UserDevices::class, 'userid');
    }

    public function notificationss()
    {
        return $this->hasMany(Notifications::class, 'useridto');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'createdby');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'modifiedby');
    }

    public function userPrivateKeys()
    {
        return $this->hasMany(UserPrivateKey::class, 'userid');
    }

    public function messageContactss()
    {
        return $this->hasMany(MessageContacts::class, 'userid');
    }

    public function messageContactss()
    {
        return $this->hasMany(MessageContacts::class, 'contactid');
    }

    public function oauth2AccessTokens()
    {
        return $this->hasMany(Oauth2AccessToken::class, 'usermodified');
    }

    public function analyticsModelss()
    {
        return $this->hasMany(AnalyticsModels::class, 'usermodified');
    }

    public function upgradeLogs()
    {
        return $this->hasMany(UpgradeLog::class, 'userid');
    }

    public function oauth2SystemAccounts()
    {
        return $this->hasMany(Oauth2SystemAccount::class, 'usermodified');
    }

    public function toolMfaSecretss()
    {
        return $this->hasMany(ToolMfaSecrets::class, 'userid');
    }

    public function competencyUsercomps()
    {
        return $this->hasMany(CompetencyUsercomp::class, 'usermodified');
    }

    public function enrolFlatfiles()
    {
        return $this->hasMany(EnrolFlatfile::class, 'userid');
    }

    public function toolDataprivacyPurposeroles()
    {
        return $this->hasMany(ToolDataprivacyPurposerole::class, 'usermodified');
    }

    public function competencyEvidences()
    {
        return $this->hasMany(CompetencyEvidence::class, 'actionuserid');
    }

    public function competencyEvidences()
    {
        return $this->hasMany(CompetencyEvidence::class, 'usermodified');
    }

    public function contentbankContents()
    {
        return $this->hasMany(ContentbankContent::class, 'usermodified');
    }

    public function contentbankContents()
    {
        return $this->hasMany(ContentbankContent::class, 'usercreated');
    }

    public function roleAssignmentss()
    {
        return $this->hasMany(RoleAssignments::class, 'userid');
    }

    public function logstoreStandardLogs()
    {
        return $this->hasMany(LogstoreStandardLog::class, 'userid');
    }

    public function logstoreStandardLogs()
    {
        return $this->hasMany(LogstoreStandardLog::class, 'realuserid');
    }

    public function logstoreStandardLogs()
    {
        return $this->hasMany(LogstoreStandardLog::class, 'relateduserid');
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class, 'userid');
    }

    public function competencyTemplates()
    {
        return $this->hasMany(CompetencyTemplate::class, 'usermodified');
    }

    public function reportbuilderReports()
    {
        return $this->hasMany(ReportbuilderReport::class, 'usercreated');
    }

    public function reportbuilderReports()
    {
        return $this->hasMany(ReportbuilderReport::class, 'usermodified');
    }

    public function repositoryInstancess()
    {
        return $this->hasMany(RepositoryInstances::class, 'userid');
    }

    public function roleCapabilitiess()
    {
        return $this->hasMany(RoleCapabilities::class, 'modifierid');
    }

    public function questionBankEntriess()
    {
        return $this->hasMany(QuestionBankEntries::class, 'ownerid');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'userid');
    }

    public function portfolioTempdatas()
    {
        return $this->hasMany(PortfolioTempdata::class, 'userid');
    }

    public function portfolioInstanceUsers()
    {
        return $this->hasMany(PortfolioInstanceUser::class, 'userid');
    }

    public function externalServicesUserss()
    {
        return $this->hasMany(ExternalServicesUsers::class, 'userid');
    }

    public function externalTokenss()
    {
        return $this->hasMany(ExternalTokens::class, 'userid');
    }

    public function externalTokenss()
    {
        return $this->hasMany(ExternalTokens::class, 'creatorid');
    }

    public function oauth2RefreshTokens()
    {
        return $this->hasMany(Oauth2RefreshToken::class, 'userid');
    }

    public function oauth2Endpoints()
    {
        return $this->hasMany(Oauth2Endpoint::class, 'usermodified');
    }

    public function authOauth2LinkedLogins()
    {
        return $this->hasMany(AuthOauth2LinkedLogin::class, 'usermodified');
    }

    public function authOauth2LinkedLogins()
    {
        return $this->hasMany(AuthOauth2LinkedLogin::class, 'userid');
    }

    public function oauth2UserFieldMappings()
    {
        return $this->hasMany(Oauth2UserFieldMapping::class, 'usermodified');
    }

    public function assignUserMappings()
    {
        return $this->hasMany(AssignUserMapping::class, 'userid');
    }

    public function assignUserFlagss()
    {
        return $this->hasMany(AssignUserFlags::class, 'userid');
    }

    public function bigbluebuttonbnRecordingss()
    {
        return $this->hasMany(BigbluebuttonbnRecordings::class, 'usermodified');
    }

    public function dataRecordss()
    {
        return $this->hasMany(DataRecords::class, 'userid');
    }

    public function forumDiscussionss()
    {
        return $this->hasMany(ForumDiscussions::class, 'usermodified');
    }

    public function forumDigestss()
    {
        return $this->hasMany(ForumDigests::class, 'userid');
    }

    public function quizAttemptss()
    {
        return $this->hasMany(QuizAttempts::class, 'userid');
    }

    public function scormAttempts()
    {
        return $this->hasMany(ScormAttempt::class, 'userid');
    }

    public function scormAiccSessions()
    {
        return $this->hasMany(ScormAiccSession::class, 'userid');
    }

    public function gradeCategoriesHistorys()
    {
        return $this->hasMany(GradeCategoriesHistory::class, 'loggeduser');
    }

    public function workshopSubmissionss()
    {
        return $this->hasMany(WorkshopSubmissions::class, 'gradeoverby');
    }

    public function workshopSubmissionss()
    {
        return $this->hasMany(WorkshopSubmissions::class, 'authorid');
    }

    public function workshopAggregationss()
    {
        return $this->hasMany(WorkshopAggregations::class, 'userid');
    }

    public function lessonOverridess()
    {
        return $this->hasMany(LessonOverrides::class, 'userid');
    }

    public function quizOverridess()
    {
        return $this->hasMany(QuizOverrides::class, 'userid');
    }

    public function groupsMemberss()
    {
        return $this->hasMany(GroupsMembers::class, 'userid');
    }

    public function assignOverridess()
    {
        return $this->hasMany(AssignOverrides::class, 'userid');
    }

    public function gradeOutcomess()
    {
        return $this->hasMany(GradeOutcomes::class, 'usermodified');
    }

    public function competencyFrameworks()
    {
        return $this->hasMany(CompetencyFramework::class, 'usermodified');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'userid');
    }

    public function competencys()
    {
        return $this->hasMany(Competency::class, 'usermodified');
    }

    public function scaleHistorys()
    {
        return $this->hasMany(ScaleHistory::class, 'loggeduser');
    }

    public function scaleHistorys()
    {
        return $this->hasMany(ScaleHistory::class, 'userid');
    }

    public function quizaccessSebQuizsettingss()
    {
        return $this->hasMany(QuizaccessSebQuizsettings::class, 'usermodified');
    }

    public function badgeIssueds()
    {
        return $this->hasMany(BadgeIssued::class, 'userid');
    }

    public function badgeManualAwards()
    {
        return $this->hasMany(BadgeManualAward::class, 'recipientid');
    }

    public function badgeManualAwards()
    {
        return $this->hasMany(BadgeManualAward::class, 'issuerid');
    }

    public function analyticsModelsLogs()
    {
        return $this->hasMany(AnalyticsModelsLog::class, 'usermodified');
    }

    public function userEnrolmentss()
    {
        return $this->hasMany(UserEnrolments::class, 'userid');
    }

    public function userEnrolmentss()
    {
        return $this->hasMany(UserEnrolments::class, 'modifierid');
    }

    public function enrolPaypals()
    {
        return $this->hasMany(EnrolPaypal::class, 'userid');
    }

    public function gradingDefinitionss()
    {
        return $this->hasMany(GradingDefinitions::class, 'usermodified');
    }

    public function gradingDefinitionss()
    {
        return $this->hasMany(GradingDefinitions::class, 'usercreated');
    }

    public function paymentss()
    {
        return $this->hasMany(Payments::class, 'userid');
    }

    public function messageConversationMemberss()
    {
        return $this->hasMany(MessageConversationMembers::class, 'userid');
    }

    public function messageConversationActionss()
    {
        return $this->hasMany(MessageConversationActions::class, 'userid');
    }

    public function messagess()
    {
        return $this->hasMany(Messages::class, 'useridfrom');
    }

    public function cohortMemberss()
    {
        return $this->hasMany(CohortMembers::class, 'userid');
    }

    public function communicationUsers()
    {
        return $this->hasMany(CommunicationUser::class, 'userid');
    }

    public function reportbuilderSchedules()
    {
        return $this->hasMany(ReportbuilderSchedule::class, 'userviewas');
    }

    public function reportbuilderSchedules()
    {
        return $this->hasMany(ReportbuilderSchedule::class, 'usercreated');
    }

    public function reportbuilderSchedules()
    {
        return $this->hasMany(ReportbuilderSchedule::class, 'usermodified');
    }

    public function reportbuilderAudiences()
    {
        return $this->hasMany(ReportbuilderAudience::class, 'usercreated');
    }

    public function reportbuilderAudiences()
    {
        return $this->hasMany(ReportbuilderAudience::class, 'usermodified');
    }

    public function reportbuilderColumns()
    {
        return $this->hasMany(ReportbuilderColumn::class, 'usercreated');
    }

    public function reportbuilderColumns()
    {
        return $this->hasMany(ReportbuilderColumn::class, 'usermodified');
    }

    public function reportbuilderFilters()
    {
        return $this->hasMany(ReportbuilderFilter::class, 'usercreated');
    }

    public function reportbuilderFilters()
    {
        return $this->hasMany(ReportbuilderFilter::class, 'usermodified');
    }

    public function mnetserviceEnrolEnrolmentss()
    {
        return $this->hasMany(MnetserviceEnrolEnrolments::class, 'userid');
    }

    public function mnetSessions()
    {
        return $this->hasMany(MnetSession::class, 'userid');
    }

    public function portfolioLogs()
    {
        return $this->hasMany(PortfolioLog::class, 'userid');
    }

    public function badgeBackpackOauth2s()
    {
        return $this->hasMany(BadgeBackpackOauth2::class, 'usermodified');
    }

    public function badgeBackpackOauth2s()
    {
        return $this->hasMany(BadgeBackpackOauth2::class, 'userid');
    }

    public function badgeBackpacks()
    {
        return $this->hasMany(BadgeBackpack::class, 'userid');
    }

    public function forumDiscussionSubss()
    {
        return $this->hasMany(ForumDiscussionSubs::class, 'userid');
    }

    public function workshopAssessmentss()
    {
        return $this->hasMany(WorkshopAssessments::class, 'gradinggradeoverby');
    }

    public function workshopAssessmentss()
    {
        return $this->hasMany(WorkshopAssessments::class, 'reviewerid');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'usermodified');
    }

    public function blockRecentlyaccesseditemss()
    {
        return $this->hasMany(BlockRecentlyaccesseditems::class, 'userid');
    }

    public function gradeOutcomesHistorys()
    {
        return $this->hasMany(GradeOutcomesHistory::class, 'loggeduser');
    }

    public function competencyModulecomps()
    {
        return $this->hasMany(CompetencyModulecomp::class, 'usermodified');
    }

    public function competencyRelatedcomps()
    {
        return $this->hasMany(CompetencyRelatedcomp::class, 'usermodified');
    }

    public function competencyCoursecomps()
    {
        return $this->hasMany(CompetencyCoursecomp::class, 'usermodified');
    }

    public function competencyTemplatecomps()
    {
        return $this->hasMany(CompetencyTemplatecomp::class, 'usermodified');
    }

    public function badgeCriteriaMets()
    {
        return $this->hasMany(BadgeCriteriaMet::class, 'userid');
    }

    public function analyticsPredictionActionss()
    {
        return $this->hasMany(AnalyticsPredictionActions::class, 'userid');
    }

    public function enrolLtiUserss()
    {
        return $this->hasMany(EnrolLtiUsers::class, 'userid');
    }

    public function gradingInstancess()
    {
        return $this->hasMany(GradingInstances::class, 'raterid');
    }

    public function messageUserActionss()
    {
        return $this->hasMany(MessageUserActions::class, 'userid');
    }

    public function messageEmailMessagess()
    {
        return $this->hasMany(MessageEmailMessages::class, 'useridto');
    }

    public function questionAttemptStepss()
    {
        return $this->hasMany(QuestionAttemptSteps::class, 'userid');
    }

    public function filess()
    {
        return $this->hasMany(Files::class, 'userid');
    }

    public function gradeImportValuess()
    {
        return $this->hasMany(GradeImportValues::class, 'importer');
    }

    public function gradeImportValuess()
    {
        return $this->hasMany(GradeImportValues::class, 'userid');
    }

    public function gradeGradess()
    {
        return $this->hasMany(GradeGrades::class, 'userid');
    }

    public function gradeGradess()
    {
        return $this->hasMany(GradeGrades::class, 'usermodified');
    }

    public function gradeItemsHistorys()
    {
        return $this->hasMany(GradeItemsHistory::class, 'loggeduser');
    }

    public function fileConversions()
    {
        return $this->hasMany(FileConversion::class, 'usermodified');
    }

    public function gradeGradesHistorys()
    {
        return $this->hasMany(GradeGradesHistory::class, 'userid');
    }

    public function gradeGradesHistorys()
    {
        return $this->hasMany(GradeGradesHistory::class, 'usermodified');
    }

    public function gradeGradesHistorys()
    {
        return $this->hasMany(GradeGradesHistory::class, 'loggeduser');
    }

    public function toolPolicyVersionss()
    {
        return $this->hasMany(ToolPolicyVersions::class, 'usermodified');
    }

    public function toolPolicyAcceptancess()
    {
        return $this->hasMany(ToolPolicyAcceptances::class, 'userid');
    }

    public function toolPolicyAcceptancess()
    {
        return $this->hasMany(ToolPolicyAcceptances::class, 'usermodified');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'auth' => (string)$this->auth,
            'confirmed' => (int)$this->confirmed,
            'policyagreed' => (int)$this->policyagreed,
            'deleted' => (int)$this->deleted,
            'suspended' => (int)$this->suspended,
            'mnethostid' => (int)$this->mnethostid,
            'username' => (string)$this->username,
            'password' => (string)$this->password,
            'idnumber' => (string)$this->idnumber,
            'firstname' => (string)$this->firstname,
            'lastname' => (string)$this->lastname,
            'email' => (string)$this->email,
            'emailstop' => (int)$this->emailstop,
            'phone1' => (string)$this->phone1,
            'phone2' => (string)$this->phone2,
            'institution' => (string)$this->institution,
            'department' => (string)$this->department,
            'address' => (string)$this->address,
            'city' => (string)$this->city,
            'country' => (string)$this->country,
            'lang' => (string)$this->lang,
            'calendartype' => (string)$this->calendartype,
            'theme' => (string)$this->theme,
            'timezone' => (string)$this->timezone,
            'firstaccess' => (int)$this->firstaccess,
            'lastaccess' => (int)$this->lastaccess,
            'lastlogin' => (int)$this->lastlogin,
            'currentlogin' => (int)$this->currentlogin,
            'lastip' => (string)$this->lastip,
            'secret' => (string)$this->secret,
            'picture' => (int)$this->picture,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'mailformat' => (int)$this->mailformat,
            'maildigest' => (int)$this->maildigest,
            'maildisplay' => (int)$this->maildisplay,
            'autosubscribe' => (int)$this->autosubscribe,
            'trackforums' => (int)$this->trackforums,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'trustbitmask' => (int)$this->trustbitmask,
            'imagealt' => (string)$this->imagealt,
            'lastnamephonetic' => (string)$this->lastnamephonetic,
            'firstnamephonetic' => (string)$this->firstnamephonetic,
            'middlename' => (string)$this->middlename,
            'alternatename' => (string)$this->alternatename,
            'moodlenetprofile' => (string)$this->moodlenetprofile,
        ];
    }

    public function searchableAs()
    {
        return 'user_index';
    }
}
