# Moodle Laravel API - Quick Reference Guide

## 🚀 Quick Start

### 1. Controllers Location
```
app/Http/Controllers/Api/V1/
```

### 2. Add Routes
Copy routes from `routes/api_v1_example.php` to `routes/api.php`

### 3. Test Endpoints
```bash
# Example: Get all users
curl http://localhost/api/v1/users

# Example: Get specific user
curl http://localhost/api/v1/users/1

# Example: Create user
curl -X POST http://localhost/api/v1/users \
  -H "Content-Type: application/json" \
  -d '{"username":"john","password":"password123","firstname":"John","lastname":"Doe","email":"john@example.com"}'
```

---

## 📋 Controllers Overview

| # | Controller | Tables | Endpoints | Purpose |
|---|-----------|---------|-----------|---------|
| 1 | **BaseController** | - | - | Standardized API responses |
| 2 | **UserController** | users | 6 | User management |
| 3 | **CourseController** | course | 7 | Course management |
| 4 | **CourseCategoryController** | course_categories | 7 | Category management |
| 5 | **AssignmentController** | assign | 7 | Assignment management |
| 6 | **QuizController** | quiz | 8 | Quiz management |
| 7 | **EnrolmentController** | enrol, user_enrolments | 8 | Enrolment management |
| 8 | **GradeController** | grade_items, grade_grades | 7 | Grade management |
| 9 | **ForumController** | forum, discussions, posts | 9 | Forum management |
| 10 | **GroupController** | groups, members, groupings | 10 | Group management |
| 11 | **RoleController** | role, assignments, capabilities | 9 | Role & permissions |
| 12 | **BadgeController** | badge, badge_issued | 6 | Badge management |

**Total:** 12 controllers, 84+ endpoints

---

## 🔗 Common Endpoints

### Users
```
GET    /api/v1/users                      # List users
POST   /api/v1/users                      # Create user
GET    /api/v1/users/{id}                 # Get user
PUT    /api/v1/users/{id}                 # Update user
DELETE /api/v1/users/{id}                 # Delete user
GET    /api/v1/users/{id}/enrollments     # User enrollments
```

### Courses
```
GET    /api/v1/courses                    # List courses
POST   /api/v1/courses                    # Create course
GET    /api/v1/courses/{id}               # Get course
PUT    /api/v1/courses/{id}               # Update course
DELETE /api/v1/courses/{id}               # Delete course
GET    /api/v1/courses/{id}/modules       # Course modules
GET    /api/v1/courses/{id}/enrolled-users # Enrolled users
```

### Enrolments
```
GET    /api/v1/enrolments?course_id=1     # Get enrolment methods
POST   /api/v1/enrolments/enrol           # Enrol user
GET    /api/v1/enrolments/users?course_id=1 # Get enrolled users
DELETE /api/v1/enrolments/{id}            # Unenrol user
POST   /api/v1/enrolments/{id}/suspend    # Suspend enrolment
POST   /api/v1/enrolments/{id}/activate   # Activate enrolment
```

### Grades
```
GET    /api/v1/grades?course_id=1         # Grade items
GET    /api/v1/grades/user?user_id=1&course_id=1 # User grades
POST   /api/v1/grades                     # Create grade
PUT    /api/v1/grades/{id}                # Update grade
GET    /api/v1/grades/course/{id}/summary # Gradebook summary
```

### Forums
```
GET    /api/v1/forums?course_id=1         # List forums
POST   /api/v1/forums                     # Create forum
GET    /api/v1/forums/{id}/discussions    # Forum discussions
POST   /api/v1/forums/discussion          # Create discussion
POST   /api/v1/forums/post                # Create post
```

### Groups
```
GET    /api/v1/groups?course_id=1         # List groups
POST   /api/v1/groups                     # Create group
GET    /api/v1/groups/{id}/members        # Group members
POST   /api/v1/groups/member              # Add member
DELETE /api/v1/groups/member/{id}         # Remove member
```

### Roles
```
GET    /api/v1/roles                      # List roles
GET    /api/v1/roles/user/{id}/assignments # User role assignments
POST   /api/v1/roles/assign               # Assign role
DELETE /api/v1/roles/assign/{id}          # Unassign role
GET    /api/v1/roles/{id}/capabilities    # Role capabilities
```

---

## 📝 Request/Response Examples

### Create User
**Request:**
```bash
POST /api/v1/users
Content-Type: application/json

{
  "username": "john.doe",
  "password": "SecurePass123!",
  "firstname": "John",
  "lastname": "Doe",
  "email": "john.doe@example.com",
  "confirmed": 1,
  "suspended": 0
}
```

**Response (201 Created):**
```json
{
  "success": true,
  "data": {
    "id": 123,
    "username": "john.doe",
    "firstname": "John",
    "lastname": "Doe",
    "email": "john.doe@example.com",
    "auth": "manual",
    "confirmed": 1,
    "suspended": 0,
    "timecreated": 1701274800,
    "timemodified": 1701274800
  },
  "message": "User created successfully"
}
```

### List Courses (Paginated)
**Request:**
```bash
GET /api/v1/courses?per_page=10&search=Mathematics&category=5
```

