# Moodle API Controllers - Laravel v1

This directory contains Laravel API controllers structured for the Moodle database schema. All controllers extend the `BaseController` which provides standardized JSON responses.

## Directory Structure

```
app/Http/Controllers/Api/V1/
├── BaseController.php
├── UserController.php
├── CourseController.php
├── CourseCategoryController.php
├── AssignmentController.php
├── QuizController.php
├── EnrolmentController.php
├── GradeController.php
├── ForumController.php
├── GroupController.php
├── RoleController.php
└── BadgeController.php
```

## Base Controller

**File:** `BaseController.php`

Provides standardized response methods:
- `sendResponse($result, $message, $code)` - Success response
- `sendError($error, $errorMessages, $code)` - Error response
- `sendPaginatedResponse($result, $message)` - Paginated response
- `sendNotFoundResponse($message)` - 404 response
- `sendValidationError($errors)` - 422 validation error response
- `sendUnauthorizedResponse($message)` - 401 unauthorized response
- `sendForbiddenResponse($message)` - 403 forbidden response

---

## 1. UserController

**File:** `UserController.php`  
**Table:** `users`

### Endpoints:

#### GET `/api/v1/users`
- **Description:** Get paginated list of users
- **Query Parameters:**
  - `per_page` (optional, default: 15)
  - `search` (optional) - Search in username, firstname, lastname, email
- **Response:** Paginated user list (excluding deleted users)

#### POST `/api/v1/users`
- **Description:** Create a new user
- **Required Fields:**
  - `username` (string, max: 100, unique)
  - `password` (string, min: 8)
  - `firstname` (string, max: 100)
  - `lastname` (string, max: 100)
  - `email` (email, max: 100, unique)
- **Optional Fields:**
  - `auth` (string, max: 20, default: 'manual')
  - `confirmed` (boolean, default: 1)
  - `suspended` (boolean, default: 0)

#### GET `/api/v1/users/{id}`
- **Description:** Get specific user details
- **Response:** User object (password excluded)

#### PUT/PATCH `/api/v1/users/{id}`
- **Description:** Update user information
- **Fields:** username, firstname, lastname, email, password, confirmed, suspended

#### DELETE `/api/v1/users/{id}`
- **Description:** Soft delete a user (sets deleted = 1)

#### GET `/api/v1/users/{id}/enrollments`
- **Description:** Get user's course enrollments
- **Response:** List of courses with enrolment details

---

## 2. CourseController

**File:** `CourseController.php`  
**Table:** `course`

### Endpoints:

#### GET `/api/v1/courses`
- **Description:** Get paginated list of courses
- **Query Parameters:**
  - `per_page` (optional, default: 15)
  - `search` (optional) - Search in fullname, shortname, idnumber
  - `category` (optional) - Filter by category ID

#### POST `/api/v1/courses`
- **Description:** Create a new course
- **Required Fields:**
  - `fullname` (string, max: 254)
  - `shortname` (string, max: 255, unique)
  - `category` (integer, exists in course_categories)
- **Optional Fields:**
  - `summary`, `summaryformat`, `format`, `visible`, `startdate`, `enddate`

#### GET `/api/v1/courses/{id}`
- **Description:** Get specific course details

#### PUT/PATCH `/api/v1/courses/{id}`
- **Description:** Update course information

#### DELETE `/api/v1/courses/{id}`
- **Description:** Delete a course (cannot delete site course ID=1)

#### GET `/api/v1/courses/{id}/modules`
- **Description:** Get course modules/activities
- **Response:** List of course modules with section information

#### GET `/api/v1/courses/{id}/enrolled-users`
- **Description:** Get paginated list of enrolled users
- **Query Parameters:**
  - `per_page` (optional, default: 15)

---

## 3. CourseCategoryController

**File:** `CourseCategoryController.php`  
**Table:** `course_categories`

### Endpoints:

#### GET `/api/v1/categories`
- **Description:** Get paginated list of course categories
- **Query Parameters:**
  - `per_page` (optional, default: 15)
  - `parent_id` (optional) - Filter by parent category

#### POST `/api/v1/categories`
- **Description:** Create a new course category
- **Required Fields:**
  - `name` (string, max: 255)
- **Optional Fields:**
  - `idnumber`, `description`, `parent`, `visible`
- **Note:** Automatically calculates `path` and `depth`

#### GET `/api/v1/categories/{id}`
- **Description:** Get specific category details

#### PUT/PATCH `/api/v1/categories/{id}`
- **Description:** Update category information

