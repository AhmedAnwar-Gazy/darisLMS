<?php

use Illuminate\Support\Facades\Route;

// ========================
// TOOL_BRICKFIELD_CHECKS RESOURCE
// ========================
Route::prefix('tool-brickfield-checks')->group(function () {
    use App\Http\Controllers\Api\V1\ToolBrickfieldChecksController;

    Route::get('/filters', [ToolBrickfieldChecksController::class, 'filters']);
    Route::get('/suggestions', [ToolBrickfieldChecksController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolBrickfieldChecksController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolBrickfieldChecksController::class, 'importTemplate']);
    Route::post('/import', [ToolBrickfieldChecksController::class, 'import']);
    Route::get('/export', [ToolBrickfieldChecksController::class, 'export']);

    Route::post('/bulk-store', [ToolBrickfieldChecksController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolBrickfieldChecksController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolBrickfieldChecksController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolBrickfieldChecksController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolBrickfieldChecksController::class, 'restore']);
    Route::delete('/{id}/force', [ToolBrickfieldChecksController::class, 'forceDelete']);

    Route::get('/', [ToolBrickfieldChecksController::class, 'index']);
    Route::post('/', [ToolBrickfieldChecksController::class, 'store']);
    Route::get('/{id}', [ToolBrickfieldChecksController::class, 'show']);
    Route::put('/{id}', [ToolBrickfieldChecksController::class, 'update']);
    Route::delete('/{id}', [ToolBrickfieldChecksController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolBrickfieldChecksController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolBrickfieldChecksController::class, 'stats']);
});

// ========================
// TOOL_BRICKFIELD_PROCESS RESOURCE
// ========================
Route::prefix('tool-brickfield-process')->group(function () {
    use App\Http\Controllers\Api\V1\ToolBrickfieldProcessController;

    Route::get('/filters', [ToolBrickfieldProcessController::class, 'filters']);
    Route::get('/suggestions', [ToolBrickfieldProcessController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolBrickfieldProcessController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolBrickfieldProcessController::class, 'importTemplate']);
    Route::post('/import', [ToolBrickfieldProcessController::class, 'import']);
    Route::get('/export', [ToolBrickfieldProcessController::class, 'export']);

    Route::post('/bulk-store', [ToolBrickfieldProcessController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolBrickfieldProcessController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolBrickfieldProcessController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolBrickfieldProcessController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolBrickfieldProcessController::class, 'restore']);
    Route::delete('/{id}/force', [ToolBrickfieldProcessController::class, 'forceDelete']);

    Route::get('/', [ToolBrickfieldProcessController::class, 'index']);
    Route::post('/', [ToolBrickfieldProcessController::class, 'store']);
    Route::get('/{id}', [ToolBrickfieldProcessController::class, 'show']);
    Route::put('/{id}', [ToolBrickfieldProcessController::class, 'update']);
    Route::delete('/{id}', [ToolBrickfieldProcessController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolBrickfieldProcessController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolBrickfieldProcessController::class, 'stats']);
});

// ========================
// TOOL_BRICKFIELD_SCHEDULE RESOURCE
// ========================
Route::prefix('tool-brickfield-schedule')->group(function () {
    use App\Http\Controllers\Api\V1\ToolBrickfieldScheduleController;

    Route::get('/filters', [ToolBrickfieldScheduleController::class, 'filters']);
    Route::get('/suggestions', [ToolBrickfieldScheduleController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolBrickfieldScheduleController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolBrickfieldScheduleController::class, 'importTemplate']);
    Route::post('/import', [ToolBrickfieldScheduleController::class, 'import']);
    Route::get('/export', [ToolBrickfieldScheduleController::class, 'export']);

    Route::post('/bulk-store', [ToolBrickfieldScheduleController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolBrickfieldScheduleController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolBrickfieldScheduleController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolBrickfieldScheduleController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolBrickfieldScheduleController::class, 'restore']);
    Route::delete('/{id}/force', [ToolBrickfieldScheduleController::class, 'forceDelete']);

    Route::get('/', [ToolBrickfieldScheduleController::class, 'index']);
    Route::post('/', [ToolBrickfieldScheduleController::class, 'store']);
    Route::get('/{id}', [ToolBrickfieldScheduleController::class, 'show']);
    Route::put('/{id}', [ToolBrickfieldScheduleController::class, 'update']);
    Route::delete('/{id}', [ToolBrickfieldScheduleController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolBrickfieldScheduleController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolBrickfieldScheduleController::class, 'stats']);
});

// ========================
// TOOL_COHORTROLES RESOURCE
// ========================
Route::prefix('tool-cohortroles')->group(function () {
    use App\Http\Controllers\Api\V1\ToolCohortrolesController;

    Route::get('/filters', [ToolCohortrolesController::class, 'filters']);
    Route::get('/suggestions', [ToolCohortrolesController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolCohortrolesController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolCohortrolesController::class, 'importTemplate']);
    Route::post('/import', [ToolCohortrolesController::class, 'import']);
    Route::get('/export', [ToolCohortrolesController::class, 'export']);

    Route::post('/bulk-store', [ToolCohortrolesController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolCohortrolesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolCohortrolesController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolCohortrolesController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolCohortrolesController::class, 'restore']);
    Route::delete('/{id}/force', [ToolCohortrolesController::class, 'forceDelete']);

    Route::get('/', [ToolCohortrolesController::class, 'index']);
    Route::post('/', [ToolCohortrolesController::class, 'store']);
    Route::get('/{id}', [ToolCohortrolesController::class, 'show']);
    Route::put('/{id}', [ToolCohortrolesController::class, 'update']);
    Route::delete('/{id}', [ToolCohortrolesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolCohortrolesController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolCohortrolesController::class, 'stats']);
});

// ========================
// TOOL_CUSTOMLANG_COMPONENTS RESOURCE
// ========================
Route::prefix('tool-customlang-components')->group(function () {
    use App\Http\Controllers\Api\V1\ToolCustomlangComponentsController;

    Route::get('/filters', [ToolCustomlangComponentsController::class, 'filters']);
    Route::get('/suggestions', [ToolCustomlangComponentsController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolCustomlangComponentsController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolCustomlangComponentsController::class, 'importTemplate']);
    Route::post('/import', [ToolCustomlangComponentsController::class, 'import']);
    Route::get('/export', [ToolCustomlangComponentsController::class, 'export']);

    Route::post('/bulk-store', [ToolCustomlangComponentsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolCustomlangComponentsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolCustomlangComponentsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolCustomlangComponentsController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolCustomlangComponentsController::class, 'restore']);
    Route::delete('/{id}/force', [ToolCustomlangComponentsController::class, 'forceDelete']);

    Route::get('/', [ToolCustomlangComponentsController::class, 'index']);
    Route::post('/', [ToolCustomlangComponentsController::class, 'store']);
    Route::get('/{id}', [ToolCustomlangComponentsController::class, 'show']);
    Route::put('/{id}', [ToolCustomlangComponentsController::class, 'update']);
    Route::delete('/{id}', [ToolCustomlangComponentsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolCustomlangComponentsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolCustomlangComponentsController::class, 'stats']);
});

// ========================
// TOOL_DATAPRIVACY_PURPOSE RESOURCE
// ========================
Route::prefix('tool-dataprivacy-purpose')->group(function () {
    use App\Http\Controllers\Api\V1\ToolDataprivacyPurposeController;

    Route::get('/filters', [ToolDataprivacyPurposeController::class, 'filters']);
    Route::get('/suggestions', [ToolDataprivacyPurposeController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolDataprivacyPurposeController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolDataprivacyPurposeController::class, 'importTemplate']);
    Route::post('/import', [ToolDataprivacyPurposeController::class, 'import']);
    Route::get('/export', [ToolDataprivacyPurposeController::class, 'export']);

    Route::post('/bulk-store', [ToolDataprivacyPurposeController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolDataprivacyPurposeController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolDataprivacyPurposeController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolDataprivacyPurposeController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolDataprivacyPurposeController::class, 'restore']);
    Route::delete('/{id}/force', [ToolDataprivacyPurposeController::class, 'forceDelete']);

    Route::get('/', [ToolDataprivacyPurposeController::class, 'index']);
    Route::post('/', [ToolDataprivacyPurposeController::class, 'store']);
    Route::get('/{id}', [ToolDataprivacyPurposeController::class, 'show']);
    Route::put('/{id}', [ToolDataprivacyPurposeController::class, 'update']);
    Route::delete('/{id}', [ToolDataprivacyPurposeController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolDataprivacyPurposeController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolDataprivacyPurposeController::class, 'stats']);
});

// ========================
// TOOL_DATAPRIVACY_CATEGORY RESOURCE
// ========================
Route::prefix('tool-dataprivacy-category')->group(function () {
    use App\Http\Controllers\Api\V1\ToolDataprivacyCategoryController;

    Route::get('/filters', [ToolDataprivacyCategoryController::class, 'filters']);
    Route::get('/suggestions', [ToolDataprivacyCategoryController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolDataprivacyCategoryController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolDataprivacyCategoryController::class, 'importTemplate']);
    Route::post('/import', [ToolDataprivacyCategoryController::class, 'import']);
    Route::get('/export', [ToolDataprivacyCategoryController::class, 'export']);

    Route::post('/bulk-store', [ToolDataprivacyCategoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolDataprivacyCategoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolDataprivacyCategoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolDataprivacyCategoryController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolDataprivacyCategoryController::class, 'restore']);
    Route::delete('/{id}/force', [ToolDataprivacyCategoryController::class, 'forceDelete']);

    Route::get('/', [ToolDataprivacyCategoryController::class, 'index']);
    Route::post('/', [ToolDataprivacyCategoryController::class, 'store']);
    Route::get('/{id}', [ToolDataprivacyCategoryController::class, 'show']);
    Route::put('/{id}', [ToolDataprivacyCategoryController::class, 'update']);
    Route::delete('/{id}', [ToolDataprivacyCategoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolDataprivacyCategoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolDataprivacyCategoryController::class, 'stats']);
});

// ========================
// TOOL_DATAPRIVACY_CTXEXPIRED RESOURCE
// ========================
Route::prefix('tool-dataprivacy-ctxexpired')->group(function () {
    use App\Http\Controllers\Api\V1\ToolDataprivacyCtxexpiredController;

    Route::get('/filters', [ToolDataprivacyCtxexpiredController::class, 'filters']);
    Route::get('/suggestions', [ToolDataprivacyCtxexpiredController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolDataprivacyCtxexpiredController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolDataprivacyCtxexpiredController::class, 'importTemplate']);
    Route::post('/import', [ToolDataprivacyCtxexpiredController::class, 'import']);
    Route::get('/export', [ToolDataprivacyCtxexpiredController::class, 'export']);

    Route::post('/bulk-store', [ToolDataprivacyCtxexpiredController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolDataprivacyCtxexpiredController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolDataprivacyCtxexpiredController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolDataprivacyCtxexpiredController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolDataprivacyCtxexpiredController::class, 'restore']);
    Route::delete('/{id}/force', [ToolDataprivacyCtxexpiredController::class, 'forceDelete']);

    Route::get('/', [ToolDataprivacyCtxexpiredController::class, 'index']);
    Route::post('/', [ToolDataprivacyCtxexpiredController::class, 'store']);
    Route::get('/{id}', [ToolDataprivacyCtxexpiredController::class, 'show']);
    Route::put('/{id}', [ToolDataprivacyCtxexpiredController::class, 'update']);
    Route::delete('/{id}', [ToolDataprivacyCtxexpiredController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolDataprivacyCtxexpiredController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolDataprivacyCtxexpiredController::class, 'stats']);
});

// ========================
// TOOL_DATAPRIVACY_CONTEXTLIST RESOURCE
// ========================
Route::prefix('tool-dataprivacy-contextlist')->group(function () {
    use App\Http\Controllers\Api\V1\ToolDataprivacyContextlistController;

    Route::get('/filters', [ToolDataprivacyContextlistController::class, 'filters']);
    Route::get('/suggestions', [ToolDataprivacyContextlistController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolDataprivacyContextlistController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolDataprivacyContextlistController::class, 'importTemplate']);
    Route::post('/import', [ToolDataprivacyContextlistController::class, 'import']);
    Route::get('/export', [ToolDataprivacyContextlistController::class, 'export']);

    Route::post('/bulk-store', [ToolDataprivacyContextlistController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolDataprivacyContextlistController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolDataprivacyContextlistController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolDataprivacyContextlistController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolDataprivacyContextlistController::class, 'restore']);
    Route::delete('/{id}/force', [ToolDataprivacyContextlistController::class, 'forceDelete']);

    Route::get('/', [ToolDataprivacyContextlistController::class, 'index']);
    Route::post('/', [ToolDataprivacyContextlistController::class, 'store']);
    Route::get('/{id}', [ToolDataprivacyContextlistController::class, 'show']);
    Route::put('/{id}', [ToolDataprivacyContextlistController::class, 'update']);
    Route::delete('/{id}', [ToolDataprivacyContextlistController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolDataprivacyContextlistController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolDataprivacyContextlistController::class, 'stats']);
});

// ========================
// TOOL_MFA RESOURCE
// ========================
Route::prefix('tool-mfa')->group(function () {
    use App\Http\Controllers\Api\V1\ToolMfaController;

    Route::get('/filters', [ToolMfaController::class, 'filters']);
    Route::get('/suggestions', [ToolMfaController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolMfaController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolMfaController::class, 'importTemplate']);
    Route::post('/import', [ToolMfaController::class, 'import']);
    Route::get('/export', [ToolMfaController::class, 'export']);

    Route::post('/bulk-store', [ToolMfaController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolMfaController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolMfaController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolMfaController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolMfaController::class, 'restore']);
    Route::delete('/{id}/force', [ToolMfaController::class, 'forceDelete']);

    Route::get('/', [ToolMfaController::class, 'index']);
    Route::post('/', [ToolMfaController::class, 'store']);
    Route::get('/{id}', [ToolMfaController::class, 'show']);
    Route::put('/{id}', [ToolMfaController::class, 'update']);
    Route::delete('/{id}', [ToolMfaController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolMfaController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolMfaController::class, 'stats']);
});

// ========================
// TOOL_MONITOR_RULES RESOURCE
// ========================
Route::prefix('tool-monitor-rules')->group(function () {
    use App\Http\Controllers\Api\V1\ToolMonitorRulesController;

    Route::get('/filters', [ToolMonitorRulesController::class, 'filters']);
    Route::get('/suggestions', [ToolMonitorRulesController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolMonitorRulesController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolMonitorRulesController::class, 'importTemplate']);
    Route::post('/import', [ToolMonitorRulesController::class, 'import']);
    Route::get('/export', [ToolMonitorRulesController::class, 'export']);

    Route::post('/bulk-store', [ToolMonitorRulesController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolMonitorRulesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolMonitorRulesController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolMonitorRulesController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolMonitorRulesController::class, 'restore']);
    Route::delete('/{id}/force', [ToolMonitorRulesController::class, 'forceDelete']);

    Route::get('/', [ToolMonitorRulesController::class, 'index']);
    Route::post('/', [ToolMonitorRulesController::class, 'store']);
    Route::get('/{id}', [ToolMonitorRulesController::class, 'show']);
    Route::put('/{id}', [ToolMonitorRulesController::class, 'update']);
    Route::delete('/{id}', [ToolMonitorRulesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolMonitorRulesController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolMonitorRulesController::class, 'stats']);
});

// ========================
// TOOL_USERTOURS_TOURS RESOURCE
// ========================
Route::prefix('tool-usertours-tours')->group(function () {
    use App\Http\Controllers\Api\V1\ToolUsertoursToursController;

    Route::get('/filters', [ToolUsertoursToursController::class, 'filters']);
    Route::get('/suggestions', [ToolUsertoursToursController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolUsertoursToursController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolUsertoursToursController::class, 'importTemplate']);
    Route::post('/import', [ToolUsertoursToursController::class, 'import']);
    Route::get('/export', [ToolUsertoursToursController::class, 'export']);

    Route::post('/bulk-store', [ToolUsertoursToursController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolUsertoursToursController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolUsertoursToursController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolUsertoursToursController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolUsertoursToursController::class, 'restore']);
    Route::delete('/{id}/force', [ToolUsertoursToursController::class, 'forceDelete']);

    Route::get('/', [ToolUsertoursToursController::class, 'index']);
    Route::post('/', [ToolUsertoursToursController::class, 'store']);
    Route::get('/{id}', [ToolUsertoursToursController::class, 'show']);
    Route::put('/{id}', [ToolUsertoursToursController::class, 'update']);
    Route::delete('/{id}', [ToolUsertoursToursController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolUsertoursToursController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolUsertoursToursController::class, 'stats']);
});

// ========================
// BLOCK_RECENT_ACTIVITY RESOURCE
// ========================
Route::prefix('block-recent-activity')->group(function () {
    use App\Http\Controllers\Api\V1\BlockRecentActivityController;

    Route::get('/filters', [BlockRecentActivityController::class, 'filters']);
    Route::get('/suggestions', [BlockRecentActivityController::class, 'suggestions']);
    Route::post('/advanced-search', [BlockRecentActivityController::class, 'advancedSearch']);

    Route::get('/import-template', [BlockRecentActivityController::class, 'importTemplate']);
    Route::post('/import', [BlockRecentActivityController::class, 'import']);
    Route::get('/export', [BlockRecentActivityController::class, 'export']);

    Route::post('/bulk-store', [BlockRecentActivityController::class, 'bulkStore']);
    Route::post('/bulk-update', [BlockRecentActivityController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BlockRecentActivityController::class, 'bulkDestroy']);

    Route::get('/trashed', [BlockRecentActivityController::class, 'trashed']);
    Route::post('/{id}/restore', [BlockRecentActivityController::class, 'restore']);
    Route::delete('/{id}/force', [BlockRecentActivityController::class, 'forceDelete']);

    Route::get('/', [BlockRecentActivityController::class, 'index']);
    Route::post('/', [BlockRecentActivityController::class, 'store']);
    Route::get('/{id}', [BlockRecentActivityController::class, 'show']);
    Route::put('/{id}', [BlockRecentActivityController::class, 'update']);
    Route::delete('/{id}', [BlockRecentActivityController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BlockRecentActivityController::class, 'duplicate']);
    Route::get('/{id}/stats', [BlockRecentActivityController::class, 'stats']);
});

// ========================
// BLOCK_RSS_CLIENT RESOURCE
// ========================
Route::prefix('block-rss-client')->group(function () {
    use App\Http\Controllers\Api\V1\BlockRssClientController;

    Route::get('/filters', [BlockRssClientController::class, 'filters']);
    Route::get('/suggestions', [BlockRssClientController::class, 'suggestions']);
    Route::post('/advanced-search', [BlockRssClientController::class, 'advancedSearch']);

    Route::get('/import-template', [BlockRssClientController::class, 'importTemplate']);
    Route::post('/import', [BlockRssClientController::class, 'import']);
    Route::get('/export', [BlockRssClientController::class, 'export']);

    Route::post('/bulk-store', [BlockRssClientController::class, 'bulkStore']);
    Route::post('/bulk-update', [BlockRssClientController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BlockRssClientController::class, 'bulkDestroy']);

    Route::get('/trashed', [BlockRssClientController::class, 'trashed']);
    Route::post('/{id}/restore', [BlockRssClientController::class, 'restore']);
    Route::delete('/{id}/force', [BlockRssClientController::class, 'forceDelete']);

    Route::get('/', [BlockRssClientController::class, 'index']);
    Route::post('/', [BlockRssClientController::class, 'store']);
    Route::get('/{id}', [BlockRssClientController::class, 'show']);
    Route::put('/{id}', [BlockRssClientController::class, 'update']);
    Route::delete('/{id}', [BlockRssClientController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BlockRssClientController::class, 'duplicate']);
    Route::get('/{id}/stats', [BlockRssClientController::class, 'stats']);
});

// ========================
// ENROL_LTI_LTI2_CONSUMER RESOURCE
// ========================
Route::prefix('enrol-lti-lti2-consumer')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiLti2ConsumerController;

    Route::get('/filters', [EnrolLtiLti2ConsumerController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiLti2ConsumerController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiLti2ConsumerController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiLti2ConsumerController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiLti2ConsumerController::class, 'import']);
    Route::get('/export', [EnrolLtiLti2ConsumerController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiLti2ConsumerController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiLti2ConsumerController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiLti2ConsumerController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiLti2ConsumerController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiLti2ConsumerController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiLti2ConsumerController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiLti2ConsumerController::class, 'index']);
    Route::post('/', [EnrolLtiLti2ConsumerController::class, 'store']);
    Route::get('/{id}', [EnrolLtiLti2ConsumerController::class, 'show']);
    Route::put('/{id}', [EnrolLtiLti2ConsumerController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiLti2ConsumerController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiLti2ConsumerController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiLti2ConsumerController::class, 'stats']);
});

// ========================
// ENROL_LTI_LTI2_SHARE_KEY RESOURCE
// ========================
Route::prefix('enrol-lti-lti2-share-key')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiLti2ShareKeyController;

    Route::get('/filters', [EnrolLtiLti2ShareKeyController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiLti2ShareKeyController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiLti2ShareKeyController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiLti2ShareKeyController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiLti2ShareKeyController::class, 'import']);
    Route::get('/export', [EnrolLtiLti2ShareKeyController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiLti2ShareKeyController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiLti2ShareKeyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiLti2ShareKeyController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiLti2ShareKeyController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiLti2ShareKeyController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiLti2ShareKeyController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiLti2ShareKeyController::class, 'index']);
    Route::post('/', [EnrolLtiLti2ShareKeyController::class, 'store']);
    Route::get('/{id}', [EnrolLtiLti2ShareKeyController::class, 'show']);
    Route::put('/{id}', [EnrolLtiLti2ShareKeyController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiLti2ShareKeyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiLti2ShareKeyController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiLti2ShareKeyController::class, 'stats']);
});

// ========================
// ENROL_LTI_APP_REGISTRATION RESOURCE
// ========================
Route::prefix('enrol-lti-app-registration')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiAppRegistrationController;

    Route::get('/filters', [EnrolLtiAppRegistrationController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiAppRegistrationController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiAppRegistrationController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiAppRegistrationController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiAppRegistrationController::class, 'import']);
    Route::get('/export', [EnrolLtiAppRegistrationController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiAppRegistrationController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiAppRegistrationController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiAppRegistrationController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiAppRegistrationController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiAppRegistrationController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiAppRegistrationController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiAppRegistrationController::class, 'index']);
    Route::post('/', [EnrolLtiAppRegistrationController::class, 'store']);
    Route::get('/{id}', [EnrolLtiAppRegistrationController::class, 'show']);
    Route::put('/{id}', [EnrolLtiAppRegistrationController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiAppRegistrationController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiAppRegistrationController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiAppRegistrationController::class, 'stats']);
});

// ========================
// CONFIG RESOURCE
// ========================
Route::prefix('config')->group(function () {
    use App\Http\Controllers\Api\V1\ConfigController;

    Route::get('/filters', [ConfigController::class, 'filters']);
    Route::get('/suggestions', [ConfigController::class, 'suggestions']);
    Route::post('/advanced-search', [ConfigController::class, 'advancedSearch']);

    Route::get('/import-template', [ConfigController::class, 'importTemplate']);
    Route::post('/import', [ConfigController::class, 'import']);
    Route::get('/export', [ConfigController::class, 'export']);

    Route::post('/bulk-store', [ConfigController::class, 'bulkStore']);
    Route::post('/bulk-update', [ConfigController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ConfigController::class, 'bulkDestroy']);

    Route::get('/trashed', [ConfigController::class, 'trashed']);
    Route::post('/{id}/restore', [ConfigController::class, 'restore']);
    Route::delete('/{id}/force', [ConfigController::class, 'forceDelete']);

    Route::get('/', [ConfigController::class, 'index']);
    Route::post('/', [ConfigController::class, 'store']);
    Route::get('/{id}', [ConfigController::class, 'show']);
    Route::put('/{id}', [ConfigController::class, 'update']);
    Route::delete('/{id}', [ConfigController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ConfigController::class, 'duplicate']);
    Route::get('/{id}/stats', [ConfigController::class, 'stats']);
});

// ========================
// CONFIG_PLUGINS RESOURCE
// ========================
Route::prefix('config-plugins')->group(function () {
    use App\Http\Controllers\Api\V1\ConfigPluginsController;

    Route::get('/filters', [ConfigPluginsController::class, 'filters']);
    Route::get('/suggestions', [ConfigPluginsController::class, 'suggestions']);
    Route::post('/advanced-search', [ConfigPluginsController::class, 'advancedSearch']);

    Route::get('/import-template', [ConfigPluginsController::class, 'importTemplate']);
    Route::post('/import', [ConfigPluginsController::class, 'import']);
    Route::get('/export', [ConfigPluginsController::class, 'export']);

    Route::post('/bulk-store', [ConfigPluginsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ConfigPluginsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ConfigPluginsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ConfigPluginsController::class, 'trashed']);
    Route::post('/{id}/restore', [ConfigPluginsController::class, 'restore']);
    Route::delete('/{id}/force', [ConfigPluginsController::class, 'forceDelete']);

    Route::get('/', [ConfigPluginsController::class, 'index']);
    Route::post('/', [ConfigPluginsController::class, 'store']);
    Route::get('/{id}', [ConfigPluginsController::class, 'show']);
    Route::put('/{id}', [ConfigPluginsController::class, 'update']);
    Route::delete('/{id}', [ConfigPluginsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ConfigPluginsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ConfigPluginsController::class, 'stats']);
});

// ========================
// COURSE RESOURCE
// ========================
Route::prefix('course')->group(function () {
    use App\Http\Controllers\Api\V1\CourseController;

    Route::get('/filters', [CourseController::class, 'filters']);
    Route::get('/suggestions', [CourseController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseController::class, 'importTemplate']);
    Route::post('/import', [CourseController::class, 'import']);
    Route::get('/export', [CourseController::class, 'export']);

    Route::post('/bulk-store', [CourseController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseController::class, 'restore']);
    Route::delete('/{id}/force', [CourseController::class, 'forceDelete']);

    Route::get('/', [CourseController::class, 'index']);
    Route::post('/', [CourseController::class, 'store']);
    Route::get('/{id}', [CourseController::class, 'show']);
    Route::put('/{id}', [CourseController::class, 'update']);
    Route::delete('/{id}', [CourseController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseController::class, 'stats']);
});

// ========================
// COURSE_CATEGORIES RESOURCE
// ========================
Route::prefix('course-categories')->group(function () {
    use App\Http\Controllers\Api\V1\CourseCategoriesController;

    Route::get('/filters', [CourseCategoriesController::class, 'filters']);
    Route::get('/suggestions', [CourseCategoriesController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseCategoriesController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseCategoriesController::class, 'importTemplate']);
    Route::post('/import', [CourseCategoriesController::class, 'import']);
    Route::get('/export', [CourseCategoriesController::class, 'export']);

    Route::post('/bulk-store', [CourseCategoriesController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseCategoriesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseCategoriesController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseCategoriesController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseCategoriesController::class, 'restore']);
    Route::delete('/{id}/force', [CourseCategoriesController::class, 'forceDelete']);

    Route::get('/', [CourseCategoriesController::class, 'index']);
    Route::post('/', [CourseCategoriesController::class, 'store']);
    Route::get('/{id}', [CourseCategoriesController::class, 'show']);
    Route::put('/{id}', [CourseCategoriesController::class, 'update']);
    Route::delete('/{id}', [CourseCategoriesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseCategoriesController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseCategoriesController::class, 'stats']);
});

// ========================
// COURSE_COMPLETION_AGGR_METHD RESOURCE
// ========================
Route::prefix('course-completion-aggr-methd')->group(function () {
    use App\Http\Controllers\Api\V1\CourseCompletionAggrMethdController;

    Route::get('/filters', [CourseCompletionAggrMethdController::class, 'filters']);
    Route::get('/suggestions', [CourseCompletionAggrMethdController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseCompletionAggrMethdController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseCompletionAggrMethdController::class, 'importTemplate']);
    Route::post('/import', [CourseCompletionAggrMethdController::class, 'import']);
    Route::get('/export', [CourseCompletionAggrMethdController::class, 'export']);

    Route::post('/bulk-store', [CourseCompletionAggrMethdController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseCompletionAggrMethdController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseCompletionAggrMethdController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseCompletionAggrMethdController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseCompletionAggrMethdController::class, 'restore']);
    Route::delete('/{id}/force', [CourseCompletionAggrMethdController::class, 'forceDelete']);

    Route::get('/', [CourseCompletionAggrMethdController::class, 'index']);
    Route::post('/', [CourseCompletionAggrMethdController::class, 'store']);
    Route::get('/{id}', [CourseCompletionAggrMethdController::class, 'show']);
    Route::put('/{id}', [CourseCompletionAggrMethdController::class, 'update']);
    Route::delete('/{id}', [CourseCompletionAggrMethdController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseCompletionAggrMethdController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseCompletionAggrMethdController::class, 'stats']);
});

// ========================
// COURSE_COMPLETION_CRITERIA RESOURCE
// ========================
Route::prefix('course-completion-criteria')->group(function () {
    use App\Http\Controllers\Api\V1\CourseCompletionCriteriaController;

    Route::get('/filters', [CourseCompletionCriteriaController::class, 'filters']);
    Route::get('/suggestions', [CourseCompletionCriteriaController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseCompletionCriteriaController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseCompletionCriteriaController::class, 'importTemplate']);
    Route::post('/import', [CourseCompletionCriteriaController::class, 'import']);
    Route::get('/export', [CourseCompletionCriteriaController::class, 'export']);

    Route::post('/bulk-store', [CourseCompletionCriteriaController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseCompletionCriteriaController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseCompletionCriteriaController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseCompletionCriteriaController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseCompletionCriteriaController::class, 'restore']);
    Route::delete('/{id}/force', [CourseCompletionCriteriaController::class, 'forceDelete']);

    Route::get('/', [CourseCompletionCriteriaController::class, 'index']);
    Route::post('/', [CourseCompletionCriteriaController::class, 'store']);
    Route::get('/{id}', [CourseCompletionCriteriaController::class, 'show']);
    Route::put('/{id}', [CourseCompletionCriteriaController::class, 'update']);
    Route::delete('/{id}', [CourseCompletionCriteriaController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseCompletionCriteriaController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseCompletionCriteriaController::class, 'stats']);
});

// ========================
// COURSE_COMPLETION_CRIT_COMPL RESOURCE
// ========================
Route::prefix('course-completion-crit-compl')->group(function () {
    use App\Http\Controllers\Api\V1\CourseCompletionCritComplController;

    Route::get('/filters', [CourseCompletionCritComplController::class, 'filters']);
    Route::get('/suggestions', [CourseCompletionCritComplController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseCompletionCritComplController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseCompletionCritComplController::class, 'importTemplate']);
    Route::post('/import', [CourseCompletionCritComplController::class, 'import']);
    Route::get('/export', [CourseCompletionCritComplController::class, 'export']);

    Route::post('/bulk-store', [CourseCompletionCritComplController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseCompletionCritComplController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseCompletionCritComplController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseCompletionCritComplController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseCompletionCritComplController::class, 'restore']);
    Route::delete('/{id}/force', [CourseCompletionCritComplController::class, 'forceDelete']);

    Route::get('/', [CourseCompletionCritComplController::class, 'index']);
    Route::post('/', [CourseCompletionCritComplController::class, 'store']);
    Route::get('/{id}', [CourseCompletionCritComplController::class, 'show']);
    Route::put('/{id}', [CourseCompletionCritComplController::class, 'update']);
    Route::delete('/{id}', [CourseCompletionCritComplController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseCompletionCritComplController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseCompletionCritComplController::class, 'stats']);
});

// ========================
// COURSE_COMPLETIONS RESOURCE
// ========================
Route::prefix('course-completions')->group(function () {
    use App\Http\Controllers\Api\V1\CourseCompletionsController;

    Route::get('/filters', [CourseCompletionsController::class, 'filters']);
    Route::get('/suggestions', [CourseCompletionsController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseCompletionsController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseCompletionsController::class, 'importTemplate']);
    Route::post('/import', [CourseCompletionsController::class, 'import']);
    Route::get('/export', [CourseCompletionsController::class, 'export']);

    Route::post('/bulk-store', [CourseCompletionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseCompletionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseCompletionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseCompletionsController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseCompletionsController::class, 'restore']);
    Route::delete('/{id}/force', [CourseCompletionsController::class, 'forceDelete']);

    Route::get('/', [CourseCompletionsController::class, 'index']);
    Route::post('/', [CourseCompletionsController::class, 'store']);
    Route::get('/{id}', [CourseCompletionsController::class, 'show']);
    Route::put('/{id}', [CourseCompletionsController::class, 'update']);
    Route::delete('/{id}', [CourseCompletionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseCompletionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseCompletionsController::class, 'stats']);
});

// ========================
// COURSE_MODULES_COMPLETION RESOURCE
// ========================
Route::prefix('course-modules-completion')->group(function () {
    use App\Http\Controllers\Api\V1\CourseModulesCompletionController;

    Route::get('/filters', [CourseModulesCompletionController::class, 'filters']);
    Route::get('/suggestions', [CourseModulesCompletionController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseModulesCompletionController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseModulesCompletionController::class, 'importTemplate']);
    Route::post('/import', [CourseModulesCompletionController::class, 'import']);
    Route::get('/export', [CourseModulesCompletionController::class, 'export']);

    Route::post('/bulk-store', [CourseModulesCompletionController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseModulesCompletionController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseModulesCompletionController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseModulesCompletionController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseModulesCompletionController::class, 'restore']);
    Route::delete('/{id}/force', [CourseModulesCompletionController::class, 'forceDelete']);

    Route::get('/', [CourseModulesCompletionController::class, 'index']);
    Route::post('/', [CourseModulesCompletionController::class, 'store']);
    Route::get('/{id}', [CourseModulesCompletionController::class, 'show']);
    Route::put('/{id}', [CourseModulesCompletionController::class, 'update']);
    Route::delete('/{id}', [CourseModulesCompletionController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseModulesCompletionController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseModulesCompletionController::class, 'stats']);
});

// ========================
// COURSE_SECTIONS RESOURCE
// ========================
Route::prefix('course-sections')->group(function () {
    use App\Http\Controllers\Api\V1\CourseSectionsController;

    Route::get('/filters', [CourseSectionsController::class, 'filters']);
    Route::get('/suggestions', [CourseSectionsController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseSectionsController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseSectionsController::class, 'importTemplate']);
    Route::post('/import', [CourseSectionsController::class, 'import']);
    Route::get('/export', [CourseSectionsController::class, 'export']);

    Route::post('/bulk-store', [CourseSectionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseSectionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseSectionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseSectionsController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseSectionsController::class, 'restore']);
    Route::delete('/{id}/force', [CourseSectionsController::class, 'forceDelete']);

    Route::get('/', [CourseSectionsController::class, 'index']);
    Route::post('/', [CourseSectionsController::class, 'store']);
    Route::get('/{id}', [CourseSectionsController::class, 'show']);
    Route::put('/{id}', [CourseSectionsController::class, 'update']);
    Route::delete('/{id}', [CourseSectionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseSectionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseSectionsController::class, 'stats']);
});

// ========================
// COURSE_REQUEST RESOURCE
// ========================
Route::prefix('course-request')->group(function () {
    use App\Http\Controllers\Api\V1\CourseRequestController;

    Route::get('/filters', [CourseRequestController::class, 'filters']);
    Route::get('/suggestions', [CourseRequestController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseRequestController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseRequestController::class, 'importTemplate']);
    Route::post('/import', [CourseRequestController::class, 'import']);
    Route::get('/export', [CourseRequestController::class, 'export']);

    Route::post('/bulk-store', [CourseRequestController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseRequestController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseRequestController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseRequestController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseRequestController::class, 'restore']);
    Route::delete('/{id}/force', [CourseRequestController::class, 'forceDelete']);

    Route::get('/', [CourseRequestController::class, 'index']);
    Route::post('/', [CourseRequestController::class, 'store']);
    Route::get('/{id}', [CourseRequestController::class, 'show']);
    Route::put('/{id}', [CourseRequestController::class, 'update']);
    Route::delete('/{id}', [CourseRequestController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseRequestController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseRequestController::class, 'stats']);
});

// ========================
// CACHE_FILTERS RESOURCE
// ========================
Route::prefix('cache-filters')->group(function () {
    use App\Http\Controllers\Api\V1\CacheFiltersController;

    Route::get('/filters', [CacheFiltersController::class, 'filters']);
    Route::get('/suggestions', [CacheFiltersController::class, 'suggestions']);
    Route::post('/advanced-search', [CacheFiltersController::class, 'advancedSearch']);

    Route::get('/import-template', [CacheFiltersController::class, 'importTemplate']);
    Route::post('/import', [CacheFiltersController::class, 'import']);
    Route::get('/export', [CacheFiltersController::class, 'export']);

    Route::post('/bulk-store', [CacheFiltersController::class, 'bulkStore']);
    Route::post('/bulk-update', [CacheFiltersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CacheFiltersController::class, 'bulkDestroy']);

    Route::get('/trashed', [CacheFiltersController::class, 'trashed']);
    Route::post('/{id}/restore', [CacheFiltersController::class, 'restore']);
    Route::delete('/{id}/force', [CacheFiltersController::class, 'forceDelete']);

    Route::get('/', [CacheFiltersController::class, 'index']);
    Route::post('/', [CacheFiltersController::class, 'store']);
    Route::get('/{id}', [CacheFiltersController::class, 'show']);
    Route::put('/{id}', [CacheFiltersController::class, 'update']);
    Route::delete('/{id}', [CacheFiltersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CacheFiltersController::class, 'duplicate']);
    Route::get('/{id}/stats', [CacheFiltersController::class, 'stats']);
});

// ========================
// LOG RESOURCE
// ========================
Route::prefix('log')->group(function () {
    use App\Http\Controllers\Api\V1\LogController;

    Route::get('/filters', [LogController::class, 'filters']);
    Route::get('/suggestions', [LogController::class, 'suggestions']);
    Route::post('/advanced-search', [LogController::class, 'advancedSearch']);

    Route::get('/import-template', [LogController::class, 'importTemplate']);
    Route::post('/import', [LogController::class, 'import']);
    Route::get('/export', [LogController::class, 'export']);

    Route::post('/bulk-store', [LogController::class, 'bulkStore']);
    Route::post('/bulk-update', [LogController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LogController::class, 'bulkDestroy']);

    Route::get('/trashed', [LogController::class, 'trashed']);
    Route::post('/{id}/restore', [LogController::class, 'restore']);
    Route::delete('/{id}/force', [LogController::class, 'forceDelete']);

    Route::get('/', [LogController::class, 'index']);
    Route::post('/', [LogController::class, 'store']);
    Route::get('/{id}', [LogController::class, 'show']);
    Route::put('/{id}', [LogController::class, 'update']);
    Route::delete('/{id}', [LogController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LogController::class, 'duplicate']);
    Route::get('/{id}/stats', [LogController::class, 'stats']);
});

// ========================
// LOG_QUERIES RESOURCE
// ========================
Route::prefix('log-queries')->group(function () {
    use App\Http\Controllers\Api\V1\LogQueriesController;

    Route::get('/filters', [LogQueriesController::class, 'filters']);
    Route::get('/suggestions', [LogQueriesController::class, 'suggestions']);
    Route::post('/advanced-search', [LogQueriesController::class, 'advancedSearch']);

    Route::get('/import-template', [LogQueriesController::class, 'importTemplate']);
    Route::post('/import', [LogQueriesController::class, 'import']);
    Route::get('/export', [LogQueriesController::class, 'export']);

    Route::post('/bulk-store', [LogQueriesController::class, 'bulkStore']);
    Route::post('/bulk-update', [LogQueriesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LogQueriesController::class, 'bulkDestroy']);

    Route::get('/trashed', [LogQueriesController::class, 'trashed']);
    Route::post('/{id}/restore', [LogQueriesController::class, 'restore']);
    Route::delete('/{id}/force', [LogQueriesController::class, 'forceDelete']);

    Route::get('/', [LogQueriesController::class, 'index']);
    Route::post('/', [LogQueriesController::class, 'store']);
    Route::get('/{id}', [LogQueriesController::class, 'show']);
    Route::put('/{id}', [LogQueriesController::class, 'update']);
    Route::delete('/{id}', [LogQueriesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LogQueriesController::class, 'duplicate']);
    Route::get('/{id}/stats', [LogQueriesController::class, 'stats']);
});

// ========================
// LOG_DISPLAY RESOURCE
// ========================
Route::prefix('log-display')->group(function () {
    use App\Http\Controllers\Api\V1\LogDisplayController;

    Route::get('/filters', [LogDisplayController::class, 'filters']);
    Route::get('/suggestions', [LogDisplayController::class, 'suggestions']);
    Route::post('/advanced-search', [LogDisplayController::class, 'advancedSearch']);

    Route::get('/import-template', [LogDisplayController::class, 'importTemplate']);
    Route::post('/import', [LogDisplayController::class, 'import']);
    Route::get('/export', [LogDisplayController::class, 'export']);

    Route::post('/bulk-store', [LogDisplayController::class, 'bulkStore']);
    Route::post('/bulk-update', [LogDisplayController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LogDisplayController::class, 'bulkDestroy']);

    Route::get('/trashed', [LogDisplayController::class, 'trashed']);
    Route::post('/{id}/restore', [LogDisplayController::class, 'restore']);
    Route::delete('/{id}/force', [LogDisplayController::class, 'forceDelete']);

    Route::get('/', [LogDisplayController::class, 'index']);
    Route::post('/', [LogDisplayController::class, 'store']);
    Route::get('/{id}', [LogDisplayController::class, 'show']);
    Route::put('/{id}', [LogDisplayController::class, 'update']);
    Route::delete('/{id}', [LogDisplayController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LogDisplayController::class, 'duplicate']);
    Route::get('/{id}/stats', [LogDisplayController::class, 'stats']);
});

// ========================
// MESSAGE RESOURCE
// ========================
Route::prefix('message')->group(function () {
    use App\Http\Controllers\Api\V1\MessageController;

    Route::get('/filters', [MessageController::class, 'filters']);
    Route::get('/suggestions', [MessageController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageController::class, 'importTemplate']);
    Route::post('/import', [MessageController::class, 'import']);
    Route::get('/export', [MessageController::class, 'export']);

    Route::post('/bulk-store', [MessageController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageController::class, 'restore']);
    Route::delete('/{id}/force', [MessageController::class, 'forceDelete']);

    Route::get('/', [MessageController::class, 'index']);
    Route::post('/', [MessageController::class, 'store']);
    Route::get('/{id}', [MessageController::class, 'show']);
    Route::put('/{id}', [MessageController::class, 'update']);
    Route::delete('/{id}', [MessageController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageController::class, 'stats']);
});

// ========================
// MESSAGE_READ RESOURCE
// ========================
Route::prefix('message-read')->group(function () {
    use App\Http\Controllers\Api\V1\MessageReadController;

    Route::get('/filters', [MessageReadController::class, 'filters']);
    Route::get('/suggestions', [MessageReadController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageReadController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageReadController::class, 'importTemplate']);
    Route::post('/import', [MessageReadController::class, 'import']);
    Route::get('/export', [MessageReadController::class, 'export']);

    Route::post('/bulk-store', [MessageReadController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageReadController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageReadController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageReadController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageReadController::class, 'restore']);
    Route::delete('/{id}/force', [MessageReadController::class, 'forceDelete']);

    Route::get('/', [MessageReadController::class, 'index']);
    Route::post('/', [MessageReadController::class, 'store']);
    Route::get('/{id}', [MessageReadController::class, 'show']);
    Route::put('/{id}', [MessageReadController::class, 'update']);
    Route::delete('/{id}', [MessageReadController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageReadController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageReadController::class, 'stats']);
});

// ========================
// MODULES RESOURCE
// ========================
Route::prefix('modules')->group(function () {
    use App\Http\Controllers\Api\V1\ModulesController;

    Route::get('/filters', [ModulesController::class, 'filters']);
    Route::get('/suggestions', [ModulesController::class, 'suggestions']);
    Route::post('/advanced-search', [ModulesController::class, 'advancedSearch']);

    Route::get('/import-template', [ModulesController::class, 'importTemplate']);
    Route::post('/import', [ModulesController::class, 'import']);
    Route::get('/export', [ModulesController::class, 'export']);

    Route::post('/bulk-store', [ModulesController::class, 'bulkStore']);
    Route::post('/bulk-update', [ModulesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ModulesController::class, 'bulkDestroy']);

    Route::get('/trashed', [ModulesController::class, 'trashed']);
    Route::post('/{id}/restore', [ModulesController::class, 'restore']);
    Route::delete('/{id}/force', [ModulesController::class, 'forceDelete']);

    Route::get('/', [ModulesController::class, 'index']);
    Route::post('/', [ModulesController::class, 'store']);
    Route::get('/{id}', [ModulesController::class, 'show']);
    Route::put('/{id}', [ModulesController::class, 'update']);
    Route::delete('/{id}', [ModulesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ModulesController::class, 'duplicate']);
    Route::get('/{id}/stats', [ModulesController::class, 'stats']);
});

// ========================
// MY_PAGES RESOURCE
// ========================
Route::prefix('my-pages')->group(function () {
    use App\Http\Controllers\Api\V1\MyPagesController;

    Route::get('/filters', [MyPagesController::class, 'filters']);
    Route::get('/suggestions', [MyPagesController::class, 'suggestions']);
    Route::post('/advanced-search', [MyPagesController::class, 'advancedSearch']);

    Route::get('/import-template', [MyPagesController::class, 'importTemplate']);
    Route::post('/import', [MyPagesController::class, 'import']);
    Route::get('/export', [MyPagesController::class, 'export']);

    Route::post('/bulk-store', [MyPagesController::class, 'bulkStore']);
    Route::post('/bulk-update', [MyPagesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MyPagesController::class, 'bulkDestroy']);

    Route::get('/trashed', [MyPagesController::class, 'trashed']);
    Route::post('/{id}/restore', [MyPagesController::class, 'restore']);
    Route::delete('/{id}/force', [MyPagesController::class, 'forceDelete']);

    Route::get('/', [MyPagesController::class, 'index']);
    Route::post('/', [MyPagesController::class, 'store']);
    Route::get('/{id}', [MyPagesController::class, 'show']);
    Route::put('/{id}', [MyPagesController::class, 'update']);
    Route::delete('/{id}', [MyPagesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MyPagesController::class, 'duplicate']);
    Route::get('/{id}/stats', [MyPagesController::class, 'stats']);
});

// ========================
// USER RESOURCE
// ========================
Route::prefix('user')->group(function () {
    use App\Http\Controllers\Api\V1\UserController;

    Route::get('/filters', [UserController::class, 'filters']);
    Route::get('/suggestions', [UserController::class, 'suggestions']);
    Route::post('/advanced-search', [UserController::class, 'advancedSearch']);

    Route::get('/import-template', [UserController::class, 'importTemplate']);
    Route::post('/import', [UserController::class, 'import']);
    Route::get('/export', [UserController::class, 'export']);

    Route::post('/bulk-store', [UserController::class, 'bulkStore']);
    Route::post('/bulk-update', [UserController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UserController::class, 'bulkDestroy']);

    Route::get('/trashed', [UserController::class, 'trashed']);
    Route::post('/{id}/restore', [UserController::class, 'restore']);
    Route::delete('/{id}/force', [UserController::class, 'forceDelete']);

    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UserController::class, 'duplicate']);
    Route::get('/{id}/stats', [UserController::class, 'stats']);
});

// ========================
// USER_PREFERENCES RESOURCE
// ========================
Route::prefix('user-preferences')->group(function () {
    use App\Http\Controllers\Api\V1\UserPreferencesController;

    Route::get('/filters', [UserPreferencesController::class, 'filters']);
    Route::get('/suggestions', [UserPreferencesController::class, 'suggestions']);
    Route::post('/advanced-search', [UserPreferencesController::class, 'advancedSearch']);

    Route::get('/import-template', [UserPreferencesController::class, 'importTemplate']);
    Route::post('/import', [UserPreferencesController::class, 'import']);
    Route::get('/export', [UserPreferencesController::class, 'export']);

    Route::post('/bulk-store', [UserPreferencesController::class, 'bulkStore']);
    Route::post('/bulk-update', [UserPreferencesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UserPreferencesController::class, 'bulkDestroy']);

    Route::get('/trashed', [UserPreferencesController::class, 'trashed']);
    Route::post('/{id}/restore', [UserPreferencesController::class, 'restore']);
    Route::delete('/{id}/force', [UserPreferencesController::class, 'forceDelete']);

    Route::get('/', [UserPreferencesController::class, 'index']);
    Route::post('/', [UserPreferencesController::class, 'store']);
    Route::get('/{id}', [UserPreferencesController::class, 'show']);
    Route::put('/{id}', [UserPreferencesController::class, 'update']);
    Route::delete('/{id}', [UserPreferencesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UserPreferencesController::class, 'duplicate']);
    Route::get('/{id}/stats', [UserPreferencesController::class, 'stats']);
});

// ========================
// USER_LASTACCESS RESOURCE
// ========================
Route::prefix('user-lastaccess')->group(function () {
    use App\Http\Controllers\Api\V1\UserLastaccessController;

    Route::get('/filters', [UserLastaccessController::class, 'filters']);
    Route::get('/suggestions', [UserLastaccessController::class, 'suggestions']);
    Route::post('/advanced-search', [UserLastaccessController::class, 'advancedSearch']);

    Route::get('/import-template', [UserLastaccessController::class, 'importTemplate']);
    Route::post('/import', [UserLastaccessController::class, 'import']);
    Route::get('/export', [UserLastaccessController::class, 'export']);

    Route::post('/bulk-store', [UserLastaccessController::class, 'bulkStore']);
    Route::post('/bulk-update', [UserLastaccessController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UserLastaccessController::class, 'bulkDestroy']);

    Route::get('/trashed', [UserLastaccessController::class, 'trashed']);
    Route::post('/{id}/restore', [UserLastaccessController::class, 'restore']);
    Route::delete('/{id}/force', [UserLastaccessController::class, 'forceDelete']);

    Route::get('/', [UserLastaccessController::class, 'index']);
    Route::post('/', [UserLastaccessController::class, 'store']);
    Route::get('/{id}', [UserLastaccessController::class, 'show']);
    Route::put('/{id}', [UserLastaccessController::class, 'update']);
    Route::delete('/{id}', [UserLastaccessController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UserLastaccessController::class, 'duplicate']);
    Route::get('/{id}/stats', [UserLastaccessController::class, 'stats']);
});

// ========================
// STATS_DAILY RESOURCE
// ========================
Route::prefix('stats-daily')->group(function () {
    use App\Http\Controllers\Api\V1\StatsDailyController;

    Route::get('/filters', [StatsDailyController::class, 'filters']);
    Route::get('/suggestions', [StatsDailyController::class, 'suggestions']);
    Route::post('/advanced-search', [StatsDailyController::class, 'advancedSearch']);

    Route::get('/import-template', [StatsDailyController::class, 'importTemplate']);
    Route::post('/import', [StatsDailyController::class, 'import']);
    Route::get('/export', [StatsDailyController::class, 'export']);

    Route::post('/bulk-store', [StatsDailyController::class, 'bulkStore']);
    Route::post('/bulk-update', [StatsDailyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [StatsDailyController::class, 'bulkDestroy']);

    Route::get('/trashed', [StatsDailyController::class, 'trashed']);
    Route::post('/{id}/restore', [StatsDailyController::class, 'restore']);
    Route::delete('/{id}/force', [StatsDailyController::class, 'forceDelete']);

    Route::get('/', [StatsDailyController::class, 'index']);
    Route::post('/', [StatsDailyController::class, 'store']);
    Route::get('/{id}', [StatsDailyController::class, 'show']);
    Route::put('/{id}', [StatsDailyController::class, 'update']);
    Route::delete('/{id}', [StatsDailyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [StatsDailyController::class, 'duplicate']);
    Route::get('/{id}/stats', [StatsDailyController::class, 'stats']);
});

// ========================
// STATS_WEEKLY RESOURCE
// ========================
Route::prefix('stats-weekly')->group(function () {
    use App\Http\Controllers\Api\V1\StatsWeeklyController;

    Route::get('/filters', [StatsWeeklyController::class, 'filters']);
    Route::get('/suggestions', [StatsWeeklyController::class, 'suggestions']);
    Route::post('/advanced-search', [StatsWeeklyController::class, 'advancedSearch']);

    Route::get('/import-template', [StatsWeeklyController::class, 'importTemplate']);
    Route::post('/import', [StatsWeeklyController::class, 'import']);
    Route::get('/export', [StatsWeeklyController::class, 'export']);

    Route::post('/bulk-store', [StatsWeeklyController::class, 'bulkStore']);
    Route::post('/bulk-update', [StatsWeeklyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [StatsWeeklyController::class, 'bulkDestroy']);

    Route::get('/trashed', [StatsWeeklyController::class, 'trashed']);
    Route::post('/{id}/restore', [StatsWeeklyController::class, 'restore']);
    Route::delete('/{id}/force', [StatsWeeklyController::class, 'forceDelete']);

    Route::get('/', [StatsWeeklyController::class, 'index']);
    Route::post('/', [StatsWeeklyController::class, 'store']);
    Route::get('/{id}', [StatsWeeklyController::class, 'show']);
    Route::put('/{id}', [StatsWeeklyController::class, 'update']);
    Route::delete('/{id}', [StatsWeeklyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [StatsWeeklyController::class, 'duplicate']);
    Route::get('/{id}/stats', [StatsWeeklyController::class, 'stats']);
});

// ========================
// STATS_MONTHLY RESOURCE
// ========================
Route::prefix('stats-monthly')->group(function () {
    use App\Http\Controllers\Api\V1\StatsMonthlyController;

    Route::get('/filters', [StatsMonthlyController::class, 'filters']);
    Route::get('/suggestions', [StatsMonthlyController::class, 'suggestions']);
    Route::post('/advanced-search', [StatsMonthlyController::class, 'advancedSearch']);

    Route::get('/import-template', [StatsMonthlyController::class, 'importTemplate']);
    Route::post('/import', [StatsMonthlyController::class, 'import']);
    Route::get('/export', [StatsMonthlyController::class, 'export']);

    Route::post('/bulk-store', [StatsMonthlyController::class, 'bulkStore']);
    Route::post('/bulk-update', [StatsMonthlyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [StatsMonthlyController::class, 'bulkDestroy']);

    Route::get('/trashed', [StatsMonthlyController::class, 'trashed']);
    Route::post('/{id}/restore', [StatsMonthlyController::class, 'restore']);
    Route::delete('/{id}/force', [StatsMonthlyController::class, 'forceDelete']);

    Route::get('/', [StatsMonthlyController::class, 'index']);
    Route::post('/', [StatsMonthlyController::class, 'store']);
    Route::get('/{id}', [StatsMonthlyController::class, 'show']);
    Route::put('/{id}', [StatsMonthlyController::class, 'update']);
    Route::delete('/{id}', [StatsMonthlyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [StatsMonthlyController::class, 'duplicate']);
    Route::get('/{id}/stats', [StatsMonthlyController::class, 'stats']);
});

// ========================
// STATS_USER_DAILY RESOURCE
// ========================
Route::prefix('stats-user-daily')->group(function () {
    use App\Http\Controllers\Api\V1\StatsUserDailyController;

    Route::get('/filters', [StatsUserDailyController::class, 'filters']);
    Route::get('/suggestions', [StatsUserDailyController::class, 'suggestions']);
    Route::post('/advanced-search', [StatsUserDailyController::class, 'advancedSearch']);

    Route::get('/import-template', [StatsUserDailyController::class, 'importTemplate']);
    Route::post('/import', [StatsUserDailyController::class, 'import']);
    Route::get('/export', [StatsUserDailyController::class, 'export']);

    Route::post('/bulk-store', [StatsUserDailyController::class, 'bulkStore']);
    Route::post('/bulk-update', [StatsUserDailyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [StatsUserDailyController::class, 'bulkDestroy']);

    Route::get('/trashed', [StatsUserDailyController::class, 'trashed']);
    Route::post('/{id}/restore', [StatsUserDailyController::class, 'restore']);
    Route::delete('/{id}/force', [StatsUserDailyController::class, 'forceDelete']);

    Route::get('/', [StatsUserDailyController::class, 'index']);
    Route::post('/', [StatsUserDailyController::class, 'store']);
    Route::get('/{id}', [StatsUserDailyController::class, 'show']);
    Route::put('/{id}', [StatsUserDailyController::class, 'update']);
    Route::delete('/{id}', [StatsUserDailyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [StatsUserDailyController::class, 'duplicate']);
    Route::get('/{id}/stats', [StatsUserDailyController::class, 'stats']);
});

// ========================
// STATS_USER_WEEKLY RESOURCE
// ========================
Route::prefix('stats-user-weekly')->group(function () {
    use App\Http\Controllers\Api\V1\StatsUserWeeklyController;

    Route::get('/filters', [StatsUserWeeklyController::class, 'filters']);
    Route::get('/suggestions', [StatsUserWeeklyController::class, 'suggestions']);
    Route::post('/advanced-search', [StatsUserWeeklyController::class, 'advancedSearch']);

    Route::get('/import-template', [StatsUserWeeklyController::class, 'importTemplate']);
    Route::post('/import', [StatsUserWeeklyController::class, 'import']);
    Route::get('/export', [StatsUserWeeklyController::class, 'export']);

    Route::post('/bulk-store', [StatsUserWeeklyController::class, 'bulkStore']);
    Route::post('/bulk-update', [StatsUserWeeklyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [StatsUserWeeklyController::class, 'bulkDestroy']);

    Route::get('/trashed', [StatsUserWeeklyController::class, 'trashed']);
    Route::post('/{id}/restore', [StatsUserWeeklyController::class, 'restore']);
    Route::delete('/{id}/force', [StatsUserWeeklyController::class, 'forceDelete']);

    Route::get('/', [StatsUserWeeklyController::class, 'index']);
    Route::post('/', [StatsUserWeeklyController::class, 'store']);
    Route::get('/{id}', [StatsUserWeeklyController::class, 'show']);
    Route::put('/{id}', [StatsUserWeeklyController::class, 'update']);
    Route::delete('/{id}', [StatsUserWeeklyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [StatsUserWeeklyController::class, 'duplicate']);
    Route::get('/{id}/stats', [StatsUserWeeklyController::class, 'stats']);
});

// ========================
// STATS_USER_MONTHLY RESOURCE
// ========================
Route::prefix('stats-user-monthly')->group(function () {
    use App\Http\Controllers\Api\V1\StatsUserMonthlyController;

    Route::get('/filters', [StatsUserMonthlyController::class, 'filters']);
    Route::get('/suggestions', [StatsUserMonthlyController::class, 'suggestions']);
    Route::post('/advanced-search', [StatsUserMonthlyController::class, 'advancedSearch']);

    Route::get('/import-template', [StatsUserMonthlyController::class, 'importTemplate']);
    Route::post('/import', [StatsUserMonthlyController::class, 'import']);
    Route::get('/export', [StatsUserMonthlyController::class, 'export']);

    Route::post('/bulk-store', [StatsUserMonthlyController::class, 'bulkStore']);
    Route::post('/bulk-update', [StatsUserMonthlyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [StatsUserMonthlyController::class, 'bulkDestroy']);

    Route::get('/trashed', [StatsUserMonthlyController::class, 'trashed']);
    Route::post('/{id}/restore', [StatsUserMonthlyController::class, 'restore']);
    Route::delete('/{id}/force', [StatsUserMonthlyController::class, 'forceDelete']);

    Route::get('/', [StatsUserMonthlyController::class, 'index']);
    Route::post('/', [StatsUserMonthlyController::class, 'store']);
    Route::get('/{id}', [StatsUserMonthlyController::class, 'show']);
    Route::put('/{id}', [StatsUserMonthlyController::class, 'update']);
    Route::delete('/{id}', [StatsUserMonthlyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [StatsUserMonthlyController::class, 'duplicate']);
    Route::get('/{id}/stats', [StatsUserMonthlyController::class, 'stats']);
});

// ========================
// ROLE RESOURCE
// ========================
Route::prefix('role')->group(function () {
    use App\Http\Controllers\Api\V1\RoleController;

    Route::get('/filters', [RoleController::class, 'filters']);
    Route::get('/suggestions', [RoleController::class, 'suggestions']);
    Route::post('/advanced-search', [RoleController::class, 'advancedSearch']);

    Route::get('/import-template', [RoleController::class, 'importTemplate']);
    Route::post('/import', [RoleController::class, 'import']);
    Route::get('/export', [RoleController::class, 'export']);

    Route::post('/bulk-store', [RoleController::class, 'bulkStore']);
    Route::post('/bulk-update', [RoleController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RoleController::class, 'bulkDestroy']);

    Route::get('/trashed', [RoleController::class, 'trashed']);
    Route::post('/{id}/restore', [RoleController::class, 'restore']);
    Route::delete('/{id}/force', [RoleController::class, 'forceDelete']);

    Route::get('/', [RoleController::class, 'index']);
    Route::post('/', [RoleController::class, 'store']);
    Route::get('/{id}', [RoleController::class, 'show']);
    Route::put('/{id}', [RoleController::class, 'update']);
    Route::delete('/{id}', [RoleController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RoleController::class, 'duplicate']);
    Route::get('/{id}/stats', [RoleController::class, 'stats']);
});

// ========================
// CONTEXT RESOURCE
// ========================
Route::prefix('context')->group(function () {
    use App\Http\Controllers\Api\V1\ContextController;

    Route::get('/filters', [ContextController::class, 'filters']);
    Route::get('/suggestions', [ContextController::class, 'suggestions']);
    Route::post('/advanced-search', [ContextController::class, 'advancedSearch']);

    Route::get('/import-template', [ContextController::class, 'importTemplate']);
    Route::post('/import', [ContextController::class, 'import']);
    Route::get('/export', [ContextController::class, 'export']);

    Route::post('/bulk-store', [ContextController::class, 'bulkStore']);
    Route::post('/bulk-update', [ContextController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ContextController::class, 'bulkDestroy']);

    Route::get('/trashed', [ContextController::class, 'trashed']);
    Route::post('/{id}/restore', [ContextController::class, 'restore']);
    Route::delete('/{id}/force', [ContextController::class, 'forceDelete']);

    Route::get('/', [ContextController::class, 'index']);
    Route::post('/', [ContextController::class, 'store']);
    Route::get('/{id}', [ContextController::class, 'show']);
    Route::put('/{id}', [ContextController::class, 'update']);
    Route::delete('/{id}', [ContextController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ContextController::class, 'duplicate']);
    Route::get('/{id}/stats', [ContextController::class, 'stats']);
});

// ========================
// CONTEXT_TEMP RESOURCE
// ========================
Route::prefix('context-temp')->group(function () {
    use App\Http\Controllers\Api\V1\ContextTempController;

    Route::get('/filters', [ContextTempController::class, 'filters']);
    Route::get('/suggestions', [ContextTempController::class, 'suggestions']);
    Route::post('/advanced-search', [ContextTempController::class, 'advancedSearch']);

    Route::get('/import-template', [ContextTempController::class, 'importTemplate']);
    Route::post('/import', [ContextTempController::class, 'import']);
    Route::get('/export', [ContextTempController::class, 'export']);

    Route::post('/bulk-store', [ContextTempController::class, 'bulkStore']);
    Route::post('/bulk-update', [ContextTempController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ContextTempController::class, 'bulkDestroy']);

    Route::get('/trashed', [ContextTempController::class, 'trashed']);
    Route::post('/{id}/restore', [ContextTempController::class, 'restore']);
    Route::delete('/{id}/force', [ContextTempController::class, 'forceDelete']);

    Route::get('/', [ContextTempController::class, 'index']);
    Route::post('/', [ContextTempController::class, 'store']);
    Route::get('/{id}', [ContextTempController::class, 'show']);
    Route::put('/{id}', [ContextTempController::class, 'update']);
    Route::delete('/{id}', [ContextTempController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ContextTempController::class, 'duplicate']);
    Route::get('/{id}/stats', [ContextTempController::class, 'stats']);
});

// ========================
// CAPABILITIES RESOURCE
// ========================
Route::prefix('capabilities')->group(function () {
    use App\Http\Controllers\Api\V1\CapabilitiesController;

    Route::get('/filters', [CapabilitiesController::class, 'filters']);
    Route::get('/suggestions', [CapabilitiesController::class, 'suggestions']);
    Route::post('/advanced-search', [CapabilitiesController::class, 'advancedSearch']);

    Route::get('/import-template', [CapabilitiesController::class, 'importTemplate']);
    Route::post('/import', [CapabilitiesController::class, 'import']);
    Route::get('/export', [CapabilitiesController::class, 'export']);

    Route::post('/bulk-store', [CapabilitiesController::class, 'bulkStore']);
    Route::post('/bulk-update', [CapabilitiesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CapabilitiesController::class, 'bulkDestroy']);

    Route::get('/trashed', [CapabilitiesController::class, 'trashed']);
    Route::post('/{id}/restore', [CapabilitiesController::class, 'restore']);
    Route::delete('/{id}/force', [CapabilitiesController::class, 'forceDelete']);

    Route::get('/', [CapabilitiesController::class, 'index']);
    Route::post('/', [CapabilitiesController::class, 'store']);
    Route::get('/{id}', [CapabilitiesController::class, 'show']);
    Route::put('/{id}', [CapabilitiesController::class, 'update']);
    Route::delete('/{id}', [CapabilitiesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CapabilitiesController::class, 'duplicate']);
    Route::get('/{id}/stats', [CapabilitiesController::class, 'stats']);
});

// ========================
// USER_INFO_FIELD RESOURCE
// ========================
Route::prefix('user-info-field')->group(function () {
    use App\Http\Controllers\Api\V1\UserInfoFieldController;

    Route::get('/filters', [UserInfoFieldController::class, 'filters']);
    Route::get('/suggestions', [UserInfoFieldController::class, 'suggestions']);
    Route::post('/advanced-search', [UserInfoFieldController::class, 'advancedSearch']);

    Route::get('/import-template', [UserInfoFieldController::class, 'importTemplate']);
    Route::post('/import', [UserInfoFieldController::class, 'import']);
    Route::get('/export', [UserInfoFieldController::class, 'export']);

    Route::post('/bulk-store', [UserInfoFieldController::class, 'bulkStore']);
    Route::post('/bulk-update', [UserInfoFieldController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UserInfoFieldController::class, 'bulkDestroy']);

    Route::get('/trashed', [UserInfoFieldController::class, 'trashed']);
    Route::post('/{id}/restore', [UserInfoFieldController::class, 'restore']);
    Route::delete('/{id}/force', [UserInfoFieldController::class, 'forceDelete']);

    Route::get('/', [UserInfoFieldController::class, 'index']);
    Route::post('/', [UserInfoFieldController::class, 'store']);
    Route::get('/{id}', [UserInfoFieldController::class, 'show']);
    Route::put('/{id}', [UserInfoFieldController::class, 'update']);
    Route::delete('/{id}', [UserInfoFieldController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UserInfoFieldController::class, 'duplicate']);
    Route::get('/{id}/stats', [UserInfoFieldController::class, 'stats']);
});

// ========================
// USER_INFO_CATEGORY RESOURCE
// ========================
Route::prefix('user-info-category')->group(function () {
    use App\Http\Controllers\Api\V1\UserInfoCategoryController;

    Route::get('/filters', [UserInfoCategoryController::class, 'filters']);
    Route::get('/suggestions', [UserInfoCategoryController::class, 'suggestions']);
    Route::post('/advanced-search', [UserInfoCategoryController::class, 'advancedSearch']);

    Route::get('/import-template', [UserInfoCategoryController::class, 'importTemplate']);
    Route::post('/import', [UserInfoCategoryController::class, 'import']);
    Route::get('/export', [UserInfoCategoryController::class, 'export']);

    Route::post('/bulk-store', [UserInfoCategoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [UserInfoCategoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UserInfoCategoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [UserInfoCategoryController::class, 'trashed']);
    Route::post('/{id}/restore', [UserInfoCategoryController::class, 'restore']);
    Route::delete('/{id}/force', [UserInfoCategoryController::class, 'forceDelete']);

    Route::get('/', [UserInfoCategoryController::class, 'index']);
    Route::post('/', [UserInfoCategoryController::class, 'store']);
    Route::get('/{id}', [UserInfoCategoryController::class, 'show']);
    Route::put('/{id}', [UserInfoCategoryController::class, 'update']);
    Route::delete('/{id}', [UserInfoCategoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UserInfoCategoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [UserInfoCategoryController::class, 'stats']);
});

// ========================
// USER_INFO_DATA RESOURCE
// ========================
Route::prefix('user-info-data')->group(function () {
    use App\Http\Controllers\Api\V1\UserInfoDataController;

    Route::get('/filters', [UserInfoDataController::class, 'filters']);
    Route::get('/suggestions', [UserInfoDataController::class, 'suggestions']);
    Route::post('/advanced-search', [UserInfoDataController::class, 'advancedSearch']);

    Route::get('/import-template', [UserInfoDataController::class, 'importTemplate']);
    Route::post('/import', [UserInfoDataController::class, 'import']);
    Route::get('/export', [UserInfoDataController::class, 'export']);

    Route::post('/bulk-store', [UserInfoDataController::class, 'bulkStore']);
    Route::post('/bulk-update', [UserInfoDataController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UserInfoDataController::class, 'bulkDestroy']);

    Route::get('/trashed', [UserInfoDataController::class, 'trashed']);
    Route::post('/{id}/restore', [UserInfoDataController::class, 'restore']);
    Route::delete('/{id}/force', [UserInfoDataController::class, 'forceDelete']);

    Route::get('/', [UserInfoDataController::class, 'index']);
    Route::post('/', [UserInfoDataController::class, 'store']);
    Route::get('/{id}', [UserInfoDataController::class, 'show']);
    Route::put('/{id}', [UserInfoDataController::class, 'update']);
    Route::delete('/{id}', [UserInfoDataController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UserInfoDataController::class, 'duplicate']);
    Route::get('/{id}/stats', [UserInfoDataController::class, 'stats']);
});

// ========================
// QUESTION_CATEGORIES RESOURCE
// ========================
Route::prefix('question-categories')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionCategoriesController;

    Route::get('/filters', [QuestionCategoriesController::class, 'filters']);
    Route::get('/suggestions', [QuestionCategoriesController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionCategoriesController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionCategoriesController::class, 'importTemplate']);
    Route::post('/import', [QuestionCategoriesController::class, 'import']);
    Route::get('/export', [QuestionCategoriesController::class, 'export']);

    Route::post('/bulk-store', [QuestionCategoriesController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionCategoriesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionCategoriesController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionCategoriesController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionCategoriesController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionCategoriesController::class, 'forceDelete']);

    Route::get('/', [QuestionCategoriesController::class, 'index']);
    Route::post('/', [QuestionCategoriesController::class, 'store']);
    Route::get('/{id}', [QuestionCategoriesController::class, 'show']);
    Route::put('/{id}', [QuestionCategoriesController::class, 'update']);
    Route::delete('/{id}', [QuestionCategoriesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionCategoriesController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionCategoriesController::class, 'stats']);
});

// ========================
// MNET_APPLICATION RESOURCE
// ========================
Route::prefix('mnet-application')->group(function () {
    use App\Http\Controllers\Api\V1\MnetApplicationController;

    Route::get('/filters', [MnetApplicationController::class, 'filters']);
    Route::get('/suggestions', [MnetApplicationController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetApplicationController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetApplicationController::class, 'importTemplate']);
    Route::post('/import', [MnetApplicationController::class, 'import']);
    Route::get('/export', [MnetApplicationController::class, 'export']);

    Route::post('/bulk-store', [MnetApplicationController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetApplicationController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetApplicationController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetApplicationController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetApplicationController::class, 'restore']);
    Route::delete('/{id}/force', [MnetApplicationController::class, 'forceDelete']);

    Route::get('/', [MnetApplicationController::class, 'index']);
    Route::post('/', [MnetApplicationController::class, 'store']);
    Route::get('/{id}', [MnetApplicationController::class, 'show']);
    Route::put('/{id}', [MnetApplicationController::class, 'update']);
    Route::delete('/{id}', [MnetApplicationController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetApplicationController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetApplicationController::class, 'stats']);
});

// ========================
// MNET_HOST2SERVICE RESOURCE
// ========================
Route::prefix('mnet-host2service')->group(function () {
    use App\Http\Controllers\Api\V1\MnetHost2serviceController;

    Route::get('/filters', [MnetHost2serviceController::class, 'filters']);
    Route::get('/suggestions', [MnetHost2serviceController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetHost2serviceController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetHost2serviceController::class, 'importTemplate']);
    Route::post('/import', [MnetHost2serviceController::class, 'import']);
    Route::get('/export', [MnetHost2serviceController::class, 'export']);

    Route::post('/bulk-store', [MnetHost2serviceController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetHost2serviceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetHost2serviceController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetHost2serviceController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetHost2serviceController::class, 'restore']);
    Route::delete('/{id}/force', [MnetHost2serviceController::class, 'forceDelete']);

    Route::get('/', [MnetHost2serviceController::class, 'index']);
    Route::post('/', [MnetHost2serviceController::class, 'store']);
    Route::get('/{id}', [MnetHost2serviceController::class, 'show']);
    Route::put('/{id}', [MnetHost2serviceController::class, 'update']);
    Route::delete('/{id}', [MnetHost2serviceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetHost2serviceController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetHost2serviceController::class, 'stats']);
});

// ========================
// MNET_LOG RESOURCE
// ========================
Route::prefix('mnet-log')->group(function () {
    use App\Http\Controllers\Api\V1\MnetLogController;

    Route::get('/filters', [MnetLogController::class, 'filters']);
    Route::get('/suggestions', [MnetLogController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetLogController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetLogController::class, 'importTemplate']);
    Route::post('/import', [MnetLogController::class, 'import']);
    Route::get('/export', [MnetLogController::class, 'export']);

    Route::post('/bulk-store', [MnetLogController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetLogController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetLogController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetLogController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetLogController::class, 'restore']);
    Route::delete('/{id}/force', [MnetLogController::class, 'forceDelete']);

    Route::get('/', [MnetLogController::class, 'index']);
    Route::post('/', [MnetLogController::class, 'store']);
    Route::get('/{id}', [MnetLogController::class, 'show']);
    Route::put('/{id}', [MnetLogController::class, 'update']);
    Route::delete('/{id}', [MnetLogController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetLogController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetLogController::class, 'stats']);
});

// ========================
// MNET_RPC RESOURCE
// ========================
Route::prefix('mnet-rpc')->group(function () {
    use App\Http\Controllers\Api\V1\MnetRpcController;

    Route::get('/filters', [MnetRpcController::class, 'filters']);
    Route::get('/suggestions', [MnetRpcController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetRpcController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetRpcController::class, 'importTemplate']);
    Route::post('/import', [MnetRpcController::class, 'import']);
    Route::get('/export', [MnetRpcController::class, 'export']);

    Route::post('/bulk-store', [MnetRpcController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetRpcController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetRpcController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetRpcController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetRpcController::class, 'restore']);
    Route::delete('/{id}/force', [MnetRpcController::class, 'forceDelete']);

    Route::get('/', [MnetRpcController::class, 'index']);
    Route::post('/', [MnetRpcController::class, 'store']);
    Route::get('/{id}', [MnetRpcController::class, 'show']);
    Route::put('/{id}', [MnetRpcController::class, 'update']);
    Route::delete('/{id}', [MnetRpcController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetRpcController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetRpcController::class, 'stats']);
});

// ========================
// MNET_REMOTE_RPC RESOURCE
// ========================
Route::prefix('mnet-remote-rpc')->group(function () {
    use App\Http\Controllers\Api\V1\MnetRemoteRpcController;

    Route::get('/filters', [MnetRemoteRpcController::class, 'filters']);
    Route::get('/suggestions', [MnetRemoteRpcController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetRemoteRpcController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetRemoteRpcController::class, 'importTemplate']);
    Route::post('/import', [MnetRemoteRpcController::class, 'import']);
    Route::get('/export', [MnetRemoteRpcController::class, 'export']);

    Route::post('/bulk-store', [MnetRemoteRpcController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetRemoteRpcController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetRemoteRpcController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetRemoteRpcController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetRemoteRpcController::class, 'restore']);
    Route::delete('/{id}/force', [MnetRemoteRpcController::class, 'forceDelete']);

    Route::get('/', [MnetRemoteRpcController::class, 'index']);
    Route::post('/', [MnetRemoteRpcController::class, 'store']);
    Route::get('/{id}', [MnetRemoteRpcController::class, 'show']);
    Route::put('/{id}', [MnetRemoteRpcController::class, 'update']);
    Route::delete('/{id}', [MnetRemoteRpcController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetRemoteRpcController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetRemoteRpcController::class, 'stats']);
});

// ========================
// MNET_SERVICE RESOURCE
// ========================
Route::prefix('mnet-service')->group(function () {
    use App\Http\Controllers\Api\V1\MnetServiceController;

    Route::get('/filters', [MnetServiceController::class, 'filters']);
    Route::get('/suggestions', [MnetServiceController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetServiceController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetServiceController::class, 'importTemplate']);
    Route::post('/import', [MnetServiceController::class, 'import']);
    Route::get('/export', [MnetServiceController::class, 'export']);

    Route::post('/bulk-store', [MnetServiceController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetServiceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetServiceController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetServiceController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetServiceController::class, 'restore']);
    Route::delete('/{id}/force', [MnetServiceController::class, 'forceDelete']);

    Route::get('/', [MnetServiceController::class, 'index']);
    Route::post('/', [MnetServiceController::class, 'store']);
    Route::get('/{id}', [MnetServiceController::class, 'show']);
    Route::put('/{id}', [MnetServiceController::class, 'update']);
    Route::delete('/{id}', [MnetServiceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetServiceController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetServiceController::class, 'stats']);
});

// ========================
// MNET_SERVICE2RPC RESOURCE
// ========================
Route::prefix('mnet-service2rpc')->group(function () {
    use App\Http\Controllers\Api\V1\MnetService2rpcController;

    Route::get('/filters', [MnetService2rpcController::class, 'filters']);
    Route::get('/suggestions', [MnetService2rpcController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetService2rpcController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetService2rpcController::class, 'importTemplate']);
    Route::post('/import', [MnetService2rpcController::class, 'import']);
    Route::get('/export', [MnetService2rpcController::class, 'export']);

    Route::post('/bulk-store', [MnetService2rpcController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetService2rpcController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetService2rpcController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetService2rpcController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetService2rpcController::class, 'restore']);
    Route::delete('/{id}/force', [MnetService2rpcController::class, 'forceDelete']);

    Route::get('/', [MnetService2rpcController::class, 'index']);
    Route::post('/', [MnetService2rpcController::class, 'store']);
    Route::get('/{id}', [MnetService2rpcController::class, 'show']);
    Route::put('/{id}', [MnetService2rpcController::class, 'update']);
    Route::delete('/{id}', [MnetService2rpcController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetService2rpcController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetService2rpcController::class, 'stats']);
});

// ========================
// MNET_REMOTE_SERVICE2RPC RESOURCE
// ========================
Route::prefix('mnet-remote-service2rpc')->group(function () {
    use App\Http\Controllers\Api\V1\MnetRemoteService2rpcController;

    Route::get('/filters', [MnetRemoteService2rpcController::class, 'filters']);
    Route::get('/suggestions', [MnetRemoteService2rpcController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetRemoteService2rpcController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetRemoteService2rpcController::class, 'importTemplate']);
    Route::post('/import', [MnetRemoteService2rpcController::class, 'import']);
    Route::get('/export', [MnetRemoteService2rpcController::class, 'export']);

    Route::post('/bulk-store', [MnetRemoteService2rpcController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetRemoteService2rpcController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetRemoteService2rpcController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetRemoteService2rpcController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetRemoteService2rpcController::class, 'restore']);
    Route::delete('/{id}/force', [MnetRemoteService2rpcController::class, 'forceDelete']);

    Route::get('/', [MnetRemoteService2rpcController::class, 'index']);
    Route::post('/', [MnetRemoteService2rpcController::class, 'store']);
    Route::get('/{id}', [MnetRemoteService2rpcController::class, 'show']);
    Route::put('/{id}', [MnetRemoteService2rpcController::class, 'update']);
    Route::delete('/{id}', [MnetRemoteService2rpcController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetRemoteService2rpcController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetRemoteService2rpcController::class, 'stats']);
});

// ========================
// MNET_SSO_ACCESS_CONTROL RESOURCE
// ========================
Route::prefix('mnet-sso-access-control')->group(function () {
    use App\Http\Controllers\Api\V1\MnetSsoAccessControlController;

    Route::get('/filters', [MnetSsoAccessControlController::class, 'filters']);
    Route::get('/suggestions', [MnetSsoAccessControlController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetSsoAccessControlController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetSsoAccessControlController::class, 'importTemplate']);
    Route::post('/import', [MnetSsoAccessControlController::class, 'import']);
    Route::get('/export', [MnetSsoAccessControlController::class, 'export']);

    Route::post('/bulk-store', [MnetSsoAccessControlController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetSsoAccessControlController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetSsoAccessControlController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetSsoAccessControlController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetSsoAccessControlController::class, 'restore']);
    Route::delete('/{id}/force', [MnetSsoAccessControlController::class, 'forceDelete']);

    Route::get('/', [MnetSsoAccessControlController::class, 'index']);
    Route::post('/', [MnetSsoAccessControlController::class, 'store']);
    Route::get('/{id}', [MnetSsoAccessControlController::class, 'show']);
    Route::put('/{id}', [MnetSsoAccessControlController::class, 'update']);
    Route::delete('/{id}', [MnetSsoAccessControlController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetSsoAccessControlController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetSsoAccessControlController::class, 'stats']);
});

// ========================
// EVENTS_HANDLERS RESOURCE
// ========================
Route::prefix('events-handlers')->group(function () {
    use App\Http\Controllers\Api\V1\EventsHandlersController;

    Route::get('/filters', [EventsHandlersController::class, 'filters']);
    Route::get('/suggestions', [EventsHandlersController::class, 'suggestions']);
    Route::post('/advanced-search', [EventsHandlersController::class, 'advancedSearch']);

    Route::get('/import-template', [EventsHandlersController::class, 'importTemplate']);
    Route::post('/import', [EventsHandlersController::class, 'import']);
    Route::get('/export', [EventsHandlersController::class, 'export']);

    Route::post('/bulk-store', [EventsHandlersController::class, 'bulkStore']);
    Route::post('/bulk-update', [EventsHandlersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EventsHandlersController::class, 'bulkDestroy']);

    Route::get('/trashed', [EventsHandlersController::class, 'trashed']);
    Route::post('/{id}/restore', [EventsHandlersController::class, 'restore']);
    Route::delete('/{id}/force', [EventsHandlersController::class, 'forceDelete']);

    Route::get('/', [EventsHandlersController::class, 'index']);
    Route::post('/', [EventsHandlersController::class, 'store']);
    Route::get('/{id}', [EventsHandlersController::class, 'show']);
    Route::put('/{id}', [EventsHandlersController::class, 'update']);
    Route::delete('/{id}', [EventsHandlersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EventsHandlersController::class, 'duplicate']);
    Route::get('/{id}/stats', [EventsHandlersController::class, 'stats']);
});

// ========================
// TAG_COLL RESOURCE
// ========================
Route::prefix('tag-coll')->group(function () {
    use App\Http\Controllers\Api\V1\TagCollController;

    Route::get('/filters', [TagCollController::class, 'filters']);
    Route::get('/suggestions', [TagCollController::class, 'suggestions']);
    Route::post('/advanced-search', [TagCollController::class, 'advancedSearch']);

    Route::get('/import-template', [TagCollController::class, 'importTemplate']);
    Route::post('/import', [TagCollController::class, 'import']);
    Route::get('/export', [TagCollController::class, 'export']);

    Route::post('/bulk-store', [TagCollController::class, 'bulkStore']);
    Route::post('/bulk-update', [TagCollController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [TagCollController::class, 'bulkDestroy']);

    Route::get('/trashed', [TagCollController::class, 'trashed']);
    Route::post('/{id}/restore', [TagCollController::class, 'restore']);
    Route::delete('/{id}/force', [TagCollController::class, 'forceDelete']);

    Route::get('/', [TagCollController::class, 'index']);
    Route::post('/', [TagCollController::class, 'store']);
    Route::get('/{id}', [TagCollController::class, 'show']);
    Route::put('/{id}', [TagCollController::class, 'update']);
    Route::delete('/{id}', [TagCollController::class, 'destroy']);

    Route::post('/{id}/duplicate', [TagCollController::class, 'duplicate']);
    Route::get('/{id}/stats', [TagCollController::class, 'stats']);
});

// ========================
// GRADE_LETTERS RESOURCE
// ========================
Route::prefix('grade-letters')->group(function () {
    use App\Http\Controllers\Api\V1\GradeLettersController;

    Route::get('/filters', [GradeLettersController::class, 'filters']);
    Route::get('/suggestions', [GradeLettersController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeLettersController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeLettersController::class, 'importTemplate']);
    Route::post('/import', [GradeLettersController::class, 'import']);
    Route::get('/export', [GradeLettersController::class, 'export']);

    Route::post('/bulk-store', [GradeLettersController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeLettersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeLettersController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeLettersController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeLettersController::class, 'restore']);
    Route::delete('/{id}/force', [GradeLettersController::class, 'forceDelete']);

    Route::get('/', [GradeLettersController::class, 'index']);
    Route::post('/', [GradeLettersController::class, 'store']);
    Route::get('/{id}', [GradeLettersController::class, 'show']);
    Route::put('/{id}', [GradeLettersController::class, 'update']);
    Route::delete('/{id}', [GradeLettersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeLettersController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeLettersController::class, 'stats']);
});

// ========================
// CACHE_FLAGS RESOURCE
// ========================
Route::prefix('cache-flags')->group(function () {
    use App\Http\Controllers\Api\V1\CacheFlagsController;

    Route::get('/filters', [CacheFlagsController::class, 'filters']);
    Route::get('/suggestions', [CacheFlagsController::class, 'suggestions']);
    Route::post('/advanced-search', [CacheFlagsController::class, 'advancedSearch']);

    Route::get('/import-template', [CacheFlagsController::class, 'importTemplate']);
    Route::post('/import', [CacheFlagsController::class, 'import']);
    Route::get('/export', [CacheFlagsController::class, 'export']);

    Route::post('/bulk-store', [CacheFlagsController::class, 'bulkStore']);
    Route::post('/bulk-update', [CacheFlagsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CacheFlagsController::class, 'bulkDestroy']);

    Route::get('/trashed', [CacheFlagsController::class, 'trashed']);
    Route::post('/{id}/restore', [CacheFlagsController::class, 'restore']);
    Route::delete('/{id}/force', [CacheFlagsController::class, 'forceDelete']);

    Route::get('/', [CacheFlagsController::class, 'index']);
    Route::post('/', [CacheFlagsController::class, 'store']);
    Route::get('/{id}', [CacheFlagsController::class, 'show']);
    Route::put('/{id}', [CacheFlagsController::class, 'update']);
    Route::delete('/{id}', [CacheFlagsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CacheFlagsController::class, 'duplicate']);
    Route::get('/{id}/stats', [CacheFlagsController::class, 'stats']);
});

// ========================
// PORTFOLIO_INSTANCE RESOURCE
// ========================
Route::prefix('portfolio-instance')->group(function () {
    use App\Http\Controllers\Api\V1\PortfolioInstanceController;

    Route::get('/filters', [PortfolioInstanceController::class, 'filters']);
    Route::get('/suggestions', [PortfolioInstanceController::class, 'suggestions']);
    Route::post('/advanced-search', [PortfolioInstanceController::class, 'advancedSearch']);

    Route::get('/import-template', [PortfolioInstanceController::class, 'importTemplate']);
    Route::post('/import', [PortfolioInstanceController::class, 'import']);
    Route::get('/export', [PortfolioInstanceController::class, 'export']);

    Route::post('/bulk-store', [PortfolioInstanceController::class, 'bulkStore']);
    Route::post('/bulk-update', [PortfolioInstanceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PortfolioInstanceController::class, 'bulkDestroy']);

    Route::get('/trashed', [PortfolioInstanceController::class, 'trashed']);
    Route::post('/{id}/restore', [PortfolioInstanceController::class, 'restore']);
    Route::delete('/{id}/force', [PortfolioInstanceController::class, 'forceDelete']);

    Route::get('/', [PortfolioInstanceController::class, 'index']);
    Route::post('/', [PortfolioInstanceController::class, 'store']);
    Route::get('/{id}', [PortfolioInstanceController::class, 'show']);
    Route::put('/{id}', [PortfolioInstanceController::class, 'update']);
    Route::delete('/{id}', [PortfolioInstanceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PortfolioInstanceController::class, 'duplicate']);
    Route::get('/{id}/stats', [PortfolioInstanceController::class, 'stats']);
});

// ========================
// MESSAGE_PROVIDERS RESOURCE
// ========================
Route::prefix('message-providers')->group(function () {
    use App\Http\Controllers\Api\V1\MessageProvidersController;

    Route::get('/filters', [MessageProvidersController::class, 'filters']);
    Route::get('/suggestions', [MessageProvidersController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageProvidersController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageProvidersController::class, 'importTemplate']);
    Route::post('/import', [MessageProvidersController::class, 'import']);
    Route::get('/export', [MessageProvidersController::class, 'export']);

    Route::post('/bulk-store', [MessageProvidersController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageProvidersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageProvidersController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageProvidersController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageProvidersController::class, 'restore']);
    Route::delete('/{id}/force', [MessageProvidersController::class, 'forceDelete']);

    Route::get('/', [MessageProvidersController::class, 'index']);
    Route::post('/', [MessageProvidersController::class, 'store']);
    Route::get('/{id}', [MessageProvidersController::class, 'show']);
    Route::put('/{id}', [MessageProvidersController::class, 'update']);
    Route::delete('/{id}', [MessageProvidersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageProvidersController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageProvidersController::class, 'stats']);
});

// ========================
// MESSAGE_PROCESSORS RESOURCE
// ========================
Route::prefix('message-processors')->group(function () {
    use App\Http\Controllers\Api\V1\MessageProcessorsController;

    Route::get('/filters', [MessageProcessorsController::class, 'filters']);
    Route::get('/suggestions', [MessageProcessorsController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageProcessorsController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageProcessorsController::class, 'importTemplate']);
    Route::post('/import', [MessageProcessorsController::class, 'import']);
    Route::get('/export', [MessageProcessorsController::class, 'export']);

    Route::post('/bulk-store', [MessageProcessorsController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageProcessorsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageProcessorsController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageProcessorsController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageProcessorsController::class, 'restore']);
    Route::delete('/{id}/force', [MessageProcessorsController::class, 'forceDelete']);

    Route::get('/', [MessageProcessorsController::class, 'index']);
    Route::post('/', [MessageProcessorsController::class, 'store']);
    Route::get('/{id}', [MessageProcessorsController::class, 'show']);
    Route::put('/{id}', [MessageProcessorsController::class, 'update']);
    Route::delete('/{id}', [MessageProcessorsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageProcessorsController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageProcessorsController::class, 'stats']);
});

// ========================
// REPOSITORY RESOURCE
// ========================
Route::prefix('repository')->group(function () {
    use App\Http\Controllers\Api\V1\RepositoryController;

    Route::get('/filters', [RepositoryController::class, 'filters']);
    Route::get('/suggestions', [RepositoryController::class, 'suggestions']);
    Route::post('/advanced-search', [RepositoryController::class, 'advancedSearch']);

    Route::get('/import-template', [RepositoryController::class, 'importTemplate']);
    Route::post('/import', [RepositoryController::class, 'import']);
    Route::get('/export', [RepositoryController::class, 'export']);

    Route::post('/bulk-store', [RepositoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [RepositoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RepositoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [RepositoryController::class, 'trashed']);
    Route::post('/{id}/restore', [RepositoryController::class, 'restore']);
    Route::delete('/{id}/force', [RepositoryController::class, 'forceDelete']);

    Route::get('/', [RepositoryController::class, 'index']);
    Route::post('/', [RepositoryController::class, 'store']);
    Route::get('/{id}', [RepositoryController::class, 'show']);
    Route::put('/{id}', [RepositoryController::class, 'update']);
    Route::delete('/{id}', [RepositoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RepositoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [RepositoryController::class, 'stats']);
});

// ========================
// REPOSITORY_INSTANCE_CONFIG RESOURCE
// ========================
Route::prefix('repository-instance-config')->group(function () {
    use App\Http\Controllers\Api\V1\RepositoryInstanceConfigController;

    Route::get('/filters', [RepositoryInstanceConfigController::class, 'filters']);
    Route::get('/suggestions', [RepositoryInstanceConfigController::class, 'suggestions']);
    Route::post('/advanced-search', [RepositoryInstanceConfigController::class, 'advancedSearch']);

    Route::get('/import-template', [RepositoryInstanceConfigController::class, 'importTemplate']);
    Route::post('/import', [RepositoryInstanceConfigController::class, 'import']);
    Route::get('/export', [RepositoryInstanceConfigController::class, 'export']);

    Route::post('/bulk-store', [RepositoryInstanceConfigController::class, 'bulkStore']);
    Route::post('/bulk-update', [RepositoryInstanceConfigController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RepositoryInstanceConfigController::class, 'bulkDestroy']);

    Route::get('/trashed', [RepositoryInstanceConfigController::class, 'trashed']);
    Route::post('/{id}/restore', [RepositoryInstanceConfigController::class, 'restore']);
    Route::delete('/{id}/force', [RepositoryInstanceConfigController::class, 'forceDelete']);

    Route::get('/', [RepositoryInstanceConfigController::class, 'index']);
    Route::post('/', [RepositoryInstanceConfigController::class, 'store']);
    Route::get('/{id}', [RepositoryInstanceConfigController::class, 'show']);
    Route::put('/{id}', [RepositoryInstanceConfigController::class, 'update']);
    Route::delete('/{id}', [RepositoryInstanceConfigController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RepositoryInstanceConfigController::class, 'duplicate']);
    Route::get('/{id}/stats', [RepositoryInstanceConfigController::class, 'stats']);
});

// ========================
// BACKUP_COURSES RESOURCE
// ========================
Route::prefix('backup-courses')->group(function () {
    use App\Http\Controllers\Api\V1\BackupCoursesController;

    Route::get('/filters', [BackupCoursesController::class, 'filters']);
    Route::get('/suggestions', [BackupCoursesController::class, 'suggestions']);
    Route::post('/advanced-search', [BackupCoursesController::class, 'advancedSearch']);

    Route::get('/import-template', [BackupCoursesController::class, 'importTemplate']);
    Route::post('/import', [BackupCoursesController::class, 'import']);
    Route::get('/export', [BackupCoursesController::class, 'export']);

    Route::post('/bulk-store', [BackupCoursesController::class, 'bulkStore']);
    Route::post('/bulk-update', [BackupCoursesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BackupCoursesController::class, 'bulkDestroy']);

    Route::get('/trashed', [BackupCoursesController::class, 'trashed']);
    Route::post('/{id}/restore', [BackupCoursesController::class, 'restore']);
    Route::delete('/{id}/force', [BackupCoursesController::class, 'forceDelete']);

    Route::get('/', [BackupCoursesController::class, 'index']);
    Route::post('/', [BackupCoursesController::class, 'store']);
    Route::get('/{id}', [BackupCoursesController::class, 'show']);
    Route::put('/{id}', [BackupCoursesController::class, 'update']);
    Route::delete('/{id}', [BackupCoursesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BackupCoursesController::class, 'duplicate']);
    Route::get('/{id}/stats', [BackupCoursesController::class, 'stats']);
});

// ========================
// BLOCK RESOURCE
// ========================
Route::prefix('block')->group(function () {
    use App\Http\Controllers\Api\V1\BlockController;

    Route::get('/filters', [BlockController::class, 'filters']);
    Route::get('/suggestions', [BlockController::class, 'suggestions']);
    Route::post('/advanced-search', [BlockController::class, 'advancedSearch']);

    Route::get('/import-template', [BlockController::class, 'importTemplate']);
    Route::post('/import', [BlockController::class, 'import']);
    Route::get('/export', [BlockController::class, 'export']);

    Route::post('/bulk-store', [BlockController::class, 'bulkStore']);
    Route::post('/bulk-update', [BlockController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BlockController::class, 'bulkDestroy']);

    Route::get('/trashed', [BlockController::class, 'trashed']);
    Route::post('/{id}/restore', [BlockController::class, 'restore']);
    Route::delete('/{id}/force', [BlockController::class, 'forceDelete']);

    Route::get('/', [BlockController::class, 'index']);
    Route::post('/', [BlockController::class, 'store']);
    Route::get('/{id}', [BlockController::class, 'show']);
    Route::put('/{id}', [BlockController::class, 'update']);
    Route::delete('/{id}', [BlockController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BlockController::class, 'duplicate']);
    Route::get('/{id}/stats', [BlockController::class, 'stats']);
});

// ========================
// EXTERNAL_SERVICES RESOURCE
// ========================
Route::prefix('external-services')->group(function () {
    use App\Http\Controllers\Api\V1\ExternalServicesController;

    Route::get('/filters', [ExternalServicesController::class, 'filters']);
    Route::get('/suggestions', [ExternalServicesController::class, 'suggestions']);
    Route::post('/advanced-search', [ExternalServicesController::class, 'advancedSearch']);

    Route::get('/import-template', [ExternalServicesController::class, 'importTemplate']);
    Route::post('/import', [ExternalServicesController::class, 'import']);
    Route::get('/export', [ExternalServicesController::class, 'export']);

    Route::post('/bulk-store', [ExternalServicesController::class, 'bulkStore']);
    Route::post('/bulk-update', [ExternalServicesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ExternalServicesController::class, 'bulkDestroy']);

    Route::get('/trashed', [ExternalServicesController::class, 'trashed']);
    Route::post('/{id}/restore', [ExternalServicesController::class, 'restore']);
    Route::delete('/{id}/force', [ExternalServicesController::class, 'forceDelete']);

    Route::get('/', [ExternalServicesController::class, 'index']);
    Route::post('/', [ExternalServicesController::class, 'store']);
    Route::get('/{id}', [ExternalServicesController::class, 'show']);
    Route::put('/{id}', [ExternalServicesController::class, 'update']);
    Route::delete('/{id}', [ExternalServicesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ExternalServicesController::class, 'duplicate']);
    Route::get('/{id}/stats', [ExternalServicesController::class, 'stats']);
});

// ========================
// EXTERNAL_FUNCTIONS RESOURCE
// ========================
Route::prefix('external-functions')->group(function () {
    use App\Http\Controllers\Api\V1\ExternalFunctionsController;

    Route::get('/filters', [ExternalFunctionsController::class, 'filters']);
    Route::get('/suggestions', [ExternalFunctionsController::class, 'suggestions']);
    Route::post('/advanced-search', [ExternalFunctionsController::class, 'advancedSearch']);

    Route::get('/import-template', [ExternalFunctionsController::class, 'importTemplate']);
    Route::post('/import', [ExternalFunctionsController::class, 'import']);
    Route::get('/export', [ExternalFunctionsController::class, 'export']);

    Route::post('/bulk-store', [ExternalFunctionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ExternalFunctionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ExternalFunctionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ExternalFunctionsController::class, 'trashed']);
    Route::post('/{id}/restore', [ExternalFunctionsController::class, 'restore']);
    Route::delete('/{id}/force', [ExternalFunctionsController::class, 'forceDelete']);

    Route::get('/', [ExternalFunctionsController::class, 'index']);
    Route::post('/', [ExternalFunctionsController::class, 'store']);
    Route::get('/{id}', [ExternalFunctionsController::class, 'show']);
    Route::put('/{id}', [ExternalFunctionsController::class, 'update']);
    Route::delete('/{id}', [ExternalFunctionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ExternalFunctionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ExternalFunctionsController::class, 'stats']);
});

// ========================
// LICENSE RESOURCE
// ========================
Route::prefix('license')->group(function () {
    use App\Http\Controllers\Api\V1\LicenseController;

    Route::get('/filters', [LicenseController::class, 'filters']);
    Route::get('/suggestions', [LicenseController::class, 'suggestions']);
    Route::post('/advanced-search', [LicenseController::class, 'advancedSearch']);

    Route::get('/import-template', [LicenseController::class, 'importTemplate']);
    Route::post('/import', [LicenseController::class, 'import']);
    Route::get('/export', [LicenseController::class, 'export']);

    Route::post('/bulk-store', [LicenseController::class, 'bulkStore']);
    Route::post('/bulk-update', [LicenseController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LicenseController::class, 'bulkDestroy']);

    Route::get('/trashed', [LicenseController::class, 'trashed']);
    Route::post('/{id}/restore', [LicenseController::class, 'restore']);
    Route::delete('/{id}/force', [LicenseController::class, 'forceDelete']);

    Route::get('/', [LicenseController::class, 'index']);
    Route::post('/', [LicenseController::class, 'store']);
    Route::get('/{id}', [LicenseController::class, 'show']);
    Route::put('/{id}', [LicenseController::class, 'update']);
    Route::delete('/{id}', [LicenseController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LicenseController::class, 'duplicate']);
    Route::get('/{id}/stats', [LicenseController::class, 'stats']);
});

// ========================
// REGISTRATION_HUBS RESOURCE
// ========================
Route::prefix('registration-hubs')->group(function () {
    use App\Http\Controllers\Api\V1\RegistrationHubsController;

    Route::get('/filters', [RegistrationHubsController::class, 'filters']);
    Route::get('/suggestions', [RegistrationHubsController::class, 'suggestions']);
    Route::post('/advanced-search', [RegistrationHubsController::class, 'advancedSearch']);

    Route::get('/import-template', [RegistrationHubsController::class, 'importTemplate']);
    Route::post('/import', [RegistrationHubsController::class, 'import']);
    Route::get('/export', [RegistrationHubsController::class, 'export']);

    Route::post('/bulk-store', [RegistrationHubsController::class, 'bulkStore']);
    Route::post('/bulk-update', [RegistrationHubsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RegistrationHubsController::class, 'bulkDestroy']);

    Route::get('/trashed', [RegistrationHubsController::class, 'trashed']);
    Route::post('/{id}/restore', [RegistrationHubsController::class, 'restore']);
    Route::delete('/{id}/force', [RegistrationHubsController::class, 'forceDelete']);

    Route::get('/', [RegistrationHubsController::class, 'index']);
    Route::post('/', [RegistrationHubsController::class, 'store']);
    Route::get('/{id}', [RegistrationHubsController::class, 'show']);
    Route::put('/{id}', [RegistrationHubsController::class, 'update']);
    Route::delete('/{id}', [RegistrationHubsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RegistrationHubsController::class, 'duplicate']);
    Route::get('/{id}/stats', [RegistrationHubsController::class, 'stats']);
});

// ========================
// PROFILING RESOURCE
// ========================
Route::prefix('profiling')->group(function () {
    use App\Http\Controllers\Api\V1\ProfilingController;

    Route::get('/filters', [ProfilingController::class, 'filters']);
    Route::get('/suggestions', [ProfilingController::class, 'suggestions']);
    Route::post('/advanced-search', [ProfilingController::class, 'advancedSearch']);

    Route::get('/import-template', [ProfilingController::class, 'importTemplate']);
    Route::post('/import', [ProfilingController::class, 'import']);
    Route::get('/export', [ProfilingController::class, 'export']);

    Route::post('/bulk-store', [ProfilingController::class, 'bulkStore']);
    Route::post('/bulk-update', [ProfilingController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ProfilingController::class, 'bulkDestroy']);

    Route::get('/trashed', [ProfilingController::class, 'trashed']);
    Route::post('/{id}/restore', [ProfilingController::class, 'restore']);
    Route::delete('/{id}/force', [ProfilingController::class, 'forceDelete']);

    Route::get('/', [ProfilingController::class, 'index']);
    Route::post('/', [ProfilingController::class, 'store']);
    Route::get('/{id}', [ProfilingController::class, 'show']);
    Route::put('/{id}', [ProfilingController::class, 'update']);
    Route::delete('/{id}', [ProfilingController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ProfilingController::class, 'duplicate']);
    Route::get('/{id}/stats', [ProfilingController::class, 'stats']);
});

// ========================
// LOCK_DB RESOURCE
// ========================
Route::prefix('lock-db')->group(function () {
    use App\Http\Controllers\Api\V1\LockDbController;

    Route::get('/filters', [LockDbController::class, 'filters']);
    Route::get('/suggestions', [LockDbController::class, 'suggestions']);
    Route::post('/advanced-search', [LockDbController::class, 'advancedSearch']);

    Route::get('/import-template', [LockDbController::class, 'importTemplate']);
    Route::post('/import', [LockDbController::class, 'import']);
    Route::get('/export', [LockDbController::class, 'export']);

    Route::post('/bulk-store', [LockDbController::class, 'bulkStore']);
    Route::post('/bulk-update', [LockDbController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LockDbController::class, 'bulkDestroy']);

    Route::get('/trashed', [LockDbController::class, 'trashed']);
    Route::post('/{id}/restore', [LockDbController::class, 'restore']);
    Route::delete('/{id}/force', [LockDbController::class, 'forceDelete']);

    Route::get('/', [LockDbController::class, 'index']);
    Route::post('/', [LockDbController::class, 'store']);
    Route::get('/{id}', [LockDbController::class, 'show']);
    Route::put('/{id}', [LockDbController::class, 'update']);
    Route::delete('/{id}', [LockDbController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LockDbController::class, 'duplicate']);
    Route::get('/{id}/stats', [LockDbController::class, 'stats']);
});

// ========================
// TASK_SCHEDULED RESOURCE
// ========================
Route::prefix('task-scheduled')->group(function () {
    use App\Http\Controllers\Api\V1\TaskScheduledController;

    Route::get('/filters', [TaskScheduledController::class, 'filters']);
    Route::get('/suggestions', [TaskScheduledController::class, 'suggestions']);
    Route::post('/advanced-search', [TaskScheduledController::class, 'advancedSearch']);

    Route::get('/import-template', [TaskScheduledController::class, 'importTemplate']);
    Route::post('/import', [TaskScheduledController::class, 'import']);
    Route::get('/export', [TaskScheduledController::class, 'export']);

    Route::post('/bulk-store', [TaskScheduledController::class, 'bulkStore']);
    Route::post('/bulk-update', [TaskScheduledController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [TaskScheduledController::class, 'bulkDestroy']);

    Route::get('/trashed', [TaskScheduledController::class, 'trashed']);
    Route::post('/{id}/restore', [TaskScheduledController::class, 'restore']);
    Route::delete('/{id}/force', [TaskScheduledController::class, 'forceDelete']);

    Route::get('/', [TaskScheduledController::class, 'index']);
    Route::post('/', [TaskScheduledController::class, 'store']);
    Route::get('/{id}', [TaskScheduledController::class, 'show']);
    Route::put('/{id}', [TaskScheduledController::class, 'update']);
    Route::delete('/{id}', [TaskScheduledController::class, 'destroy']);

    Route::post('/{id}/duplicate', [TaskScheduledController::class, 'duplicate']);
    Route::get('/{id}/stats', [TaskScheduledController::class, 'stats']);
});

// ========================
// MESSAGEINBOUND_HANDLERS RESOURCE
// ========================
Route::prefix('messageinbound-handlers')->group(function () {
    use App\Http\Controllers\Api\V1\MessageinboundHandlersController;

    Route::get('/filters', [MessageinboundHandlersController::class, 'filters']);
    Route::get('/suggestions', [MessageinboundHandlersController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageinboundHandlersController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageinboundHandlersController::class, 'importTemplate']);
    Route::post('/import', [MessageinboundHandlersController::class, 'import']);
    Route::get('/export', [MessageinboundHandlersController::class, 'export']);

    Route::post('/bulk-store', [MessageinboundHandlersController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageinboundHandlersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageinboundHandlersController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageinboundHandlersController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageinboundHandlersController::class, 'restore']);
    Route::delete('/{id}/force', [MessageinboundHandlersController::class, 'forceDelete']);

    Route::get('/', [MessageinboundHandlersController::class, 'index']);
    Route::post('/', [MessageinboundHandlersController::class, 'store']);
    Route::get('/{id}', [MessageinboundHandlersController::class, 'show']);
    Route::put('/{id}', [MessageinboundHandlersController::class, 'update']);
    Route::delete('/{id}', [MessageinboundHandlersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageinboundHandlersController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageinboundHandlersController::class, 'stats']);
});

// ========================
// OAUTH2_ISSUER RESOURCE
// ========================
Route::prefix('oauth2-issuer')->group(function () {
    use App\Http\Controllers\Api\V1\Oauth2IssuerController;

    Route::get('/filters', [Oauth2IssuerController::class, 'filters']);
    Route::get('/suggestions', [Oauth2IssuerController::class, 'suggestions']);
    Route::post('/advanced-search', [Oauth2IssuerController::class, 'advancedSearch']);

    Route::get('/import-template', [Oauth2IssuerController::class, 'importTemplate']);
    Route::post('/import', [Oauth2IssuerController::class, 'import']);
    Route::get('/export', [Oauth2IssuerController::class, 'export']);

    Route::post('/bulk-store', [Oauth2IssuerController::class, 'bulkStore']);
    Route::post('/bulk-update', [Oauth2IssuerController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [Oauth2IssuerController::class, 'bulkDestroy']);

    Route::get('/trashed', [Oauth2IssuerController::class, 'trashed']);
    Route::post('/{id}/restore', [Oauth2IssuerController::class, 'restore']);
    Route::delete('/{id}/force', [Oauth2IssuerController::class, 'forceDelete']);

    Route::get('/', [Oauth2IssuerController::class, 'index']);
    Route::post('/', [Oauth2IssuerController::class, 'store']);
    Route::get('/{id}', [Oauth2IssuerController::class, 'show']);
    Route::put('/{id}', [Oauth2IssuerController::class, 'update']);
    Route::delete('/{id}', [Oauth2IssuerController::class, 'destroy']);

    Route::post('/{id}/duplicate', [Oauth2IssuerController::class, 'duplicate']);
    Route::get('/{id}/stats', [Oauth2IssuerController::class, 'stats']);
});

// ========================
// H5P_LIBRARIES RESOURCE
// ========================
Route::prefix('h5p-libraries')->group(function () {
    use App\Http\Controllers\Api\V1\H5pLibrariesController;

    Route::get('/filters', [H5pLibrariesController::class, 'filters']);
    Route::get('/suggestions', [H5pLibrariesController::class, 'suggestions']);
    Route::post('/advanced-search', [H5pLibrariesController::class, 'advancedSearch']);

    Route::get('/import-template', [H5pLibrariesController::class, 'importTemplate']);
    Route::post('/import', [H5pLibrariesController::class, 'import']);
    Route::get('/export', [H5pLibrariesController::class, 'export']);

    Route::post('/bulk-store', [H5pLibrariesController::class, 'bulkStore']);
    Route::post('/bulk-update', [H5pLibrariesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [H5pLibrariesController::class, 'bulkDestroy']);

    Route::get('/trashed', [H5pLibrariesController::class, 'trashed']);
    Route::post('/{id}/restore', [H5pLibrariesController::class, 'restore']);
    Route::delete('/{id}/force', [H5pLibrariesController::class, 'forceDelete']);

    Route::get('/', [H5pLibrariesController::class, 'index']);
    Route::post('/', [H5pLibrariesController::class, 'store']);
    Route::get('/{id}', [H5pLibrariesController::class, 'show']);
    Route::put('/{id}', [H5pLibrariesController::class, 'update']);
    Route::delete('/{id}', [H5pLibrariesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [H5pLibrariesController::class, 'duplicate']);
    Route::get('/{id}/stats', [H5pLibrariesController::class, 'stats']);
});

// ========================
// ADMINPRESETS RESOURCE
// ========================
Route::prefix('adminpresets')->group(function () {
    use App\Http\Controllers\Api\V1\AdminpresetsController;

    Route::get('/filters', [AdminpresetsController::class, 'filters']);
    Route::get('/suggestions', [AdminpresetsController::class, 'suggestions']);
    Route::post('/advanced-search', [AdminpresetsController::class, 'advancedSearch']);

    Route::get('/import-template', [AdminpresetsController::class, 'importTemplate']);
    Route::post('/import', [AdminpresetsController::class, 'import']);
    Route::get('/export', [AdminpresetsController::class, 'export']);

    Route::post('/bulk-store', [AdminpresetsController::class, 'bulkStore']);
    Route::post('/bulk-update', [AdminpresetsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AdminpresetsController::class, 'bulkDestroy']);

    Route::get('/trashed', [AdminpresetsController::class, 'trashed']);
    Route::post('/{id}/restore', [AdminpresetsController::class, 'restore']);
    Route::delete('/{id}/force', [AdminpresetsController::class, 'forceDelete']);

    Route::get('/', [AdminpresetsController::class, 'index']);
    Route::post('/', [AdminpresetsController::class, 'store']);
    Route::get('/{id}', [AdminpresetsController::class, 'show']);
    Route::put('/{id}', [AdminpresetsController::class, 'update']);
    Route::delete('/{id}', [AdminpresetsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AdminpresetsController::class, 'duplicate']);
    Route::get('/{id}/stats', [AdminpresetsController::class, 'stats']);
});

// ========================
// ADMINPRESETS_IT RESOURCE
// ========================
Route::prefix('adminpresets-it')->group(function () {
    use App\Http\Controllers\Api\V1\AdminpresetsItController;

    Route::get('/filters', [AdminpresetsItController::class, 'filters']);
    Route::get('/suggestions', [AdminpresetsItController::class, 'suggestions']);
    Route::post('/advanced-search', [AdminpresetsItController::class, 'advancedSearch']);

    Route::get('/import-template', [AdminpresetsItController::class, 'importTemplate']);
    Route::post('/import', [AdminpresetsItController::class, 'import']);
    Route::get('/export', [AdminpresetsItController::class, 'export']);

    Route::post('/bulk-store', [AdminpresetsItController::class, 'bulkStore']);
    Route::post('/bulk-update', [AdminpresetsItController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AdminpresetsItController::class, 'bulkDestroy']);

    Route::get('/trashed', [AdminpresetsItController::class, 'trashed']);
    Route::post('/{id}/restore', [AdminpresetsItController::class, 'restore']);
    Route::delete('/{id}/force', [AdminpresetsItController::class, 'forceDelete']);

    Route::get('/', [AdminpresetsItController::class, 'index']);
    Route::post('/', [AdminpresetsItController::class, 'store']);
    Route::get('/{id}', [AdminpresetsItController::class, 'show']);
    Route::put('/{id}', [AdminpresetsItController::class, 'update']);
    Route::delete('/{id}', [AdminpresetsItController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AdminpresetsItController::class, 'duplicate']);
    Route::get('/{id}/stats', [AdminpresetsItController::class, 'stats']);
});

// ========================
// ADMINPRESETS_IT_A RESOURCE
// ========================
Route::prefix('adminpresets-it-a')->group(function () {
    use App\Http\Controllers\Api\V1\AdminpresetsItAController;

    Route::get('/filters', [AdminpresetsItAController::class, 'filters']);
    Route::get('/suggestions', [AdminpresetsItAController::class, 'suggestions']);
    Route::post('/advanced-search', [AdminpresetsItAController::class, 'advancedSearch']);

    Route::get('/import-template', [AdminpresetsItAController::class, 'importTemplate']);
    Route::post('/import', [AdminpresetsItAController::class, 'import']);
    Route::get('/export', [AdminpresetsItAController::class, 'export']);

    Route::post('/bulk-store', [AdminpresetsItAController::class, 'bulkStore']);
    Route::post('/bulk-update', [AdminpresetsItAController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AdminpresetsItAController::class, 'bulkDestroy']);

    Route::get('/trashed', [AdminpresetsItAController::class, 'trashed']);
    Route::post('/{id}/restore', [AdminpresetsItAController::class, 'restore']);
    Route::delete('/{id}/force', [AdminpresetsItAController::class, 'forceDelete']);

    Route::get('/', [AdminpresetsItAController::class, 'index']);
    Route::post('/', [AdminpresetsItAController::class, 'store']);
    Route::get('/{id}', [AdminpresetsItAController::class, 'show']);
    Route::put('/{id}', [AdminpresetsItAController::class, 'update']);
    Route::delete('/{id}', [AdminpresetsItAController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AdminpresetsItAController::class, 'duplicate']);
    Route::get('/{id}/stats', [AdminpresetsItAController::class, 'stats']);
});

// ========================
// ADMINPRESETS_APP RESOURCE
// ========================
Route::prefix('adminpresets-app')->group(function () {
    use App\Http\Controllers\Api\V1\AdminpresetsAppController;

    Route::get('/filters', [AdminpresetsAppController::class, 'filters']);
    Route::get('/suggestions', [AdminpresetsAppController::class, 'suggestions']);
    Route::post('/advanced-search', [AdminpresetsAppController::class, 'advancedSearch']);

    Route::get('/import-template', [AdminpresetsAppController::class, 'importTemplate']);
    Route::post('/import', [AdminpresetsAppController::class, 'import']);
    Route::get('/export', [AdminpresetsAppController::class, 'export']);

    Route::post('/bulk-store', [AdminpresetsAppController::class, 'bulkStore']);
    Route::post('/bulk-update', [AdminpresetsAppController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AdminpresetsAppController::class, 'bulkDestroy']);

    Route::get('/trashed', [AdminpresetsAppController::class, 'trashed']);
    Route::post('/{id}/restore', [AdminpresetsAppController::class, 'restore']);
    Route::delete('/{id}/force', [AdminpresetsAppController::class, 'forceDelete']);

    Route::get('/', [AdminpresetsAppController::class, 'index']);
    Route::post('/', [AdminpresetsAppController::class, 'store']);
    Route::get('/{id}', [AdminpresetsAppController::class, 'show']);
    Route::put('/{id}', [AdminpresetsAppController::class, 'update']);
    Route::delete('/{id}', [AdminpresetsAppController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AdminpresetsAppController::class, 'duplicate']);
    Route::get('/{id}/stats', [AdminpresetsAppController::class, 'stats']);
});

// ========================
// ADMINPRESETS_APP_IT RESOURCE
// ========================
Route::prefix('adminpresets-app-it')->group(function () {
    use App\Http\Controllers\Api\V1\AdminpresetsAppItController;

    Route::get('/filters', [AdminpresetsAppItController::class, 'filters']);
    Route::get('/suggestions', [AdminpresetsAppItController::class, 'suggestions']);
    Route::post('/advanced-search', [AdminpresetsAppItController::class, 'advancedSearch']);

    Route::get('/import-template', [AdminpresetsAppItController::class, 'importTemplate']);
    Route::post('/import', [AdminpresetsAppItController::class, 'import']);
    Route::get('/export', [AdminpresetsAppItController::class, 'export']);

    Route::post('/bulk-store', [AdminpresetsAppItController::class, 'bulkStore']);
    Route::post('/bulk-update', [AdminpresetsAppItController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AdminpresetsAppItController::class, 'bulkDestroy']);

    Route::get('/trashed', [AdminpresetsAppItController::class, 'trashed']);
    Route::post('/{id}/restore', [AdminpresetsAppItController::class, 'restore']);
    Route::delete('/{id}/force', [AdminpresetsAppItController::class, 'forceDelete']);

    Route::get('/', [AdminpresetsAppItController::class, 'index']);
    Route::post('/', [AdminpresetsAppItController::class, 'store']);
    Route::get('/{id}', [AdminpresetsAppItController::class, 'show']);
    Route::put('/{id}', [AdminpresetsAppItController::class, 'update']);
    Route::delete('/{id}', [AdminpresetsAppItController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AdminpresetsAppItController::class, 'duplicate']);
    Route::get('/{id}/stats', [AdminpresetsAppItController::class, 'stats']);
});

// ========================
// ADMINPRESETS_APP_IT_A RESOURCE
// ========================
Route::prefix('adminpresets-app-it-a')->group(function () {
    use App\Http\Controllers\Api\V1\AdminpresetsAppItAController;

    Route::get('/filters', [AdminpresetsAppItAController::class, 'filters']);
    Route::get('/suggestions', [AdminpresetsAppItAController::class, 'suggestions']);
    Route::post('/advanced-search', [AdminpresetsAppItAController::class, 'advancedSearch']);

    Route::get('/import-template', [AdminpresetsAppItAController::class, 'importTemplate']);
    Route::post('/import', [AdminpresetsAppItAController::class, 'import']);
    Route::get('/export', [AdminpresetsAppItAController::class, 'export']);

    Route::post('/bulk-store', [AdminpresetsAppItAController::class, 'bulkStore']);
    Route::post('/bulk-update', [AdminpresetsAppItAController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AdminpresetsAppItAController::class, 'bulkDestroy']);

    Route::get('/trashed', [AdminpresetsAppItAController::class, 'trashed']);
    Route::post('/{id}/restore', [AdminpresetsAppItAController::class, 'restore']);
    Route::delete('/{id}/force', [AdminpresetsAppItAController::class, 'forceDelete']);

    Route::get('/', [AdminpresetsAppItAController::class, 'index']);
    Route::post('/', [AdminpresetsAppItAController::class, 'store']);
    Route::get('/{id}', [AdminpresetsAppItAController::class, 'show']);
    Route::put('/{id}', [AdminpresetsAppItAController::class, 'update']);
    Route::delete('/{id}', [AdminpresetsAppItAController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AdminpresetsAppItAController::class, 'duplicate']);
    Route::get('/{id}/stats', [AdminpresetsAppItAController::class, 'stats']);
});

// ========================
// ADMINPRESETS_PLUG RESOURCE
// ========================
Route::prefix('adminpresets-plug')->group(function () {
    use App\Http\Controllers\Api\V1\AdminpresetsPlugController;

    Route::get('/filters', [AdminpresetsPlugController::class, 'filters']);
    Route::get('/suggestions', [AdminpresetsPlugController::class, 'suggestions']);
    Route::post('/advanced-search', [AdminpresetsPlugController::class, 'advancedSearch']);

    Route::get('/import-template', [AdminpresetsPlugController::class, 'importTemplate']);
    Route::post('/import', [AdminpresetsPlugController::class, 'import']);
    Route::get('/export', [AdminpresetsPlugController::class, 'export']);

    Route::post('/bulk-store', [AdminpresetsPlugController::class, 'bulkStore']);
    Route::post('/bulk-update', [AdminpresetsPlugController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AdminpresetsPlugController::class, 'bulkDestroy']);

    Route::get('/trashed', [AdminpresetsPlugController::class, 'trashed']);
    Route::post('/{id}/restore', [AdminpresetsPlugController::class, 'restore']);
    Route::delete('/{id}/force', [AdminpresetsPlugController::class, 'forceDelete']);

    Route::get('/', [AdminpresetsPlugController::class, 'index']);
    Route::post('/', [AdminpresetsPlugController::class, 'store']);
    Route::get('/{id}', [AdminpresetsPlugController::class, 'show']);
    Route::put('/{id}', [AdminpresetsPlugController::class, 'update']);
    Route::delete('/{id}', [AdminpresetsPlugController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AdminpresetsPlugController::class, 'duplicate']);
    Route::get('/{id}/stats', [AdminpresetsPlugController::class, 'stats']);
});

// ========================
// ADMINPRESETS_APP_PLUG RESOURCE
// ========================
Route::prefix('adminpresets-app-plug')->group(function () {
    use App\Http\Controllers\Api\V1\AdminpresetsAppPlugController;

    Route::get('/filters', [AdminpresetsAppPlugController::class, 'filters']);
    Route::get('/suggestions', [AdminpresetsAppPlugController::class, 'suggestions']);
    Route::post('/advanced-search', [AdminpresetsAppPlugController::class, 'advancedSearch']);

    Route::get('/import-template', [AdminpresetsAppPlugController::class, 'importTemplate']);
    Route::post('/import', [AdminpresetsAppPlugController::class, 'import']);
    Route::get('/export', [AdminpresetsAppPlugController::class, 'export']);

    Route::post('/bulk-store', [AdminpresetsAppPlugController::class, 'bulkStore']);
    Route::post('/bulk-update', [AdminpresetsAppPlugController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AdminpresetsAppPlugController::class, 'bulkDestroy']);

    Route::get('/trashed', [AdminpresetsAppPlugController::class, 'trashed']);
    Route::post('/{id}/restore', [AdminpresetsAppPlugController::class, 'restore']);
    Route::delete('/{id}/force', [AdminpresetsAppPlugController::class, 'forceDelete']);

    Route::get('/', [AdminpresetsAppPlugController::class, 'index']);
    Route::post('/', [AdminpresetsAppPlugController::class, 'store']);
    Route::get('/{id}', [AdminpresetsAppPlugController::class, 'show']);
    Route::put('/{id}', [AdminpresetsAppPlugController::class, 'update']);
    Route::delete('/{id}', [AdminpresetsAppPlugController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AdminpresetsAppPlugController::class, 'duplicate']);
    Route::get('/{id}/stats', [AdminpresetsAppPlugController::class, 'stats']);
});

// ========================
// COURSE_MODULES_VIEWED RESOURCE
// ========================
Route::prefix('course-modules-viewed')->group(function () {
    use App\Http\Controllers\Api\V1\CourseModulesViewedController;

    Route::get('/filters', [CourseModulesViewedController::class, 'filters']);
    Route::get('/suggestions', [CourseModulesViewedController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseModulesViewedController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseModulesViewedController::class, 'importTemplate']);
    Route::post('/import', [CourseModulesViewedController::class, 'import']);
    Route::get('/export', [CourseModulesViewedController::class, 'export']);

    Route::post('/bulk-store', [CourseModulesViewedController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseModulesViewedController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseModulesViewedController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseModulesViewedController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseModulesViewedController::class, 'restore']);
    Route::delete('/{id}/force', [CourseModulesViewedController::class, 'forceDelete']);

    Route::get('/', [CourseModulesViewedController::class, 'index']);
    Route::post('/', [CourseModulesViewedController::class, 'store']);
    Route::get('/{id}', [CourseModulesViewedController::class, 'show']);
    Route::put('/{id}', [CourseModulesViewedController::class, 'update']);
    Route::delete('/{id}', [CourseModulesViewedController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseModulesViewedController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseModulesViewedController::class, 'stats']);
});

// ========================
// XAPI_STATES RESOURCE
// ========================
Route::prefix('xapi-states')->group(function () {
    use App\Http\Controllers\Api\V1\XapiStatesController;

    Route::get('/filters', [XapiStatesController::class, 'filters']);
    Route::get('/suggestions', [XapiStatesController::class, 'suggestions']);
    Route::post('/advanced-search', [XapiStatesController::class, 'advancedSearch']);

    Route::get('/import-template', [XapiStatesController::class, 'importTemplate']);
    Route::post('/import', [XapiStatesController::class, 'import']);
    Route::get('/export', [XapiStatesController::class, 'export']);

    Route::post('/bulk-store', [XapiStatesController::class, 'bulkStore']);
    Route::post('/bulk-update', [XapiStatesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [XapiStatesController::class, 'bulkDestroy']);

    Route::get('/trashed', [XapiStatesController::class, 'trashed']);
    Route::post('/{id}/restore', [XapiStatesController::class, 'restore']);
    Route::delete('/{id}/force', [XapiStatesController::class, 'forceDelete']);

    Route::get('/', [XapiStatesController::class, 'index']);
    Route::post('/', [XapiStatesController::class, 'store']);
    Route::get('/{id}', [XapiStatesController::class, 'show']);
    Route::put('/{id}', [XapiStatesController::class, 'update']);
    Route::delete('/{id}', [XapiStatesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [XapiStatesController::class, 'duplicate']);
    Route::get('/{id}/stats', [XapiStatesController::class, 'stats']);
});

// ========================
// MOODLENET_SHARE_PROGRESS RESOURCE
// ========================
Route::prefix('moodlenet-share-progress')->group(function () {
    use App\Http\Controllers\Api\V1\MoodlenetShareProgressController;

    Route::get('/filters', [MoodlenetShareProgressController::class, 'filters']);
    Route::get('/suggestions', [MoodlenetShareProgressController::class, 'suggestions']);
    Route::post('/advanced-search', [MoodlenetShareProgressController::class, 'advancedSearch']);

    Route::get('/import-template', [MoodlenetShareProgressController::class, 'importTemplate']);
    Route::post('/import', [MoodlenetShareProgressController::class, 'import']);
    Route::get('/export', [MoodlenetShareProgressController::class, 'export']);

    Route::post('/bulk-store', [MoodlenetShareProgressController::class, 'bulkStore']);
    Route::post('/bulk-update', [MoodlenetShareProgressController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MoodlenetShareProgressController::class, 'bulkDestroy']);

    Route::get('/trashed', [MoodlenetShareProgressController::class, 'trashed']);
    Route::post('/{id}/restore', [MoodlenetShareProgressController::class, 'restore']);
    Route::delete('/{id}/force', [MoodlenetShareProgressController::class, 'forceDelete']);

    Route::get('/', [MoodlenetShareProgressController::class, 'index']);
    Route::post('/', [MoodlenetShareProgressController::class, 'store']);
    Route::get('/{id}', [MoodlenetShareProgressController::class, 'show']);
    Route::put('/{id}', [MoodlenetShareProgressController::class, 'update']);
    Route::delete('/{id}', [MoodlenetShareProgressController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MoodlenetShareProgressController::class, 'duplicate']);
    Route::get('/{id}/stats', [MoodlenetShareProgressController::class, 'stats']);
});

// ========================
// EDITOR_ATTO_AUTOSAVE RESOURCE
// ========================
Route::prefix('editor-atto-autosave')->group(function () {
    use App\Http\Controllers\Api\V1\EditorAttoAutosaveController;

    Route::get('/filters', [EditorAttoAutosaveController::class, 'filters']);
    Route::get('/suggestions', [EditorAttoAutosaveController::class, 'suggestions']);
    Route::post('/advanced-search', [EditorAttoAutosaveController::class, 'advancedSearch']);

    Route::get('/import-template', [EditorAttoAutosaveController::class, 'importTemplate']);
    Route::post('/import', [EditorAttoAutosaveController::class, 'import']);
    Route::get('/export', [EditorAttoAutosaveController::class, 'export']);

    Route::post('/bulk-store', [EditorAttoAutosaveController::class, 'bulkStore']);
    Route::post('/bulk-update', [EditorAttoAutosaveController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EditorAttoAutosaveController::class, 'bulkDestroy']);

    Route::get('/trashed', [EditorAttoAutosaveController::class, 'trashed']);
    Route::post('/{id}/restore', [EditorAttoAutosaveController::class, 'restore']);
    Route::delete('/{id}/force', [EditorAttoAutosaveController::class, 'forceDelete']);

    Route::get('/', [EditorAttoAutosaveController::class, 'index']);
    Route::post('/', [EditorAttoAutosaveController::class, 'store']);
    Route::get('/{id}', [EditorAttoAutosaveController::class, 'show']);
    Route::put('/{id}', [EditorAttoAutosaveController::class, 'update']);
    Route::delete('/{id}', [EditorAttoAutosaveController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EditorAttoAutosaveController::class, 'duplicate']);
    Route::get('/{id}/stats', [EditorAttoAutosaveController::class, 'stats']);
});

// ========================
// TINY_AUTOSAVE RESOURCE
// ========================
Route::prefix('tiny-autosave')->group(function () {
    use App\Http\Controllers\Api\V1\TinyAutosaveController;

    Route::get('/filters', [TinyAutosaveController::class, 'filters']);
    Route::get('/suggestions', [TinyAutosaveController::class, 'suggestions']);
    Route::post('/advanced-search', [TinyAutosaveController::class, 'advancedSearch']);

    Route::get('/import-template', [TinyAutosaveController::class, 'importTemplate']);
    Route::post('/import', [TinyAutosaveController::class, 'import']);
    Route::get('/export', [TinyAutosaveController::class, 'export']);

    Route::post('/bulk-store', [TinyAutosaveController::class, 'bulkStore']);
    Route::post('/bulk-update', [TinyAutosaveController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [TinyAutosaveController::class, 'bulkDestroy']);

    Route::get('/trashed', [TinyAutosaveController::class, 'trashed']);
    Route::post('/{id}/restore', [TinyAutosaveController::class, 'restore']);
    Route::delete('/{id}/force', [TinyAutosaveController::class, 'forceDelete']);

    Route::get('/', [TinyAutosaveController::class, 'index']);
    Route::post('/', [TinyAutosaveController::class, 'store']);
    Route::get('/{id}', [TinyAutosaveController::class, 'show']);
    Route::put('/{id}', [TinyAutosaveController::class, 'update']);
    Route::delete('/{id}', [TinyAutosaveController::class, 'destroy']);

    Route::post('/{id}/duplicate', [TinyAutosaveController::class, 'duplicate']);
    Route::get('/{id}/stats', [TinyAutosaveController::class, 'stats']);
});

// ========================
// MESSAGE_AIRNOTIFIER_DEVICES RESOURCE
// ========================
Route::prefix('message-airnotifier-devices')->group(function () {
    use App\Http\Controllers\Api\V1\MessageAirnotifierDevicesController;

    Route::get('/filters', [MessageAirnotifierDevicesController::class, 'filters']);
    Route::get('/suggestions', [MessageAirnotifierDevicesController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageAirnotifierDevicesController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageAirnotifierDevicesController::class, 'importTemplate']);
    Route::post('/import', [MessageAirnotifierDevicesController::class, 'import']);
    Route::get('/export', [MessageAirnotifierDevicesController::class, 'export']);

    Route::post('/bulk-store', [MessageAirnotifierDevicesController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageAirnotifierDevicesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageAirnotifierDevicesController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageAirnotifierDevicesController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageAirnotifierDevicesController::class, 'restore']);
    Route::delete('/{id}/force', [MessageAirnotifierDevicesController::class, 'forceDelete']);

    Route::get('/', [MessageAirnotifierDevicesController::class, 'index']);
    Route::post('/', [MessageAirnotifierDevicesController::class, 'store']);
    Route::get('/{id}', [MessageAirnotifierDevicesController::class, 'show']);
    Route::put('/{id}', [MessageAirnotifierDevicesController::class, 'update']);
    Route::delete('/{id}', [MessageAirnotifierDevicesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageAirnotifierDevicesController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageAirnotifierDevicesController::class, 'stats']);
});

// ========================
// MESSAGE_POPUP RESOURCE
// ========================
Route::prefix('message-popup')->group(function () {
    use App\Http\Controllers\Api\V1\MessagePopupController;

    Route::get('/filters', [MessagePopupController::class, 'filters']);
    Route::get('/suggestions', [MessagePopupController::class, 'suggestions']);
    Route::post('/advanced-search', [MessagePopupController::class, 'advancedSearch']);

    Route::get('/import-template', [MessagePopupController::class, 'importTemplate']);
    Route::post('/import', [MessagePopupController::class, 'import']);
    Route::get('/export', [MessagePopupController::class, 'export']);

    Route::post('/bulk-store', [MessagePopupController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessagePopupController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessagePopupController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessagePopupController::class, 'trashed']);
    Route::post('/{id}/restore', [MessagePopupController::class, 'restore']);
    Route::delete('/{id}/force', [MessagePopupController::class, 'forceDelete']);

    Route::get('/', [MessagePopupController::class, 'index']);
    Route::post('/', [MessagePopupController::class, 'store']);
    Route::get('/{id}', [MessagePopupController::class, 'show']);
    Route::put('/{id}', [MessagePopupController::class, 'update']);
    Route::delete('/{id}', [MessagePopupController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessagePopupController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessagePopupController::class, 'stats']);
});

// ========================
// MNETSERVICE_ENROL_COURSES RESOURCE
// ========================
Route::prefix('mnetservice-enrol-courses')->group(function () {
    use App\Http\Controllers\Api\V1\MnetserviceEnrolCoursesController;

    Route::get('/filters', [MnetserviceEnrolCoursesController::class, 'filters']);
    Route::get('/suggestions', [MnetserviceEnrolCoursesController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetserviceEnrolCoursesController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetserviceEnrolCoursesController::class, 'importTemplate']);
    Route::post('/import', [MnetserviceEnrolCoursesController::class, 'import']);
    Route::get('/export', [MnetserviceEnrolCoursesController::class, 'export']);

    Route::post('/bulk-store', [MnetserviceEnrolCoursesController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetserviceEnrolCoursesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetserviceEnrolCoursesController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetserviceEnrolCoursesController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetserviceEnrolCoursesController::class, 'restore']);
    Route::delete('/{id}/force', [MnetserviceEnrolCoursesController::class, 'forceDelete']);

    Route::get('/', [MnetserviceEnrolCoursesController::class, 'index']);
    Route::post('/', [MnetserviceEnrolCoursesController::class, 'store']);
    Route::get('/{id}', [MnetserviceEnrolCoursesController::class, 'show']);
    Route::put('/{id}', [MnetserviceEnrolCoursesController::class, 'update']);
    Route::delete('/{id}', [MnetserviceEnrolCoursesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetserviceEnrolCoursesController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetserviceEnrolCoursesController::class, 'stats']);
});

// ========================
// ASSIGN RESOURCE
// ========================
Route::prefix('assign')->group(function () {
    use App\Http\Controllers\Api\V1\AssignController;

    Route::get('/filters', [AssignController::class, 'filters']);
    Route::get('/suggestions', [AssignController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignController::class, 'importTemplate']);
    Route::post('/import', [AssignController::class, 'import']);
    Route::get('/export', [AssignController::class, 'export']);

    Route::post('/bulk-store', [AssignController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignController::class, 'restore']);
    Route::delete('/{id}/force', [AssignController::class, 'forceDelete']);

    Route::get('/', [AssignController::class, 'index']);
    Route::post('/', [AssignController::class, 'store']);
    Route::get('/{id}', [AssignController::class, 'show']);
    Route::put('/{id}', [AssignController::class, 'update']);
    Route::delete('/{id}', [AssignController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignController::class, 'stats']);
});

// ========================
// BIGBLUEBUTTONBN RESOURCE
// ========================
Route::prefix('bigbluebuttonbn')->group(function () {
    use App\Http\Controllers\Api\V1\BigbluebuttonbnController;

    Route::get('/filters', [BigbluebuttonbnController::class, 'filters']);
    Route::get('/suggestions', [BigbluebuttonbnController::class, 'suggestions']);
    Route::post('/advanced-search', [BigbluebuttonbnController::class, 'advancedSearch']);

    Route::get('/import-template', [BigbluebuttonbnController::class, 'importTemplate']);
    Route::post('/import', [BigbluebuttonbnController::class, 'import']);
    Route::get('/export', [BigbluebuttonbnController::class, 'export']);

    Route::post('/bulk-store', [BigbluebuttonbnController::class, 'bulkStore']);
    Route::post('/bulk-update', [BigbluebuttonbnController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BigbluebuttonbnController::class, 'bulkDestroy']);

    Route::get('/trashed', [BigbluebuttonbnController::class, 'trashed']);
    Route::post('/{id}/restore', [BigbluebuttonbnController::class, 'restore']);
    Route::delete('/{id}/force', [BigbluebuttonbnController::class, 'forceDelete']);

    Route::get('/', [BigbluebuttonbnController::class, 'index']);
    Route::post('/', [BigbluebuttonbnController::class, 'store']);
    Route::get('/{id}', [BigbluebuttonbnController::class, 'show']);
    Route::put('/{id}', [BigbluebuttonbnController::class, 'update']);
    Route::delete('/{id}', [BigbluebuttonbnController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BigbluebuttonbnController::class, 'duplicate']);
    Route::get('/{id}/stats', [BigbluebuttonbnController::class, 'stats']);
});

// ========================
// BIGBLUEBUTTONBN_LOGS RESOURCE
// ========================
Route::prefix('bigbluebuttonbn-logs')->group(function () {
    use App\Http\Controllers\Api\V1\BigbluebuttonbnLogsController;

    Route::get('/filters', [BigbluebuttonbnLogsController::class, 'filters']);
    Route::get('/suggestions', [BigbluebuttonbnLogsController::class, 'suggestions']);
    Route::post('/advanced-search', [BigbluebuttonbnLogsController::class, 'advancedSearch']);

    Route::get('/import-template', [BigbluebuttonbnLogsController::class, 'importTemplate']);
    Route::post('/import', [BigbluebuttonbnLogsController::class, 'import']);
    Route::get('/export', [BigbluebuttonbnLogsController::class, 'export']);

    Route::post('/bulk-store', [BigbluebuttonbnLogsController::class, 'bulkStore']);
    Route::post('/bulk-update', [BigbluebuttonbnLogsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BigbluebuttonbnLogsController::class, 'bulkDestroy']);

    Route::get('/trashed', [BigbluebuttonbnLogsController::class, 'trashed']);
    Route::post('/{id}/restore', [BigbluebuttonbnLogsController::class, 'restore']);
    Route::delete('/{id}/force', [BigbluebuttonbnLogsController::class, 'forceDelete']);

    Route::get('/', [BigbluebuttonbnLogsController::class, 'index']);
    Route::post('/', [BigbluebuttonbnLogsController::class, 'store']);
    Route::get('/{id}', [BigbluebuttonbnLogsController::class, 'show']);
    Route::put('/{id}', [BigbluebuttonbnLogsController::class, 'update']);
    Route::delete('/{id}', [BigbluebuttonbnLogsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BigbluebuttonbnLogsController::class, 'duplicate']);
    Route::get('/{id}/stats', [BigbluebuttonbnLogsController::class, 'stats']);
});

// ========================
// BOOK_CHAPTERS RESOURCE
// ========================
Route::prefix('book-chapters')->group(function () {
    use App\Http\Controllers\Api\V1\BookChaptersController;

    Route::get('/filters', [BookChaptersController::class, 'filters']);
    Route::get('/suggestions', [BookChaptersController::class, 'suggestions']);
    Route::post('/advanced-search', [BookChaptersController::class, 'advancedSearch']);

    Route::get('/import-template', [BookChaptersController::class, 'importTemplate']);
    Route::post('/import', [BookChaptersController::class, 'import']);
    Route::get('/export', [BookChaptersController::class, 'export']);

    Route::post('/bulk-store', [BookChaptersController::class, 'bulkStore']);
    Route::post('/bulk-update', [BookChaptersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BookChaptersController::class, 'bulkDestroy']);

    Route::get('/trashed', [BookChaptersController::class, 'trashed']);
    Route::post('/{id}/restore', [BookChaptersController::class, 'restore']);
    Route::delete('/{id}/force', [BookChaptersController::class, 'forceDelete']);

    Route::get('/', [BookChaptersController::class, 'index']);
    Route::post('/', [BookChaptersController::class, 'store']);
    Route::get('/{id}', [BookChaptersController::class, 'show']);
    Route::put('/{id}', [BookChaptersController::class, 'update']);
    Route::delete('/{id}', [BookChaptersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BookChaptersController::class, 'duplicate']);
    Route::get('/{id}/stats', [BookChaptersController::class, 'stats']);
});

// ========================
// CHAT RESOURCE
// ========================
Route::prefix('chat')->group(function () {
    use App\Http\Controllers\Api\V1\ChatController;

    Route::get('/filters', [ChatController::class, 'filters']);
    Route::get('/suggestions', [ChatController::class, 'suggestions']);
    Route::post('/advanced-search', [ChatController::class, 'advancedSearch']);

    Route::get('/import-template', [ChatController::class, 'importTemplate']);
    Route::post('/import', [ChatController::class, 'import']);
    Route::get('/export', [ChatController::class, 'export']);

    Route::post('/bulk-store', [ChatController::class, 'bulkStore']);
    Route::post('/bulk-update', [ChatController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ChatController::class, 'bulkDestroy']);

    Route::get('/trashed', [ChatController::class, 'trashed']);
    Route::post('/{id}/restore', [ChatController::class, 'restore']);
    Route::delete('/{id}/force', [ChatController::class, 'forceDelete']);

    Route::get('/', [ChatController::class, 'index']);
    Route::post('/', [ChatController::class, 'store']);
    Route::get('/{id}', [ChatController::class, 'show']);
    Route::put('/{id}', [ChatController::class, 'update']);
    Route::delete('/{id}', [ChatController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ChatController::class, 'duplicate']);
    Route::get('/{id}/stats', [ChatController::class, 'stats']);
});

// ========================
// CHOICE RESOURCE
// ========================
Route::prefix('choice')->group(function () {
    use App\Http\Controllers\Api\V1\ChoiceController;

    Route::get('/filters', [ChoiceController::class, 'filters']);
    Route::get('/suggestions', [ChoiceController::class, 'suggestions']);
    Route::post('/advanced-search', [ChoiceController::class, 'advancedSearch']);

    Route::get('/import-template', [ChoiceController::class, 'importTemplate']);
    Route::post('/import', [ChoiceController::class, 'import']);
    Route::get('/export', [ChoiceController::class, 'export']);

    Route::post('/bulk-store', [ChoiceController::class, 'bulkStore']);
    Route::post('/bulk-update', [ChoiceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ChoiceController::class, 'bulkDestroy']);

    Route::get('/trashed', [ChoiceController::class, 'trashed']);
    Route::post('/{id}/restore', [ChoiceController::class, 'restore']);
    Route::delete('/{id}/force', [ChoiceController::class, 'forceDelete']);

    Route::get('/', [ChoiceController::class, 'index']);
    Route::post('/', [ChoiceController::class, 'store']);
    Route::get('/{id}', [ChoiceController::class, 'show']);
    Route::put('/{id}', [ChoiceController::class, 'update']);
    Route::delete('/{id}', [ChoiceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ChoiceController::class, 'duplicate']);
    Route::get('/{id}/stats', [ChoiceController::class, 'stats']);
});

// ========================
// DATA RESOURCE
// ========================
Route::prefix('data')->group(function () {
    use App\Http\Controllers\Api\V1\DataController;

    Route::get('/filters', [DataController::class, 'filters']);
    Route::get('/suggestions', [DataController::class, 'suggestions']);
    Route::post('/advanced-search', [DataController::class, 'advancedSearch']);

    Route::get('/import-template', [DataController::class, 'importTemplate']);
    Route::post('/import', [DataController::class, 'import']);
    Route::get('/export', [DataController::class, 'export']);

    Route::post('/bulk-store', [DataController::class, 'bulkStore']);
    Route::post('/bulk-update', [DataController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [DataController::class, 'bulkDestroy']);

    Route::get('/trashed', [DataController::class, 'trashed']);
    Route::post('/{id}/restore', [DataController::class, 'restore']);
    Route::delete('/{id}/force', [DataController::class, 'forceDelete']);

    Route::get('/', [DataController::class, 'index']);
    Route::post('/', [DataController::class, 'store']);
    Route::get('/{id}', [DataController::class, 'show']);
    Route::put('/{id}', [DataController::class, 'update']);
    Route::delete('/{id}', [DataController::class, 'destroy']);

    Route::post('/{id}/duplicate', [DataController::class, 'duplicate']);
    Route::get('/{id}/stats', [DataController::class, 'stats']);
});

// ========================
// FEEDBACK RESOURCE
// ========================
Route::prefix('feedback')->group(function () {
    use App\Http\Controllers\Api\V1\FeedbackController;

    Route::get('/filters', [FeedbackController::class, 'filters']);
    Route::get('/suggestions', [FeedbackController::class, 'suggestions']);
    Route::post('/advanced-search', [FeedbackController::class, 'advancedSearch']);

    Route::get('/import-template', [FeedbackController::class, 'importTemplate']);
    Route::post('/import', [FeedbackController::class, 'import']);
    Route::get('/export', [FeedbackController::class, 'export']);

    Route::post('/bulk-store', [FeedbackController::class, 'bulkStore']);
    Route::post('/bulk-update', [FeedbackController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FeedbackController::class, 'bulkDestroy']);

    Route::get('/trashed', [FeedbackController::class, 'trashed']);
    Route::post('/{id}/restore', [FeedbackController::class, 'restore']);
    Route::delete('/{id}/force', [FeedbackController::class, 'forceDelete']);

    Route::get('/', [FeedbackController::class, 'index']);
    Route::post('/', [FeedbackController::class, 'store']);
    Route::get('/{id}', [FeedbackController::class, 'show']);
    Route::put('/{id}', [FeedbackController::class, 'update']);
    Route::delete('/{id}', [FeedbackController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FeedbackController::class, 'duplicate']);
    Route::get('/{id}/stats', [FeedbackController::class, 'stats']);
});

// ========================
// FEEDBACK_TEMPLATE RESOURCE
// ========================
Route::prefix('feedback-template')->group(function () {
    use App\Http\Controllers\Api\V1\FeedbackTemplateController;

    Route::get('/filters', [FeedbackTemplateController::class, 'filters']);
    Route::get('/suggestions', [FeedbackTemplateController::class, 'suggestions']);
    Route::post('/advanced-search', [FeedbackTemplateController::class, 'advancedSearch']);

    Route::get('/import-template', [FeedbackTemplateController::class, 'importTemplate']);
    Route::post('/import', [FeedbackTemplateController::class, 'import']);
    Route::get('/export', [FeedbackTemplateController::class, 'export']);

    Route::post('/bulk-store', [FeedbackTemplateController::class, 'bulkStore']);
    Route::post('/bulk-update', [FeedbackTemplateController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FeedbackTemplateController::class, 'bulkDestroy']);

    Route::get('/trashed', [FeedbackTemplateController::class, 'trashed']);
    Route::post('/{id}/restore', [FeedbackTemplateController::class, 'restore']);
    Route::delete('/{id}/force', [FeedbackTemplateController::class, 'forceDelete']);

    Route::get('/', [FeedbackTemplateController::class, 'index']);
    Route::post('/', [FeedbackTemplateController::class, 'store']);
    Route::get('/{id}', [FeedbackTemplateController::class, 'show']);
    Route::put('/{id}', [FeedbackTemplateController::class, 'update']);
    Route::delete('/{id}', [FeedbackTemplateController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FeedbackTemplateController::class, 'duplicate']);
    Route::get('/{id}/stats', [FeedbackTemplateController::class, 'stats']);
});

// ========================
// FOLDER RESOURCE
// ========================
Route::prefix('folder')->group(function () {
    use App\Http\Controllers\Api\V1\FolderController;

    Route::get('/filters', [FolderController::class, 'filters']);
    Route::get('/suggestions', [FolderController::class, 'suggestions']);
    Route::post('/advanced-search', [FolderController::class, 'advancedSearch']);

    Route::get('/import-template', [FolderController::class, 'importTemplate']);
    Route::post('/import', [FolderController::class, 'import']);
    Route::get('/export', [FolderController::class, 'export']);

    Route::post('/bulk-store', [FolderController::class, 'bulkStore']);
    Route::post('/bulk-update', [FolderController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FolderController::class, 'bulkDestroy']);

    Route::get('/trashed', [FolderController::class, 'trashed']);
    Route::post('/{id}/restore', [FolderController::class, 'restore']);
    Route::delete('/{id}/force', [FolderController::class, 'forceDelete']);

    Route::get('/', [FolderController::class, 'index']);
    Route::post('/', [FolderController::class, 'store']);
    Route::get('/{id}', [FolderController::class, 'show']);
    Route::put('/{id}', [FolderController::class, 'update']);
    Route::delete('/{id}', [FolderController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FolderController::class, 'duplicate']);
    Route::get('/{id}/stats', [FolderController::class, 'stats']);
});

// ========================
// FORUM RESOURCE
// ========================
Route::prefix('forum')->group(function () {
    use App\Http\Controllers\Api\V1\ForumController;

    Route::get('/filters', [ForumController::class, 'filters']);
    Route::get('/suggestions', [ForumController::class, 'suggestions']);
    Route::post('/advanced-search', [ForumController::class, 'advancedSearch']);

    Route::get('/import-template', [ForumController::class, 'importTemplate']);
    Route::post('/import', [ForumController::class, 'import']);
    Route::get('/export', [ForumController::class, 'export']);

    Route::post('/bulk-store', [ForumController::class, 'bulkStore']);
    Route::post('/bulk-update', [ForumController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ForumController::class, 'bulkDestroy']);

    Route::get('/trashed', [ForumController::class, 'trashed']);
    Route::post('/{id}/restore', [ForumController::class, 'restore']);
    Route::delete('/{id}/force', [ForumController::class, 'forceDelete']);

    Route::get('/', [ForumController::class, 'index']);
    Route::post('/', [ForumController::class, 'store']);
    Route::get('/{id}', [ForumController::class, 'show']);
    Route::put('/{id}', [ForumController::class, 'update']);
    Route::delete('/{id}', [ForumController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ForumController::class, 'duplicate']);
    Route::get('/{id}/stats', [ForumController::class, 'stats']);
});

// ========================
// FORUM_READ RESOURCE
// ========================
Route::prefix('forum-read')->group(function () {
    use App\Http\Controllers\Api\V1\ForumReadController;

    Route::get('/filters', [ForumReadController::class, 'filters']);
    Route::get('/suggestions', [ForumReadController::class, 'suggestions']);
    Route::post('/advanced-search', [ForumReadController::class, 'advancedSearch']);

    Route::get('/import-template', [ForumReadController::class, 'importTemplate']);
    Route::post('/import', [ForumReadController::class, 'import']);
    Route::get('/export', [ForumReadController::class, 'export']);

    Route::post('/bulk-store', [ForumReadController::class, 'bulkStore']);
    Route::post('/bulk-update', [ForumReadController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ForumReadController::class, 'bulkDestroy']);

    Route::get('/trashed', [ForumReadController::class, 'trashed']);
    Route::post('/{id}/restore', [ForumReadController::class, 'restore']);
    Route::delete('/{id}/force', [ForumReadController::class, 'forceDelete']);

    Route::get('/', [ForumReadController::class, 'index']);
    Route::post('/', [ForumReadController::class, 'store']);
    Route::get('/{id}', [ForumReadController::class, 'show']);
    Route::put('/{id}', [ForumReadController::class, 'update']);
    Route::delete('/{id}', [ForumReadController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ForumReadController::class, 'duplicate']);
    Route::get('/{id}/stats', [ForumReadController::class, 'stats']);
});

// ========================
// FORUM_TRACK_PREFS RESOURCE
// ========================
Route::prefix('forum-track-prefs')->group(function () {
    use App\Http\Controllers\Api\V1\ForumTrackPrefsController;

    Route::get('/filters', [ForumTrackPrefsController::class, 'filters']);
    Route::get('/suggestions', [ForumTrackPrefsController::class, 'suggestions']);
    Route::post('/advanced-search', [ForumTrackPrefsController::class, 'advancedSearch']);

    Route::get('/import-template', [ForumTrackPrefsController::class, 'importTemplate']);
    Route::post('/import', [ForumTrackPrefsController::class, 'import']);
    Route::get('/export', [ForumTrackPrefsController::class, 'export']);

    Route::post('/bulk-store', [ForumTrackPrefsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ForumTrackPrefsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ForumTrackPrefsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ForumTrackPrefsController::class, 'trashed']);
    Route::post('/{id}/restore', [ForumTrackPrefsController::class, 'restore']);
    Route::delete('/{id}/force', [ForumTrackPrefsController::class, 'forceDelete']);

    Route::get('/', [ForumTrackPrefsController::class, 'index']);
    Route::post('/', [ForumTrackPrefsController::class, 'store']);
    Route::get('/{id}', [ForumTrackPrefsController::class, 'show']);
    Route::put('/{id}', [ForumTrackPrefsController::class, 'update']);
    Route::delete('/{id}', [ForumTrackPrefsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ForumTrackPrefsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ForumTrackPrefsController::class, 'stats']);
});

// ========================
// GLOSSARY RESOURCE
// ========================
Route::prefix('glossary')->group(function () {
    use App\Http\Controllers\Api\V1\GlossaryController;

    Route::get('/filters', [GlossaryController::class, 'filters']);
    Route::get('/suggestions', [GlossaryController::class, 'suggestions']);
    Route::post('/advanced-search', [GlossaryController::class, 'advancedSearch']);

    Route::get('/import-template', [GlossaryController::class, 'importTemplate']);
    Route::post('/import', [GlossaryController::class, 'import']);
    Route::get('/export', [GlossaryController::class, 'export']);

    Route::post('/bulk-store', [GlossaryController::class, 'bulkStore']);
    Route::post('/bulk-update', [GlossaryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GlossaryController::class, 'bulkDestroy']);

    Route::get('/trashed', [GlossaryController::class, 'trashed']);
    Route::post('/{id}/restore', [GlossaryController::class, 'restore']);
    Route::delete('/{id}/force', [GlossaryController::class, 'forceDelete']);

    Route::get('/', [GlossaryController::class, 'index']);
    Route::post('/', [GlossaryController::class, 'store']);
    Route::get('/{id}', [GlossaryController::class, 'show']);
    Route::put('/{id}', [GlossaryController::class, 'update']);
    Route::delete('/{id}', [GlossaryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GlossaryController::class, 'duplicate']);
    Route::get('/{id}/stats', [GlossaryController::class, 'stats']);
});

// ========================
// GLOSSARY_FORMATS RESOURCE
// ========================
Route::prefix('glossary-formats')->group(function () {
    use App\Http\Controllers\Api\V1\GlossaryFormatsController;

    Route::get('/filters', [GlossaryFormatsController::class, 'filters']);
    Route::get('/suggestions', [GlossaryFormatsController::class, 'suggestions']);
    Route::post('/advanced-search', [GlossaryFormatsController::class, 'advancedSearch']);

    Route::get('/import-template', [GlossaryFormatsController::class, 'importTemplate']);
    Route::post('/import', [GlossaryFormatsController::class, 'import']);
    Route::get('/export', [GlossaryFormatsController::class, 'export']);

    Route::post('/bulk-store', [GlossaryFormatsController::class, 'bulkStore']);
    Route::post('/bulk-update', [GlossaryFormatsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GlossaryFormatsController::class, 'bulkDestroy']);

    Route::get('/trashed', [GlossaryFormatsController::class, 'trashed']);
    Route::post('/{id}/restore', [GlossaryFormatsController::class, 'restore']);
    Route::delete('/{id}/force', [GlossaryFormatsController::class, 'forceDelete']);

    Route::get('/', [GlossaryFormatsController::class, 'index']);
    Route::post('/', [GlossaryFormatsController::class, 'store']);
    Route::get('/{id}', [GlossaryFormatsController::class, 'show']);
    Route::put('/{id}', [GlossaryFormatsController::class, 'update']);
    Route::delete('/{id}', [GlossaryFormatsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GlossaryFormatsController::class, 'duplicate']);
    Route::get('/{id}/stats', [GlossaryFormatsController::class, 'stats']);
});

// ========================
// IMSCP RESOURCE
// ========================
Route::prefix('imscp')->group(function () {
    use App\Http\Controllers\Api\V1\ImscpController;

    Route::get('/filters', [ImscpController::class, 'filters']);
    Route::get('/suggestions', [ImscpController::class, 'suggestions']);
    Route::post('/advanced-search', [ImscpController::class, 'advancedSearch']);

    Route::get('/import-template', [ImscpController::class, 'importTemplate']);
    Route::post('/import', [ImscpController::class, 'import']);
    Route::get('/export', [ImscpController::class, 'export']);

    Route::post('/bulk-store', [ImscpController::class, 'bulkStore']);
    Route::post('/bulk-update', [ImscpController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ImscpController::class, 'bulkDestroy']);

    Route::get('/trashed', [ImscpController::class, 'trashed']);
    Route::post('/{id}/restore', [ImscpController::class, 'restore']);
    Route::delete('/{id}/force', [ImscpController::class, 'forceDelete']);

    Route::get('/', [ImscpController::class, 'index']);
    Route::post('/', [ImscpController::class, 'store']);
    Route::get('/{id}', [ImscpController::class, 'show']);
    Route::put('/{id}', [ImscpController::class, 'update']);
    Route::delete('/{id}', [ImscpController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ImscpController::class, 'duplicate']);
    Route::get('/{id}/stats', [ImscpController::class, 'stats']);
});

// ========================
// LABEL RESOURCE
// ========================
Route::prefix('label')->group(function () {
    use App\Http\Controllers\Api\V1\LabelController;

    Route::get('/filters', [LabelController::class, 'filters']);
    Route::get('/suggestions', [LabelController::class, 'suggestions']);
    Route::post('/advanced-search', [LabelController::class, 'advancedSearch']);

    Route::get('/import-template', [LabelController::class, 'importTemplate']);
    Route::post('/import', [LabelController::class, 'import']);
    Route::get('/export', [LabelController::class, 'export']);

    Route::post('/bulk-store', [LabelController::class, 'bulkStore']);
    Route::post('/bulk-update', [LabelController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LabelController::class, 'bulkDestroy']);

    Route::get('/trashed', [LabelController::class, 'trashed']);
    Route::post('/{id}/restore', [LabelController::class, 'restore']);
    Route::delete('/{id}/force', [LabelController::class, 'forceDelete']);

    Route::get('/', [LabelController::class, 'index']);
    Route::post('/', [LabelController::class, 'store']);
    Route::get('/{id}', [LabelController::class, 'show']);
    Route::put('/{id}', [LabelController::class, 'update']);
    Route::delete('/{id}', [LabelController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LabelController::class, 'duplicate']);
    Route::get('/{id}/stats', [LabelController::class, 'stats']);
});

// ========================
// LESSON RESOURCE
// ========================
Route::prefix('lesson')->group(function () {
    use App\Http\Controllers\Api\V1\LessonController;

    Route::get('/filters', [LessonController::class, 'filters']);
    Route::get('/suggestions', [LessonController::class, 'suggestions']);
    Route::post('/advanced-search', [LessonController::class, 'advancedSearch']);

    Route::get('/import-template', [LessonController::class, 'importTemplate']);
    Route::post('/import', [LessonController::class, 'import']);
    Route::get('/export', [LessonController::class, 'export']);

    Route::post('/bulk-store', [LessonController::class, 'bulkStore']);
    Route::post('/bulk-update', [LessonController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LessonController::class, 'bulkDestroy']);

    Route::get('/trashed', [LessonController::class, 'trashed']);
    Route::post('/{id}/restore', [LessonController::class, 'restore']);
    Route::delete('/{id}/force', [LessonController::class, 'forceDelete']);

    Route::get('/', [LessonController::class, 'index']);
    Route::post('/', [LessonController::class, 'store']);
    Route::get('/{id}', [LessonController::class, 'show']);
    Route::put('/{id}', [LessonController::class, 'update']);
    Route::delete('/{id}', [LessonController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LessonController::class, 'duplicate']);
    Route::get('/{id}/stats', [LessonController::class, 'stats']);
});

// ========================
// LTI RESOURCE
// ========================
Route::prefix('lti')->group(function () {
    use App\Http\Controllers\Api\V1\LtiController;

    Route::get('/filters', [LtiController::class, 'filters']);
    Route::get('/suggestions', [LtiController::class, 'suggestions']);
    Route::post('/advanced-search', [LtiController::class, 'advancedSearch']);

    Route::get('/import-template', [LtiController::class, 'importTemplate']);
    Route::post('/import', [LtiController::class, 'import']);
    Route::get('/export', [LtiController::class, 'export']);

    Route::post('/bulk-store', [LtiController::class, 'bulkStore']);
    Route::post('/bulk-update', [LtiController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LtiController::class, 'bulkDestroy']);

    Route::get('/trashed', [LtiController::class, 'trashed']);
    Route::post('/{id}/restore', [LtiController::class, 'restore']);
    Route::delete('/{id}/force', [LtiController::class, 'forceDelete']);

    Route::get('/', [LtiController::class, 'index']);
    Route::post('/', [LtiController::class, 'store']);
    Route::get('/{id}', [LtiController::class, 'show']);
    Route::put('/{id}', [LtiController::class, 'update']);
    Route::delete('/{id}', [LtiController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LtiController::class, 'duplicate']);
    Route::get('/{id}/stats', [LtiController::class, 'stats']);
});

// ========================
// LTI_TOOL_PROXIES RESOURCE
// ========================
Route::prefix('lti-tool-proxies')->group(function () {
    use App\Http\Controllers\Api\V1\LtiToolProxiesController;

    Route::get('/filters', [LtiToolProxiesController::class, 'filters']);
    Route::get('/suggestions', [LtiToolProxiesController::class, 'suggestions']);
    Route::post('/advanced-search', [LtiToolProxiesController::class, 'advancedSearch']);

    Route::get('/import-template', [LtiToolProxiesController::class, 'importTemplate']);
    Route::post('/import', [LtiToolProxiesController::class, 'import']);
    Route::get('/export', [LtiToolProxiesController::class, 'export']);

    Route::post('/bulk-store', [LtiToolProxiesController::class, 'bulkStore']);
    Route::post('/bulk-update', [LtiToolProxiesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LtiToolProxiesController::class, 'bulkDestroy']);

    Route::get('/trashed', [LtiToolProxiesController::class, 'trashed']);
    Route::post('/{id}/restore', [LtiToolProxiesController::class, 'restore']);
    Route::delete('/{id}/force', [LtiToolProxiesController::class, 'forceDelete']);

    Route::get('/', [LtiToolProxiesController::class, 'index']);
    Route::post('/', [LtiToolProxiesController::class, 'store']);
    Route::get('/{id}', [LtiToolProxiesController::class, 'show']);
    Route::put('/{id}', [LtiToolProxiesController::class, 'update']);
    Route::delete('/{id}', [LtiToolProxiesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LtiToolProxiesController::class, 'duplicate']);
    Route::get('/{id}/stats', [LtiToolProxiesController::class, 'stats']);
});

// ========================
// LTI_TYPES RESOURCE
// ========================
Route::prefix('lti-types')->group(function () {
    use App\Http\Controllers\Api\V1\LtiTypesController;

    Route::get('/filters', [LtiTypesController::class, 'filters']);
    Route::get('/suggestions', [LtiTypesController::class, 'suggestions']);
    Route::post('/advanced-search', [LtiTypesController::class, 'advancedSearch']);

    Route::get('/import-template', [LtiTypesController::class, 'importTemplate']);
    Route::post('/import', [LtiTypesController::class, 'import']);
    Route::get('/export', [LtiTypesController::class, 'export']);

    Route::post('/bulk-store', [LtiTypesController::class, 'bulkStore']);
    Route::post('/bulk-update', [LtiTypesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LtiTypesController::class, 'bulkDestroy']);

    Route::get('/trashed', [LtiTypesController::class, 'trashed']);
    Route::post('/{id}/restore', [LtiTypesController::class, 'restore']);
    Route::delete('/{id}/force', [LtiTypesController::class, 'forceDelete']);

    Route::get('/', [LtiTypesController::class, 'index']);
    Route::post('/', [LtiTypesController::class, 'store']);
    Route::get('/{id}', [LtiTypesController::class, 'show']);
    Route::put('/{id}', [LtiTypesController::class, 'update']);
    Route::delete('/{id}', [LtiTypesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LtiTypesController::class, 'duplicate']);
    Route::get('/{id}/stats', [LtiTypesController::class, 'stats']);
});

// ========================
// LTI_TYPES_CONFIG RESOURCE
// ========================
Route::prefix('lti-types-config')->group(function () {
    use App\Http\Controllers\Api\V1\LtiTypesConfigController;

    Route::get('/filters', [LtiTypesConfigController::class, 'filters']);
    Route::get('/suggestions', [LtiTypesConfigController::class, 'suggestions']);
    Route::post('/advanced-search', [LtiTypesConfigController::class, 'advancedSearch']);

    Route::get('/import-template', [LtiTypesConfigController::class, 'importTemplate']);
    Route::post('/import', [LtiTypesConfigController::class, 'import']);
    Route::get('/export', [LtiTypesConfigController::class, 'export']);

    Route::post('/bulk-store', [LtiTypesConfigController::class, 'bulkStore']);
    Route::post('/bulk-update', [LtiTypesConfigController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LtiTypesConfigController::class, 'bulkDestroy']);

    Route::get('/trashed', [LtiTypesConfigController::class, 'trashed']);
    Route::post('/{id}/restore', [LtiTypesConfigController::class, 'restore']);
    Route::delete('/{id}/force', [LtiTypesConfigController::class, 'forceDelete']);

    Route::get('/', [LtiTypesConfigController::class, 'index']);
    Route::post('/', [LtiTypesConfigController::class, 'store']);
    Route::get('/{id}', [LtiTypesConfigController::class, 'show']);
    Route::put('/{id}', [LtiTypesConfigController::class, 'update']);
    Route::delete('/{id}', [LtiTypesConfigController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LtiTypesConfigController::class, 'duplicate']);
    Route::get('/{id}/stats', [LtiTypesConfigController::class, 'stats']);
});

// ========================
// LTI_SUBMISSION RESOURCE
// ========================
Route::prefix('lti-submission')->group(function () {
    use App\Http\Controllers\Api\V1\LtiSubmissionController;

    Route::get('/filters', [LtiSubmissionController::class, 'filters']);
    Route::get('/suggestions', [LtiSubmissionController::class, 'suggestions']);
    Route::post('/advanced-search', [LtiSubmissionController::class, 'advancedSearch']);

    Route::get('/import-template', [LtiSubmissionController::class, 'importTemplate']);
    Route::post('/import', [LtiSubmissionController::class, 'import']);
    Route::get('/export', [LtiSubmissionController::class, 'export']);

    Route::post('/bulk-store', [LtiSubmissionController::class, 'bulkStore']);
    Route::post('/bulk-update', [LtiSubmissionController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LtiSubmissionController::class, 'bulkDestroy']);

    Route::get('/trashed', [LtiSubmissionController::class, 'trashed']);
    Route::post('/{id}/restore', [LtiSubmissionController::class, 'restore']);
    Route::delete('/{id}/force', [LtiSubmissionController::class, 'forceDelete']);

    Route::get('/', [LtiSubmissionController::class, 'index']);
    Route::post('/', [LtiSubmissionController::class, 'store']);
    Route::get('/{id}', [LtiSubmissionController::class, 'show']);
    Route::put('/{id}', [LtiSubmissionController::class, 'update']);
    Route::delete('/{id}', [LtiSubmissionController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LtiSubmissionController::class, 'duplicate']);
    Route::get('/{id}/stats', [LtiSubmissionController::class, 'stats']);
});

// ========================
// LTI_COURSEVISIBLE RESOURCE
// ========================
Route::prefix('lti-coursevisible')->group(function () {
    use App\Http\Controllers\Api\V1\LtiCoursevisibleController;

    Route::get('/filters', [LtiCoursevisibleController::class, 'filters']);
    Route::get('/suggestions', [LtiCoursevisibleController::class, 'suggestions']);
    Route::post('/advanced-search', [LtiCoursevisibleController::class, 'advancedSearch']);

    Route::get('/import-template', [LtiCoursevisibleController::class, 'importTemplate']);
    Route::post('/import', [LtiCoursevisibleController::class, 'import']);
    Route::get('/export', [LtiCoursevisibleController::class, 'export']);

    Route::post('/bulk-store', [LtiCoursevisibleController::class, 'bulkStore']);
    Route::post('/bulk-update', [LtiCoursevisibleController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LtiCoursevisibleController::class, 'bulkDestroy']);

    Route::get('/trashed', [LtiCoursevisibleController::class, 'trashed']);
    Route::post('/{id}/restore', [LtiCoursevisibleController::class, 'restore']);
    Route::delete('/{id}/force', [LtiCoursevisibleController::class, 'forceDelete']);

    Route::get('/', [LtiCoursevisibleController::class, 'index']);
    Route::post('/', [LtiCoursevisibleController::class, 'store']);
    Route::get('/{id}', [LtiCoursevisibleController::class, 'show']);
    Route::put('/{id}', [LtiCoursevisibleController::class, 'update']);
    Route::delete('/{id}', [LtiCoursevisibleController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LtiCoursevisibleController::class, 'duplicate']);
    Route::get('/{id}/stats', [LtiCoursevisibleController::class, 'stats']);
});

// ========================
// PAGE RESOURCE
// ========================
Route::prefix('page')->group(function () {
    use App\Http\Controllers\Api\V1\PageController;

    Route::get('/filters', [PageController::class, 'filters']);
    Route::get('/suggestions', [PageController::class, 'suggestions']);
    Route::post('/advanced-search', [PageController::class, 'advancedSearch']);

    Route::get('/import-template', [PageController::class, 'importTemplate']);
    Route::post('/import', [PageController::class, 'import']);
    Route::get('/export', [PageController::class, 'export']);

    Route::post('/bulk-store', [PageController::class, 'bulkStore']);
    Route::post('/bulk-update', [PageController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PageController::class, 'bulkDestroy']);

    Route::get('/trashed', [PageController::class, 'trashed']);
    Route::post('/{id}/restore', [PageController::class, 'restore']);
    Route::delete('/{id}/force', [PageController::class, 'forceDelete']);

    Route::get('/', [PageController::class, 'index']);
    Route::post('/', [PageController::class, 'store']);
    Route::get('/{id}', [PageController::class, 'show']);
    Route::put('/{id}', [PageController::class, 'update']);
    Route::delete('/{id}', [PageController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PageController::class, 'duplicate']);
    Route::get('/{id}/stats', [PageController::class, 'stats']);
});

// ========================
// QUIZ RESOURCE
// ========================
Route::prefix('quiz')->group(function () {
    use App\Http\Controllers\Api\V1\QuizController;

    Route::get('/filters', [QuizController::class, 'filters']);
    Route::get('/suggestions', [QuizController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizController::class, 'importTemplate']);
    Route::post('/import', [QuizController::class, 'import']);
    Route::get('/export', [QuizController::class, 'export']);

    Route::post('/bulk-store', [QuizController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizController::class, 'restore']);
    Route::delete('/{id}/force', [QuizController::class, 'forceDelete']);

    Route::get('/', [QuizController::class, 'index']);
    Route::post('/', [QuizController::class, 'store']);
    Route::get('/{id}', [QuizController::class, 'show']);
    Route::put('/{id}', [QuizController::class, 'update']);
    Route::delete('/{id}', [QuizController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizController::class, 'stats']);
});

// ========================
// QUIZ_REPORTS RESOURCE
// ========================
Route::prefix('quiz-reports')->group(function () {
    use App\Http\Controllers\Api\V1\QuizReportsController;

    Route::get('/filters', [QuizReportsController::class, 'filters']);
    Route::get('/suggestions', [QuizReportsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizReportsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizReportsController::class, 'importTemplate']);
    Route::post('/import', [QuizReportsController::class, 'import']);
    Route::get('/export', [QuizReportsController::class, 'export']);

    Route::post('/bulk-store', [QuizReportsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizReportsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizReportsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizReportsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizReportsController::class, 'restore']);
    Route::delete('/{id}/force', [QuizReportsController::class, 'forceDelete']);

    Route::get('/', [QuizReportsController::class, 'index']);
    Route::post('/', [QuizReportsController::class, 'store']);
    Route::get('/{id}', [QuizReportsController::class, 'show']);
    Route::put('/{id}', [QuizReportsController::class, 'update']);
    Route::delete('/{id}', [QuizReportsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizReportsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizReportsController::class, 'stats']);
});

// ========================
// QUIZ_STATISTICS RESOURCE
// ========================
Route::prefix('quiz-statistics')->group(function () {
    use App\Http\Controllers\Api\V1\QuizStatisticsController;

    Route::get('/filters', [QuizStatisticsController::class, 'filters']);
    Route::get('/suggestions', [QuizStatisticsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizStatisticsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizStatisticsController::class, 'importTemplate']);
    Route::post('/import', [QuizStatisticsController::class, 'import']);
    Route::get('/export', [QuizStatisticsController::class, 'export']);

    Route::post('/bulk-store', [QuizStatisticsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizStatisticsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizStatisticsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizStatisticsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizStatisticsController::class, 'restore']);
    Route::delete('/{id}/force', [QuizStatisticsController::class, 'forceDelete']);

    Route::get('/', [QuizStatisticsController::class, 'index']);
    Route::post('/', [QuizStatisticsController::class, 'store']);
    Route::get('/{id}', [QuizStatisticsController::class, 'show']);
    Route::put('/{id}', [QuizStatisticsController::class, 'update']);
    Route::delete('/{id}', [QuizStatisticsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizStatisticsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizStatisticsController::class, 'stats']);
});

// ========================
// RESOURCE RESOURCE
// ========================
Route::prefix('resource')->group(function () {
    use App\Http\Controllers\Api\V1\ResourceController;

    Route::get('/filters', [ResourceController::class, 'filters']);
    Route::get('/suggestions', [ResourceController::class, 'suggestions']);
    Route::post('/advanced-search', [ResourceController::class, 'advancedSearch']);

    Route::get('/import-template', [ResourceController::class, 'importTemplate']);
    Route::post('/import', [ResourceController::class, 'import']);
    Route::get('/export', [ResourceController::class, 'export']);

    Route::post('/bulk-store', [ResourceController::class, 'bulkStore']);
    Route::post('/bulk-update', [ResourceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ResourceController::class, 'bulkDestroy']);

    Route::get('/trashed', [ResourceController::class, 'trashed']);
    Route::post('/{id}/restore', [ResourceController::class, 'restore']);
    Route::delete('/{id}/force', [ResourceController::class, 'forceDelete']);

    Route::get('/', [ResourceController::class, 'index']);
    Route::post('/', [ResourceController::class, 'store']);
    Route::get('/{id}', [ResourceController::class, 'show']);
    Route::put('/{id}', [ResourceController::class, 'update']);
    Route::delete('/{id}', [ResourceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ResourceController::class, 'duplicate']);
    Route::get('/{id}/stats', [ResourceController::class, 'stats']);
});

// ========================
// RESOURCE_OLD RESOURCE
// ========================
Route::prefix('resource-old')->group(function () {
    use App\Http\Controllers\Api\V1\ResourceOldController;

    Route::get('/filters', [ResourceOldController::class, 'filters']);
    Route::get('/suggestions', [ResourceOldController::class, 'suggestions']);
    Route::post('/advanced-search', [ResourceOldController::class, 'advancedSearch']);

    Route::get('/import-template', [ResourceOldController::class, 'importTemplate']);
    Route::post('/import', [ResourceOldController::class, 'import']);
    Route::get('/export', [ResourceOldController::class, 'export']);

    Route::post('/bulk-store', [ResourceOldController::class, 'bulkStore']);
    Route::post('/bulk-update', [ResourceOldController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ResourceOldController::class, 'bulkDestroy']);

    Route::get('/trashed', [ResourceOldController::class, 'trashed']);
    Route::post('/{id}/restore', [ResourceOldController::class, 'restore']);
    Route::delete('/{id}/force', [ResourceOldController::class, 'forceDelete']);

    Route::get('/', [ResourceOldController::class, 'index']);
    Route::post('/', [ResourceOldController::class, 'store']);
    Route::get('/{id}', [ResourceOldController::class, 'show']);
    Route::put('/{id}', [ResourceOldController::class, 'update']);
    Route::delete('/{id}', [ResourceOldController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ResourceOldController::class, 'duplicate']);
    Route::get('/{id}/stats', [ResourceOldController::class, 'stats']);
});

// ========================
// SCORM RESOURCE
// ========================
Route::prefix('scorm')->group(function () {
    use App\Http\Controllers\Api\V1\ScormController;

    Route::get('/filters', [ScormController::class, 'filters']);
    Route::get('/suggestions', [ScormController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormController::class, 'importTemplate']);
    Route::post('/import', [ScormController::class, 'import']);
    Route::get('/export', [ScormController::class, 'export']);

    Route::post('/bulk-store', [ScormController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormController::class, 'restore']);
    Route::delete('/{id}/force', [ScormController::class, 'forceDelete']);

    Route::get('/', [ScormController::class, 'index']);
    Route::post('/', [ScormController::class, 'store']);
    Route::get('/{id}', [ScormController::class, 'show']);
    Route::put('/{id}', [ScormController::class, 'update']);
    Route::delete('/{id}', [ScormController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormController::class, 'stats']);
});

// ========================
// SCORM_ELEMENT RESOURCE
// ========================
Route::prefix('scorm-element')->group(function () {
    use App\Http\Controllers\Api\V1\ScormElementController;

    Route::get('/filters', [ScormElementController::class, 'filters']);
    Route::get('/suggestions', [ScormElementController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormElementController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormElementController::class, 'importTemplate']);
    Route::post('/import', [ScormElementController::class, 'import']);
    Route::get('/export', [ScormElementController::class, 'export']);

    Route::post('/bulk-store', [ScormElementController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormElementController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormElementController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormElementController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormElementController::class, 'restore']);
    Route::delete('/{id}/force', [ScormElementController::class, 'forceDelete']);

    Route::get('/', [ScormElementController::class, 'index']);
    Route::post('/', [ScormElementController::class, 'store']);
    Route::get('/{id}', [ScormElementController::class, 'show']);
    Route::put('/{id}', [ScormElementController::class, 'update']);
    Route::delete('/{id}', [ScormElementController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormElementController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormElementController::class, 'stats']);
});

// ========================
// SURVEY RESOURCE
// ========================
Route::prefix('survey')->group(function () {
    use App\Http\Controllers\Api\V1\SurveyController;

    Route::get('/filters', [SurveyController::class, 'filters']);
    Route::get('/suggestions', [SurveyController::class, 'suggestions']);
    Route::post('/advanced-search', [SurveyController::class, 'advancedSearch']);

    Route::get('/import-template', [SurveyController::class, 'importTemplate']);
    Route::post('/import', [SurveyController::class, 'import']);
    Route::get('/export', [SurveyController::class, 'export']);

    Route::post('/bulk-store', [SurveyController::class, 'bulkStore']);
    Route::post('/bulk-update', [SurveyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [SurveyController::class, 'bulkDestroy']);

    Route::get('/trashed', [SurveyController::class, 'trashed']);
    Route::post('/{id}/restore', [SurveyController::class, 'restore']);
    Route::delete('/{id}/force', [SurveyController::class, 'forceDelete']);

    Route::get('/', [SurveyController::class, 'index']);
    Route::post('/', [SurveyController::class, 'store']);
    Route::get('/{id}', [SurveyController::class, 'show']);
    Route::put('/{id}', [SurveyController::class, 'update']);
    Route::delete('/{id}', [SurveyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [SurveyController::class, 'duplicate']);
    Route::get('/{id}/stats', [SurveyController::class, 'stats']);
});

// ========================
// SURVEY_QUESTIONS RESOURCE
// ========================
Route::prefix('survey-questions')->group(function () {
    use App\Http\Controllers\Api\V1\SurveyQuestionsController;

    Route::get('/filters', [SurveyQuestionsController::class, 'filters']);
    Route::get('/suggestions', [SurveyQuestionsController::class, 'suggestions']);
    Route::post('/advanced-search', [SurveyQuestionsController::class, 'advancedSearch']);

    Route::get('/import-template', [SurveyQuestionsController::class, 'importTemplate']);
    Route::post('/import', [SurveyQuestionsController::class, 'import']);
    Route::get('/export', [SurveyQuestionsController::class, 'export']);

    Route::post('/bulk-store', [SurveyQuestionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [SurveyQuestionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [SurveyQuestionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [SurveyQuestionsController::class, 'trashed']);
    Route::post('/{id}/restore', [SurveyQuestionsController::class, 'restore']);
    Route::delete('/{id}/force', [SurveyQuestionsController::class, 'forceDelete']);

    Route::get('/', [SurveyQuestionsController::class, 'index']);
    Route::post('/', [SurveyQuestionsController::class, 'store']);
    Route::get('/{id}', [SurveyQuestionsController::class, 'show']);
    Route::put('/{id}', [SurveyQuestionsController::class, 'update']);
    Route::delete('/{id}', [SurveyQuestionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [SurveyQuestionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [SurveyQuestionsController::class, 'stats']);
});

// ========================
// URL RESOURCE
// ========================
Route::prefix('url')->group(function () {
    use App\Http\Controllers\Api\V1\UrlController;

    Route::get('/filters', [UrlController::class, 'filters']);
    Route::get('/suggestions', [UrlController::class, 'suggestions']);
    Route::post('/advanced-search', [UrlController::class, 'advancedSearch']);

    Route::get('/import-template', [UrlController::class, 'importTemplate']);
    Route::post('/import', [UrlController::class, 'import']);
    Route::get('/export', [UrlController::class, 'export']);

    Route::post('/bulk-store', [UrlController::class, 'bulkStore']);
    Route::post('/bulk-update', [UrlController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UrlController::class, 'bulkDestroy']);

    Route::get('/trashed', [UrlController::class, 'trashed']);
    Route::post('/{id}/restore', [UrlController::class, 'restore']);
    Route::delete('/{id}/force', [UrlController::class, 'forceDelete']);

    Route::get('/', [UrlController::class, 'index']);
    Route::post('/', [UrlController::class, 'store']);
    Route::get('/{id}', [UrlController::class, 'show']);
    Route::put('/{id}', [UrlController::class, 'update']);
    Route::delete('/{id}', [UrlController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UrlController::class, 'duplicate']);
    Route::get('/{id}/stats', [UrlController::class, 'stats']);
});

// ========================
// WIKI RESOURCE
// ========================
Route::prefix('wiki')->group(function () {
    use App\Http\Controllers\Api\V1\WikiController;

    Route::get('/filters', [WikiController::class, 'filters']);
    Route::get('/suggestions', [WikiController::class, 'suggestions']);
    Route::post('/advanced-search', [WikiController::class, 'advancedSearch']);

    Route::get('/import-template', [WikiController::class, 'importTemplate']);
    Route::post('/import', [WikiController::class, 'import']);
    Route::get('/export', [WikiController::class, 'export']);

    Route::post('/bulk-store', [WikiController::class, 'bulkStore']);
    Route::post('/bulk-update', [WikiController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WikiController::class, 'bulkDestroy']);

    Route::get('/trashed', [WikiController::class, 'trashed']);
    Route::post('/{id}/restore', [WikiController::class, 'restore']);
    Route::delete('/{id}/force', [WikiController::class, 'forceDelete']);

    Route::get('/', [WikiController::class, 'index']);
    Route::post('/', [WikiController::class, 'store']);
    Route::get('/{id}', [WikiController::class, 'show']);
    Route::put('/{id}', [WikiController::class, 'update']);
    Route::delete('/{id}', [WikiController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WikiController::class, 'duplicate']);
    Route::get('/{id}/stats', [WikiController::class, 'stats']);
});

// ========================
// WIKI_SYNONYMS RESOURCE
// ========================
Route::prefix('wiki-synonyms')->group(function () {
    use App\Http\Controllers\Api\V1\WikiSynonymsController;

    Route::get('/filters', [WikiSynonymsController::class, 'filters']);
    Route::get('/suggestions', [WikiSynonymsController::class, 'suggestions']);
    Route::post('/advanced-search', [WikiSynonymsController::class, 'advancedSearch']);

    Route::get('/import-template', [WikiSynonymsController::class, 'importTemplate']);
    Route::post('/import', [WikiSynonymsController::class, 'import']);
    Route::get('/export', [WikiSynonymsController::class, 'export']);

    Route::post('/bulk-store', [WikiSynonymsController::class, 'bulkStore']);
    Route::post('/bulk-update', [WikiSynonymsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WikiSynonymsController::class, 'bulkDestroy']);

    Route::get('/trashed', [WikiSynonymsController::class, 'trashed']);
    Route::post('/{id}/restore', [WikiSynonymsController::class, 'restore']);
    Route::delete('/{id}/force', [WikiSynonymsController::class, 'forceDelete']);

    Route::get('/', [WikiSynonymsController::class, 'index']);
    Route::post('/', [WikiSynonymsController::class, 'store']);
    Route::get('/{id}', [WikiSynonymsController::class, 'show']);
    Route::put('/{id}', [WikiSynonymsController::class, 'update']);
    Route::delete('/{id}', [WikiSynonymsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WikiSynonymsController::class, 'duplicate']);
    Route::get('/{id}/stats', [WikiSynonymsController::class, 'stats']);
});

// ========================
// WIKI_LOCKS RESOURCE
// ========================
Route::prefix('wiki-locks')->group(function () {
    use App\Http\Controllers\Api\V1\WikiLocksController;

    Route::get('/filters', [WikiLocksController::class, 'filters']);
    Route::get('/suggestions', [WikiLocksController::class, 'suggestions']);
    Route::post('/advanced-search', [WikiLocksController::class, 'advancedSearch']);

    Route::get('/import-template', [WikiLocksController::class, 'importTemplate']);
    Route::post('/import', [WikiLocksController::class, 'import']);
    Route::get('/export', [WikiLocksController::class, 'export']);

    Route::post('/bulk-store', [WikiLocksController::class, 'bulkStore']);
    Route::post('/bulk-update', [WikiLocksController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WikiLocksController::class, 'bulkDestroy']);

    Route::get('/trashed', [WikiLocksController::class, 'trashed']);
    Route::post('/{id}/restore', [WikiLocksController::class, 'restore']);
    Route::delete('/{id}/force', [WikiLocksController::class, 'forceDelete']);

    Route::get('/', [WikiLocksController::class, 'index']);
    Route::post('/', [WikiLocksController::class, 'store']);
    Route::get('/{id}', [WikiLocksController::class, 'show']);
    Route::put('/{id}', [WikiLocksController::class, 'update']);
    Route::delete('/{id}', [WikiLocksController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WikiLocksController::class, 'duplicate']);
    Route::get('/{id}/stats', [WikiLocksController::class, 'stats']);
});

// ========================
// WORKSHOPALLOCATION_SCHEDULED RESOURCE
// ========================
Route::prefix('workshopallocation-scheduled')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopallocationScheduledController;

    Route::get('/filters', [WorkshopallocationScheduledController::class, 'filters']);
    Route::get('/suggestions', [WorkshopallocationScheduledController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopallocationScheduledController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopallocationScheduledController::class, 'importTemplate']);
    Route::post('/import', [WorkshopallocationScheduledController::class, 'import']);
    Route::get('/export', [WorkshopallocationScheduledController::class, 'export']);

    Route::post('/bulk-store', [WorkshopallocationScheduledController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopallocationScheduledController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopallocationScheduledController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopallocationScheduledController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopallocationScheduledController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopallocationScheduledController::class, 'forceDelete']);

    Route::get('/', [WorkshopallocationScheduledController::class, 'index']);
    Route::post('/', [WorkshopallocationScheduledController::class, 'store']);
    Route::get('/{id}', [WorkshopallocationScheduledController::class, 'show']);
    Route::put('/{id}', [WorkshopallocationScheduledController::class, 'update']);
    Route::delete('/{id}', [WorkshopallocationScheduledController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopallocationScheduledController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopallocationScheduledController::class, 'stats']);
});

// ========================
// WORKSHOPEVAL_BEST_SETTINGS RESOURCE
// ========================
Route::prefix('workshopeval-best-settings')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopevalBestSettingsController;

    Route::get('/filters', [WorkshopevalBestSettingsController::class, 'filters']);
    Route::get('/suggestions', [WorkshopevalBestSettingsController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopevalBestSettingsController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopevalBestSettingsController::class, 'importTemplate']);
    Route::post('/import', [WorkshopevalBestSettingsController::class, 'import']);
    Route::get('/export', [WorkshopevalBestSettingsController::class, 'export']);

    Route::post('/bulk-store', [WorkshopevalBestSettingsController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopevalBestSettingsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopevalBestSettingsController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopevalBestSettingsController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopevalBestSettingsController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopevalBestSettingsController::class, 'forceDelete']);

    Route::get('/', [WorkshopevalBestSettingsController::class, 'index']);
    Route::post('/', [WorkshopevalBestSettingsController::class, 'store']);
    Route::get('/{id}', [WorkshopevalBestSettingsController::class, 'show']);
    Route::put('/{id}', [WorkshopevalBestSettingsController::class, 'update']);
    Route::delete('/{id}', [WorkshopevalBestSettingsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopevalBestSettingsController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopevalBestSettingsController::class, 'stats']);
});

// ========================
// WORKSHOPFORM_RUBRIC_CONFIG RESOURCE
// ========================
Route::prefix('workshopform-rubric-config')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopformRubricConfigController;

    Route::get('/filters', [WorkshopformRubricConfigController::class, 'filters']);
    Route::get('/suggestions', [WorkshopformRubricConfigController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopformRubricConfigController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopformRubricConfigController::class, 'importTemplate']);
    Route::post('/import', [WorkshopformRubricConfigController::class, 'import']);
    Route::get('/export', [WorkshopformRubricConfigController::class, 'export']);

    Route::post('/bulk-store', [WorkshopformRubricConfigController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopformRubricConfigController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopformRubricConfigController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopformRubricConfigController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopformRubricConfigController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopformRubricConfigController::class, 'forceDelete']);

    Route::get('/', [WorkshopformRubricConfigController::class, 'index']);
    Route::post('/', [WorkshopformRubricConfigController::class, 'store']);
    Route::get('/{id}', [WorkshopformRubricConfigController::class, 'show']);
    Route::put('/{id}', [WorkshopformRubricConfigController::class, 'update']);
    Route::delete('/{id}', [WorkshopformRubricConfigController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopformRubricConfigController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopformRubricConfigController::class, 'stats']);
});

// ========================
// PAYGW_PAYPAL RESOURCE
// ========================
Route::prefix('paygw-paypal')->group(function () {
    use App\Http\Controllers\Api\V1\PaygwPaypalController;

    Route::get('/filters', [PaygwPaypalController::class, 'filters']);
    Route::get('/suggestions', [PaygwPaypalController::class, 'suggestions']);
    Route::post('/advanced-search', [PaygwPaypalController::class, 'advancedSearch']);

    Route::get('/import-template', [PaygwPaypalController::class, 'importTemplate']);
    Route::post('/import', [PaygwPaypalController::class, 'import']);
    Route::get('/export', [PaygwPaypalController::class, 'export']);

    Route::post('/bulk-store', [PaygwPaypalController::class, 'bulkStore']);
    Route::post('/bulk-update', [PaygwPaypalController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PaygwPaypalController::class, 'bulkDestroy']);

    Route::get('/trashed', [PaygwPaypalController::class, 'trashed']);
    Route::post('/{id}/restore', [PaygwPaypalController::class, 'restore']);
    Route::delete('/{id}/force', [PaygwPaypalController::class, 'forceDelete']);

    Route::get('/', [PaygwPaypalController::class, 'index']);
    Route::post('/', [PaygwPaypalController::class, 'store']);
    Route::get('/{id}', [PaygwPaypalController::class, 'show']);
    Route::put('/{id}', [PaygwPaypalController::class, 'update']);
    Route::delete('/{id}', [PaygwPaypalController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PaygwPaypalController::class, 'duplicate']);
    Route::get('/{id}/stats', [PaygwPaypalController::class, 'stats']);
});

// ========================
// QUESTION_DATASET_ITEMS RESOURCE
// ========================
Route::prefix('question-dataset-items')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionDatasetItemsController;

    Route::get('/filters', [QuestionDatasetItemsController::class, 'filters']);
    Route::get('/suggestions', [QuestionDatasetItemsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionDatasetItemsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionDatasetItemsController::class, 'importTemplate']);
    Route::post('/import', [QuestionDatasetItemsController::class, 'import']);
    Route::get('/export', [QuestionDatasetItemsController::class, 'export']);

    Route::post('/bulk-store', [QuestionDatasetItemsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionDatasetItemsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionDatasetItemsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionDatasetItemsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionDatasetItemsController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionDatasetItemsController::class, 'forceDelete']);

    Route::get('/', [QuestionDatasetItemsController::class, 'index']);
    Route::post('/', [QuestionDatasetItemsController::class, 'store']);
    Route::get('/{id}', [QuestionDatasetItemsController::class, 'show']);
    Route::put('/{id}', [QuestionDatasetItemsController::class, 'update']);
    Route::delete('/{id}', [QuestionDatasetItemsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionDatasetItemsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionDatasetItemsController::class, 'stats']);
});

// ========================
// QTYPE_ESSAY_OPTIONS RESOURCE
// ========================
Route::prefix('qtype-essay-options')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeEssayOptionsController;

    Route::get('/filters', [QtypeEssayOptionsController::class, 'filters']);
    Route::get('/suggestions', [QtypeEssayOptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeEssayOptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeEssayOptionsController::class, 'importTemplate']);
    Route::post('/import', [QtypeEssayOptionsController::class, 'import']);
    Route::get('/export', [QtypeEssayOptionsController::class, 'export']);

    Route::post('/bulk-store', [QtypeEssayOptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeEssayOptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeEssayOptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeEssayOptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeEssayOptionsController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeEssayOptionsController::class, 'forceDelete']);

    Route::get('/', [QtypeEssayOptionsController::class, 'index']);
    Route::post('/', [QtypeEssayOptionsController::class, 'store']);
    Route::get('/{id}', [QtypeEssayOptionsController::class, 'show']);
    Route::put('/{id}', [QtypeEssayOptionsController::class, 'update']);
    Route::delete('/{id}', [QtypeEssayOptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeEssayOptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeEssayOptionsController::class, 'stats']);
});

// ========================
// QTYPE_MATCH_OPTIONS RESOURCE
// ========================
Route::prefix('qtype-match-options')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeMatchOptionsController;

    Route::get('/filters', [QtypeMatchOptionsController::class, 'filters']);
    Route::get('/suggestions', [QtypeMatchOptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeMatchOptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeMatchOptionsController::class, 'importTemplate']);
    Route::post('/import', [QtypeMatchOptionsController::class, 'import']);
    Route::get('/export', [QtypeMatchOptionsController::class, 'export']);

    Route::post('/bulk-store', [QtypeMatchOptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeMatchOptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeMatchOptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeMatchOptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeMatchOptionsController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeMatchOptionsController::class, 'forceDelete']);

    Route::get('/', [QtypeMatchOptionsController::class, 'index']);
    Route::post('/', [QtypeMatchOptionsController::class, 'store']);
    Route::get('/{id}', [QtypeMatchOptionsController::class, 'show']);
    Route::put('/{id}', [QtypeMatchOptionsController::class, 'update']);
    Route::delete('/{id}', [QtypeMatchOptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeMatchOptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeMatchOptionsController::class, 'stats']);
});

// ========================
// QTYPE_MULTICHOICE_OPTIONS RESOURCE
// ========================
Route::prefix('qtype-multichoice-options')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeMultichoiceOptionsController;

    Route::get('/filters', [QtypeMultichoiceOptionsController::class, 'filters']);
    Route::get('/suggestions', [QtypeMultichoiceOptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeMultichoiceOptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeMultichoiceOptionsController::class, 'importTemplate']);
    Route::post('/import', [QtypeMultichoiceOptionsController::class, 'import']);
    Route::get('/export', [QtypeMultichoiceOptionsController::class, 'export']);

    Route::post('/bulk-store', [QtypeMultichoiceOptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeMultichoiceOptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeMultichoiceOptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeMultichoiceOptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeMultichoiceOptionsController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeMultichoiceOptionsController::class, 'forceDelete']);

    Route::get('/', [QtypeMultichoiceOptionsController::class, 'index']);
    Route::post('/', [QtypeMultichoiceOptionsController::class, 'store']);
    Route::get('/{id}', [QtypeMultichoiceOptionsController::class, 'show']);
    Route::put('/{id}', [QtypeMultichoiceOptionsController::class, 'update']);
    Route::delete('/{id}', [QtypeMultichoiceOptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeMultichoiceOptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeMultichoiceOptionsController::class, 'stats']);
});

// ========================
// QTYPE_RANDOMSAMATCH_OPTIONS RESOURCE
// ========================
Route::prefix('qtype-randomsamatch-options')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeRandomsamatchOptionsController;

    Route::get('/filters', [QtypeRandomsamatchOptionsController::class, 'filters']);
    Route::get('/suggestions', [QtypeRandomsamatchOptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeRandomsamatchOptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeRandomsamatchOptionsController::class, 'importTemplate']);
    Route::post('/import', [QtypeRandomsamatchOptionsController::class, 'import']);
    Route::get('/export', [QtypeRandomsamatchOptionsController::class, 'export']);

    Route::post('/bulk-store', [QtypeRandomsamatchOptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeRandomsamatchOptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeRandomsamatchOptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeRandomsamatchOptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeRandomsamatchOptionsController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeRandomsamatchOptionsController::class, 'forceDelete']);

    Route::get('/', [QtypeRandomsamatchOptionsController::class, 'index']);
    Route::post('/', [QtypeRandomsamatchOptionsController::class, 'store']);
    Route::get('/{id}', [QtypeRandomsamatchOptionsController::class, 'show']);
    Route::put('/{id}', [QtypeRandomsamatchOptionsController::class, 'update']);
    Route::delete('/{id}', [QtypeRandomsamatchOptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeRandomsamatchOptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeRandomsamatchOptionsController::class, 'stats']);
});

// ========================
// QTYPE_SHORTANSWER_OPTIONS RESOURCE
// ========================
Route::prefix('qtype-shortanswer-options')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeShortanswerOptionsController;

    Route::get('/filters', [QtypeShortanswerOptionsController::class, 'filters']);
    Route::get('/suggestions', [QtypeShortanswerOptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeShortanswerOptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeShortanswerOptionsController::class, 'importTemplate']);
    Route::post('/import', [QtypeShortanswerOptionsController::class, 'import']);
    Route::get('/export', [QtypeShortanswerOptionsController::class, 'export']);

    Route::post('/bulk-store', [QtypeShortanswerOptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeShortanswerOptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeShortanswerOptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeShortanswerOptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeShortanswerOptionsController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeShortanswerOptionsController::class, 'forceDelete']);

    Route::get('/', [QtypeShortanswerOptionsController::class, 'index']);
    Route::post('/', [QtypeShortanswerOptionsController::class, 'store']);
    Route::get('/{id}', [QtypeShortanswerOptionsController::class, 'show']);
    Route::put('/{id}', [QtypeShortanswerOptionsController::class, 'update']);
    Route::delete('/{id}', [QtypeShortanswerOptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeShortanswerOptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeShortanswerOptionsController::class, 'stats']);
});

// ========================
// SEARCH_SIMPLEDB_INDEX RESOURCE
// ========================
Route::prefix('search-simpledb-index')->group(function () {
    use App\Http\Controllers\Api\V1\SearchSimpledbIndexController;

    Route::get('/filters', [SearchSimpledbIndexController::class, 'filters']);
    Route::get('/suggestions', [SearchSimpledbIndexController::class, 'suggestions']);
    Route::post('/advanced-search', [SearchSimpledbIndexController::class, 'advancedSearch']);

    Route::get('/import-template', [SearchSimpledbIndexController::class, 'importTemplate']);
    Route::post('/import', [SearchSimpledbIndexController::class, 'import']);
    Route::get('/export', [SearchSimpledbIndexController::class, 'export']);

    Route::post('/bulk-store', [SearchSimpledbIndexController::class, 'bulkStore']);
    Route::post('/bulk-update', [SearchSimpledbIndexController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [SearchSimpledbIndexController::class, 'bulkDestroy']);

    Route::get('/trashed', [SearchSimpledbIndexController::class, 'trashed']);
    Route::post('/{id}/restore', [SearchSimpledbIndexController::class, 'restore']);
    Route::delete('/{id}/force', [SearchSimpledbIndexController::class, 'forceDelete']);

    Route::get('/', [SearchSimpledbIndexController::class, 'index']);
    Route::post('/', [SearchSimpledbIndexController::class, 'store']);
    Route::get('/{id}', [SearchSimpledbIndexController::class, 'show']);
    Route::put('/{id}', [SearchSimpledbIndexController::class, 'update']);
    Route::delete('/{id}', [SearchSimpledbIndexController::class, 'destroy']);

    Route::post('/{id}/duplicate', [SearchSimpledbIndexController::class, 'duplicate']);
    Route::get('/{id}/stats', [SearchSimpledbIndexController::class, 'stats']);
});

// ========================
// TOOL_CUSTOMLANG RESOURCE
// ========================
Route::prefix('tool-customlang')->group(function () {
    use App\Http\Controllers\Api\V1\ToolCustomlangController;

    Route::get('/filters', [ToolCustomlangController::class, 'filters']);
    Route::get('/suggestions', [ToolCustomlangController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolCustomlangController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolCustomlangController::class, 'importTemplate']);
    Route::post('/import', [ToolCustomlangController::class, 'import']);
    Route::get('/export', [ToolCustomlangController::class, 'export']);

    Route::post('/bulk-store', [ToolCustomlangController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolCustomlangController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolCustomlangController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolCustomlangController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolCustomlangController::class, 'restore']);
    Route::delete('/{id}/force', [ToolCustomlangController::class, 'forceDelete']);

    Route::get('/', [ToolCustomlangController::class, 'index']);
    Route::post('/', [ToolCustomlangController::class, 'store']);
    Route::get('/{id}', [ToolCustomlangController::class, 'show']);
    Route::put('/{id}', [ToolCustomlangController::class, 'update']);
    Route::delete('/{id}', [ToolCustomlangController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolCustomlangController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolCustomlangController::class, 'stats']);
});

// ========================
// TOOL_DATAPRIVACY_CTXLEVEL RESOURCE
// ========================
Route::prefix('tool-dataprivacy-ctxlevel')->group(function () {
    use App\Http\Controllers\Api\V1\ToolDataprivacyCtxlevelController;

    Route::get('/filters', [ToolDataprivacyCtxlevelController::class, 'filters']);
    Route::get('/suggestions', [ToolDataprivacyCtxlevelController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolDataprivacyCtxlevelController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolDataprivacyCtxlevelController::class, 'importTemplate']);
    Route::post('/import', [ToolDataprivacyCtxlevelController::class, 'import']);
    Route::get('/export', [ToolDataprivacyCtxlevelController::class, 'export']);

    Route::post('/bulk-store', [ToolDataprivacyCtxlevelController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolDataprivacyCtxlevelController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolDataprivacyCtxlevelController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolDataprivacyCtxlevelController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolDataprivacyCtxlevelController::class, 'restore']);
    Route::delete('/{id}/force', [ToolDataprivacyCtxlevelController::class, 'forceDelete']);

    Route::get('/', [ToolDataprivacyCtxlevelController::class, 'index']);
    Route::post('/', [ToolDataprivacyCtxlevelController::class, 'store']);
    Route::get('/{id}', [ToolDataprivacyCtxlevelController::class, 'show']);
    Route::put('/{id}', [ToolDataprivacyCtxlevelController::class, 'update']);
    Route::delete('/{id}', [ToolDataprivacyCtxlevelController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolDataprivacyCtxlevelController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolDataprivacyCtxlevelController::class, 'stats']);
});

// ========================
// TOOL_DATAPRIVACY_CTXINSTANCE RESOURCE
// ========================
Route::prefix('tool-dataprivacy-ctxinstance')->group(function () {
    use App\Http\Controllers\Api\V1\ToolDataprivacyCtxinstanceController;

    Route::get('/filters', [ToolDataprivacyCtxinstanceController::class, 'filters']);
    Route::get('/suggestions', [ToolDataprivacyCtxinstanceController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolDataprivacyCtxinstanceController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolDataprivacyCtxinstanceController::class, 'importTemplate']);
    Route::post('/import', [ToolDataprivacyCtxinstanceController::class, 'import']);
    Route::get('/export', [ToolDataprivacyCtxinstanceController::class, 'export']);

    Route::post('/bulk-store', [ToolDataprivacyCtxinstanceController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolDataprivacyCtxinstanceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolDataprivacyCtxinstanceController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolDataprivacyCtxinstanceController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolDataprivacyCtxinstanceController::class, 'restore']);
    Route::delete('/{id}/force', [ToolDataprivacyCtxinstanceController::class, 'forceDelete']);

    Route::get('/', [ToolDataprivacyCtxinstanceController::class, 'index']);
    Route::post('/', [ToolDataprivacyCtxinstanceController::class, 'store']);
    Route::get('/{id}', [ToolDataprivacyCtxinstanceController::class, 'show']);
    Route::put('/{id}', [ToolDataprivacyCtxinstanceController::class, 'update']);
    Route::delete('/{id}', [ToolDataprivacyCtxinstanceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolDataprivacyCtxinstanceController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolDataprivacyCtxinstanceController::class, 'stats']);
});

// ========================
// TOOL_DATAPRIVACY_CTXLST_CTX RESOURCE
// ========================
Route::prefix('tool-dataprivacy-ctxlst-ctx')->group(function () {
    use App\Http\Controllers\Api\V1\ToolDataprivacyCtxlstCtxController;

    Route::get('/filters', [ToolDataprivacyCtxlstCtxController::class, 'filters']);
    Route::get('/suggestions', [ToolDataprivacyCtxlstCtxController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolDataprivacyCtxlstCtxController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolDataprivacyCtxlstCtxController::class, 'importTemplate']);
    Route::post('/import', [ToolDataprivacyCtxlstCtxController::class, 'import']);
    Route::get('/export', [ToolDataprivacyCtxlstCtxController::class, 'export']);

    Route::post('/bulk-store', [ToolDataprivacyCtxlstCtxController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolDataprivacyCtxlstCtxController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolDataprivacyCtxlstCtxController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolDataprivacyCtxlstCtxController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolDataprivacyCtxlstCtxController::class, 'restore']);
    Route::delete('/{id}/force', [ToolDataprivacyCtxlstCtxController::class, 'forceDelete']);

    Route::get('/', [ToolDataprivacyCtxlstCtxController::class, 'index']);
    Route::post('/', [ToolDataprivacyCtxlstCtxController::class, 'store']);
    Route::get('/{id}', [ToolDataprivacyCtxlstCtxController::class, 'show']);
    Route::put('/{id}', [ToolDataprivacyCtxlstCtxController::class, 'update']);
    Route::delete('/{id}', [ToolDataprivacyCtxlstCtxController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolDataprivacyCtxlstCtxController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolDataprivacyCtxlstCtxController::class, 'stats']);
});

// ========================
// TOOL_MONITOR_SUBSCRIPTIONS RESOURCE
// ========================
Route::prefix('tool-monitor-subscriptions')->group(function () {
    use App\Http\Controllers\Api\V1\ToolMonitorSubscriptionsController;

    Route::get('/filters', [ToolMonitorSubscriptionsController::class, 'filters']);
    Route::get('/suggestions', [ToolMonitorSubscriptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolMonitorSubscriptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolMonitorSubscriptionsController::class, 'importTemplate']);
    Route::post('/import', [ToolMonitorSubscriptionsController::class, 'import']);
    Route::get('/export', [ToolMonitorSubscriptionsController::class, 'export']);

    Route::post('/bulk-store', [ToolMonitorSubscriptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolMonitorSubscriptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolMonitorSubscriptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolMonitorSubscriptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolMonitorSubscriptionsController::class, 'restore']);
    Route::delete('/{id}/force', [ToolMonitorSubscriptionsController::class, 'forceDelete']);

    Route::get('/', [ToolMonitorSubscriptionsController::class, 'index']);
    Route::post('/', [ToolMonitorSubscriptionsController::class, 'store']);
    Route::get('/{id}', [ToolMonitorSubscriptionsController::class, 'show']);
    Route::put('/{id}', [ToolMonitorSubscriptionsController::class, 'update']);
    Route::delete('/{id}', [ToolMonitorSubscriptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolMonitorSubscriptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolMonitorSubscriptionsController::class, 'stats']);
});

// ========================
// TOOL_USERTOURS_STEPS RESOURCE
// ========================
Route::prefix('tool-usertours-steps')->group(function () {
    use App\Http\Controllers\Api\V1\ToolUsertoursStepsController;

    Route::get('/filters', [ToolUsertoursStepsController::class, 'filters']);
    Route::get('/suggestions', [ToolUsertoursStepsController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolUsertoursStepsController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolUsertoursStepsController::class, 'importTemplate']);
    Route::post('/import', [ToolUsertoursStepsController::class, 'import']);
    Route::get('/export', [ToolUsertoursStepsController::class, 'export']);

    Route::post('/bulk-store', [ToolUsertoursStepsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolUsertoursStepsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolUsertoursStepsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolUsertoursStepsController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolUsertoursStepsController::class, 'restore']);
    Route::delete('/{id}/force', [ToolUsertoursStepsController::class, 'forceDelete']);

    Route::get('/', [ToolUsertoursStepsController::class, 'index']);
    Route::post('/', [ToolUsertoursStepsController::class, 'store']);
    Route::get('/{id}', [ToolUsertoursStepsController::class, 'show']);
    Route::put('/{id}', [ToolUsertoursStepsController::class, 'update']);
    Route::delete('/{id}', [ToolUsertoursStepsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolUsertoursStepsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolUsertoursStepsController::class, 'stats']);
});

// ========================
// ENROL_LTI_LTI2_TOOL_PROXY RESOURCE
// ========================
Route::prefix('enrol-lti-lti2-tool-proxy')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiLti2ToolProxyController;

    Route::get('/filters', [EnrolLtiLti2ToolProxyController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiLti2ToolProxyController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiLti2ToolProxyController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiLti2ToolProxyController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiLti2ToolProxyController::class, 'import']);
    Route::get('/export', [EnrolLtiLti2ToolProxyController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiLti2ToolProxyController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiLti2ToolProxyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiLti2ToolProxyController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiLti2ToolProxyController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiLti2ToolProxyController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiLti2ToolProxyController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiLti2ToolProxyController::class, 'index']);
    Route::post('/', [EnrolLtiLti2ToolProxyController::class, 'store']);
    Route::get('/{id}', [EnrolLtiLti2ToolProxyController::class, 'show']);
    Route::put('/{id}', [EnrolLtiLti2ToolProxyController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiLti2ToolProxyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiLti2ToolProxyController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiLti2ToolProxyController::class, 'stats']);
});

// ========================
// ENROL_LTI_LTI2_CONTEXT RESOURCE
// ========================
Route::prefix('enrol-lti-lti2-context')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiLti2ContextController;

    Route::get('/filters', [EnrolLtiLti2ContextController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiLti2ContextController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiLti2ContextController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiLti2ContextController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiLti2ContextController::class, 'import']);
    Route::get('/export', [EnrolLtiLti2ContextController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiLti2ContextController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiLti2ContextController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiLti2ContextController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiLti2ContextController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiLti2ContextController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiLti2ContextController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiLti2ContextController::class, 'index']);
    Route::post('/', [EnrolLtiLti2ContextController::class, 'store']);
    Route::get('/{id}', [EnrolLtiLti2ContextController::class, 'show']);
    Route::put('/{id}', [EnrolLtiLti2ContextController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiLti2ContextController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiLti2ContextController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiLti2ContextController::class, 'stats']);
});

// ========================
// ENROL_LTI_LTI2_NONCE RESOURCE
// ========================
Route::prefix('enrol-lti-lti2-nonce')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiLti2NonceController;

    Route::get('/filters', [EnrolLtiLti2NonceController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiLti2NonceController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiLti2NonceController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiLti2NonceController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiLti2NonceController::class, 'import']);
    Route::get('/export', [EnrolLtiLti2NonceController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiLti2NonceController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiLti2NonceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiLti2NonceController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiLti2NonceController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiLti2NonceController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiLti2NonceController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiLti2NonceController::class, 'index']);
    Route::post('/', [EnrolLtiLti2NonceController::class, 'store']);
    Route::get('/{id}', [EnrolLtiLti2NonceController::class, 'show']);
    Route::put('/{id}', [EnrolLtiLti2NonceController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiLti2NonceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiLti2NonceController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiLti2NonceController::class, 'stats']);
});

// ========================
// ENROL_LTI_DEPLOYMENT RESOURCE
// ========================
Route::prefix('enrol-lti-deployment')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiDeploymentController;

    Route::get('/filters', [EnrolLtiDeploymentController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiDeploymentController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiDeploymentController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiDeploymentController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiDeploymentController::class, 'import']);
    Route::get('/export', [EnrolLtiDeploymentController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiDeploymentController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiDeploymentController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiDeploymentController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiDeploymentController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiDeploymentController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiDeploymentController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiDeploymentController::class, 'index']);
    Route::post('/', [EnrolLtiDeploymentController::class, 'store']);
    Route::get('/{id}', [EnrolLtiDeploymentController::class, 'show']);
    Route::put('/{id}', [EnrolLtiDeploymentController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiDeploymentController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiDeploymentController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiDeploymentController::class, 'stats']);
});

// ========================
// TOOL_BRICKFIELD_CACHE_CHECK RESOURCE
// ========================
Route::prefix('tool-brickfield-cache-check')->group(function () {
    use App\Http\Controllers\Api\V1\ToolBrickfieldCacheCheckController;

    Route::get('/filters', [ToolBrickfieldCacheCheckController::class, 'filters']);
    Route::get('/suggestions', [ToolBrickfieldCacheCheckController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolBrickfieldCacheCheckController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolBrickfieldCacheCheckController::class, 'importTemplate']);
    Route::post('/import', [ToolBrickfieldCacheCheckController::class, 'import']);
    Route::get('/export', [ToolBrickfieldCacheCheckController::class, 'export']);

    Route::post('/bulk-store', [ToolBrickfieldCacheCheckController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolBrickfieldCacheCheckController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolBrickfieldCacheCheckController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolBrickfieldCacheCheckController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolBrickfieldCacheCheckController::class, 'restore']);
    Route::delete('/{id}/force', [ToolBrickfieldCacheCheckController::class, 'forceDelete']);

    Route::get('/', [ToolBrickfieldCacheCheckController::class, 'index']);
    Route::post('/', [ToolBrickfieldCacheCheckController::class, 'store']);
    Route::get('/{id}', [ToolBrickfieldCacheCheckController::class, 'show']);
    Route::put('/{id}', [ToolBrickfieldCacheCheckController::class, 'update']);
    Route::delete('/{id}', [ToolBrickfieldCacheCheckController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolBrickfieldCacheCheckController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolBrickfieldCacheCheckController::class, 'stats']);
});

// ========================
// TOOL_BRICKFIELD_SUMMARY RESOURCE
// ========================
Route::prefix('tool-brickfield-summary')->group(function () {
    use App\Http\Controllers\Api\V1\ToolBrickfieldSummaryController;

    Route::get('/filters', [ToolBrickfieldSummaryController::class, 'filters']);
    Route::get('/suggestions', [ToolBrickfieldSummaryController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolBrickfieldSummaryController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolBrickfieldSummaryController::class, 'importTemplate']);
    Route::post('/import', [ToolBrickfieldSummaryController::class, 'import']);
    Route::get('/export', [ToolBrickfieldSummaryController::class, 'export']);

    Route::post('/bulk-store', [ToolBrickfieldSummaryController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolBrickfieldSummaryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolBrickfieldSummaryController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolBrickfieldSummaryController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolBrickfieldSummaryController::class, 'restore']);
    Route::delete('/{id}/force', [ToolBrickfieldSummaryController::class, 'forceDelete']);

    Route::get('/', [ToolBrickfieldSummaryController::class, 'index']);
    Route::post('/', [ToolBrickfieldSummaryController::class, 'store']);
    Route::get('/{id}', [ToolBrickfieldSummaryController::class, 'show']);
    Route::put('/{id}', [ToolBrickfieldSummaryController::class, 'update']);
    Route::delete('/{id}', [ToolBrickfieldSummaryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolBrickfieldSummaryController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolBrickfieldSummaryController::class, 'stats']);
});

// ========================
// GRADE_CATEGORIES RESOURCE
// ========================
Route::prefix('grade-categories')->group(function () {
    use App\Http\Controllers\Api\V1\GradeCategoriesController;

    Route::get('/filters', [GradeCategoriesController::class, 'filters']);
    Route::get('/suggestions', [GradeCategoriesController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeCategoriesController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeCategoriesController::class, 'importTemplate']);
    Route::post('/import', [GradeCategoriesController::class, 'import']);
    Route::get('/export', [GradeCategoriesController::class, 'export']);

    Route::post('/bulk-store', [GradeCategoriesController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeCategoriesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeCategoriesController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeCategoriesController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeCategoriesController::class, 'restore']);
    Route::delete('/{id}/force', [GradeCategoriesController::class, 'forceDelete']);

    Route::get('/', [GradeCategoriesController::class, 'index']);
    Route::post('/', [GradeCategoriesController::class, 'store']);
    Route::get('/{id}', [GradeCategoriesController::class, 'show']);
    Route::put('/{id}', [GradeCategoriesController::class, 'update']);
    Route::delete('/{id}', [GradeCategoriesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeCategoriesController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeCategoriesController::class, 'stats']);
});

// ========================
// WORKSHOP RESOURCE
// ========================
Route::prefix('workshop')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopController;

    Route::get('/filters', [WorkshopController::class, 'filters']);
    Route::get('/suggestions', [WorkshopController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopController::class, 'importTemplate']);
    Route::post('/import', [WorkshopController::class, 'import']);
    Route::get('/export', [WorkshopController::class, 'export']);

    Route::post('/bulk-store', [WorkshopController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopController::class, 'forceDelete']);

    Route::get('/', [WorkshopController::class, 'index']);
    Route::post('/', [WorkshopController::class, 'store']);
    Route::get('/{id}', [WorkshopController::class, 'show']);
    Route::put('/{id}', [WorkshopController::class, 'update']);
    Route::delete('/{id}', [WorkshopController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopController::class, 'stats']);
});

// ========================
// COURSE_PUBLISHED RESOURCE
// ========================
Route::prefix('course-published')->group(function () {
    use App\Http\Controllers\Api\V1\CoursePublishedController;

    Route::get('/filters', [CoursePublishedController::class, 'filters']);
    Route::get('/suggestions', [CoursePublishedController::class, 'suggestions']);
    Route::post('/advanced-search', [CoursePublishedController::class, 'advancedSearch']);

    Route::get('/import-template', [CoursePublishedController::class, 'importTemplate']);
    Route::post('/import', [CoursePublishedController::class, 'import']);
    Route::get('/export', [CoursePublishedController::class, 'export']);

    Route::post('/bulk-store', [CoursePublishedController::class, 'bulkStore']);
    Route::post('/bulk-update', [CoursePublishedController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CoursePublishedController::class, 'bulkDestroy']);

    Route::get('/trashed', [CoursePublishedController::class, 'trashed']);
    Route::post('/{id}/restore', [CoursePublishedController::class, 'restore']);
    Route::delete('/{id}/force', [CoursePublishedController::class, 'forceDelete']);

    Route::get('/', [CoursePublishedController::class, 'index']);
    Route::post('/', [CoursePublishedController::class, 'store']);
    Route::get('/{id}', [CoursePublishedController::class, 'show']);
    Route::put('/{id}', [CoursePublishedController::class, 'update']);
    Route::delete('/{id}', [CoursePublishedController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CoursePublishedController::class, 'duplicate']);
    Route::get('/{id}/stats', [CoursePublishedController::class, 'stats']);
});

// ========================
// GROUPINGS RESOURCE
// ========================
Route::prefix('groupings')->group(function () {
    use App\Http\Controllers\Api\V1\GroupingsController;

    Route::get('/filters', [GroupingsController::class, 'filters']);
    Route::get('/suggestions', [GroupingsController::class, 'suggestions']);
    Route::post('/advanced-search', [GroupingsController::class, 'advancedSearch']);

    Route::get('/import-template', [GroupingsController::class, 'importTemplate']);
    Route::post('/import', [GroupingsController::class, 'import']);
    Route::get('/export', [GroupingsController::class, 'export']);

    Route::post('/bulk-store', [GroupingsController::class, 'bulkStore']);
    Route::post('/bulk-update', [GroupingsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GroupingsController::class, 'bulkDestroy']);

    Route::get('/trashed', [GroupingsController::class, 'trashed']);
    Route::post('/{id}/restore', [GroupingsController::class, 'restore']);
    Route::delete('/{id}/force', [GroupingsController::class, 'forceDelete']);

    Route::get('/', [GroupingsController::class, 'index']);
    Route::post('/', [GroupingsController::class, 'store']);
    Route::get('/{id}', [GroupingsController::class, 'show']);
    Route::put('/{id}', [GroupingsController::class, 'update']);
    Route::delete('/{id}', [GroupingsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GroupingsController::class, 'duplicate']);
    Route::get('/{id}/stats', [GroupingsController::class, 'stats']);
});

// ========================
// TOOL_RECYCLEBIN_COURSE RESOURCE
// ========================
Route::prefix('tool-recyclebin-course')->group(function () {
    use App\Http\Controllers\Api\V1\ToolRecyclebinCourseController;

    Route::get('/filters', [ToolRecyclebinCourseController::class, 'filters']);
    Route::get('/suggestions', [ToolRecyclebinCourseController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolRecyclebinCourseController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolRecyclebinCourseController::class, 'importTemplate']);
    Route::post('/import', [ToolRecyclebinCourseController::class, 'import']);
    Route::get('/export', [ToolRecyclebinCourseController::class, 'export']);

    Route::post('/bulk-store', [ToolRecyclebinCourseController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolRecyclebinCourseController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolRecyclebinCourseController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolRecyclebinCourseController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolRecyclebinCourseController::class, 'restore']);
    Route::delete('/{id}/force', [ToolRecyclebinCourseController::class, 'forceDelete']);

    Route::get('/', [ToolRecyclebinCourseController::class, 'index']);
    Route::post('/', [ToolRecyclebinCourseController::class, 'store']);
    Route::get('/{id}', [ToolRecyclebinCourseController::class, 'show']);
    Route::put('/{id}', [ToolRecyclebinCourseController::class, 'update']);
    Route::delete('/{id}', [ToolRecyclebinCourseController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolRecyclebinCourseController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolRecyclebinCourseController::class, 'stats']);
});

// ========================
// GRADE_SETTINGS RESOURCE
// ========================
Route::prefix('grade-settings')->group(function () {
    use App\Http\Controllers\Api\V1\GradeSettingsController;

    Route::get('/filters', [GradeSettingsController::class, 'filters']);
    Route::get('/suggestions', [GradeSettingsController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeSettingsController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeSettingsController::class, 'importTemplate']);
    Route::post('/import', [GradeSettingsController::class, 'import']);
    Route::get('/export', [GradeSettingsController::class, 'export']);

    Route::post('/bulk-store', [GradeSettingsController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeSettingsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeSettingsController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeSettingsController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeSettingsController::class, 'restore']);
    Route::delete('/{id}/force', [GradeSettingsController::class, 'forceDelete']);

    Route::get('/', [GradeSettingsController::class, 'index']);
    Route::post('/', [GradeSettingsController::class, 'store']);
    Route::get('/{id}', [GradeSettingsController::class, 'show']);
    Route::put('/{id}', [GradeSettingsController::class, 'update']);
    Route::delete('/{id}', [GradeSettingsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeSettingsController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeSettingsController::class, 'stats']);
});

// ========================
// GROUPS RESOURCE
// ========================
Route::prefix('groups')->group(function () {
    use App\Http\Controllers\Api\V1\GroupsController;

    Route::get('/filters', [GroupsController::class, 'filters']);
    Route::get('/suggestions', [GroupsController::class, 'suggestions']);
    Route::post('/advanced-search', [GroupsController::class, 'advancedSearch']);

    Route::get('/import-template', [GroupsController::class, 'importTemplate']);
    Route::post('/import', [GroupsController::class, 'import']);
    Route::get('/export', [GroupsController::class, 'export']);

    Route::post('/bulk-store', [GroupsController::class, 'bulkStore']);
    Route::post('/bulk-update', [GroupsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GroupsController::class, 'bulkDestroy']);

    Route::get('/trashed', [GroupsController::class, 'trashed']);
    Route::post('/{id}/restore', [GroupsController::class, 'restore']);
    Route::delete('/{id}/force', [GroupsController::class, 'forceDelete']);

    Route::get('/', [GroupsController::class, 'index']);
    Route::post('/', [GroupsController::class, 'store']);
    Route::get('/{id}', [GroupsController::class, 'show']);
    Route::put('/{id}', [GroupsController::class, 'update']);
    Route::delete('/{id}', [GroupsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GroupsController::class, 'duplicate']);
    Route::get('/{id}/stats', [GroupsController::class, 'stats']);
});

// ========================
// H5PACTIVITY RESOURCE
// ========================
Route::prefix('h5pactivity')->group(function () {
    use App\Http\Controllers\Api\V1\H5pactivityController;

    Route::get('/filters', [H5pactivityController::class, 'filters']);
    Route::get('/suggestions', [H5pactivityController::class, 'suggestions']);
    Route::post('/advanced-search', [H5pactivityController::class, 'advancedSearch']);

    Route::get('/import-template', [H5pactivityController::class, 'importTemplate']);
    Route::post('/import', [H5pactivityController::class, 'import']);
    Route::get('/export', [H5pactivityController::class, 'export']);

    Route::post('/bulk-store', [H5pactivityController::class, 'bulkStore']);
    Route::post('/bulk-update', [H5pactivityController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [H5pactivityController::class, 'bulkDestroy']);

    Route::get('/trashed', [H5pactivityController::class, 'trashed']);
    Route::post('/{id}/restore', [H5pactivityController::class, 'restore']);
    Route::delete('/{id}/force', [H5pactivityController::class, 'forceDelete']);

    Route::get('/', [H5pactivityController::class, 'index']);
    Route::post('/', [H5pactivityController::class, 'store']);
    Route::get('/{id}', [H5pactivityController::class, 'show']);
    Route::put('/{id}', [H5pactivityController::class, 'update']);
    Route::delete('/{id}', [H5pactivityController::class, 'destroy']);

    Route::post('/{id}/duplicate', [H5pactivityController::class, 'duplicate']);
    Route::get('/{id}/stats', [H5pactivityController::class, 'stats']);
});

// ========================
// TOOL_BRICKFIELD_CACHE_ACTS RESOURCE
// ========================
Route::prefix('tool-brickfield-cache-acts')->group(function () {
    use App\Http\Controllers\Api\V1\ToolBrickfieldCacheActsController;

    Route::get('/filters', [ToolBrickfieldCacheActsController::class, 'filters']);
    Route::get('/suggestions', [ToolBrickfieldCacheActsController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolBrickfieldCacheActsController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolBrickfieldCacheActsController::class, 'importTemplate']);
    Route::post('/import', [ToolBrickfieldCacheActsController::class, 'import']);
    Route::get('/export', [ToolBrickfieldCacheActsController::class, 'export']);

    Route::post('/bulk-store', [ToolBrickfieldCacheActsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolBrickfieldCacheActsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolBrickfieldCacheActsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolBrickfieldCacheActsController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolBrickfieldCacheActsController::class, 'restore']);
    Route::delete('/{id}/force', [ToolBrickfieldCacheActsController::class, 'forceDelete']);

    Route::get('/', [ToolBrickfieldCacheActsController::class, 'index']);
    Route::post('/', [ToolBrickfieldCacheActsController::class, 'store']);
    Route::get('/{id}', [ToolBrickfieldCacheActsController::class, 'show']);
    Route::put('/{id}', [ToolBrickfieldCacheActsController::class, 'update']);
    Route::delete('/{id}', [ToolBrickfieldCacheActsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolBrickfieldCacheActsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolBrickfieldCacheActsController::class, 'stats']);
});

// ========================
// BOOK RESOURCE
// ========================
Route::prefix('book')->group(function () {
    use App\Http\Controllers\Api\V1\BookController;

    Route::get('/filters', [BookController::class, 'filters']);
    Route::get('/suggestions', [BookController::class, 'suggestions']);
    Route::post('/advanced-search', [BookController::class, 'advancedSearch']);

    Route::get('/import-template', [BookController::class, 'importTemplate']);
    Route::post('/import', [BookController::class, 'import']);
    Route::get('/export', [BookController::class, 'export']);

    Route::post('/bulk-store', [BookController::class, 'bulkStore']);
    Route::post('/bulk-update', [BookController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BookController::class, 'bulkDestroy']);

    Route::get('/trashed', [BookController::class, 'trashed']);
    Route::post('/{id}/restore', [BookController::class, 'restore']);
    Route::delete('/{id}/force', [BookController::class, 'forceDelete']);

    Route::get('/', [BookController::class, 'index']);
    Route::post('/', [BookController::class, 'store']);
    Route::get('/{id}', [BookController::class, 'show']);
    Route::put('/{id}', [BookController::class, 'update']);
    Route::delete('/{id}', [BookController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BookController::class, 'duplicate']);
    Route::get('/{id}/stats', [BookController::class, 'stats']);
});

// ========================
// COURSE_FORMAT_OPTIONS RESOURCE
// ========================
Route::prefix('course-format-options')->group(function () {
    use App\Http\Controllers\Api\V1\CourseFormatOptionsController;

    Route::get('/filters', [CourseFormatOptionsController::class, 'filters']);
    Route::get('/suggestions', [CourseFormatOptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseFormatOptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseFormatOptionsController::class, 'importTemplate']);
    Route::post('/import', [CourseFormatOptionsController::class, 'import']);
    Route::get('/export', [CourseFormatOptionsController::class, 'export']);

    Route::post('/bulk-store', [CourseFormatOptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseFormatOptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseFormatOptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseFormatOptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseFormatOptionsController::class, 'restore']);
    Route::delete('/{id}/force', [CourseFormatOptionsController::class, 'forceDelete']);

    Route::get('/', [CourseFormatOptionsController::class, 'index']);
    Route::post('/', [CourseFormatOptionsController::class, 'store']);
    Route::get('/{id}', [CourseFormatOptionsController::class, 'show']);
    Route::put('/{id}', [CourseFormatOptionsController::class, 'update']);
    Route::delete('/{id}', [CourseFormatOptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseFormatOptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseFormatOptionsController::class, 'stats']);
});

// ========================
// TOOL_RECYCLEBIN_CATEGORY RESOURCE
// ========================
Route::prefix('tool-recyclebin-category')->group(function () {
    use App\Http\Controllers\Api\V1\ToolRecyclebinCategoryController;

    Route::get('/filters', [ToolRecyclebinCategoryController::class, 'filters']);
    Route::get('/suggestions', [ToolRecyclebinCategoryController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolRecyclebinCategoryController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolRecyclebinCategoryController::class, 'importTemplate']);
    Route::post('/import', [ToolRecyclebinCategoryController::class, 'import']);
    Route::get('/export', [ToolRecyclebinCategoryController::class, 'export']);

    Route::post('/bulk-store', [ToolRecyclebinCategoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolRecyclebinCategoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolRecyclebinCategoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolRecyclebinCategoryController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolRecyclebinCategoryController::class, 'restore']);
    Route::delete('/{id}/force', [ToolRecyclebinCategoryController::class, 'forceDelete']);

    Route::get('/', [ToolRecyclebinCategoryController::class, 'index']);
    Route::post('/', [ToolRecyclebinCategoryController::class, 'store']);
    Route::get('/{id}', [ToolRecyclebinCategoryController::class, 'show']);
    Route::put('/{id}', [ToolRecyclebinCategoryController::class, 'update']);
    Route::delete('/{id}', [ToolRecyclebinCategoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolRecyclebinCategoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolRecyclebinCategoryController::class, 'stats']);
});

// ========================
// COURSE_COMPLETION_DEFAULTS RESOURCE
// ========================
Route::prefix('course-completion-defaults')->group(function () {
    use App\Http\Controllers\Api\V1\CourseCompletionDefaultsController;

    Route::get('/filters', [CourseCompletionDefaultsController::class, 'filters']);
    Route::get('/suggestions', [CourseCompletionDefaultsController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseCompletionDefaultsController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseCompletionDefaultsController::class, 'importTemplate']);
    Route::post('/import', [CourseCompletionDefaultsController::class, 'import']);
    Route::get('/export', [CourseCompletionDefaultsController::class, 'export']);

    Route::post('/bulk-store', [CourseCompletionDefaultsController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseCompletionDefaultsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseCompletionDefaultsController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseCompletionDefaultsController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseCompletionDefaultsController::class, 'restore']);
    Route::delete('/{id}/force', [CourseCompletionDefaultsController::class, 'forceDelete']);

    Route::get('/', [CourseCompletionDefaultsController::class, 'index']);
    Route::post('/', [CourseCompletionDefaultsController::class, 'store']);
    Route::get('/{id}', [CourseCompletionDefaultsController::class, 'show']);
    Route::put('/{id}', [CourseCompletionDefaultsController::class, 'update']);
    Route::delete('/{id}', [CourseCompletionDefaultsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseCompletionDefaultsController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseCompletionDefaultsController::class, 'stats']);
});

// ========================
// GRADE_IMPORT_NEWITEM RESOURCE
// ========================
Route::prefix('grade-import-newitem')->group(function () {
    use App\Http\Controllers\Api\V1\GradeImportNewitemController;

    Route::get('/filters', [GradeImportNewitemController::class, 'filters']);
    Route::get('/suggestions', [GradeImportNewitemController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeImportNewitemController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeImportNewitemController::class, 'importTemplate']);
    Route::post('/import', [GradeImportNewitemController::class, 'import']);
    Route::get('/export', [GradeImportNewitemController::class, 'export']);

    Route::post('/bulk-store', [GradeImportNewitemController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeImportNewitemController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeImportNewitemController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeImportNewitemController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeImportNewitemController::class, 'restore']);
    Route::delete('/{id}/force', [GradeImportNewitemController::class, 'forceDelete']);

    Route::get('/', [GradeImportNewitemController::class, 'index']);
    Route::post('/', [GradeImportNewitemController::class, 'store']);
    Route::get('/{id}', [GradeImportNewitemController::class, 'show']);
    Route::put('/{id}', [GradeImportNewitemController::class, 'update']);
    Route::delete('/{id}', [GradeImportNewitemController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeImportNewitemController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeImportNewitemController::class, 'stats']);
});

// ========================
// EVENT_SUBSCRIPTIONS RESOURCE
// ========================
Route::prefix('event-subscriptions')->group(function () {
    use App\Http\Controllers\Api\V1\EventSubscriptionsController;

    Route::get('/filters', [EventSubscriptionsController::class, 'filters']);
    Route::get('/suggestions', [EventSubscriptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [EventSubscriptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [EventSubscriptionsController::class, 'importTemplate']);
    Route::post('/import', [EventSubscriptionsController::class, 'import']);
    Route::get('/export', [EventSubscriptionsController::class, 'export']);

    Route::post('/bulk-store', [EventSubscriptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [EventSubscriptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EventSubscriptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [EventSubscriptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [EventSubscriptionsController::class, 'restore']);
    Route::delete('/{id}/force', [EventSubscriptionsController::class, 'forceDelete']);

    Route::get('/', [EventSubscriptionsController::class, 'index']);
    Route::post('/', [EventSubscriptionsController::class, 'store']);
    Route::get('/{id}', [EventSubscriptionsController::class, 'show']);
    Route::put('/{id}', [EventSubscriptionsController::class, 'update']);
    Route::delete('/{id}', [EventSubscriptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EventSubscriptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [EventSubscriptionsController::class, 'stats']);
});

// ========================
// MESSAGE_CONTACT_REQUESTS RESOURCE
// ========================
Route::prefix('message-contact-requests')->group(function () {
    use App\Http\Controllers\Api\V1\MessageContactRequestsController;

    Route::get('/filters', [MessageContactRequestsController::class, 'filters']);
    Route::get('/suggestions', [MessageContactRequestsController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageContactRequestsController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageContactRequestsController::class, 'importTemplate']);
    Route::post('/import', [MessageContactRequestsController::class, 'import']);
    Route::get('/export', [MessageContactRequestsController::class, 'export']);

    Route::post('/bulk-store', [MessageContactRequestsController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageContactRequestsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageContactRequestsController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageContactRequestsController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageContactRequestsController::class, 'restore']);
    Route::delete('/{id}/force', [MessageContactRequestsController::class, 'forceDelete']);

    Route::get('/', [MessageContactRequestsController::class, 'index']);
    Route::post('/', [MessageContactRequestsController::class, 'store']);
    Route::get('/{id}', [MessageContactRequestsController::class, 'show']);
    Route::put('/{id}', [MessageContactRequestsController::class, 'update']);
    Route::delete('/{id}', [MessageContactRequestsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageContactRequestsController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageContactRequestsController::class, 'stats']);
});

// ========================
// COMPETENCY_COURSECOMPSETTING RESOURCE
// ========================
Route::prefix('competency-coursecompsetting')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyCoursecompsettingController;

    Route::get('/filters', [CompetencyCoursecompsettingController::class, 'filters']);
    Route::get('/suggestions', [CompetencyCoursecompsettingController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyCoursecompsettingController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyCoursecompsettingController::class, 'importTemplate']);
    Route::post('/import', [CompetencyCoursecompsettingController::class, 'import']);
    Route::get('/export', [CompetencyCoursecompsettingController::class, 'export']);

    Route::post('/bulk-store', [CompetencyCoursecompsettingController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyCoursecompsettingController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyCoursecompsettingController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyCoursecompsettingController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyCoursecompsettingController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyCoursecompsettingController::class, 'forceDelete']);

    Route::get('/', [CompetencyCoursecompsettingController::class, 'index']);
    Route::post('/', [CompetencyCoursecompsettingController::class, 'store']);
    Route::get('/{id}', [CompetencyCoursecompsettingController::class, 'show']);
    Route::put('/{id}', [CompetencyCoursecompsettingController::class, 'update']);
    Route::delete('/{id}', [CompetencyCoursecompsettingController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyCoursecompsettingController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyCoursecompsettingController::class, 'stats']);
});

// ========================
// COMPETENCY_USERCOMPPLAN RESOURCE
// ========================
Route::prefix('competency-usercompplan')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyUsercompplanController;

    Route::get('/filters', [CompetencyUsercompplanController::class, 'filters']);
    Route::get('/suggestions', [CompetencyUsercompplanController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyUsercompplanController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyUsercompplanController::class, 'importTemplate']);
    Route::post('/import', [CompetencyUsercompplanController::class, 'import']);
    Route::get('/export', [CompetencyUsercompplanController::class, 'export']);

    Route::post('/bulk-store', [CompetencyUsercompplanController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyUsercompplanController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyUsercompplanController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyUsercompplanController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyUsercompplanController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyUsercompplanController::class, 'forceDelete']);

    Route::get('/', [CompetencyUsercompplanController::class, 'index']);
    Route::post('/', [CompetencyUsercompplanController::class, 'store']);
    Route::get('/{id}', [CompetencyUsercompplanController::class, 'show']);
    Route::put('/{id}', [CompetencyUsercompplanController::class, 'update']);
    Route::delete('/{id}', [CompetencyUsercompplanController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyUsercompplanController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyUsercompplanController::class, 'stats']);
});

// ========================
// EVENTS_QUEUE RESOURCE
// ========================
Route::prefix('events-queue')->group(function () {
    use App\Http\Controllers\Api\V1\EventsQueueController;

    Route::get('/filters', [EventsQueueController::class, 'filters']);
    Route::get('/suggestions', [EventsQueueController::class, 'suggestions']);
    Route::post('/advanced-search', [EventsQueueController::class, 'advancedSearch']);

    Route::get('/import-template', [EventsQueueController::class, 'importTemplate']);
    Route::post('/import', [EventsQueueController::class, 'import']);
    Route::get('/export', [EventsQueueController::class, 'export']);

    Route::post('/bulk-store', [EventsQueueController::class, 'bulkStore']);
    Route::post('/bulk-update', [EventsQueueController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EventsQueueController::class, 'bulkDestroy']);

    Route::get('/trashed', [EventsQueueController::class, 'trashed']);
    Route::post('/{id}/restore', [EventsQueueController::class, 'restore']);
    Route::delete('/{id}/force', [EventsQueueController::class, 'forceDelete']);

    Route::get('/', [EventsQueueController::class, 'index']);
    Route::post('/', [EventsQueueController::class, 'store']);
    Route::get('/{id}', [EventsQueueController::class, 'show']);
    Route::put('/{id}', [EventsQueueController::class, 'update']);
    Route::delete('/{id}', [EventsQueueController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EventsQueueController::class, 'duplicate']);
    Route::get('/{id}/stats', [EventsQueueController::class, 'stats']);
});

// ========================
// SESSIONS RESOURCE
// ========================
Route::prefix('sessions')->group(function () {
    use App\Http\Controllers\Api\V1\SessionsController;

    Route::get('/filters', [SessionsController::class, 'filters']);
    Route::get('/suggestions', [SessionsController::class, 'suggestions']);
    Route::post('/advanced-search', [SessionsController::class, 'advancedSearch']);

    Route::get('/import-template', [SessionsController::class, 'importTemplate']);
    Route::post('/import', [SessionsController::class, 'import']);
    Route::get('/export', [SessionsController::class, 'export']);

    Route::post('/bulk-store', [SessionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [SessionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [SessionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [SessionsController::class, 'trashed']);
    Route::post('/{id}/restore', [SessionsController::class, 'restore']);
    Route::delete('/{id}/force', [SessionsController::class, 'forceDelete']);

    Route::get('/', [SessionsController::class, 'index']);
    Route::post('/', [SessionsController::class, 'store']);
    Route::get('/{id}', [SessionsController::class, 'show']);
    Route::put('/{id}', [SessionsController::class, 'update']);
    Route::delete('/{id}', [SessionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [SessionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [SessionsController::class, 'stats']);
});

// ========================
// TASK_ADHOC RESOURCE
// ========================
Route::prefix('task-adhoc')->group(function () {
    use App\Http\Controllers\Api\V1\TaskAdhocController;

    Route::get('/filters', [TaskAdhocController::class, 'filters']);
    Route::get('/suggestions', [TaskAdhocController::class, 'suggestions']);
    Route::post('/advanced-search', [TaskAdhocController::class, 'advancedSearch']);

    Route::get('/import-template', [TaskAdhocController::class, 'importTemplate']);
    Route::post('/import', [TaskAdhocController::class, 'import']);
    Route::get('/export', [TaskAdhocController::class, 'export']);

    Route::post('/bulk-store', [TaskAdhocController::class, 'bulkStore']);
    Route::post('/bulk-update', [TaskAdhocController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [TaskAdhocController::class, 'bulkDestroy']);

    Route::get('/trashed', [TaskAdhocController::class, 'trashed']);
    Route::post('/{id}/restore', [TaskAdhocController::class, 'restore']);
    Route::delete('/{id}/force', [TaskAdhocController::class, 'forceDelete']);

    Route::get('/', [TaskAdhocController::class, 'index']);
    Route::post('/', [TaskAdhocController::class, 'store']);
    Route::get('/{id}', [TaskAdhocController::class, 'show']);
    Route::put('/{id}', [TaskAdhocController::class, 'update']);
    Route::delete('/{id}', [TaskAdhocController::class, 'destroy']);

    Route::post('/{id}/duplicate', [TaskAdhocController::class, 'duplicate']);
    Route::get('/{id}/stats', [TaskAdhocController::class, 'stats']);
});

// ========================
// TOOL_MFA_AUTH RESOURCE
// ========================
Route::prefix('tool-mfa-auth')->group(function () {
    use App\Http\Controllers\Api\V1\ToolMfaAuthController;

    Route::get('/filters', [ToolMfaAuthController::class, 'filters']);
    Route::get('/suggestions', [ToolMfaAuthController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolMfaAuthController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolMfaAuthController::class, 'importTemplate']);
    Route::post('/import', [ToolMfaAuthController::class, 'import']);
    Route::get('/export', [ToolMfaAuthController::class, 'export']);

    Route::post('/bulk-store', [ToolMfaAuthController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolMfaAuthController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolMfaAuthController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolMfaAuthController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolMfaAuthController::class, 'restore']);
    Route::delete('/{id}/force', [ToolMfaAuthController::class, 'forceDelete']);

    Route::get('/', [ToolMfaAuthController::class, 'index']);
    Route::post('/', [ToolMfaAuthController::class, 'store']);
    Route::get('/{id}', [ToolMfaAuthController::class, 'show']);
    Route::put('/{id}', [ToolMfaAuthController::class, 'update']);
    Route::delete('/{id}', [ToolMfaAuthController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolMfaAuthController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolMfaAuthController::class, 'stats']);
});

// ========================
// INFECTED_FILES RESOURCE
// ========================
Route::prefix('infected-files')->group(function () {
    use App\Http\Controllers\Api\V1\InfectedFilesController;

    Route::get('/filters', [InfectedFilesController::class, 'filters']);
    Route::get('/suggestions', [InfectedFilesController::class, 'suggestions']);
    Route::post('/advanced-search', [InfectedFilesController::class, 'advancedSearch']);

    Route::get('/import-template', [InfectedFilesController::class, 'importTemplate']);
    Route::post('/import', [InfectedFilesController::class, 'import']);
    Route::get('/export', [InfectedFilesController::class, 'export']);

    Route::post('/bulk-store', [InfectedFilesController::class, 'bulkStore']);
    Route::post('/bulk-update', [InfectedFilesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [InfectedFilesController::class, 'bulkDestroy']);

    Route::get('/trashed', [InfectedFilesController::class, 'trashed']);
    Route::post('/{id}/restore', [InfectedFilesController::class, 'restore']);
    Route::delete('/{id}/force', [InfectedFilesController::class, 'forceDelete']);

    Route::get('/', [InfectedFilesController::class, 'index']);
    Route::post('/', [InfectedFilesController::class, 'store']);
    Route::get('/{id}', [InfectedFilesController::class, 'show']);
    Route::put('/{id}', [InfectedFilesController::class, 'update']);
    Route::delete('/{id}', [InfectedFilesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [InfectedFilesController::class, 'duplicate']);
    Route::get('/{id}/stats', [InfectedFilesController::class, 'stats']);
});

// ========================
// REPOSITORY_ONEDRIVE_ACCESS RESOURCE
// ========================
Route::prefix('repository-onedrive-access')->group(function () {
    use App\Http\Controllers\Api\V1\RepositoryOnedriveAccessController;

    Route::get('/filters', [RepositoryOnedriveAccessController::class, 'filters']);
    Route::get('/suggestions', [RepositoryOnedriveAccessController::class, 'suggestions']);
    Route::post('/advanced-search', [RepositoryOnedriveAccessController::class, 'advancedSearch']);

    Route::get('/import-template', [RepositoryOnedriveAccessController::class, 'importTemplate']);
    Route::post('/import', [RepositoryOnedriveAccessController::class, 'import']);
    Route::get('/export', [RepositoryOnedriveAccessController::class, 'export']);

    Route::post('/bulk-store', [RepositoryOnedriveAccessController::class, 'bulkStore']);
    Route::post('/bulk-update', [RepositoryOnedriveAccessController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RepositoryOnedriveAccessController::class, 'bulkDestroy']);

    Route::get('/trashed', [RepositoryOnedriveAccessController::class, 'trashed']);
    Route::post('/{id}/restore', [RepositoryOnedriveAccessController::class, 'restore']);
    Route::delete('/{id}/force', [RepositoryOnedriveAccessController::class, 'forceDelete']);

    Route::get('/', [RepositoryOnedriveAccessController::class, 'index']);
    Route::post('/', [RepositoryOnedriveAccessController::class, 'store']);
    Route::get('/{id}', [RepositoryOnedriveAccessController::class, 'show']);
    Route::put('/{id}', [RepositoryOnedriveAccessController::class, 'update']);
    Route::delete('/{id}', [RepositoryOnedriveAccessController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RepositoryOnedriveAccessController::class, 'duplicate']);
    Route::get('/{id}/stats', [RepositoryOnedriveAccessController::class, 'stats']);
});

// ========================
// SCALE RESOURCE
// ========================
Route::prefix('scale')->group(function () {
    use App\Http\Controllers\Api\V1\ScaleController;

    Route::get('/filters', [ScaleController::class, 'filters']);
    Route::get('/suggestions', [ScaleController::class, 'suggestions']);
    Route::post('/advanced-search', [ScaleController::class, 'advancedSearch']);

    Route::get('/import-template', [ScaleController::class, 'importTemplate']);
    Route::post('/import', [ScaleController::class, 'import']);
    Route::get('/export', [ScaleController::class, 'export']);

    Route::post('/bulk-store', [ScaleController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScaleController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScaleController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScaleController::class, 'trashed']);
    Route::post('/{id}/restore', [ScaleController::class, 'restore']);
    Route::delete('/{id}/force', [ScaleController::class, 'forceDelete']);

    Route::get('/', [ScaleController::class, 'index']);
    Route::post('/', [ScaleController::class, 'store']);
    Route::get('/{id}', [ScaleController::class, 'show']);
    Route::put('/{id}', [ScaleController::class, 'update']);
    Route::delete('/{id}', [ScaleController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScaleController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScaleController::class, 'stats']);
});

// ========================
// QUIZACCESS_SEB_TEMPLATE RESOURCE
// ========================
Route::prefix('quizaccess-seb-template')->group(function () {
    use App\Http\Controllers\Api\V1\QuizaccessSebTemplateController;

    Route::get('/filters', [QuizaccessSebTemplateController::class, 'filters']);
    Route::get('/suggestions', [QuizaccessSebTemplateController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizaccessSebTemplateController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizaccessSebTemplateController::class, 'importTemplate']);
    Route::post('/import', [QuizaccessSebTemplateController::class, 'import']);
    Route::get('/export', [QuizaccessSebTemplateController::class, 'export']);

    Route::post('/bulk-store', [QuizaccessSebTemplateController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizaccessSebTemplateController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizaccessSebTemplateController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizaccessSebTemplateController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizaccessSebTemplateController::class, 'restore']);
    Route::delete('/{id}/force', [QuizaccessSebTemplateController::class, 'forceDelete']);

    Route::get('/', [QuizaccessSebTemplateController::class, 'index']);
    Route::post('/', [QuizaccessSebTemplateController::class, 'store']);
    Route::get('/{id}', [QuizaccessSebTemplateController::class, 'show']);
    Route::put('/{id}', [QuizaccessSebTemplateController::class, 'update']);
    Route::delete('/{id}', [QuizaccessSebTemplateController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizaccessSebTemplateController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizaccessSebTemplateController::class, 'stats']);
});

// ========================
// BLOG_EXTERNAL RESOURCE
// ========================
Route::prefix('blog-external')->group(function () {
    use App\Http\Controllers\Api\V1\BlogExternalController;

    Route::get('/filters', [BlogExternalController::class, 'filters']);
    Route::get('/suggestions', [BlogExternalController::class, 'suggestions']);
    Route::post('/advanced-search', [BlogExternalController::class, 'advancedSearch']);

    Route::get('/import-template', [BlogExternalController::class, 'importTemplate']);
    Route::post('/import', [BlogExternalController::class, 'import']);
    Route::get('/export', [BlogExternalController::class, 'export']);

    Route::post('/bulk-store', [BlogExternalController::class, 'bulkStore']);
    Route::post('/bulk-update', [BlogExternalController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BlogExternalController::class, 'bulkDestroy']);

    Route::get('/trashed', [BlogExternalController::class, 'trashed']);
    Route::post('/{id}/restore', [BlogExternalController::class, 'restore']);
    Route::delete('/{id}/force', [BlogExternalController::class, 'forceDelete']);

    Route::get('/', [BlogExternalController::class, 'index']);
    Route::post('/', [BlogExternalController::class, 'store']);
    Route::get('/{id}', [BlogExternalController::class, 'show']);
    Route::put('/{id}', [BlogExternalController::class, 'update']);
    Route::delete('/{id}', [BlogExternalController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BlogExternalController::class, 'duplicate']);
    Route::get('/{id}/stats', [BlogExternalController::class, 'stats']);
});

// ========================
// COMPETENCY_USEREVIDENCE RESOURCE
// ========================
Route::prefix('competency-userevidence')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyUserevidenceController;

    Route::get('/filters', [CompetencyUserevidenceController::class, 'filters']);
    Route::get('/suggestions', [CompetencyUserevidenceController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyUserevidenceController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyUserevidenceController::class, 'importTemplate']);
    Route::post('/import', [CompetencyUserevidenceController::class, 'import']);
    Route::get('/export', [CompetencyUserevidenceController::class, 'export']);

    Route::post('/bulk-store', [CompetencyUserevidenceController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyUserevidenceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyUserevidenceController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyUserevidenceController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyUserevidenceController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyUserevidenceController::class, 'forceDelete']);

    Route::get('/', [CompetencyUserevidenceController::class, 'index']);
    Route::post('/', [CompetencyUserevidenceController::class, 'store']);
    Route::get('/{id}', [CompetencyUserevidenceController::class, 'show']);
    Route::put('/{id}', [CompetencyUserevidenceController::class, 'update']);
    Route::delete('/{id}', [CompetencyUserevidenceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyUserevidenceController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyUserevidenceController::class, 'stats']);
});

// ========================
// COMMENTS RESOURCE
// ========================
Route::prefix('comments')->group(function () {
    use App\Http\Controllers\Api\V1\CommentsController;

    Route::get('/filters', [CommentsController::class, 'filters']);
    Route::get('/suggestions', [CommentsController::class, 'suggestions']);
    Route::post('/advanced-search', [CommentsController::class, 'advancedSearch']);

    Route::get('/import-template', [CommentsController::class, 'importTemplate']);
    Route::post('/import', [CommentsController::class, 'import']);
    Route::get('/export', [CommentsController::class, 'export']);

    Route::post('/bulk-store', [CommentsController::class, 'bulkStore']);
    Route::post('/bulk-update', [CommentsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CommentsController::class, 'bulkDestroy']);

    Route::get('/trashed', [CommentsController::class, 'trashed']);
    Route::post('/{id}/restore', [CommentsController::class, 'restore']);
    Route::delete('/{id}/force', [CommentsController::class, 'forceDelete']);

    Route::get('/', [CommentsController::class, 'index']);
    Route::post('/', [CommentsController::class, 'store']);
    Route::get('/{id}', [CommentsController::class, 'show']);
    Route::put('/{id}', [CommentsController::class, 'update']);
    Route::delete('/{id}', [CommentsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CommentsController::class, 'duplicate']);
    Route::get('/{id}/stats', [CommentsController::class, 'stats']);
});

// ========================
// MESSAGEINBOUND_MESSAGELIST RESOURCE
// ========================
Route::prefix('messageinbound-messagelist')->group(function () {
    use App\Http\Controllers\Api\V1\MessageinboundMessagelistController;

    Route::get('/filters', [MessageinboundMessagelistController::class, 'filters']);
    Route::get('/suggestions', [MessageinboundMessagelistController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageinboundMessagelistController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageinboundMessagelistController::class, 'importTemplate']);
    Route::post('/import', [MessageinboundMessagelistController::class, 'import']);
    Route::get('/export', [MessageinboundMessagelistController::class, 'export']);

    Route::post('/bulk-store', [MessageinboundMessagelistController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageinboundMessagelistController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageinboundMessagelistController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageinboundMessagelistController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageinboundMessagelistController::class, 'restore']);
    Route::delete('/{id}/force', [MessageinboundMessagelistController::class, 'forceDelete']);

    Route::get('/', [MessageinboundMessagelistController::class, 'index']);
    Route::post('/', [MessageinboundMessagelistController::class, 'store']);
    Route::get('/{id}', [MessageinboundMessagelistController::class, 'show']);
    Route::put('/{id}', [MessageinboundMessagelistController::class, 'update']);
    Route::delete('/{id}', [MessageinboundMessagelistController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageinboundMessagelistController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageinboundMessagelistController::class, 'stats']);
});

// ========================
// TOOL_DATAPRIVACY_REQUEST RESOURCE
// ========================
Route::prefix('tool-dataprivacy-request')->group(function () {
    use App\Http\Controllers\Api\V1\ToolDataprivacyRequestController;

    Route::get('/filters', [ToolDataprivacyRequestController::class, 'filters']);
    Route::get('/suggestions', [ToolDataprivacyRequestController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolDataprivacyRequestController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolDataprivacyRequestController::class, 'importTemplate']);
    Route::post('/import', [ToolDataprivacyRequestController::class, 'import']);
    Route::get('/export', [ToolDataprivacyRequestController::class, 'export']);

    Route::post('/bulk-store', [ToolDataprivacyRequestController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolDataprivacyRequestController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolDataprivacyRequestController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolDataprivacyRequestController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolDataprivacyRequestController::class, 'restore']);
    Route::delete('/{id}/force', [ToolDataprivacyRequestController::class, 'forceDelete']);

    Route::get('/', [ToolDataprivacyRequestController::class, 'index']);
    Route::post('/', [ToolDataprivacyRequestController::class, 'store']);
    Route::get('/{id}', [ToolDataprivacyRequestController::class, 'show']);
    Route::put('/{id}', [ToolDataprivacyRequestController::class, 'update']);
    Route::delete('/{id}', [ToolDataprivacyRequestController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolDataprivacyRequestController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolDataprivacyRequestController::class, 'stats']);
});

// ========================
// COMPETENCY_TEMPLATECOHORT RESOURCE
// ========================
Route::prefix('competency-templatecohort')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyTemplatecohortController;

    Route::get('/filters', [CompetencyTemplatecohortController::class, 'filters']);
    Route::get('/suggestions', [CompetencyTemplatecohortController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyTemplatecohortController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyTemplatecohortController::class, 'importTemplate']);
    Route::post('/import', [CompetencyTemplatecohortController::class, 'import']);
    Route::get('/export', [CompetencyTemplatecohortController::class, 'export']);

    Route::post('/bulk-store', [CompetencyTemplatecohortController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyTemplatecohortController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyTemplatecohortController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyTemplatecohortController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyTemplatecohortController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyTemplatecohortController::class, 'forceDelete']);

    Route::get('/', [CompetencyTemplatecohortController::class, 'index']);
    Route::post('/', [CompetencyTemplatecohortController::class, 'store']);
    Route::get('/{id}', [CompetencyTemplatecohortController::class, 'show']);
    Route::put('/{id}', [CompetencyTemplatecohortController::class, 'update']);
    Route::delete('/{id}', [CompetencyTemplatecohortController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyTemplatecohortController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyTemplatecohortController::class, 'stats']);
});

// ========================
// COMPETENCY_PLAN RESOURCE
// ========================
Route::prefix('competency-plan')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyPlanController;

    Route::get('/filters', [CompetencyPlanController::class, 'filters']);
    Route::get('/suggestions', [CompetencyPlanController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyPlanController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyPlanController::class, 'importTemplate']);
    Route::post('/import', [CompetencyPlanController::class, 'import']);
    Route::get('/export', [CompetencyPlanController::class, 'export']);

    Route::post('/bulk-store', [CompetencyPlanController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyPlanController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyPlanController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyPlanController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyPlanController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyPlanController::class, 'forceDelete']);

    Route::get('/', [CompetencyPlanController::class, 'index']);
    Route::post('/', [CompetencyPlanController::class, 'store']);
    Route::get('/{id}', [CompetencyPlanController::class, 'show']);
    Route::put('/{id}', [CompetencyPlanController::class, 'update']);
    Route::delete('/{id}', [CompetencyPlanController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyPlanController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyPlanController::class, 'stats']);
});

// ========================
// USER_PASSWORD_HISTORY RESOURCE
// ========================
Route::prefix('user-password-history')->group(function () {
    use App\Http\Controllers\Api\V1\UserPasswordHistoryController;

    Route::get('/filters', [UserPasswordHistoryController::class, 'filters']);
    Route::get('/suggestions', [UserPasswordHistoryController::class, 'suggestions']);
    Route::post('/advanced-search', [UserPasswordHistoryController::class, 'advancedSearch']);

    Route::get('/import-template', [UserPasswordHistoryController::class, 'importTemplate']);
    Route::post('/import', [UserPasswordHistoryController::class, 'import']);
    Route::get('/export', [UserPasswordHistoryController::class, 'export']);

    Route::post('/bulk-store', [UserPasswordHistoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [UserPasswordHistoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UserPasswordHistoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [UserPasswordHistoryController::class, 'trashed']);
    Route::post('/{id}/restore', [UserPasswordHistoryController::class, 'restore']);
    Route::delete('/{id}/force', [UserPasswordHistoryController::class, 'forceDelete']);

    Route::get('/', [UserPasswordHistoryController::class, 'index']);
    Route::post('/', [UserPasswordHistoryController::class, 'store']);
    Route::get('/{id}', [UserPasswordHistoryController::class, 'show']);
    Route::put('/{id}', [UserPasswordHistoryController::class, 'update']);
    Route::delete('/{id}', [UserPasswordHistoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UserPasswordHistoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [UserPasswordHistoryController::class, 'stats']);
});

// ========================
// USER_PASSWORD_RESETS RESOURCE
// ========================
Route::prefix('user-password-resets')->group(function () {
    use App\Http\Controllers\Api\V1\UserPasswordResetsController;

    Route::get('/filters', [UserPasswordResetsController::class, 'filters']);
    Route::get('/suggestions', [UserPasswordResetsController::class, 'suggestions']);
    Route::post('/advanced-search', [UserPasswordResetsController::class, 'advancedSearch']);

    Route::get('/import-template', [UserPasswordResetsController::class, 'importTemplate']);
    Route::post('/import', [UserPasswordResetsController::class, 'import']);
    Route::get('/export', [UserPasswordResetsController::class, 'export']);

    Route::post('/bulk-store', [UserPasswordResetsController::class, 'bulkStore']);
    Route::post('/bulk-update', [UserPasswordResetsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UserPasswordResetsController::class, 'bulkDestroy']);

    Route::get('/trashed', [UserPasswordResetsController::class, 'trashed']);
    Route::post('/{id}/restore', [UserPasswordResetsController::class, 'restore']);
    Route::delete('/{id}/force', [UserPasswordResetsController::class, 'forceDelete']);

    Route::get('/', [UserPasswordResetsController::class, 'index']);
    Route::post('/', [UserPasswordResetsController::class, 'store']);
    Route::get('/{id}', [UserPasswordResetsController::class, 'show']);
    Route::put('/{id}', [UserPasswordResetsController::class, 'update']);
    Route::delete('/{id}', [UserPasswordResetsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UserPasswordResetsController::class, 'duplicate']);
    Route::get('/{id}/stats', [UserPasswordResetsController::class, 'stats']);
});

// ========================
// ASSIGNFEEDBACK_EDITPDF_QUICK RESOURCE
// ========================
Route::prefix('assignfeedback-editpdf-quick')->group(function () {
    use App\Http\Controllers\Api\V1\AssignfeedbackEditpdfQuickController;

    Route::get('/filters', [AssignfeedbackEditpdfQuickController::class, 'filters']);
    Route::get('/suggestions', [AssignfeedbackEditpdfQuickController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignfeedbackEditpdfQuickController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignfeedbackEditpdfQuickController::class, 'importTemplate']);
    Route::post('/import', [AssignfeedbackEditpdfQuickController::class, 'import']);
    Route::get('/export', [AssignfeedbackEditpdfQuickController::class, 'export']);

    Route::post('/bulk-store', [AssignfeedbackEditpdfQuickController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignfeedbackEditpdfQuickController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignfeedbackEditpdfQuickController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignfeedbackEditpdfQuickController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignfeedbackEditpdfQuickController::class, 'restore']);
    Route::delete('/{id}/force', [AssignfeedbackEditpdfQuickController::class, 'forceDelete']);

    Route::get('/', [AssignfeedbackEditpdfQuickController::class, 'index']);
    Route::post('/', [AssignfeedbackEditpdfQuickController::class, 'store']);
    Route::get('/{id}', [AssignfeedbackEditpdfQuickController::class, 'show']);
    Route::put('/{id}', [AssignfeedbackEditpdfQuickController::class, 'update']);
    Route::delete('/{id}', [AssignfeedbackEditpdfQuickController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignfeedbackEditpdfQuickController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignfeedbackEditpdfQuickController::class, 'stats']);
});

// ========================
// CONFIG_LOG RESOURCE
// ========================
Route::prefix('config-log')->group(function () {
    use App\Http\Controllers\Api\V1\ConfigLogController;

    Route::get('/filters', [ConfigLogController::class, 'filters']);
    Route::get('/suggestions', [ConfigLogController::class, 'suggestions']);
    Route::post('/advanced-search', [ConfigLogController::class, 'advancedSearch']);

    Route::get('/import-template', [ConfigLogController::class, 'importTemplate']);
    Route::post('/import', [ConfigLogController::class, 'import']);
    Route::get('/export', [ConfigLogController::class, 'export']);

    Route::post('/bulk-store', [ConfigLogController::class, 'bulkStore']);
    Route::post('/bulk-update', [ConfigLogController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ConfigLogController::class, 'bulkDestroy']);

    Route::get('/trashed', [ConfigLogController::class, 'trashed']);
    Route::post('/{id}/restore', [ConfigLogController::class, 'restore']);
    Route::delete('/{id}/force', [ConfigLogController::class, 'forceDelete']);

    Route::get('/', [ConfigLogController::class, 'index']);
    Route::post('/', [ConfigLogController::class, 'store']);
    Route::get('/{id}', [ConfigLogController::class, 'show']);
    Route::put('/{id}', [ConfigLogController::class, 'update']);
    Route::delete('/{id}', [ConfigLogController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ConfigLogController::class, 'duplicate']);
    Route::get('/{id}/stats', [ConfigLogController::class, 'stats']);
});

// ========================
// BADGE RESOURCE
// ========================
Route::prefix('badge')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeController;

    Route::get('/filters', [BadgeController::class, 'filters']);
    Route::get('/suggestions', [BadgeController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeController::class, 'importTemplate']);
    Route::post('/import', [BadgeController::class, 'import']);
    Route::get('/export', [BadgeController::class, 'export']);

    Route::post('/bulk-store', [BadgeController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeController::class, 'forceDelete']);

    Route::get('/', [BadgeController::class, 'index']);
    Route::post('/', [BadgeController::class, 'store']);
    Route::get('/{id}', [BadgeController::class, 'show']);
    Route::put('/{id}', [BadgeController::class, 'update']);
    Route::delete('/{id}', [BadgeController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeController::class, 'stats']);
});

// ========================
// BACKUP_CONTROLLERS RESOURCE
// ========================
Route::prefix('backup-controllers')->group(function () {
    use App\Http\Controllers\Api\V1\BackupControllersController;

    Route::get('/filters', [BackupControllersController::class, 'filters']);
    Route::get('/suggestions', [BackupControllersController::class, 'suggestions']);
    Route::post('/advanced-search', [BackupControllersController::class, 'advancedSearch']);

    Route::get('/import-template', [BackupControllersController::class, 'importTemplate']);
    Route::post('/import', [BackupControllersController::class, 'import']);
    Route::get('/export', [BackupControllersController::class, 'export']);

    Route::post('/bulk-store', [BackupControllersController::class, 'bulkStore']);
    Route::post('/bulk-update', [BackupControllersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BackupControllersController::class, 'bulkDestroy']);

    Route::get('/trashed', [BackupControllersController::class, 'trashed']);
    Route::post('/{id}/restore', [BackupControllersController::class, 'restore']);
    Route::delete('/{id}/force', [BackupControllersController::class, 'forceDelete']);

    Route::get('/', [BackupControllersController::class, 'index']);
    Route::post('/', [BackupControllersController::class, 'store']);
    Route::get('/{id}', [BackupControllersController::class, 'show']);
    Route::put('/{id}', [BackupControllersController::class, 'update']);
    Route::delete('/{id}', [BackupControllersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BackupControllersController::class, 'duplicate']);
    Route::get('/{id}/stats', [BackupControllersController::class, 'stats']);
});

// ========================
// MESSAGE_USERS_BLOCKED RESOURCE
// ========================
Route::prefix('message-users-blocked')->group(function () {
    use App\Http\Controllers\Api\V1\MessageUsersBlockedController;

    Route::get('/filters', [MessageUsersBlockedController::class, 'filters']);
    Route::get('/suggestions', [MessageUsersBlockedController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageUsersBlockedController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageUsersBlockedController::class, 'importTemplate']);
    Route::post('/import', [MessageUsersBlockedController::class, 'import']);
    Route::get('/export', [MessageUsersBlockedController::class, 'export']);

    Route::post('/bulk-store', [MessageUsersBlockedController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageUsersBlockedController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageUsersBlockedController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageUsersBlockedController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageUsersBlockedController::class, 'restore']);
    Route::delete('/{id}/force', [MessageUsersBlockedController::class, 'forceDelete']);

    Route::get('/', [MessageUsersBlockedController::class, 'index']);
    Route::post('/', [MessageUsersBlockedController::class, 'store']);
    Route::get('/{id}', [MessageUsersBlockedController::class, 'show']);
    Route::put('/{id}', [MessageUsersBlockedController::class, 'update']);
    Route::delete('/{id}', [MessageUsersBlockedController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageUsersBlockedController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageUsersBlockedController::class, 'stats']);
});

// ========================
// COMPETENCY_USERCOMPCOURSE RESOURCE
// ========================
Route::prefix('competency-usercompcourse')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyUsercompcourseController;

    Route::get('/filters', [CompetencyUsercompcourseController::class, 'filters']);
    Route::get('/suggestions', [CompetencyUsercompcourseController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyUsercompcourseController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyUsercompcourseController::class, 'importTemplate']);
    Route::post('/import', [CompetencyUsercompcourseController::class, 'import']);
    Route::get('/export', [CompetencyUsercompcourseController::class, 'export']);

    Route::post('/bulk-store', [CompetencyUsercompcourseController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyUsercompcourseController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyUsercompcourseController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyUsercompcourseController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyUsercompcourseController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyUsercompcourseController::class, 'forceDelete']);

    Route::get('/', [CompetencyUsercompcourseController::class, 'index']);
    Route::post('/', [CompetencyUsercompcourseController::class, 'store']);
    Route::get('/{id}', [CompetencyUsercompcourseController::class, 'show']);
    Route::put('/{id}', [CompetencyUsercompcourseController::class, 'update']);
    Route::delete('/{id}', [CompetencyUsercompcourseController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyUsercompcourseController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyUsercompcourseController::class, 'stats']);
});

// ========================
// COMPETENCY_USEREVIDENCECOMP RESOURCE
// ========================
Route::prefix('competency-userevidencecomp')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyUserevidencecompController;

    Route::get('/filters', [CompetencyUserevidencecompController::class, 'filters']);
    Route::get('/suggestions', [CompetencyUserevidencecompController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyUserevidencecompController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyUserevidencecompController::class, 'importTemplate']);
    Route::post('/import', [CompetencyUserevidencecompController::class, 'import']);
    Route::get('/export', [CompetencyUserevidencecompController::class, 'export']);

    Route::post('/bulk-store', [CompetencyUserevidencecompController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyUserevidencecompController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyUserevidencecompController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyUserevidencecompController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyUserevidencecompController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyUserevidencecompController::class, 'forceDelete']);

    Route::get('/', [CompetencyUserevidencecompController::class, 'index']);
    Route::post('/', [CompetencyUserevidencecompController::class, 'store']);
    Route::get('/{id}', [CompetencyUserevidencecompController::class, 'show']);
    Route::put('/{id}', [CompetencyUserevidencecompController::class, 'update']);
    Route::delete('/{id}', [CompetencyUserevidencecompController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyUserevidencecompController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyUserevidencecompController::class, 'stats']);
});

// ========================
// AUTH_LTI_LINKED_LOGIN RESOURCE
// ========================
Route::prefix('auth-lti-linked-login')->group(function () {
    use App\Http\Controllers\Api\V1\AuthLtiLinkedLoginController;

    Route::get('/filters', [AuthLtiLinkedLoginController::class, 'filters']);
    Route::get('/suggestions', [AuthLtiLinkedLoginController::class, 'suggestions']);
    Route::post('/advanced-search', [AuthLtiLinkedLoginController::class, 'advancedSearch']);

    Route::get('/import-template', [AuthLtiLinkedLoginController::class, 'importTemplate']);
    Route::post('/import', [AuthLtiLinkedLoginController::class, 'import']);
    Route::get('/export', [AuthLtiLinkedLoginController::class, 'export']);

    Route::post('/bulk-store', [AuthLtiLinkedLoginController::class, 'bulkStore']);
    Route::post('/bulk-update', [AuthLtiLinkedLoginController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AuthLtiLinkedLoginController::class, 'bulkDestroy']);

    Route::get('/trashed', [AuthLtiLinkedLoginController::class, 'trashed']);
    Route::post('/{id}/restore', [AuthLtiLinkedLoginController::class, 'restore']);
    Route::delete('/{id}/force', [AuthLtiLinkedLoginController::class, 'forceDelete']);

    Route::get('/', [AuthLtiLinkedLoginController::class, 'index']);
    Route::post('/', [AuthLtiLinkedLoginController::class, 'store']);
    Route::get('/{id}', [AuthLtiLinkedLoginController::class, 'show']);
    Route::put('/{id}', [AuthLtiLinkedLoginController::class, 'update']);
    Route::delete('/{id}', [AuthLtiLinkedLoginController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AuthLtiLinkedLoginController::class, 'duplicate']);
    Route::get('/{id}/stats', [AuthLtiLinkedLoginController::class, 'stats']);
});

// ========================
// TASK_LOG RESOURCE
// ========================
Route::prefix('task-log')->group(function () {
    use App\Http\Controllers\Api\V1\TaskLogController;

    Route::get('/filters', [TaskLogController::class, 'filters']);
    Route::get('/suggestions', [TaskLogController::class, 'suggestions']);
    Route::post('/advanced-search', [TaskLogController::class, 'advancedSearch']);

    Route::get('/import-template', [TaskLogController::class, 'importTemplate']);
    Route::post('/import', [TaskLogController::class, 'import']);
    Route::get('/export', [TaskLogController::class, 'export']);

    Route::post('/bulk-store', [TaskLogController::class, 'bulkStore']);
    Route::post('/bulk-update', [TaskLogController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [TaskLogController::class, 'bulkDestroy']);

    Route::get('/trashed', [TaskLogController::class, 'trashed']);
    Route::post('/{id}/restore', [TaskLogController::class, 'restore']);
    Route::delete('/{id}/force', [TaskLogController::class, 'forceDelete']);

    Route::get('/', [TaskLogController::class, 'index']);
    Route::post('/', [TaskLogController::class, 'store']);
    Route::get('/{id}', [TaskLogController::class, 'show']);
    Route::put('/{id}', [TaskLogController::class, 'update']);
    Route::delete('/{id}', [TaskLogController::class, 'destroy']);

    Route::post('/{id}/duplicate', [TaskLogController::class, 'duplicate']);
    Route::get('/{id}/stats', [TaskLogController::class, 'stats']);
});

// ========================
// COMPETENCY_PLANCOMP RESOURCE
// ========================
Route::prefix('competency-plancomp')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyPlancompController;

    Route::get('/filters', [CompetencyPlancompController::class, 'filters']);
    Route::get('/suggestions', [CompetencyPlancompController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyPlancompController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyPlancompController::class, 'importTemplate']);
    Route::post('/import', [CompetencyPlancompController::class, 'import']);
    Route::get('/export', [CompetencyPlancompController::class, 'export']);

    Route::post('/bulk-store', [CompetencyPlancompController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyPlancompController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyPlancompController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyPlancompController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyPlancompController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyPlancompController::class, 'forceDelete']);

    Route::get('/', [CompetencyPlancompController::class, 'index']);
    Route::post('/', [CompetencyPlancompController::class, 'store']);
    Route::get('/{id}', [CompetencyPlancompController::class, 'show']);
    Route::put('/{id}', [CompetencyPlancompController::class, 'update']);
    Route::delete('/{id}', [CompetencyPlancompController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyPlancompController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyPlancompController::class, 'stats']);
});

// ========================
// USER_DEVICES RESOURCE
// ========================
Route::prefix('user-devices')->group(function () {
    use App\Http\Controllers\Api\V1\UserDevicesController;

    Route::get('/filters', [UserDevicesController::class, 'filters']);
    Route::get('/suggestions', [UserDevicesController::class, 'suggestions']);
    Route::post('/advanced-search', [UserDevicesController::class, 'advancedSearch']);

    Route::get('/import-template', [UserDevicesController::class, 'importTemplate']);
    Route::post('/import', [UserDevicesController::class, 'import']);
    Route::get('/export', [UserDevicesController::class, 'export']);

    Route::post('/bulk-store', [UserDevicesController::class, 'bulkStore']);
    Route::post('/bulk-update', [UserDevicesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UserDevicesController::class, 'bulkDestroy']);

    Route::get('/trashed', [UserDevicesController::class, 'trashed']);
    Route::post('/{id}/restore', [UserDevicesController::class, 'restore']);
    Route::delete('/{id}/force', [UserDevicesController::class, 'forceDelete']);

    Route::get('/', [UserDevicesController::class, 'index']);
    Route::post('/', [UserDevicesController::class, 'store']);
    Route::get('/{id}', [UserDevicesController::class, 'show']);
    Route::put('/{id}', [UserDevicesController::class, 'update']);
    Route::delete('/{id}', [UserDevicesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UserDevicesController::class, 'duplicate']);
    Route::get('/{id}/stats', [UserDevicesController::class, 'stats']);
});

// ========================
// NOTIFICATIONS RESOURCE
// ========================
Route::prefix('notifications')->group(function () {
    use App\Http\Controllers\Api\V1\NotificationsController;

    Route::get('/filters', [NotificationsController::class, 'filters']);
    Route::get('/suggestions', [NotificationsController::class, 'suggestions']);
    Route::post('/advanced-search', [NotificationsController::class, 'advancedSearch']);

    Route::get('/import-template', [NotificationsController::class, 'importTemplate']);
    Route::post('/import', [NotificationsController::class, 'import']);
    Route::get('/export', [NotificationsController::class, 'export']);

    Route::post('/bulk-store', [NotificationsController::class, 'bulkStore']);
    Route::post('/bulk-update', [NotificationsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [NotificationsController::class, 'bulkDestroy']);

    Route::get('/trashed', [NotificationsController::class, 'trashed']);
    Route::post('/{id}/restore', [NotificationsController::class, 'restore']);
    Route::delete('/{id}/force', [NotificationsController::class, 'forceDelete']);

    Route::get('/', [NotificationsController::class, 'index']);
    Route::post('/', [NotificationsController::class, 'store']);
    Route::get('/{id}', [NotificationsController::class, 'show']);
    Route::put('/{id}', [NotificationsController::class, 'update']);
    Route::delete('/{id}', [NotificationsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [NotificationsController::class, 'duplicate']);
    Route::get('/{id}/stats', [NotificationsController::class, 'stats']);
});

// ========================
// QUESTION RESOURCE
// ========================
Route::prefix('question')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionController;

    Route::get('/filters', [QuestionController::class, 'filters']);
    Route::get('/suggestions', [QuestionController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionController::class, 'importTemplate']);
    Route::post('/import', [QuestionController::class, 'import']);
    Route::get('/export', [QuestionController::class, 'export']);

    Route::post('/bulk-store', [QuestionController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionController::class, 'forceDelete']);

    Route::get('/', [QuestionController::class, 'index']);
    Route::post('/', [QuestionController::class, 'store']);
    Route::get('/{id}', [QuestionController::class, 'show']);
    Route::put('/{id}', [QuestionController::class, 'update']);
    Route::delete('/{id}', [QuestionController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionController::class, 'stats']);
});

// ========================
// USER_PRIVATE_KEY RESOURCE
// ========================
Route::prefix('user-private-key')->group(function () {
    use App\Http\Controllers\Api\V1\UserPrivateKeyController;

    Route::get('/filters', [UserPrivateKeyController::class, 'filters']);
    Route::get('/suggestions', [UserPrivateKeyController::class, 'suggestions']);
    Route::post('/advanced-search', [UserPrivateKeyController::class, 'advancedSearch']);

    Route::get('/import-template', [UserPrivateKeyController::class, 'importTemplate']);
    Route::post('/import', [UserPrivateKeyController::class, 'import']);
    Route::get('/export', [UserPrivateKeyController::class, 'export']);

    Route::post('/bulk-store', [UserPrivateKeyController::class, 'bulkStore']);
    Route::post('/bulk-update', [UserPrivateKeyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UserPrivateKeyController::class, 'bulkDestroy']);

    Route::get('/trashed', [UserPrivateKeyController::class, 'trashed']);
    Route::post('/{id}/restore', [UserPrivateKeyController::class, 'restore']);
    Route::delete('/{id}/force', [UserPrivateKeyController::class, 'forceDelete']);

    Route::get('/', [UserPrivateKeyController::class, 'index']);
    Route::post('/', [UserPrivateKeyController::class, 'store']);
    Route::get('/{id}', [UserPrivateKeyController::class, 'show']);
    Route::put('/{id}', [UserPrivateKeyController::class, 'update']);
    Route::delete('/{id}', [UserPrivateKeyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UserPrivateKeyController::class, 'duplicate']);
    Route::get('/{id}/stats', [UserPrivateKeyController::class, 'stats']);
});

// ========================
// MESSAGE_CONTACTS RESOURCE
// ========================
Route::prefix('message-contacts')->group(function () {
    use App\Http\Controllers\Api\V1\MessageContactsController;

    Route::get('/filters', [MessageContactsController::class, 'filters']);
    Route::get('/suggestions', [MessageContactsController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageContactsController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageContactsController::class, 'importTemplate']);
    Route::post('/import', [MessageContactsController::class, 'import']);
    Route::get('/export', [MessageContactsController::class, 'export']);

    Route::post('/bulk-store', [MessageContactsController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageContactsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageContactsController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageContactsController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageContactsController::class, 'restore']);
    Route::delete('/{id}/force', [MessageContactsController::class, 'forceDelete']);

    Route::get('/', [MessageContactsController::class, 'index']);
    Route::post('/', [MessageContactsController::class, 'store']);
    Route::get('/{id}', [MessageContactsController::class, 'show']);
    Route::put('/{id}', [MessageContactsController::class, 'update']);
    Route::delete('/{id}', [MessageContactsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageContactsController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageContactsController::class, 'stats']);
});

// ========================
// OAUTH2_ACCESS_TOKEN RESOURCE
// ========================
Route::prefix('oauth2-access-token')->group(function () {
    use App\Http\Controllers\Api\V1\Oauth2AccessTokenController;

    Route::get('/filters', [Oauth2AccessTokenController::class, 'filters']);
    Route::get('/suggestions', [Oauth2AccessTokenController::class, 'suggestions']);
    Route::post('/advanced-search', [Oauth2AccessTokenController::class, 'advancedSearch']);

    Route::get('/import-template', [Oauth2AccessTokenController::class, 'importTemplate']);
    Route::post('/import', [Oauth2AccessTokenController::class, 'import']);
    Route::get('/export', [Oauth2AccessTokenController::class, 'export']);

    Route::post('/bulk-store', [Oauth2AccessTokenController::class, 'bulkStore']);
    Route::post('/bulk-update', [Oauth2AccessTokenController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [Oauth2AccessTokenController::class, 'bulkDestroy']);

    Route::get('/trashed', [Oauth2AccessTokenController::class, 'trashed']);
    Route::post('/{id}/restore', [Oauth2AccessTokenController::class, 'restore']);
    Route::delete('/{id}/force', [Oauth2AccessTokenController::class, 'forceDelete']);

    Route::get('/', [Oauth2AccessTokenController::class, 'index']);
    Route::post('/', [Oauth2AccessTokenController::class, 'store']);
    Route::get('/{id}', [Oauth2AccessTokenController::class, 'show']);
    Route::put('/{id}', [Oauth2AccessTokenController::class, 'update']);
    Route::delete('/{id}', [Oauth2AccessTokenController::class, 'destroy']);

    Route::post('/{id}/duplicate', [Oauth2AccessTokenController::class, 'duplicate']);
    Route::get('/{id}/stats', [Oauth2AccessTokenController::class, 'stats']);
});

// ========================
// ANALYTICS_MODELS RESOURCE
// ========================
Route::prefix('analytics-models')->group(function () {
    use App\Http\Controllers\Api\V1\AnalyticsModelsController;

    Route::get('/filters', [AnalyticsModelsController::class, 'filters']);
    Route::get('/suggestions', [AnalyticsModelsController::class, 'suggestions']);
    Route::post('/advanced-search', [AnalyticsModelsController::class, 'advancedSearch']);

    Route::get('/import-template', [AnalyticsModelsController::class, 'importTemplate']);
    Route::post('/import', [AnalyticsModelsController::class, 'import']);
    Route::get('/export', [AnalyticsModelsController::class, 'export']);

    Route::post('/bulk-store', [AnalyticsModelsController::class, 'bulkStore']);
    Route::post('/bulk-update', [AnalyticsModelsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AnalyticsModelsController::class, 'bulkDestroy']);

    Route::get('/trashed', [AnalyticsModelsController::class, 'trashed']);
    Route::post('/{id}/restore', [AnalyticsModelsController::class, 'restore']);
    Route::delete('/{id}/force', [AnalyticsModelsController::class, 'forceDelete']);

    Route::get('/', [AnalyticsModelsController::class, 'index']);
    Route::post('/', [AnalyticsModelsController::class, 'store']);
    Route::get('/{id}', [AnalyticsModelsController::class, 'show']);
    Route::put('/{id}', [AnalyticsModelsController::class, 'update']);
    Route::delete('/{id}', [AnalyticsModelsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AnalyticsModelsController::class, 'duplicate']);
    Route::get('/{id}/stats', [AnalyticsModelsController::class, 'stats']);
});

// ========================
// UPGRADE_LOG RESOURCE
// ========================
Route::prefix('upgrade-log')->group(function () {
    use App\Http\Controllers\Api\V1\UpgradeLogController;

    Route::get('/filters', [UpgradeLogController::class, 'filters']);
    Route::get('/suggestions', [UpgradeLogController::class, 'suggestions']);
    Route::post('/advanced-search', [UpgradeLogController::class, 'advancedSearch']);

    Route::get('/import-template', [UpgradeLogController::class, 'importTemplate']);
    Route::post('/import', [UpgradeLogController::class, 'import']);
    Route::get('/export', [UpgradeLogController::class, 'export']);

    Route::post('/bulk-store', [UpgradeLogController::class, 'bulkStore']);
    Route::post('/bulk-update', [UpgradeLogController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UpgradeLogController::class, 'bulkDestroy']);

    Route::get('/trashed', [UpgradeLogController::class, 'trashed']);
    Route::post('/{id}/restore', [UpgradeLogController::class, 'restore']);
    Route::delete('/{id}/force', [UpgradeLogController::class, 'forceDelete']);

    Route::get('/', [UpgradeLogController::class, 'index']);
    Route::post('/', [UpgradeLogController::class, 'store']);
    Route::get('/{id}', [UpgradeLogController::class, 'show']);
    Route::put('/{id}', [UpgradeLogController::class, 'update']);
    Route::delete('/{id}', [UpgradeLogController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UpgradeLogController::class, 'duplicate']);
    Route::get('/{id}/stats', [UpgradeLogController::class, 'stats']);
});

// ========================
// OAUTH2_SYSTEM_ACCOUNT RESOURCE
// ========================
Route::prefix('oauth2-system-account')->group(function () {
    use App\Http\Controllers\Api\V1\Oauth2SystemAccountController;

    Route::get('/filters', [Oauth2SystemAccountController::class, 'filters']);
    Route::get('/suggestions', [Oauth2SystemAccountController::class, 'suggestions']);
    Route::post('/advanced-search', [Oauth2SystemAccountController::class, 'advancedSearch']);

    Route::get('/import-template', [Oauth2SystemAccountController::class, 'importTemplate']);
    Route::post('/import', [Oauth2SystemAccountController::class, 'import']);
    Route::get('/export', [Oauth2SystemAccountController::class, 'export']);

    Route::post('/bulk-store', [Oauth2SystemAccountController::class, 'bulkStore']);
    Route::post('/bulk-update', [Oauth2SystemAccountController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [Oauth2SystemAccountController::class, 'bulkDestroy']);

    Route::get('/trashed', [Oauth2SystemAccountController::class, 'trashed']);
    Route::post('/{id}/restore', [Oauth2SystemAccountController::class, 'restore']);
    Route::delete('/{id}/force', [Oauth2SystemAccountController::class, 'forceDelete']);

    Route::get('/', [Oauth2SystemAccountController::class, 'index']);
    Route::post('/', [Oauth2SystemAccountController::class, 'store']);
    Route::get('/{id}', [Oauth2SystemAccountController::class, 'show']);
    Route::put('/{id}', [Oauth2SystemAccountController::class, 'update']);
    Route::delete('/{id}', [Oauth2SystemAccountController::class, 'destroy']);

    Route::post('/{id}/duplicate', [Oauth2SystemAccountController::class, 'duplicate']);
    Route::get('/{id}/stats', [Oauth2SystemAccountController::class, 'stats']);
});

// ========================
// TOOL_MFA_SECRETS RESOURCE
// ========================
Route::prefix('tool-mfa-secrets')->group(function () {
    use App\Http\Controllers\Api\V1\ToolMfaSecretsController;

    Route::get('/filters', [ToolMfaSecretsController::class, 'filters']);
    Route::get('/suggestions', [ToolMfaSecretsController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolMfaSecretsController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolMfaSecretsController::class, 'importTemplate']);
    Route::post('/import', [ToolMfaSecretsController::class, 'import']);
    Route::get('/export', [ToolMfaSecretsController::class, 'export']);

    Route::post('/bulk-store', [ToolMfaSecretsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolMfaSecretsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolMfaSecretsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolMfaSecretsController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolMfaSecretsController::class, 'restore']);
    Route::delete('/{id}/force', [ToolMfaSecretsController::class, 'forceDelete']);

    Route::get('/', [ToolMfaSecretsController::class, 'index']);
    Route::post('/', [ToolMfaSecretsController::class, 'store']);
    Route::get('/{id}', [ToolMfaSecretsController::class, 'show']);
    Route::put('/{id}', [ToolMfaSecretsController::class, 'update']);
    Route::delete('/{id}', [ToolMfaSecretsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolMfaSecretsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolMfaSecretsController::class, 'stats']);
});

// ========================
// COMPETENCY_USERCOMP RESOURCE
// ========================
Route::prefix('competency-usercomp')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyUsercompController;

    Route::get('/filters', [CompetencyUsercompController::class, 'filters']);
    Route::get('/suggestions', [CompetencyUsercompController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyUsercompController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyUsercompController::class, 'importTemplate']);
    Route::post('/import', [CompetencyUsercompController::class, 'import']);
    Route::get('/export', [CompetencyUsercompController::class, 'export']);

    Route::post('/bulk-store', [CompetencyUsercompController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyUsercompController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyUsercompController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyUsercompController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyUsercompController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyUsercompController::class, 'forceDelete']);

    Route::get('/', [CompetencyUsercompController::class, 'index']);
    Route::post('/', [CompetencyUsercompController::class, 'store']);
    Route::get('/{id}', [CompetencyUsercompController::class, 'show']);
    Route::put('/{id}', [CompetencyUsercompController::class, 'update']);
    Route::delete('/{id}', [CompetencyUsercompController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyUsercompController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyUsercompController::class, 'stats']);
});

// ========================
// ROLE_ALLOW_SWITCH RESOURCE
// ========================
Route::prefix('role-allow-switch')->group(function () {
    use App\Http\Controllers\Api\V1\RoleAllowSwitchController;

    Route::get('/filters', [RoleAllowSwitchController::class, 'filters']);
    Route::get('/suggestions', [RoleAllowSwitchController::class, 'suggestions']);
    Route::post('/advanced-search', [RoleAllowSwitchController::class, 'advancedSearch']);

    Route::get('/import-template', [RoleAllowSwitchController::class, 'importTemplate']);
    Route::post('/import', [RoleAllowSwitchController::class, 'import']);
    Route::get('/export', [RoleAllowSwitchController::class, 'export']);

    Route::post('/bulk-store', [RoleAllowSwitchController::class, 'bulkStore']);
    Route::post('/bulk-update', [RoleAllowSwitchController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RoleAllowSwitchController::class, 'bulkDestroy']);

    Route::get('/trashed', [RoleAllowSwitchController::class, 'trashed']);
    Route::post('/{id}/restore', [RoleAllowSwitchController::class, 'restore']);
    Route::delete('/{id}/force', [RoleAllowSwitchController::class, 'forceDelete']);

    Route::get('/', [RoleAllowSwitchController::class, 'index']);
    Route::post('/', [RoleAllowSwitchController::class, 'store']);
    Route::get('/{id}', [RoleAllowSwitchController::class, 'show']);
    Route::put('/{id}', [RoleAllowSwitchController::class, 'update']);
    Route::delete('/{id}', [RoleAllowSwitchController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RoleAllowSwitchController::class, 'duplicate']);
    Route::get('/{id}/stats', [RoleAllowSwitchController::class, 'stats']);
});

// ========================
// ROLE_CONTEXT_LEVELS RESOURCE
// ========================
Route::prefix('role-context-levels')->group(function () {
    use App\Http\Controllers\Api\V1\RoleContextLevelsController;

    Route::get('/filters', [RoleContextLevelsController::class, 'filters']);
    Route::get('/suggestions', [RoleContextLevelsController::class, 'suggestions']);
    Route::post('/advanced-search', [RoleContextLevelsController::class, 'advancedSearch']);

    Route::get('/import-template', [RoleContextLevelsController::class, 'importTemplate']);
    Route::post('/import', [RoleContextLevelsController::class, 'import']);
    Route::get('/export', [RoleContextLevelsController::class, 'export']);

    Route::post('/bulk-store', [RoleContextLevelsController::class, 'bulkStore']);
    Route::post('/bulk-update', [RoleContextLevelsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RoleContextLevelsController::class, 'bulkDestroy']);

    Route::get('/trashed', [RoleContextLevelsController::class, 'trashed']);
    Route::post('/{id}/restore', [RoleContextLevelsController::class, 'restore']);
    Route::delete('/{id}/force', [RoleContextLevelsController::class, 'forceDelete']);

    Route::get('/', [RoleContextLevelsController::class, 'index']);
    Route::post('/', [RoleContextLevelsController::class, 'store']);
    Route::get('/{id}', [RoleContextLevelsController::class, 'show']);
    Route::put('/{id}', [RoleContextLevelsController::class, 'update']);
    Route::delete('/{id}', [RoleContextLevelsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RoleContextLevelsController::class, 'duplicate']);
    Route::get('/{id}/stats', [RoleContextLevelsController::class, 'stats']);
});

// ========================
// ENROL_FLATFILE RESOURCE
// ========================
Route::prefix('enrol-flatfile')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolFlatfileController;

    Route::get('/filters', [EnrolFlatfileController::class, 'filters']);
    Route::get('/suggestions', [EnrolFlatfileController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolFlatfileController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolFlatfileController::class, 'importTemplate']);
    Route::post('/import', [EnrolFlatfileController::class, 'import']);
    Route::get('/export', [EnrolFlatfileController::class, 'export']);

    Route::post('/bulk-store', [EnrolFlatfileController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolFlatfileController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolFlatfileController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolFlatfileController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolFlatfileController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolFlatfileController::class, 'forceDelete']);

    Route::get('/', [EnrolFlatfileController::class, 'index']);
    Route::post('/', [EnrolFlatfileController::class, 'store']);
    Route::get('/{id}', [EnrolFlatfileController::class, 'show']);
    Route::put('/{id}', [EnrolFlatfileController::class, 'update']);
    Route::delete('/{id}', [EnrolFlatfileController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolFlatfileController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolFlatfileController::class, 'stats']);
});

// ========================
// ROLE_ALLOW_VIEW RESOURCE
// ========================
Route::prefix('role-allow-view')->group(function () {
    use App\Http\Controllers\Api\V1\RoleAllowViewController;

    Route::get('/filters', [RoleAllowViewController::class, 'filters']);
    Route::get('/suggestions', [RoleAllowViewController::class, 'suggestions']);
    Route::post('/advanced-search', [RoleAllowViewController::class, 'advancedSearch']);

    Route::get('/import-template', [RoleAllowViewController::class, 'importTemplate']);
    Route::post('/import', [RoleAllowViewController::class, 'import']);
    Route::get('/export', [RoleAllowViewController::class, 'export']);

    Route::post('/bulk-store', [RoleAllowViewController::class, 'bulkStore']);
    Route::post('/bulk-update', [RoleAllowViewController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RoleAllowViewController::class, 'bulkDestroy']);

    Route::get('/trashed', [RoleAllowViewController::class, 'trashed']);
    Route::post('/{id}/restore', [RoleAllowViewController::class, 'restore']);
    Route::delete('/{id}/force', [RoleAllowViewController::class, 'forceDelete']);

    Route::get('/', [RoleAllowViewController::class, 'index']);
    Route::post('/', [RoleAllowViewController::class, 'store']);
    Route::get('/{id}', [RoleAllowViewController::class, 'show']);
    Route::put('/{id}', [RoleAllowViewController::class, 'update']);
    Route::delete('/{id}', [RoleAllowViewController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RoleAllowViewController::class, 'duplicate']);
    Route::get('/{id}/stats', [RoleAllowViewController::class, 'stats']);
});

// ========================
// TOOL_DATAPRIVACY_PURPOSEROLE RESOURCE
// ========================
Route::prefix('tool-dataprivacy-purposerole')->group(function () {
    use App\Http\Controllers\Api\V1\ToolDataprivacyPurposeroleController;

    Route::get('/filters', [ToolDataprivacyPurposeroleController::class, 'filters']);
    Route::get('/suggestions', [ToolDataprivacyPurposeroleController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolDataprivacyPurposeroleController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolDataprivacyPurposeroleController::class, 'importTemplate']);
    Route::post('/import', [ToolDataprivacyPurposeroleController::class, 'import']);
    Route::get('/export', [ToolDataprivacyPurposeroleController::class, 'export']);

    Route::post('/bulk-store', [ToolDataprivacyPurposeroleController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolDataprivacyPurposeroleController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolDataprivacyPurposeroleController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolDataprivacyPurposeroleController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolDataprivacyPurposeroleController::class, 'restore']);
    Route::delete('/{id}/force', [ToolDataprivacyPurposeroleController::class, 'forceDelete']);

    Route::get('/', [ToolDataprivacyPurposeroleController::class, 'index']);
    Route::post('/', [ToolDataprivacyPurposeroleController::class, 'store']);
    Route::get('/{id}', [ToolDataprivacyPurposeroleController::class, 'show']);
    Route::put('/{id}', [ToolDataprivacyPurposeroleController::class, 'update']);
    Route::delete('/{id}', [ToolDataprivacyPurposeroleController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolDataprivacyPurposeroleController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolDataprivacyPurposeroleController::class, 'stats']);
});

// ========================
// ROLE_ALLOW_OVERRIDE RESOURCE
// ========================
Route::prefix('role-allow-override')->group(function () {
    use App\Http\Controllers\Api\V1\RoleAllowOverrideController;

    Route::get('/filters', [RoleAllowOverrideController::class, 'filters']);
    Route::get('/suggestions', [RoleAllowOverrideController::class, 'suggestions']);
    Route::post('/advanced-search', [RoleAllowOverrideController::class, 'advancedSearch']);

    Route::get('/import-template', [RoleAllowOverrideController::class, 'importTemplate']);
    Route::post('/import', [RoleAllowOverrideController::class, 'import']);
    Route::get('/export', [RoleAllowOverrideController::class, 'export']);

    Route::post('/bulk-store', [RoleAllowOverrideController::class, 'bulkStore']);
    Route::post('/bulk-update', [RoleAllowOverrideController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RoleAllowOverrideController::class, 'bulkDestroy']);

    Route::get('/trashed', [RoleAllowOverrideController::class, 'trashed']);
    Route::post('/{id}/restore', [RoleAllowOverrideController::class, 'restore']);
    Route::delete('/{id}/force', [RoleAllowOverrideController::class, 'forceDelete']);

    Route::get('/', [RoleAllowOverrideController::class, 'index']);
    Route::post('/', [RoleAllowOverrideController::class, 'store']);
    Route::get('/{id}', [RoleAllowOverrideController::class, 'show']);
    Route::put('/{id}', [RoleAllowOverrideController::class, 'update']);
    Route::delete('/{id}', [RoleAllowOverrideController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RoleAllowOverrideController::class, 'duplicate']);
    Route::get('/{id}/stats', [RoleAllowOverrideController::class, 'stats']);
});

// ========================
// ROLE_ALLOW_ASSIGN RESOURCE
// ========================
Route::prefix('role-allow-assign')->group(function () {
    use App\Http\Controllers\Api\V1\RoleAllowAssignController;

    Route::get('/filters', [RoleAllowAssignController::class, 'filters']);
    Route::get('/suggestions', [RoleAllowAssignController::class, 'suggestions']);
    Route::post('/advanced-search', [RoleAllowAssignController::class, 'advancedSearch']);

    Route::get('/import-template', [RoleAllowAssignController::class, 'importTemplate']);
    Route::post('/import', [RoleAllowAssignController::class, 'import']);
    Route::get('/export', [RoleAllowAssignController::class, 'export']);

    Route::post('/bulk-store', [RoleAllowAssignController::class, 'bulkStore']);
    Route::post('/bulk-update', [RoleAllowAssignController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RoleAllowAssignController::class, 'bulkDestroy']);

    Route::get('/trashed', [RoleAllowAssignController::class, 'trashed']);
    Route::post('/{id}/restore', [RoleAllowAssignController::class, 'restore']);
    Route::delete('/{id}/force', [RoleAllowAssignController::class, 'forceDelete']);

    Route::get('/', [RoleAllowAssignController::class, 'index']);
    Route::post('/', [RoleAllowAssignController::class, 'store']);
    Route::get('/{id}', [RoleAllowAssignController::class, 'show']);
    Route::put('/{id}', [RoleAllowAssignController::class, 'update']);
    Route::delete('/{id}', [RoleAllowAssignController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RoleAllowAssignController::class, 'duplicate']);
    Route::get('/{id}/stats', [RoleAllowAssignController::class, 'stats']);
});

// ========================
// ENROL RESOURCE
// ========================
Route::prefix('enrol')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolController;

    Route::get('/filters', [EnrolController::class, 'filters']);
    Route::get('/suggestions', [EnrolController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolController::class, 'importTemplate']);
    Route::post('/import', [EnrolController::class, 'import']);
    Route::get('/export', [EnrolController::class, 'export']);

    Route::post('/bulk-store', [EnrolController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolController::class, 'forceDelete']);

    Route::get('/', [EnrolController::class, 'index']);
    Route::post('/', [EnrolController::class, 'store']);
    Route::get('/{id}', [EnrolController::class, 'show']);
    Route::put('/{id}', [EnrolController::class, 'update']);
    Route::delete('/{id}', [EnrolController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolController::class, 'stats']);
});

// ========================
// GRADING_AREAS RESOURCE
// ========================
Route::prefix('grading-areas')->group(function () {
    use App\Http\Controllers\Api\V1\GradingAreasController;

    Route::get('/filters', [GradingAreasController::class, 'filters']);
    Route::get('/suggestions', [GradingAreasController::class, 'suggestions']);
    Route::post('/advanced-search', [GradingAreasController::class, 'advancedSearch']);

    Route::get('/import-template', [GradingAreasController::class, 'importTemplate']);
    Route::post('/import', [GradingAreasController::class, 'import']);
    Route::get('/export', [GradingAreasController::class, 'export']);

    Route::post('/bulk-store', [GradingAreasController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradingAreasController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradingAreasController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradingAreasController::class, 'trashed']);
    Route::post('/{id}/restore', [GradingAreasController::class, 'restore']);
    Route::delete('/{id}/force', [GradingAreasController::class, 'forceDelete']);

    Route::get('/', [GradingAreasController::class, 'index']);
    Route::post('/', [GradingAreasController::class, 'store']);
    Route::get('/{id}', [GradingAreasController::class, 'show']);
    Route::put('/{id}', [GradingAreasController::class, 'update']);
    Route::delete('/{id}', [GradingAreasController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradingAreasController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradingAreasController::class, 'stats']);
});

// ========================
// CUSTOMFIELD_CATEGORY RESOURCE
// ========================
Route::prefix('customfield-category')->group(function () {
    use App\Http\Controllers\Api\V1\CustomfieldCategoryController;

    Route::get('/filters', [CustomfieldCategoryController::class, 'filters']);
    Route::get('/suggestions', [CustomfieldCategoryController::class, 'suggestions']);
    Route::post('/advanced-search', [CustomfieldCategoryController::class, 'advancedSearch']);

    Route::get('/import-template', [CustomfieldCategoryController::class, 'importTemplate']);
    Route::post('/import', [CustomfieldCategoryController::class, 'import']);
    Route::get('/export', [CustomfieldCategoryController::class, 'export']);

    Route::post('/bulk-store', [CustomfieldCategoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [CustomfieldCategoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CustomfieldCategoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [CustomfieldCategoryController::class, 'trashed']);
    Route::post('/{id}/restore', [CustomfieldCategoryController::class, 'restore']);
    Route::delete('/{id}/force', [CustomfieldCategoryController::class, 'forceDelete']);

    Route::get('/', [CustomfieldCategoryController::class, 'index']);
    Route::post('/', [CustomfieldCategoryController::class, 'store']);
    Route::get('/{id}', [CustomfieldCategoryController::class, 'show']);
    Route::put('/{id}', [CustomfieldCategoryController::class, 'update']);
    Route::delete('/{id}', [CustomfieldCategoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CustomfieldCategoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [CustomfieldCategoryController::class, 'stats']);
});

// ========================
// PAYMENT_ACCOUNTS RESOURCE
// ========================
Route::prefix('payment-accounts')->group(function () {
    use App\Http\Controllers\Api\V1\PaymentAccountsController;

    Route::get('/filters', [PaymentAccountsController::class, 'filters']);
    Route::get('/suggestions', [PaymentAccountsController::class, 'suggestions']);
    Route::post('/advanced-search', [PaymentAccountsController::class, 'advancedSearch']);

    Route::get('/import-template', [PaymentAccountsController::class, 'importTemplate']);
    Route::post('/import', [PaymentAccountsController::class, 'import']);
    Route::get('/export', [PaymentAccountsController::class, 'export']);

    Route::post('/bulk-store', [PaymentAccountsController::class, 'bulkStore']);
    Route::post('/bulk-update', [PaymentAccountsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PaymentAccountsController::class, 'bulkDestroy']);

    Route::get('/trashed', [PaymentAccountsController::class, 'trashed']);
    Route::post('/{id}/restore', [PaymentAccountsController::class, 'restore']);
    Route::delete('/{id}/force', [PaymentAccountsController::class, 'forceDelete']);

    Route::get('/', [PaymentAccountsController::class, 'index']);
    Route::post('/', [PaymentAccountsController::class, 'store']);
    Route::get('/{id}', [PaymentAccountsController::class, 'show']);
    Route::put('/{id}', [PaymentAccountsController::class, 'update']);
    Route::delete('/{id}', [PaymentAccountsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PaymentAccountsController::class, 'duplicate']);
    Route::get('/{id}/stats', [PaymentAccountsController::class, 'stats']);
});

// ========================
// MESSAGE_CONVERSATIONS RESOURCE
// ========================
Route::prefix('message-conversations')->group(function () {
    use App\Http\Controllers\Api\V1\MessageConversationsController;

    Route::get('/filters', [MessageConversationsController::class, 'filters']);
    Route::get('/suggestions', [MessageConversationsController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageConversationsController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageConversationsController::class, 'importTemplate']);
    Route::post('/import', [MessageConversationsController::class, 'import']);
    Route::get('/export', [MessageConversationsController::class, 'export']);

    Route::post('/bulk-store', [MessageConversationsController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageConversationsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageConversationsController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageConversationsController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageConversationsController::class, 'restore']);
    Route::delete('/{id}/force', [MessageConversationsController::class, 'forceDelete']);

    Route::get('/', [MessageConversationsController::class, 'index']);
    Route::post('/', [MessageConversationsController::class, 'store']);
    Route::get('/{id}', [MessageConversationsController::class, 'show']);
    Route::put('/{id}', [MessageConversationsController::class, 'update']);
    Route::delete('/{id}', [MessageConversationsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageConversationsController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageConversationsController::class, 'stats']);
});

// ========================
// FILTER_CONFIG RESOURCE
// ========================
Route::prefix('filter-config')->group(function () {
    use App\Http\Controllers\Api\V1\FilterConfigController;

    Route::get('/filters', [FilterConfigController::class, 'filters']);
    Route::get('/suggestions', [FilterConfigController::class, 'suggestions']);
    Route::post('/advanced-search', [FilterConfigController::class, 'advancedSearch']);

    Route::get('/import-template', [FilterConfigController::class, 'importTemplate']);
    Route::post('/import', [FilterConfigController::class, 'import']);
    Route::get('/export', [FilterConfigController::class, 'export']);

    Route::post('/bulk-store', [FilterConfigController::class, 'bulkStore']);
    Route::post('/bulk-update', [FilterConfigController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FilterConfigController::class, 'bulkDestroy']);

    Route::get('/trashed', [FilterConfigController::class, 'trashed']);
    Route::post('/{id}/restore', [FilterConfigController::class, 'restore']);
    Route::delete('/{id}/force', [FilterConfigController::class, 'forceDelete']);

    Route::get('/', [FilterConfigController::class, 'index']);
    Route::post('/', [FilterConfigController::class, 'store']);
    Route::get('/{id}', [FilterConfigController::class, 'show']);
    Route::put('/{id}', [FilterConfigController::class, 'update']);
    Route::delete('/{id}', [FilterConfigController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FilterConfigController::class, 'duplicate']);
    Route::get('/{id}/stats', [FilterConfigController::class, 'stats']);
});

// ========================
// COMPETENCY_EVIDENCE RESOURCE
// ========================
Route::prefix('competency-evidence')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyEvidenceController;

    Route::get('/filters', [CompetencyEvidenceController::class, 'filters']);
    Route::get('/suggestions', [CompetencyEvidenceController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyEvidenceController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyEvidenceController::class, 'importTemplate']);
    Route::post('/import', [CompetencyEvidenceController::class, 'import']);
    Route::get('/export', [CompetencyEvidenceController::class, 'export']);

    Route::post('/bulk-store', [CompetencyEvidenceController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyEvidenceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyEvidenceController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyEvidenceController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyEvidenceController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyEvidenceController::class, 'forceDelete']);

    Route::get('/', [CompetencyEvidenceController::class, 'index']);
    Route::post('/', [CompetencyEvidenceController::class, 'store']);
    Route::get('/{id}', [CompetencyEvidenceController::class, 'show']);
    Route::put('/{id}', [CompetencyEvidenceController::class, 'update']);
    Route::delete('/{id}', [CompetencyEvidenceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyEvidenceController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyEvidenceController::class, 'stats']);
});

// ========================
// TOOL_MONITOR_EVENTS RESOURCE
// ========================
Route::prefix('tool-monitor-events')->group(function () {
    use App\Http\Controllers\Api\V1\ToolMonitorEventsController;

    Route::get('/filters', [ToolMonitorEventsController::class, 'filters']);
    Route::get('/suggestions', [ToolMonitorEventsController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolMonitorEventsController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolMonitorEventsController::class, 'importTemplate']);
    Route::post('/import', [ToolMonitorEventsController::class, 'import']);
    Route::get('/export', [ToolMonitorEventsController::class, 'export']);

    Route::post('/bulk-store', [ToolMonitorEventsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolMonitorEventsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolMonitorEventsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolMonitorEventsController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolMonitorEventsController::class, 'restore']);
    Route::delete('/{id}/force', [ToolMonitorEventsController::class, 'forceDelete']);

    Route::get('/', [ToolMonitorEventsController::class, 'index']);
    Route::post('/', [ToolMonitorEventsController::class, 'store']);
    Route::get('/{id}', [ToolMonitorEventsController::class, 'show']);
    Route::put('/{id}', [ToolMonitorEventsController::class, 'update']);
    Route::delete('/{id}', [ToolMonitorEventsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolMonitorEventsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolMonitorEventsController::class, 'stats']);
});

// ========================
// QUESTION_SET_REFERENCES RESOURCE
// ========================
Route::prefix('question-set-references')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionSetReferencesController;

    Route::get('/filters', [QuestionSetReferencesController::class, 'filters']);
    Route::get('/suggestions', [QuestionSetReferencesController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionSetReferencesController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionSetReferencesController::class, 'importTemplate']);
    Route::post('/import', [QuestionSetReferencesController::class, 'import']);
    Route::get('/export', [QuestionSetReferencesController::class, 'export']);

    Route::post('/bulk-store', [QuestionSetReferencesController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionSetReferencesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionSetReferencesController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionSetReferencesController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionSetReferencesController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionSetReferencesController::class, 'forceDelete']);

    Route::get('/', [QuestionSetReferencesController::class, 'index']);
    Route::post('/', [QuestionSetReferencesController::class, 'store']);
    Route::get('/{id}', [QuestionSetReferencesController::class, 'show']);
    Route::put('/{id}', [QuestionSetReferencesController::class, 'update']);
    Route::delete('/{id}', [QuestionSetReferencesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionSetReferencesController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionSetReferencesController::class, 'stats']);
});

// ========================
// CONTENTBANK_CONTENT RESOURCE
// ========================
Route::prefix('contentbank-content')->group(function () {
    use App\Http\Controllers\Api\V1\ContentbankContentController;

    Route::get('/filters', [ContentbankContentController::class, 'filters']);
    Route::get('/suggestions', [ContentbankContentController::class, 'suggestions']);
    Route::post('/advanced-search', [ContentbankContentController::class, 'advancedSearch']);

    Route::get('/import-template', [ContentbankContentController::class, 'importTemplate']);
    Route::post('/import', [ContentbankContentController::class, 'import']);
    Route::get('/export', [ContentbankContentController::class, 'export']);

    Route::post('/bulk-store', [ContentbankContentController::class, 'bulkStore']);
    Route::post('/bulk-update', [ContentbankContentController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ContentbankContentController::class, 'bulkDestroy']);

    Route::get('/trashed', [ContentbankContentController::class, 'trashed']);
    Route::post('/{id}/restore', [ContentbankContentController::class, 'restore']);
    Route::delete('/{id}/force', [ContentbankContentController::class, 'forceDelete']);

    Route::get('/', [ContentbankContentController::class, 'index']);
    Route::post('/', [ContentbankContentController::class, 'store']);
    Route::get('/{id}', [ContentbankContentController::class, 'show']);
    Route::put('/{id}', [ContentbankContentController::class, 'update']);
    Route::delete('/{id}', [ContentbankContentController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ContentbankContentController::class, 'duplicate']);
    Route::get('/{id}/stats', [ContentbankContentController::class, 'stats']);
});

// ========================
// BLOCK_INSTANCES RESOURCE
// ========================
Route::prefix('block-instances')->group(function () {
    use App\Http\Controllers\Api\V1\BlockInstancesController;

    Route::get('/filters', [BlockInstancesController::class, 'filters']);
    Route::get('/suggestions', [BlockInstancesController::class, 'suggestions']);
    Route::post('/advanced-search', [BlockInstancesController::class, 'advancedSearch']);

    Route::get('/import-template', [BlockInstancesController::class, 'importTemplate']);
    Route::post('/import', [BlockInstancesController::class, 'import']);
    Route::get('/export', [BlockInstancesController::class, 'export']);

    Route::post('/bulk-store', [BlockInstancesController::class, 'bulkStore']);
    Route::post('/bulk-update', [BlockInstancesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BlockInstancesController::class, 'bulkDestroy']);

    Route::get('/trashed', [BlockInstancesController::class, 'trashed']);
    Route::post('/{id}/restore', [BlockInstancesController::class, 'restore']);
    Route::delete('/{id}/force', [BlockInstancesController::class, 'forceDelete']);

    Route::get('/', [BlockInstancesController::class, 'index']);
    Route::post('/', [BlockInstancesController::class, 'store']);
    Route::get('/{id}', [BlockInstancesController::class, 'show']);
    Route::put('/{id}', [BlockInstancesController::class, 'update']);
    Route::delete('/{id}', [BlockInstancesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BlockInstancesController::class, 'duplicate']);
    Route::get('/{id}/stats', [BlockInstancesController::class, 'stats']);
});

// ========================
// ROLE_NAMES RESOURCE
// ========================
Route::prefix('role-names')->group(function () {
    use App\Http\Controllers\Api\V1\RoleNamesController;

    Route::get('/filters', [RoleNamesController::class, 'filters']);
    Route::get('/suggestions', [RoleNamesController::class, 'suggestions']);
    Route::post('/advanced-search', [RoleNamesController::class, 'advancedSearch']);

    Route::get('/import-template', [RoleNamesController::class, 'importTemplate']);
    Route::post('/import', [RoleNamesController::class, 'import']);
    Route::get('/export', [RoleNamesController::class, 'export']);

    Route::post('/bulk-store', [RoleNamesController::class, 'bulkStore']);
    Route::post('/bulk-update', [RoleNamesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RoleNamesController::class, 'bulkDestroy']);

    Route::get('/trashed', [RoleNamesController::class, 'trashed']);
    Route::post('/{id}/restore', [RoleNamesController::class, 'restore']);
    Route::delete('/{id}/force', [RoleNamesController::class, 'forceDelete']);

    Route::get('/', [RoleNamesController::class, 'index']);
    Route::post('/', [RoleNamesController::class, 'store']);
    Route::get('/{id}', [RoleNamesController::class, 'show']);
    Route::put('/{id}', [RoleNamesController::class, 'update']);
    Route::delete('/{id}', [RoleNamesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RoleNamesController::class, 'duplicate']);
    Route::get('/{id}/stats', [RoleNamesController::class, 'stats']);
});

// ========================
// ROLE_ASSIGNMENTS RESOURCE
// ========================
Route::prefix('role-assignments')->group(function () {
    use App\Http\Controllers\Api\V1\RoleAssignmentsController;

    Route::get('/filters', [RoleAssignmentsController::class, 'filters']);
    Route::get('/suggestions', [RoleAssignmentsController::class, 'suggestions']);
    Route::post('/advanced-search', [RoleAssignmentsController::class, 'advancedSearch']);

    Route::get('/import-template', [RoleAssignmentsController::class, 'importTemplate']);
    Route::post('/import', [RoleAssignmentsController::class, 'import']);
    Route::get('/export', [RoleAssignmentsController::class, 'export']);

    Route::post('/bulk-store', [RoleAssignmentsController::class, 'bulkStore']);
    Route::post('/bulk-update', [RoleAssignmentsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RoleAssignmentsController::class, 'bulkDestroy']);

    Route::get('/trashed', [RoleAssignmentsController::class, 'trashed']);
    Route::post('/{id}/restore', [RoleAssignmentsController::class, 'restore']);
    Route::delete('/{id}/force', [RoleAssignmentsController::class, 'forceDelete']);

    Route::get('/', [RoleAssignmentsController::class, 'index']);
    Route::post('/', [RoleAssignmentsController::class, 'store']);
    Route::get('/{id}', [RoleAssignmentsController::class, 'show']);
    Route::put('/{id}', [RoleAssignmentsController::class, 'update']);
    Route::delete('/{id}', [RoleAssignmentsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RoleAssignmentsController::class, 'duplicate']);
    Route::get('/{id}/stats', [RoleAssignmentsController::class, 'stats']);
});

// ========================
// SEARCH_INDEX_REQUESTS RESOURCE
// ========================
Route::prefix('search-index-requests')->group(function () {
    use App\Http\Controllers\Api\V1\SearchIndexRequestsController;

    Route::get('/filters', [SearchIndexRequestsController::class, 'filters']);
    Route::get('/suggestions', [SearchIndexRequestsController::class, 'suggestions']);
    Route::post('/advanced-search', [SearchIndexRequestsController::class, 'advancedSearch']);

    Route::get('/import-template', [SearchIndexRequestsController::class, 'importTemplate']);
    Route::post('/import', [SearchIndexRequestsController::class, 'import']);
    Route::get('/export', [SearchIndexRequestsController::class, 'export']);

    Route::post('/bulk-store', [SearchIndexRequestsController::class, 'bulkStore']);
    Route::post('/bulk-update', [SearchIndexRequestsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [SearchIndexRequestsController::class, 'bulkDestroy']);

    Route::get('/trashed', [SearchIndexRequestsController::class, 'trashed']);
    Route::post('/{id}/restore', [SearchIndexRequestsController::class, 'restore']);
    Route::delete('/{id}/force', [SearchIndexRequestsController::class, 'forceDelete']);

    Route::get('/', [SearchIndexRequestsController::class, 'index']);
    Route::post('/', [SearchIndexRequestsController::class, 'store']);
    Route::get('/{id}', [SearchIndexRequestsController::class, 'show']);
    Route::put('/{id}', [SearchIndexRequestsController::class, 'update']);
    Route::delete('/{id}', [SearchIndexRequestsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [SearchIndexRequestsController::class, 'duplicate']);
    Route::get('/{id}/stats', [SearchIndexRequestsController::class, 'stats']);
});

// ========================
// FILTER_ACTIVE RESOURCE
// ========================
Route::prefix('filter-active')->group(function () {
    use App\Http\Controllers\Api\V1\FilterActiveController;

    Route::get('/filters', [FilterActiveController::class, 'filters']);
    Route::get('/suggestions', [FilterActiveController::class, 'suggestions']);
    Route::post('/advanced-search', [FilterActiveController::class, 'advancedSearch']);

    Route::get('/import-template', [FilterActiveController::class, 'importTemplate']);
    Route::post('/import', [FilterActiveController::class, 'import']);
    Route::get('/export', [FilterActiveController::class, 'export']);

    Route::post('/bulk-store', [FilterActiveController::class, 'bulkStore']);
    Route::post('/bulk-update', [FilterActiveController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FilterActiveController::class, 'bulkDestroy']);

    Route::get('/trashed', [FilterActiveController::class, 'trashed']);
    Route::post('/{id}/restore', [FilterActiveController::class, 'restore']);
    Route::delete('/{id}/force', [FilterActiveController::class, 'forceDelete']);

    Route::get('/', [FilterActiveController::class, 'index']);
    Route::post('/', [FilterActiveController::class, 'store']);
    Route::get('/{id}', [FilterActiveController::class, 'show']);
    Route::put('/{id}', [FilterActiveController::class, 'update']);
    Route::delete('/{id}', [FilterActiveController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FilterActiveController::class, 'duplicate']);
    Route::get('/{id}/stats', [FilterActiveController::class, 'stats']);
});

// ========================
// LOGSTORE_STANDARD_LOG RESOURCE
// ========================
Route::prefix('logstore-standard-log')->group(function () {
    use App\Http\Controllers\Api\V1\LogstoreStandardLogController;

    Route::get('/filters', [LogstoreStandardLogController::class, 'filters']);
    Route::get('/suggestions', [LogstoreStandardLogController::class, 'suggestions']);
    Route::post('/advanced-search', [LogstoreStandardLogController::class, 'advancedSearch']);

    Route::get('/import-template', [LogstoreStandardLogController::class, 'importTemplate']);
    Route::post('/import', [LogstoreStandardLogController::class, 'import']);
    Route::get('/export', [LogstoreStandardLogController::class, 'export']);

    Route::post('/bulk-store', [LogstoreStandardLogController::class, 'bulkStore']);
    Route::post('/bulk-update', [LogstoreStandardLogController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LogstoreStandardLogController::class, 'bulkDestroy']);

    Route::get('/trashed', [LogstoreStandardLogController::class, 'trashed']);
    Route::post('/{id}/restore', [LogstoreStandardLogController::class, 'restore']);
    Route::delete('/{id}/force', [LogstoreStandardLogController::class, 'forceDelete']);

    Route::get('/', [LogstoreStandardLogController::class, 'index']);
    Route::post('/', [LogstoreStandardLogController::class, 'store']);
    Route::get('/{id}', [LogstoreStandardLogController::class, 'show']);
    Route::put('/{id}', [LogstoreStandardLogController::class, 'update']);
    Route::delete('/{id}', [LogstoreStandardLogController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LogstoreStandardLogController::class, 'duplicate']);
    Route::get('/{id}/stats', [LogstoreStandardLogController::class, 'stats']);
});

// ========================
// COHORT RESOURCE
// ========================
Route::prefix('cohort')->group(function () {
    use App\Http\Controllers\Api\V1\CohortController;

    Route::get('/filters', [CohortController::class, 'filters']);
    Route::get('/suggestions', [CohortController::class, 'suggestions']);
    Route::post('/advanced-search', [CohortController::class, 'advancedSearch']);

    Route::get('/import-template', [CohortController::class, 'importTemplate']);
    Route::post('/import', [CohortController::class, 'import']);
    Route::get('/export', [CohortController::class, 'export']);

    Route::post('/bulk-store', [CohortController::class, 'bulkStore']);
    Route::post('/bulk-update', [CohortController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CohortController::class, 'bulkDestroy']);

    Route::get('/trashed', [CohortController::class, 'trashed']);
    Route::post('/{id}/restore', [CohortController::class, 'restore']);
    Route::delete('/{id}/force', [CohortController::class, 'forceDelete']);

    Route::get('/', [CohortController::class, 'index']);
    Route::post('/', [CohortController::class, 'store']);
    Route::get('/{id}', [CohortController::class, 'show']);
    Route::put('/{id}', [CohortController::class, 'update']);
    Route::delete('/{id}', [CohortController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CohortController::class, 'duplicate']);
    Route::get('/{id}/stats', [CohortController::class, 'stats']);
});

// ========================
// QUESTION_USAGES RESOURCE
// ========================
Route::prefix('question-usages')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionUsagesController;

    Route::get('/filters', [QuestionUsagesController::class, 'filters']);
    Route::get('/suggestions', [QuestionUsagesController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionUsagesController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionUsagesController::class, 'importTemplate']);
    Route::post('/import', [QuestionUsagesController::class, 'import']);
    Route::get('/export', [QuestionUsagesController::class, 'export']);

    Route::post('/bulk-store', [QuestionUsagesController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionUsagesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionUsagesController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionUsagesController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionUsagesController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionUsagesController::class, 'forceDelete']);

    Route::get('/', [QuestionUsagesController::class, 'index']);
    Route::post('/', [QuestionUsagesController::class, 'store']);
    Route::get('/{id}', [QuestionUsagesController::class, 'show']);
    Route::put('/{id}', [QuestionUsagesController::class, 'update']);
    Route::delete('/{id}', [QuestionUsagesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionUsagesController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionUsagesController::class, 'stats']);
});

// ========================
// ANALYTICS_INDICATOR_CALC RESOURCE
// ========================
Route::prefix('analytics-indicator-calc')->group(function () {
    use App\Http\Controllers\Api\V1\AnalyticsIndicatorCalcController;

    Route::get('/filters', [AnalyticsIndicatorCalcController::class, 'filters']);
    Route::get('/suggestions', [AnalyticsIndicatorCalcController::class, 'suggestions']);
    Route::post('/advanced-search', [AnalyticsIndicatorCalcController::class, 'advancedSearch']);

    Route::get('/import-template', [AnalyticsIndicatorCalcController::class, 'importTemplate']);
    Route::post('/import', [AnalyticsIndicatorCalcController::class, 'import']);
    Route::get('/export', [AnalyticsIndicatorCalcController::class, 'export']);

    Route::post('/bulk-store', [AnalyticsIndicatorCalcController::class, 'bulkStore']);
    Route::post('/bulk-update', [AnalyticsIndicatorCalcController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AnalyticsIndicatorCalcController::class, 'bulkDestroy']);

    Route::get('/trashed', [AnalyticsIndicatorCalcController::class, 'trashed']);
    Route::post('/{id}/restore', [AnalyticsIndicatorCalcController::class, 'restore']);
    Route::delete('/{id}/force', [AnalyticsIndicatorCalcController::class, 'forceDelete']);

    Route::get('/', [AnalyticsIndicatorCalcController::class, 'index']);
    Route::post('/', [AnalyticsIndicatorCalcController::class, 'store']);
    Route::get('/{id}', [AnalyticsIndicatorCalcController::class, 'show']);
    Route::put('/{id}', [AnalyticsIndicatorCalcController::class, 'update']);
    Route::delete('/{id}', [AnalyticsIndicatorCalcController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AnalyticsIndicatorCalcController::class, 'duplicate']);
    Route::get('/{id}/stats', [AnalyticsIndicatorCalcController::class, 'stats']);
});

// ========================
// COMMUNICATION RESOURCE
// ========================
Route::prefix('communication')->group(function () {
    use App\Http\Controllers\Api\V1\CommunicationController;

    Route::get('/filters', [CommunicationController::class, 'filters']);
    Route::get('/suggestions', [CommunicationController::class, 'suggestions']);
    Route::post('/advanced-search', [CommunicationController::class, 'advancedSearch']);

    Route::get('/import-template', [CommunicationController::class, 'importTemplate']);
    Route::post('/import', [CommunicationController::class, 'import']);
    Route::get('/export', [CommunicationController::class, 'export']);

    Route::post('/bulk-store', [CommunicationController::class, 'bulkStore']);
    Route::post('/bulk-update', [CommunicationController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CommunicationController::class, 'bulkDestroy']);

    Route::get('/trashed', [CommunicationController::class, 'trashed']);
    Route::post('/{id}/restore', [CommunicationController::class, 'restore']);
    Route::delete('/{id}/force', [CommunicationController::class, 'forceDelete']);

    Route::get('/', [CommunicationController::class, 'index']);
    Route::post('/', [CommunicationController::class, 'store']);
    Route::get('/{id}', [CommunicationController::class, 'show']);
    Route::put('/{id}', [CommunicationController::class, 'update']);
    Route::delete('/{id}', [CommunicationController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CommunicationController::class, 'duplicate']);
    Route::get('/{id}/stats', [CommunicationController::class, 'stats']);
});

// ========================
// FAVOURITE RESOURCE
// ========================
Route::prefix('favourite')->group(function () {
    use App\Http\Controllers\Api\V1\FavouriteController;

    Route::get('/filters', [FavouriteController::class, 'filters']);
    Route::get('/suggestions', [FavouriteController::class, 'suggestions']);
    Route::post('/advanced-search', [FavouriteController::class, 'advancedSearch']);

    Route::get('/import-template', [FavouriteController::class, 'importTemplate']);
    Route::post('/import', [FavouriteController::class, 'import']);
    Route::get('/export', [FavouriteController::class, 'export']);

    Route::post('/bulk-store', [FavouriteController::class, 'bulkStore']);
    Route::post('/bulk-update', [FavouriteController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FavouriteController::class, 'bulkDestroy']);

    Route::get('/trashed', [FavouriteController::class, 'trashed']);
    Route::post('/{id}/restore', [FavouriteController::class, 'restore']);
    Route::delete('/{id}/force', [FavouriteController::class, 'forceDelete']);

    Route::get('/', [FavouriteController::class, 'index']);
    Route::post('/', [FavouriteController::class, 'store']);
    Route::get('/{id}', [FavouriteController::class, 'show']);
    Route::put('/{id}', [FavouriteController::class, 'update']);
    Route::delete('/{id}', [FavouriteController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FavouriteController::class, 'duplicate']);
    Route::get('/{id}/stats', [FavouriteController::class, 'stats']);
});

// ========================
// COMPETENCY_TEMPLATE RESOURCE
// ========================
Route::prefix('competency-template')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyTemplateController;

    Route::get('/filters', [CompetencyTemplateController::class, 'filters']);
    Route::get('/suggestions', [CompetencyTemplateController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyTemplateController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyTemplateController::class, 'importTemplate']);
    Route::post('/import', [CompetencyTemplateController::class, 'import']);
    Route::get('/export', [CompetencyTemplateController::class, 'export']);

    Route::post('/bulk-store', [CompetencyTemplateController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyTemplateController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyTemplateController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyTemplateController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyTemplateController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyTemplateController::class, 'forceDelete']);

    Route::get('/', [CompetencyTemplateController::class, 'index']);
    Route::post('/', [CompetencyTemplateController::class, 'store']);
    Route::get('/{id}', [CompetencyTemplateController::class, 'show']);
    Route::put('/{id}', [CompetencyTemplateController::class, 'update']);
    Route::delete('/{id}', [CompetencyTemplateController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyTemplateController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyTemplateController::class, 'stats']);
});

// ========================
// REPORTBUILDER_REPORT RESOURCE
// ========================
Route::prefix('reportbuilder-report')->group(function () {
    use App\Http\Controllers\Api\V1\ReportbuilderReportController;

    Route::get('/filters', [ReportbuilderReportController::class, 'filters']);
    Route::get('/suggestions', [ReportbuilderReportController::class, 'suggestions']);
    Route::post('/advanced-search', [ReportbuilderReportController::class, 'advancedSearch']);

    Route::get('/import-template', [ReportbuilderReportController::class, 'importTemplate']);
    Route::post('/import', [ReportbuilderReportController::class, 'import']);
    Route::get('/export', [ReportbuilderReportController::class, 'export']);

    Route::post('/bulk-store', [ReportbuilderReportController::class, 'bulkStore']);
    Route::post('/bulk-update', [ReportbuilderReportController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ReportbuilderReportController::class, 'bulkDestroy']);

    Route::get('/trashed', [ReportbuilderReportController::class, 'trashed']);
    Route::post('/{id}/restore', [ReportbuilderReportController::class, 'restore']);
    Route::delete('/{id}/force', [ReportbuilderReportController::class, 'forceDelete']);

    Route::get('/', [ReportbuilderReportController::class, 'index']);
    Route::post('/', [ReportbuilderReportController::class, 'store']);
    Route::get('/{id}', [ReportbuilderReportController::class, 'show']);
    Route::put('/{id}', [ReportbuilderReportController::class, 'update']);
    Route::delete('/{id}', [ReportbuilderReportController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ReportbuilderReportController::class, 'duplicate']);
    Route::get('/{id}/stats', [ReportbuilderReportController::class, 'stats']);
});

// ========================
// REPOSITORY_INSTANCES RESOURCE
// ========================
Route::prefix('repository-instances')->group(function () {
    use App\Http\Controllers\Api\V1\RepositoryInstancesController;

    Route::get('/filters', [RepositoryInstancesController::class, 'filters']);
    Route::get('/suggestions', [RepositoryInstancesController::class, 'suggestions']);
    Route::post('/advanced-search', [RepositoryInstancesController::class, 'advancedSearch']);

    Route::get('/import-template', [RepositoryInstancesController::class, 'importTemplate']);
    Route::post('/import', [RepositoryInstancesController::class, 'import']);
    Route::get('/export', [RepositoryInstancesController::class, 'export']);

    Route::post('/bulk-store', [RepositoryInstancesController::class, 'bulkStore']);
    Route::post('/bulk-update', [RepositoryInstancesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RepositoryInstancesController::class, 'bulkDestroy']);

    Route::get('/trashed', [RepositoryInstancesController::class, 'trashed']);
    Route::post('/{id}/restore', [RepositoryInstancesController::class, 'restore']);
    Route::delete('/{id}/force', [RepositoryInstancesController::class, 'forceDelete']);

    Route::get('/', [RepositoryInstancesController::class, 'index']);
    Route::post('/', [RepositoryInstancesController::class, 'store']);
    Route::get('/{id}', [RepositoryInstancesController::class, 'show']);
    Route::put('/{id}', [RepositoryInstancesController::class, 'update']);
    Route::delete('/{id}', [RepositoryInstancesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RepositoryInstancesController::class, 'duplicate']);
    Route::get('/{id}/stats', [RepositoryInstancesController::class, 'stats']);
});

// ========================
// ROLE_CAPABILITIES RESOURCE
// ========================
Route::prefix('role-capabilities')->group(function () {
    use App\Http\Controllers\Api\V1\RoleCapabilitiesController;

    Route::get('/filters', [RoleCapabilitiesController::class, 'filters']);
    Route::get('/suggestions', [RoleCapabilitiesController::class, 'suggestions']);
    Route::post('/advanced-search', [RoleCapabilitiesController::class, 'advancedSearch']);

    Route::get('/import-template', [RoleCapabilitiesController::class, 'importTemplate']);
    Route::post('/import', [RoleCapabilitiesController::class, 'import']);
    Route::get('/export', [RoleCapabilitiesController::class, 'export']);

    Route::post('/bulk-store', [RoleCapabilitiesController::class, 'bulkStore']);
    Route::post('/bulk-update', [RoleCapabilitiesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RoleCapabilitiesController::class, 'bulkDestroy']);

    Route::get('/trashed', [RoleCapabilitiesController::class, 'trashed']);
    Route::post('/{id}/restore', [RoleCapabilitiesController::class, 'restore']);
    Route::delete('/{id}/force', [RoleCapabilitiesController::class, 'forceDelete']);

    Route::get('/', [RoleCapabilitiesController::class, 'index']);
    Route::post('/', [RoleCapabilitiesController::class, 'store']);
    Route::get('/{id}', [RoleCapabilitiesController::class, 'show']);
    Route::put('/{id}', [RoleCapabilitiesController::class, 'update']);
    Route::delete('/{id}', [RoleCapabilitiesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RoleCapabilitiesController::class, 'duplicate']);
    Route::get('/{id}/stats', [RoleCapabilitiesController::class, 'stats']);
});

// ========================
// QUESTION_BANK_ENTRIES RESOURCE
// ========================
Route::prefix('question-bank-entries')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionBankEntriesController;

    Route::get('/filters', [QuestionBankEntriesController::class, 'filters']);
    Route::get('/suggestions', [QuestionBankEntriesController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionBankEntriesController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionBankEntriesController::class, 'importTemplate']);
    Route::post('/import', [QuestionBankEntriesController::class, 'import']);
    Route::get('/export', [QuestionBankEntriesController::class, 'export']);

    Route::post('/bulk-store', [QuestionBankEntriesController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionBankEntriesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionBankEntriesController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionBankEntriesController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionBankEntriesController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionBankEntriesController::class, 'forceDelete']);

    Route::get('/', [QuestionBankEntriesController::class, 'index']);
    Route::post('/', [QuestionBankEntriesController::class, 'store']);
    Route::get('/{id}', [QuestionBankEntriesController::class, 'show']);
    Route::put('/{id}', [QuestionBankEntriesController::class, 'update']);
    Route::delete('/{id}', [QuestionBankEntriesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionBankEntriesController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionBankEntriesController::class, 'stats']);
});

// ========================
// QUESTION_DATASET_DEFINITIONS RESOURCE
// ========================
Route::prefix('question-dataset-definitions')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionDatasetDefinitionsController;

    Route::get('/filters', [QuestionDatasetDefinitionsController::class, 'filters']);
    Route::get('/suggestions', [QuestionDatasetDefinitionsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionDatasetDefinitionsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionDatasetDefinitionsController::class, 'importTemplate']);
    Route::post('/import', [QuestionDatasetDefinitionsController::class, 'import']);
    Route::get('/export', [QuestionDatasetDefinitionsController::class, 'export']);

    Route::post('/bulk-store', [QuestionDatasetDefinitionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionDatasetDefinitionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionDatasetDefinitionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionDatasetDefinitionsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionDatasetDefinitionsController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionDatasetDefinitionsController::class, 'forceDelete']);

    Route::get('/', [QuestionDatasetDefinitionsController::class, 'index']);
    Route::post('/', [QuestionDatasetDefinitionsController::class, 'store']);
    Route::get('/{id}', [QuestionDatasetDefinitionsController::class, 'show']);
    Route::put('/{id}', [QuestionDatasetDefinitionsController::class, 'update']);
    Route::delete('/{id}', [QuestionDatasetDefinitionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionDatasetDefinitionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionDatasetDefinitionsController::class, 'stats']);
});

// ========================
// MNET_HOST RESOURCE
// ========================
Route::prefix('mnet-host')->group(function () {
    use App\Http\Controllers\Api\V1\MnetHostController;

    Route::get('/filters', [MnetHostController::class, 'filters']);
    Route::get('/suggestions', [MnetHostController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetHostController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetHostController::class, 'importTemplate']);
    Route::post('/import', [MnetHostController::class, 'import']);
    Route::get('/export', [MnetHostController::class, 'export']);

    Route::post('/bulk-store', [MnetHostController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetHostController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetHostController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetHostController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetHostController::class, 'restore']);
    Route::delete('/{id}/force', [MnetHostController::class, 'forceDelete']);

    Route::get('/', [MnetHostController::class, 'index']);
    Route::post('/', [MnetHostController::class, 'store']);
    Route::get('/{id}', [MnetHostController::class, 'show']);
    Route::put('/{id}', [MnetHostController::class, 'update']);
    Route::delete('/{id}', [MnetHostController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetHostController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetHostController::class, 'stats']);
});

// ========================
// TAG RESOURCE
// ========================
Route::prefix('tag')->group(function () {
    use App\Http\Controllers\Api\V1\TagController;

    Route::get('/filters', [TagController::class, 'filters']);
    Route::get('/suggestions', [TagController::class, 'suggestions']);
    Route::post('/advanced-search', [TagController::class, 'advancedSearch']);

    Route::get('/import-template', [TagController::class, 'importTemplate']);
    Route::post('/import', [TagController::class, 'import']);
    Route::get('/export', [TagController::class, 'export']);

    Route::post('/bulk-store', [TagController::class, 'bulkStore']);
    Route::post('/bulk-update', [TagController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [TagController::class, 'bulkDestroy']);

    Route::get('/trashed', [TagController::class, 'trashed']);
    Route::post('/{id}/restore', [TagController::class, 'restore']);
    Route::delete('/{id}/force', [TagController::class, 'forceDelete']);

    Route::get('/', [TagController::class, 'index']);
    Route::post('/', [TagController::class, 'store']);
    Route::get('/{id}', [TagController::class, 'show']);
    Route::put('/{id}', [TagController::class, 'update']);
    Route::delete('/{id}', [TagController::class, 'destroy']);

    Route::post('/{id}/duplicate', [TagController::class, 'duplicate']);
    Route::get('/{id}/stats', [TagController::class, 'stats']);
});

// ========================
// TAG_AREA RESOURCE
// ========================
Route::prefix('tag-area')->group(function () {
    use App\Http\Controllers\Api\V1\TagAreaController;

    Route::get('/filters', [TagAreaController::class, 'filters']);
    Route::get('/suggestions', [TagAreaController::class, 'suggestions']);
    Route::post('/advanced-search', [TagAreaController::class, 'advancedSearch']);

    Route::get('/import-template', [TagAreaController::class, 'importTemplate']);
    Route::post('/import', [TagAreaController::class, 'import']);
    Route::get('/export', [TagAreaController::class, 'export']);

    Route::post('/bulk-store', [TagAreaController::class, 'bulkStore']);
    Route::post('/bulk-update', [TagAreaController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [TagAreaController::class, 'bulkDestroy']);

    Route::get('/trashed', [TagAreaController::class, 'trashed']);
    Route::post('/{id}/restore', [TagAreaController::class, 'restore']);
    Route::delete('/{id}/force', [TagAreaController::class, 'forceDelete']);

    Route::get('/', [TagAreaController::class, 'index']);
    Route::post('/', [TagAreaController::class, 'store']);
    Route::get('/{id}', [TagAreaController::class, 'show']);
    Route::put('/{id}', [TagAreaController::class, 'update']);
    Route::delete('/{id}', [TagAreaController::class, 'destroy']);

    Route::post('/{id}/duplicate', [TagAreaController::class, 'duplicate']);
    Route::get('/{id}/stats', [TagAreaController::class, 'stats']);
});

// ========================
// PORTFOLIO_TEMPDATA RESOURCE
// ========================
Route::prefix('portfolio-tempdata')->group(function () {
    use App\Http\Controllers\Api\V1\PortfolioTempdataController;

    Route::get('/filters', [PortfolioTempdataController::class, 'filters']);
    Route::get('/suggestions', [PortfolioTempdataController::class, 'suggestions']);
    Route::post('/advanced-search', [PortfolioTempdataController::class, 'advancedSearch']);

    Route::get('/import-template', [PortfolioTempdataController::class, 'importTemplate']);
    Route::post('/import', [PortfolioTempdataController::class, 'import']);
    Route::get('/export', [PortfolioTempdataController::class, 'export']);

    Route::post('/bulk-store', [PortfolioTempdataController::class, 'bulkStore']);
    Route::post('/bulk-update', [PortfolioTempdataController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PortfolioTempdataController::class, 'bulkDestroy']);

    Route::get('/trashed', [PortfolioTempdataController::class, 'trashed']);
    Route::post('/{id}/restore', [PortfolioTempdataController::class, 'restore']);
    Route::delete('/{id}/force', [PortfolioTempdataController::class, 'forceDelete']);

    Route::get('/', [PortfolioTempdataController::class, 'index']);
    Route::post('/', [PortfolioTempdataController::class, 'store']);
    Route::get('/{id}', [PortfolioTempdataController::class, 'show']);
    Route::put('/{id}', [PortfolioTempdataController::class, 'update']);
    Route::delete('/{id}', [PortfolioTempdataController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PortfolioTempdataController::class, 'duplicate']);
    Route::get('/{id}/stats', [PortfolioTempdataController::class, 'stats']);
});

// ========================
// PORTFOLIO_INSTANCE_CONFIG RESOURCE
// ========================
Route::prefix('portfolio-instance-config')->group(function () {
    use App\Http\Controllers\Api\V1\PortfolioInstanceConfigController;

    Route::get('/filters', [PortfolioInstanceConfigController::class, 'filters']);
    Route::get('/suggestions', [PortfolioInstanceConfigController::class, 'suggestions']);
    Route::post('/advanced-search', [PortfolioInstanceConfigController::class, 'advancedSearch']);

    Route::get('/import-template', [PortfolioInstanceConfigController::class, 'importTemplate']);
    Route::post('/import', [PortfolioInstanceConfigController::class, 'import']);
    Route::get('/export', [PortfolioInstanceConfigController::class, 'export']);

    Route::post('/bulk-store', [PortfolioInstanceConfigController::class, 'bulkStore']);
    Route::post('/bulk-update', [PortfolioInstanceConfigController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PortfolioInstanceConfigController::class, 'bulkDestroy']);

    Route::get('/trashed', [PortfolioInstanceConfigController::class, 'trashed']);
    Route::post('/{id}/restore', [PortfolioInstanceConfigController::class, 'restore']);
    Route::delete('/{id}/force', [PortfolioInstanceConfigController::class, 'forceDelete']);

    Route::get('/', [PortfolioInstanceConfigController::class, 'index']);
    Route::post('/', [PortfolioInstanceConfigController::class, 'store']);
    Route::get('/{id}', [PortfolioInstanceConfigController::class, 'show']);
    Route::put('/{id}', [PortfolioInstanceConfigController::class, 'update']);
    Route::delete('/{id}', [PortfolioInstanceConfigController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PortfolioInstanceConfigController::class, 'duplicate']);
    Route::get('/{id}/stats', [PortfolioInstanceConfigController::class, 'stats']);
});

// ========================
// PORTFOLIO_INSTANCE_USER RESOURCE
// ========================
Route::prefix('portfolio-instance-user')->group(function () {
    use App\Http\Controllers\Api\V1\PortfolioInstanceUserController;

    Route::get('/filters', [PortfolioInstanceUserController::class, 'filters']);
    Route::get('/suggestions', [PortfolioInstanceUserController::class, 'suggestions']);
    Route::post('/advanced-search', [PortfolioInstanceUserController::class, 'advancedSearch']);

    Route::get('/import-template', [PortfolioInstanceUserController::class, 'importTemplate']);
    Route::post('/import', [PortfolioInstanceUserController::class, 'import']);
    Route::get('/export', [PortfolioInstanceUserController::class, 'export']);

    Route::post('/bulk-store', [PortfolioInstanceUserController::class, 'bulkStore']);
    Route::post('/bulk-update', [PortfolioInstanceUserController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PortfolioInstanceUserController::class, 'bulkDestroy']);

    Route::get('/trashed', [PortfolioInstanceUserController::class, 'trashed']);
    Route::post('/{id}/restore', [PortfolioInstanceUserController::class, 'restore']);
    Route::delete('/{id}/force', [PortfolioInstanceUserController::class, 'forceDelete']);

    Route::get('/', [PortfolioInstanceUserController::class, 'index']);
    Route::post('/', [PortfolioInstanceUserController::class, 'store']);
    Route::get('/{id}', [PortfolioInstanceUserController::class, 'show']);
    Route::put('/{id}', [PortfolioInstanceUserController::class, 'update']);
    Route::delete('/{id}', [PortfolioInstanceUserController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PortfolioInstanceUserController::class, 'duplicate']);
    Route::get('/{id}/stats', [PortfolioInstanceUserController::class, 'stats']);
});

// ========================
// EXTERNAL_SERVICES_USERS RESOURCE
// ========================
Route::prefix('external-services-users')->group(function () {
    use App\Http\Controllers\Api\V1\ExternalServicesUsersController;

    Route::get('/filters', [ExternalServicesUsersController::class, 'filters']);
    Route::get('/suggestions', [ExternalServicesUsersController::class, 'suggestions']);
    Route::post('/advanced-search', [ExternalServicesUsersController::class, 'advancedSearch']);

    Route::get('/import-template', [ExternalServicesUsersController::class, 'importTemplate']);
    Route::post('/import', [ExternalServicesUsersController::class, 'import']);
    Route::get('/export', [ExternalServicesUsersController::class, 'export']);

    Route::post('/bulk-store', [ExternalServicesUsersController::class, 'bulkStore']);
    Route::post('/bulk-update', [ExternalServicesUsersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ExternalServicesUsersController::class, 'bulkDestroy']);

    Route::get('/trashed', [ExternalServicesUsersController::class, 'trashed']);
    Route::post('/{id}/restore', [ExternalServicesUsersController::class, 'restore']);
    Route::delete('/{id}/force', [ExternalServicesUsersController::class, 'forceDelete']);

    Route::get('/', [ExternalServicesUsersController::class, 'index']);
    Route::post('/', [ExternalServicesUsersController::class, 'store']);
    Route::get('/{id}', [ExternalServicesUsersController::class, 'show']);
    Route::put('/{id}', [ExternalServicesUsersController::class, 'update']);
    Route::delete('/{id}', [ExternalServicesUsersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ExternalServicesUsersController::class, 'duplicate']);
    Route::get('/{id}/stats', [ExternalServicesUsersController::class, 'stats']);
});

// ========================
// EXTERNAL_SERVICES_FUNCTIONS RESOURCE
// ========================
Route::prefix('external-services-functions')->group(function () {
    use App\Http\Controllers\Api\V1\ExternalServicesFunctionsController;

    Route::get('/filters', [ExternalServicesFunctionsController::class, 'filters']);
    Route::get('/suggestions', [ExternalServicesFunctionsController::class, 'suggestions']);
    Route::post('/advanced-search', [ExternalServicesFunctionsController::class, 'advancedSearch']);

    Route::get('/import-template', [ExternalServicesFunctionsController::class, 'importTemplate']);
    Route::post('/import', [ExternalServicesFunctionsController::class, 'import']);
    Route::get('/export', [ExternalServicesFunctionsController::class, 'export']);

    Route::post('/bulk-store', [ExternalServicesFunctionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ExternalServicesFunctionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ExternalServicesFunctionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ExternalServicesFunctionsController::class, 'trashed']);
    Route::post('/{id}/restore', [ExternalServicesFunctionsController::class, 'restore']);
    Route::delete('/{id}/force', [ExternalServicesFunctionsController::class, 'forceDelete']);

    Route::get('/', [ExternalServicesFunctionsController::class, 'index']);
    Route::post('/', [ExternalServicesFunctionsController::class, 'store']);
    Route::get('/{id}', [ExternalServicesFunctionsController::class, 'show']);
    Route::put('/{id}', [ExternalServicesFunctionsController::class, 'update']);
    Route::delete('/{id}', [ExternalServicesFunctionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ExternalServicesFunctionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ExternalServicesFunctionsController::class, 'stats']);
});

// ========================
// EXTERNAL_TOKENS RESOURCE
// ========================
Route::prefix('external-tokens')->group(function () {
    use App\Http\Controllers\Api\V1\ExternalTokensController;

    Route::get('/filters', [ExternalTokensController::class, 'filters']);
    Route::get('/suggestions', [ExternalTokensController::class, 'suggestions']);
    Route::post('/advanced-search', [ExternalTokensController::class, 'advancedSearch']);

    Route::get('/import-template', [ExternalTokensController::class, 'importTemplate']);
    Route::post('/import', [ExternalTokensController::class, 'import']);
    Route::get('/export', [ExternalTokensController::class, 'export']);

    Route::post('/bulk-store', [ExternalTokensController::class, 'bulkStore']);
    Route::post('/bulk-update', [ExternalTokensController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ExternalTokensController::class, 'bulkDestroy']);

    Route::get('/trashed', [ExternalTokensController::class, 'trashed']);
    Route::post('/{id}/restore', [ExternalTokensController::class, 'restore']);
    Route::delete('/{id}/force', [ExternalTokensController::class, 'forceDelete']);

    Route::get('/', [ExternalTokensController::class, 'index']);
    Route::post('/', [ExternalTokensController::class, 'store']);
    Route::get('/{id}', [ExternalTokensController::class, 'show']);
    Route::put('/{id}', [ExternalTokensController::class, 'update']);
    Route::delete('/{id}', [ExternalTokensController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ExternalTokensController::class, 'duplicate']);
    Route::get('/{id}/stats', [ExternalTokensController::class, 'stats']);
});

// ========================
// MESSAGEINBOUND_DATAKEYS RESOURCE
// ========================
Route::prefix('messageinbound-datakeys')->group(function () {
    use App\Http\Controllers\Api\V1\MessageinboundDatakeysController;

    Route::get('/filters', [MessageinboundDatakeysController::class, 'filters']);
    Route::get('/suggestions', [MessageinboundDatakeysController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageinboundDatakeysController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageinboundDatakeysController::class, 'importTemplate']);
    Route::post('/import', [MessageinboundDatakeysController::class, 'import']);
    Route::get('/export', [MessageinboundDatakeysController::class, 'export']);

    Route::post('/bulk-store', [MessageinboundDatakeysController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageinboundDatakeysController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageinboundDatakeysController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageinboundDatakeysController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageinboundDatakeysController::class, 'restore']);
    Route::delete('/{id}/force', [MessageinboundDatakeysController::class, 'forceDelete']);

    Route::get('/', [MessageinboundDatakeysController::class, 'index']);
    Route::post('/', [MessageinboundDatakeysController::class, 'store']);
    Route::get('/{id}', [MessageinboundDatakeysController::class, 'show']);
    Route::put('/{id}', [MessageinboundDatakeysController::class, 'update']);
    Route::delete('/{id}', [MessageinboundDatakeysController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageinboundDatakeysController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageinboundDatakeysController::class, 'stats']);
});

// ========================
// OAUTH2_REFRESH_TOKEN RESOURCE
// ========================
Route::prefix('oauth2-refresh-token')->group(function () {
    use App\Http\Controllers\Api\V1\Oauth2RefreshTokenController;

    Route::get('/filters', [Oauth2RefreshTokenController::class, 'filters']);
    Route::get('/suggestions', [Oauth2RefreshTokenController::class, 'suggestions']);
    Route::post('/advanced-search', [Oauth2RefreshTokenController::class, 'advancedSearch']);

    Route::get('/import-template', [Oauth2RefreshTokenController::class, 'importTemplate']);
    Route::post('/import', [Oauth2RefreshTokenController::class, 'import']);
    Route::get('/export', [Oauth2RefreshTokenController::class, 'export']);

    Route::post('/bulk-store', [Oauth2RefreshTokenController::class, 'bulkStore']);
    Route::post('/bulk-update', [Oauth2RefreshTokenController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [Oauth2RefreshTokenController::class, 'bulkDestroy']);

    Route::get('/trashed', [Oauth2RefreshTokenController::class, 'trashed']);
    Route::post('/{id}/restore', [Oauth2RefreshTokenController::class, 'restore']);
    Route::delete('/{id}/force', [Oauth2RefreshTokenController::class, 'forceDelete']);

    Route::get('/', [Oauth2RefreshTokenController::class, 'index']);
    Route::post('/', [Oauth2RefreshTokenController::class, 'store']);
    Route::get('/{id}', [Oauth2RefreshTokenController::class, 'show']);
    Route::put('/{id}', [Oauth2RefreshTokenController::class, 'update']);
    Route::delete('/{id}', [Oauth2RefreshTokenController::class, 'destroy']);

    Route::post('/{id}/duplicate', [Oauth2RefreshTokenController::class, 'duplicate']);
    Route::get('/{id}/stats', [Oauth2RefreshTokenController::class, 'stats']);
});

// ========================
// BADGE_EXTERNAL_BACKPACK RESOURCE
// ========================
Route::prefix('badge-external-backpack')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeExternalBackpackController;

    Route::get('/filters', [BadgeExternalBackpackController::class, 'filters']);
    Route::get('/suggestions', [BadgeExternalBackpackController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeExternalBackpackController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeExternalBackpackController::class, 'importTemplate']);
    Route::post('/import', [BadgeExternalBackpackController::class, 'import']);
    Route::get('/export', [BadgeExternalBackpackController::class, 'export']);

    Route::post('/bulk-store', [BadgeExternalBackpackController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeExternalBackpackController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeExternalBackpackController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeExternalBackpackController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeExternalBackpackController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeExternalBackpackController::class, 'forceDelete']);

    Route::get('/', [BadgeExternalBackpackController::class, 'index']);
    Route::post('/', [BadgeExternalBackpackController::class, 'store']);
    Route::get('/{id}', [BadgeExternalBackpackController::class, 'show']);
    Route::put('/{id}', [BadgeExternalBackpackController::class, 'update']);
    Route::delete('/{id}', [BadgeExternalBackpackController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeExternalBackpackController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeExternalBackpackController::class, 'stats']);
});

// ========================
// OAUTH2_ENDPOINT RESOURCE
// ========================
Route::prefix('oauth2-endpoint')->group(function () {
    use App\Http\Controllers\Api\V1\Oauth2EndpointController;

    Route::get('/filters', [Oauth2EndpointController::class, 'filters']);
    Route::get('/suggestions', [Oauth2EndpointController::class, 'suggestions']);
    Route::post('/advanced-search', [Oauth2EndpointController::class, 'advancedSearch']);

    Route::get('/import-template', [Oauth2EndpointController::class, 'importTemplate']);
    Route::post('/import', [Oauth2EndpointController::class, 'import']);
    Route::get('/export', [Oauth2EndpointController::class, 'export']);

    Route::post('/bulk-store', [Oauth2EndpointController::class, 'bulkStore']);
    Route::post('/bulk-update', [Oauth2EndpointController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [Oauth2EndpointController::class, 'bulkDestroy']);

    Route::get('/trashed', [Oauth2EndpointController::class, 'trashed']);
    Route::post('/{id}/restore', [Oauth2EndpointController::class, 'restore']);
    Route::delete('/{id}/force', [Oauth2EndpointController::class, 'forceDelete']);

    Route::get('/', [Oauth2EndpointController::class, 'index']);
    Route::post('/', [Oauth2EndpointController::class, 'store']);
    Route::get('/{id}', [Oauth2EndpointController::class, 'show']);
    Route::put('/{id}', [Oauth2EndpointController::class, 'update']);
    Route::delete('/{id}', [Oauth2EndpointController::class, 'destroy']);

    Route::post('/{id}/duplicate', [Oauth2EndpointController::class, 'duplicate']);
    Route::get('/{id}/stats', [Oauth2EndpointController::class, 'stats']);
});

// ========================
// AUTH_OAUTH2_LINKED_LOGIN RESOURCE
// ========================
Route::prefix('auth-oauth2-linked-login')->group(function () {
    use App\Http\Controllers\Api\V1\AuthOauth2LinkedLoginController;

    Route::get('/filters', [AuthOauth2LinkedLoginController::class, 'filters']);
    Route::get('/suggestions', [AuthOauth2LinkedLoginController::class, 'suggestions']);
    Route::post('/advanced-search', [AuthOauth2LinkedLoginController::class, 'advancedSearch']);

    Route::get('/import-template', [AuthOauth2LinkedLoginController::class, 'importTemplate']);
    Route::post('/import', [AuthOauth2LinkedLoginController::class, 'import']);
    Route::get('/export', [AuthOauth2LinkedLoginController::class, 'export']);

    Route::post('/bulk-store', [AuthOauth2LinkedLoginController::class, 'bulkStore']);
    Route::post('/bulk-update', [AuthOauth2LinkedLoginController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AuthOauth2LinkedLoginController::class, 'bulkDestroy']);

    Route::get('/trashed', [AuthOauth2LinkedLoginController::class, 'trashed']);
    Route::post('/{id}/restore', [AuthOauth2LinkedLoginController::class, 'restore']);
    Route::delete('/{id}/force', [AuthOauth2LinkedLoginController::class, 'forceDelete']);

    Route::get('/', [AuthOauth2LinkedLoginController::class, 'index']);
    Route::post('/', [AuthOauth2LinkedLoginController::class, 'store']);
    Route::get('/{id}', [AuthOauth2LinkedLoginController::class, 'show']);
    Route::put('/{id}', [AuthOauth2LinkedLoginController::class, 'update']);
    Route::delete('/{id}', [AuthOauth2LinkedLoginController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AuthOauth2LinkedLoginController::class, 'duplicate']);
    Route::get('/{id}/stats', [AuthOauth2LinkedLoginController::class, 'stats']);
});

// ========================
// OAUTH2_USER_FIELD_MAPPING RESOURCE
// ========================
Route::prefix('oauth2-user-field-mapping')->group(function () {
    use App\Http\Controllers\Api\V1\Oauth2UserFieldMappingController;

    Route::get('/filters', [Oauth2UserFieldMappingController::class, 'filters']);
    Route::get('/suggestions', [Oauth2UserFieldMappingController::class, 'suggestions']);
    Route::post('/advanced-search', [Oauth2UserFieldMappingController::class, 'advancedSearch']);

    Route::get('/import-template', [Oauth2UserFieldMappingController::class, 'importTemplate']);
    Route::post('/import', [Oauth2UserFieldMappingController::class, 'import']);
    Route::get('/export', [Oauth2UserFieldMappingController::class, 'export']);

    Route::post('/bulk-store', [Oauth2UserFieldMappingController::class, 'bulkStore']);
    Route::post('/bulk-update', [Oauth2UserFieldMappingController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [Oauth2UserFieldMappingController::class, 'bulkDestroy']);

    Route::get('/trashed', [Oauth2UserFieldMappingController::class, 'trashed']);
    Route::post('/{id}/restore', [Oauth2UserFieldMappingController::class, 'restore']);
    Route::delete('/{id}/force', [Oauth2UserFieldMappingController::class, 'forceDelete']);

    Route::get('/', [Oauth2UserFieldMappingController::class, 'index']);
    Route::post('/', [Oauth2UserFieldMappingController::class, 'store']);
    Route::get('/{id}', [Oauth2UserFieldMappingController::class, 'show']);
    Route::put('/{id}', [Oauth2UserFieldMappingController::class, 'update']);
    Route::delete('/{id}', [Oauth2UserFieldMappingController::class, 'destroy']);

    Route::post('/{id}/duplicate', [Oauth2UserFieldMappingController::class, 'duplicate']);
    Route::get('/{id}/stats', [Oauth2UserFieldMappingController::class, 'stats']);
});

// ========================
// H5P RESOURCE
// ========================
Route::prefix('h5p')->group(function () {
    use App\Http\Controllers\Api\V1\H5pController;

    Route::get('/filters', [H5pController::class, 'filters']);
    Route::get('/suggestions', [H5pController::class, 'suggestions']);
    Route::post('/advanced-search', [H5pController::class, 'advancedSearch']);

    Route::get('/import-template', [H5pController::class, 'importTemplate']);
    Route::post('/import', [H5pController::class, 'import']);
    Route::get('/export', [H5pController::class, 'export']);

    Route::post('/bulk-store', [H5pController::class, 'bulkStore']);
    Route::post('/bulk-update', [H5pController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [H5pController::class, 'bulkDestroy']);

    Route::get('/trashed', [H5pController::class, 'trashed']);
    Route::post('/{id}/restore', [H5pController::class, 'restore']);
    Route::delete('/{id}/force', [H5pController::class, 'forceDelete']);

    Route::get('/', [H5pController::class, 'index']);
    Route::post('/', [H5pController::class, 'store']);
    Route::get('/{id}', [H5pController::class, 'show']);
    Route::put('/{id}', [H5pController::class, 'update']);
    Route::delete('/{id}', [H5pController::class, 'destroy']);

    Route::post('/{id}/duplicate', [H5pController::class, 'duplicate']);
    Route::get('/{id}/stats', [H5pController::class, 'stats']);
});

// ========================
// H5P_LIBRARY_DEPENDENCIES RESOURCE
// ========================
Route::prefix('h5p-library-dependencies')->group(function () {
    use App\Http\Controllers\Api\V1\H5pLibraryDependenciesController;

    Route::get('/filters', [H5pLibraryDependenciesController::class, 'filters']);
    Route::get('/suggestions', [H5pLibraryDependenciesController::class, 'suggestions']);
    Route::post('/advanced-search', [H5pLibraryDependenciesController::class, 'advancedSearch']);

    Route::get('/import-template', [H5pLibraryDependenciesController::class, 'importTemplate']);
    Route::post('/import', [H5pLibraryDependenciesController::class, 'import']);
    Route::get('/export', [H5pLibraryDependenciesController::class, 'export']);

    Route::post('/bulk-store', [H5pLibraryDependenciesController::class, 'bulkStore']);
    Route::post('/bulk-update', [H5pLibraryDependenciesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [H5pLibraryDependenciesController::class, 'bulkDestroy']);

    Route::get('/trashed', [H5pLibraryDependenciesController::class, 'trashed']);
    Route::post('/{id}/restore', [H5pLibraryDependenciesController::class, 'restore']);
    Route::delete('/{id}/force', [H5pLibraryDependenciesController::class, 'forceDelete']);

    Route::get('/', [H5pLibraryDependenciesController::class, 'index']);
    Route::post('/', [H5pLibraryDependenciesController::class, 'store']);
    Route::get('/{id}', [H5pLibraryDependenciesController::class, 'show']);
    Route::put('/{id}', [H5pLibraryDependenciesController::class, 'update']);
    Route::delete('/{id}', [H5pLibraryDependenciesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [H5pLibraryDependenciesController::class, 'duplicate']);
    Route::get('/{id}/stats', [H5pLibraryDependenciesController::class, 'stats']);
});

// ========================
// H5P_LIBRARIES_CACHEDASSETS RESOURCE
// ========================
Route::prefix('h5p-libraries-cachedassets')->group(function () {
    use App\Http\Controllers\Api\V1\H5pLibrariesCachedassetsController;

    Route::get('/filters', [H5pLibrariesCachedassetsController::class, 'filters']);
    Route::get('/suggestions', [H5pLibrariesCachedassetsController::class, 'suggestions']);
    Route::post('/advanced-search', [H5pLibrariesCachedassetsController::class, 'advancedSearch']);

    Route::get('/import-template', [H5pLibrariesCachedassetsController::class, 'importTemplate']);
    Route::post('/import', [H5pLibrariesCachedassetsController::class, 'import']);
    Route::get('/export', [H5pLibrariesCachedassetsController::class, 'export']);

    Route::post('/bulk-store', [H5pLibrariesCachedassetsController::class, 'bulkStore']);
    Route::post('/bulk-update', [H5pLibrariesCachedassetsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [H5pLibrariesCachedassetsController::class, 'bulkDestroy']);

    Route::get('/trashed', [H5pLibrariesCachedassetsController::class, 'trashed']);
    Route::post('/{id}/restore', [H5pLibrariesCachedassetsController::class, 'restore']);
    Route::delete('/{id}/force', [H5pLibrariesCachedassetsController::class, 'forceDelete']);

    Route::get('/', [H5pLibrariesCachedassetsController::class, 'index']);
    Route::post('/', [H5pLibrariesCachedassetsController::class, 'store']);
    Route::get('/{id}', [H5pLibrariesCachedassetsController::class, 'show']);
    Route::put('/{id}', [H5pLibrariesCachedassetsController::class, 'update']);
    Route::delete('/{id}', [H5pLibrariesCachedassetsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [H5pLibrariesCachedassetsController::class, 'duplicate']);
    Route::get('/{id}/stats', [H5pLibrariesCachedassetsController::class, 'stats']);
});

// ========================
// ASSIGN_SUBMISSION RESOURCE
// ========================
Route::prefix('assign-submission')->group(function () {
    use App\Http\Controllers\Api\V1\AssignSubmissionController;

    Route::get('/filters', [AssignSubmissionController::class, 'filters']);
    Route::get('/suggestions', [AssignSubmissionController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignSubmissionController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignSubmissionController::class, 'importTemplate']);
    Route::post('/import', [AssignSubmissionController::class, 'import']);
    Route::get('/export', [AssignSubmissionController::class, 'export']);

    Route::post('/bulk-store', [AssignSubmissionController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignSubmissionController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignSubmissionController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignSubmissionController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignSubmissionController::class, 'restore']);
    Route::delete('/{id}/force', [AssignSubmissionController::class, 'forceDelete']);

    Route::get('/', [AssignSubmissionController::class, 'index']);
    Route::post('/', [AssignSubmissionController::class, 'store']);
    Route::get('/{id}', [AssignSubmissionController::class, 'show']);
    Route::put('/{id}', [AssignSubmissionController::class, 'update']);
    Route::delete('/{id}', [AssignSubmissionController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignSubmissionController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignSubmissionController::class, 'stats']);
});

// ========================
// ASSIGN_PLUGIN_CONFIG RESOURCE
// ========================
Route::prefix('assign-plugin-config')->group(function () {
    use App\Http\Controllers\Api\V1\AssignPluginConfigController;

    Route::get('/filters', [AssignPluginConfigController::class, 'filters']);
    Route::get('/suggestions', [AssignPluginConfigController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignPluginConfigController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignPluginConfigController::class, 'importTemplate']);
    Route::post('/import', [AssignPluginConfigController::class, 'import']);
    Route::get('/export', [AssignPluginConfigController::class, 'export']);

    Route::post('/bulk-store', [AssignPluginConfigController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignPluginConfigController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignPluginConfigController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignPluginConfigController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignPluginConfigController::class, 'restore']);
    Route::delete('/{id}/force', [AssignPluginConfigController::class, 'forceDelete']);

    Route::get('/', [AssignPluginConfigController::class, 'index']);
    Route::post('/', [AssignPluginConfigController::class, 'store']);
    Route::get('/{id}', [AssignPluginConfigController::class, 'show']);
    Route::put('/{id}', [AssignPluginConfigController::class, 'update']);
    Route::delete('/{id}', [AssignPluginConfigController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignPluginConfigController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignPluginConfigController::class, 'stats']);
});

// ========================
// ASSIGN_USER_MAPPING RESOURCE
// ========================
Route::prefix('assign-user-mapping')->group(function () {
    use App\Http\Controllers\Api\V1\AssignUserMappingController;

    Route::get('/filters', [AssignUserMappingController::class, 'filters']);
    Route::get('/suggestions', [AssignUserMappingController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignUserMappingController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignUserMappingController::class, 'importTemplate']);
    Route::post('/import', [AssignUserMappingController::class, 'import']);
    Route::get('/export', [AssignUserMappingController::class, 'export']);

    Route::post('/bulk-store', [AssignUserMappingController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignUserMappingController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignUserMappingController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignUserMappingController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignUserMappingController::class, 'restore']);
    Route::delete('/{id}/force', [AssignUserMappingController::class, 'forceDelete']);

    Route::get('/', [AssignUserMappingController::class, 'index']);
    Route::post('/', [AssignUserMappingController::class, 'store']);
    Route::get('/{id}', [AssignUserMappingController::class, 'show']);
    Route::put('/{id}', [AssignUserMappingController::class, 'update']);
    Route::delete('/{id}', [AssignUserMappingController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignUserMappingController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignUserMappingController::class, 'stats']);
});

// ========================
// ASSIGN_GRADES RESOURCE
// ========================
Route::prefix('assign-grades')->group(function () {
    use App\Http\Controllers\Api\V1\AssignGradesController;

    Route::get('/filters', [AssignGradesController::class, 'filters']);
    Route::get('/suggestions', [AssignGradesController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignGradesController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignGradesController::class, 'importTemplate']);
    Route::post('/import', [AssignGradesController::class, 'import']);
    Route::get('/export', [AssignGradesController::class, 'export']);

    Route::post('/bulk-store', [AssignGradesController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignGradesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignGradesController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignGradesController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignGradesController::class, 'restore']);
    Route::delete('/{id}/force', [AssignGradesController::class, 'forceDelete']);

    Route::get('/', [AssignGradesController::class, 'index']);
    Route::post('/', [AssignGradesController::class, 'store']);
    Route::get('/{id}', [AssignGradesController::class, 'show']);
    Route::put('/{id}', [AssignGradesController::class, 'update']);
    Route::delete('/{id}', [AssignGradesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignGradesController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignGradesController::class, 'stats']);
});

// ========================
// ASSIGN_USER_FLAGS RESOURCE
// ========================
Route::prefix('assign-user-flags')->group(function () {
    use App\Http\Controllers\Api\V1\AssignUserFlagsController;

    Route::get('/filters', [AssignUserFlagsController::class, 'filters']);
    Route::get('/suggestions', [AssignUserFlagsController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignUserFlagsController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignUserFlagsController::class, 'importTemplate']);
    Route::post('/import', [AssignUserFlagsController::class, 'import']);
    Route::get('/export', [AssignUserFlagsController::class, 'export']);

    Route::post('/bulk-store', [AssignUserFlagsController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignUserFlagsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignUserFlagsController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignUserFlagsController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignUserFlagsController::class, 'restore']);
    Route::delete('/{id}/force', [AssignUserFlagsController::class, 'forceDelete']);

    Route::get('/', [AssignUserFlagsController::class, 'index']);
    Route::post('/', [AssignUserFlagsController::class, 'store']);
    Route::get('/{id}', [AssignUserFlagsController::class, 'show']);
    Route::put('/{id}', [AssignUserFlagsController::class, 'update']);
    Route::delete('/{id}', [AssignUserFlagsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignUserFlagsController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignUserFlagsController::class, 'stats']);
});

// ========================
// BIGBLUEBUTTONBN_RECORDINGS RESOURCE
// ========================
Route::prefix('bigbluebuttonbn-recordings')->group(function () {
    use App\Http\Controllers\Api\V1\BigbluebuttonbnRecordingsController;

    Route::get('/filters', [BigbluebuttonbnRecordingsController::class, 'filters']);
    Route::get('/suggestions', [BigbluebuttonbnRecordingsController::class, 'suggestions']);
    Route::post('/advanced-search', [BigbluebuttonbnRecordingsController::class, 'advancedSearch']);

    Route::get('/import-template', [BigbluebuttonbnRecordingsController::class, 'importTemplate']);
    Route::post('/import', [BigbluebuttonbnRecordingsController::class, 'import']);
    Route::get('/export', [BigbluebuttonbnRecordingsController::class, 'export']);

    Route::post('/bulk-store', [BigbluebuttonbnRecordingsController::class, 'bulkStore']);
    Route::post('/bulk-update', [BigbluebuttonbnRecordingsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BigbluebuttonbnRecordingsController::class, 'bulkDestroy']);

    Route::get('/trashed', [BigbluebuttonbnRecordingsController::class, 'trashed']);
    Route::post('/{id}/restore', [BigbluebuttonbnRecordingsController::class, 'restore']);
    Route::delete('/{id}/force', [BigbluebuttonbnRecordingsController::class, 'forceDelete']);

    Route::get('/', [BigbluebuttonbnRecordingsController::class, 'index']);
    Route::post('/', [BigbluebuttonbnRecordingsController::class, 'store']);
    Route::get('/{id}', [BigbluebuttonbnRecordingsController::class, 'show']);
    Route::put('/{id}', [BigbluebuttonbnRecordingsController::class, 'update']);
    Route::delete('/{id}', [BigbluebuttonbnRecordingsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BigbluebuttonbnRecordingsController::class, 'duplicate']);
    Route::get('/{id}/stats', [BigbluebuttonbnRecordingsController::class, 'stats']);
});

// ========================
// CHAT_MESSAGES RESOURCE
// ========================
Route::prefix('chat-messages')->group(function () {
    use App\Http\Controllers\Api\V1\ChatMessagesController;

    Route::get('/filters', [ChatMessagesController::class, 'filters']);
    Route::get('/suggestions', [ChatMessagesController::class, 'suggestions']);
    Route::post('/advanced-search', [ChatMessagesController::class, 'advancedSearch']);

    Route::get('/import-template', [ChatMessagesController::class, 'importTemplate']);
    Route::post('/import', [ChatMessagesController::class, 'import']);
    Route::get('/export', [ChatMessagesController::class, 'export']);

    Route::post('/bulk-store', [ChatMessagesController::class, 'bulkStore']);
    Route::post('/bulk-update', [ChatMessagesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ChatMessagesController::class, 'bulkDestroy']);

    Route::get('/trashed', [ChatMessagesController::class, 'trashed']);
    Route::post('/{id}/restore', [ChatMessagesController::class, 'restore']);
    Route::delete('/{id}/force', [ChatMessagesController::class, 'forceDelete']);

    Route::get('/', [ChatMessagesController::class, 'index']);
    Route::post('/', [ChatMessagesController::class, 'store']);
    Route::get('/{id}', [ChatMessagesController::class, 'show']);
    Route::put('/{id}', [ChatMessagesController::class, 'update']);
    Route::delete('/{id}', [ChatMessagesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ChatMessagesController::class, 'duplicate']);
    Route::get('/{id}/stats', [ChatMessagesController::class, 'stats']);
});

// ========================
// CHAT_USERS RESOURCE
// ========================
Route::prefix('chat-users')->group(function () {
    use App\Http\Controllers\Api\V1\ChatUsersController;

    Route::get('/filters', [ChatUsersController::class, 'filters']);
    Route::get('/suggestions', [ChatUsersController::class, 'suggestions']);
    Route::post('/advanced-search', [ChatUsersController::class, 'advancedSearch']);

    Route::get('/import-template', [ChatUsersController::class, 'importTemplate']);
    Route::post('/import', [ChatUsersController::class, 'import']);
    Route::get('/export', [ChatUsersController::class, 'export']);

    Route::post('/bulk-store', [ChatUsersController::class, 'bulkStore']);
    Route::post('/bulk-update', [ChatUsersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ChatUsersController::class, 'bulkDestroy']);

    Route::get('/trashed', [ChatUsersController::class, 'trashed']);
    Route::post('/{id}/restore', [ChatUsersController::class, 'restore']);
    Route::delete('/{id}/force', [ChatUsersController::class, 'forceDelete']);

    Route::get('/', [ChatUsersController::class, 'index']);
    Route::post('/', [ChatUsersController::class, 'store']);
    Route::get('/{id}', [ChatUsersController::class, 'show']);
    Route::put('/{id}', [ChatUsersController::class, 'update']);
    Route::delete('/{id}', [ChatUsersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ChatUsersController::class, 'duplicate']);
    Route::get('/{id}/stats', [ChatUsersController::class, 'stats']);
});

// ========================
// CHAT_MESSAGES_CURRENT RESOURCE
// ========================
Route::prefix('chat-messages-current')->group(function () {
    use App\Http\Controllers\Api\V1\ChatMessagesCurrentController;

    Route::get('/filters', [ChatMessagesCurrentController::class, 'filters']);
    Route::get('/suggestions', [ChatMessagesCurrentController::class, 'suggestions']);
    Route::post('/advanced-search', [ChatMessagesCurrentController::class, 'advancedSearch']);

    Route::get('/import-template', [ChatMessagesCurrentController::class, 'importTemplate']);
    Route::post('/import', [ChatMessagesCurrentController::class, 'import']);
    Route::get('/export', [ChatMessagesCurrentController::class, 'export']);

    Route::post('/bulk-store', [ChatMessagesCurrentController::class, 'bulkStore']);
    Route::post('/bulk-update', [ChatMessagesCurrentController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ChatMessagesCurrentController::class, 'bulkDestroy']);

    Route::get('/trashed', [ChatMessagesCurrentController::class, 'trashed']);
    Route::post('/{id}/restore', [ChatMessagesCurrentController::class, 'restore']);
    Route::delete('/{id}/force', [ChatMessagesCurrentController::class, 'forceDelete']);

    Route::get('/', [ChatMessagesCurrentController::class, 'index']);
    Route::post('/', [ChatMessagesCurrentController::class, 'store']);
    Route::get('/{id}', [ChatMessagesCurrentController::class, 'show']);
    Route::put('/{id}', [ChatMessagesCurrentController::class, 'update']);
    Route::delete('/{id}', [ChatMessagesCurrentController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ChatMessagesCurrentController::class, 'duplicate']);
    Route::get('/{id}/stats', [ChatMessagesCurrentController::class, 'stats']);
});

// ========================
// CHOICE_OPTIONS RESOURCE
// ========================
Route::prefix('choice-options')->group(function () {
    use App\Http\Controllers\Api\V1\ChoiceOptionsController;

    Route::get('/filters', [ChoiceOptionsController::class, 'filters']);
    Route::get('/suggestions', [ChoiceOptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [ChoiceOptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [ChoiceOptionsController::class, 'importTemplate']);
    Route::post('/import', [ChoiceOptionsController::class, 'import']);
    Route::get('/export', [ChoiceOptionsController::class, 'export']);

    Route::post('/bulk-store', [ChoiceOptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ChoiceOptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ChoiceOptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ChoiceOptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [ChoiceOptionsController::class, 'restore']);
    Route::delete('/{id}/force', [ChoiceOptionsController::class, 'forceDelete']);

    Route::get('/', [ChoiceOptionsController::class, 'index']);
    Route::post('/', [ChoiceOptionsController::class, 'store']);
    Route::get('/{id}', [ChoiceOptionsController::class, 'show']);
    Route::put('/{id}', [ChoiceOptionsController::class, 'update']);
    Route::delete('/{id}', [ChoiceOptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ChoiceOptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ChoiceOptionsController::class, 'stats']);
});

// ========================
// DATA_RECORDS RESOURCE
// ========================
Route::prefix('data-records')->group(function () {
    use App\Http\Controllers\Api\V1\DataRecordsController;

    Route::get('/filters', [DataRecordsController::class, 'filters']);
    Route::get('/suggestions', [DataRecordsController::class, 'suggestions']);
    Route::post('/advanced-search', [DataRecordsController::class, 'advancedSearch']);

    Route::get('/import-template', [DataRecordsController::class, 'importTemplate']);
    Route::post('/import', [DataRecordsController::class, 'import']);
    Route::get('/export', [DataRecordsController::class, 'export']);

    Route::post('/bulk-store', [DataRecordsController::class, 'bulkStore']);
    Route::post('/bulk-update', [DataRecordsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [DataRecordsController::class, 'bulkDestroy']);

    Route::get('/trashed', [DataRecordsController::class, 'trashed']);
    Route::post('/{id}/restore', [DataRecordsController::class, 'restore']);
    Route::delete('/{id}/force', [DataRecordsController::class, 'forceDelete']);

    Route::get('/', [DataRecordsController::class, 'index']);
    Route::post('/', [DataRecordsController::class, 'store']);
    Route::get('/{id}', [DataRecordsController::class, 'show']);
    Route::put('/{id}', [DataRecordsController::class, 'update']);
    Route::delete('/{id}', [DataRecordsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [DataRecordsController::class, 'duplicate']);
    Route::get('/{id}/stats', [DataRecordsController::class, 'stats']);
});

// ========================
// DATA_FIELDS RESOURCE
// ========================
Route::prefix('data-fields')->group(function () {
    use App\Http\Controllers\Api\V1\DataFieldsController;

    Route::get('/filters', [DataFieldsController::class, 'filters']);
    Route::get('/suggestions', [DataFieldsController::class, 'suggestions']);
    Route::post('/advanced-search', [DataFieldsController::class, 'advancedSearch']);

    Route::get('/import-template', [DataFieldsController::class, 'importTemplate']);
    Route::post('/import', [DataFieldsController::class, 'import']);
    Route::get('/export', [DataFieldsController::class, 'export']);

    Route::post('/bulk-store', [DataFieldsController::class, 'bulkStore']);
    Route::post('/bulk-update', [DataFieldsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [DataFieldsController::class, 'bulkDestroy']);

    Route::get('/trashed', [DataFieldsController::class, 'trashed']);
    Route::post('/{id}/restore', [DataFieldsController::class, 'restore']);
    Route::delete('/{id}/force', [DataFieldsController::class, 'forceDelete']);

    Route::get('/', [DataFieldsController::class, 'index']);
    Route::post('/', [DataFieldsController::class, 'store']);
    Route::get('/{id}', [DataFieldsController::class, 'show']);
    Route::put('/{id}', [DataFieldsController::class, 'update']);
    Route::delete('/{id}', [DataFieldsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [DataFieldsController::class, 'duplicate']);
    Route::get('/{id}/stats', [DataFieldsController::class, 'stats']);
});

// ========================
// FEEDBACK_COMPLETED RESOURCE
// ========================
Route::prefix('feedback-completed')->group(function () {
    use App\Http\Controllers\Api\V1\FeedbackCompletedController;

    Route::get('/filters', [FeedbackCompletedController::class, 'filters']);
    Route::get('/suggestions', [FeedbackCompletedController::class, 'suggestions']);
    Route::post('/advanced-search', [FeedbackCompletedController::class, 'advancedSearch']);

    Route::get('/import-template', [FeedbackCompletedController::class, 'importTemplate']);
    Route::post('/import', [FeedbackCompletedController::class, 'import']);
    Route::get('/export', [FeedbackCompletedController::class, 'export']);

    Route::post('/bulk-store', [FeedbackCompletedController::class, 'bulkStore']);
    Route::post('/bulk-update', [FeedbackCompletedController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FeedbackCompletedController::class, 'bulkDestroy']);

    Route::get('/trashed', [FeedbackCompletedController::class, 'trashed']);
    Route::post('/{id}/restore', [FeedbackCompletedController::class, 'restore']);
    Route::delete('/{id}/force', [FeedbackCompletedController::class, 'forceDelete']);

    Route::get('/', [FeedbackCompletedController::class, 'index']);
    Route::post('/', [FeedbackCompletedController::class, 'store']);
    Route::get('/{id}', [FeedbackCompletedController::class, 'show']);
    Route::put('/{id}', [FeedbackCompletedController::class, 'update']);
    Route::delete('/{id}', [FeedbackCompletedController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FeedbackCompletedController::class, 'duplicate']);
    Route::get('/{id}/stats', [FeedbackCompletedController::class, 'stats']);
});

// ========================
// FEEDBACK_SITECOURSE_MAP RESOURCE
// ========================
Route::prefix('feedback-sitecourse-map')->group(function () {
    use App\Http\Controllers\Api\V1\FeedbackSitecourseMapController;

    Route::get('/filters', [FeedbackSitecourseMapController::class, 'filters']);
    Route::get('/suggestions', [FeedbackSitecourseMapController::class, 'suggestions']);
    Route::post('/advanced-search', [FeedbackSitecourseMapController::class, 'advancedSearch']);

    Route::get('/import-template', [FeedbackSitecourseMapController::class, 'importTemplate']);
    Route::post('/import', [FeedbackSitecourseMapController::class, 'import']);
    Route::get('/export', [FeedbackSitecourseMapController::class, 'export']);

    Route::post('/bulk-store', [FeedbackSitecourseMapController::class, 'bulkStore']);
    Route::post('/bulk-update', [FeedbackSitecourseMapController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FeedbackSitecourseMapController::class, 'bulkDestroy']);

    Route::get('/trashed', [FeedbackSitecourseMapController::class, 'trashed']);
    Route::post('/{id}/restore', [FeedbackSitecourseMapController::class, 'restore']);
    Route::delete('/{id}/force', [FeedbackSitecourseMapController::class, 'forceDelete']);

    Route::get('/', [FeedbackSitecourseMapController::class, 'index']);
    Route::post('/', [FeedbackSitecourseMapController::class, 'store']);
    Route::get('/{id}', [FeedbackSitecourseMapController::class, 'show']);
    Route::put('/{id}', [FeedbackSitecourseMapController::class, 'update']);
    Route::delete('/{id}', [FeedbackSitecourseMapController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FeedbackSitecourseMapController::class, 'duplicate']);
    Route::get('/{id}/stats', [FeedbackSitecourseMapController::class, 'stats']);
});

// ========================
// FEEDBACK_COMPLETEDTMP RESOURCE
// ========================
Route::prefix('feedback-completedtmp')->group(function () {
    use App\Http\Controllers\Api\V1\FeedbackCompletedtmpController;

    Route::get('/filters', [FeedbackCompletedtmpController::class, 'filters']);
    Route::get('/suggestions', [FeedbackCompletedtmpController::class, 'suggestions']);
    Route::post('/advanced-search', [FeedbackCompletedtmpController::class, 'advancedSearch']);

    Route::get('/import-template', [FeedbackCompletedtmpController::class, 'importTemplate']);
    Route::post('/import', [FeedbackCompletedtmpController::class, 'import']);
    Route::get('/export', [FeedbackCompletedtmpController::class, 'export']);

    Route::post('/bulk-store', [FeedbackCompletedtmpController::class, 'bulkStore']);
    Route::post('/bulk-update', [FeedbackCompletedtmpController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FeedbackCompletedtmpController::class, 'bulkDestroy']);

    Route::get('/trashed', [FeedbackCompletedtmpController::class, 'trashed']);
    Route::post('/{id}/restore', [FeedbackCompletedtmpController::class, 'restore']);
    Route::delete('/{id}/force', [FeedbackCompletedtmpController::class, 'forceDelete']);

    Route::get('/', [FeedbackCompletedtmpController::class, 'index']);
    Route::post('/', [FeedbackCompletedtmpController::class, 'store']);
    Route::get('/{id}', [FeedbackCompletedtmpController::class, 'show']);
    Route::put('/{id}', [FeedbackCompletedtmpController::class, 'update']);
    Route::delete('/{id}', [FeedbackCompletedtmpController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FeedbackCompletedtmpController::class, 'duplicate']);
    Route::get('/{id}/stats', [FeedbackCompletedtmpController::class, 'stats']);
});

// ========================
// FEEDBACK_ITEM RESOURCE
// ========================
Route::prefix('feedback-item')->group(function () {
    use App\Http\Controllers\Api\V1\FeedbackItemController;

    Route::get('/filters', [FeedbackItemController::class, 'filters']);
    Route::get('/suggestions', [FeedbackItemController::class, 'suggestions']);
    Route::post('/advanced-search', [FeedbackItemController::class, 'advancedSearch']);

    Route::get('/import-template', [FeedbackItemController::class, 'importTemplate']);
    Route::post('/import', [FeedbackItemController::class, 'import']);
    Route::get('/export', [FeedbackItemController::class, 'export']);

    Route::post('/bulk-store', [FeedbackItemController::class, 'bulkStore']);
    Route::post('/bulk-update', [FeedbackItemController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FeedbackItemController::class, 'bulkDestroy']);

    Route::get('/trashed', [FeedbackItemController::class, 'trashed']);
    Route::post('/{id}/restore', [FeedbackItemController::class, 'restore']);
    Route::delete('/{id}/force', [FeedbackItemController::class, 'forceDelete']);

    Route::get('/', [FeedbackItemController::class, 'index']);
    Route::post('/', [FeedbackItemController::class, 'store']);
    Route::get('/{id}', [FeedbackItemController::class, 'show']);
    Route::put('/{id}', [FeedbackItemController::class, 'update']);
    Route::delete('/{id}', [FeedbackItemController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FeedbackItemController::class, 'duplicate']);
    Route::get('/{id}/stats', [FeedbackItemController::class, 'stats']);
});

// ========================
// FORUM_DISCUSSIONS RESOURCE
// ========================
Route::prefix('forum-discussions')->group(function () {
    use App\Http\Controllers\Api\V1\ForumDiscussionsController;

    Route::get('/filters', [ForumDiscussionsController::class, 'filters']);
    Route::get('/suggestions', [ForumDiscussionsController::class, 'suggestions']);
    Route::post('/advanced-search', [ForumDiscussionsController::class, 'advancedSearch']);

    Route::get('/import-template', [ForumDiscussionsController::class, 'importTemplate']);
    Route::post('/import', [ForumDiscussionsController::class, 'import']);
    Route::get('/export', [ForumDiscussionsController::class, 'export']);

    Route::post('/bulk-store', [ForumDiscussionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ForumDiscussionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ForumDiscussionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ForumDiscussionsController::class, 'trashed']);
    Route::post('/{id}/restore', [ForumDiscussionsController::class, 'restore']);
    Route::delete('/{id}/force', [ForumDiscussionsController::class, 'forceDelete']);

    Route::get('/', [ForumDiscussionsController::class, 'index']);
    Route::post('/', [ForumDiscussionsController::class, 'store']);
    Route::get('/{id}', [ForumDiscussionsController::class, 'show']);
    Route::put('/{id}', [ForumDiscussionsController::class, 'update']);
    Route::delete('/{id}', [ForumDiscussionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ForumDiscussionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ForumDiscussionsController::class, 'stats']);
});

// ========================
// FORUM_GRADES RESOURCE
// ========================
Route::prefix('forum-grades')->group(function () {
    use App\Http\Controllers\Api\V1\ForumGradesController;

    Route::get('/filters', [ForumGradesController::class, 'filters']);
    Route::get('/suggestions', [ForumGradesController::class, 'suggestions']);
    Route::post('/advanced-search', [ForumGradesController::class, 'advancedSearch']);

    Route::get('/import-template', [ForumGradesController::class, 'importTemplate']);
    Route::post('/import', [ForumGradesController::class, 'import']);
    Route::get('/export', [ForumGradesController::class, 'export']);

    Route::post('/bulk-store', [ForumGradesController::class, 'bulkStore']);
    Route::post('/bulk-update', [ForumGradesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ForumGradesController::class, 'bulkDestroy']);

    Route::get('/trashed', [ForumGradesController::class, 'trashed']);
    Route::post('/{id}/restore', [ForumGradesController::class, 'restore']);
    Route::delete('/{id}/force', [ForumGradesController::class, 'forceDelete']);

    Route::get('/', [ForumGradesController::class, 'index']);
    Route::post('/', [ForumGradesController::class, 'store']);
    Route::get('/{id}', [ForumGradesController::class, 'show']);
    Route::put('/{id}', [ForumGradesController::class, 'update']);
    Route::delete('/{id}', [ForumGradesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ForumGradesController::class, 'duplicate']);
    Route::get('/{id}/stats', [ForumGradesController::class, 'stats']);
});

// ========================
// FORUM_DIGESTS RESOURCE
// ========================
Route::prefix('forum-digests')->group(function () {
    use App\Http\Controllers\Api\V1\ForumDigestsController;

    Route::get('/filters', [ForumDigestsController::class, 'filters']);
    Route::get('/suggestions', [ForumDigestsController::class, 'suggestions']);
    Route::post('/advanced-search', [ForumDigestsController::class, 'advancedSearch']);

    Route::get('/import-template', [ForumDigestsController::class, 'importTemplate']);
    Route::post('/import', [ForumDigestsController::class, 'import']);
    Route::get('/export', [ForumDigestsController::class, 'export']);

    Route::post('/bulk-store', [ForumDigestsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ForumDigestsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ForumDigestsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ForumDigestsController::class, 'trashed']);
    Route::post('/{id}/restore', [ForumDigestsController::class, 'restore']);
    Route::delete('/{id}/force', [ForumDigestsController::class, 'forceDelete']);

    Route::get('/', [ForumDigestsController::class, 'index']);
    Route::post('/', [ForumDigestsController::class, 'store']);
    Route::get('/{id}', [ForumDigestsController::class, 'show']);
    Route::put('/{id}', [ForumDigestsController::class, 'update']);
    Route::delete('/{id}', [ForumDigestsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ForumDigestsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ForumDigestsController::class, 'stats']);
});

// ========================
// FORUM_SUBSCRIPTIONS RESOURCE
// ========================
Route::prefix('forum-subscriptions')->group(function () {
    use App\Http\Controllers\Api\V1\ForumSubscriptionsController;

    Route::get('/filters', [ForumSubscriptionsController::class, 'filters']);
    Route::get('/suggestions', [ForumSubscriptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [ForumSubscriptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [ForumSubscriptionsController::class, 'importTemplate']);
    Route::post('/import', [ForumSubscriptionsController::class, 'import']);
    Route::get('/export', [ForumSubscriptionsController::class, 'export']);

    Route::post('/bulk-store', [ForumSubscriptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ForumSubscriptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ForumSubscriptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ForumSubscriptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [ForumSubscriptionsController::class, 'restore']);
    Route::delete('/{id}/force', [ForumSubscriptionsController::class, 'forceDelete']);

    Route::get('/', [ForumSubscriptionsController::class, 'index']);
    Route::post('/', [ForumSubscriptionsController::class, 'store']);
    Route::get('/{id}', [ForumSubscriptionsController::class, 'show']);
    Route::put('/{id}', [ForumSubscriptionsController::class, 'update']);
    Route::delete('/{id}', [ForumSubscriptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ForumSubscriptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ForumSubscriptionsController::class, 'stats']);
});

// ========================
// GLOSSARY_ENTRIES RESOURCE
// ========================
Route::prefix('glossary-entries')->group(function () {
    use App\Http\Controllers\Api\V1\GlossaryEntriesController;

    Route::get('/filters', [GlossaryEntriesController::class, 'filters']);
    Route::get('/suggestions', [GlossaryEntriesController::class, 'suggestions']);
    Route::post('/advanced-search', [GlossaryEntriesController::class, 'advancedSearch']);

    Route::get('/import-template', [GlossaryEntriesController::class, 'importTemplate']);
    Route::post('/import', [GlossaryEntriesController::class, 'import']);
    Route::get('/export', [GlossaryEntriesController::class, 'export']);

    Route::post('/bulk-store', [GlossaryEntriesController::class, 'bulkStore']);
    Route::post('/bulk-update', [GlossaryEntriesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GlossaryEntriesController::class, 'bulkDestroy']);

    Route::get('/trashed', [GlossaryEntriesController::class, 'trashed']);
    Route::post('/{id}/restore', [GlossaryEntriesController::class, 'restore']);
    Route::delete('/{id}/force', [GlossaryEntriesController::class, 'forceDelete']);

    Route::get('/', [GlossaryEntriesController::class, 'index']);
    Route::post('/', [GlossaryEntriesController::class, 'store']);
    Route::get('/{id}', [GlossaryEntriesController::class, 'show']);
    Route::put('/{id}', [GlossaryEntriesController::class, 'update']);
    Route::delete('/{id}', [GlossaryEntriesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GlossaryEntriesController::class, 'duplicate']);
    Route::get('/{id}/stats', [GlossaryEntriesController::class, 'stats']);
});

// ========================
// GLOSSARY_CATEGORIES RESOURCE
// ========================
Route::prefix('glossary-categories')->group(function () {
    use App\Http\Controllers\Api\V1\GlossaryCategoriesController;

    Route::get('/filters', [GlossaryCategoriesController::class, 'filters']);
    Route::get('/suggestions', [GlossaryCategoriesController::class, 'suggestions']);
    Route::post('/advanced-search', [GlossaryCategoriesController::class, 'advancedSearch']);

    Route::get('/import-template', [GlossaryCategoriesController::class, 'importTemplate']);
    Route::post('/import', [GlossaryCategoriesController::class, 'import']);
    Route::get('/export', [GlossaryCategoriesController::class, 'export']);

    Route::post('/bulk-store', [GlossaryCategoriesController::class, 'bulkStore']);
    Route::post('/bulk-update', [GlossaryCategoriesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GlossaryCategoriesController::class, 'bulkDestroy']);

    Route::get('/trashed', [GlossaryCategoriesController::class, 'trashed']);
    Route::post('/{id}/restore', [GlossaryCategoriesController::class, 'restore']);
    Route::delete('/{id}/force', [GlossaryCategoriesController::class, 'forceDelete']);

    Route::get('/', [GlossaryCategoriesController::class, 'index']);
    Route::post('/', [GlossaryCategoriesController::class, 'store']);
    Route::get('/{id}', [GlossaryCategoriesController::class, 'show']);
    Route::put('/{id}', [GlossaryCategoriesController::class, 'update']);
    Route::delete('/{id}', [GlossaryCategoriesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GlossaryCategoriesController::class, 'duplicate']);
    Route::get('/{id}/stats', [GlossaryCategoriesController::class, 'stats']);
});

// ========================
// LESSON_TIMER RESOURCE
// ========================
Route::prefix('lesson-timer')->group(function () {
    use App\Http\Controllers\Api\V1\LessonTimerController;

    Route::get('/filters', [LessonTimerController::class, 'filters']);
    Route::get('/suggestions', [LessonTimerController::class, 'suggestions']);
    Route::post('/advanced-search', [LessonTimerController::class, 'advancedSearch']);

    Route::get('/import-template', [LessonTimerController::class, 'importTemplate']);
    Route::post('/import', [LessonTimerController::class, 'import']);
    Route::get('/export', [LessonTimerController::class, 'export']);

    Route::post('/bulk-store', [LessonTimerController::class, 'bulkStore']);
    Route::post('/bulk-update', [LessonTimerController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LessonTimerController::class, 'bulkDestroy']);

    Route::get('/trashed', [LessonTimerController::class, 'trashed']);
    Route::post('/{id}/restore', [LessonTimerController::class, 'restore']);
    Route::delete('/{id}/force', [LessonTimerController::class, 'forceDelete']);

    Route::get('/', [LessonTimerController::class, 'index']);
    Route::post('/', [LessonTimerController::class, 'store']);
    Route::get('/{id}', [LessonTimerController::class, 'show']);
    Route::put('/{id}', [LessonTimerController::class, 'update']);
    Route::delete('/{id}', [LessonTimerController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LessonTimerController::class, 'duplicate']);
    Route::get('/{id}/stats', [LessonTimerController::class, 'stats']);
});

// ========================
// LESSON_PAGES RESOURCE
// ========================
Route::prefix('lesson-pages')->group(function () {
    use App\Http\Controllers\Api\V1\LessonPagesController;

    Route::get('/filters', [LessonPagesController::class, 'filters']);
    Route::get('/suggestions', [LessonPagesController::class, 'suggestions']);
    Route::post('/advanced-search', [LessonPagesController::class, 'advancedSearch']);

    Route::get('/import-template', [LessonPagesController::class, 'importTemplate']);
    Route::post('/import', [LessonPagesController::class, 'import']);
    Route::get('/export', [LessonPagesController::class, 'export']);

    Route::post('/bulk-store', [LessonPagesController::class, 'bulkStore']);
    Route::post('/bulk-update', [LessonPagesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LessonPagesController::class, 'bulkDestroy']);

    Route::get('/trashed', [LessonPagesController::class, 'trashed']);
    Route::post('/{id}/restore', [LessonPagesController::class, 'restore']);
    Route::delete('/{id}/force', [LessonPagesController::class, 'forceDelete']);

    Route::get('/', [LessonPagesController::class, 'index']);
    Route::post('/', [LessonPagesController::class, 'store']);
    Route::get('/{id}', [LessonPagesController::class, 'show']);
    Route::put('/{id}', [LessonPagesController::class, 'update']);
    Route::delete('/{id}', [LessonPagesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LessonPagesController::class, 'duplicate']);
    Route::get('/{id}/stats', [LessonPagesController::class, 'stats']);
});

// ========================
// LESSON_GRADES RESOURCE
// ========================
Route::prefix('lesson-grades')->group(function () {
    use App\Http\Controllers\Api\V1\LessonGradesController;

    Route::get('/filters', [LessonGradesController::class, 'filters']);
    Route::get('/suggestions', [LessonGradesController::class, 'suggestions']);
    Route::post('/advanced-search', [LessonGradesController::class, 'advancedSearch']);

    Route::get('/import-template', [LessonGradesController::class, 'importTemplate']);
    Route::post('/import', [LessonGradesController::class, 'import']);
    Route::get('/export', [LessonGradesController::class, 'export']);

    Route::post('/bulk-store', [LessonGradesController::class, 'bulkStore']);
    Route::post('/bulk-update', [LessonGradesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LessonGradesController::class, 'bulkDestroy']);

    Route::get('/trashed', [LessonGradesController::class, 'trashed']);
    Route::post('/{id}/restore', [LessonGradesController::class, 'restore']);
    Route::delete('/{id}/force', [LessonGradesController::class, 'forceDelete']);

    Route::get('/', [LessonGradesController::class, 'index']);
    Route::post('/', [LessonGradesController::class, 'store']);
    Route::get('/{id}', [LessonGradesController::class, 'show']);
    Route::put('/{id}', [LessonGradesController::class, 'update']);
    Route::delete('/{id}', [LessonGradesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LessonGradesController::class, 'duplicate']);
    Route::get('/{id}/stats', [LessonGradesController::class, 'stats']);
});

// ========================
// LTI_TYPES_CATEGORIES RESOURCE
// ========================
Route::prefix('lti-types-categories')->group(function () {
    use App\Http\Controllers\Api\V1\LtiTypesCategoriesController;

    Route::get('/filters', [LtiTypesCategoriesController::class, 'filters']);
    Route::get('/suggestions', [LtiTypesCategoriesController::class, 'suggestions']);
    Route::post('/advanced-search', [LtiTypesCategoriesController::class, 'advancedSearch']);

    Route::get('/import-template', [LtiTypesCategoriesController::class, 'importTemplate']);
    Route::post('/import', [LtiTypesCategoriesController::class, 'import']);
    Route::get('/export', [LtiTypesCategoriesController::class, 'export']);

    Route::post('/bulk-store', [LtiTypesCategoriesController::class, 'bulkStore']);
    Route::post('/bulk-update', [LtiTypesCategoriesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LtiTypesCategoriesController::class, 'bulkDestroy']);

    Route::get('/trashed', [LtiTypesCategoriesController::class, 'trashed']);
    Route::post('/{id}/restore', [LtiTypesCategoriesController::class, 'restore']);
    Route::delete('/{id}/force', [LtiTypesCategoriesController::class, 'forceDelete']);

    Route::get('/', [LtiTypesCategoriesController::class, 'index']);
    Route::post('/', [LtiTypesCategoriesController::class, 'store']);
    Route::get('/{id}', [LtiTypesCategoriesController::class, 'show']);
    Route::put('/{id}', [LtiTypesCategoriesController::class, 'update']);
    Route::delete('/{id}', [LtiTypesCategoriesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LtiTypesCategoriesController::class, 'duplicate']);
    Route::get('/{id}/stats', [LtiTypesCategoriesController::class, 'stats']);
});

// ========================
// LTI_ACCESS_TOKENS RESOURCE
// ========================
Route::prefix('lti-access-tokens')->group(function () {
    use App\Http\Controllers\Api\V1\LtiAccessTokensController;

    Route::get('/filters', [LtiAccessTokensController::class, 'filters']);
    Route::get('/suggestions', [LtiAccessTokensController::class, 'suggestions']);
    Route::post('/advanced-search', [LtiAccessTokensController::class, 'advancedSearch']);

    Route::get('/import-template', [LtiAccessTokensController::class, 'importTemplate']);
    Route::post('/import', [LtiAccessTokensController::class, 'import']);
    Route::get('/export', [LtiAccessTokensController::class, 'export']);

    Route::post('/bulk-store', [LtiAccessTokensController::class, 'bulkStore']);
    Route::post('/bulk-update', [LtiAccessTokensController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LtiAccessTokensController::class, 'bulkDestroy']);

    Route::get('/trashed', [LtiAccessTokensController::class, 'trashed']);
    Route::post('/{id}/restore', [LtiAccessTokensController::class, 'restore']);
    Route::delete('/{id}/force', [LtiAccessTokensController::class, 'forceDelete']);

    Route::get('/', [LtiAccessTokensController::class, 'index']);
    Route::post('/', [LtiAccessTokensController::class, 'store']);
    Route::get('/{id}', [LtiAccessTokensController::class, 'show']);
    Route::put('/{id}', [LtiAccessTokensController::class, 'update']);
    Route::delete('/{id}', [LtiAccessTokensController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LtiAccessTokensController::class, 'duplicate']);
    Route::get('/{id}/stats', [LtiAccessTokensController::class, 'stats']);
});

// ========================
// LTI_TOOL_SETTINGS RESOURCE
// ========================
Route::prefix('lti-tool-settings')->group(function () {
    use App\Http\Controllers\Api\V1\LtiToolSettingsController;

    Route::get('/filters', [LtiToolSettingsController::class, 'filters']);
    Route::get('/suggestions', [LtiToolSettingsController::class, 'suggestions']);
    Route::post('/advanced-search', [LtiToolSettingsController::class, 'advancedSearch']);

    Route::get('/import-template', [LtiToolSettingsController::class, 'importTemplate']);
    Route::post('/import', [LtiToolSettingsController::class, 'import']);
    Route::get('/export', [LtiToolSettingsController::class, 'export']);

    Route::post('/bulk-store', [LtiToolSettingsController::class, 'bulkStore']);
    Route::post('/bulk-update', [LtiToolSettingsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LtiToolSettingsController::class, 'bulkDestroy']);

    Route::get('/trashed', [LtiToolSettingsController::class, 'trashed']);
    Route::post('/{id}/restore', [LtiToolSettingsController::class, 'restore']);
    Route::delete('/{id}/force', [LtiToolSettingsController::class, 'forceDelete']);

    Route::get('/', [LtiToolSettingsController::class, 'index']);
    Route::post('/', [LtiToolSettingsController::class, 'store']);
    Route::get('/{id}', [LtiToolSettingsController::class, 'show']);
    Route::put('/{id}', [LtiToolSettingsController::class, 'update']);
    Route::delete('/{id}', [LtiToolSettingsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LtiToolSettingsController::class, 'duplicate']);
    Route::get('/{id}/stats', [LtiToolSettingsController::class, 'stats']);
});

// ========================
// QUIZ_GRADES RESOURCE
// ========================
Route::prefix('quiz-grades')->group(function () {
    use App\Http\Controllers\Api\V1\QuizGradesController;

    Route::get('/filters', [QuizGradesController::class, 'filters']);
    Route::get('/suggestions', [QuizGradesController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizGradesController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizGradesController::class, 'importTemplate']);
    Route::post('/import', [QuizGradesController::class, 'import']);
    Route::get('/export', [QuizGradesController::class, 'export']);

    Route::post('/bulk-store', [QuizGradesController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizGradesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizGradesController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizGradesController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizGradesController::class, 'restore']);
    Route::delete('/{id}/force', [QuizGradesController::class, 'forceDelete']);

    Route::get('/', [QuizGradesController::class, 'index']);
    Route::post('/', [QuizGradesController::class, 'store']);
    Route::get('/{id}', [QuizGradesController::class, 'show']);
    Route::put('/{id}', [QuizGradesController::class, 'update']);
    Route::delete('/{id}', [QuizGradesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizGradesController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizGradesController::class, 'stats']);
});

// ========================
// QUIZ_ATTEMPTS RESOURCE
// ========================
Route::prefix('quiz-attempts')->group(function () {
    use App\Http\Controllers\Api\V1\QuizAttemptsController;

    Route::get('/filters', [QuizAttemptsController::class, 'filters']);
    Route::get('/suggestions', [QuizAttemptsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizAttemptsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizAttemptsController::class, 'importTemplate']);
    Route::post('/import', [QuizAttemptsController::class, 'import']);
    Route::get('/export', [QuizAttemptsController::class, 'export']);

    Route::post('/bulk-store', [QuizAttemptsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizAttemptsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizAttemptsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizAttemptsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizAttemptsController::class, 'restore']);
    Route::delete('/{id}/force', [QuizAttemptsController::class, 'forceDelete']);

    Route::get('/', [QuizAttemptsController::class, 'index']);
    Route::post('/', [QuizAttemptsController::class, 'store']);
    Route::get('/{id}', [QuizAttemptsController::class, 'show']);
    Route::put('/{id}', [QuizAttemptsController::class, 'update']);
    Route::delete('/{id}', [QuizAttemptsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizAttemptsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizAttemptsController::class, 'stats']);
});

// ========================
// QUIZ_SLOTS RESOURCE
// ========================
Route::prefix('quiz-slots')->group(function () {
    use App\Http\Controllers\Api\V1\QuizSlotsController;

    Route::get('/filters', [QuizSlotsController::class, 'filters']);
    Route::get('/suggestions', [QuizSlotsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizSlotsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizSlotsController::class, 'importTemplate']);
    Route::post('/import', [QuizSlotsController::class, 'import']);
    Route::get('/export', [QuizSlotsController::class, 'export']);

    Route::post('/bulk-store', [QuizSlotsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizSlotsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizSlotsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizSlotsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizSlotsController::class, 'restore']);
    Route::delete('/{id}/force', [QuizSlotsController::class, 'forceDelete']);

    Route::get('/', [QuizSlotsController::class, 'index']);
    Route::post('/', [QuizSlotsController::class, 'store']);
    Route::get('/{id}', [QuizSlotsController::class, 'show']);
    Route::put('/{id}', [QuizSlotsController::class, 'update']);
    Route::delete('/{id}', [QuizSlotsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizSlotsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizSlotsController::class, 'stats']);
});

// ========================
// QUIZ_FEEDBACK RESOURCE
// ========================
Route::prefix('quiz-feedback')->group(function () {
    use App\Http\Controllers\Api\V1\QuizFeedbackController;

    Route::get('/filters', [QuizFeedbackController::class, 'filters']);
    Route::get('/suggestions', [QuizFeedbackController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizFeedbackController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizFeedbackController::class, 'importTemplate']);
    Route::post('/import', [QuizFeedbackController::class, 'import']);
    Route::get('/export', [QuizFeedbackController::class, 'export']);

    Route::post('/bulk-store', [QuizFeedbackController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizFeedbackController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizFeedbackController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizFeedbackController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizFeedbackController::class, 'restore']);
    Route::delete('/{id}/force', [QuizFeedbackController::class, 'forceDelete']);

    Route::get('/', [QuizFeedbackController::class, 'index']);
    Route::post('/', [QuizFeedbackController::class, 'store']);
    Route::get('/{id}', [QuizFeedbackController::class, 'show']);
    Route::put('/{id}', [QuizFeedbackController::class, 'update']);
    Route::delete('/{id}', [QuizFeedbackController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizFeedbackController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizFeedbackController::class, 'stats']);
});

// ========================
// QUIZ_SECTIONS RESOURCE
// ========================
Route::prefix('quiz-sections')->group(function () {
    use App\Http\Controllers\Api\V1\QuizSectionsController;

    Route::get('/filters', [QuizSectionsController::class, 'filters']);
    Route::get('/suggestions', [QuizSectionsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizSectionsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizSectionsController::class, 'importTemplate']);
    Route::post('/import', [QuizSectionsController::class, 'import']);
    Route::get('/export', [QuizSectionsController::class, 'export']);

    Route::post('/bulk-store', [QuizSectionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizSectionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizSectionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizSectionsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizSectionsController::class, 'restore']);
    Route::delete('/{id}/force', [QuizSectionsController::class, 'forceDelete']);

    Route::get('/', [QuizSectionsController::class, 'index']);
    Route::post('/', [QuizSectionsController::class, 'store']);
    Route::get('/{id}', [QuizSectionsController::class, 'show']);
    Route::put('/{id}', [QuizSectionsController::class, 'update']);
    Route::delete('/{id}', [QuizSectionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizSectionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizSectionsController::class, 'stats']);
});

// ========================
// SCORM_SCOES RESOURCE
// ========================
Route::prefix('scorm-scoes')->group(function () {
    use App\Http\Controllers\Api\V1\ScormScoesController;

    Route::get('/filters', [ScormScoesController::class, 'filters']);
    Route::get('/suggestions', [ScormScoesController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormScoesController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormScoesController::class, 'importTemplate']);
    Route::post('/import', [ScormScoesController::class, 'import']);
    Route::get('/export', [ScormScoesController::class, 'export']);

    Route::post('/bulk-store', [ScormScoesController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormScoesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormScoesController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormScoesController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormScoesController::class, 'restore']);
    Route::delete('/{id}/force', [ScormScoesController::class, 'forceDelete']);

    Route::get('/', [ScormScoesController::class, 'index']);
    Route::post('/', [ScormScoesController::class, 'store']);
    Route::get('/{id}', [ScormScoesController::class, 'show']);
    Route::put('/{id}', [ScormScoesController::class, 'update']);
    Route::delete('/{id}', [ScormScoesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormScoesController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormScoesController::class, 'stats']);
});

// ========================
// SCORM_ATTEMPT RESOURCE
// ========================
Route::prefix('scorm-attempt')->group(function () {
    use App\Http\Controllers\Api\V1\ScormAttemptController;

    Route::get('/filters', [ScormAttemptController::class, 'filters']);
    Route::get('/suggestions', [ScormAttemptController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormAttemptController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormAttemptController::class, 'importTemplate']);
    Route::post('/import', [ScormAttemptController::class, 'import']);
    Route::get('/export', [ScormAttemptController::class, 'export']);

    Route::post('/bulk-store', [ScormAttemptController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormAttemptController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormAttemptController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormAttemptController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormAttemptController::class, 'restore']);
    Route::delete('/{id}/force', [ScormAttemptController::class, 'forceDelete']);

    Route::get('/', [ScormAttemptController::class, 'index']);
    Route::post('/', [ScormAttemptController::class, 'store']);
    Route::get('/{id}', [ScormAttemptController::class, 'show']);
    Route::put('/{id}', [ScormAttemptController::class, 'update']);
    Route::delete('/{id}', [ScormAttemptController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormAttemptController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormAttemptController::class, 'stats']);
});

// ========================
// SCORM_AICC_SESSION RESOURCE
// ========================
Route::prefix('scorm-aicc-session')->group(function () {
    use App\Http\Controllers\Api\V1\ScormAiccSessionController;

    Route::get('/filters', [ScormAiccSessionController::class, 'filters']);
    Route::get('/suggestions', [ScormAiccSessionController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormAiccSessionController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormAiccSessionController::class, 'importTemplate']);
    Route::post('/import', [ScormAiccSessionController::class, 'import']);
    Route::get('/export', [ScormAiccSessionController::class, 'export']);

    Route::post('/bulk-store', [ScormAiccSessionController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormAiccSessionController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormAiccSessionController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormAiccSessionController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormAiccSessionController::class, 'restore']);
    Route::delete('/{id}/force', [ScormAiccSessionController::class, 'forceDelete']);

    Route::get('/', [ScormAiccSessionController::class, 'index']);
    Route::post('/', [ScormAiccSessionController::class, 'store']);
    Route::get('/{id}', [ScormAiccSessionController::class, 'show']);
    Route::put('/{id}', [ScormAiccSessionController::class, 'update']);
    Route::delete('/{id}', [ScormAiccSessionController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormAiccSessionController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormAiccSessionController::class, 'stats']);
});

// ========================
// SURVEY_ANALYSIS RESOURCE
// ========================
Route::prefix('survey-analysis')->group(function () {
    use App\Http\Controllers\Api\V1\SurveyAnalysisController;

    Route::get('/filters', [SurveyAnalysisController::class, 'filters']);
    Route::get('/suggestions', [SurveyAnalysisController::class, 'suggestions']);
    Route::post('/advanced-search', [SurveyAnalysisController::class, 'advancedSearch']);

    Route::get('/import-template', [SurveyAnalysisController::class, 'importTemplate']);
    Route::post('/import', [SurveyAnalysisController::class, 'import']);
    Route::get('/export', [SurveyAnalysisController::class, 'export']);

    Route::post('/bulk-store', [SurveyAnalysisController::class, 'bulkStore']);
    Route::post('/bulk-update', [SurveyAnalysisController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [SurveyAnalysisController::class, 'bulkDestroy']);

    Route::get('/trashed', [SurveyAnalysisController::class, 'trashed']);
    Route::post('/{id}/restore', [SurveyAnalysisController::class, 'restore']);
    Route::delete('/{id}/force', [SurveyAnalysisController::class, 'forceDelete']);

    Route::get('/', [SurveyAnalysisController::class, 'index']);
    Route::post('/', [SurveyAnalysisController::class, 'store']);
    Route::get('/{id}', [SurveyAnalysisController::class, 'show']);
    Route::put('/{id}', [SurveyAnalysisController::class, 'update']);
    Route::delete('/{id}', [SurveyAnalysisController::class, 'destroy']);

    Route::post('/{id}/duplicate', [SurveyAnalysisController::class, 'duplicate']);
    Route::get('/{id}/stats', [SurveyAnalysisController::class, 'stats']);
});

// ========================
// SURVEY_ANSWERS RESOURCE
// ========================
Route::prefix('survey-answers')->group(function () {
    use App\Http\Controllers\Api\V1\SurveyAnswersController;

    Route::get('/filters', [SurveyAnswersController::class, 'filters']);
    Route::get('/suggestions', [SurveyAnswersController::class, 'suggestions']);
    Route::post('/advanced-search', [SurveyAnswersController::class, 'advancedSearch']);

    Route::get('/import-template', [SurveyAnswersController::class, 'importTemplate']);
    Route::post('/import', [SurveyAnswersController::class, 'import']);
    Route::get('/export', [SurveyAnswersController::class, 'export']);

    Route::post('/bulk-store', [SurveyAnswersController::class, 'bulkStore']);
    Route::post('/bulk-update', [SurveyAnswersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [SurveyAnswersController::class, 'bulkDestroy']);

    Route::get('/trashed', [SurveyAnswersController::class, 'trashed']);
    Route::post('/{id}/restore', [SurveyAnswersController::class, 'restore']);
    Route::delete('/{id}/force', [SurveyAnswersController::class, 'forceDelete']);

    Route::get('/', [SurveyAnswersController::class, 'index']);
    Route::post('/', [SurveyAnswersController::class, 'store']);
    Route::get('/{id}', [SurveyAnswersController::class, 'show']);
    Route::put('/{id}', [SurveyAnswersController::class, 'update']);
    Route::delete('/{id}', [SurveyAnswersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [SurveyAnswersController::class, 'duplicate']);
    Route::get('/{id}/stats', [SurveyAnswersController::class, 'stats']);
});

// ========================
// WIKI_SUBWIKIS RESOURCE
// ========================
Route::prefix('wiki-subwikis')->group(function () {
    use App\Http\Controllers\Api\V1\WikiSubwikisController;

    Route::get('/filters', [WikiSubwikisController::class, 'filters']);
    Route::get('/suggestions', [WikiSubwikisController::class, 'suggestions']);
    Route::post('/advanced-search', [WikiSubwikisController::class, 'advancedSearch']);

    Route::get('/import-template', [WikiSubwikisController::class, 'importTemplate']);
    Route::post('/import', [WikiSubwikisController::class, 'import']);
    Route::get('/export', [WikiSubwikisController::class, 'export']);

    Route::post('/bulk-store', [WikiSubwikisController::class, 'bulkStore']);
    Route::post('/bulk-update', [WikiSubwikisController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WikiSubwikisController::class, 'bulkDestroy']);

    Route::get('/trashed', [WikiSubwikisController::class, 'trashed']);
    Route::post('/{id}/restore', [WikiSubwikisController::class, 'restore']);
    Route::delete('/{id}/force', [WikiSubwikisController::class, 'forceDelete']);

    Route::get('/', [WikiSubwikisController::class, 'index']);
    Route::post('/', [WikiSubwikisController::class, 'store']);
    Route::get('/{id}', [WikiSubwikisController::class, 'show']);
    Route::put('/{id}', [WikiSubwikisController::class, 'update']);
    Route::delete('/{id}', [WikiSubwikisController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WikiSubwikisController::class, 'duplicate']);
    Route::get('/{id}/stats', [WikiSubwikisController::class, 'stats']);
});

// ========================
// TOOL_MONITOR_HISTORY RESOURCE
// ========================
Route::prefix('tool-monitor-history')->group(function () {
    use App\Http\Controllers\Api\V1\ToolMonitorHistoryController;

    Route::get('/filters', [ToolMonitorHistoryController::class, 'filters']);
    Route::get('/suggestions', [ToolMonitorHistoryController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolMonitorHistoryController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolMonitorHistoryController::class, 'importTemplate']);
    Route::post('/import', [ToolMonitorHistoryController::class, 'import']);
    Route::get('/export', [ToolMonitorHistoryController::class, 'export']);

    Route::post('/bulk-store', [ToolMonitorHistoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolMonitorHistoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolMonitorHistoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolMonitorHistoryController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolMonitorHistoryController::class, 'restore']);
    Route::delete('/{id}/force', [ToolMonitorHistoryController::class, 'forceDelete']);

    Route::get('/', [ToolMonitorHistoryController::class, 'index']);
    Route::post('/', [ToolMonitorHistoryController::class, 'store']);
    Route::get('/{id}', [ToolMonitorHistoryController::class, 'show']);
    Route::put('/{id}', [ToolMonitorHistoryController::class, 'update']);
    Route::delete('/{id}', [ToolMonitorHistoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolMonitorHistoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolMonitorHistoryController::class, 'stats']);
});

// ========================
// ENROL_LTI_LTI2_RESOURCE_LINK RESOURCE
// ========================
Route::prefix('enrol-lti-lti2-resource-link')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiLti2ResourceLinkController;

    Route::get('/filters', [EnrolLtiLti2ResourceLinkController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiLti2ResourceLinkController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiLti2ResourceLinkController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiLti2ResourceLinkController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiLti2ResourceLinkController::class, 'import']);
    Route::get('/export', [EnrolLtiLti2ResourceLinkController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiLti2ResourceLinkController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiLti2ResourceLinkController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiLti2ResourceLinkController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiLti2ResourceLinkController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiLti2ResourceLinkController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiLti2ResourceLinkController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiLti2ResourceLinkController::class, 'index']);
    Route::post('/', [EnrolLtiLti2ResourceLinkController::class, 'store']);
    Route::get('/{id}', [EnrolLtiLti2ResourceLinkController::class, 'show']);
    Route::put('/{id}', [EnrolLtiLti2ResourceLinkController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiLti2ResourceLinkController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiLti2ResourceLinkController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiLti2ResourceLinkController::class, 'stats']);
});

// ========================
// ENROL_LTI_CONTEXT RESOURCE
// ========================
Route::prefix('enrol-lti-context')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiContextController;

    Route::get('/filters', [EnrolLtiContextController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiContextController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiContextController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiContextController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiContextController::class, 'import']);
    Route::get('/export', [EnrolLtiContextController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiContextController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiContextController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiContextController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiContextController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiContextController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiContextController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiContextController::class, 'index']);
    Route::post('/', [EnrolLtiContextController::class, 'store']);
    Route::get('/{id}', [EnrolLtiContextController::class, 'show']);
    Route::put('/{id}', [EnrolLtiContextController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiContextController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiContextController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiContextController::class, 'stats']);
});

// ========================
// GRADE_CATEGORIES_HISTORY RESOURCE
// ========================
Route::prefix('grade-categories-history')->group(function () {
    use App\Http\Controllers\Api\V1\GradeCategoriesHistoryController;

    Route::get('/filters', [GradeCategoriesHistoryController::class, 'filters']);
    Route::get('/suggestions', [GradeCategoriesHistoryController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeCategoriesHistoryController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeCategoriesHistoryController::class, 'importTemplate']);
    Route::post('/import', [GradeCategoriesHistoryController::class, 'import']);
    Route::get('/export', [GradeCategoriesHistoryController::class, 'export']);

    Route::post('/bulk-store', [GradeCategoriesHistoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeCategoriesHistoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeCategoriesHistoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeCategoriesHistoryController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeCategoriesHistoryController::class, 'restore']);
    Route::delete('/{id}/force', [GradeCategoriesHistoryController::class, 'forceDelete']);

    Route::get('/', [GradeCategoriesHistoryController::class, 'index']);
    Route::post('/', [GradeCategoriesHistoryController::class, 'store']);
    Route::get('/{id}', [GradeCategoriesHistoryController::class, 'show']);
    Route::put('/{id}', [GradeCategoriesHistoryController::class, 'update']);
    Route::delete('/{id}', [GradeCategoriesHistoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeCategoriesHistoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeCategoriesHistoryController::class, 'stats']);
});

// ========================
// WORKSHOP_SUBMISSIONS RESOURCE
// ========================
Route::prefix('workshop-submissions')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopSubmissionsController;

    Route::get('/filters', [WorkshopSubmissionsController::class, 'filters']);
    Route::get('/suggestions', [WorkshopSubmissionsController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopSubmissionsController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopSubmissionsController::class, 'importTemplate']);
    Route::post('/import', [WorkshopSubmissionsController::class, 'import']);
    Route::get('/export', [WorkshopSubmissionsController::class, 'export']);

    Route::post('/bulk-store', [WorkshopSubmissionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopSubmissionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopSubmissionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopSubmissionsController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopSubmissionsController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopSubmissionsController::class, 'forceDelete']);

    Route::get('/', [WorkshopSubmissionsController::class, 'index']);
    Route::post('/', [WorkshopSubmissionsController::class, 'store']);
    Route::get('/{id}', [WorkshopSubmissionsController::class, 'show']);
    Route::put('/{id}', [WorkshopSubmissionsController::class, 'update']);
    Route::delete('/{id}', [WorkshopSubmissionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopSubmissionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopSubmissionsController::class, 'stats']);
});

// ========================
// WORKSHOPFORM_RUBRIC RESOURCE
// ========================
Route::prefix('workshopform-rubric')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopformRubricController;

    Route::get('/filters', [WorkshopformRubricController::class, 'filters']);
    Route::get('/suggestions', [WorkshopformRubricController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopformRubricController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopformRubricController::class, 'importTemplate']);
    Route::post('/import', [WorkshopformRubricController::class, 'import']);
    Route::get('/export', [WorkshopformRubricController::class, 'export']);

    Route::post('/bulk-store', [WorkshopformRubricController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopformRubricController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopformRubricController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopformRubricController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopformRubricController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopformRubricController::class, 'forceDelete']);

    Route::get('/', [WorkshopformRubricController::class, 'index']);
    Route::post('/', [WorkshopformRubricController::class, 'store']);
    Route::get('/{id}', [WorkshopformRubricController::class, 'show']);
    Route::put('/{id}', [WorkshopformRubricController::class, 'update']);
    Route::delete('/{id}', [WorkshopformRubricController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopformRubricController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopformRubricController::class, 'stats']);
});

// ========================
// WORKSHOPFORM_COMMENTS RESOURCE
// ========================
Route::prefix('workshopform-comments')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopformCommentsController;

    Route::get('/filters', [WorkshopformCommentsController::class, 'filters']);
    Route::get('/suggestions', [WorkshopformCommentsController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopformCommentsController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopformCommentsController::class, 'importTemplate']);
    Route::post('/import', [WorkshopformCommentsController::class, 'import']);
    Route::get('/export', [WorkshopformCommentsController::class, 'export']);

    Route::post('/bulk-store', [WorkshopformCommentsController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopformCommentsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopformCommentsController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopformCommentsController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopformCommentsController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopformCommentsController::class, 'forceDelete']);

    Route::get('/', [WorkshopformCommentsController::class, 'index']);
    Route::post('/', [WorkshopformCommentsController::class, 'store']);
    Route::get('/{id}', [WorkshopformCommentsController::class, 'show']);
    Route::put('/{id}', [WorkshopformCommentsController::class, 'update']);
    Route::delete('/{id}', [WorkshopformCommentsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopformCommentsController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopformCommentsController::class, 'stats']);
});

// ========================
// WORKSHOPFORM_NUMERRORS RESOURCE
// ========================
Route::prefix('workshopform-numerrors')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopformNumerrorsController;

    Route::get('/filters', [WorkshopformNumerrorsController::class, 'filters']);
    Route::get('/suggestions', [WorkshopformNumerrorsController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopformNumerrorsController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopformNumerrorsController::class, 'importTemplate']);
    Route::post('/import', [WorkshopformNumerrorsController::class, 'import']);
    Route::get('/export', [WorkshopformNumerrorsController::class, 'export']);

    Route::post('/bulk-store', [WorkshopformNumerrorsController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopformNumerrorsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopformNumerrorsController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopformNumerrorsController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopformNumerrorsController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopformNumerrorsController::class, 'forceDelete']);

    Route::get('/', [WorkshopformNumerrorsController::class, 'index']);
    Route::post('/', [WorkshopformNumerrorsController::class, 'store']);
    Route::get('/{id}', [WorkshopformNumerrorsController::class, 'show']);
    Route::put('/{id}', [WorkshopformNumerrorsController::class, 'update']);
    Route::delete('/{id}', [WorkshopformNumerrorsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopformNumerrorsController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopformNumerrorsController::class, 'stats']);
});

// ========================
// WORKSHOPFORM_ACCUMULATIVE RESOURCE
// ========================
Route::prefix('workshopform-accumulative')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopformAccumulativeController;

    Route::get('/filters', [WorkshopformAccumulativeController::class, 'filters']);
    Route::get('/suggestions', [WorkshopformAccumulativeController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopformAccumulativeController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopformAccumulativeController::class, 'importTemplate']);
    Route::post('/import', [WorkshopformAccumulativeController::class, 'import']);
    Route::get('/export', [WorkshopformAccumulativeController::class, 'export']);

    Route::post('/bulk-store', [WorkshopformAccumulativeController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopformAccumulativeController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopformAccumulativeController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopformAccumulativeController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopformAccumulativeController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopformAccumulativeController::class, 'forceDelete']);

    Route::get('/', [WorkshopformAccumulativeController::class, 'index']);
    Route::post('/', [WorkshopformAccumulativeController::class, 'store']);
    Route::get('/{id}', [WorkshopformAccumulativeController::class, 'show']);
    Route::put('/{id}', [WorkshopformAccumulativeController::class, 'update']);
    Route::delete('/{id}', [WorkshopformAccumulativeController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopformAccumulativeController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopformAccumulativeController::class, 'stats']);
});

// ========================
// WORKSHOP_AGGREGATIONS RESOURCE
// ========================
Route::prefix('workshop-aggregations')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopAggregationsController;

    Route::get('/filters', [WorkshopAggregationsController::class, 'filters']);
    Route::get('/suggestions', [WorkshopAggregationsController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopAggregationsController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopAggregationsController::class, 'importTemplate']);
    Route::post('/import', [WorkshopAggregationsController::class, 'import']);
    Route::get('/export', [WorkshopAggregationsController::class, 'export']);

    Route::post('/bulk-store', [WorkshopAggregationsController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopAggregationsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopAggregationsController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopAggregationsController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopAggregationsController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopAggregationsController::class, 'forceDelete']);

    Route::get('/', [WorkshopAggregationsController::class, 'index']);
    Route::post('/', [WorkshopAggregationsController::class, 'store']);
    Route::get('/{id}', [WorkshopAggregationsController::class, 'show']);
    Route::put('/{id}', [WorkshopAggregationsController::class, 'update']);
    Route::delete('/{id}', [WorkshopAggregationsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopAggregationsController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopAggregationsController::class, 'stats']);
});

// ========================
// WORKSHOPFORM_NUMERRORS_MAP RESOURCE
// ========================
Route::prefix('workshopform-numerrors-map')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopformNumerrorsMapController;

    Route::get('/filters', [WorkshopformNumerrorsMapController::class, 'filters']);
    Route::get('/suggestions', [WorkshopformNumerrorsMapController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopformNumerrorsMapController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopformNumerrorsMapController::class, 'importTemplate']);
    Route::post('/import', [WorkshopformNumerrorsMapController::class, 'import']);
    Route::get('/export', [WorkshopformNumerrorsMapController::class, 'export']);

    Route::post('/bulk-store', [WorkshopformNumerrorsMapController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopformNumerrorsMapController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopformNumerrorsMapController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopformNumerrorsMapController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopformNumerrorsMapController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopformNumerrorsMapController::class, 'forceDelete']);

    Route::get('/', [WorkshopformNumerrorsMapController::class, 'index']);
    Route::post('/', [WorkshopformNumerrorsMapController::class, 'store']);
    Route::get('/{id}', [WorkshopformNumerrorsMapController::class, 'show']);
    Route::put('/{id}', [WorkshopformNumerrorsMapController::class, 'update']);
    Route::delete('/{id}', [WorkshopformNumerrorsMapController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopformNumerrorsMapController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopformNumerrorsMapController::class, 'stats']);
});

// ========================
// COURSE_MODULES RESOURCE
// ========================
Route::prefix('course-modules')->group(function () {
    use App\Http\Controllers\Api\V1\CourseModulesController;

    Route::get('/filters', [CourseModulesController::class, 'filters']);
    Route::get('/suggestions', [CourseModulesController::class, 'suggestions']);
    Route::post('/advanced-search', [CourseModulesController::class, 'advancedSearch']);

    Route::get('/import-template', [CourseModulesController::class, 'importTemplate']);
    Route::post('/import', [CourseModulesController::class, 'import']);
    Route::get('/export', [CourseModulesController::class, 'export']);

    Route::post('/bulk-store', [CourseModulesController::class, 'bulkStore']);
    Route::post('/bulk-update', [CourseModulesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CourseModulesController::class, 'bulkDestroy']);

    Route::get('/trashed', [CourseModulesController::class, 'trashed']);
    Route::post('/{id}/restore', [CourseModulesController::class, 'restore']);
    Route::delete('/{id}/force', [CourseModulesController::class, 'forceDelete']);

    Route::get('/', [CourseModulesController::class, 'index']);
    Route::post('/', [CourseModulesController::class, 'store']);
    Route::get('/{id}', [CourseModulesController::class, 'show']);
    Route::put('/{id}', [CourseModulesController::class, 'update']);
    Route::delete('/{id}', [CourseModulesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CourseModulesController::class, 'duplicate']);
    Route::get('/{id}/stats', [CourseModulesController::class, 'stats']);
});

// ========================
// LESSON_OVERRIDES RESOURCE
// ========================
Route::prefix('lesson-overrides')->group(function () {
    use App\Http\Controllers\Api\V1\LessonOverridesController;

    Route::get('/filters', [LessonOverridesController::class, 'filters']);
    Route::get('/suggestions', [LessonOverridesController::class, 'suggestions']);
    Route::post('/advanced-search', [LessonOverridesController::class, 'advancedSearch']);

    Route::get('/import-template', [LessonOverridesController::class, 'importTemplate']);
    Route::post('/import', [LessonOverridesController::class, 'import']);
    Route::get('/export', [LessonOverridesController::class, 'export']);

    Route::post('/bulk-store', [LessonOverridesController::class, 'bulkStore']);
    Route::post('/bulk-update', [LessonOverridesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LessonOverridesController::class, 'bulkDestroy']);

    Route::get('/trashed', [LessonOverridesController::class, 'trashed']);
    Route::post('/{id}/restore', [LessonOverridesController::class, 'restore']);
    Route::delete('/{id}/force', [LessonOverridesController::class, 'forceDelete']);

    Route::get('/', [LessonOverridesController::class, 'index']);
    Route::post('/', [LessonOverridesController::class, 'store']);
    Route::get('/{id}', [LessonOverridesController::class, 'show']);
    Route::put('/{id}', [LessonOverridesController::class, 'update']);
    Route::delete('/{id}', [LessonOverridesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LessonOverridesController::class, 'duplicate']);
    Route::get('/{id}/stats', [LessonOverridesController::class, 'stats']);
});

// ========================
// GROUPINGS_GROUPS RESOURCE
// ========================
Route::prefix('groupings-groups')->group(function () {
    use App\Http\Controllers\Api\V1\GroupingsGroupsController;

    Route::get('/filters', [GroupingsGroupsController::class, 'filters']);
    Route::get('/suggestions', [GroupingsGroupsController::class, 'suggestions']);
    Route::post('/advanced-search', [GroupingsGroupsController::class, 'advancedSearch']);

    Route::get('/import-template', [GroupingsGroupsController::class, 'importTemplate']);
    Route::post('/import', [GroupingsGroupsController::class, 'import']);
    Route::get('/export', [GroupingsGroupsController::class, 'export']);

    Route::post('/bulk-store', [GroupingsGroupsController::class, 'bulkStore']);
    Route::post('/bulk-update', [GroupingsGroupsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GroupingsGroupsController::class, 'bulkDestroy']);

    Route::get('/trashed', [GroupingsGroupsController::class, 'trashed']);
    Route::post('/{id}/restore', [GroupingsGroupsController::class, 'restore']);
    Route::delete('/{id}/force', [GroupingsGroupsController::class, 'forceDelete']);

    Route::get('/', [GroupingsGroupsController::class, 'index']);
    Route::post('/', [GroupingsGroupsController::class, 'store']);
    Route::get('/{id}', [GroupingsGroupsController::class, 'show']);
    Route::put('/{id}', [GroupingsGroupsController::class, 'update']);
    Route::delete('/{id}', [GroupingsGroupsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GroupingsGroupsController::class, 'duplicate']);
    Route::get('/{id}/stats', [GroupingsGroupsController::class, 'stats']);
});

// ========================
// QUIZ_OVERRIDES RESOURCE
// ========================
Route::prefix('quiz-overrides')->group(function () {
    use App\Http\Controllers\Api\V1\QuizOverridesController;

    Route::get('/filters', [QuizOverridesController::class, 'filters']);
    Route::get('/suggestions', [QuizOverridesController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizOverridesController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizOverridesController::class, 'importTemplate']);
    Route::post('/import', [QuizOverridesController::class, 'import']);
    Route::get('/export', [QuizOverridesController::class, 'export']);

    Route::post('/bulk-store', [QuizOverridesController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizOverridesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizOverridesController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizOverridesController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizOverridesController::class, 'restore']);
    Route::delete('/{id}/force', [QuizOverridesController::class, 'forceDelete']);

    Route::get('/', [QuizOverridesController::class, 'index']);
    Route::post('/', [QuizOverridesController::class, 'store']);
    Route::get('/{id}', [QuizOverridesController::class, 'show']);
    Route::put('/{id}', [QuizOverridesController::class, 'update']);
    Route::delete('/{id}', [QuizOverridesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizOverridesController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizOverridesController::class, 'stats']);
});

// ========================
// GROUPS_MEMBERS RESOURCE
// ========================
Route::prefix('groups-members')->group(function () {
    use App\Http\Controllers\Api\V1\GroupsMembersController;

    Route::get('/filters', [GroupsMembersController::class, 'filters']);
    Route::get('/suggestions', [GroupsMembersController::class, 'suggestions']);
    Route::post('/advanced-search', [GroupsMembersController::class, 'advancedSearch']);

    Route::get('/import-template', [GroupsMembersController::class, 'importTemplate']);
    Route::post('/import', [GroupsMembersController::class, 'import']);
    Route::get('/export', [GroupsMembersController::class, 'export']);

    Route::post('/bulk-store', [GroupsMembersController::class, 'bulkStore']);
    Route::post('/bulk-update', [GroupsMembersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GroupsMembersController::class, 'bulkDestroy']);

    Route::get('/trashed', [GroupsMembersController::class, 'trashed']);
    Route::post('/{id}/restore', [GroupsMembersController::class, 'restore']);
    Route::delete('/{id}/force', [GroupsMembersController::class, 'forceDelete']);

    Route::get('/', [GroupsMembersController::class, 'index']);
    Route::post('/', [GroupsMembersController::class, 'store']);
    Route::get('/{id}', [GroupsMembersController::class, 'show']);
    Route::put('/{id}', [GroupsMembersController::class, 'update']);
    Route::delete('/{id}', [GroupsMembersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GroupsMembersController::class, 'duplicate']);
    Route::get('/{id}/stats', [GroupsMembersController::class, 'stats']);
});

// ========================
// ASSIGN_OVERRIDES RESOURCE
// ========================
Route::prefix('assign-overrides')->group(function () {
    use App\Http\Controllers\Api\V1\AssignOverridesController;

    Route::get('/filters', [AssignOverridesController::class, 'filters']);
    Route::get('/suggestions', [AssignOverridesController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignOverridesController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignOverridesController::class, 'importTemplate']);
    Route::post('/import', [AssignOverridesController::class, 'import']);
    Route::get('/export', [AssignOverridesController::class, 'export']);

    Route::post('/bulk-store', [AssignOverridesController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignOverridesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignOverridesController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignOverridesController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignOverridesController::class, 'restore']);
    Route::delete('/{id}/force', [AssignOverridesController::class, 'forceDelete']);

    Route::get('/', [AssignOverridesController::class, 'index']);
    Route::post('/', [AssignOverridesController::class, 'store']);
    Route::get('/{id}', [AssignOverridesController::class, 'show']);
    Route::put('/{id}', [AssignOverridesController::class, 'update']);
    Route::delete('/{id}', [AssignOverridesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignOverridesController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignOverridesController::class, 'stats']);
});

// ========================
// H5PACTIVITY_ATTEMPTS RESOURCE
// ========================
Route::prefix('h5pactivity-attempts')->group(function () {
    use App\Http\Controllers\Api\V1\H5pactivityAttemptsController;

    Route::get('/filters', [H5pactivityAttemptsController::class, 'filters']);
    Route::get('/suggestions', [H5pactivityAttemptsController::class, 'suggestions']);
    Route::post('/advanced-search', [H5pactivityAttemptsController::class, 'advancedSearch']);

    Route::get('/import-template', [H5pactivityAttemptsController::class, 'importTemplate']);
    Route::post('/import', [H5pactivityAttemptsController::class, 'import']);
    Route::get('/export', [H5pactivityAttemptsController::class, 'export']);

    Route::post('/bulk-store', [H5pactivityAttemptsController::class, 'bulkStore']);
    Route::post('/bulk-update', [H5pactivityAttemptsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [H5pactivityAttemptsController::class, 'bulkDestroy']);

    Route::get('/trashed', [H5pactivityAttemptsController::class, 'trashed']);
    Route::post('/{id}/restore', [H5pactivityAttemptsController::class, 'restore']);
    Route::delete('/{id}/force', [H5pactivityAttemptsController::class, 'forceDelete']);

    Route::get('/', [H5pactivityAttemptsController::class, 'index']);
    Route::post('/', [H5pactivityAttemptsController::class, 'store']);
    Route::get('/{id}', [H5pactivityAttemptsController::class, 'show']);
    Route::put('/{id}', [H5pactivityAttemptsController::class, 'update']);
    Route::delete('/{id}', [H5pactivityAttemptsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [H5pactivityAttemptsController::class, 'duplicate']);
    Route::get('/{id}/stats', [H5pactivityAttemptsController::class, 'stats']);
});

// ========================
// EVENT RESOURCE
// ========================
Route::prefix('event')->group(function () {
    use App\Http\Controllers\Api\V1\EventController;

    Route::get('/filters', [EventController::class, 'filters']);
    Route::get('/suggestions', [EventController::class, 'suggestions']);
    Route::post('/advanced-search', [EventController::class, 'advancedSearch']);

    Route::get('/import-template', [EventController::class, 'importTemplate']);
    Route::post('/import', [EventController::class, 'import']);
    Route::get('/export', [EventController::class, 'export']);

    Route::post('/bulk-store', [EventController::class, 'bulkStore']);
    Route::post('/bulk-update', [EventController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EventController::class, 'bulkDestroy']);

    Route::get('/trashed', [EventController::class, 'trashed']);
    Route::post('/{id}/restore', [EventController::class, 'restore']);
    Route::delete('/{id}/force', [EventController::class, 'forceDelete']);

    Route::get('/', [EventController::class, 'index']);
    Route::post('/', [EventController::class, 'store']);
    Route::get('/{id}', [EventController::class, 'show']);
    Route::put('/{id}', [EventController::class, 'update']);
    Route::delete('/{id}', [EventController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EventController::class, 'duplicate']);
    Route::get('/{id}/stats', [EventController::class, 'stats']);
});

// ========================
// EVENTS_QUEUE_HANDLERS RESOURCE
// ========================
Route::prefix('events-queue-handlers')->group(function () {
    use App\Http\Controllers\Api\V1\EventsQueueHandlersController;

    Route::get('/filters', [EventsQueueHandlersController::class, 'filters']);
    Route::get('/suggestions', [EventsQueueHandlersController::class, 'suggestions']);
    Route::post('/advanced-search', [EventsQueueHandlersController::class, 'advancedSearch']);

    Route::get('/import-template', [EventsQueueHandlersController::class, 'importTemplate']);
    Route::post('/import', [EventsQueueHandlersController::class, 'import']);
    Route::get('/export', [EventsQueueHandlersController::class, 'export']);

    Route::post('/bulk-store', [EventsQueueHandlersController::class, 'bulkStore']);
    Route::post('/bulk-update', [EventsQueueHandlersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EventsQueueHandlersController::class, 'bulkDestroy']);

    Route::get('/trashed', [EventsQueueHandlersController::class, 'trashed']);
    Route::post('/{id}/restore', [EventsQueueHandlersController::class, 'restore']);
    Route::delete('/{id}/force', [EventsQueueHandlersController::class, 'forceDelete']);

    Route::get('/', [EventsQueueHandlersController::class, 'index']);
    Route::post('/', [EventsQueueHandlersController::class, 'store']);
    Route::get('/{id}', [EventsQueueHandlersController::class, 'show']);
    Route::put('/{id}', [EventsQueueHandlersController::class, 'update']);
    Route::delete('/{id}', [EventsQueueHandlersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EventsQueueHandlersController::class, 'duplicate']);
    Route::get('/{id}/stats', [EventsQueueHandlersController::class, 'stats']);
});

// ========================
// GRADE_OUTCOMES RESOURCE
// ========================
Route::prefix('grade-outcomes')->group(function () {
    use App\Http\Controllers\Api\V1\GradeOutcomesController;

    Route::get('/filters', [GradeOutcomesController::class, 'filters']);
    Route::get('/suggestions', [GradeOutcomesController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeOutcomesController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeOutcomesController::class, 'importTemplate']);
    Route::post('/import', [GradeOutcomesController::class, 'import']);
    Route::get('/export', [GradeOutcomesController::class, 'export']);

    Route::post('/bulk-store', [GradeOutcomesController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeOutcomesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeOutcomesController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeOutcomesController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeOutcomesController::class, 'restore']);
    Route::delete('/{id}/force', [GradeOutcomesController::class, 'forceDelete']);

    Route::get('/', [GradeOutcomesController::class, 'index']);
    Route::post('/', [GradeOutcomesController::class, 'store']);
    Route::get('/{id}', [GradeOutcomesController::class, 'show']);
    Route::put('/{id}', [GradeOutcomesController::class, 'update']);
    Route::delete('/{id}', [GradeOutcomesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeOutcomesController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeOutcomesController::class, 'stats']);
});

// ========================
// COMPETENCY_FRAMEWORK RESOURCE
// ========================
Route::prefix('competency-framework')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyFrameworkController;

    Route::get('/filters', [CompetencyFrameworkController::class, 'filters']);
    Route::get('/suggestions', [CompetencyFrameworkController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyFrameworkController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyFrameworkController::class, 'importTemplate']);
    Route::post('/import', [CompetencyFrameworkController::class, 'import']);
    Route::get('/export', [CompetencyFrameworkController::class, 'export']);

    Route::post('/bulk-store', [CompetencyFrameworkController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyFrameworkController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyFrameworkController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyFrameworkController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyFrameworkController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyFrameworkController::class, 'forceDelete']);

    Route::get('/', [CompetencyFrameworkController::class, 'index']);
    Route::post('/', [CompetencyFrameworkController::class, 'store']);
    Route::get('/{id}', [CompetencyFrameworkController::class, 'show']);
    Route::put('/{id}', [CompetencyFrameworkController::class, 'update']);
    Route::delete('/{id}', [CompetencyFrameworkController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyFrameworkController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyFrameworkController::class, 'stats']);
});

// ========================
// RATING RESOURCE
// ========================
Route::prefix('rating')->group(function () {
    use App\Http\Controllers\Api\V1\RatingController;

    Route::get('/filters', [RatingController::class, 'filters']);
    Route::get('/suggestions', [RatingController::class, 'suggestions']);
    Route::post('/advanced-search', [RatingController::class, 'advancedSearch']);

    Route::get('/import-template', [RatingController::class, 'importTemplate']);
    Route::post('/import', [RatingController::class, 'import']);
    Route::get('/export', [RatingController::class, 'export']);

    Route::post('/bulk-store', [RatingController::class, 'bulkStore']);
    Route::post('/bulk-update', [RatingController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [RatingController::class, 'bulkDestroy']);

    Route::get('/trashed', [RatingController::class, 'trashed']);
    Route::post('/{id}/restore', [RatingController::class, 'restore']);
    Route::delete('/{id}/force', [RatingController::class, 'forceDelete']);

    Route::get('/', [RatingController::class, 'index']);
    Route::post('/', [RatingController::class, 'store']);
    Route::get('/{id}', [RatingController::class, 'show']);
    Route::put('/{id}', [RatingController::class, 'update']);
    Route::delete('/{id}', [RatingController::class, 'destroy']);

    Route::post('/{id}/duplicate', [RatingController::class, 'duplicate']);
    Route::get('/{id}/stats', [RatingController::class, 'stats']);
});

// ========================
// COMPETENCY RESOURCE
// ========================
Route::prefix('competency')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyController;

    Route::get('/filters', [CompetencyController::class, 'filters']);
    Route::get('/suggestions', [CompetencyController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyController::class, 'importTemplate']);
    Route::post('/import', [CompetencyController::class, 'import']);
    Route::get('/export', [CompetencyController::class, 'export']);

    Route::post('/bulk-store', [CompetencyController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyController::class, 'forceDelete']);

    Route::get('/', [CompetencyController::class, 'index']);
    Route::post('/', [CompetencyController::class, 'store']);
    Route::get('/{id}', [CompetencyController::class, 'show']);
    Route::put('/{id}', [CompetencyController::class, 'update']);
    Route::delete('/{id}', [CompetencyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyController::class, 'stats']);
});

// ========================
// SCALE_HISTORY RESOURCE
// ========================
Route::prefix('scale-history')->group(function () {
    use App\Http\Controllers\Api\V1\ScaleHistoryController;

    Route::get('/filters', [ScaleHistoryController::class, 'filters']);
    Route::get('/suggestions', [ScaleHistoryController::class, 'suggestions']);
    Route::post('/advanced-search', [ScaleHistoryController::class, 'advancedSearch']);

    Route::get('/import-template', [ScaleHistoryController::class, 'importTemplate']);
    Route::post('/import', [ScaleHistoryController::class, 'import']);
    Route::get('/export', [ScaleHistoryController::class, 'export']);

    Route::post('/bulk-store', [ScaleHistoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScaleHistoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScaleHistoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScaleHistoryController::class, 'trashed']);
    Route::post('/{id}/restore', [ScaleHistoryController::class, 'restore']);
    Route::delete('/{id}/force', [ScaleHistoryController::class, 'forceDelete']);

    Route::get('/', [ScaleHistoryController::class, 'index']);
    Route::post('/', [ScaleHistoryController::class, 'store']);
    Route::get('/{id}', [ScaleHistoryController::class, 'show']);
    Route::put('/{id}', [ScaleHistoryController::class, 'update']);
    Route::delete('/{id}', [ScaleHistoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScaleHistoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScaleHistoryController::class, 'stats']);
});

// ========================
// QUIZACCESS_SEB_QUIZSETTINGS RESOURCE
// ========================
Route::prefix('quizaccess-seb-quizsettings')->group(function () {
    use App\Http\Controllers\Api\V1\QuizaccessSebQuizsettingsController;

    Route::get('/filters', [QuizaccessSebQuizsettingsController::class, 'filters']);
    Route::get('/suggestions', [QuizaccessSebQuizsettingsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizaccessSebQuizsettingsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizaccessSebQuizsettingsController::class, 'importTemplate']);
    Route::post('/import', [QuizaccessSebQuizsettingsController::class, 'import']);
    Route::get('/export', [QuizaccessSebQuizsettingsController::class, 'export']);

    Route::post('/bulk-store', [QuizaccessSebQuizsettingsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizaccessSebQuizsettingsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizaccessSebQuizsettingsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizaccessSebQuizsettingsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizaccessSebQuizsettingsController::class, 'restore']);
    Route::delete('/{id}/force', [QuizaccessSebQuizsettingsController::class, 'forceDelete']);

    Route::get('/', [QuizaccessSebQuizsettingsController::class, 'index']);
    Route::post('/', [QuizaccessSebQuizsettingsController::class, 'store']);
    Route::get('/{id}', [QuizaccessSebQuizsettingsController::class, 'show']);
    Route::put('/{id}', [QuizaccessSebQuizsettingsController::class, 'update']);
    Route::delete('/{id}', [QuizaccessSebQuizsettingsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizaccessSebQuizsettingsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizaccessSebQuizsettingsController::class, 'stats']);
});

// ========================
// TOOL_DATAPRIVACY_RQST_CTXLST RESOURCE
// ========================
Route::prefix('tool-dataprivacy-rqst-ctxlst')->group(function () {
    use App\Http\Controllers\Api\V1\ToolDataprivacyRqstCtxlstController;

    Route::get('/filters', [ToolDataprivacyRqstCtxlstController::class, 'filters']);
    Route::get('/suggestions', [ToolDataprivacyRqstCtxlstController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolDataprivacyRqstCtxlstController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolDataprivacyRqstCtxlstController::class, 'importTemplate']);
    Route::post('/import', [ToolDataprivacyRqstCtxlstController::class, 'import']);
    Route::get('/export', [ToolDataprivacyRqstCtxlstController::class, 'export']);

    Route::post('/bulk-store', [ToolDataprivacyRqstCtxlstController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolDataprivacyRqstCtxlstController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolDataprivacyRqstCtxlstController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolDataprivacyRqstCtxlstController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolDataprivacyRqstCtxlstController::class, 'restore']);
    Route::delete('/{id}/force', [ToolDataprivacyRqstCtxlstController::class, 'forceDelete']);

    Route::get('/', [ToolDataprivacyRqstCtxlstController::class, 'index']);
    Route::post('/', [ToolDataprivacyRqstCtxlstController::class, 'store']);
    Route::get('/{id}', [ToolDataprivacyRqstCtxlstController::class, 'show']);
    Route::put('/{id}', [ToolDataprivacyRqstCtxlstController::class, 'update']);
    Route::delete('/{id}', [ToolDataprivacyRqstCtxlstController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolDataprivacyRqstCtxlstController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolDataprivacyRqstCtxlstController::class, 'stats']);
});

// ========================
// BADGE_ISSUED RESOURCE
// ========================
Route::prefix('badge-issued')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeIssuedController;

    Route::get('/filters', [BadgeIssuedController::class, 'filters']);
    Route::get('/suggestions', [BadgeIssuedController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeIssuedController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeIssuedController::class, 'importTemplate']);
    Route::post('/import', [BadgeIssuedController::class, 'import']);
    Route::get('/export', [BadgeIssuedController::class, 'export']);

    Route::post('/bulk-store', [BadgeIssuedController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeIssuedController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeIssuedController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeIssuedController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeIssuedController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeIssuedController::class, 'forceDelete']);

    Route::get('/', [BadgeIssuedController::class, 'index']);
    Route::post('/', [BadgeIssuedController::class, 'store']);
    Route::get('/{id}', [BadgeIssuedController::class, 'show']);
    Route::put('/{id}', [BadgeIssuedController::class, 'update']);
    Route::delete('/{id}', [BadgeIssuedController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeIssuedController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeIssuedController::class, 'stats']);
});

// ========================
// BADGE_CRITERIA RESOURCE
// ========================
Route::prefix('badge-criteria')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeCriteriaController;

    Route::get('/filters', [BadgeCriteriaController::class, 'filters']);
    Route::get('/suggestions', [BadgeCriteriaController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeCriteriaController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeCriteriaController::class, 'importTemplate']);
    Route::post('/import', [BadgeCriteriaController::class, 'import']);
    Route::get('/export', [BadgeCriteriaController::class, 'export']);

    Route::post('/bulk-store', [BadgeCriteriaController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeCriteriaController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeCriteriaController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeCriteriaController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeCriteriaController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeCriteriaController::class, 'forceDelete']);

    Route::get('/', [BadgeCriteriaController::class, 'index']);
    Route::post('/', [BadgeCriteriaController::class, 'store']);
    Route::get('/{id}', [BadgeCriteriaController::class, 'show']);
    Route::put('/{id}', [BadgeCriteriaController::class, 'update']);
    Route::delete('/{id}', [BadgeCriteriaController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeCriteriaController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeCriteriaController::class, 'stats']);
});

// ========================
// BADGE_RELATED RESOURCE
// ========================
Route::prefix('badge-related')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeRelatedController;

    Route::get('/filters', [BadgeRelatedController::class, 'filters']);
    Route::get('/suggestions', [BadgeRelatedController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeRelatedController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeRelatedController::class, 'importTemplate']);
    Route::post('/import', [BadgeRelatedController::class, 'import']);
    Route::get('/export', [BadgeRelatedController::class, 'export']);

    Route::post('/bulk-store', [BadgeRelatedController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeRelatedController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeRelatedController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeRelatedController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeRelatedController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeRelatedController::class, 'forceDelete']);

    Route::get('/', [BadgeRelatedController::class, 'index']);
    Route::post('/', [BadgeRelatedController::class, 'store']);
    Route::get('/{id}', [BadgeRelatedController::class, 'show']);
    Route::put('/{id}', [BadgeRelatedController::class, 'update']);
    Route::delete('/{id}', [BadgeRelatedController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeRelatedController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeRelatedController::class, 'stats']);
});

// ========================
// BADGE_ENDORSEMENT RESOURCE
// ========================
Route::prefix('badge-endorsement')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeEndorsementController;

    Route::get('/filters', [BadgeEndorsementController::class, 'filters']);
    Route::get('/suggestions', [BadgeEndorsementController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeEndorsementController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeEndorsementController::class, 'importTemplate']);
    Route::post('/import', [BadgeEndorsementController::class, 'import']);
    Route::get('/export', [BadgeEndorsementController::class, 'export']);

    Route::post('/bulk-store', [BadgeEndorsementController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeEndorsementController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeEndorsementController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeEndorsementController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeEndorsementController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeEndorsementController::class, 'forceDelete']);

    Route::get('/', [BadgeEndorsementController::class, 'index']);
    Route::post('/', [BadgeEndorsementController::class, 'store']);
    Route::get('/{id}', [BadgeEndorsementController::class, 'show']);
    Route::put('/{id}', [BadgeEndorsementController::class, 'update']);
    Route::delete('/{id}', [BadgeEndorsementController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeEndorsementController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeEndorsementController::class, 'stats']);
});

// ========================
// BADGE_MANUAL_AWARD RESOURCE
// ========================
Route::prefix('badge-manual-award')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeManualAwardController;

    Route::get('/filters', [BadgeManualAwardController::class, 'filters']);
    Route::get('/suggestions', [BadgeManualAwardController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeManualAwardController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeManualAwardController::class, 'importTemplate']);
    Route::post('/import', [BadgeManualAwardController::class, 'import']);
    Route::get('/export', [BadgeManualAwardController::class, 'export']);

    Route::post('/bulk-store', [BadgeManualAwardController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeManualAwardController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeManualAwardController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeManualAwardController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeManualAwardController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeManualAwardController::class, 'forceDelete']);

    Route::get('/', [BadgeManualAwardController::class, 'index']);
    Route::post('/', [BadgeManualAwardController::class, 'store']);
    Route::get('/{id}', [BadgeManualAwardController::class, 'show']);
    Route::put('/{id}', [BadgeManualAwardController::class, 'update']);
    Route::delete('/{id}', [BadgeManualAwardController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeManualAwardController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeManualAwardController::class, 'stats']);
});

// ========================
// BADGE_ALIGNMENT RESOURCE
// ========================
Route::prefix('badge-alignment')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeAlignmentController;

    Route::get('/filters', [BadgeAlignmentController::class, 'filters']);
    Route::get('/suggestions', [BadgeAlignmentController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeAlignmentController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeAlignmentController::class, 'importTemplate']);
    Route::post('/import', [BadgeAlignmentController::class, 'import']);
    Route::get('/export', [BadgeAlignmentController::class, 'export']);

    Route::post('/bulk-store', [BadgeAlignmentController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeAlignmentController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeAlignmentController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeAlignmentController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeAlignmentController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeAlignmentController::class, 'forceDelete']);

    Route::get('/', [BadgeAlignmentController::class, 'index']);
    Route::post('/', [BadgeAlignmentController::class, 'store']);
    Route::get('/{id}', [BadgeAlignmentController::class, 'show']);
    Route::put('/{id}', [BadgeAlignmentController::class, 'update']);
    Route::delete('/{id}', [BadgeAlignmentController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeAlignmentController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeAlignmentController::class, 'stats']);
});

// ========================
// BACKUP_LOGS RESOURCE
// ========================
Route::prefix('backup-logs')->group(function () {
    use App\Http\Controllers\Api\V1\BackupLogsController;

    Route::get('/filters', [BackupLogsController::class, 'filters']);
    Route::get('/suggestions', [BackupLogsController::class, 'suggestions']);
    Route::post('/advanced-search', [BackupLogsController::class, 'advancedSearch']);

    Route::get('/import-template', [BackupLogsController::class, 'importTemplate']);
    Route::post('/import', [BackupLogsController::class, 'import']);
    Route::get('/export', [BackupLogsController::class, 'export']);

    Route::post('/bulk-store', [BackupLogsController::class, 'bulkStore']);
    Route::post('/bulk-update', [BackupLogsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BackupLogsController::class, 'bulkDestroy']);

    Route::get('/trashed', [BackupLogsController::class, 'trashed']);
    Route::post('/{id}/restore', [BackupLogsController::class, 'restore']);
    Route::delete('/{id}/force', [BackupLogsController::class, 'forceDelete']);

    Route::get('/', [BackupLogsController::class, 'index']);
    Route::post('/', [BackupLogsController::class, 'store']);
    Route::get('/{id}', [BackupLogsController::class, 'show']);
    Route::put('/{id}', [BackupLogsController::class, 'update']);
    Route::delete('/{id}', [BackupLogsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BackupLogsController::class, 'duplicate']);
    Route::get('/{id}/stats', [BackupLogsController::class, 'stats']);
});

// ========================
// MESSAGE_POPUP_NOTIFICATIONS RESOURCE
// ========================
Route::prefix('message-popup-notifications')->group(function () {
    use App\Http\Controllers\Api\V1\MessagePopupNotificationsController;

    Route::get('/filters', [MessagePopupNotificationsController::class, 'filters']);
    Route::get('/suggestions', [MessagePopupNotificationsController::class, 'suggestions']);
    Route::post('/advanced-search', [MessagePopupNotificationsController::class, 'advancedSearch']);

    Route::get('/import-template', [MessagePopupNotificationsController::class, 'importTemplate']);
    Route::post('/import', [MessagePopupNotificationsController::class, 'import']);
    Route::get('/export', [MessagePopupNotificationsController::class, 'export']);

    Route::post('/bulk-store', [MessagePopupNotificationsController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessagePopupNotificationsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessagePopupNotificationsController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessagePopupNotificationsController::class, 'trashed']);
    Route::post('/{id}/restore', [MessagePopupNotificationsController::class, 'restore']);
    Route::delete('/{id}/force', [MessagePopupNotificationsController::class, 'forceDelete']);

    Route::get('/', [MessagePopupNotificationsController::class, 'index']);
    Route::post('/', [MessagePopupNotificationsController::class, 'store']);
    Route::get('/{id}', [MessagePopupNotificationsController::class, 'show']);
    Route::put('/{id}', [MessagePopupNotificationsController::class, 'update']);
    Route::delete('/{id}', [MessagePopupNotificationsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessagePopupNotificationsController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessagePopupNotificationsController::class, 'stats']);
});

// ========================
// QTYPE_DDMARKER_DRAGS RESOURCE
// ========================
Route::prefix('qtype-ddmarker-drags')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeDdmarkerDragsController;

    Route::get('/filters', [QtypeDdmarkerDragsController::class, 'filters']);
    Route::get('/suggestions', [QtypeDdmarkerDragsController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeDdmarkerDragsController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeDdmarkerDragsController::class, 'importTemplate']);
    Route::post('/import', [QtypeDdmarkerDragsController::class, 'import']);
    Route::get('/export', [QtypeDdmarkerDragsController::class, 'export']);

    Route::post('/bulk-store', [QtypeDdmarkerDragsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeDdmarkerDragsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeDdmarkerDragsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeDdmarkerDragsController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeDdmarkerDragsController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeDdmarkerDragsController::class, 'forceDelete']);

    Route::get('/', [QtypeDdmarkerDragsController::class, 'index']);
    Route::post('/', [QtypeDdmarkerDragsController::class, 'store']);
    Route::get('/{id}', [QtypeDdmarkerDragsController::class, 'show']);
    Route::put('/{id}', [QtypeDdmarkerDragsController::class, 'update']);
    Route::delete('/{id}', [QtypeDdmarkerDragsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeDdmarkerDragsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeDdmarkerDragsController::class, 'stats']);
});

// ========================
// QTYPE_MATCH_SUBQUESTIONS RESOURCE
// ========================
Route::prefix('qtype-match-subquestions')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeMatchSubquestionsController;

    Route::get('/filters', [QtypeMatchSubquestionsController::class, 'filters']);
    Route::get('/suggestions', [QtypeMatchSubquestionsController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeMatchSubquestionsController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeMatchSubquestionsController::class, 'importTemplate']);
    Route::post('/import', [QtypeMatchSubquestionsController::class, 'import']);
    Route::get('/export', [QtypeMatchSubquestionsController::class, 'export']);

    Route::post('/bulk-store', [QtypeMatchSubquestionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeMatchSubquestionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeMatchSubquestionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeMatchSubquestionsController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeMatchSubquestionsController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeMatchSubquestionsController::class, 'forceDelete']);

    Route::get('/', [QtypeMatchSubquestionsController::class, 'index']);
    Route::post('/', [QtypeMatchSubquestionsController::class, 'store']);
    Route::get('/{id}', [QtypeMatchSubquestionsController::class, 'show']);
    Route::put('/{id}', [QtypeMatchSubquestionsController::class, 'update']);
    Route::delete('/{id}', [QtypeMatchSubquestionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeMatchSubquestionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeMatchSubquestionsController::class, 'stats']);
});

// ========================
// QUESTION_NUMERICAL_OPTIONS RESOURCE
// ========================
Route::prefix('question-numerical-options')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionNumericalOptionsController;

    Route::get('/filters', [QuestionNumericalOptionsController::class, 'filters']);
    Route::get('/suggestions', [QuestionNumericalOptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionNumericalOptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionNumericalOptionsController::class, 'importTemplate']);
    Route::post('/import', [QuestionNumericalOptionsController::class, 'import']);
    Route::get('/export', [QuestionNumericalOptionsController::class, 'export']);

    Route::post('/bulk-store', [QuestionNumericalOptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionNumericalOptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionNumericalOptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionNumericalOptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionNumericalOptionsController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionNumericalOptionsController::class, 'forceDelete']);

    Route::get('/', [QuestionNumericalOptionsController::class, 'index']);
    Route::post('/', [QuestionNumericalOptionsController::class, 'store']);
    Route::get('/{id}', [QuestionNumericalOptionsController::class, 'show']);
    Route::put('/{id}', [QuestionNumericalOptionsController::class, 'update']);
    Route::delete('/{id}', [QuestionNumericalOptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionNumericalOptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionNumericalOptionsController::class, 'stats']);
});

// ========================
// QUESTION_RESPONSE_ANALYSIS RESOURCE
// ========================
Route::prefix('question-response-analysis')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionResponseAnalysisController;

    Route::get('/filters', [QuestionResponseAnalysisController::class, 'filters']);
    Route::get('/suggestions', [QuestionResponseAnalysisController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionResponseAnalysisController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionResponseAnalysisController::class, 'importTemplate']);
    Route::post('/import', [QuestionResponseAnalysisController::class, 'import']);
    Route::get('/export', [QuestionResponseAnalysisController::class, 'export']);

    Route::post('/bulk-store', [QuestionResponseAnalysisController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionResponseAnalysisController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionResponseAnalysisController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionResponseAnalysisController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionResponseAnalysisController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionResponseAnalysisController::class, 'forceDelete']);

    Route::get('/', [QuestionResponseAnalysisController::class, 'index']);
    Route::post('/', [QuestionResponseAnalysisController::class, 'store']);
    Route::get('/{id}', [QuestionResponseAnalysisController::class, 'show']);
    Route::put('/{id}', [QuestionResponseAnalysisController::class, 'update']);
    Route::delete('/{id}', [QuestionResponseAnalysisController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionResponseAnalysisController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionResponseAnalysisController::class, 'stats']);
});

// ========================
// QUESTION_NUMERICAL_UNITS RESOURCE
// ========================
Route::prefix('question-numerical-units')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionNumericalUnitsController;

    Route::get('/filters', [QuestionNumericalUnitsController::class, 'filters']);
    Route::get('/suggestions', [QuestionNumericalUnitsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionNumericalUnitsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionNumericalUnitsController::class, 'importTemplate']);
    Route::post('/import', [QuestionNumericalUnitsController::class, 'import']);
    Route::get('/export', [QuestionNumericalUnitsController::class, 'export']);

    Route::post('/bulk-store', [QuestionNumericalUnitsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionNumericalUnitsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionNumericalUnitsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionNumericalUnitsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionNumericalUnitsController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionNumericalUnitsController::class, 'forceDelete']);

    Route::get('/', [QuestionNumericalUnitsController::class, 'index']);
    Route::post('/', [QuestionNumericalUnitsController::class, 'store']);
    Route::get('/{id}', [QuestionNumericalUnitsController::class, 'show']);
    Route::put('/{id}', [QuestionNumericalUnitsController::class, 'update']);
    Route::delete('/{id}', [QuestionNumericalUnitsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionNumericalUnitsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionNumericalUnitsController::class, 'stats']);
});

// ========================
// QUESTION_MULTIANSWER RESOURCE
// ========================
Route::prefix('question-multianswer')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionMultianswerController;

    Route::get('/filters', [QuestionMultianswerController::class, 'filters']);
    Route::get('/suggestions', [QuestionMultianswerController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionMultianswerController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionMultianswerController::class, 'importTemplate']);
    Route::post('/import', [QuestionMultianswerController::class, 'import']);
    Route::get('/export', [QuestionMultianswerController::class, 'export']);

    Route::post('/bulk-store', [QuestionMultianswerController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionMultianswerController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionMultianswerController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionMultianswerController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionMultianswerController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionMultianswerController::class, 'forceDelete']);

    Route::get('/', [QuestionMultianswerController::class, 'index']);
    Route::post('/', [QuestionMultianswerController::class, 'store']);
    Route::get('/{id}', [QuestionMultianswerController::class, 'show']);
    Route::put('/{id}', [QuestionMultianswerController::class, 'update']);
    Route::delete('/{id}', [QuestionMultianswerController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionMultianswerController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionMultianswerController::class, 'stats']);
});

// ========================
// QUESTION_CALCULATED_OPTIONS RESOURCE
// ========================
Route::prefix('question-calculated-options')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionCalculatedOptionsController;

    Route::get('/filters', [QuestionCalculatedOptionsController::class, 'filters']);
    Route::get('/suggestions', [QuestionCalculatedOptionsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionCalculatedOptionsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionCalculatedOptionsController::class, 'importTemplate']);
    Route::post('/import', [QuestionCalculatedOptionsController::class, 'import']);
    Route::get('/export', [QuestionCalculatedOptionsController::class, 'export']);

    Route::post('/bulk-store', [QuestionCalculatedOptionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionCalculatedOptionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionCalculatedOptionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionCalculatedOptionsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionCalculatedOptionsController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionCalculatedOptionsController::class, 'forceDelete']);

    Route::get('/', [QuestionCalculatedOptionsController::class, 'index']);
    Route::post('/', [QuestionCalculatedOptionsController::class, 'store']);
    Route::get('/{id}', [QuestionCalculatedOptionsController::class, 'show']);
    Route::put('/{id}', [QuestionCalculatedOptionsController::class, 'update']);
    Route::delete('/{id}', [QuestionCalculatedOptionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionCalculatedOptionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionCalculatedOptionsController::class, 'stats']);
});

// ========================
// QTYPE_DDMARKER_DROPS RESOURCE
// ========================
Route::prefix('qtype-ddmarker-drops')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeDdmarkerDropsController;

    Route::get('/filters', [QtypeDdmarkerDropsController::class, 'filters']);
    Route::get('/suggestions', [QtypeDdmarkerDropsController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeDdmarkerDropsController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeDdmarkerDropsController::class, 'importTemplate']);
    Route::post('/import', [QtypeDdmarkerDropsController::class, 'import']);
    Route::get('/export', [QtypeDdmarkerDropsController::class, 'export']);

    Route::post('/bulk-store', [QtypeDdmarkerDropsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeDdmarkerDropsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeDdmarkerDropsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeDdmarkerDropsController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeDdmarkerDropsController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeDdmarkerDropsController::class, 'forceDelete']);

    Route::get('/', [QtypeDdmarkerDropsController::class, 'index']);
    Route::post('/', [QtypeDdmarkerDropsController::class, 'store']);
    Route::get('/{id}', [QtypeDdmarkerDropsController::class, 'show']);
    Route::put('/{id}', [QtypeDdmarkerDropsController::class, 'update']);
    Route::delete('/{id}', [QtypeDdmarkerDropsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeDdmarkerDropsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeDdmarkerDropsController::class, 'stats']);
});

// ========================
// QUESTION_STATISTICS RESOURCE
// ========================
Route::prefix('question-statistics')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionStatisticsController;

    Route::get('/filters', [QuestionStatisticsController::class, 'filters']);
    Route::get('/suggestions', [QuestionStatisticsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionStatisticsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionStatisticsController::class, 'importTemplate']);
    Route::post('/import', [QuestionStatisticsController::class, 'import']);
    Route::get('/export', [QuestionStatisticsController::class, 'export']);

    Route::post('/bulk-store', [QuestionStatisticsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionStatisticsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionStatisticsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionStatisticsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionStatisticsController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionStatisticsController::class, 'forceDelete']);

    Route::get('/', [QuestionStatisticsController::class, 'index']);
    Route::post('/', [QuestionStatisticsController::class, 'store']);
    Route::get('/{id}', [QuestionStatisticsController::class, 'show']);
    Route::put('/{id}', [QuestionStatisticsController::class, 'update']);
    Route::delete('/{id}', [QuestionStatisticsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionStatisticsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionStatisticsController::class, 'stats']);
});

// ========================
// QUESTION_NUMERICAL RESOURCE
// ========================
Route::prefix('question-numerical')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionNumericalController;

    Route::get('/filters', [QuestionNumericalController::class, 'filters']);
    Route::get('/suggestions', [QuestionNumericalController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionNumericalController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionNumericalController::class, 'importTemplate']);
    Route::post('/import', [QuestionNumericalController::class, 'import']);
    Route::get('/export', [QuestionNumericalController::class, 'export']);

    Route::post('/bulk-store', [QuestionNumericalController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionNumericalController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionNumericalController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionNumericalController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionNumericalController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionNumericalController::class, 'forceDelete']);

    Route::get('/', [QuestionNumericalController::class, 'index']);
    Route::post('/', [QuestionNumericalController::class, 'store']);
    Route::get('/{id}', [QuestionNumericalController::class, 'show']);
    Route::put('/{id}', [QuestionNumericalController::class, 'update']);
    Route::delete('/{id}', [QuestionNumericalController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionNumericalController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionNumericalController::class, 'stats']);
});

// ========================
// QUESTION_ANSWERS RESOURCE
// ========================
Route::prefix('question-answers')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionAnswersController;

    Route::get('/filters', [QuestionAnswersController::class, 'filters']);
    Route::get('/suggestions', [QuestionAnswersController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionAnswersController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionAnswersController::class, 'importTemplate']);
    Route::post('/import', [QuestionAnswersController::class, 'import']);
    Route::get('/export', [QuestionAnswersController::class, 'export']);

    Route::post('/bulk-store', [QuestionAnswersController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionAnswersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionAnswersController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionAnswersController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionAnswersController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionAnswersController::class, 'forceDelete']);

    Route::get('/', [QuestionAnswersController::class, 'index']);
    Route::post('/', [QuestionAnswersController::class, 'store']);
    Route::get('/{id}', [QuestionAnswersController::class, 'show']);
    Route::put('/{id}', [QuestionAnswersController::class, 'update']);
    Route::delete('/{id}', [QuestionAnswersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionAnswersController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionAnswersController::class, 'stats']);
});

// ========================
// QTYPE_DDMARKER RESOURCE
// ========================
Route::prefix('qtype-ddmarker')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeDdmarkerController;

    Route::get('/filters', [QtypeDdmarkerController::class, 'filters']);
    Route::get('/suggestions', [QtypeDdmarkerController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeDdmarkerController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeDdmarkerController::class, 'importTemplate']);
    Route::post('/import', [QtypeDdmarkerController::class, 'import']);
    Route::get('/export', [QtypeDdmarkerController::class, 'export']);

    Route::post('/bulk-store', [QtypeDdmarkerController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeDdmarkerController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeDdmarkerController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeDdmarkerController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeDdmarkerController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeDdmarkerController::class, 'forceDelete']);

    Route::get('/', [QtypeDdmarkerController::class, 'index']);
    Route::post('/', [QtypeDdmarkerController::class, 'store']);
    Route::get('/{id}', [QtypeDdmarkerController::class, 'show']);
    Route::put('/{id}', [QtypeDdmarkerController::class, 'update']);
    Route::delete('/{id}', [QtypeDdmarkerController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeDdmarkerController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeDdmarkerController::class, 'stats']);
});

// ========================
// QUESTION_TRUEFALSE RESOURCE
// ========================
Route::prefix('question-truefalse')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionTruefalseController;

    Route::get('/filters', [QuestionTruefalseController::class, 'filters']);
    Route::get('/suggestions', [QuestionTruefalseController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionTruefalseController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionTruefalseController::class, 'importTemplate']);
    Route::post('/import', [QuestionTruefalseController::class, 'import']);
    Route::get('/export', [QuestionTruefalseController::class, 'export']);

    Route::post('/bulk-store', [QuestionTruefalseController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionTruefalseController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionTruefalseController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionTruefalseController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionTruefalseController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionTruefalseController::class, 'forceDelete']);

    Route::get('/', [QuestionTruefalseController::class, 'index']);
    Route::post('/', [QuestionTruefalseController::class, 'store']);
    Route::get('/{id}', [QuestionTruefalseController::class, 'show']);
    Route::put('/{id}', [QuestionTruefalseController::class, 'update']);
    Route::delete('/{id}', [QuestionTruefalseController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionTruefalseController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionTruefalseController::class, 'stats']);
});

// ========================
// QUESTION_CALCULATED RESOURCE
// ========================
Route::prefix('question-calculated')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionCalculatedController;

    Route::get('/filters', [QuestionCalculatedController::class, 'filters']);
    Route::get('/suggestions', [QuestionCalculatedController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionCalculatedController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionCalculatedController::class, 'importTemplate']);
    Route::post('/import', [QuestionCalculatedController::class, 'import']);
    Route::get('/export', [QuestionCalculatedController::class, 'export']);

    Route::post('/bulk-store', [QuestionCalculatedController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionCalculatedController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionCalculatedController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionCalculatedController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionCalculatedController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionCalculatedController::class, 'forceDelete']);

    Route::get('/', [QuestionCalculatedController::class, 'index']);
    Route::post('/', [QuestionCalculatedController::class, 'store']);
    Route::get('/{id}', [QuestionCalculatedController::class, 'show']);
    Route::put('/{id}', [QuestionCalculatedController::class, 'update']);
    Route::delete('/{id}', [QuestionCalculatedController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionCalculatedController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionCalculatedController::class, 'stats']);
});

// ========================
// QTYPE_DDIMAGEORTEXT_DRAGS RESOURCE
// ========================
Route::prefix('qtype-ddimageortext-drags')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeDdimageortextDragsController;

    Route::get('/filters', [QtypeDdimageortextDragsController::class, 'filters']);
    Route::get('/suggestions', [QtypeDdimageortextDragsController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeDdimageortextDragsController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeDdimageortextDragsController::class, 'importTemplate']);
    Route::post('/import', [QtypeDdimageortextDragsController::class, 'import']);
    Route::get('/export', [QtypeDdimageortextDragsController::class, 'export']);

    Route::post('/bulk-store', [QtypeDdimageortextDragsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeDdimageortextDragsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeDdimageortextDragsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeDdimageortextDragsController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeDdimageortextDragsController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeDdimageortextDragsController::class, 'forceDelete']);

    Route::get('/', [QtypeDdimageortextDragsController::class, 'index']);
    Route::post('/', [QtypeDdimageortextDragsController::class, 'store']);
    Route::get('/{id}', [QtypeDdimageortextDragsController::class, 'show']);
    Route::put('/{id}', [QtypeDdimageortextDragsController::class, 'update']);
    Route::delete('/{id}', [QtypeDdimageortextDragsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeDdimageortextDragsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeDdimageortextDragsController::class, 'stats']);
});

// ========================
// QUESTION_HINTS RESOURCE
// ========================
Route::prefix('question-hints')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionHintsController;

    Route::get('/filters', [QuestionHintsController::class, 'filters']);
    Route::get('/suggestions', [QuestionHintsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionHintsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionHintsController::class, 'importTemplate']);
    Route::post('/import', [QuestionHintsController::class, 'import']);
    Route::get('/export', [QuestionHintsController::class, 'export']);

    Route::post('/bulk-store', [QuestionHintsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionHintsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionHintsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionHintsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionHintsController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionHintsController::class, 'forceDelete']);

    Route::get('/', [QuestionHintsController::class, 'index']);
    Route::post('/', [QuestionHintsController::class, 'store']);
    Route::get('/{id}', [QuestionHintsController::class, 'show']);
    Route::put('/{id}', [QuestionHintsController::class, 'update']);
    Route::delete('/{id}', [QuestionHintsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionHintsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionHintsController::class, 'stats']);
});

// ========================
// QUESTION_DDWTOS RESOURCE
// ========================
Route::prefix('question-ddwtos')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionDdwtosController;

    Route::get('/filters', [QuestionDdwtosController::class, 'filters']);
    Route::get('/suggestions', [QuestionDdwtosController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionDdwtosController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionDdwtosController::class, 'importTemplate']);
    Route::post('/import', [QuestionDdwtosController::class, 'import']);
    Route::get('/export', [QuestionDdwtosController::class, 'export']);

    Route::post('/bulk-store', [QuestionDdwtosController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionDdwtosController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionDdwtosController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionDdwtosController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionDdwtosController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionDdwtosController::class, 'forceDelete']);

    Route::get('/', [QuestionDdwtosController::class, 'index']);
    Route::post('/', [QuestionDdwtosController::class, 'store']);
    Route::get('/{id}', [QuestionDdwtosController::class, 'show']);
    Route::put('/{id}', [QuestionDdwtosController::class, 'update']);
    Route::delete('/{id}', [QuestionDdwtosController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionDdwtosController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionDdwtosController::class, 'stats']);
});

// ========================
// QTYPE_DDIMAGEORTEXT_DROPS RESOURCE
// ========================
Route::prefix('qtype-ddimageortext-drops')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeDdimageortextDropsController;

    Route::get('/filters', [QtypeDdimageortextDropsController::class, 'filters']);
    Route::get('/suggestions', [QtypeDdimageortextDropsController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeDdimageortextDropsController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeDdimageortextDropsController::class, 'importTemplate']);
    Route::post('/import', [QtypeDdimageortextDropsController::class, 'import']);
    Route::get('/export', [QtypeDdimageortextDropsController::class, 'export']);

    Route::post('/bulk-store', [QtypeDdimageortextDropsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeDdimageortextDropsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeDdimageortextDropsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeDdimageortextDropsController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeDdimageortextDropsController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeDdimageortextDropsController::class, 'forceDelete']);

    Route::get('/', [QtypeDdimageortextDropsController::class, 'index']);
    Route::post('/', [QtypeDdimageortextDropsController::class, 'store']);
    Route::get('/{id}', [QtypeDdimageortextDropsController::class, 'show']);
    Route::put('/{id}', [QtypeDdimageortextDropsController::class, 'update']);
    Route::delete('/{id}', [QtypeDdimageortextDropsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeDdimageortextDropsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeDdimageortextDropsController::class, 'stats']);
});

// ========================
// QTYPE_DDIMAGEORTEXT RESOURCE
// ========================
Route::prefix('qtype-ddimageortext')->group(function () {
    use App\Http\Controllers\Api\V1\QtypeDdimageortextController;

    Route::get('/filters', [QtypeDdimageortextController::class, 'filters']);
    Route::get('/suggestions', [QtypeDdimageortextController::class, 'suggestions']);
    Route::post('/advanced-search', [QtypeDdimageortextController::class, 'advancedSearch']);

    Route::get('/import-template', [QtypeDdimageortextController::class, 'importTemplate']);
    Route::post('/import', [QtypeDdimageortextController::class, 'import']);
    Route::get('/export', [QtypeDdimageortextController::class, 'export']);

    Route::post('/bulk-store', [QtypeDdimageortextController::class, 'bulkStore']);
    Route::post('/bulk-update', [QtypeDdimageortextController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QtypeDdimageortextController::class, 'bulkDestroy']);

    Route::get('/trashed', [QtypeDdimageortextController::class, 'trashed']);
    Route::post('/{id}/restore', [QtypeDdimageortextController::class, 'restore']);
    Route::delete('/{id}/force', [QtypeDdimageortextController::class, 'forceDelete']);

    Route::get('/', [QtypeDdimageortextController::class, 'index']);
    Route::post('/', [QtypeDdimageortextController::class, 'store']);
    Route::get('/{id}', [QtypeDdimageortextController::class, 'show']);
    Route::put('/{id}', [QtypeDdimageortextController::class, 'update']);
    Route::delete('/{id}', [QtypeDdimageortextController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QtypeDdimageortextController::class, 'duplicate']);
    Route::get('/{id}/stats', [QtypeDdimageortextController::class, 'stats']);
});

// ========================
// QUESTION_GAPSELECT RESOURCE
// ========================
Route::prefix('question-gapselect')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionGapselectController;

    Route::get('/filters', [QuestionGapselectController::class, 'filters']);
    Route::get('/suggestions', [QuestionGapselectController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionGapselectController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionGapselectController::class, 'importTemplate']);
    Route::post('/import', [QuestionGapselectController::class, 'import']);
    Route::get('/export', [QuestionGapselectController::class, 'export']);

    Route::post('/bulk-store', [QuestionGapselectController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionGapselectController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionGapselectController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionGapselectController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionGapselectController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionGapselectController::class, 'forceDelete']);

    Route::get('/', [QuestionGapselectController::class, 'index']);
    Route::post('/', [QuestionGapselectController::class, 'store']);
    Route::get('/{id}', [QuestionGapselectController::class, 'show']);
    Route::put('/{id}', [QuestionGapselectController::class, 'update']);
    Route::delete('/{id}', [QuestionGapselectController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionGapselectController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionGapselectController::class, 'stats']);
});

// ========================
// ANALYTICS_MODELS_LOG RESOURCE
// ========================
Route::prefix('analytics-models-log')->group(function () {
    use App\Http\Controllers\Api\V1\AnalyticsModelsLogController;

    Route::get('/filters', [AnalyticsModelsLogController::class, 'filters']);
    Route::get('/suggestions', [AnalyticsModelsLogController::class, 'suggestions']);
    Route::post('/advanced-search', [AnalyticsModelsLogController::class, 'advancedSearch']);

    Route::get('/import-template', [AnalyticsModelsLogController::class, 'importTemplate']);
    Route::post('/import', [AnalyticsModelsLogController::class, 'import']);
    Route::get('/export', [AnalyticsModelsLogController::class, 'export']);

    Route::post('/bulk-store', [AnalyticsModelsLogController::class, 'bulkStore']);
    Route::post('/bulk-update', [AnalyticsModelsLogController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AnalyticsModelsLogController::class, 'bulkDestroy']);

    Route::get('/trashed', [AnalyticsModelsLogController::class, 'trashed']);
    Route::post('/{id}/restore', [AnalyticsModelsLogController::class, 'restore']);
    Route::delete('/{id}/force', [AnalyticsModelsLogController::class, 'forceDelete']);

    Route::get('/', [AnalyticsModelsLogController::class, 'index']);
    Route::post('/', [AnalyticsModelsLogController::class, 'store']);
    Route::get('/{id}', [AnalyticsModelsLogController::class, 'show']);
    Route::put('/{id}', [AnalyticsModelsLogController::class, 'update']);
    Route::delete('/{id}', [AnalyticsModelsLogController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AnalyticsModelsLogController::class, 'duplicate']);
    Route::get('/{id}/stats', [AnalyticsModelsLogController::class, 'stats']);
});

// ========================
// ANALYTICS_PREDICT_SAMPLES RESOURCE
// ========================
Route::prefix('analytics-predict-samples')->group(function () {
    use App\Http\Controllers\Api\V1\AnalyticsPredictSamplesController;

    Route::get('/filters', [AnalyticsPredictSamplesController::class, 'filters']);
    Route::get('/suggestions', [AnalyticsPredictSamplesController::class, 'suggestions']);
    Route::post('/advanced-search', [AnalyticsPredictSamplesController::class, 'advancedSearch']);

    Route::get('/import-template', [AnalyticsPredictSamplesController::class, 'importTemplate']);
    Route::post('/import', [AnalyticsPredictSamplesController::class, 'import']);
    Route::get('/export', [AnalyticsPredictSamplesController::class, 'export']);

    Route::post('/bulk-store', [AnalyticsPredictSamplesController::class, 'bulkStore']);
    Route::post('/bulk-update', [AnalyticsPredictSamplesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AnalyticsPredictSamplesController::class, 'bulkDestroy']);

    Route::get('/trashed', [AnalyticsPredictSamplesController::class, 'trashed']);
    Route::post('/{id}/restore', [AnalyticsPredictSamplesController::class, 'restore']);
    Route::delete('/{id}/force', [AnalyticsPredictSamplesController::class, 'forceDelete']);

    Route::get('/', [AnalyticsPredictSamplesController::class, 'index']);
    Route::post('/', [AnalyticsPredictSamplesController::class, 'store']);
    Route::get('/{id}', [AnalyticsPredictSamplesController::class, 'show']);
    Route::put('/{id}', [AnalyticsPredictSamplesController::class, 'update']);
    Route::delete('/{id}', [AnalyticsPredictSamplesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AnalyticsPredictSamplesController::class, 'duplicate']);
    Route::get('/{id}/stats', [AnalyticsPredictSamplesController::class, 'stats']);
});

// ========================
// ANALYTICS_TRAIN_SAMPLES RESOURCE
// ========================
Route::prefix('analytics-train-samples')->group(function () {
    use App\Http\Controllers\Api\V1\AnalyticsTrainSamplesController;

    Route::get('/filters', [AnalyticsTrainSamplesController::class, 'filters']);
    Route::get('/suggestions', [AnalyticsTrainSamplesController::class, 'suggestions']);
    Route::post('/advanced-search', [AnalyticsTrainSamplesController::class, 'advancedSearch']);

    Route::get('/import-template', [AnalyticsTrainSamplesController::class, 'importTemplate']);
    Route::post('/import', [AnalyticsTrainSamplesController::class, 'import']);
    Route::get('/export', [AnalyticsTrainSamplesController::class, 'export']);

    Route::post('/bulk-store', [AnalyticsTrainSamplesController::class, 'bulkStore']);
    Route::post('/bulk-update', [AnalyticsTrainSamplesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AnalyticsTrainSamplesController::class, 'bulkDestroy']);

    Route::get('/trashed', [AnalyticsTrainSamplesController::class, 'trashed']);
    Route::post('/{id}/restore', [AnalyticsTrainSamplesController::class, 'restore']);
    Route::delete('/{id}/force', [AnalyticsTrainSamplesController::class, 'forceDelete']);

    Route::get('/', [AnalyticsTrainSamplesController::class, 'index']);
    Route::post('/', [AnalyticsTrainSamplesController::class, 'store']);
    Route::get('/{id}', [AnalyticsTrainSamplesController::class, 'show']);
    Route::put('/{id}', [AnalyticsTrainSamplesController::class, 'update']);
    Route::delete('/{id}', [AnalyticsTrainSamplesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AnalyticsTrainSamplesController::class, 'duplicate']);
    Route::get('/{id}/stats', [AnalyticsTrainSamplesController::class, 'stats']);
});

// ========================
// ANALYTICS_PREDICTIONS RESOURCE
// ========================
Route::prefix('analytics-predictions')->group(function () {
    use App\Http\Controllers\Api\V1\AnalyticsPredictionsController;

    Route::get('/filters', [AnalyticsPredictionsController::class, 'filters']);
    Route::get('/suggestions', [AnalyticsPredictionsController::class, 'suggestions']);
    Route::post('/advanced-search', [AnalyticsPredictionsController::class, 'advancedSearch']);

    Route::get('/import-template', [AnalyticsPredictionsController::class, 'importTemplate']);
    Route::post('/import', [AnalyticsPredictionsController::class, 'import']);
    Route::get('/export', [AnalyticsPredictionsController::class, 'export']);

    Route::post('/bulk-store', [AnalyticsPredictionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [AnalyticsPredictionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AnalyticsPredictionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [AnalyticsPredictionsController::class, 'trashed']);
    Route::post('/{id}/restore', [AnalyticsPredictionsController::class, 'restore']);
    Route::delete('/{id}/force', [AnalyticsPredictionsController::class, 'forceDelete']);

    Route::get('/', [AnalyticsPredictionsController::class, 'index']);
    Route::post('/', [AnalyticsPredictionsController::class, 'store']);
    Route::get('/{id}', [AnalyticsPredictionsController::class, 'show']);
    Route::put('/{id}', [AnalyticsPredictionsController::class, 'update']);
    Route::delete('/{id}', [AnalyticsPredictionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AnalyticsPredictionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [AnalyticsPredictionsController::class, 'stats']);
});

// ========================
// ANALYTICS_USED_ANALYSABLES RESOURCE
// ========================
Route::prefix('analytics-used-analysables')->group(function () {
    use App\Http\Controllers\Api\V1\AnalyticsUsedAnalysablesController;

    Route::get('/filters', [AnalyticsUsedAnalysablesController::class, 'filters']);
    Route::get('/suggestions', [AnalyticsUsedAnalysablesController::class, 'suggestions']);
    Route::post('/advanced-search', [AnalyticsUsedAnalysablesController::class, 'advancedSearch']);

    Route::get('/import-template', [AnalyticsUsedAnalysablesController::class, 'importTemplate']);
    Route::post('/import', [AnalyticsUsedAnalysablesController::class, 'import']);
    Route::get('/export', [AnalyticsUsedAnalysablesController::class, 'export']);

    Route::post('/bulk-store', [AnalyticsUsedAnalysablesController::class, 'bulkStore']);
    Route::post('/bulk-update', [AnalyticsUsedAnalysablesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AnalyticsUsedAnalysablesController::class, 'bulkDestroy']);

    Route::get('/trashed', [AnalyticsUsedAnalysablesController::class, 'trashed']);
    Route::post('/{id}/restore', [AnalyticsUsedAnalysablesController::class, 'restore']);
    Route::delete('/{id}/force', [AnalyticsUsedAnalysablesController::class, 'forceDelete']);

    Route::get('/', [AnalyticsUsedAnalysablesController::class, 'index']);
    Route::post('/', [AnalyticsUsedAnalysablesController::class, 'store']);
    Route::get('/{id}', [AnalyticsUsedAnalysablesController::class, 'show']);
    Route::put('/{id}', [AnalyticsUsedAnalysablesController::class, 'update']);
    Route::delete('/{id}', [AnalyticsUsedAnalysablesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AnalyticsUsedAnalysablesController::class, 'duplicate']);
    Route::get('/{id}/stats', [AnalyticsUsedAnalysablesController::class, 'stats']);
});

// ========================
// USER_ENROLMENTS RESOURCE
// ========================
Route::prefix('user-enrolments')->group(function () {
    use App\Http\Controllers\Api\V1\UserEnrolmentsController;

    Route::get('/filters', [UserEnrolmentsController::class, 'filters']);
    Route::get('/suggestions', [UserEnrolmentsController::class, 'suggestions']);
    Route::post('/advanced-search', [UserEnrolmentsController::class, 'advancedSearch']);

    Route::get('/import-template', [UserEnrolmentsController::class, 'importTemplate']);
    Route::post('/import', [UserEnrolmentsController::class, 'import']);
    Route::get('/export', [UserEnrolmentsController::class, 'export']);

    Route::post('/bulk-store', [UserEnrolmentsController::class, 'bulkStore']);
    Route::post('/bulk-update', [UserEnrolmentsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [UserEnrolmentsController::class, 'bulkDestroy']);

    Route::get('/trashed', [UserEnrolmentsController::class, 'trashed']);
    Route::post('/{id}/restore', [UserEnrolmentsController::class, 'restore']);
    Route::delete('/{id}/force', [UserEnrolmentsController::class, 'forceDelete']);

    Route::get('/', [UserEnrolmentsController::class, 'index']);
    Route::post('/', [UserEnrolmentsController::class, 'store']);
    Route::get('/{id}', [UserEnrolmentsController::class, 'show']);
    Route::put('/{id}', [UserEnrolmentsController::class, 'update']);
    Route::delete('/{id}', [UserEnrolmentsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [UserEnrolmentsController::class, 'duplicate']);
    Route::get('/{id}/stats', [UserEnrolmentsController::class, 'stats']);
});

// ========================
// ENROL_PAYPAL RESOURCE
// ========================
Route::prefix('enrol-paypal')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolPaypalController;

    Route::get('/filters', [EnrolPaypalController::class, 'filters']);
    Route::get('/suggestions', [EnrolPaypalController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolPaypalController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolPaypalController::class, 'importTemplate']);
    Route::post('/import', [EnrolPaypalController::class, 'import']);
    Route::get('/export', [EnrolPaypalController::class, 'export']);

    Route::post('/bulk-store', [EnrolPaypalController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolPaypalController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolPaypalController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolPaypalController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolPaypalController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolPaypalController::class, 'forceDelete']);

    Route::get('/', [EnrolPaypalController::class, 'index']);
    Route::post('/', [EnrolPaypalController::class, 'store']);
    Route::get('/{id}', [EnrolPaypalController::class, 'show']);
    Route::put('/{id}', [EnrolPaypalController::class, 'update']);
    Route::delete('/{id}', [EnrolPaypalController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolPaypalController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolPaypalController::class, 'stats']);
});

// ========================
// ENROL_LTI_TOOLS RESOURCE
// ========================
Route::prefix('enrol-lti-tools')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiToolsController;

    Route::get('/filters', [EnrolLtiToolsController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiToolsController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiToolsController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiToolsController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiToolsController::class, 'import']);
    Route::get('/export', [EnrolLtiToolsController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiToolsController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiToolsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiToolsController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiToolsController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiToolsController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiToolsController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiToolsController::class, 'index']);
    Route::post('/', [EnrolLtiToolsController::class, 'store']);
    Route::get('/{id}', [EnrolLtiToolsController::class, 'show']);
    Route::put('/{id}', [EnrolLtiToolsController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiToolsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiToolsController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiToolsController::class, 'stats']);
});

// ========================
// GRADING_DEFINITIONS RESOURCE
// ========================
Route::prefix('grading-definitions')->group(function () {
    use App\Http\Controllers\Api\V1\GradingDefinitionsController;

    Route::get('/filters', [GradingDefinitionsController::class, 'filters']);
    Route::get('/suggestions', [GradingDefinitionsController::class, 'suggestions']);
    Route::post('/advanced-search', [GradingDefinitionsController::class, 'advancedSearch']);

    Route::get('/import-template', [GradingDefinitionsController::class, 'importTemplate']);
    Route::post('/import', [GradingDefinitionsController::class, 'import']);
    Route::get('/export', [GradingDefinitionsController::class, 'export']);

    Route::post('/bulk-store', [GradingDefinitionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradingDefinitionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradingDefinitionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradingDefinitionsController::class, 'trashed']);
    Route::post('/{id}/restore', [GradingDefinitionsController::class, 'restore']);
    Route::delete('/{id}/force', [GradingDefinitionsController::class, 'forceDelete']);

    Route::get('/', [GradingDefinitionsController::class, 'index']);
    Route::post('/', [GradingDefinitionsController::class, 'store']);
    Route::get('/{id}', [GradingDefinitionsController::class, 'show']);
    Route::put('/{id}', [GradingDefinitionsController::class, 'update']);
    Route::delete('/{id}', [GradingDefinitionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradingDefinitionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradingDefinitionsController::class, 'stats']);
});

// ========================
// CUSTOMFIELD_FIELD RESOURCE
// ========================
Route::prefix('customfield-field')->group(function () {
    use App\Http\Controllers\Api\V1\CustomfieldFieldController;

    Route::get('/filters', [CustomfieldFieldController::class, 'filters']);
    Route::get('/suggestions', [CustomfieldFieldController::class, 'suggestions']);
    Route::post('/advanced-search', [CustomfieldFieldController::class, 'advancedSearch']);

    Route::get('/import-template', [CustomfieldFieldController::class, 'importTemplate']);
    Route::post('/import', [CustomfieldFieldController::class, 'import']);
    Route::get('/export', [CustomfieldFieldController::class, 'export']);

    Route::post('/bulk-store', [CustomfieldFieldController::class, 'bulkStore']);
    Route::post('/bulk-update', [CustomfieldFieldController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CustomfieldFieldController::class, 'bulkDestroy']);

    Route::get('/trashed', [CustomfieldFieldController::class, 'trashed']);
    Route::post('/{id}/restore', [CustomfieldFieldController::class, 'restore']);
    Route::delete('/{id}/force', [CustomfieldFieldController::class, 'forceDelete']);

    Route::get('/', [CustomfieldFieldController::class, 'index']);
    Route::post('/', [CustomfieldFieldController::class, 'store']);
    Route::get('/{id}', [CustomfieldFieldController::class, 'show']);
    Route::put('/{id}', [CustomfieldFieldController::class, 'update']);
    Route::delete('/{id}', [CustomfieldFieldController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CustomfieldFieldController::class, 'duplicate']);
    Route::get('/{id}/stats', [CustomfieldFieldController::class, 'stats']);
});

// ========================
// PAYMENT_GATEWAYS RESOURCE
// ========================
Route::prefix('payment-gateways')->group(function () {
    use App\Http\Controllers\Api\V1\PaymentGatewaysController;

    Route::get('/filters', [PaymentGatewaysController::class, 'filters']);
    Route::get('/suggestions', [PaymentGatewaysController::class, 'suggestions']);
    Route::post('/advanced-search', [PaymentGatewaysController::class, 'advancedSearch']);

    Route::get('/import-template', [PaymentGatewaysController::class, 'importTemplate']);
    Route::post('/import', [PaymentGatewaysController::class, 'import']);
    Route::get('/export', [PaymentGatewaysController::class, 'export']);

    Route::post('/bulk-store', [PaymentGatewaysController::class, 'bulkStore']);
    Route::post('/bulk-update', [PaymentGatewaysController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PaymentGatewaysController::class, 'bulkDestroy']);

    Route::get('/trashed', [PaymentGatewaysController::class, 'trashed']);
    Route::post('/{id}/restore', [PaymentGatewaysController::class, 'restore']);
    Route::delete('/{id}/force', [PaymentGatewaysController::class, 'forceDelete']);

    Route::get('/', [PaymentGatewaysController::class, 'index']);
    Route::post('/', [PaymentGatewaysController::class, 'store']);
    Route::get('/{id}', [PaymentGatewaysController::class, 'show']);
    Route::put('/{id}', [PaymentGatewaysController::class, 'update']);
    Route::delete('/{id}', [PaymentGatewaysController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PaymentGatewaysController::class, 'duplicate']);
    Route::get('/{id}/stats', [PaymentGatewaysController::class, 'stats']);
});

// ========================
// PAYMENTS RESOURCE
// ========================
Route::prefix('payments')->group(function () {
    use App\Http\Controllers\Api\V1\PaymentsController;

    Route::get('/filters', [PaymentsController::class, 'filters']);
    Route::get('/suggestions', [PaymentsController::class, 'suggestions']);
    Route::post('/advanced-search', [PaymentsController::class, 'advancedSearch']);

    Route::get('/import-template', [PaymentsController::class, 'importTemplate']);
    Route::post('/import', [PaymentsController::class, 'import']);
    Route::get('/export', [PaymentsController::class, 'export']);

    Route::post('/bulk-store', [PaymentsController::class, 'bulkStore']);
    Route::post('/bulk-update', [PaymentsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PaymentsController::class, 'bulkDestroy']);

    Route::get('/trashed', [PaymentsController::class, 'trashed']);
    Route::post('/{id}/restore', [PaymentsController::class, 'restore']);
    Route::delete('/{id}/force', [PaymentsController::class, 'forceDelete']);

    Route::get('/', [PaymentsController::class, 'index']);
    Route::post('/', [PaymentsController::class, 'store']);
    Route::get('/{id}', [PaymentsController::class, 'show']);
    Route::put('/{id}', [PaymentsController::class, 'update']);
    Route::delete('/{id}', [PaymentsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PaymentsController::class, 'duplicate']);
    Route::get('/{id}/stats', [PaymentsController::class, 'stats']);
});

// ========================
// MESSAGE_CONVERSATION_MEMBERS RESOURCE
// ========================
Route::prefix('message-conversation-members')->group(function () {
    use App\Http\Controllers\Api\V1\MessageConversationMembersController;

    Route::get('/filters', [MessageConversationMembersController::class, 'filters']);
    Route::get('/suggestions', [MessageConversationMembersController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageConversationMembersController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageConversationMembersController::class, 'importTemplate']);
    Route::post('/import', [MessageConversationMembersController::class, 'import']);
    Route::get('/export', [MessageConversationMembersController::class, 'export']);

    Route::post('/bulk-store', [MessageConversationMembersController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageConversationMembersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageConversationMembersController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageConversationMembersController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageConversationMembersController::class, 'restore']);
    Route::delete('/{id}/force', [MessageConversationMembersController::class, 'forceDelete']);

    Route::get('/', [MessageConversationMembersController::class, 'index']);
    Route::post('/', [MessageConversationMembersController::class, 'store']);
    Route::get('/{id}', [MessageConversationMembersController::class, 'show']);
    Route::put('/{id}', [MessageConversationMembersController::class, 'update']);
    Route::delete('/{id}', [MessageConversationMembersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageConversationMembersController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageConversationMembersController::class, 'stats']);
});

// ========================
// MESSAGE_CONVERSATION_ACTIONS RESOURCE
// ========================
Route::prefix('message-conversation-actions')->group(function () {
    use App\Http\Controllers\Api\V1\MessageConversationActionsController;

    Route::get('/filters', [MessageConversationActionsController::class, 'filters']);
    Route::get('/suggestions', [MessageConversationActionsController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageConversationActionsController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageConversationActionsController::class, 'importTemplate']);
    Route::post('/import', [MessageConversationActionsController::class, 'import']);
    Route::get('/export', [MessageConversationActionsController::class, 'export']);

    Route::post('/bulk-store', [MessageConversationActionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageConversationActionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageConversationActionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageConversationActionsController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageConversationActionsController::class, 'restore']);
    Route::delete('/{id}/force', [MessageConversationActionsController::class, 'forceDelete']);

    Route::get('/', [MessageConversationActionsController::class, 'index']);
    Route::post('/', [MessageConversationActionsController::class, 'store']);
    Route::get('/{id}', [MessageConversationActionsController::class, 'show']);
    Route::put('/{id}', [MessageConversationActionsController::class, 'update']);
    Route::delete('/{id}', [MessageConversationActionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageConversationActionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageConversationActionsController::class, 'stats']);
});

// ========================
// MESSAGES RESOURCE
// ========================
Route::prefix('messages')->group(function () {
    use App\Http\Controllers\Api\V1\MessagesController;

    Route::get('/filters', [MessagesController::class, 'filters']);
    Route::get('/suggestions', [MessagesController::class, 'suggestions']);
    Route::post('/advanced-search', [MessagesController::class, 'advancedSearch']);

    Route::get('/import-template', [MessagesController::class, 'importTemplate']);
    Route::post('/import', [MessagesController::class, 'import']);
    Route::get('/export', [MessagesController::class, 'export']);

    Route::post('/bulk-store', [MessagesController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessagesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessagesController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessagesController::class, 'trashed']);
    Route::post('/{id}/restore', [MessagesController::class, 'restore']);
    Route::delete('/{id}/force', [MessagesController::class, 'forceDelete']);

    Route::get('/', [MessagesController::class, 'index']);
    Route::post('/', [MessagesController::class, 'store']);
    Route::get('/{id}', [MessagesController::class, 'show']);
    Route::put('/{id}', [MessagesController::class, 'update']);
    Route::delete('/{id}', [MessagesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessagesController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessagesController::class, 'stats']);
});

// ========================
// BLOCK_POSITIONS RESOURCE
// ========================
Route::prefix('block-positions')->group(function () {
    use App\Http\Controllers\Api\V1\BlockPositionsController;

    Route::get('/filters', [BlockPositionsController::class, 'filters']);
    Route::get('/suggestions', [BlockPositionsController::class, 'suggestions']);
    Route::post('/advanced-search', [BlockPositionsController::class, 'advancedSearch']);

    Route::get('/import-template', [BlockPositionsController::class, 'importTemplate']);
    Route::post('/import', [BlockPositionsController::class, 'import']);
    Route::get('/export', [BlockPositionsController::class, 'export']);

    Route::post('/bulk-store', [BlockPositionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [BlockPositionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BlockPositionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [BlockPositionsController::class, 'trashed']);
    Route::post('/{id}/restore', [BlockPositionsController::class, 'restore']);
    Route::delete('/{id}/force', [BlockPositionsController::class, 'forceDelete']);

    Route::get('/', [BlockPositionsController::class, 'index']);
    Route::post('/', [BlockPositionsController::class, 'store']);
    Route::get('/{id}', [BlockPositionsController::class, 'show']);
    Route::put('/{id}', [BlockPositionsController::class, 'update']);
    Route::delete('/{id}', [BlockPositionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BlockPositionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [BlockPositionsController::class, 'stats']);
});

// ========================
// COHORT_MEMBERS RESOURCE
// ========================
Route::prefix('cohort-members')->group(function () {
    use App\Http\Controllers\Api\V1\CohortMembersController;

    Route::get('/filters', [CohortMembersController::class, 'filters']);
    Route::get('/suggestions', [CohortMembersController::class, 'suggestions']);
    Route::post('/advanced-search', [CohortMembersController::class, 'advancedSearch']);

    Route::get('/import-template', [CohortMembersController::class, 'importTemplate']);
    Route::post('/import', [CohortMembersController::class, 'import']);
    Route::get('/export', [CohortMembersController::class, 'export']);

    Route::post('/bulk-store', [CohortMembersController::class, 'bulkStore']);
    Route::post('/bulk-update', [CohortMembersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CohortMembersController::class, 'bulkDestroy']);

    Route::get('/trashed', [CohortMembersController::class, 'trashed']);
    Route::post('/{id}/restore', [CohortMembersController::class, 'restore']);
    Route::delete('/{id}/force', [CohortMembersController::class, 'forceDelete']);

    Route::get('/', [CohortMembersController::class, 'index']);
    Route::post('/', [CohortMembersController::class, 'store']);
    Route::get('/{id}', [CohortMembersController::class, 'show']);
    Route::put('/{id}', [CohortMembersController::class, 'update']);
    Route::delete('/{id}', [CohortMembersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CohortMembersController::class, 'duplicate']);
    Route::get('/{id}/stats', [CohortMembersController::class, 'stats']);
});

// ========================
// QUESTION_ATTEMPTS RESOURCE
// ========================
Route::prefix('question-attempts')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionAttemptsController;

    Route::get('/filters', [QuestionAttemptsController::class, 'filters']);
    Route::get('/suggestions', [QuestionAttemptsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionAttemptsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionAttemptsController::class, 'importTemplate']);
    Route::post('/import', [QuestionAttemptsController::class, 'import']);
    Route::get('/export', [QuestionAttemptsController::class, 'export']);

    Route::post('/bulk-store', [QuestionAttemptsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionAttemptsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionAttemptsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionAttemptsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionAttemptsController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionAttemptsController::class, 'forceDelete']);

    Route::get('/', [QuestionAttemptsController::class, 'index']);
    Route::post('/', [QuestionAttemptsController::class, 'store']);
    Route::get('/{id}', [QuestionAttemptsController::class, 'show']);
    Route::put('/{id}', [QuestionAttemptsController::class, 'update']);
    Route::delete('/{id}', [QuestionAttemptsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionAttemptsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionAttemptsController::class, 'stats']);
});

// ========================
// COMMUNICATION_CUSTOMLINK RESOURCE
// ========================
Route::prefix('communication-customlink')->group(function () {
    use App\Http\Controllers\Api\V1\CommunicationCustomlinkController;

    Route::get('/filters', [CommunicationCustomlinkController::class, 'filters']);
    Route::get('/suggestions', [CommunicationCustomlinkController::class, 'suggestions']);
    Route::post('/advanced-search', [CommunicationCustomlinkController::class, 'advancedSearch']);

    Route::get('/import-template', [CommunicationCustomlinkController::class, 'importTemplate']);
    Route::post('/import', [CommunicationCustomlinkController::class, 'import']);
    Route::get('/export', [CommunicationCustomlinkController::class, 'export']);

    Route::post('/bulk-store', [CommunicationCustomlinkController::class, 'bulkStore']);
    Route::post('/bulk-update', [CommunicationCustomlinkController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CommunicationCustomlinkController::class, 'bulkDestroy']);

    Route::get('/trashed', [CommunicationCustomlinkController::class, 'trashed']);
    Route::post('/{id}/restore', [CommunicationCustomlinkController::class, 'restore']);
    Route::delete('/{id}/force', [CommunicationCustomlinkController::class, 'forceDelete']);

    Route::get('/', [CommunicationCustomlinkController::class, 'index']);
    Route::post('/', [CommunicationCustomlinkController::class, 'store']);
    Route::get('/{id}', [CommunicationCustomlinkController::class, 'show']);
    Route::put('/{id}', [CommunicationCustomlinkController::class, 'update']);
    Route::delete('/{id}', [CommunicationCustomlinkController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CommunicationCustomlinkController::class, 'duplicate']);
    Route::get('/{id}/stats', [CommunicationCustomlinkController::class, 'stats']);
});

// ========================
// COMMUNICATION_USER RESOURCE
// ========================
Route::prefix('communication-user')->group(function () {
    use App\Http\Controllers\Api\V1\CommunicationUserController;

    Route::get('/filters', [CommunicationUserController::class, 'filters']);
    Route::get('/suggestions', [CommunicationUserController::class, 'suggestions']);
    Route::post('/advanced-search', [CommunicationUserController::class, 'advancedSearch']);

    Route::get('/import-template', [CommunicationUserController::class, 'importTemplate']);
    Route::post('/import', [CommunicationUserController::class, 'import']);
    Route::get('/export', [CommunicationUserController::class, 'export']);

    Route::post('/bulk-store', [CommunicationUserController::class, 'bulkStore']);
    Route::post('/bulk-update', [CommunicationUserController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CommunicationUserController::class, 'bulkDestroy']);

    Route::get('/trashed', [CommunicationUserController::class, 'trashed']);
    Route::post('/{id}/restore', [CommunicationUserController::class, 'restore']);
    Route::delete('/{id}/force', [CommunicationUserController::class, 'forceDelete']);

    Route::get('/', [CommunicationUserController::class, 'index']);
    Route::post('/', [CommunicationUserController::class, 'store']);
    Route::get('/{id}', [CommunicationUserController::class, 'show']);
    Route::put('/{id}', [CommunicationUserController::class, 'update']);
    Route::delete('/{id}', [CommunicationUserController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CommunicationUserController::class, 'duplicate']);
    Route::get('/{id}/stats', [CommunicationUserController::class, 'stats']);
});

// ========================
// MATRIX_ROOM RESOURCE
// ========================
Route::prefix('matrix-room')->group(function () {
    use App\Http\Controllers\Api\V1\MatrixRoomController;

    Route::get('/filters', [MatrixRoomController::class, 'filters']);
    Route::get('/suggestions', [MatrixRoomController::class, 'suggestions']);
    Route::post('/advanced-search', [MatrixRoomController::class, 'advancedSearch']);

    Route::get('/import-template', [MatrixRoomController::class, 'importTemplate']);
    Route::post('/import', [MatrixRoomController::class, 'import']);
    Route::get('/export', [MatrixRoomController::class, 'export']);

    Route::post('/bulk-store', [MatrixRoomController::class, 'bulkStore']);
    Route::post('/bulk-update', [MatrixRoomController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MatrixRoomController::class, 'bulkDestroy']);

    Route::get('/trashed', [MatrixRoomController::class, 'trashed']);
    Route::post('/{id}/restore', [MatrixRoomController::class, 'restore']);
    Route::delete('/{id}/force', [MatrixRoomController::class, 'forceDelete']);

    Route::get('/', [MatrixRoomController::class, 'index']);
    Route::post('/', [MatrixRoomController::class, 'store']);
    Route::get('/{id}', [MatrixRoomController::class, 'show']);
    Route::put('/{id}', [MatrixRoomController::class, 'update']);
    Route::delete('/{id}', [MatrixRoomController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MatrixRoomController::class, 'duplicate']);
    Route::get('/{id}/stats', [MatrixRoomController::class, 'stats']);
});

// ========================
// REPORTBUILDER_SCHEDULE RESOURCE
// ========================
Route::prefix('reportbuilder-schedule')->group(function () {
    use App\Http\Controllers\Api\V1\ReportbuilderScheduleController;

    Route::get('/filters', [ReportbuilderScheduleController::class, 'filters']);
    Route::get('/suggestions', [ReportbuilderScheduleController::class, 'suggestions']);
    Route::post('/advanced-search', [ReportbuilderScheduleController::class, 'advancedSearch']);

    Route::get('/import-template', [ReportbuilderScheduleController::class, 'importTemplate']);
    Route::post('/import', [ReportbuilderScheduleController::class, 'import']);
    Route::get('/export', [ReportbuilderScheduleController::class, 'export']);

    Route::post('/bulk-store', [ReportbuilderScheduleController::class, 'bulkStore']);
    Route::post('/bulk-update', [ReportbuilderScheduleController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ReportbuilderScheduleController::class, 'bulkDestroy']);

    Route::get('/trashed', [ReportbuilderScheduleController::class, 'trashed']);
    Route::post('/{id}/restore', [ReportbuilderScheduleController::class, 'restore']);
    Route::delete('/{id}/force', [ReportbuilderScheduleController::class, 'forceDelete']);

    Route::get('/', [ReportbuilderScheduleController::class, 'index']);
    Route::post('/', [ReportbuilderScheduleController::class, 'store']);
    Route::get('/{id}', [ReportbuilderScheduleController::class, 'show']);
    Route::put('/{id}', [ReportbuilderScheduleController::class, 'update']);
    Route::delete('/{id}', [ReportbuilderScheduleController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ReportbuilderScheduleController::class, 'duplicate']);
    Route::get('/{id}/stats', [ReportbuilderScheduleController::class, 'stats']);
});

// ========================
// REPORTBUILDER_AUDIENCE RESOURCE
// ========================
Route::prefix('reportbuilder-audience')->group(function () {
    use App\Http\Controllers\Api\V1\ReportbuilderAudienceController;

    Route::get('/filters', [ReportbuilderAudienceController::class, 'filters']);
    Route::get('/suggestions', [ReportbuilderAudienceController::class, 'suggestions']);
    Route::post('/advanced-search', [ReportbuilderAudienceController::class, 'advancedSearch']);

    Route::get('/import-template', [ReportbuilderAudienceController::class, 'importTemplate']);
    Route::post('/import', [ReportbuilderAudienceController::class, 'import']);
    Route::get('/export', [ReportbuilderAudienceController::class, 'export']);

    Route::post('/bulk-store', [ReportbuilderAudienceController::class, 'bulkStore']);
    Route::post('/bulk-update', [ReportbuilderAudienceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ReportbuilderAudienceController::class, 'bulkDestroy']);

    Route::get('/trashed', [ReportbuilderAudienceController::class, 'trashed']);
    Route::post('/{id}/restore', [ReportbuilderAudienceController::class, 'restore']);
    Route::delete('/{id}/force', [ReportbuilderAudienceController::class, 'forceDelete']);

    Route::get('/', [ReportbuilderAudienceController::class, 'index']);
    Route::post('/', [ReportbuilderAudienceController::class, 'store']);
    Route::get('/{id}', [ReportbuilderAudienceController::class, 'show']);
    Route::put('/{id}', [ReportbuilderAudienceController::class, 'update']);
    Route::delete('/{id}', [ReportbuilderAudienceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ReportbuilderAudienceController::class, 'duplicate']);
    Route::get('/{id}/stats', [ReportbuilderAudienceController::class, 'stats']);
});

// ========================
// REPORTBUILDER_COLUMN RESOURCE
// ========================
Route::prefix('reportbuilder-column')->group(function () {
    use App\Http\Controllers\Api\V1\ReportbuilderColumnController;

    Route::get('/filters', [ReportbuilderColumnController::class, 'filters']);
    Route::get('/suggestions', [ReportbuilderColumnController::class, 'suggestions']);
    Route::post('/advanced-search', [ReportbuilderColumnController::class, 'advancedSearch']);

    Route::get('/import-template', [ReportbuilderColumnController::class, 'importTemplate']);
    Route::post('/import', [ReportbuilderColumnController::class, 'import']);
    Route::get('/export', [ReportbuilderColumnController::class, 'export']);

    Route::post('/bulk-store', [ReportbuilderColumnController::class, 'bulkStore']);
    Route::post('/bulk-update', [ReportbuilderColumnController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ReportbuilderColumnController::class, 'bulkDestroy']);

    Route::get('/trashed', [ReportbuilderColumnController::class, 'trashed']);
    Route::post('/{id}/restore', [ReportbuilderColumnController::class, 'restore']);
    Route::delete('/{id}/force', [ReportbuilderColumnController::class, 'forceDelete']);

    Route::get('/', [ReportbuilderColumnController::class, 'index']);
    Route::post('/', [ReportbuilderColumnController::class, 'store']);
    Route::get('/{id}', [ReportbuilderColumnController::class, 'show']);
    Route::put('/{id}', [ReportbuilderColumnController::class, 'update']);
    Route::delete('/{id}', [ReportbuilderColumnController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ReportbuilderColumnController::class, 'duplicate']);
    Route::get('/{id}/stats', [ReportbuilderColumnController::class, 'stats']);
});

// ========================
// REPORTBUILDER_FILTER RESOURCE
// ========================
Route::prefix('reportbuilder-filter')->group(function () {
    use App\Http\Controllers\Api\V1\ReportbuilderFilterController;

    Route::get('/filters', [ReportbuilderFilterController::class, 'filters']);
    Route::get('/suggestions', [ReportbuilderFilterController::class, 'suggestions']);
    Route::post('/advanced-search', [ReportbuilderFilterController::class, 'advancedSearch']);

    Route::get('/import-template', [ReportbuilderFilterController::class, 'importTemplate']);
    Route::post('/import', [ReportbuilderFilterController::class, 'import']);
    Route::get('/export', [ReportbuilderFilterController::class, 'export']);

    Route::post('/bulk-store', [ReportbuilderFilterController::class, 'bulkStore']);
    Route::post('/bulk-update', [ReportbuilderFilterController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ReportbuilderFilterController::class, 'bulkDestroy']);

    Route::get('/trashed', [ReportbuilderFilterController::class, 'trashed']);
    Route::post('/{id}/restore', [ReportbuilderFilterController::class, 'restore']);
    Route::delete('/{id}/force', [ReportbuilderFilterController::class, 'forceDelete']);

    Route::get('/', [ReportbuilderFilterController::class, 'index']);
    Route::post('/', [ReportbuilderFilterController::class, 'store']);
    Route::get('/{id}', [ReportbuilderFilterController::class, 'show']);
    Route::put('/{id}', [ReportbuilderFilterController::class, 'update']);
    Route::delete('/{id}', [ReportbuilderFilterController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ReportbuilderFilterController::class, 'duplicate']);
    Route::get('/{id}/stats', [ReportbuilderFilterController::class, 'stats']);
});

// ========================
// FILES_REFERENCE RESOURCE
// ========================
Route::prefix('files-reference')->group(function () {
    use App\Http\Controllers\Api\V1\FilesReferenceController;

    Route::get('/filters', [FilesReferenceController::class, 'filters']);
    Route::get('/suggestions', [FilesReferenceController::class, 'suggestions']);
    Route::post('/advanced-search', [FilesReferenceController::class, 'advancedSearch']);

    Route::get('/import-template', [FilesReferenceController::class, 'importTemplate']);
    Route::post('/import', [FilesReferenceController::class, 'import']);
    Route::get('/export', [FilesReferenceController::class, 'export']);

    Route::post('/bulk-store', [FilesReferenceController::class, 'bulkStore']);
    Route::post('/bulk-update', [FilesReferenceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FilesReferenceController::class, 'bulkDestroy']);

    Route::get('/trashed', [FilesReferenceController::class, 'trashed']);
    Route::post('/{id}/restore', [FilesReferenceController::class, 'restore']);
    Route::delete('/{id}/force', [FilesReferenceController::class, 'forceDelete']);

    Route::get('/', [FilesReferenceController::class, 'index']);
    Route::post('/', [FilesReferenceController::class, 'store']);
    Route::get('/{id}', [FilesReferenceController::class, 'show']);
    Route::put('/{id}', [FilesReferenceController::class, 'update']);
    Route::delete('/{id}', [FilesReferenceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FilesReferenceController::class, 'duplicate']);
    Route::get('/{id}/stats', [FilesReferenceController::class, 'stats']);
});

// ========================
// QUESTION_REFERENCES RESOURCE
// ========================
Route::prefix('question-references')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionReferencesController;

    Route::get('/filters', [QuestionReferencesController::class, 'filters']);
    Route::get('/suggestions', [QuestionReferencesController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionReferencesController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionReferencesController::class, 'importTemplate']);
    Route::post('/import', [QuestionReferencesController::class, 'import']);
    Route::get('/export', [QuestionReferencesController::class, 'export']);

    Route::post('/bulk-store', [QuestionReferencesController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionReferencesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionReferencesController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionReferencesController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionReferencesController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionReferencesController::class, 'forceDelete']);

    Route::get('/', [QuestionReferencesController::class, 'index']);
    Route::post('/', [QuestionReferencesController::class, 'store']);
    Route::get('/{id}', [QuestionReferencesController::class, 'show']);
    Route::put('/{id}', [QuestionReferencesController::class, 'update']);
    Route::delete('/{id}', [QuestionReferencesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionReferencesController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionReferencesController::class, 'stats']);
});

// ========================
// QUESTION_VERSIONS RESOURCE
// ========================
Route::prefix('question-versions')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionVersionsController;

    Route::get('/filters', [QuestionVersionsController::class, 'filters']);
    Route::get('/suggestions', [QuestionVersionsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionVersionsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionVersionsController::class, 'importTemplate']);
    Route::post('/import', [QuestionVersionsController::class, 'import']);
    Route::get('/export', [QuestionVersionsController::class, 'export']);

    Route::post('/bulk-store', [QuestionVersionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionVersionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionVersionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionVersionsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionVersionsController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionVersionsController::class, 'forceDelete']);

    Route::get('/', [QuestionVersionsController::class, 'index']);
    Route::post('/', [QuestionVersionsController::class, 'store']);
    Route::get('/{id}', [QuestionVersionsController::class, 'show']);
    Route::put('/{id}', [QuestionVersionsController::class, 'update']);
    Route::delete('/{id}', [QuestionVersionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionVersionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionVersionsController::class, 'stats']);
});

// ========================
// QUESTION_DATASETS RESOURCE
// ========================
Route::prefix('question-datasets')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionDatasetsController;

    Route::get('/filters', [QuestionDatasetsController::class, 'filters']);
    Route::get('/suggestions', [QuestionDatasetsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionDatasetsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionDatasetsController::class, 'importTemplate']);
    Route::post('/import', [QuestionDatasetsController::class, 'import']);
    Route::get('/export', [QuestionDatasetsController::class, 'export']);

    Route::post('/bulk-store', [QuestionDatasetsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionDatasetsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionDatasetsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionDatasetsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionDatasetsController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionDatasetsController::class, 'forceDelete']);

    Route::get('/', [QuestionDatasetsController::class, 'index']);
    Route::post('/', [QuestionDatasetsController::class, 'store']);
    Route::get('/{id}', [QuestionDatasetsController::class, 'show']);
    Route::put('/{id}', [QuestionDatasetsController::class, 'update']);
    Route::delete('/{id}', [QuestionDatasetsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionDatasetsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionDatasetsController::class, 'stats']);
});

// ========================
// MNETSERVICE_ENROL_ENROLMENTS RESOURCE
// ========================
Route::prefix('mnetservice-enrol-enrolments')->group(function () {
    use App\Http\Controllers\Api\V1\MnetserviceEnrolEnrolmentsController;

    Route::get('/filters', [MnetserviceEnrolEnrolmentsController::class, 'filters']);
    Route::get('/suggestions', [MnetserviceEnrolEnrolmentsController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetserviceEnrolEnrolmentsController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetserviceEnrolEnrolmentsController::class, 'importTemplate']);
    Route::post('/import', [MnetserviceEnrolEnrolmentsController::class, 'import']);
    Route::get('/export', [MnetserviceEnrolEnrolmentsController::class, 'export']);

    Route::post('/bulk-store', [MnetserviceEnrolEnrolmentsController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetserviceEnrolEnrolmentsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetserviceEnrolEnrolmentsController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetserviceEnrolEnrolmentsController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetserviceEnrolEnrolmentsController::class, 'restore']);
    Route::delete('/{id}/force', [MnetserviceEnrolEnrolmentsController::class, 'forceDelete']);

    Route::get('/', [MnetserviceEnrolEnrolmentsController::class, 'index']);
    Route::post('/', [MnetserviceEnrolEnrolmentsController::class, 'store']);
    Route::get('/{id}', [MnetserviceEnrolEnrolmentsController::class, 'show']);
    Route::put('/{id}', [MnetserviceEnrolEnrolmentsController::class, 'update']);
    Route::delete('/{id}', [MnetserviceEnrolEnrolmentsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetserviceEnrolEnrolmentsController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetserviceEnrolEnrolmentsController::class, 'stats']);
});

// ========================
// MNET_SESSION RESOURCE
// ========================
Route::prefix('mnet-session')->group(function () {
    use App\Http\Controllers\Api\V1\MnetSessionController;

    Route::get('/filters', [MnetSessionController::class, 'filters']);
    Route::get('/suggestions', [MnetSessionController::class, 'suggestions']);
    Route::post('/advanced-search', [MnetSessionController::class, 'advancedSearch']);

    Route::get('/import-template', [MnetSessionController::class, 'importTemplate']);
    Route::post('/import', [MnetSessionController::class, 'import']);
    Route::get('/export', [MnetSessionController::class, 'export']);

    Route::post('/bulk-store', [MnetSessionController::class, 'bulkStore']);
    Route::post('/bulk-update', [MnetSessionController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MnetSessionController::class, 'bulkDestroy']);

    Route::get('/trashed', [MnetSessionController::class, 'trashed']);
    Route::post('/{id}/restore', [MnetSessionController::class, 'restore']);
    Route::delete('/{id}/force', [MnetSessionController::class, 'forceDelete']);

    Route::get('/', [MnetSessionController::class, 'index']);
    Route::post('/', [MnetSessionController::class, 'store']);
    Route::get('/{id}', [MnetSessionController::class, 'show']);
    Route::put('/{id}', [MnetSessionController::class, 'update']);
    Route::delete('/{id}', [MnetSessionController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MnetSessionController::class, 'duplicate']);
    Route::get('/{id}/stats', [MnetSessionController::class, 'stats']);
});

// ========================
// TAG_CORRELATION RESOURCE
// ========================
Route::prefix('tag-correlation')->group(function () {
    use App\Http\Controllers\Api\V1\TagCorrelationController;

    Route::get('/filters', [TagCorrelationController::class, 'filters']);
    Route::get('/suggestions', [TagCorrelationController::class, 'suggestions']);
    Route::post('/advanced-search', [TagCorrelationController::class, 'advancedSearch']);

    Route::get('/import-template', [TagCorrelationController::class, 'importTemplate']);
    Route::post('/import', [TagCorrelationController::class, 'import']);
    Route::get('/export', [TagCorrelationController::class, 'export']);

    Route::post('/bulk-store', [TagCorrelationController::class, 'bulkStore']);
    Route::post('/bulk-update', [TagCorrelationController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [TagCorrelationController::class, 'bulkDestroy']);

    Route::get('/trashed', [TagCorrelationController::class, 'trashed']);
    Route::post('/{id}/restore', [TagCorrelationController::class, 'restore']);
    Route::delete('/{id}/force', [TagCorrelationController::class, 'forceDelete']);

    Route::get('/', [TagCorrelationController::class, 'index']);
    Route::post('/', [TagCorrelationController::class, 'store']);
    Route::get('/{id}', [TagCorrelationController::class, 'show']);
    Route::put('/{id}', [TagCorrelationController::class, 'update']);
    Route::delete('/{id}', [TagCorrelationController::class, 'destroy']);

    Route::post('/{id}/duplicate', [TagCorrelationController::class, 'duplicate']);
    Route::get('/{id}/stats', [TagCorrelationController::class, 'stats']);
});

// ========================
// TAG_INSTANCE RESOURCE
// ========================
Route::prefix('tag-instance')->group(function () {
    use App\Http\Controllers\Api\V1\TagInstanceController;

    Route::get('/filters', [TagInstanceController::class, 'filters']);
    Route::get('/suggestions', [TagInstanceController::class, 'suggestions']);
    Route::post('/advanced-search', [TagInstanceController::class, 'advancedSearch']);

    Route::get('/import-template', [TagInstanceController::class, 'importTemplate']);
    Route::post('/import', [TagInstanceController::class, 'import']);
    Route::get('/export', [TagInstanceController::class, 'export']);

    Route::post('/bulk-store', [TagInstanceController::class, 'bulkStore']);
    Route::post('/bulk-update', [TagInstanceController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [TagInstanceController::class, 'bulkDestroy']);

    Route::get('/trashed', [TagInstanceController::class, 'trashed']);
    Route::post('/{id}/restore', [TagInstanceController::class, 'restore']);
    Route::delete('/{id}/force', [TagInstanceController::class, 'forceDelete']);

    Route::get('/', [TagInstanceController::class, 'index']);
    Route::post('/', [TagInstanceController::class, 'store']);
    Route::get('/{id}', [TagInstanceController::class, 'show']);
    Route::put('/{id}', [TagInstanceController::class, 'update']);
    Route::delete('/{id}', [TagInstanceController::class, 'destroy']);

    Route::post('/{id}/duplicate', [TagInstanceController::class, 'duplicate']);
    Route::get('/{id}/stats', [TagInstanceController::class, 'stats']);
});

// ========================
// PORTFOLIO_LOG RESOURCE
// ========================
Route::prefix('portfolio-log')->group(function () {
    use App\Http\Controllers\Api\V1\PortfolioLogController;

    Route::get('/filters', [PortfolioLogController::class, 'filters']);
    Route::get('/suggestions', [PortfolioLogController::class, 'suggestions']);
    Route::post('/advanced-search', [PortfolioLogController::class, 'advancedSearch']);

    Route::get('/import-template', [PortfolioLogController::class, 'importTemplate']);
    Route::post('/import', [PortfolioLogController::class, 'import']);
    Route::get('/export', [PortfolioLogController::class, 'export']);

    Route::post('/bulk-store', [PortfolioLogController::class, 'bulkStore']);
    Route::post('/bulk-update', [PortfolioLogController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PortfolioLogController::class, 'bulkDestroy']);

    Route::get('/trashed', [PortfolioLogController::class, 'trashed']);
    Route::post('/{id}/restore', [PortfolioLogController::class, 'restore']);
    Route::delete('/{id}/force', [PortfolioLogController::class, 'forceDelete']);

    Route::get('/', [PortfolioLogController::class, 'index']);
    Route::post('/', [PortfolioLogController::class, 'store']);
    Route::get('/{id}', [PortfolioLogController::class, 'show']);
    Route::put('/{id}', [PortfolioLogController::class, 'update']);
    Route::delete('/{id}', [PortfolioLogController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PortfolioLogController::class, 'duplicate']);
    Route::get('/{id}/stats', [PortfolioLogController::class, 'stats']);
});

// ========================
// PORTFOLIO_MAHARA_QUEUE RESOURCE
// ========================
Route::prefix('portfolio-mahara-queue')->group(function () {
    use App\Http\Controllers\Api\V1\PortfolioMaharaQueueController;

    Route::get('/filters', [PortfolioMaharaQueueController::class, 'filters']);
    Route::get('/suggestions', [PortfolioMaharaQueueController::class, 'suggestions']);
    Route::post('/advanced-search', [PortfolioMaharaQueueController::class, 'advancedSearch']);

    Route::get('/import-template', [PortfolioMaharaQueueController::class, 'importTemplate']);
    Route::post('/import', [PortfolioMaharaQueueController::class, 'import']);
    Route::get('/export', [PortfolioMaharaQueueController::class, 'export']);

    Route::post('/bulk-store', [PortfolioMaharaQueueController::class, 'bulkStore']);
    Route::post('/bulk-update', [PortfolioMaharaQueueController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PortfolioMaharaQueueController::class, 'bulkDestroy']);

    Route::get('/trashed', [PortfolioMaharaQueueController::class, 'trashed']);
    Route::post('/{id}/restore', [PortfolioMaharaQueueController::class, 'restore']);
    Route::delete('/{id}/force', [PortfolioMaharaQueueController::class, 'forceDelete']);

    Route::get('/', [PortfolioMaharaQueueController::class, 'index']);
    Route::post('/', [PortfolioMaharaQueueController::class, 'store']);
    Route::get('/{id}', [PortfolioMaharaQueueController::class, 'show']);
    Route::put('/{id}', [PortfolioMaharaQueueController::class, 'update']);
    Route::delete('/{id}', [PortfolioMaharaQueueController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PortfolioMaharaQueueController::class, 'duplicate']);
    Route::get('/{id}/stats', [PortfolioMaharaQueueController::class, 'stats']);
});

// ========================
// BADGE_BACKPACK_OAUTH2 RESOURCE
// ========================
Route::prefix('badge-backpack-oauth2')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeBackpackOauth2Controller;

    Route::get('/filters', [BadgeBackpackOauth2Controller::class, 'filters']);
    Route::get('/suggestions', [BadgeBackpackOauth2Controller::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeBackpackOauth2Controller::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeBackpackOauth2Controller::class, 'importTemplate']);
    Route::post('/import', [BadgeBackpackOauth2Controller::class, 'import']);
    Route::get('/export', [BadgeBackpackOauth2Controller::class, 'export']);

    Route::post('/bulk-store', [BadgeBackpackOauth2Controller::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeBackpackOauth2Controller::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeBackpackOauth2Controller::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeBackpackOauth2Controller::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeBackpackOauth2Controller::class, 'restore']);
    Route::delete('/{id}/force', [BadgeBackpackOauth2Controller::class, 'forceDelete']);

    Route::get('/', [BadgeBackpackOauth2Controller::class, 'index']);
    Route::post('/', [BadgeBackpackOauth2Controller::class, 'store']);
    Route::get('/{id}', [BadgeBackpackOauth2Controller::class, 'show']);
    Route::put('/{id}', [BadgeBackpackOauth2Controller::class, 'update']);
    Route::delete('/{id}', [BadgeBackpackOauth2Controller::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeBackpackOauth2Controller::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeBackpackOauth2Controller::class, 'stats']);
});

// ========================
// BADGE_BACKPACK RESOURCE
// ========================
Route::prefix('badge-backpack')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeBackpackController;

    Route::get('/filters', [BadgeBackpackController::class, 'filters']);
    Route::get('/suggestions', [BadgeBackpackController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeBackpackController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeBackpackController::class, 'importTemplate']);
    Route::post('/import', [BadgeBackpackController::class, 'import']);
    Route::get('/export', [BadgeBackpackController::class, 'export']);

    Route::post('/bulk-store', [BadgeBackpackController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeBackpackController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeBackpackController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeBackpackController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeBackpackController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeBackpackController::class, 'forceDelete']);

    Route::get('/', [BadgeBackpackController::class, 'index']);
    Route::post('/', [BadgeBackpackController::class, 'store']);
    Route::get('/{id}', [BadgeBackpackController::class, 'show']);
    Route::put('/{id}', [BadgeBackpackController::class, 'update']);
    Route::delete('/{id}', [BadgeBackpackController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeBackpackController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeBackpackController::class, 'stats']);
});

// ========================
// H5P_CONTENTS_LIBRARIES RESOURCE
// ========================
Route::prefix('h5p-contents-libraries')->group(function () {
    use App\Http\Controllers\Api\V1\H5pContentsLibrariesController;

    Route::get('/filters', [H5pContentsLibrariesController::class, 'filters']);
    Route::get('/suggestions', [H5pContentsLibrariesController::class, 'suggestions']);
    Route::post('/advanced-search', [H5pContentsLibrariesController::class, 'advancedSearch']);

    Route::get('/import-template', [H5pContentsLibrariesController::class, 'importTemplate']);
    Route::post('/import', [H5pContentsLibrariesController::class, 'import']);
    Route::get('/export', [H5pContentsLibrariesController::class, 'export']);

    Route::post('/bulk-store', [H5pContentsLibrariesController::class, 'bulkStore']);
    Route::post('/bulk-update', [H5pContentsLibrariesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [H5pContentsLibrariesController::class, 'bulkDestroy']);

    Route::get('/trashed', [H5pContentsLibrariesController::class, 'trashed']);
    Route::post('/{id}/restore', [H5pContentsLibrariesController::class, 'restore']);
    Route::delete('/{id}/force', [H5pContentsLibrariesController::class, 'forceDelete']);

    Route::get('/', [H5pContentsLibrariesController::class, 'index']);
    Route::post('/', [H5pContentsLibrariesController::class, 'store']);
    Route::get('/{id}', [H5pContentsLibrariesController::class, 'show']);
    Route::put('/{id}', [H5pContentsLibrariesController::class, 'update']);
    Route::delete('/{id}', [H5pContentsLibrariesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [H5pContentsLibrariesController::class, 'duplicate']);
    Route::get('/{id}/stats', [H5pContentsLibrariesController::class, 'stats']);
});

// ========================
// ASSIGNSUBMISSION_ONLINETEXT RESOURCE
// ========================
Route::prefix('assignsubmission-onlinetext')->group(function () {
    use App\Http\Controllers\Api\V1\AssignsubmissionOnlinetextController;

    Route::get('/filters', [AssignsubmissionOnlinetextController::class, 'filters']);
    Route::get('/suggestions', [AssignsubmissionOnlinetextController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignsubmissionOnlinetextController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignsubmissionOnlinetextController::class, 'importTemplate']);
    Route::post('/import', [AssignsubmissionOnlinetextController::class, 'import']);
    Route::get('/export', [AssignsubmissionOnlinetextController::class, 'export']);

    Route::post('/bulk-store', [AssignsubmissionOnlinetextController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignsubmissionOnlinetextController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignsubmissionOnlinetextController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignsubmissionOnlinetextController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignsubmissionOnlinetextController::class, 'restore']);
    Route::delete('/{id}/force', [AssignsubmissionOnlinetextController::class, 'forceDelete']);

    Route::get('/', [AssignsubmissionOnlinetextController::class, 'index']);
    Route::post('/', [AssignsubmissionOnlinetextController::class, 'store']);
    Route::get('/{id}', [AssignsubmissionOnlinetextController::class, 'show']);
    Route::put('/{id}', [AssignsubmissionOnlinetextController::class, 'update']);
    Route::delete('/{id}', [AssignsubmissionOnlinetextController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignsubmissionOnlinetextController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignsubmissionOnlinetextController::class, 'stats']);
});

// ========================
// ASSIGNSUBMISSION_FILE RESOURCE
// ========================
Route::prefix('assignsubmission-file')->group(function () {
    use App\Http\Controllers\Api\V1\AssignsubmissionFileController;

    Route::get('/filters', [AssignsubmissionFileController::class, 'filters']);
    Route::get('/suggestions', [AssignsubmissionFileController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignsubmissionFileController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignsubmissionFileController::class, 'importTemplate']);
    Route::post('/import', [AssignsubmissionFileController::class, 'import']);
    Route::get('/export', [AssignsubmissionFileController::class, 'export']);

    Route::post('/bulk-store', [AssignsubmissionFileController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignsubmissionFileController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignsubmissionFileController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignsubmissionFileController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignsubmissionFileController::class, 'restore']);
    Route::delete('/{id}/force', [AssignsubmissionFileController::class, 'forceDelete']);

    Route::get('/', [AssignsubmissionFileController::class, 'index']);
    Route::post('/', [AssignsubmissionFileController::class, 'store']);
    Route::get('/{id}', [AssignsubmissionFileController::class, 'show']);
    Route::put('/{id}', [AssignsubmissionFileController::class, 'update']);
    Route::delete('/{id}', [AssignsubmissionFileController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignsubmissionFileController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignsubmissionFileController::class, 'stats']);
});

// ========================
// ASSIGNFEEDBACK_EDITPDF_ANNOT RESOURCE
// ========================
Route::prefix('assignfeedback-editpdf-annot')->group(function () {
    use App\Http\Controllers\Api\V1\AssignfeedbackEditpdfAnnotController;

    Route::get('/filters', [AssignfeedbackEditpdfAnnotController::class, 'filters']);
    Route::get('/suggestions', [AssignfeedbackEditpdfAnnotController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignfeedbackEditpdfAnnotController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignfeedbackEditpdfAnnotController::class, 'importTemplate']);
    Route::post('/import', [AssignfeedbackEditpdfAnnotController::class, 'import']);
    Route::get('/export', [AssignfeedbackEditpdfAnnotController::class, 'export']);

    Route::post('/bulk-store', [AssignfeedbackEditpdfAnnotController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignfeedbackEditpdfAnnotController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignfeedbackEditpdfAnnotController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignfeedbackEditpdfAnnotController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignfeedbackEditpdfAnnotController::class, 'restore']);
    Route::delete('/{id}/force', [AssignfeedbackEditpdfAnnotController::class, 'forceDelete']);

    Route::get('/', [AssignfeedbackEditpdfAnnotController::class, 'index']);
    Route::post('/', [AssignfeedbackEditpdfAnnotController::class, 'store']);
    Route::get('/{id}', [AssignfeedbackEditpdfAnnotController::class, 'show']);
    Route::put('/{id}', [AssignfeedbackEditpdfAnnotController::class, 'update']);
    Route::delete('/{id}', [AssignfeedbackEditpdfAnnotController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignfeedbackEditpdfAnnotController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignfeedbackEditpdfAnnotController::class, 'stats']);
});

// ========================
// ASSIGNFEEDBACK_EDITPDF_CMNT RESOURCE
// ========================
Route::prefix('assignfeedback-editpdf-cmnt')->group(function () {
    use App\Http\Controllers\Api\V1\AssignfeedbackEditpdfCmntController;

    Route::get('/filters', [AssignfeedbackEditpdfCmntController::class, 'filters']);
    Route::get('/suggestions', [AssignfeedbackEditpdfCmntController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignfeedbackEditpdfCmntController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignfeedbackEditpdfCmntController::class, 'importTemplate']);
    Route::post('/import', [AssignfeedbackEditpdfCmntController::class, 'import']);
    Route::get('/export', [AssignfeedbackEditpdfCmntController::class, 'export']);

    Route::post('/bulk-store', [AssignfeedbackEditpdfCmntController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignfeedbackEditpdfCmntController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignfeedbackEditpdfCmntController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignfeedbackEditpdfCmntController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignfeedbackEditpdfCmntController::class, 'restore']);
    Route::delete('/{id}/force', [AssignfeedbackEditpdfCmntController::class, 'forceDelete']);

    Route::get('/', [AssignfeedbackEditpdfCmntController::class, 'index']);
    Route::post('/', [AssignfeedbackEditpdfCmntController::class, 'store']);
    Route::get('/{id}', [AssignfeedbackEditpdfCmntController::class, 'show']);
    Route::put('/{id}', [AssignfeedbackEditpdfCmntController::class, 'update']);
    Route::delete('/{id}', [AssignfeedbackEditpdfCmntController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignfeedbackEditpdfCmntController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignfeedbackEditpdfCmntController::class, 'stats']);
});

// ========================
// ASSIGNFEEDBACK_COMMENTS RESOURCE
// ========================
Route::prefix('assignfeedback-comments')->group(function () {
    use App\Http\Controllers\Api\V1\AssignfeedbackCommentsController;

    Route::get('/filters', [AssignfeedbackCommentsController::class, 'filters']);
    Route::get('/suggestions', [AssignfeedbackCommentsController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignfeedbackCommentsController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignfeedbackCommentsController::class, 'importTemplate']);
    Route::post('/import', [AssignfeedbackCommentsController::class, 'import']);
    Route::get('/export', [AssignfeedbackCommentsController::class, 'export']);

    Route::post('/bulk-store', [AssignfeedbackCommentsController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignfeedbackCommentsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignfeedbackCommentsController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignfeedbackCommentsController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignfeedbackCommentsController::class, 'restore']);
    Route::delete('/{id}/force', [AssignfeedbackCommentsController::class, 'forceDelete']);

    Route::get('/', [AssignfeedbackCommentsController::class, 'index']);
    Route::post('/', [AssignfeedbackCommentsController::class, 'store']);
    Route::get('/{id}', [AssignfeedbackCommentsController::class, 'show']);
    Route::put('/{id}', [AssignfeedbackCommentsController::class, 'update']);
    Route::delete('/{id}', [AssignfeedbackCommentsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignfeedbackCommentsController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignfeedbackCommentsController::class, 'stats']);
});

// ========================
// ASSIGNFEEDBACK_FILE RESOURCE
// ========================
Route::prefix('assignfeedback-file')->group(function () {
    use App\Http\Controllers\Api\V1\AssignfeedbackFileController;

    Route::get('/filters', [AssignfeedbackFileController::class, 'filters']);
    Route::get('/suggestions', [AssignfeedbackFileController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignfeedbackFileController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignfeedbackFileController::class, 'importTemplate']);
    Route::post('/import', [AssignfeedbackFileController::class, 'import']);
    Route::get('/export', [AssignfeedbackFileController::class, 'export']);

    Route::post('/bulk-store', [AssignfeedbackFileController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignfeedbackFileController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignfeedbackFileController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignfeedbackFileController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignfeedbackFileController::class, 'restore']);
    Route::delete('/{id}/force', [AssignfeedbackFileController::class, 'forceDelete']);

    Route::get('/', [AssignfeedbackFileController::class, 'index']);
    Route::post('/', [AssignfeedbackFileController::class, 'store']);
    Route::get('/{id}', [AssignfeedbackFileController::class, 'show']);
    Route::put('/{id}', [AssignfeedbackFileController::class, 'update']);
    Route::delete('/{id}', [AssignfeedbackFileController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignfeedbackFileController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignfeedbackFileController::class, 'stats']);
});

// ========================
// ASSIGNFEEDBACK_EDITPDF_ROT RESOURCE
// ========================
Route::prefix('assignfeedback-editpdf-rot')->group(function () {
    use App\Http\Controllers\Api\V1\AssignfeedbackEditpdfRotController;

    Route::get('/filters', [AssignfeedbackEditpdfRotController::class, 'filters']);
    Route::get('/suggestions', [AssignfeedbackEditpdfRotController::class, 'suggestions']);
    Route::post('/advanced-search', [AssignfeedbackEditpdfRotController::class, 'advancedSearch']);

    Route::get('/import-template', [AssignfeedbackEditpdfRotController::class, 'importTemplate']);
    Route::post('/import', [AssignfeedbackEditpdfRotController::class, 'import']);
    Route::get('/export', [AssignfeedbackEditpdfRotController::class, 'export']);

    Route::post('/bulk-store', [AssignfeedbackEditpdfRotController::class, 'bulkStore']);
    Route::post('/bulk-update', [AssignfeedbackEditpdfRotController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AssignfeedbackEditpdfRotController::class, 'bulkDestroy']);

    Route::get('/trashed', [AssignfeedbackEditpdfRotController::class, 'trashed']);
    Route::post('/{id}/restore', [AssignfeedbackEditpdfRotController::class, 'restore']);
    Route::delete('/{id}/force', [AssignfeedbackEditpdfRotController::class, 'forceDelete']);

    Route::get('/', [AssignfeedbackEditpdfRotController::class, 'index']);
    Route::post('/', [AssignfeedbackEditpdfRotController::class, 'store']);
    Route::get('/{id}', [AssignfeedbackEditpdfRotController::class, 'show']);
    Route::put('/{id}', [AssignfeedbackEditpdfRotController::class, 'update']);
    Route::delete('/{id}', [AssignfeedbackEditpdfRotController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AssignfeedbackEditpdfRotController::class, 'duplicate']);
    Route::get('/{id}/stats', [AssignfeedbackEditpdfRotController::class, 'stats']);
});

// ========================
// CHOICE_ANSWERS RESOURCE
// ========================
Route::prefix('choice-answers')->group(function () {
    use App\Http\Controllers\Api\V1\ChoiceAnswersController;

    Route::get('/filters', [ChoiceAnswersController::class, 'filters']);
    Route::get('/suggestions', [ChoiceAnswersController::class, 'suggestions']);
    Route::post('/advanced-search', [ChoiceAnswersController::class, 'advancedSearch']);

    Route::get('/import-template', [ChoiceAnswersController::class, 'importTemplate']);
    Route::post('/import', [ChoiceAnswersController::class, 'import']);
    Route::get('/export', [ChoiceAnswersController::class, 'export']);

    Route::post('/bulk-store', [ChoiceAnswersController::class, 'bulkStore']);
    Route::post('/bulk-update', [ChoiceAnswersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ChoiceAnswersController::class, 'bulkDestroy']);

    Route::get('/trashed', [ChoiceAnswersController::class, 'trashed']);
    Route::post('/{id}/restore', [ChoiceAnswersController::class, 'restore']);
    Route::delete('/{id}/force', [ChoiceAnswersController::class, 'forceDelete']);

    Route::get('/', [ChoiceAnswersController::class, 'index']);
    Route::post('/', [ChoiceAnswersController::class, 'store']);
    Route::get('/{id}', [ChoiceAnswersController::class, 'show']);
    Route::put('/{id}', [ChoiceAnswersController::class, 'update']);
    Route::delete('/{id}', [ChoiceAnswersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ChoiceAnswersController::class, 'duplicate']);
    Route::get('/{id}/stats', [ChoiceAnswersController::class, 'stats']);
});

// ========================
// DATA_CONTENT RESOURCE
// ========================
Route::prefix('data-content')->group(function () {
    use App\Http\Controllers\Api\V1\DataContentController;

    Route::get('/filters', [DataContentController::class, 'filters']);
    Route::get('/suggestions', [DataContentController::class, 'suggestions']);
    Route::post('/advanced-search', [DataContentController::class, 'advancedSearch']);

    Route::get('/import-template', [DataContentController::class, 'importTemplate']);
    Route::post('/import', [DataContentController::class, 'import']);
    Route::get('/export', [DataContentController::class, 'export']);

    Route::post('/bulk-store', [DataContentController::class, 'bulkStore']);
    Route::post('/bulk-update', [DataContentController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [DataContentController::class, 'bulkDestroy']);

    Route::get('/trashed', [DataContentController::class, 'trashed']);
    Route::post('/{id}/restore', [DataContentController::class, 'restore']);
    Route::delete('/{id}/force', [DataContentController::class, 'forceDelete']);

    Route::get('/', [DataContentController::class, 'index']);
    Route::post('/', [DataContentController::class, 'store']);
    Route::get('/{id}', [DataContentController::class, 'show']);
    Route::put('/{id}', [DataContentController::class, 'update']);
    Route::delete('/{id}', [DataContentController::class, 'destroy']);

    Route::post('/{id}/duplicate', [DataContentController::class, 'duplicate']);
    Route::get('/{id}/stats', [DataContentController::class, 'stats']);
});

// ========================
// FEEDBACK_VALUE RESOURCE
// ========================
Route::prefix('feedback-value')->group(function () {
    use App\Http\Controllers\Api\V1\FeedbackValueController;

    Route::get('/filters', [FeedbackValueController::class, 'filters']);
    Route::get('/suggestions', [FeedbackValueController::class, 'suggestions']);
    Route::post('/advanced-search', [FeedbackValueController::class, 'advancedSearch']);

    Route::get('/import-template', [FeedbackValueController::class, 'importTemplate']);
    Route::post('/import', [FeedbackValueController::class, 'import']);
    Route::get('/export', [FeedbackValueController::class, 'export']);

    Route::post('/bulk-store', [FeedbackValueController::class, 'bulkStore']);
    Route::post('/bulk-update', [FeedbackValueController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FeedbackValueController::class, 'bulkDestroy']);

    Route::get('/trashed', [FeedbackValueController::class, 'trashed']);
    Route::post('/{id}/restore', [FeedbackValueController::class, 'restore']);
    Route::delete('/{id}/force', [FeedbackValueController::class, 'forceDelete']);

    Route::get('/', [FeedbackValueController::class, 'index']);
    Route::post('/', [FeedbackValueController::class, 'store']);
    Route::get('/{id}', [FeedbackValueController::class, 'show']);
    Route::put('/{id}', [FeedbackValueController::class, 'update']);
    Route::delete('/{id}', [FeedbackValueController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FeedbackValueController::class, 'duplicate']);
    Route::get('/{id}/stats', [FeedbackValueController::class, 'stats']);
});

// ========================
// FEEDBACK_VALUETMP RESOURCE
// ========================
Route::prefix('feedback-valuetmp')->group(function () {
    use App\Http\Controllers\Api\V1\FeedbackValuetmpController;

    Route::get('/filters', [FeedbackValuetmpController::class, 'filters']);
    Route::get('/suggestions', [FeedbackValuetmpController::class, 'suggestions']);
    Route::post('/advanced-search', [FeedbackValuetmpController::class, 'advancedSearch']);

    Route::get('/import-template', [FeedbackValuetmpController::class, 'importTemplate']);
    Route::post('/import', [FeedbackValuetmpController::class, 'import']);
    Route::get('/export', [FeedbackValuetmpController::class, 'export']);

    Route::post('/bulk-store', [FeedbackValuetmpController::class, 'bulkStore']);
    Route::post('/bulk-update', [FeedbackValuetmpController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FeedbackValuetmpController::class, 'bulkDestroy']);

    Route::get('/trashed', [FeedbackValuetmpController::class, 'trashed']);
    Route::post('/{id}/restore', [FeedbackValuetmpController::class, 'restore']);
    Route::delete('/{id}/force', [FeedbackValuetmpController::class, 'forceDelete']);

    Route::get('/', [FeedbackValuetmpController::class, 'index']);
    Route::post('/', [FeedbackValuetmpController::class, 'store']);
    Route::get('/{id}', [FeedbackValuetmpController::class, 'show']);
    Route::put('/{id}', [FeedbackValuetmpController::class, 'update']);
    Route::delete('/{id}', [FeedbackValuetmpController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FeedbackValuetmpController::class, 'duplicate']);
    Route::get('/{id}/stats', [FeedbackValuetmpController::class, 'stats']);
});

// ========================
// FORUM_POSTS RESOURCE
// ========================
Route::prefix('forum-posts')->group(function () {
    use App\Http\Controllers\Api\V1\ForumPostsController;

    Route::get('/filters', [ForumPostsController::class, 'filters']);
    Route::get('/suggestions', [ForumPostsController::class, 'suggestions']);
    Route::post('/advanced-search', [ForumPostsController::class, 'advancedSearch']);

    Route::get('/import-template', [ForumPostsController::class, 'importTemplate']);
    Route::post('/import', [ForumPostsController::class, 'import']);
    Route::get('/export', [ForumPostsController::class, 'export']);

    Route::post('/bulk-store', [ForumPostsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ForumPostsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ForumPostsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ForumPostsController::class, 'trashed']);
    Route::post('/{id}/restore', [ForumPostsController::class, 'restore']);
    Route::delete('/{id}/force', [ForumPostsController::class, 'forceDelete']);

    Route::get('/', [ForumPostsController::class, 'index']);
    Route::post('/', [ForumPostsController::class, 'store']);
    Route::get('/{id}', [ForumPostsController::class, 'show']);
    Route::put('/{id}', [ForumPostsController::class, 'update']);
    Route::delete('/{id}', [ForumPostsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ForumPostsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ForumPostsController::class, 'stats']);
});

// ========================
// FORUM_DISCUSSION_SUBS RESOURCE
// ========================
Route::prefix('forum-discussion-subs')->group(function () {
    use App\Http\Controllers\Api\V1\ForumDiscussionSubsController;

    Route::get('/filters', [ForumDiscussionSubsController::class, 'filters']);
    Route::get('/suggestions', [ForumDiscussionSubsController::class, 'suggestions']);
    Route::post('/advanced-search', [ForumDiscussionSubsController::class, 'advancedSearch']);

    Route::get('/import-template', [ForumDiscussionSubsController::class, 'importTemplate']);
    Route::post('/import', [ForumDiscussionSubsController::class, 'import']);
    Route::get('/export', [ForumDiscussionSubsController::class, 'export']);

    Route::post('/bulk-store', [ForumDiscussionSubsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ForumDiscussionSubsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ForumDiscussionSubsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ForumDiscussionSubsController::class, 'trashed']);
    Route::post('/{id}/restore', [ForumDiscussionSubsController::class, 'restore']);
    Route::delete('/{id}/force', [ForumDiscussionSubsController::class, 'forceDelete']);

    Route::get('/', [ForumDiscussionSubsController::class, 'index']);
    Route::post('/', [ForumDiscussionSubsController::class, 'store']);
    Route::get('/{id}', [ForumDiscussionSubsController::class, 'show']);
    Route::put('/{id}', [ForumDiscussionSubsController::class, 'update']);
    Route::delete('/{id}', [ForumDiscussionSubsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ForumDiscussionSubsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ForumDiscussionSubsController::class, 'stats']);
});

// ========================
// GLOSSARY_ALIAS RESOURCE
// ========================
Route::prefix('glossary-alias')->group(function () {
    use App\Http\Controllers\Api\V1\GlossaryAliasController;

    Route::get('/filters', [GlossaryAliasController::class, 'filters']);
    Route::get('/suggestions', [GlossaryAliasController::class, 'suggestions']);
    Route::post('/advanced-search', [GlossaryAliasController::class, 'advancedSearch']);

    Route::get('/import-template', [GlossaryAliasController::class, 'importTemplate']);
    Route::post('/import', [GlossaryAliasController::class, 'import']);
    Route::get('/export', [GlossaryAliasController::class, 'export']);

    Route::post('/bulk-store', [GlossaryAliasController::class, 'bulkStore']);
    Route::post('/bulk-update', [GlossaryAliasController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GlossaryAliasController::class, 'bulkDestroy']);

    Route::get('/trashed', [GlossaryAliasController::class, 'trashed']);
    Route::post('/{id}/restore', [GlossaryAliasController::class, 'restore']);
    Route::delete('/{id}/force', [GlossaryAliasController::class, 'forceDelete']);

    Route::get('/', [GlossaryAliasController::class, 'index']);
    Route::post('/', [GlossaryAliasController::class, 'store']);
    Route::get('/{id}', [GlossaryAliasController::class, 'show']);
    Route::put('/{id}', [GlossaryAliasController::class, 'update']);
    Route::delete('/{id}', [GlossaryAliasController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GlossaryAliasController::class, 'duplicate']);
    Route::get('/{id}/stats', [GlossaryAliasController::class, 'stats']);
});

// ========================
// GLOSSARY_ENTRIES_CATEGORIES RESOURCE
// ========================
Route::prefix('glossary-entries-categories')->group(function () {
    use App\Http\Controllers\Api\V1\GlossaryEntriesCategoriesController;

    Route::get('/filters', [GlossaryEntriesCategoriesController::class, 'filters']);
    Route::get('/suggestions', [GlossaryEntriesCategoriesController::class, 'suggestions']);
    Route::post('/advanced-search', [GlossaryEntriesCategoriesController::class, 'advancedSearch']);

    Route::get('/import-template', [GlossaryEntriesCategoriesController::class, 'importTemplate']);
    Route::post('/import', [GlossaryEntriesCategoriesController::class, 'import']);
    Route::get('/export', [GlossaryEntriesCategoriesController::class, 'export']);

    Route::post('/bulk-store', [GlossaryEntriesCategoriesController::class, 'bulkStore']);
    Route::post('/bulk-update', [GlossaryEntriesCategoriesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GlossaryEntriesCategoriesController::class, 'bulkDestroy']);

    Route::get('/trashed', [GlossaryEntriesCategoriesController::class, 'trashed']);
    Route::post('/{id}/restore', [GlossaryEntriesCategoriesController::class, 'restore']);
    Route::delete('/{id}/force', [GlossaryEntriesCategoriesController::class, 'forceDelete']);

    Route::get('/', [GlossaryEntriesCategoriesController::class, 'index']);
    Route::post('/', [GlossaryEntriesCategoriesController::class, 'store']);
    Route::get('/{id}', [GlossaryEntriesCategoriesController::class, 'show']);
    Route::put('/{id}', [GlossaryEntriesCategoriesController::class, 'update']);
    Route::delete('/{id}', [GlossaryEntriesCategoriesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GlossaryEntriesCategoriesController::class, 'duplicate']);
    Route::get('/{id}/stats', [GlossaryEntriesCategoriesController::class, 'stats']);
});

// ========================
// LESSON_BRANCH RESOURCE
// ========================
Route::prefix('lesson-branch')->group(function () {
    use App\Http\Controllers\Api\V1\LessonBranchController;

    Route::get('/filters', [LessonBranchController::class, 'filters']);
    Route::get('/suggestions', [LessonBranchController::class, 'suggestions']);
    Route::post('/advanced-search', [LessonBranchController::class, 'advancedSearch']);

    Route::get('/import-template', [LessonBranchController::class, 'importTemplate']);
    Route::post('/import', [LessonBranchController::class, 'import']);
    Route::get('/export', [LessonBranchController::class, 'export']);

    Route::post('/bulk-store', [LessonBranchController::class, 'bulkStore']);
    Route::post('/bulk-update', [LessonBranchController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LessonBranchController::class, 'bulkDestroy']);

    Route::get('/trashed', [LessonBranchController::class, 'trashed']);
    Route::post('/{id}/restore', [LessonBranchController::class, 'restore']);
    Route::delete('/{id}/force', [LessonBranchController::class, 'forceDelete']);

    Route::get('/', [LessonBranchController::class, 'index']);
    Route::post('/', [LessonBranchController::class, 'store']);
    Route::get('/{id}', [LessonBranchController::class, 'show']);
    Route::put('/{id}', [LessonBranchController::class, 'update']);
    Route::delete('/{id}', [LessonBranchController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LessonBranchController::class, 'duplicate']);
    Route::get('/{id}/stats', [LessonBranchController::class, 'stats']);
});

// ========================
// LESSON_ANSWERS RESOURCE
// ========================
Route::prefix('lesson-answers')->group(function () {
    use App\Http\Controllers\Api\V1\LessonAnswersController;

    Route::get('/filters', [LessonAnswersController::class, 'filters']);
    Route::get('/suggestions', [LessonAnswersController::class, 'suggestions']);
    Route::post('/advanced-search', [LessonAnswersController::class, 'advancedSearch']);

    Route::get('/import-template', [LessonAnswersController::class, 'importTemplate']);
    Route::post('/import', [LessonAnswersController::class, 'import']);
    Route::get('/export', [LessonAnswersController::class, 'export']);

    Route::post('/bulk-store', [LessonAnswersController::class, 'bulkStore']);
    Route::post('/bulk-update', [LessonAnswersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LessonAnswersController::class, 'bulkDestroy']);

    Route::get('/trashed', [LessonAnswersController::class, 'trashed']);
    Route::post('/{id}/restore', [LessonAnswersController::class, 'restore']);
    Route::delete('/{id}/force', [LessonAnswersController::class, 'forceDelete']);

    Route::get('/', [LessonAnswersController::class, 'index']);
    Route::post('/', [LessonAnswersController::class, 'store']);
    Route::get('/{id}', [LessonAnswersController::class, 'show']);
    Route::put('/{id}', [LessonAnswersController::class, 'update']);
    Route::delete('/{id}', [LessonAnswersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LessonAnswersController::class, 'duplicate']);
    Route::get('/{id}/stats', [LessonAnswersController::class, 'stats']);
});

// ========================
// SCORM_SCOES_DATA RESOURCE
// ========================
Route::prefix('scorm-scoes-data')->group(function () {
    use App\Http\Controllers\Api\V1\ScormScoesDataController;

    Route::get('/filters', [ScormScoesDataController::class, 'filters']);
    Route::get('/suggestions', [ScormScoesDataController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormScoesDataController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormScoesDataController::class, 'importTemplate']);
    Route::post('/import', [ScormScoesDataController::class, 'import']);
    Route::get('/export', [ScormScoesDataController::class, 'export']);

    Route::post('/bulk-store', [ScormScoesDataController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormScoesDataController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormScoesDataController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormScoesDataController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormScoesDataController::class, 'restore']);
    Route::delete('/{id}/force', [ScormScoesDataController::class, 'forceDelete']);

    Route::get('/', [ScormScoesDataController::class, 'index']);
    Route::post('/', [ScormScoesDataController::class, 'store']);
    Route::get('/{id}', [ScormScoesDataController::class, 'show']);
    Route::put('/{id}', [ScormScoesDataController::class, 'update']);
    Route::delete('/{id}', [ScormScoesDataController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormScoesDataController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormScoesDataController::class, 'stats']);
});

// ========================
// SCORM_SEQ_OBJECTIVE RESOURCE
// ========================
Route::prefix('scorm-seq-objective')->group(function () {
    use App\Http\Controllers\Api\V1\ScormSeqObjectiveController;

    Route::get('/filters', [ScormSeqObjectiveController::class, 'filters']);
    Route::get('/suggestions', [ScormSeqObjectiveController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormSeqObjectiveController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormSeqObjectiveController::class, 'importTemplate']);
    Route::post('/import', [ScormSeqObjectiveController::class, 'import']);
    Route::get('/export', [ScormSeqObjectiveController::class, 'export']);

    Route::post('/bulk-store', [ScormSeqObjectiveController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormSeqObjectiveController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormSeqObjectiveController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormSeqObjectiveController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormSeqObjectiveController::class, 'restore']);
    Route::delete('/{id}/force', [ScormSeqObjectiveController::class, 'forceDelete']);

    Route::get('/', [ScormSeqObjectiveController::class, 'index']);
    Route::post('/', [ScormSeqObjectiveController::class, 'store']);
    Route::get('/{id}', [ScormSeqObjectiveController::class, 'show']);
    Route::put('/{id}', [ScormSeqObjectiveController::class, 'update']);
    Route::delete('/{id}', [ScormSeqObjectiveController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormSeqObjectiveController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormSeqObjectiveController::class, 'stats']);
});

// ========================
// SCORM_SEQ_ROLLUPRULE RESOURCE
// ========================
Route::prefix('scorm-seq-rolluprule')->group(function () {
    use App\Http\Controllers\Api\V1\ScormSeqRollupruleController;

    Route::get('/filters', [ScormSeqRollupruleController::class, 'filters']);
    Route::get('/suggestions', [ScormSeqRollupruleController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormSeqRollupruleController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormSeqRollupruleController::class, 'importTemplate']);
    Route::post('/import', [ScormSeqRollupruleController::class, 'import']);
    Route::get('/export', [ScormSeqRollupruleController::class, 'export']);

    Route::post('/bulk-store', [ScormSeqRollupruleController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormSeqRollupruleController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormSeqRollupruleController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormSeqRollupruleController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormSeqRollupruleController::class, 'restore']);
    Route::delete('/{id}/force', [ScormSeqRollupruleController::class, 'forceDelete']);

    Route::get('/', [ScormSeqRollupruleController::class, 'index']);
    Route::post('/', [ScormSeqRollupruleController::class, 'store']);
    Route::get('/{id}', [ScormSeqRollupruleController::class, 'show']);
    Route::put('/{id}', [ScormSeqRollupruleController::class, 'update']);
    Route::delete('/{id}', [ScormSeqRollupruleController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormSeqRollupruleController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormSeqRollupruleController::class, 'stats']);
});

// ========================
// SCORM_SEQ_RULECONDS RESOURCE
// ========================
Route::prefix('scorm-seq-ruleconds')->group(function () {
    use App\Http\Controllers\Api\V1\ScormSeqRulecondsController;

    Route::get('/filters', [ScormSeqRulecondsController::class, 'filters']);
    Route::get('/suggestions', [ScormSeqRulecondsController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormSeqRulecondsController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormSeqRulecondsController::class, 'importTemplate']);
    Route::post('/import', [ScormSeqRulecondsController::class, 'import']);
    Route::get('/export', [ScormSeqRulecondsController::class, 'export']);

    Route::post('/bulk-store', [ScormSeqRulecondsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormSeqRulecondsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormSeqRulecondsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormSeqRulecondsController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormSeqRulecondsController::class, 'restore']);
    Route::delete('/{id}/force', [ScormSeqRulecondsController::class, 'forceDelete']);

    Route::get('/', [ScormSeqRulecondsController::class, 'index']);
    Route::post('/', [ScormSeqRulecondsController::class, 'store']);
    Route::get('/{id}', [ScormSeqRulecondsController::class, 'show']);
    Route::put('/{id}', [ScormSeqRulecondsController::class, 'update']);
    Route::delete('/{id}', [ScormSeqRulecondsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormSeqRulecondsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormSeqRulecondsController::class, 'stats']);
});

// ========================
// SCORM_SCOES_VALUE RESOURCE
// ========================
Route::prefix('scorm-scoes-value')->group(function () {
    use App\Http\Controllers\Api\V1\ScormScoesValueController;

    Route::get('/filters', [ScormScoesValueController::class, 'filters']);
    Route::get('/suggestions', [ScormScoesValueController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormScoesValueController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormScoesValueController::class, 'importTemplate']);
    Route::post('/import', [ScormScoesValueController::class, 'import']);
    Route::get('/export', [ScormScoesValueController::class, 'export']);

    Route::post('/bulk-store', [ScormScoesValueController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormScoesValueController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormScoesValueController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormScoesValueController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormScoesValueController::class, 'restore']);
    Route::delete('/{id}/force', [ScormScoesValueController::class, 'forceDelete']);

    Route::get('/', [ScormScoesValueController::class, 'index']);
    Route::post('/', [ScormScoesValueController::class, 'store']);
    Route::get('/{id}', [ScormScoesValueController::class, 'show']);
    Route::put('/{id}', [ScormScoesValueController::class, 'update']);
    Route::delete('/{id}', [ScormScoesValueController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormScoesValueController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormScoesValueController::class, 'stats']);
});

// ========================
// WIKI_PAGES RESOURCE
// ========================
Route::prefix('wiki-pages')->group(function () {
    use App\Http\Controllers\Api\V1\WikiPagesController;

    Route::get('/filters', [WikiPagesController::class, 'filters']);
    Route::get('/suggestions', [WikiPagesController::class, 'suggestions']);
    Route::post('/advanced-search', [WikiPagesController::class, 'advancedSearch']);

    Route::get('/import-template', [WikiPagesController::class, 'importTemplate']);
    Route::post('/import', [WikiPagesController::class, 'import']);
    Route::get('/export', [WikiPagesController::class, 'export']);

    Route::post('/bulk-store', [WikiPagesController::class, 'bulkStore']);
    Route::post('/bulk-update', [WikiPagesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WikiPagesController::class, 'bulkDestroy']);

    Route::get('/trashed', [WikiPagesController::class, 'trashed']);
    Route::post('/{id}/restore', [WikiPagesController::class, 'restore']);
    Route::delete('/{id}/force', [WikiPagesController::class, 'forceDelete']);

    Route::get('/', [WikiPagesController::class, 'index']);
    Route::post('/', [WikiPagesController::class, 'store']);
    Route::get('/{id}', [WikiPagesController::class, 'show']);
    Route::put('/{id}', [WikiPagesController::class, 'update']);
    Route::delete('/{id}', [WikiPagesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WikiPagesController::class, 'duplicate']);
    Route::get('/{id}/stats', [WikiPagesController::class, 'stats']);
});

// ========================
// ENROL_LTI_LTI2_USER_RESULT RESOURCE
// ========================
Route::prefix('enrol-lti-lti2-user-result')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiLti2UserResultController;

    Route::get('/filters', [EnrolLtiLti2UserResultController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiLti2UserResultController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiLti2UserResultController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiLti2UserResultController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiLti2UserResultController::class, 'import']);
    Route::get('/export', [EnrolLtiLti2UserResultController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiLti2UserResultController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiLti2UserResultController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiLti2UserResultController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiLti2UserResultController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiLti2UserResultController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiLti2UserResultController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiLti2UserResultController::class, 'index']);
    Route::post('/', [EnrolLtiLti2UserResultController::class, 'store']);
    Route::get('/{id}', [EnrolLtiLti2UserResultController::class, 'show']);
    Route::put('/{id}', [EnrolLtiLti2UserResultController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiLti2UserResultController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiLti2UserResultController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiLti2UserResultController::class, 'stats']);
});

// ========================
// ENROL_LTI_RESOURCE_LINK RESOURCE
// ========================
Route::prefix('enrol-lti-resource-link')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiResourceLinkController;

    Route::get('/filters', [EnrolLtiResourceLinkController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiResourceLinkController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiResourceLinkController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiResourceLinkController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiResourceLinkController::class, 'import']);
    Route::get('/export', [EnrolLtiResourceLinkController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiResourceLinkController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiResourceLinkController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiResourceLinkController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiResourceLinkController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiResourceLinkController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiResourceLinkController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiResourceLinkController::class, 'index']);
    Route::post('/', [EnrolLtiResourceLinkController::class, 'store']);
    Route::get('/{id}', [EnrolLtiResourceLinkController::class, 'show']);
    Route::put('/{id}', [EnrolLtiResourceLinkController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiResourceLinkController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiResourceLinkController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiResourceLinkController::class, 'stats']);
});

// ========================
// WORKSHOP_ASSESSMENTS RESOURCE
// ========================
Route::prefix('workshop-assessments')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopAssessmentsController;

    Route::get('/filters', [WorkshopAssessmentsController::class, 'filters']);
    Route::get('/suggestions', [WorkshopAssessmentsController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopAssessmentsController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopAssessmentsController::class, 'importTemplate']);
    Route::post('/import', [WorkshopAssessmentsController::class, 'import']);
    Route::get('/export', [WorkshopAssessmentsController::class, 'export']);

    Route::post('/bulk-store', [WorkshopAssessmentsController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopAssessmentsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopAssessmentsController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopAssessmentsController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopAssessmentsController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopAssessmentsController::class, 'forceDelete']);

    Route::get('/', [WorkshopAssessmentsController::class, 'index']);
    Route::post('/', [WorkshopAssessmentsController::class, 'store']);
    Route::get('/{id}', [WorkshopAssessmentsController::class, 'show']);
    Route::put('/{id}', [WorkshopAssessmentsController::class, 'update']);
    Route::delete('/{id}', [WorkshopAssessmentsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopAssessmentsController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopAssessmentsController::class, 'stats']);
});

// ========================
// WORKSHOPFORM_RUBRIC_LEVELS RESOURCE
// ========================
Route::prefix('workshopform-rubric-levels')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopformRubricLevelsController;

    Route::get('/filters', [WorkshopformRubricLevelsController::class, 'filters']);
    Route::get('/suggestions', [WorkshopformRubricLevelsController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopformRubricLevelsController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopformRubricLevelsController::class, 'importTemplate']);
    Route::post('/import', [WorkshopformRubricLevelsController::class, 'import']);
    Route::get('/export', [WorkshopformRubricLevelsController::class, 'export']);

    Route::post('/bulk-store', [WorkshopformRubricLevelsController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopformRubricLevelsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopformRubricLevelsController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopformRubricLevelsController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopformRubricLevelsController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopformRubricLevelsController::class, 'forceDelete']);

    Route::get('/', [WorkshopformRubricLevelsController::class, 'index']);
    Route::post('/', [WorkshopformRubricLevelsController::class, 'store']);
    Route::get('/{id}', [WorkshopformRubricLevelsController::class, 'show']);
    Route::put('/{id}', [WorkshopformRubricLevelsController::class, 'update']);
    Route::delete('/{id}', [WorkshopformRubricLevelsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopformRubricLevelsController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopformRubricLevelsController::class, 'stats']);
});

// ========================
// POST RESOURCE
// ========================
Route::prefix('post')->group(function () {
    use App\Http\Controllers\Api\V1\PostController;

    Route::get('/filters', [PostController::class, 'filters']);
    Route::get('/suggestions', [PostController::class, 'suggestions']);
    Route::post('/advanced-search', [PostController::class, 'advancedSearch']);

    Route::get('/import-template', [PostController::class, 'importTemplate']);
    Route::post('/import', [PostController::class, 'import']);
    Route::get('/export', [PostController::class, 'export']);

    Route::post('/bulk-store', [PostController::class, 'bulkStore']);
    Route::post('/bulk-update', [PostController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [PostController::class, 'bulkDestroy']);

    Route::get('/trashed', [PostController::class, 'trashed']);
    Route::post('/{id}/restore', [PostController::class, 'restore']);
    Route::delete('/{id}/force', [PostController::class, 'forceDelete']);

    Route::get('/', [PostController::class, 'index']);
    Route::post('/', [PostController::class, 'store']);
    Route::get('/{id}', [PostController::class, 'show']);
    Route::put('/{id}', [PostController::class, 'update']);
    Route::delete('/{id}', [PostController::class, 'destroy']);

    Route::post('/{id}/duplicate', [PostController::class, 'duplicate']);
    Route::get('/{id}/stats', [PostController::class, 'stats']);
});

// ========================
// BLOCK_RECENTLYACCESSEDITEMS RESOURCE
// ========================
Route::prefix('block-recentlyaccesseditems')->group(function () {
    use App\Http\Controllers\Api\V1\BlockRecentlyaccesseditemsController;

    Route::get('/filters', [BlockRecentlyaccesseditemsController::class, 'filters']);
    Route::get('/suggestions', [BlockRecentlyaccesseditemsController::class, 'suggestions']);
    Route::post('/advanced-search', [BlockRecentlyaccesseditemsController::class, 'advancedSearch']);

    Route::get('/import-template', [BlockRecentlyaccesseditemsController::class, 'importTemplate']);
    Route::post('/import', [BlockRecentlyaccesseditemsController::class, 'import']);
    Route::get('/export', [BlockRecentlyaccesseditemsController::class, 'export']);

    Route::post('/bulk-store', [BlockRecentlyaccesseditemsController::class, 'bulkStore']);
    Route::post('/bulk-update', [BlockRecentlyaccesseditemsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BlockRecentlyaccesseditemsController::class, 'bulkDestroy']);

    Route::get('/trashed', [BlockRecentlyaccesseditemsController::class, 'trashed']);
    Route::post('/{id}/restore', [BlockRecentlyaccesseditemsController::class, 'restore']);
    Route::delete('/{id}/force', [BlockRecentlyaccesseditemsController::class, 'forceDelete']);

    Route::get('/', [BlockRecentlyaccesseditemsController::class, 'index']);
    Route::post('/', [BlockRecentlyaccesseditemsController::class, 'store']);
    Route::get('/{id}', [BlockRecentlyaccesseditemsController::class, 'show']);
    Route::put('/{id}', [BlockRecentlyaccesseditemsController::class, 'update']);
    Route::delete('/{id}', [BlockRecentlyaccesseditemsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BlockRecentlyaccesseditemsController::class, 'duplicate']);
    Route::get('/{id}/stats', [BlockRecentlyaccesseditemsController::class, 'stats']);
});

// ========================
// TOOL_BRICKFIELD_AREAS RESOURCE
// ========================
Route::prefix('tool-brickfield-areas')->group(function () {
    use App\Http\Controllers\Api\V1\ToolBrickfieldAreasController;

    Route::get('/filters', [ToolBrickfieldAreasController::class, 'filters']);
    Route::get('/suggestions', [ToolBrickfieldAreasController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolBrickfieldAreasController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolBrickfieldAreasController::class, 'importTemplate']);
    Route::post('/import', [ToolBrickfieldAreasController::class, 'import']);
    Route::get('/export', [ToolBrickfieldAreasController::class, 'export']);

    Route::post('/bulk-store', [ToolBrickfieldAreasController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolBrickfieldAreasController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolBrickfieldAreasController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolBrickfieldAreasController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolBrickfieldAreasController::class, 'restore']);
    Route::delete('/{id}/force', [ToolBrickfieldAreasController::class, 'forceDelete']);

    Route::get('/', [ToolBrickfieldAreasController::class, 'index']);
    Route::post('/', [ToolBrickfieldAreasController::class, 'store']);
    Route::get('/{id}', [ToolBrickfieldAreasController::class, 'show']);
    Route::put('/{id}', [ToolBrickfieldAreasController::class, 'update']);
    Route::delete('/{id}', [ToolBrickfieldAreasController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolBrickfieldAreasController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolBrickfieldAreasController::class, 'stats']);
});

// ========================
// H5PACTIVITY_ATTEMPTS_RESULTS RESOURCE
// ========================
Route::prefix('h5pactivity-attempts-results')->group(function () {
    use App\Http\Controllers\Api\V1\H5pactivityAttemptsResultsController;

    Route::get('/filters', [H5pactivityAttemptsResultsController::class, 'filters']);
    Route::get('/suggestions', [H5pactivityAttemptsResultsController::class, 'suggestions']);
    Route::post('/advanced-search', [H5pactivityAttemptsResultsController::class, 'advancedSearch']);

    Route::get('/import-template', [H5pactivityAttemptsResultsController::class, 'importTemplate']);
    Route::post('/import', [H5pactivityAttemptsResultsController::class, 'import']);
    Route::get('/export', [H5pactivityAttemptsResultsController::class, 'export']);

    Route::post('/bulk-store', [H5pactivityAttemptsResultsController::class, 'bulkStore']);
    Route::post('/bulk-update', [H5pactivityAttemptsResultsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [H5pactivityAttemptsResultsController::class, 'bulkDestroy']);

    Route::get('/trashed', [H5pactivityAttemptsResultsController::class, 'trashed']);
    Route::post('/{id}/restore', [H5pactivityAttemptsResultsController::class, 'restore']);
    Route::delete('/{id}/force', [H5pactivityAttemptsResultsController::class, 'forceDelete']);

    Route::get('/', [H5pactivityAttemptsResultsController::class, 'index']);
    Route::post('/', [H5pactivityAttemptsResultsController::class, 'store']);
    Route::get('/{id}', [H5pactivityAttemptsResultsController::class, 'show']);
    Route::put('/{id}', [H5pactivityAttemptsResultsController::class, 'update']);
    Route::delete('/{id}', [H5pactivityAttemptsResultsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [H5pactivityAttemptsResultsController::class, 'duplicate']);
    Route::get('/{id}/stats', [H5pactivityAttemptsResultsController::class, 'stats']);
});

// ========================
// GRADE_OUTCOMES_HISTORY RESOURCE
// ========================
Route::prefix('grade-outcomes-history')->group(function () {
    use App\Http\Controllers\Api\V1\GradeOutcomesHistoryController;

    Route::get('/filters', [GradeOutcomesHistoryController::class, 'filters']);
    Route::get('/suggestions', [GradeOutcomesHistoryController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeOutcomesHistoryController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeOutcomesHistoryController::class, 'importTemplate']);
    Route::post('/import', [GradeOutcomesHistoryController::class, 'import']);
    Route::get('/export', [GradeOutcomesHistoryController::class, 'export']);

    Route::post('/bulk-store', [GradeOutcomesHistoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeOutcomesHistoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeOutcomesHistoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeOutcomesHistoryController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeOutcomesHistoryController::class, 'restore']);
    Route::delete('/{id}/force', [GradeOutcomesHistoryController::class, 'forceDelete']);

    Route::get('/', [GradeOutcomesHistoryController::class, 'index']);
    Route::post('/', [GradeOutcomesHistoryController::class, 'store']);
    Route::get('/{id}', [GradeOutcomesHistoryController::class, 'show']);
    Route::put('/{id}', [GradeOutcomesHistoryController::class, 'update']);
    Route::delete('/{id}', [GradeOutcomesHistoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeOutcomesHistoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeOutcomesHistoryController::class, 'stats']);
});

// ========================
// GRADE_OUTCOMES_COURSES RESOURCE
// ========================
Route::prefix('grade-outcomes-courses')->group(function () {
    use App\Http\Controllers\Api\V1\GradeOutcomesCoursesController;

    Route::get('/filters', [GradeOutcomesCoursesController::class, 'filters']);
    Route::get('/suggestions', [GradeOutcomesCoursesController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeOutcomesCoursesController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeOutcomesCoursesController::class, 'importTemplate']);
    Route::post('/import', [GradeOutcomesCoursesController::class, 'import']);
    Route::get('/export', [GradeOutcomesCoursesController::class, 'export']);

    Route::post('/bulk-store', [GradeOutcomesCoursesController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeOutcomesCoursesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeOutcomesCoursesController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeOutcomesCoursesController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeOutcomesCoursesController::class, 'restore']);
    Route::delete('/{id}/force', [GradeOutcomesCoursesController::class, 'forceDelete']);

    Route::get('/', [GradeOutcomesCoursesController::class, 'index']);
    Route::post('/', [GradeOutcomesCoursesController::class, 'store']);
    Route::get('/{id}', [GradeOutcomesCoursesController::class, 'show']);
    Route::put('/{id}', [GradeOutcomesCoursesController::class, 'update']);
    Route::delete('/{id}', [GradeOutcomesCoursesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeOutcomesCoursesController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeOutcomesCoursesController::class, 'stats']);
});

// ========================
// GRADE_ITEMS RESOURCE
// ========================
Route::prefix('grade-items')->group(function () {
    use App\Http\Controllers\Api\V1\GradeItemsController;

    Route::get('/filters', [GradeItemsController::class, 'filters']);
    Route::get('/suggestions', [GradeItemsController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeItemsController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeItemsController::class, 'importTemplate']);
    Route::post('/import', [GradeItemsController::class, 'import']);
    Route::get('/export', [GradeItemsController::class, 'export']);

    Route::post('/bulk-store', [GradeItemsController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeItemsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeItemsController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeItemsController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeItemsController::class, 'restore']);
    Route::delete('/{id}/force', [GradeItemsController::class, 'forceDelete']);

    Route::get('/', [GradeItemsController::class, 'index']);
    Route::post('/', [GradeItemsController::class, 'store']);
    Route::get('/{id}', [GradeItemsController::class, 'show']);
    Route::put('/{id}', [GradeItemsController::class, 'update']);
    Route::delete('/{id}', [GradeItemsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeItemsController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeItemsController::class, 'stats']);
});

// ========================
// COMPETENCY_MODULECOMP RESOURCE
// ========================
Route::prefix('competency-modulecomp')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyModulecompController;

    Route::get('/filters', [CompetencyModulecompController::class, 'filters']);
    Route::get('/suggestions', [CompetencyModulecompController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyModulecompController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyModulecompController::class, 'importTemplate']);
    Route::post('/import', [CompetencyModulecompController::class, 'import']);
    Route::get('/export', [CompetencyModulecompController::class, 'export']);

    Route::post('/bulk-store', [CompetencyModulecompController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyModulecompController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyModulecompController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyModulecompController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyModulecompController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyModulecompController::class, 'forceDelete']);

    Route::get('/', [CompetencyModulecompController::class, 'index']);
    Route::post('/', [CompetencyModulecompController::class, 'store']);
    Route::get('/{id}', [CompetencyModulecompController::class, 'show']);
    Route::put('/{id}', [CompetencyModulecompController::class, 'update']);
    Route::delete('/{id}', [CompetencyModulecompController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyModulecompController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyModulecompController::class, 'stats']);
});

// ========================
// COMPETENCY_RELATEDCOMP RESOURCE
// ========================
Route::prefix('competency-relatedcomp')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyRelatedcompController;

    Route::get('/filters', [CompetencyRelatedcompController::class, 'filters']);
    Route::get('/suggestions', [CompetencyRelatedcompController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyRelatedcompController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyRelatedcompController::class, 'importTemplate']);
    Route::post('/import', [CompetencyRelatedcompController::class, 'import']);
    Route::get('/export', [CompetencyRelatedcompController::class, 'export']);

    Route::post('/bulk-store', [CompetencyRelatedcompController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyRelatedcompController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyRelatedcompController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyRelatedcompController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyRelatedcompController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyRelatedcompController::class, 'forceDelete']);

    Route::get('/', [CompetencyRelatedcompController::class, 'index']);
    Route::post('/', [CompetencyRelatedcompController::class, 'store']);
    Route::get('/{id}', [CompetencyRelatedcompController::class, 'show']);
    Route::put('/{id}', [CompetencyRelatedcompController::class, 'update']);
    Route::delete('/{id}', [CompetencyRelatedcompController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyRelatedcompController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyRelatedcompController::class, 'stats']);
});

// ========================
// COMPETENCY_COURSECOMP RESOURCE
// ========================
Route::prefix('competency-coursecomp')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyCoursecompController;

    Route::get('/filters', [CompetencyCoursecompController::class, 'filters']);
    Route::get('/suggestions', [CompetencyCoursecompController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyCoursecompController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyCoursecompController::class, 'importTemplate']);
    Route::post('/import', [CompetencyCoursecompController::class, 'import']);
    Route::get('/export', [CompetencyCoursecompController::class, 'export']);

    Route::post('/bulk-store', [CompetencyCoursecompController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyCoursecompController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyCoursecompController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyCoursecompController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyCoursecompController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyCoursecompController::class, 'forceDelete']);

    Route::get('/', [CompetencyCoursecompController::class, 'index']);
    Route::post('/', [CompetencyCoursecompController::class, 'store']);
    Route::get('/{id}', [CompetencyCoursecompController::class, 'show']);
    Route::put('/{id}', [CompetencyCoursecompController::class, 'update']);
    Route::delete('/{id}', [CompetencyCoursecompController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyCoursecompController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyCoursecompController::class, 'stats']);
});

// ========================
// COMPETENCY_TEMPLATECOMP RESOURCE
// ========================
Route::prefix('competency-templatecomp')->group(function () {
    use App\Http\Controllers\Api\V1\CompetencyTemplatecompController;

    Route::get('/filters', [CompetencyTemplatecompController::class, 'filters']);
    Route::get('/suggestions', [CompetencyTemplatecompController::class, 'suggestions']);
    Route::post('/advanced-search', [CompetencyTemplatecompController::class, 'advancedSearch']);

    Route::get('/import-template', [CompetencyTemplatecompController::class, 'importTemplate']);
    Route::post('/import', [CompetencyTemplatecompController::class, 'import']);
    Route::get('/export', [CompetencyTemplatecompController::class, 'export']);

    Route::post('/bulk-store', [CompetencyTemplatecompController::class, 'bulkStore']);
    Route::post('/bulk-update', [CompetencyTemplatecompController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CompetencyTemplatecompController::class, 'bulkDestroy']);

    Route::get('/trashed', [CompetencyTemplatecompController::class, 'trashed']);
    Route::post('/{id}/restore', [CompetencyTemplatecompController::class, 'restore']);
    Route::delete('/{id}/force', [CompetencyTemplatecompController::class, 'forceDelete']);

    Route::get('/', [CompetencyTemplatecompController::class, 'index']);
    Route::post('/', [CompetencyTemplatecompController::class, 'store']);
    Route::get('/{id}', [CompetencyTemplatecompController::class, 'show']);
    Route::put('/{id}', [CompetencyTemplatecompController::class, 'update']);
    Route::delete('/{id}', [CompetencyTemplatecompController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CompetencyTemplatecompController::class, 'duplicate']);
    Route::get('/{id}/stats', [CompetencyTemplatecompController::class, 'stats']);
});

// ========================
// BADGE_CRITERIA_MET RESOURCE
// ========================
Route::prefix('badge-criteria-met')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeCriteriaMetController;

    Route::get('/filters', [BadgeCriteriaMetController::class, 'filters']);
    Route::get('/suggestions', [BadgeCriteriaMetController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeCriteriaMetController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeCriteriaMetController::class, 'importTemplate']);
    Route::post('/import', [BadgeCriteriaMetController::class, 'import']);
    Route::get('/export', [BadgeCriteriaMetController::class, 'export']);

    Route::post('/bulk-store', [BadgeCriteriaMetController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeCriteriaMetController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeCriteriaMetController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeCriteriaMetController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeCriteriaMetController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeCriteriaMetController::class, 'forceDelete']);

    Route::get('/', [BadgeCriteriaMetController::class, 'index']);
    Route::post('/', [BadgeCriteriaMetController::class, 'store']);
    Route::get('/{id}', [BadgeCriteriaMetController::class, 'show']);
    Route::put('/{id}', [BadgeCriteriaMetController::class, 'update']);
    Route::delete('/{id}', [BadgeCriteriaMetController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeCriteriaMetController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeCriteriaMetController::class, 'stats']);
});

// ========================
// BADGE_CRITERIA_PARAM RESOURCE
// ========================
Route::prefix('badge-criteria-param')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeCriteriaParamController;

    Route::get('/filters', [BadgeCriteriaParamController::class, 'filters']);
    Route::get('/suggestions', [BadgeCriteriaParamController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeCriteriaParamController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeCriteriaParamController::class, 'importTemplate']);
    Route::post('/import', [BadgeCriteriaParamController::class, 'import']);
    Route::get('/export', [BadgeCriteriaParamController::class, 'export']);

    Route::post('/bulk-store', [BadgeCriteriaParamController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeCriteriaParamController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeCriteriaParamController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeCriteriaParamController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeCriteriaParamController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeCriteriaParamController::class, 'forceDelete']);

    Route::get('/', [BadgeCriteriaParamController::class, 'index']);
    Route::post('/', [BadgeCriteriaParamController::class, 'store']);
    Route::get('/{id}', [BadgeCriteriaParamController::class, 'show']);
    Route::put('/{id}', [BadgeCriteriaParamController::class, 'update']);
    Route::delete('/{id}', [BadgeCriteriaParamController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeCriteriaParamController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeCriteriaParamController::class, 'stats']);
});

// ========================
// QUESTION_RESPONSE_COUNT RESOURCE
// ========================
Route::prefix('question-response-count')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionResponseCountController;

    Route::get('/filters', [QuestionResponseCountController::class, 'filters']);
    Route::get('/suggestions', [QuestionResponseCountController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionResponseCountController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionResponseCountController::class, 'importTemplate']);
    Route::post('/import', [QuestionResponseCountController::class, 'import']);
    Route::get('/export', [QuestionResponseCountController::class, 'export']);

    Route::post('/bulk-store', [QuestionResponseCountController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionResponseCountController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionResponseCountController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionResponseCountController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionResponseCountController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionResponseCountController::class, 'forceDelete']);

    Route::get('/', [QuestionResponseCountController::class, 'index']);
    Route::post('/', [QuestionResponseCountController::class, 'store']);
    Route::get('/{id}', [QuestionResponseCountController::class, 'show']);
    Route::put('/{id}', [QuestionResponseCountController::class, 'update']);
    Route::delete('/{id}', [QuestionResponseCountController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionResponseCountController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionResponseCountController::class, 'stats']);
});

// ========================
// ANALYTICS_PREDICTION_ACTIONS RESOURCE
// ========================
Route::prefix('analytics-prediction-actions')->group(function () {
    use App\Http\Controllers\Api\V1\AnalyticsPredictionActionsController;

    Route::get('/filters', [AnalyticsPredictionActionsController::class, 'filters']);
    Route::get('/suggestions', [AnalyticsPredictionActionsController::class, 'suggestions']);
    Route::post('/advanced-search', [AnalyticsPredictionActionsController::class, 'advancedSearch']);

    Route::get('/import-template', [AnalyticsPredictionActionsController::class, 'importTemplate']);
    Route::post('/import', [AnalyticsPredictionActionsController::class, 'import']);
    Route::get('/export', [AnalyticsPredictionActionsController::class, 'export']);

    Route::post('/bulk-store', [AnalyticsPredictionActionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [AnalyticsPredictionActionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AnalyticsPredictionActionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [AnalyticsPredictionActionsController::class, 'trashed']);
    Route::post('/{id}/restore', [AnalyticsPredictionActionsController::class, 'restore']);
    Route::delete('/{id}/force', [AnalyticsPredictionActionsController::class, 'forceDelete']);

    Route::get('/', [AnalyticsPredictionActionsController::class, 'index']);
    Route::post('/', [AnalyticsPredictionActionsController::class, 'store']);
    Route::get('/{id}', [AnalyticsPredictionActionsController::class, 'show']);
    Route::put('/{id}', [AnalyticsPredictionActionsController::class, 'update']);
    Route::delete('/{id}', [AnalyticsPredictionActionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AnalyticsPredictionActionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [AnalyticsPredictionActionsController::class, 'stats']);
});

// ========================
// ENROL_LTI_TOOL_CONSUMER_MAP RESOURCE
// ========================
Route::prefix('enrol-lti-tool-consumer-map')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiToolConsumerMapController;

    Route::get('/filters', [EnrolLtiToolConsumerMapController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiToolConsumerMapController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiToolConsumerMapController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiToolConsumerMapController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiToolConsumerMapController::class, 'import']);
    Route::get('/export', [EnrolLtiToolConsumerMapController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiToolConsumerMapController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiToolConsumerMapController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiToolConsumerMapController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiToolConsumerMapController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiToolConsumerMapController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiToolConsumerMapController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiToolConsumerMapController::class, 'index']);
    Route::post('/', [EnrolLtiToolConsumerMapController::class, 'store']);
    Route::get('/{id}', [EnrolLtiToolConsumerMapController::class, 'show']);
    Route::put('/{id}', [EnrolLtiToolConsumerMapController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiToolConsumerMapController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiToolConsumerMapController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiToolConsumerMapController::class, 'stats']);
});

// ========================
// ENROL_LTI_USERS RESOURCE
// ========================
Route::prefix('enrol-lti-users')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiUsersController;

    Route::get('/filters', [EnrolLtiUsersController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiUsersController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiUsersController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiUsersController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiUsersController::class, 'import']);
    Route::get('/export', [EnrolLtiUsersController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiUsersController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiUsersController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiUsersController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiUsersController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiUsersController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiUsersController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiUsersController::class, 'index']);
    Route::post('/', [EnrolLtiUsersController::class, 'store']);
    Route::get('/{id}', [EnrolLtiUsersController::class, 'show']);
    Route::put('/{id}', [EnrolLtiUsersController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiUsersController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiUsersController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiUsersController::class, 'stats']);
});

// ========================
// GRADINGFORM_GUIDE_COMMENTS RESOURCE
// ========================
Route::prefix('gradingform-guide-comments')->group(function () {
    use App\Http\Controllers\Api\V1\GradingformGuideCommentsController;

    Route::get('/filters', [GradingformGuideCommentsController::class, 'filters']);
    Route::get('/suggestions', [GradingformGuideCommentsController::class, 'suggestions']);
    Route::post('/advanced-search', [GradingformGuideCommentsController::class, 'advancedSearch']);

    Route::get('/import-template', [GradingformGuideCommentsController::class, 'importTemplate']);
    Route::post('/import', [GradingformGuideCommentsController::class, 'import']);
    Route::get('/export', [GradingformGuideCommentsController::class, 'export']);

    Route::post('/bulk-store', [GradingformGuideCommentsController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradingformGuideCommentsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradingformGuideCommentsController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradingformGuideCommentsController::class, 'trashed']);
    Route::post('/{id}/restore', [GradingformGuideCommentsController::class, 'restore']);
    Route::delete('/{id}/force', [GradingformGuideCommentsController::class, 'forceDelete']);

    Route::get('/', [GradingformGuideCommentsController::class, 'index']);
    Route::post('/', [GradingformGuideCommentsController::class, 'store']);
    Route::get('/{id}', [GradingformGuideCommentsController::class, 'show']);
    Route::put('/{id}', [GradingformGuideCommentsController::class, 'update']);
    Route::delete('/{id}', [GradingformGuideCommentsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradingformGuideCommentsController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradingformGuideCommentsController::class, 'stats']);
});

// ========================
// GRADING_INSTANCES RESOURCE
// ========================
Route::prefix('grading-instances')->group(function () {
    use App\Http\Controllers\Api\V1\GradingInstancesController;

    Route::get('/filters', [GradingInstancesController::class, 'filters']);
    Route::get('/suggestions', [GradingInstancesController::class, 'suggestions']);
    Route::post('/advanced-search', [GradingInstancesController::class, 'advancedSearch']);

    Route::get('/import-template', [GradingInstancesController::class, 'importTemplate']);
    Route::post('/import', [GradingInstancesController::class, 'import']);
    Route::get('/export', [GradingInstancesController::class, 'export']);

    Route::post('/bulk-store', [GradingInstancesController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradingInstancesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradingInstancesController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradingInstancesController::class, 'trashed']);
    Route::post('/{id}/restore', [GradingInstancesController::class, 'restore']);
    Route::delete('/{id}/force', [GradingInstancesController::class, 'forceDelete']);

    Route::get('/', [GradingInstancesController::class, 'index']);
    Route::post('/', [GradingInstancesController::class, 'store']);
    Route::get('/{id}', [GradingInstancesController::class, 'show']);
    Route::put('/{id}', [GradingInstancesController::class, 'update']);
    Route::delete('/{id}', [GradingInstancesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradingInstancesController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradingInstancesController::class, 'stats']);
});

// ========================
// GRADINGFORM_GUIDE_CRITERIA RESOURCE
// ========================
Route::prefix('gradingform-guide-criteria')->group(function () {
    use App\Http\Controllers\Api\V1\GradingformGuideCriteriaController;

    Route::get('/filters', [GradingformGuideCriteriaController::class, 'filters']);
    Route::get('/suggestions', [GradingformGuideCriteriaController::class, 'suggestions']);
    Route::post('/advanced-search', [GradingformGuideCriteriaController::class, 'advancedSearch']);

    Route::get('/import-template', [GradingformGuideCriteriaController::class, 'importTemplate']);
    Route::post('/import', [GradingformGuideCriteriaController::class, 'import']);
    Route::get('/export', [GradingformGuideCriteriaController::class, 'export']);

    Route::post('/bulk-store', [GradingformGuideCriteriaController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradingformGuideCriteriaController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradingformGuideCriteriaController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradingformGuideCriteriaController::class, 'trashed']);
    Route::post('/{id}/restore', [GradingformGuideCriteriaController::class, 'restore']);
    Route::delete('/{id}/force', [GradingformGuideCriteriaController::class, 'forceDelete']);

    Route::get('/', [GradingformGuideCriteriaController::class, 'index']);
    Route::post('/', [GradingformGuideCriteriaController::class, 'store']);
    Route::get('/{id}', [GradingformGuideCriteriaController::class, 'show']);
    Route::put('/{id}', [GradingformGuideCriteriaController::class, 'update']);
    Route::delete('/{id}', [GradingformGuideCriteriaController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradingformGuideCriteriaController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradingformGuideCriteriaController::class, 'stats']);
});

// ========================
// GRADINGFORM_RUBRIC_CRITERIA RESOURCE
// ========================
Route::prefix('gradingform-rubric-criteria')->group(function () {
    use App\Http\Controllers\Api\V1\GradingformRubricCriteriaController;

    Route::get('/filters', [GradingformRubricCriteriaController::class, 'filters']);
    Route::get('/suggestions', [GradingformRubricCriteriaController::class, 'suggestions']);
    Route::post('/advanced-search', [GradingformRubricCriteriaController::class, 'advancedSearch']);

    Route::get('/import-template', [GradingformRubricCriteriaController::class, 'importTemplate']);
    Route::post('/import', [GradingformRubricCriteriaController::class, 'import']);
    Route::get('/export', [GradingformRubricCriteriaController::class, 'export']);

    Route::post('/bulk-store', [GradingformRubricCriteriaController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradingformRubricCriteriaController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradingformRubricCriteriaController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradingformRubricCriteriaController::class, 'trashed']);
    Route::post('/{id}/restore', [GradingformRubricCriteriaController::class, 'restore']);
    Route::delete('/{id}/force', [GradingformRubricCriteriaController::class, 'forceDelete']);

    Route::get('/', [GradingformRubricCriteriaController::class, 'index']);
    Route::post('/', [GradingformRubricCriteriaController::class, 'store']);
    Route::get('/{id}', [GradingformRubricCriteriaController::class, 'show']);
    Route::put('/{id}', [GradingformRubricCriteriaController::class, 'update']);
    Route::delete('/{id}', [GradingformRubricCriteriaController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradingformRubricCriteriaController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradingformRubricCriteriaController::class, 'stats']);
});

// ========================
// CUSTOMFIELD_DATA RESOURCE
// ========================
Route::prefix('customfield-data')->group(function () {
    use App\Http\Controllers\Api\V1\CustomfieldDataController;

    Route::get('/filters', [CustomfieldDataController::class, 'filters']);
    Route::get('/suggestions', [CustomfieldDataController::class, 'suggestions']);
    Route::post('/advanced-search', [CustomfieldDataController::class, 'advancedSearch']);

    Route::get('/import-template', [CustomfieldDataController::class, 'importTemplate']);
    Route::post('/import', [CustomfieldDataController::class, 'import']);
    Route::get('/export', [CustomfieldDataController::class, 'export']);

    Route::post('/bulk-store', [CustomfieldDataController::class, 'bulkStore']);
    Route::post('/bulk-update', [CustomfieldDataController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [CustomfieldDataController::class, 'bulkDestroy']);

    Route::get('/trashed', [CustomfieldDataController::class, 'trashed']);
    Route::post('/{id}/restore', [CustomfieldDataController::class, 'restore']);
    Route::delete('/{id}/force', [CustomfieldDataController::class, 'forceDelete']);

    Route::get('/', [CustomfieldDataController::class, 'index']);
    Route::post('/', [CustomfieldDataController::class, 'store']);
    Route::get('/{id}', [CustomfieldDataController::class, 'show']);
    Route::put('/{id}', [CustomfieldDataController::class, 'update']);
    Route::delete('/{id}', [CustomfieldDataController::class, 'destroy']);

    Route::post('/{id}/duplicate', [CustomfieldDataController::class, 'duplicate']);
    Route::get('/{id}/stats', [CustomfieldDataController::class, 'stats']);
});

// ========================
// MESSAGE_USER_ACTIONS RESOURCE
// ========================
Route::prefix('message-user-actions')->group(function () {
    use App\Http\Controllers\Api\V1\MessageUserActionsController;

    Route::get('/filters', [MessageUserActionsController::class, 'filters']);
    Route::get('/suggestions', [MessageUserActionsController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageUserActionsController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageUserActionsController::class, 'importTemplate']);
    Route::post('/import', [MessageUserActionsController::class, 'import']);
    Route::get('/export', [MessageUserActionsController::class, 'export']);

    Route::post('/bulk-store', [MessageUserActionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageUserActionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageUserActionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageUserActionsController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageUserActionsController::class, 'restore']);
    Route::delete('/{id}/force', [MessageUserActionsController::class, 'forceDelete']);

    Route::get('/', [MessageUserActionsController::class, 'index']);
    Route::post('/', [MessageUserActionsController::class, 'store']);
    Route::get('/{id}', [MessageUserActionsController::class, 'show']);
    Route::put('/{id}', [MessageUserActionsController::class, 'update']);
    Route::delete('/{id}', [MessageUserActionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageUserActionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageUserActionsController::class, 'stats']);
});

// ========================
// MESSAGE_EMAIL_MESSAGES RESOURCE
// ========================
Route::prefix('message-email-messages')->group(function () {
    use App\Http\Controllers\Api\V1\MessageEmailMessagesController;

    Route::get('/filters', [MessageEmailMessagesController::class, 'filters']);
    Route::get('/suggestions', [MessageEmailMessagesController::class, 'suggestions']);
    Route::post('/advanced-search', [MessageEmailMessagesController::class, 'advancedSearch']);

    Route::get('/import-template', [MessageEmailMessagesController::class, 'importTemplate']);
    Route::post('/import', [MessageEmailMessagesController::class, 'import']);
    Route::get('/export', [MessageEmailMessagesController::class, 'export']);

    Route::post('/bulk-store', [MessageEmailMessagesController::class, 'bulkStore']);
    Route::post('/bulk-update', [MessageEmailMessagesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [MessageEmailMessagesController::class, 'bulkDestroy']);

    Route::get('/trashed', [MessageEmailMessagesController::class, 'trashed']);
    Route::post('/{id}/restore', [MessageEmailMessagesController::class, 'restore']);
    Route::delete('/{id}/force', [MessageEmailMessagesController::class, 'forceDelete']);

    Route::get('/', [MessageEmailMessagesController::class, 'index']);
    Route::post('/', [MessageEmailMessagesController::class, 'store']);
    Route::get('/{id}', [MessageEmailMessagesController::class, 'show']);
    Route::put('/{id}', [MessageEmailMessagesController::class, 'update']);
    Route::delete('/{id}', [MessageEmailMessagesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [MessageEmailMessagesController::class, 'duplicate']);
    Route::get('/{id}/stats', [MessageEmailMessagesController::class, 'stats']);
});

// ========================
// QUESTION_ATTEMPT_STEPS RESOURCE
// ========================
Route::prefix('question-attempt-steps')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionAttemptStepsController;

    Route::get('/filters', [QuestionAttemptStepsController::class, 'filters']);
    Route::get('/suggestions', [QuestionAttemptStepsController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionAttemptStepsController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionAttemptStepsController::class, 'importTemplate']);
    Route::post('/import', [QuestionAttemptStepsController::class, 'import']);
    Route::get('/export', [QuestionAttemptStepsController::class, 'export']);

    Route::post('/bulk-store', [QuestionAttemptStepsController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionAttemptStepsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionAttemptStepsController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionAttemptStepsController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionAttemptStepsController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionAttemptStepsController::class, 'forceDelete']);

    Route::get('/', [QuestionAttemptStepsController::class, 'index']);
    Route::post('/', [QuestionAttemptStepsController::class, 'store']);
    Route::get('/{id}', [QuestionAttemptStepsController::class, 'show']);
    Route::put('/{id}', [QuestionAttemptStepsController::class, 'update']);
    Route::delete('/{id}', [QuestionAttemptStepsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionAttemptStepsController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionAttemptStepsController::class, 'stats']);
});

// ========================
// QUIZ_OVERVIEW_REGRADES RESOURCE
// ========================
Route::prefix('quiz-overview-regrades')->group(function () {
    use App\Http\Controllers\Api\V1\QuizOverviewRegradesController;

    Route::get('/filters', [QuizOverviewRegradesController::class, 'filters']);
    Route::get('/suggestions', [QuizOverviewRegradesController::class, 'suggestions']);
    Route::post('/advanced-search', [QuizOverviewRegradesController::class, 'advancedSearch']);

    Route::get('/import-template', [QuizOverviewRegradesController::class, 'importTemplate']);
    Route::post('/import', [QuizOverviewRegradesController::class, 'import']);
    Route::get('/export', [QuizOverviewRegradesController::class, 'export']);

    Route::post('/bulk-store', [QuizOverviewRegradesController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuizOverviewRegradesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuizOverviewRegradesController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuizOverviewRegradesController::class, 'trashed']);
    Route::post('/{id}/restore', [QuizOverviewRegradesController::class, 'restore']);
    Route::delete('/{id}/force', [QuizOverviewRegradesController::class, 'forceDelete']);

    Route::get('/', [QuizOverviewRegradesController::class, 'index']);
    Route::post('/', [QuizOverviewRegradesController::class, 'store']);
    Route::get('/{id}', [QuizOverviewRegradesController::class, 'show']);
    Route::put('/{id}', [QuizOverviewRegradesController::class, 'update']);
    Route::delete('/{id}', [QuizOverviewRegradesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuizOverviewRegradesController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuizOverviewRegradesController::class, 'stats']);
});

// ========================
// FILES RESOURCE
// ========================
Route::prefix('files')->group(function () {
    use App\Http\Controllers\Api\V1\FilesController;

    Route::get('/filters', [FilesController::class, 'filters']);
    Route::get('/suggestions', [FilesController::class, 'suggestions']);
    Route::post('/advanced-search', [FilesController::class, 'advancedSearch']);

    Route::get('/import-template', [FilesController::class, 'importTemplate']);
    Route::post('/import', [FilesController::class, 'import']);
    Route::get('/export', [FilesController::class, 'export']);

    Route::post('/bulk-store', [FilesController::class, 'bulkStore']);
    Route::post('/bulk-update', [FilesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FilesController::class, 'bulkDestroy']);

    Route::get('/trashed', [FilesController::class, 'trashed']);
    Route::post('/{id}/restore', [FilesController::class, 'restore']);
    Route::delete('/{id}/force', [FilesController::class, 'forceDelete']);

    Route::get('/', [FilesController::class, 'index']);
    Route::post('/', [FilesController::class, 'store']);
    Route::get('/{id}', [FilesController::class, 'show']);
    Route::put('/{id}', [FilesController::class, 'update']);
    Route::delete('/{id}', [FilesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FilesController::class, 'duplicate']);
    Route::get('/{id}/stats', [FilesController::class, 'stats']);
});

// ========================
// BADGE_EXTERNAL_IDENTIFIER RESOURCE
// ========================
Route::prefix('badge-external-identifier')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeExternalIdentifierController;

    Route::get('/filters', [BadgeExternalIdentifierController::class, 'filters']);
    Route::get('/suggestions', [BadgeExternalIdentifierController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeExternalIdentifierController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeExternalIdentifierController::class, 'importTemplate']);
    Route::post('/import', [BadgeExternalIdentifierController::class, 'import']);
    Route::get('/export', [BadgeExternalIdentifierController::class, 'export']);

    Route::post('/bulk-store', [BadgeExternalIdentifierController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeExternalIdentifierController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeExternalIdentifierController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeExternalIdentifierController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeExternalIdentifierController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeExternalIdentifierController::class, 'forceDelete']);

    Route::get('/', [BadgeExternalIdentifierController::class, 'index']);
    Route::post('/', [BadgeExternalIdentifierController::class, 'store']);
    Route::get('/{id}', [BadgeExternalIdentifierController::class, 'show']);
    Route::put('/{id}', [BadgeExternalIdentifierController::class, 'update']);
    Route::delete('/{id}', [BadgeExternalIdentifierController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeExternalIdentifierController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeExternalIdentifierController::class, 'stats']);
});

// ========================
// BADGE_EXTERNAL RESOURCE
// ========================
Route::prefix('badge-external')->group(function () {
    use App\Http\Controllers\Api\V1\BadgeExternalController;

    Route::get('/filters', [BadgeExternalController::class, 'filters']);
    Route::get('/suggestions', [BadgeExternalController::class, 'suggestions']);
    Route::post('/advanced-search', [BadgeExternalController::class, 'advancedSearch']);

    Route::get('/import-template', [BadgeExternalController::class, 'importTemplate']);
    Route::post('/import', [BadgeExternalController::class, 'import']);
    Route::get('/export', [BadgeExternalController::class, 'export']);

    Route::post('/bulk-store', [BadgeExternalController::class, 'bulkStore']);
    Route::post('/bulk-update', [BadgeExternalController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BadgeExternalController::class, 'bulkDestroy']);

    Route::get('/trashed', [BadgeExternalController::class, 'trashed']);
    Route::post('/{id}/restore', [BadgeExternalController::class, 'restore']);
    Route::delete('/{id}/force', [BadgeExternalController::class, 'forceDelete']);

    Route::get('/', [BadgeExternalController::class, 'index']);
    Route::post('/', [BadgeExternalController::class, 'store']);
    Route::get('/{id}', [BadgeExternalController::class, 'show']);
    Route::put('/{id}', [BadgeExternalController::class, 'update']);
    Route::delete('/{id}', [BadgeExternalController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BadgeExternalController::class, 'duplicate']);
    Route::get('/{id}/stats', [BadgeExternalController::class, 'stats']);
});

// ========================
// FORUM_QUEUE RESOURCE
// ========================
Route::prefix('forum-queue')->group(function () {
    use App\Http\Controllers\Api\V1\ForumQueueController;

    Route::get('/filters', [ForumQueueController::class, 'filters']);
    Route::get('/suggestions', [ForumQueueController::class, 'suggestions']);
    Route::post('/advanced-search', [ForumQueueController::class, 'advancedSearch']);

    Route::get('/import-template', [ForumQueueController::class, 'importTemplate']);
    Route::post('/import', [ForumQueueController::class, 'import']);
    Route::get('/export', [ForumQueueController::class, 'export']);

    Route::post('/bulk-store', [ForumQueueController::class, 'bulkStore']);
    Route::post('/bulk-update', [ForumQueueController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ForumQueueController::class, 'bulkDestroy']);

    Route::get('/trashed', [ForumQueueController::class, 'trashed']);
    Route::post('/{id}/restore', [ForumQueueController::class, 'restore']);
    Route::delete('/{id}/force', [ForumQueueController::class, 'forceDelete']);

    Route::get('/', [ForumQueueController::class, 'index']);
    Route::post('/', [ForumQueueController::class, 'store']);
    Route::get('/{id}', [ForumQueueController::class, 'show']);
    Route::put('/{id}', [ForumQueueController::class, 'update']);
    Route::delete('/{id}', [ForumQueueController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ForumQueueController::class, 'duplicate']);
    Route::get('/{id}/stats', [ForumQueueController::class, 'stats']);
});

// ========================
// LESSON_ATTEMPTS RESOURCE
// ========================
Route::prefix('lesson-attempts')->group(function () {
    use App\Http\Controllers\Api\V1\LessonAttemptsController;

    Route::get('/filters', [LessonAttemptsController::class, 'filters']);
    Route::get('/suggestions', [LessonAttemptsController::class, 'suggestions']);
    Route::post('/advanced-search', [LessonAttemptsController::class, 'advancedSearch']);

    Route::get('/import-template', [LessonAttemptsController::class, 'importTemplate']);
    Route::post('/import', [LessonAttemptsController::class, 'import']);
    Route::get('/export', [LessonAttemptsController::class, 'export']);

    Route::post('/bulk-store', [LessonAttemptsController::class, 'bulkStore']);
    Route::post('/bulk-update', [LessonAttemptsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LessonAttemptsController::class, 'bulkDestroy']);

    Route::get('/trashed', [LessonAttemptsController::class, 'trashed']);
    Route::post('/{id}/restore', [LessonAttemptsController::class, 'restore']);
    Route::delete('/{id}/force', [LessonAttemptsController::class, 'forceDelete']);

    Route::get('/', [LessonAttemptsController::class, 'index']);
    Route::post('/', [LessonAttemptsController::class, 'store']);
    Route::get('/{id}', [LessonAttemptsController::class, 'show']);
    Route::put('/{id}', [LessonAttemptsController::class, 'update']);
    Route::delete('/{id}', [LessonAttemptsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LessonAttemptsController::class, 'duplicate']);
    Route::get('/{id}/stats', [LessonAttemptsController::class, 'stats']);
});

// ========================
// SCORM_SEQ_MAPINFO RESOURCE
// ========================
Route::prefix('scorm-seq-mapinfo')->group(function () {
    use App\Http\Controllers\Api\V1\ScormSeqMapinfoController;

    Route::get('/filters', [ScormSeqMapinfoController::class, 'filters']);
    Route::get('/suggestions', [ScormSeqMapinfoController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormSeqMapinfoController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormSeqMapinfoController::class, 'importTemplate']);
    Route::post('/import', [ScormSeqMapinfoController::class, 'import']);
    Route::get('/export', [ScormSeqMapinfoController::class, 'export']);

    Route::post('/bulk-store', [ScormSeqMapinfoController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormSeqMapinfoController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormSeqMapinfoController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormSeqMapinfoController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormSeqMapinfoController::class, 'restore']);
    Route::delete('/{id}/force', [ScormSeqMapinfoController::class, 'forceDelete']);

    Route::get('/', [ScormSeqMapinfoController::class, 'index']);
    Route::post('/', [ScormSeqMapinfoController::class, 'store']);
    Route::get('/{id}', [ScormSeqMapinfoController::class, 'show']);
    Route::put('/{id}', [ScormSeqMapinfoController::class, 'update']);
    Route::delete('/{id}', [ScormSeqMapinfoController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormSeqMapinfoController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormSeqMapinfoController::class, 'stats']);
});

// ========================
// SCORM_SEQ_ROLLUPRULECOND RESOURCE
// ========================
Route::prefix('scorm-seq-rolluprulecond')->group(function () {
    use App\Http\Controllers\Api\V1\ScormSeqRolluprulecondController;

    Route::get('/filters', [ScormSeqRolluprulecondController::class, 'filters']);
    Route::get('/suggestions', [ScormSeqRolluprulecondController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormSeqRolluprulecondController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormSeqRolluprulecondController::class, 'importTemplate']);
    Route::post('/import', [ScormSeqRolluprulecondController::class, 'import']);
    Route::get('/export', [ScormSeqRolluprulecondController::class, 'export']);

    Route::post('/bulk-store', [ScormSeqRolluprulecondController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormSeqRolluprulecondController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormSeqRolluprulecondController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormSeqRolluprulecondController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormSeqRolluprulecondController::class, 'restore']);
    Route::delete('/{id}/force', [ScormSeqRolluprulecondController::class, 'forceDelete']);

    Route::get('/', [ScormSeqRolluprulecondController::class, 'index']);
    Route::post('/', [ScormSeqRolluprulecondController::class, 'store']);
    Route::get('/{id}', [ScormSeqRolluprulecondController::class, 'show']);
    Route::put('/{id}', [ScormSeqRolluprulecondController::class, 'update']);
    Route::delete('/{id}', [ScormSeqRolluprulecondController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormSeqRolluprulecondController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormSeqRolluprulecondController::class, 'stats']);
});

// ========================
// SCORM_SEQ_RULECOND RESOURCE
// ========================
Route::prefix('scorm-seq-rulecond')->group(function () {
    use App\Http\Controllers\Api\V1\ScormSeqRulecondController;

    Route::get('/filters', [ScormSeqRulecondController::class, 'filters']);
    Route::get('/suggestions', [ScormSeqRulecondController::class, 'suggestions']);
    Route::post('/advanced-search', [ScormSeqRulecondController::class, 'advancedSearch']);

    Route::get('/import-template', [ScormSeqRulecondController::class, 'importTemplate']);
    Route::post('/import', [ScormSeqRulecondController::class, 'import']);
    Route::get('/export', [ScormSeqRulecondController::class, 'export']);

    Route::post('/bulk-store', [ScormSeqRulecondController::class, 'bulkStore']);
    Route::post('/bulk-update', [ScormSeqRulecondController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ScormSeqRulecondController::class, 'bulkDestroy']);

    Route::get('/trashed', [ScormSeqRulecondController::class, 'trashed']);
    Route::post('/{id}/restore', [ScormSeqRulecondController::class, 'restore']);
    Route::delete('/{id}/force', [ScormSeqRulecondController::class, 'forceDelete']);

    Route::get('/', [ScormSeqRulecondController::class, 'index']);
    Route::post('/', [ScormSeqRulecondController::class, 'store']);
    Route::get('/{id}', [ScormSeqRulecondController::class, 'show']);
    Route::put('/{id}', [ScormSeqRulecondController::class, 'update']);
    Route::delete('/{id}', [ScormSeqRulecondController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ScormSeqRulecondController::class, 'duplicate']);
    Route::get('/{id}/stats', [ScormSeqRulecondController::class, 'stats']);
});

// ========================
// WIKI_LINKS RESOURCE
// ========================
Route::prefix('wiki-links')->group(function () {
    use App\Http\Controllers\Api\V1\WikiLinksController;

    Route::get('/filters', [WikiLinksController::class, 'filters']);
    Route::get('/suggestions', [WikiLinksController::class, 'suggestions']);
    Route::post('/advanced-search', [WikiLinksController::class, 'advancedSearch']);

    Route::get('/import-template', [WikiLinksController::class, 'importTemplate']);
    Route::post('/import', [WikiLinksController::class, 'import']);
    Route::get('/export', [WikiLinksController::class, 'export']);

    Route::post('/bulk-store', [WikiLinksController::class, 'bulkStore']);
    Route::post('/bulk-update', [WikiLinksController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WikiLinksController::class, 'bulkDestroy']);

    Route::get('/trashed', [WikiLinksController::class, 'trashed']);
    Route::post('/{id}/restore', [WikiLinksController::class, 'restore']);
    Route::delete('/{id}/force', [WikiLinksController::class, 'forceDelete']);

    Route::get('/', [WikiLinksController::class, 'index']);
    Route::post('/', [WikiLinksController::class, 'store']);
    Route::get('/{id}', [WikiLinksController::class, 'show']);
    Route::put('/{id}', [WikiLinksController::class, 'update']);
    Route::delete('/{id}', [WikiLinksController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WikiLinksController::class, 'duplicate']);
    Route::get('/{id}/stats', [WikiLinksController::class, 'stats']);
});

// ========================
// WIKI_VERSIONS RESOURCE
// ========================
Route::prefix('wiki-versions')->group(function () {
    use App\Http\Controllers\Api\V1\WikiVersionsController;

    Route::get('/filters', [WikiVersionsController::class, 'filters']);
    Route::get('/suggestions', [WikiVersionsController::class, 'suggestions']);
    Route::post('/advanced-search', [WikiVersionsController::class, 'advancedSearch']);

    Route::get('/import-template', [WikiVersionsController::class, 'importTemplate']);
    Route::post('/import', [WikiVersionsController::class, 'import']);
    Route::get('/export', [WikiVersionsController::class, 'export']);

    Route::post('/bulk-store', [WikiVersionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [WikiVersionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WikiVersionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [WikiVersionsController::class, 'trashed']);
    Route::post('/{id}/restore', [WikiVersionsController::class, 'restore']);
    Route::delete('/{id}/force', [WikiVersionsController::class, 'forceDelete']);

    Route::get('/', [WikiVersionsController::class, 'index']);
    Route::post('/', [WikiVersionsController::class, 'store']);
    Route::get('/{id}', [WikiVersionsController::class, 'show']);
    Route::put('/{id}', [WikiVersionsController::class, 'update']);
    Route::delete('/{id}', [WikiVersionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WikiVersionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [WikiVersionsController::class, 'stats']);
});

// ========================
// WORKSHOP_GRADES RESOURCE
// ========================
Route::prefix('workshop-grades')->group(function () {
    use App\Http\Controllers\Api\V1\WorkshopGradesController;

    Route::get('/filters', [WorkshopGradesController::class, 'filters']);
    Route::get('/suggestions', [WorkshopGradesController::class, 'suggestions']);
    Route::post('/advanced-search', [WorkshopGradesController::class, 'advancedSearch']);

    Route::get('/import-template', [WorkshopGradesController::class, 'importTemplate']);
    Route::post('/import', [WorkshopGradesController::class, 'import']);
    Route::get('/export', [WorkshopGradesController::class, 'export']);

    Route::post('/bulk-store', [WorkshopGradesController::class, 'bulkStore']);
    Route::post('/bulk-update', [WorkshopGradesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [WorkshopGradesController::class, 'bulkDestroy']);

    Route::get('/trashed', [WorkshopGradesController::class, 'trashed']);
    Route::post('/{id}/restore', [WorkshopGradesController::class, 'restore']);
    Route::delete('/{id}/force', [WorkshopGradesController::class, 'forceDelete']);

    Route::get('/', [WorkshopGradesController::class, 'index']);
    Route::post('/', [WorkshopGradesController::class, 'store']);
    Route::get('/{id}', [WorkshopGradesController::class, 'show']);
    Route::put('/{id}', [WorkshopGradesController::class, 'update']);
    Route::delete('/{id}', [WorkshopGradesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [WorkshopGradesController::class, 'duplicate']);
    Route::get('/{id}/stats', [WorkshopGradesController::class, 'stats']);
});

// ========================
// BLOG_ASSOCIATION RESOURCE
// ========================
Route::prefix('blog-association')->group(function () {
    use App\Http\Controllers\Api\V1\BlogAssociationController;

    Route::get('/filters', [BlogAssociationController::class, 'filters']);
    Route::get('/suggestions', [BlogAssociationController::class, 'suggestions']);
    Route::post('/advanced-search', [BlogAssociationController::class, 'advancedSearch']);

    Route::get('/import-template', [BlogAssociationController::class, 'importTemplate']);
    Route::post('/import', [BlogAssociationController::class, 'import']);
    Route::get('/export', [BlogAssociationController::class, 'export']);

    Route::post('/bulk-store', [BlogAssociationController::class, 'bulkStore']);
    Route::post('/bulk-update', [BlogAssociationController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [BlogAssociationController::class, 'bulkDestroy']);

    Route::get('/trashed', [BlogAssociationController::class, 'trashed']);
    Route::post('/{id}/restore', [BlogAssociationController::class, 'restore']);
    Route::delete('/{id}/force', [BlogAssociationController::class, 'forceDelete']);

    Route::get('/', [BlogAssociationController::class, 'index']);
    Route::post('/', [BlogAssociationController::class, 'store']);
    Route::get('/{id}', [BlogAssociationController::class, 'show']);
    Route::put('/{id}', [BlogAssociationController::class, 'update']);
    Route::delete('/{id}', [BlogAssociationController::class, 'destroy']);

    Route::post('/{id}/duplicate', [BlogAssociationController::class, 'duplicate']);
    Route::get('/{id}/stats', [BlogAssociationController::class, 'stats']);
});

// ========================
// TOOL_BRICKFIELD_CONTENT RESOURCE
// ========================
Route::prefix('tool-brickfield-content')->group(function () {
    use App\Http\Controllers\Api\V1\ToolBrickfieldContentController;

    Route::get('/filters', [ToolBrickfieldContentController::class, 'filters']);
    Route::get('/suggestions', [ToolBrickfieldContentController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolBrickfieldContentController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolBrickfieldContentController::class, 'importTemplate']);
    Route::post('/import', [ToolBrickfieldContentController::class, 'import']);
    Route::get('/export', [ToolBrickfieldContentController::class, 'export']);

    Route::post('/bulk-store', [ToolBrickfieldContentController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolBrickfieldContentController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolBrickfieldContentController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolBrickfieldContentController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolBrickfieldContentController::class, 'restore']);
    Route::delete('/{id}/force', [ToolBrickfieldContentController::class, 'forceDelete']);

    Route::get('/', [ToolBrickfieldContentController::class, 'index']);
    Route::post('/', [ToolBrickfieldContentController::class, 'store']);
    Route::get('/{id}', [ToolBrickfieldContentController::class, 'show']);
    Route::put('/{id}', [ToolBrickfieldContentController::class, 'update']);
    Route::delete('/{id}', [ToolBrickfieldContentController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolBrickfieldContentController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolBrickfieldContentController::class, 'stats']);
});

// ========================
// GRADE_IMPORT_VALUES RESOURCE
// ========================
Route::prefix('grade-import-values')->group(function () {
    use App\Http\Controllers\Api\V1\GradeImportValuesController;

    Route::get('/filters', [GradeImportValuesController::class, 'filters']);
    Route::get('/suggestions', [GradeImportValuesController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeImportValuesController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeImportValuesController::class, 'importTemplate']);
    Route::post('/import', [GradeImportValuesController::class, 'import']);
    Route::get('/export', [GradeImportValuesController::class, 'export']);

    Route::post('/bulk-store', [GradeImportValuesController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeImportValuesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeImportValuesController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeImportValuesController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeImportValuesController::class, 'restore']);
    Route::delete('/{id}/force', [GradeImportValuesController::class, 'forceDelete']);

    Route::get('/', [GradeImportValuesController::class, 'index']);
    Route::post('/', [GradeImportValuesController::class, 'store']);
    Route::get('/{id}', [GradeImportValuesController::class, 'show']);
    Route::put('/{id}', [GradeImportValuesController::class, 'update']);
    Route::delete('/{id}', [GradeImportValuesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeImportValuesController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeImportValuesController::class, 'stats']);
});

// ========================
// GRADE_GRADES RESOURCE
// ========================
Route::prefix('grade-grades')->group(function () {
    use App\Http\Controllers\Api\V1\GradeGradesController;

    Route::get('/filters', [GradeGradesController::class, 'filters']);
    Route::get('/suggestions', [GradeGradesController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeGradesController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeGradesController::class, 'importTemplate']);
    Route::post('/import', [GradeGradesController::class, 'import']);
    Route::get('/export', [GradeGradesController::class, 'export']);

    Route::post('/bulk-store', [GradeGradesController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeGradesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeGradesController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeGradesController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeGradesController::class, 'restore']);
    Route::delete('/{id}/force', [GradeGradesController::class, 'forceDelete']);

    Route::get('/', [GradeGradesController::class, 'index']);
    Route::post('/', [GradeGradesController::class, 'store']);
    Route::get('/{id}', [GradeGradesController::class, 'show']);
    Route::put('/{id}', [GradeGradesController::class, 'update']);
    Route::delete('/{id}', [GradeGradesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeGradesController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeGradesController::class, 'stats']);
});

// ========================
// GRADE_ITEMS_HISTORY RESOURCE
// ========================
Route::prefix('grade-items-history')->group(function () {
    use App\Http\Controllers\Api\V1\GradeItemsHistoryController;

    Route::get('/filters', [GradeItemsHistoryController::class, 'filters']);
    Route::get('/suggestions', [GradeItemsHistoryController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeItemsHistoryController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeItemsHistoryController::class, 'importTemplate']);
    Route::post('/import', [GradeItemsHistoryController::class, 'import']);
    Route::get('/export', [GradeItemsHistoryController::class, 'export']);

    Route::post('/bulk-store', [GradeItemsHistoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeItemsHistoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeItemsHistoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeItemsHistoryController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeItemsHistoryController::class, 'restore']);
    Route::delete('/{id}/force', [GradeItemsHistoryController::class, 'forceDelete']);

    Route::get('/', [GradeItemsHistoryController::class, 'index']);
    Route::post('/', [GradeItemsHistoryController::class, 'store']);
    Route::get('/{id}', [GradeItemsHistoryController::class, 'show']);
    Route::put('/{id}', [GradeItemsHistoryController::class, 'update']);
    Route::delete('/{id}', [GradeItemsHistoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeItemsHistoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeItemsHistoryController::class, 'stats']);
});

// ========================
// LTISERVICE_GRADEBOOKSERVICES RESOURCE
// ========================
Route::prefix('ltiservice-gradebookservices')->group(function () {
    use App\Http\Controllers\Api\V1\LtiserviceGradebookservicesController;

    Route::get('/filters', [LtiserviceGradebookservicesController::class, 'filters']);
    Route::get('/suggestions', [LtiserviceGradebookservicesController::class, 'suggestions']);
    Route::post('/advanced-search', [LtiserviceGradebookservicesController::class, 'advancedSearch']);

    Route::get('/import-template', [LtiserviceGradebookservicesController::class, 'importTemplate']);
    Route::post('/import', [LtiserviceGradebookservicesController::class, 'import']);
    Route::get('/export', [LtiserviceGradebookservicesController::class, 'export']);

    Route::post('/bulk-store', [LtiserviceGradebookservicesController::class, 'bulkStore']);
    Route::post('/bulk-update', [LtiserviceGradebookservicesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [LtiserviceGradebookservicesController::class, 'bulkDestroy']);

    Route::get('/trashed', [LtiserviceGradebookservicesController::class, 'trashed']);
    Route::post('/{id}/restore', [LtiserviceGradebookservicesController::class, 'restore']);
    Route::delete('/{id}/force', [LtiserviceGradebookservicesController::class, 'forceDelete']);

    Route::get('/', [LtiserviceGradebookservicesController::class, 'index']);
    Route::post('/', [LtiserviceGradebookservicesController::class, 'store']);
    Route::get('/{id}', [LtiserviceGradebookservicesController::class, 'show']);
    Route::put('/{id}', [LtiserviceGradebookservicesController::class, 'update']);
    Route::delete('/{id}', [LtiserviceGradebookservicesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [LtiserviceGradebookservicesController::class, 'duplicate']);
    Route::get('/{id}/stats', [LtiserviceGradebookservicesController::class, 'stats']);
});

// ========================
// ENROL_LTI_USER_RESOURCE_LINK RESOURCE
// ========================
Route::prefix('enrol-lti-user-resource-link')->group(function () {
    use App\Http\Controllers\Api\V1\EnrolLtiUserResourceLinkController;

    Route::get('/filters', [EnrolLtiUserResourceLinkController::class, 'filters']);
    Route::get('/suggestions', [EnrolLtiUserResourceLinkController::class, 'suggestions']);
    Route::post('/advanced-search', [EnrolLtiUserResourceLinkController::class, 'advancedSearch']);

    Route::get('/import-template', [EnrolLtiUserResourceLinkController::class, 'importTemplate']);
    Route::post('/import', [EnrolLtiUserResourceLinkController::class, 'import']);
    Route::get('/export', [EnrolLtiUserResourceLinkController::class, 'export']);

    Route::post('/bulk-store', [EnrolLtiUserResourceLinkController::class, 'bulkStore']);
    Route::post('/bulk-update', [EnrolLtiUserResourceLinkController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [EnrolLtiUserResourceLinkController::class, 'bulkDestroy']);

    Route::get('/trashed', [EnrolLtiUserResourceLinkController::class, 'trashed']);
    Route::post('/{id}/restore', [EnrolLtiUserResourceLinkController::class, 'restore']);
    Route::delete('/{id}/force', [EnrolLtiUserResourceLinkController::class, 'forceDelete']);

    Route::get('/', [EnrolLtiUserResourceLinkController::class, 'index']);
    Route::post('/', [EnrolLtiUserResourceLinkController::class, 'store']);
    Route::get('/{id}', [EnrolLtiUserResourceLinkController::class, 'show']);
    Route::put('/{id}', [EnrolLtiUserResourceLinkController::class, 'update']);
    Route::delete('/{id}', [EnrolLtiUserResourceLinkController::class, 'destroy']);

    Route::post('/{id}/duplicate', [EnrolLtiUserResourceLinkController::class, 'duplicate']);
    Route::get('/{id}/stats', [EnrolLtiUserResourceLinkController::class, 'stats']);
});

// ========================
// GRADINGFORM_GUIDE_FILLINGS RESOURCE
// ========================
Route::prefix('gradingform-guide-fillings')->group(function () {
    use App\Http\Controllers\Api\V1\GradingformGuideFillingsController;

    Route::get('/filters', [GradingformGuideFillingsController::class, 'filters']);
    Route::get('/suggestions', [GradingformGuideFillingsController::class, 'suggestions']);
    Route::post('/advanced-search', [GradingformGuideFillingsController::class, 'advancedSearch']);

    Route::get('/import-template', [GradingformGuideFillingsController::class, 'importTemplate']);
    Route::post('/import', [GradingformGuideFillingsController::class, 'import']);
    Route::get('/export', [GradingformGuideFillingsController::class, 'export']);

    Route::post('/bulk-store', [GradingformGuideFillingsController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradingformGuideFillingsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradingformGuideFillingsController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradingformGuideFillingsController::class, 'trashed']);
    Route::post('/{id}/restore', [GradingformGuideFillingsController::class, 'restore']);
    Route::delete('/{id}/force', [GradingformGuideFillingsController::class, 'forceDelete']);

    Route::get('/', [GradingformGuideFillingsController::class, 'index']);
    Route::post('/', [GradingformGuideFillingsController::class, 'store']);
    Route::get('/{id}', [GradingformGuideFillingsController::class, 'show']);
    Route::put('/{id}', [GradingformGuideFillingsController::class, 'update']);
    Route::delete('/{id}', [GradingformGuideFillingsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradingformGuideFillingsController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradingformGuideFillingsController::class, 'stats']);
});

// ========================
// GRADINGFORM_RUBRIC_LEVELS RESOURCE
// ========================
Route::prefix('gradingform-rubric-levels')->group(function () {
    use App\Http\Controllers\Api\V1\GradingformRubricLevelsController;

    Route::get('/filters', [GradingformRubricLevelsController::class, 'filters']);
    Route::get('/suggestions', [GradingformRubricLevelsController::class, 'suggestions']);
    Route::post('/advanced-search', [GradingformRubricLevelsController::class, 'advancedSearch']);

    Route::get('/import-template', [GradingformRubricLevelsController::class, 'importTemplate']);
    Route::post('/import', [GradingformRubricLevelsController::class, 'import']);
    Route::get('/export', [GradingformRubricLevelsController::class, 'export']);

    Route::post('/bulk-store', [GradingformRubricLevelsController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradingformRubricLevelsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradingformRubricLevelsController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradingformRubricLevelsController::class, 'trashed']);
    Route::post('/{id}/restore', [GradingformRubricLevelsController::class, 'restore']);
    Route::delete('/{id}/force', [GradingformRubricLevelsController::class, 'forceDelete']);

    Route::get('/', [GradingformRubricLevelsController::class, 'index']);
    Route::post('/', [GradingformRubricLevelsController::class, 'store']);
    Route::get('/{id}', [GradingformRubricLevelsController::class, 'show']);
    Route::put('/{id}', [GradingformRubricLevelsController::class, 'update']);
    Route::delete('/{id}', [GradingformRubricLevelsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradingformRubricLevelsController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradingformRubricLevelsController::class, 'stats']);
});

// ========================
// GRADINGFORM_RUBRIC_FILLINGS RESOURCE
// ========================
Route::prefix('gradingform-rubric-fillings')->group(function () {
    use App\Http\Controllers\Api\V1\GradingformRubricFillingsController;

    Route::get('/filters', [GradingformRubricFillingsController::class, 'filters']);
    Route::get('/suggestions', [GradingformRubricFillingsController::class, 'suggestions']);
    Route::post('/advanced-search', [GradingformRubricFillingsController::class, 'advancedSearch']);

    Route::get('/import-template', [GradingformRubricFillingsController::class, 'importTemplate']);
    Route::post('/import', [GradingformRubricFillingsController::class, 'import']);
    Route::get('/export', [GradingformRubricFillingsController::class, 'export']);

    Route::post('/bulk-store', [GradingformRubricFillingsController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradingformRubricFillingsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradingformRubricFillingsController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradingformRubricFillingsController::class, 'trashed']);
    Route::post('/{id}/restore', [GradingformRubricFillingsController::class, 'restore']);
    Route::delete('/{id}/force', [GradingformRubricFillingsController::class, 'forceDelete']);

    Route::get('/', [GradingformRubricFillingsController::class, 'index']);
    Route::post('/', [GradingformRubricFillingsController::class, 'store']);
    Route::get('/{id}', [GradingformRubricFillingsController::class, 'show']);
    Route::put('/{id}', [GradingformRubricFillingsController::class, 'update']);
    Route::delete('/{id}', [GradingformRubricFillingsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradingformRubricFillingsController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradingformRubricFillingsController::class, 'stats']);
});

// ========================
// QUESTION_ATTEMPT_STEP_DATA RESOURCE
// ========================
Route::prefix('question-attempt-step-data')->group(function () {
    use App\Http\Controllers\Api\V1\QuestionAttemptStepDataController;

    Route::get('/filters', [QuestionAttemptStepDataController::class, 'filters']);
    Route::get('/suggestions', [QuestionAttemptStepDataController::class, 'suggestions']);
    Route::post('/advanced-search', [QuestionAttemptStepDataController::class, 'advancedSearch']);

    Route::get('/import-template', [QuestionAttemptStepDataController::class, 'importTemplate']);
    Route::post('/import', [QuestionAttemptStepDataController::class, 'import']);
    Route::get('/export', [QuestionAttemptStepDataController::class, 'export']);

    Route::post('/bulk-store', [QuestionAttemptStepDataController::class, 'bulkStore']);
    Route::post('/bulk-update', [QuestionAttemptStepDataController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [QuestionAttemptStepDataController::class, 'bulkDestroy']);

    Route::get('/trashed', [QuestionAttemptStepDataController::class, 'trashed']);
    Route::post('/{id}/restore', [QuestionAttemptStepDataController::class, 'restore']);
    Route::delete('/{id}/force', [QuestionAttemptStepDataController::class, 'forceDelete']);

    Route::get('/', [QuestionAttemptStepDataController::class, 'index']);
    Route::post('/', [QuestionAttemptStepDataController::class, 'store']);
    Route::get('/{id}', [QuestionAttemptStepDataController::class, 'show']);
    Route::put('/{id}', [QuestionAttemptStepDataController::class, 'update']);
    Route::delete('/{id}', [QuestionAttemptStepDataController::class, 'destroy']);

    Route::post('/{id}/duplicate', [QuestionAttemptStepDataController::class, 'duplicate']);
    Route::get('/{id}/stats', [QuestionAttemptStepDataController::class, 'stats']);
});

// ========================
// ANALYTICS_USED_FILES RESOURCE
// ========================
Route::prefix('analytics-used-files')->group(function () {
    use App\Http\Controllers\Api\V1\AnalyticsUsedFilesController;

    Route::get('/filters', [AnalyticsUsedFilesController::class, 'filters']);
    Route::get('/suggestions', [AnalyticsUsedFilesController::class, 'suggestions']);
    Route::post('/advanced-search', [AnalyticsUsedFilesController::class, 'advancedSearch']);

    Route::get('/import-template', [AnalyticsUsedFilesController::class, 'importTemplate']);
    Route::post('/import', [AnalyticsUsedFilesController::class, 'import']);
    Route::get('/export', [AnalyticsUsedFilesController::class, 'export']);

    Route::post('/bulk-store', [AnalyticsUsedFilesController::class, 'bulkStore']);
    Route::post('/bulk-update', [AnalyticsUsedFilesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [AnalyticsUsedFilesController::class, 'bulkDestroy']);

    Route::get('/trashed', [AnalyticsUsedFilesController::class, 'trashed']);
    Route::post('/{id}/restore', [AnalyticsUsedFilesController::class, 'restore']);
    Route::delete('/{id}/force', [AnalyticsUsedFilesController::class, 'forceDelete']);

    Route::get('/', [AnalyticsUsedFilesController::class, 'index']);
    Route::post('/', [AnalyticsUsedFilesController::class, 'store']);
    Route::get('/{id}', [AnalyticsUsedFilesController::class, 'show']);
    Route::put('/{id}', [AnalyticsUsedFilesController::class, 'update']);
    Route::delete('/{id}', [AnalyticsUsedFilesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [AnalyticsUsedFilesController::class, 'duplicate']);
    Route::get('/{id}/stats', [AnalyticsUsedFilesController::class, 'stats']);
});

// ========================
// FILE_CONVERSION RESOURCE
// ========================
Route::prefix('file-conversion')->group(function () {
    use App\Http\Controllers\Api\V1\FileConversionController;

    Route::get('/filters', [FileConversionController::class, 'filters']);
    Route::get('/suggestions', [FileConversionController::class, 'suggestions']);
    Route::post('/advanced-search', [FileConversionController::class, 'advancedSearch']);

    Route::get('/import-template', [FileConversionController::class, 'importTemplate']);
    Route::post('/import', [FileConversionController::class, 'import']);
    Route::get('/export', [FileConversionController::class, 'export']);

    Route::post('/bulk-store', [FileConversionController::class, 'bulkStore']);
    Route::post('/bulk-update', [FileConversionController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [FileConversionController::class, 'bulkDestroy']);

    Route::get('/trashed', [FileConversionController::class, 'trashed']);
    Route::post('/{id}/restore', [FileConversionController::class, 'restore']);
    Route::delete('/{id}/force', [FileConversionController::class, 'forceDelete']);

    Route::get('/', [FileConversionController::class, 'index']);
    Route::post('/', [FileConversionController::class, 'store']);
    Route::get('/{id}', [FileConversionController::class, 'show']);
    Route::put('/{id}', [FileConversionController::class, 'update']);
    Route::delete('/{id}', [FileConversionController::class, 'destroy']);

    Route::post('/{id}/duplicate', [FileConversionController::class, 'duplicate']);
    Route::get('/{id}/stats', [FileConversionController::class, 'stats']);
});

// ========================
// TOOL_BRICKFIELD_RESULTS RESOURCE
// ========================
Route::prefix('tool-brickfield-results')->group(function () {
    use App\Http\Controllers\Api\V1\ToolBrickfieldResultsController;

    Route::get('/filters', [ToolBrickfieldResultsController::class, 'filters']);
    Route::get('/suggestions', [ToolBrickfieldResultsController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolBrickfieldResultsController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolBrickfieldResultsController::class, 'importTemplate']);
    Route::post('/import', [ToolBrickfieldResultsController::class, 'import']);
    Route::get('/export', [ToolBrickfieldResultsController::class, 'export']);

    Route::post('/bulk-store', [ToolBrickfieldResultsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolBrickfieldResultsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolBrickfieldResultsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolBrickfieldResultsController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolBrickfieldResultsController::class, 'restore']);
    Route::delete('/{id}/force', [ToolBrickfieldResultsController::class, 'forceDelete']);

    Route::get('/', [ToolBrickfieldResultsController::class, 'index']);
    Route::post('/', [ToolBrickfieldResultsController::class, 'store']);
    Route::get('/{id}', [ToolBrickfieldResultsController::class, 'show']);
    Route::put('/{id}', [ToolBrickfieldResultsController::class, 'update']);
    Route::delete('/{id}', [ToolBrickfieldResultsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolBrickfieldResultsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolBrickfieldResultsController::class, 'stats']);
});

// ========================
// GRADE_GRADES_HISTORY RESOURCE
// ========================
Route::prefix('grade-grades-history')->group(function () {
    use App\Http\Controllers\Api\V1\GradeGradesHistoryController;

    Route::get('/filters', [GradeGradesHistoryController::class, 'filters']);
    Route::get('/suggestions', [GradeGradesHistoryController::class, 'suggestions']);
    Route::post('/advanced-search', [GradeGradesHistoryController::class, 'advancedSearch']);

    Route::get('/import-template', [GradeGradesHistoryController::class, 'importTemplate']);
    Route::post('/import', [GradeGradesHistoryController::class, 'import']);
    Route::get('/export', [GradeGradesHistoryController::class, 'export']);

    Route::post('/bulk-store', [GradeGradesHistoryController::class, 'bulkStore']);
    Route::post('/bulk-update', [GradeGradesHistoryController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [GradeGradesHistoryController::class, 'bulkDestroy']);

    Route::get('/trashed', [GradeGradesHistoryController::class, 'trashed']);
    Route::post('/{id}/restore', [GradeGradesHistoryController::class, 'restore']);
    Route::delete('/{id}/force', [GradeGradesHistoryController::class, 'forceDelete']);

    Route::get('/', [GradeGradesHistoryController::class, 'index']);
    Route::post('/', [GradeGradesHistoryController::class, 'store']);
    Route::get('/{id}', [GradeGradesHistoryController::class, 'show']);
    Route::put('/{id}', [GradeGradesHistoryController::class, 'update']);
    Route::delete('/{id}', [GradeGradesHistoryController::class, 'destroy']);

    Route::post('/{id}/duplicate', [GradeGradesHistoryController::class, 'duplicate']);
    Route::get('/{id}/stats', [GradeGradesHistoryController::class, 'stats']);
});

// ========================
// TOOL_BRICKFIELD_ERRORS RESOURCE
// ========================
Route::prefix('tool-brickfield-errors')->group(function () {
    use App\Http\Controllers\Api\V1\ToolBrickfieldErrorsController;

    Route::get('/filters', [ToolBrickfieldErrorsController::class, 'filters']);
    Route::get('/suggestions', [ToolBrickfieldErrorsController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolBrickfieldErrorsController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolBrickfieldErrorsController::class, 'importTemplate']);
    Route::post('/import', [ToolBrickfieldErrorsController::class, 'import']);
    Route::get('/export', [ToolBrickfieldErrorsController::class, 'export']);

    Route::post('/bulk-store', [ToolBrickfieldErrorsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolBrickfieldErrorsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolBrickfieldErrorsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolBrickfieldErrorsController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolBrickfieldErrorsController::class, 'restore']);
    Route::delete('/{id}/force', [ToolBrickfieldErrorsController::class, 'forceDelete']);

    Route::get('/', [ToolBrickfieldErrorsController::class, 'index']);
    Route::post('/', [ToolBrickfieldErrorsController::class, 'store']);
    Route::get('/{id}', [ToolBrickfieldErrorsController::class, 'show']);
    Route::put('/{id}', [ToolBrickfieldErrorsController::class, 'update']);
    Route::delete('/{id}', [ToolBrickfieldErrorsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolBrickfieldErrorsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolBrickfieldErrorsController::class, 'stats']);
});

// ========================
// TOOL_POLICY_VERSIONS RESOURCE
// ========================
Route::prefix('tool-policy-versions')->group(function () {
    use App\Http\Controllers\Api\V1\ToolPolicyVersionsController;

    Route::get('/filters', [ToolPolicyVersionsController::class, 'filters']);
    Route::get('/suggestions', [ToolPolicyVersionsController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolPolicyVersionsController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolPolicyVersionsController::class, 'importTemplate']);
    Route::post('/import', [ToolPolicyVersionsController::class, 'import']);
    Route::get('/export', [ToolPolicyVersionsController::class, 'export']);

    Route::post('/bulk-store', [ToolPolicyVersionsController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolPolicyVersionsController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolPolicyVersionsController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolPolicyVersionsController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolPolicyVersionsController::class, 'restore']);
    Route::delete('/{id}/force', [ToolPolicyVersionsController::class, 'forceDelete']);

    Route::get('/', [ToolPolicyVersionsController::class, 'index']);
    Route::post('/', [ToolPolicyVersionsController::class, 'store']);
    Route::get('/{id}', [ToolPolicyVersionsController::class, 'show']);
    Route::put('/{id}', [ToolPolicyVersionsController::class, 'update']);
    Route::delete('/{id}', [ToolPolicyVersionsController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolPolicyVersionsController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolPolicyVersionsController::class, 'stats']);
});

// ========================
// TOOL_POLICY RESOURCE
// ========================
Route::prefix('tool-policy')->group(function () {
    use App\Http\Controllers\Api\V1\ToolPolicyController;

    Route::get('/filters', [ToolPolicyController::class, 'filters']);
    Route::get('/suggestions', [ToolPolicyController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolPolicyController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolPolicyController::class, 'importTemplate']);
    Route::post('/import', [ToolPolicyController::class, 'import']);
    Route::get('/export', [ToolPolicyController::class, 'export']);

    Route::post('/bulk-store', [ToolPolicyController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolPolicyController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolPolicyController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolPolicyController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolPolicyController::class, 'restore']);
    Route::delete('/{id}/force', [ToolPolicyController::class, 'forceDelete']);

    Route::get('/', [ToolPolicyController::class, 'index']);
    Route::post('/', [ToolPolicyController::class, 'store']);
    Route::get('/{id}', [ToolPolicyController::class, 'show']);
    Route::put('/{id}', [ToolPolicyController::class, 'update']);
    Route::delete('/{id}', [ToolPolicyController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolPolicyController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolPolicyController::class, 'stats']);
});

// ========================
// TOOL_POLICY_ACCEPTANCES RESOURCE
// ========================
Route::prefix('tool-policy-acceptances')->group(function () {
    use App\Http\Controllers\Api\V1\ToolPolicyAcceptancesController;

    Route::get('/filters', [ToolPolicyAcceptancesController::class, 'filters']);
    Route::get('/suggestions', [ToolPolicyAcceptancesController::class, 'suggestions']);
    Route::post('/advanced-search', [ToolPolicyAcceptancesController::class, 'advancedSearch']);

    Route::get('/import-template', [ToolPolicyAcceptancesController::class, 'importTemplate']);
    Route::post('/import', [ToolPolicyAcceptancesController::class, 'import']);
    Route::get('/export', [ToolPolicyAcceptancesController::class, 'export']);

    Route::post('/bulk-store', [ToolPolicyAcceptancesController::class, 'bulkStore']);
    Route::post('/bulk-update', [ToolPolicyAcceptancesController::class, 'bulkUpdate']);
    Route::post('/bulk-delete', [ToolPolicyAcceptancesController::class, 'bulkDestroy']);

    Route::get('/trashed', [ToolPolicyAcceptancesController::class, 'trashed']);
    Route::post('/{id}/restore', [ToolPolicyAcceptancesController::class, 'restore']);
    Route::delete('/{id}/force', [ToolPolicyAcceptancesController::class, 'forceDelete']);

    Route::get('/', [ToolPolicyAcceptancesController::class, 'index']);
    Route::post('/', [ToolPolicyAcceptancesController::class, 'store']);
    Route::get('/{id}', [ToolPolicyAcceptancesController::class, 'show']);
    Route::put('/{id}', [ToolPolicyAcceptancesController::class, 'update']);
    Route::delete('/{id}', [ToolPolicyAcceptancesController::class, 'destroy']);

    Route::post('/{id}/duplicate', [ToolPolicyAcceptancesController::class, 'duplicate']);
    Route::get('/{id}/stats', [ToolPolicyAcceptancesController::class, 'stats']);
});