**Response (200 OK):**
```json
{
  "success": true,
  "data": [
    {
      "id": 45,
      "category": 5,
      "fullname": "Mathematics 101",
      "shortname": "MATH101",
      "summary": "Introduction to Mathematics",
      "visible": 1,
      "startdate": 1701274800,
      "enddate": 1709136000
    }
  ],
  "message": "Courses retrieved successfully",
  "pagination": {
    "total": 25,
    "per_page": 10,
    "current_page": 1,
    "last_page": 3,
    "from": 1,
    "to": 10
  }
}
```

### Enrol User
**Request:**
```bash
POST /api/v1/enrolments/enrol
Content-Type: application/json

{
  "enrol_id": 5,
  "user_id": 123,
  "status": 0,
  "timestart": 1701274800,
  "timeend": 1709136000
}
```

**Response (201 Created):**
```json
{
  "success": true,
  "data": {
    "id": 456,
    "enrolid": 5,
    "userid": 123,
    "status": 0,
    "timestart": 1701274800,
    "timeend": 1709136000,
    "timecreated": 1701274800,
    "timemodified": 1701274800
  },
  "message": "User enrolled successfully"
}
```

### Error Response
**Request:**
```bash
POST /api/v1/users
Content-Type: application/json

{
  "username": "john",
  "password": "123"
}
```

**Response (422 Unprocessable Entity):**
```json
{
  "success": false,
  "message": "Validation Error",
  "data": {
    "password": ["The password must be at least 8 characters."],
    "firstname": ["The firstname field is required."],
    "lastname": ["The lastname field is required."],
    "email": ["The email field is required."]
  }
}
```

---

## 🔍 Query Parameters

### Pagination
```
?per_page=20          # Items per page (default: 15)
?page=2               # Page number
```

### Filtering
```
?course_id=5          # Filter by course
?category=3           # Filter by category
?parent_id=2          # Filter by parent
?status=0             # Filter by status
?role_id=4            # Filter by role
```

### Search
```
?search=mathematics   # Search in relevant fields
```

---

## 🔐 Authentication (To Implement)

### Laravel Sanctum
```php
// In routes/api.php
Route::middleware('auth:sanctum')->group(function () {
    // Protected routes
});
```

### Usage
```bash
# Login to get token
POST /api/login
{
  "email": "user@example.com",
  "password": "password"
}

# Use token in requests
curl -H "Authorization: Bearer YOUR_TOKEN" \
  http://localhost/api/v1/users
```

---

## ⚡ Rate Limiting (To Implement)

```php
// In routes/api.php
Route::middleware('throttle:60,1')->group(function () {
    // Limited to 60 requests per minute
});
```

---

## 🛠️ Development Tools

### Postman Collection
1. Import endpoints from README
2. Set base URL: `http://localhost/api/v1`
3. Add environment variables for tokens

### Testing
```bash
# Create feature tests
php artisan make:test UserControllerTest
php artisan make:test CourseControllerTest

# Run tests
php artisan test
```

### API Documentation
```bash
# Install Scribe
composer require --dev knuckleswtf/scribe

# Generate docs
php artisan scribe:generate
```

---

## 📊 HTTP Status Codes

| Code | Meaning | Usage |
|------|---------|-------|
| 200 | OK | Successful GET/PUT |
| 201 | Created | Successful POST |
| 400 | Bad Request | Invalid parameters |
| 401 | Unauthorized | Authentication required |
| 403 | Forbidden | Insufficient permissions |
| 404 | Not Found | Resource doesn't exist |
| 409 | Conflict | Resource already exists |
| 422 | Unprocessable Entity | Validation failed |
| 500 | Internal Server Error | Server error |

---

## 🎯 Best Practices

### 1. Always Use Try-Catch
```php
try {
    // Your code
} catch (\Exception $e) {
    return $this->sendError('Error message', ['error' => $e->getMessage()]);
}
```

### 2. Validate Input
```php
$validator = Validator::make($request->all(), [
    'field' => 'required|string|max:255'
]);

if ($validator->fails()) {
    return $this->sendValidationError($validator->errors()->toArray());
}
```

### 3. Use Pagination
```php
$results = DB::table('table')->paginate($perPage);
return $this->sendPaginatedResponse($results, 'Message');
```

### 4. Filter Deleted Records
```php
->where('deleted', 0)  // For users and other soft-delete tables
```

---

## 📚 Additional Resources

- **Full Documentation:** `app/Http/Controllers/Api/V1/README.md`
- **Implementation Summary:** `CONTROLLERS_SUMMARY.md`
- **Example Routes:** `routes/api_v1_example.php`
- **Database Schema:** `Dump20251129.sql`

---

## 🐛 Common Issues

### Issue: 404 Not Found
**Solution:** Check if routes are imported in `routes/api.php`

### Issue: Validation Errors
**Solution:** Check required fields in controller validation rules

### Issue: Foreign Key Errors
**Solution:** Ensure referenced IDs exist in related tables

### Issue: Unauthorized
**Solution:** Implement authentication middleware

---

**Created:** November 29, 2025  
**Laravel Version:** 10+  
**Database:** MySQL 8.x (Moodle)