#### DELETE `/api/v1/categories/{id}`
- **Description:** Delete a category
- **Validation:** Cannot delete if has courses or child categories

#### GET `/api/v1/categories/{id}/courses`
- **Description:** Get courses in a category
- **Query Parameters:**
  - `per_page` (optional, default: 15)

#### GET `/api/v1/categories/tree`
- **Description:** Get hierarchical category tree
- **Response:** Nested category structure

---

## 4. AssignmentController

**File:** `AssignmentController.php`  
**Table:** `assign`

### Endpoints:

#### GET `/api/v1/assignments`
- **Description:** Get paginated list of assignments
- **Query Parameters:**
  - `per_page` (optional, default: 15)
  - `course_id` (optional) - Filter by course

#### POST `/api/v1/assignments`
- **Description:** Create a new assignment
- **Required Fields:**
  - `course` (integer, exists in course)
  - `name` (string, max: 255)
  - `intro` (string)
  - `grade` (integer)

#### GET `/api/v1/assignments/{id}`
- **Description:** Get specific assignment details

#### PUT/PATCH `/api/v1/assignments/{id}`
- **Description:** Update assignment information

#### DELETE `/api/v1/assignments/{id}`
- **Description:** Delete an assignment

#### GET `/api/v1/assignments/{id}/submissions`
- **Description:** Get assignment submissions
- **Query Parameters:**
  - `per_page` (optional, default: 15)
- **Response:** Latest submissions with user info and grades

#### GET `/api/v1/assignments/{id}/grades`
- **Description:** Get assignment grades
- **Query Parameters:**
  - `per_page` (optional, default: 15)

---

## 5. QuizController

**File:** `QuizController.php`  
**Table:** `quiz`

### Endpoints:

#### GET `/api/v1/quizzes`
- **Description:** Get paginated list of quizzes
- **Query Parameters:**
  - `per_page` (optional, default: 15)
  - `course_id` (optional) - Filter by course

#### POST `/api/v1/quizzes`
- **Description:** Create a new quiz
- **Required Fields:**
  - `course` (integer, exists in course)
  - `name` (string, max: 255)
  - `intro` (string)
  - `grade` (numeric)

#### GET `/api/v1/quizzes/{id}`
- **Description:** Get specific quiz details

#### PUT/PATCH `/api/v1/quizzes/{id}`
- **Description:** Update quiz information

#### DELETE `/api/v1/quizzes/{id}`
- **Description:** Delete a quiz

#### GET `/api/v1/quizzes/{id}/attempts`
- **Description:** Get quiz attempts
- **Query Parameters:**
  - `per_page` (optional, default: 15)

#### GET `/api/v1/quizzes/{id}/grades`
- **Description:** Get quiz grades
- **Query Parameters:**
  - `per_page` (optional, default: 15)

#### GET `/api/v1/quizzes/{id}/questions`
- **Description:** Get quiz questions
- **Response:** Questions with slots and marks

---

## 6. EnrolmentController

**File:** `EnrolmentController.php`  
**Tables:** `enrol`, `user_enrolments`

### Endpoints:

#### GET `/api/v1/enrolments`
- **Description:** Get enrolment methods for a course
- **Query Parameters:**
  - `course_id` (required)

#### POST `/api/v1/enrolments/enrol`
- **Description:** Enrol a user in a course
- **Required Fields:**
  - `enrol_id` (integer, exists in enrol)
  - `user_id` (integer, exists in users)
- **Optional Fields:**
  - `status` (0=active, 1=suspended)
  - `timestart`, `timeend`

#### GET `/api/v1/enrolments/users`
- **Description:** Get enrolled users for a course
- **Query Parameters:**
  - `course_id` (required)
  - `per_page` (optional, default: 15)
  - `status` (optional) - Filter by status

#### PUT/PATCH `/api/v1/enrolments/{id}`
- **Description:** Update enrolment details
- **Fields:** status, timestart, timeend

#### DELETE `/api/v1/enrolments/{id}`
- **Description:** Unenrol a user

#### POST `/api/v1/enrolments/{id}/suspend`
- **Description:** Suspend an enrolment

#### POST `/api/v1/enrolments/{id}/activate`
- **Description:** Activate an enrolment

#### GET `/api/v1/enrolments/user/{userId}`
- **Description:** Get all enrolments for a specific user
- **Query Parameters:**
  - `per_page` (optional, default: 15)

---

## 7. GradeController

**File:** `GradeController.php`  
**Tables:** `grade_items`, `grade_grades`

### Endpoints:

#### GET `/api/v1/grades`
- **Description:** Get grade items for a course
- **Query Parameters:**
  - `course_id` (required)

