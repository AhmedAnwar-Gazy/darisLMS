<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\CourseController;
use App\Http\Controllers\Api\V1\CourseCategoryController;
use App\Http\Controllers\Api\V1\AssignmentController;
use App\Http\Controllers\Api\V1\QuizController;
use App\Http\Controllers\Api\V1\EnrolmentController;
use App\Http\Controllers\Api\V1\GradeController;
use App\Http\Controllers\Api\V1\ForumController;
use App\Http\Controllers\Api\V1\GroupController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\BadgeController;

/*
|--------------------------------------------------------------------------
| API Routes - Version 1
|--------------------------------------------------------------------------
|
| These routes are loaded by RouteServiceProvider and assigned to the "api"
| middleware group. Enjoy building your API!
|
| Base URL: /api/v1
|
*/

Route::prefix('v1')->group(function () {
    
    // ==================== USERS ====================
    Route::apiResource('users', UserController::class);
    Route::get('users/{id}/enrollments', [UserController::class, 'enrollments'])->name('users.enrollments');
    
    // ==================== COURSES ====================
    Route::apiResource('courses', CourseController::class);
    Route::get('courses/{id}/modules', [CourseController::class, 'modules'])->name('courses.modules');
    Route::get('courses/{id}/enrolled-users', [CourseController::class, 'enrolledUsers'])->name('courses.enrolled-users');
    
    // ==================== COURSE CATEGORIES ====================
    Route::apiResource('categories', CourseCategoryController::class);
    Route::get('categories/{id}/courses', [CourseCategoryController::class, 'courses'])->name('categories.courses');
    Route::get('categories/tree', [CourseCategoryController::class, 'tree'])->name('categories.tree');
    
    // ==================== ASSIGNMENTS ====================
    Route::apiResource('assignments', AssignmentController::class);
    Route::get('assignments/{id}/submissions', [AssignmentController::class, 'submissions'])->name('assignments.submissions');
    Route::get('assignments/{id}/grades', [AssignmentController::class, 'grades'])->name('assignments.grades');
    
    // ==================== QUIZZES ====================
    Route::apiResource('quizzes', QuizController::class);
    Route::get('quizzes/{id}/attempts', [QuizController::class, 'attempts'])->name('quizzes.attempts');
    Route::get('quizzes/{id}/grades', [QuizController::class, 'grades'])->name('quizzes.grades');
    Route::get('quizzes/{id}/questions', [QuizController::class, 'questions'])->name('quizzes.questions');
    
    // ==================== ENROLMENTS ====================
    Route::get('enrolments', [EnrolmentController::class, 'index'])->name('enrolments.index');
    Route::post('enrolments/enrol', [EnrolmentController::class, 'enrolUser'])->name('enrolments.enrol');
    Route::get('enrolments/users', [EnrolmentController::class, 'enrolledUsers'])->name('enrolments.users');
    Route::put('enrolments/{id}', [EnrolmentController::class, 'updateEnrolment'])->name('enrolments.update');
    Route::delete('enrolments/{id}', [EnrolmentController::class, 'unenrolUser'])->name('enrolments.unenrol');
    Route::post('enrolments/{id}/suspend', [EnrolmentController::class, 'suspendEnrolment'])->name('enrolments.suspend');
    Route::post('enrolments/{id}/activate', [EnrolmentController::class, 'activateEnrolment'])->name('enrolments.activate');
    Route::get('enrolments/user/{userId}', [EnrolmentController::class, 'userEnrolments'])->name('enrolments.user');
    
    // ==================== GRADES ====================
    Route::get('grades', [GradeController::class, 'index'])->name('grades.index');
    Route::get('grades/item/{gradeItemId}', [GradeController::class, 'gradesForItem'])->name('grades.item');
    Route::get('grades/user', [GradeController::class, 'userGrades'])->name('grades.user');
    Route::post('grades', [GradeController::class, 'createGrade'])->name('grades.create');
    Route::put('grades/{id}', [GradeController::class, 'updateGrade'])->name('grades.update');
    Route::get('grades/course/{courseId}/summary', [GradeController::class, 'courseSummary'])->name('grades.course.summary');
    Route::get('grades/course/{courseId}/categories', [GradeController::class, 'categories'])->name('grades.categories');
    
    // ==================== FORUMS ====================
    Route::apiResource('forums', ForumController::class);
    Route::get('forums/{id}/discussions', [ForumController::class, 'discussions'])->name('forums.discussions');
    Route::get('forums/discussion/{discussionId}/posts', [ForumController::class, 'discussionPosts'])->name('forums.discussion.posts');
    Route::post('forums/discussion', [ForumController::class, 'createDiscussion'])->name('forums.discussion.create');
    Route::post('forums/post', [ForumController::class, 'createPost'])->name('forums.post.create');
    
    // ==================== GROUPS ====================
    Route::apiResource('groups', GroupController::class);
    Route::get('groups/{id}/members', [GroupController::class, 'members'])->name('groups.members');
    Route::post('groups/member', [GroupController::class, 'addMember'])->name('groups.member.add');
    Route::delete('groups/member/{membershipId}', [GroupController::class, 'removeMember'])->name('groups.member.remove');
    Route::get('groups/course/{courseId}/groupings', [GroupController::class, 'groupings'])->name('groups.groupings');
    Route::get('groups/grouping/{groupingId}/groups', [GroupController::class, 'groupingGroups'])->name('groups.grouping.groups');
    
    // ==================== ROLES ====================
    Route::apiResource('roles', RoleController::class)->only(['index', 'show']);
    Route::get('roles/user/{userId}/assignments', [RoleController::class, 'userAssignments'])->name('roles.user.assignments');
    Route::get('roles/context/{contextId}/assignments', [RoleController::class, 'contextAssignments'])->name('roles.context.assignments');
    Route::post('roles/assign', [RoleController::class, 'assignRole'])->name('roles.assign');
    Route::delete('roles/assign/{id}', [RoleController::class, 'unassignRole'])->name('roles.unassign');
    Route::get('roles/{roleId}/capabilities', [RoleController::class, 'capabilities'])->name('roles.capabilities');
    Route::get('roles/{roleId}/users', [RoleController::class, 'usersWithRole'])->name('roles.users');
    Route::get('roles/{roleId}/allowed-assignments', [RoleController::class, 'allowedAssignments'])->name('roles.allowed-assignments');
    
    // ==================== BADGES ====================
    Route::get('badges', [BadgeController::class, 'index'])->name('badges.index');
    Route::get('badges/{id}', [BadgeController::class, 'show'])->name('badges.show');
    Route::get('badges/{badgeId}/issued', [BadgeController::class, 'issuedBadges'])->name('badges.issued');
    Route::get('badges/user/{userId}', [BadgeController::class, 'userBadges'])->name('badges.user');
    Route::get('badges/{badgeId}/criteria', [BadgeController::class, 'criteria'])->name('badges.criteria');
    Route::post('badges/issue', [BadgeController::class, 'issueBadge'])->name('badges.issue');
});

/*
|--------------------------------------------------------------------------
| Example Route Usage with Middleware
|--------------------------------------------------------------------------
|
| To add authentication and rate limiting, wrap routes like this:
|
| Route::prefix('v1')->middleware(['auth:sanctum', 'throttle:60,1'])->group(function () {
|     // Your routes here
| });
|
| Or apply middleware to specific route groups:
|
| Route::prefix('v1')->group(function () {
|     // Public routes (no auth required)
|     Route::get('courses', [CourseController::class, 'index']);
|     
|     // Protected routes (auth required)
|     Route::middleware('auth:sanctum')->group(function () {
|         Route::post('courses', [CourseController::class, 'store']);
|         Route::put('courses/{id}', [CourseController::class, 'update']);
|         Route::delete('courses/{id}', [CourseController::class, 'destroy']);
|     });
| });
|
*/
