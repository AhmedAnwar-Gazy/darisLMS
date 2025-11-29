<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookController extends BaseController
{
    protected $table = 'book';

    /**
     * Display a listing of books.
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
                ->join('course', 'book.course', '=', 'course.id')
                ->select(
                    'book.id',
                    'book.course',
                    'course.fullname as course_name',
                    'book.name',
                    'book.intro',
                    'book.numbering',
                    'book.navstyle',
                    'book.timecreated',
                    'book.timemodified'
                );

            if ($courseId) {
                $query->where('book.course', $courseId);
            }

            $books = $query->orderBy('book.timecreated', 'desc')->paginate($perPage);

            return $this->sendPaginatedResponse($books, 'Books retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving books', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created book.
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
            $data['numbering'] = $request->input('numbering', 0);
            $data['navstyle'] = $request->input('navstyle', 1);
            $data['customtitles'] = $request->input('customtitles', 0);
            $data['revision'] = 1;
            $data['timecreated'] = time();
            $data['timemodified'] = time();

            $bookId = DB::table($this->table)->insertGetId($data);
            $book = DB::table($this->table)->where('id', $bookId)->first();

            return $this->sendResponse($book, 'Book created successfully', 201);
        } catch (\Exception $e) {
            return $this->sendError('Error creating book', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified book.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $book = DB::table($this->table)
                ->join('course', 'book.course', '=', 'course.id')
                ->where('book.id', $id)
                ->select('book.*', 'course.fullname as course_name')
                ->first();

            if (!$book) {
                return $this->sendNotFoundResponse('Book not found');
            }

            return $this->sendResponse($book, 'Book retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving book', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified book.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $book = DB::table($this->table)->where('id', $id)->first();

            if (!$book) {
                return $this->sendNotFoundResponse('Book not found');
            }

            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'intro' => 'string',
            ]);

            if ($validator->fails()) {
                return $this->sendValidationError($validator->errors()->toArray());
            }

            $data = $request->only(['name', 'intro', 'numbering', 'navstyle']);
            $data['timemodified'] = time();

            DB::table($this->table)->where('id', $id)->update($data);
            $updatedBook = DB::table($this->table)->where('id', $id)->first();

            return $this->sendResponse($updatedBook, 'Book updated successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error updating book', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified book.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $book = DB::table($this->table)->where('id', $id)->first();

            if (!$book) {
                return $this->sendNotFoundResponse('Book not found');
            }

            DB::table($this->table)->where('id', $id)->delete();

            return $this->sendResponse([], 'Book deleted successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error deleting book', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get book chapters.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function chapters(int $id): JsonResponse
    {
        try {
            $chapters = DB::table('book_chapters')
                ->where('bookid', $id)
                ->select('id', 'bookid', 'pagenum', 'subchapter', 'title', 'content', 'contentformat', 'hidden', 'timecreated', 'timemodified', 'importsrc')
                ->orderBy('pagenum', 'asc')
                ->get();

            return $this->sendResponse($chapters, 'Book chapters retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving book chapters', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get a specific chapter.
     *
     * @param int $bookId
     * @param int $chapterId
     * @return JsonResponse
     */
    public function chapter(int $bookId, int $chapterId): JsonResponse
    {
        try {
            $chapter = DB::table('book_chapters')
                ->where('bookid', $bookId)
                ->where('id', $chapterId)
                ->first();

            if (!$chapter) {
                return $this->sendNotFoundResponse('Chapter not found');
            }

            return $this->sendResponse($chapter, 'Chapter retrieved successfully');
        } catch (\Exception $e) {
            return $this->sendError('Error retrieving chapter', ['error' => $e->getMessage()]);
        }
    }
}