#### GET `/api/v1/grades/item/{gradeItemId}`
- **Description:** Get grades for a specific grade item
- **Query Parameters:**
  - `per_page` (optional, default: 15)

#### GET `/api/v1/grades/user`
- **Description:** Get all grades for a user in a course
- **Query Parameters:**
  - `user_id` (required)
  - `course_id` (required)

#### PUT/PATCH `/api/v1/grades/{id}`
- **Description:** Update a grade
- **Fields:** rawgrade, finalgrade, feedback, feedbackformat

#### POST `/api/v1/grades`
- **Description:** Create a new grade
- **Required Fields:**
  - `itemid` (integer, exists in grade_items)
  - `userid` (integer, exists in users)

#### GET `/api/v1/grades/course/{courseId}/summary`
- **Description:** Get course gradebook summary
- **Response:** Statistics for each grade item

#### GET `/api/v1/grades/course/{courseId}/categories`
- **Description:** Get grade categories for a course

---

## 8. ForumController

**File:** `ForumController.php`  
**Table:** `forum`

### Endpoints:

#### GET `/api/v1/forums`
- **Description:** Get paginated list of forums
- **Query Parameters:**
  - `per_page` (optional, default: 15)
  - `course_id` (optional) - Filter by course

#### POST `/api/v1/forums`
- **Description:** Create a new forum
- **Required Fields:**
  - `course` (integer, exists in course)
  - `type` (string, in: single,eachuser,general,qanda,blog,news)
  - `name` (string, max: 255)
  - `intro` (string)

#### GET `/api/v1/forums/{id}`
- **Description:** Get specific forum details

#### PUT/PATCH `/api/v1/forums/{id}`
- **Description:** Update forum information

#### DELETE `/api/v1/forums/{id}`
- **Description:** Delete a forum

#### GET `/api/v1/forums/{id}/discussions`
- **Description:** Get forum discussions
- **Query Parameters:**
  - `per_page` (optional, default: 15)
- **Response:** Discussions with post counts

#### GET `/api/v1/forums/discussion/{discussionId}/posts`
- **Description:** Get posts in a discussion
- **Query Parameters:**
  - `per_page` (optional, default: 15)

#### POST `/api/v1/forums/discussion`
- **Description:** Create a new discussion
- **Required Fields:**
  - `forum_id`, `name`, `message`, `userid`

#### POST `/api/v1/forums/post`
- **Description:** Create a new post in a discussion
- **Required Fields:**
  - `discussion_id`, `parent`, `subject`, `message`, `userid`

---

## 9. GroupController

**File:** `GroupController.php`  
**Table:** `groups`

### Endpoints:

#### GET `/api/v1/groups`
- **Description:** Get paginated list of groups
- **Query Parameters:**
  - `per_page` (optional, default: 15)
  - `course_id` (optional) - Filter by course

#### POST `/api/v1/groups`
- **Description:** Create a new group
- **Required Fields:**
  - `courseid` (integer, exists in course)
  - `name` (string, max: 254)

#### GET `/api/v1/groups/{id}`
- **Description:** Get specific group details

#### PUT/PATCH `/api/v1/groups/{id}`
- **Description:** Update group information

#### DELETE `/api/v1/groups/{id}`
- **Description:** Delete a group and its members

#### GET `/api/v1/groups/{id}/members`
- **Description:** Get group members
- **Query Parameters:**
  - `per_page` (optional, default: 15)

#### POST `/api/v1/groups/member`
- **Description:** Add a member to a group
- **Required Fields:**
  - `groupid` (integer, exists in groups)
  - `userid` (integer, exists in users)

#### DELETE `/api/v1/groups/member/{membershipId}`
- **Description:** Remove a member from a group

#### GET `/api/v1/groups/course/{courseId}/groupings`
- **Description:** Get groupings for a course

#### GET `/api/v1/groups/grouping/{groupingId}/groups`
- **Description:** Get groups in a grouping

---

## 10. RoleController

**File:** `RoleController.php`  
**Table:** `role`

### Endpoints:

#### GET `/api/v1/roles`
- **Description:** Get list of all roles

#### GET `/api/v1/roles/{id}`
- **Description:** Get specific role details

#### GET `/api/v1/roles/user/{userId}/assignments`
- **Description:** Get role assignments for a user
- **Query Parameters:**
  - `per_page` (optional, default: 15)

#### GET `/api/v1/roles/context/{contextId}/assignments`
- **Description:** Get role assignments in a context
- **Query Parameters:**
  - `per_page` (optional, default: 15)
  - `role_id` (optional) - Filter by role

