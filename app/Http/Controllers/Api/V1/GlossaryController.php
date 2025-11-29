<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GlossaryController extends BaseController
{
    protected $table = 'glossary';

    /**
     * Display a listing of glossaries.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $courseId = $request->input('course_id');
            
            $query = DB::table($this->table)
                ->join('course', 'glossary.course', '=', 'course.id')
                ->select(
                    'glossary.id',
                    'glossary.course',
                    'course.fullname as course_name',
                    'glossary.name',
                    'glossary.intro',
                    'glossary.allowduplicatedentries',
                    'glossary.displayformat',
                    'glossary.mainglossary',
                    'glossary.globalglossary',
                    'glossary.timecreated',
                    'glossary.timemodified'
                );

            if ($courseId) {
                $query->where('glossary.course', $courseId);
            }

            $glossaries = $query->orderBy('glossary.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($glossaries, 'Glossaries retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving glossaries', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created glossary.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'course' => 'required|integer|exists:course,id',
                'name' => 'required|string|max:255',
                'intro' => 'string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['course', 'name', 'intro']);
            $data['introformat'] = $request->input('introformat', 1);
            $data['allowduplicatedentries'] = $request->input('allowduplicatedentries', 0);
            $data['displayformat'] = $request->input('displayformat', 'dictionary');
            $data['mainglossary'] = $request->input('mainglossary', 0);
            $data['showspecial'] = $request->input('showspecial', 1);
            $data['showalphabet'] = $request->input('showalphabet', 1);
            $data['showall'] = $request->input('showall', 1);
            $data['allowcomments'] = $request->input('allowcomments', 0);
            $data['allowprintview'] = $request->input('allowprintview', 1);
            $data['usedynalink'] = $request->input('usedynalink', 1);
            $data['defaultapproval'] = $request->input('defaultapproval', 1);
            $data['globalglossary'] = $request->input('globalglossary', 0);
            $data['entbypage'] = $request->input('entbypage', 10);
            $data['editalways'] = $request->input('editalways', 0);
            $data['timecreated'] = time();
            $data['timemodified'] = time();

            $glossaryId = DB::table($this->table)->insertGetId($data);
            $glossary = DB::table($this->table)->where('id', $glossaryId)->first();

            return $this->sendResponse($glossary, 'Glossary created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating glossary', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified glossary.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $glossary = DB::table($this->table)
                ->join('course', 'glossary.course', '=', 'course.id')
                ->where('glossary.id', $id)
                ->select('glossary.*', 'course.fullname as course_name')
                ->first();

            if (!$glossary) {
                return $this->sendNotFoundResponse('Glossary not found');
            }

            return $this->sendResponse($glossary, 'Glossary retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving glossary', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified glossary.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $glossary = DB::table($this->table)->where('id', $id)->first();

            if (!$glossary) {
                return $this->sendNotFoundResponse('Glossary not found');
            }

            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'intro' => 'string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['name', 'intro', 'allowduplicatedentries', 'displayformat', 'allowcomments']);
            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedGlossary = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedGlossary, 'Glossary updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating glossary', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified glossary.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $glossary = DB::table($this->table)->where('id', $id)->first();

            if (!$glossary) {
                return $this->sendNotFoundResponse('Glossary not found');
            }

            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Glossary deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting glossary', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get glossary entries.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function entries(int $id, Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');

            $query = DB::table('glossary_entries as ge')
                ->join('users as u', 'ge.userid', '=', 'u.id')
                ->where('ge.glossaryid', $id)
                ->where('u.deleted', 0)
                ->select(
                    'ge.id',
                    'ge.glossaryid',
                    'ge.userid',
                    'u.firstname',
                    'u.lastname',
                    'ge.concept',
                    'ge.definition',
                    'ge.definitionformat',
                    'ge.attachment',
                    'ge.timecreated',
                    'ge.timemodified',
                    'ge.teacherentry',
                    'ge.approved'
                );

            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('ge.concept', 'like', "%{$search}%")
                      ->orWhere('ge.definition', 'like', "%{$search}%");
                });
            }

            $entries = $query->orderBy('ge.concept', 'asc')->paginate($perPage);

            return $this->sendPaginatedResponse($entries, 'Glossary entries retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving glossary entries', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get a specific entry.
     *
     * @param int $glossaryId
     * @param int $entryId
     * @return JsonResponse
     */
    public function entry(int $glossaryId, int $entryId): JsonResponse
    {
        try {
            $entry = DB::table('glossary_entries as ge')
                ->join('users as u', 'ge.userid', '=', 'u.id')
                ->where('ge.glossaryid', $glossaryId)
                ->where('ge.id', $entryId)
                ->where('u.deleted', 0)
                ->select('ge.*', 'u.firstname', 'u.lastname', 'u.email')
                ->first();

            if (!$entry) {
                return $this->sendNotFoundResponse('Entry not found');
            }

            return $this->sendResponse($entry, 'Glossary entry retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving glossary entry', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get glossary categories.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function categories(int $id): JsonResponse
    {
        try {
            $categories = DB::table('glossary_categories')
                ->where('glossaryid', $id)
                ->select('id', 'glossaryid', 'name', 'usedynalink')
                ->orderBy('name', 'asc')
                ->get();

            return $this->sendResponse($categories, 'Glossary categories retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving glossary categories', ['error' => $e->getMessage()]);
        }
    }
}