#### POST `/api/v1/roles/assign`
- **Description:** Assign a role to a user in a context
- **Required Fields:**
  - `roleid` (integer, exists in role)
  - `userid` (integer, exists in users)
  - `contextid` (integer, exists in context)

#### DELETE `/api/v1/roles/assign/{id}`
- **Description:** Unassign a role

#### GET `/api/v1/roles/{roleId}/capabilities`
- **Description:** Get role capabilities
- **Query Parameters:**
  - `per_page` (optional, default: 50)
  - `context_id` (optional)

#### GET `/api/v1/roles/{roleId}/users`
- **Description:** Get users with a specific role
- **Query Parameters:**
  - `per_page` (optional, default: 15)
  - `context_id` (optional)

#### GET `/api/v1/roles/{roleId}/allowed-assignments`
- **Description:** Get allowed role assignments for a role

---

## 11. BadgeController

**File:** `BadgeController.php`  
**Table:** `badge`

### Endpoints:

#### GET `/api/v1/badges`
- **Description:** Get paginated list of badges
- **Query Parameters:**
  - `per_page` (optional, default: 15)
  - `course_id` (optional) - Filter by course

#### GET `/api/v1/badges/{id}`
- **Description:** Get specific badge details

#### GET `/api/v1/badges/{badgeId}/issued`
- **Description:** Get issued badges
- **Query Parameters:**
  - `per_page` (optional, default: 15)

#### GET `/api/v1/badges/user/{userId}`
- **Description:** Get badges for a user
- **Query Parameters:**
  - `per_page` (optional, default: 15)

#### GET `/api/v1/badges/{badgeId}/criteria`
- **Description:** Get badge criteria

#### POST `/api/v1/badges/issue`
- **Description:** Issue a badge to a user
- **Required Fields:**
  - `badgeid` (integer, exists in badge)
  - `userid` (integer, exists in users)

---

## Response Format

### Success Response
```json
{
  "success": true,
  "data": { ... },
  "message": "Success message"
}
```

### Paginated Response
```json
{
  "success": true,
  "data": [ ... ],
  "message": "Success message",
  "pagination": {
    "total": 100,
    "per_page": 15,
    "current_page": 1,
    "last_page": 7,
    "from": 1,
    "to": 15
  }
}
```

### Error Response
```json
{
  "success": false,
  "message": "Error message",
  "data": { "field": ["error details"] }
}
```

---

## Common HTTP Status Codes

- `200` - OK (Success)
- `201` - Created (Resource created successfully)
- `400` - Bad Request (Invalid parameters)
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `409` - Conflict (Resource already exists)
- `422` - Unprocessable Entity (Validation error)
- `500` - Internal Server Error

---

## Usage Notes

1. **Timestamps**: All timestamps are Unix timestamps (seconds since epoch)
2. **Soft Deletes**: Users table uses soft deletes (deleted = 1)
3. **Pagination**: Default is 15 items per page, can be adjusted with `per_page` parameter
4. **Search**: Supports LIKE queries on relevant fields
5. **Validation**: All controllers include Laravel validation
6. **Password Hashing**: Uses PHP's `password_hash()` function
7. **Foreign Keys**: Referenced tables are validated

---

## Database Tables Covered

✅ **Implemented Controllers:**
- users
- course
- course_categories
- assign (assignments)
- quiz
- enrol / user_enrolments
- grade_items / grade_grades
- forum / forum_discussions / forum_posts
- groups / groups_members / groupings
- role / role_assignments / role_capabilities
- badge / badge_issued

📋 **Additional Tables Available** (from Dump20251129.sql):
- lesson, book, chat, choice, data, feedback, glossary
- h5pactivity, imscp, label, lti, page, resource, scorm, survey, url, wiki, workshop
- question (question bank tables)
- analytics, ai_providers, backup, cache, cohort, competency
- message, notifications, events, files, logs
- And 400+ more Moodle tables

---

## Next Steps

To extend this API:

1. **Add Routes**: Define routes in `routes/api.php`
2. **Add Middleware**: Implement authentication/authorization
3. **Add More Controllers**: Create controllers for other Moodle modules
4. **Add Resources**: Use Laravel API Resources for response transformation
5. **Add Tests**: Write unit and feature tests
6. **Add Documentation**: Generate OpenAPI/Swagger documentation

---

**Generated:** 2025-11-29  
**Laravel Version:** Tested with Laravel 10+  
**Database:** MySQL 8.x (Moodle schema)
