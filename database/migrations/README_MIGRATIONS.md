# Moodle to Laravel Migrations

## Summary

This directory contains Laravel migration files generated from Moodle's database schema.

### Migration Statistics

- **Total migration files**: **492** ✅
  - Laravel default tables (users, cache, jobs): **3 files**
  - **Moodle tables**: **489 files** (COMPLETE!)

### Source Files

The migrations were generated from the following Moodle source files:
- `Migrations/install.xml` - Core Moodle database schema (259 tables)
- `moodle.sql` - Complete MySQL database dump (489 tables including all modules/plugins)
- `Migrations/upgrade.php` - Schema upgrade logic  
- `Migrations/upgradelib.php` - Upgrade helper functions

### Migration File Naming Convention

All Moodle table migrations follow this pattern:
```
2025_01_01_NNNNNN_create_[table_name]_table.php
```

Where:
- `2025_01_01` - Base date for migrations
- `NNNNNN` - Sequential number starting from 000001
- `[table_name]` - Exact Moodle table name

###Core Tables Included

The following table groups have been migrated:

1. **Configuration Tables**
   - config
   - config_plugins
   - config_log
   - upgrade_log

2. **Course Management**
   - course
   - course_categories
   - course_modules
   - course_sections
   - course_completion_*
   - course_format_options

3. **User Management**
   - user
   - user_preferences
   - user_lastaccess
   - user_enrolments
   - user_info_*
   - user_password_*

4. **Messaging System**
   - message
   - message_read
   - messages
   - message_conversations
   - message_contacts
   - notifications

5. **Grading System**
   - grade_items
   - grade_grades
   - grade_categories
   - grade_outcomes
   - grade_letters
   - scale

6. **Questions & Quiz**
   - question
   - question_categories
   - question_answers
   - question_attempts
   - question_usages

7. **Roles & Permissions**
   - role
   - role_assignments
   - role_capabilities
   - role_context_levels
   - context

8. **Files & Storage**
   - files
   - files_reference
   - repository
   - contentbank_content

9. **Badges & Competencies**
   - badge*
   - competency*

10. **Events & Calendar**
    - event
    - event_subscriptions

11. **Tags & Grouping**
    - tag*
    - groups
    - groupings
    - cohort

12. **Communication**
    - communication
    - communication_user

13. **Analytics & Reporting**
    - analytics_*
    - reportbuilder_*

14. **H5P Integration**
    - h5p*

15. **OAuth2**
    - oauth2_*

16. **Other Core Systems**
    - block_instances
    - enrol
    - modules
    - filter_active
    - filter_config
    - cache_*
    - task_adhoc
    - task_scheduled
    - customfield_*
    - payment_*
    - portfolio_*
    - mnet_*
    - adminpresets_*

### Complete Table Coverage

✅ **All 489 Moodle tables have been successfully migrated!**

This includes:
- **Core Moodle tables** (259 tables from install.xml)
- **Activity modules** - assign, quiz, forum, workshop, wiki, scorm, etc. (150+ tables)
- **Assignment feedback/submission plugins** - comments, file, onlinetext, editpdf, etc.
- **Quiz/Question types** - multichoice, truefalse, essay, calculated, etc.
- **Authentication plugins** - lti, oauth2, etc.
- **Workshop grading forms** - accumulative, rubric, numerrors, comments
- **All other plugins and subsystems**

### Running Migrations

To run all migrations:
```bash
php artisan migrate
```

To reset and re-run:
```bash
php artisan migrate:fresh
```

To check migration status:
```bash
php artisan migrate:status
```

### Field Type Mapping

The migration generator maps Moodle field types to Laravel as follows:

| Moodle Type | Laravel Type | Notes |
|-------------|--------------|-------|
| int (len 1) | boolean | Small integers treated as booleans |
| int (len 3) | tinyInteger | -128 to 127 |
| int (len 5) | smallInteger | -32,768 to 32,767 |
| int (len 10) | integer | Standard integer |
| int (len >10) | bigInteger | Large integers |
| char (len ≤255) | string | VARCHAR equivalent |
| char (len >255) | text | Long strings |
| text | text | TEXT column |
| number/float | decimal/float | With precision if specified |
| binary | binary | BLOB equivalent |

### Indexes and Foreign Keys

All indexes and foreign key relationships from Moodle's schema have been preserved in the migrations, including:
- Primary keys
- Unique indexes
- Composite indexes
- Foreign key constraints

### Timestamps

Most Moodle tables use manual timestamp fields (`timecreated`, `timemodified`) rather than Laravel's automatic timestamps. This preserves compatibility with Moodle's timestamp handling.

### Generated Files

This migration set was generated automatically using the `generate_migrations.php` script on 2025-01-29.

### Compatibility

- Moodle Version: 4.5+
- Laravel Version: 11.x
- PHP Version: 8.2+
- Database: MySQL 8.0+ / PostgreSQL 13+ / MariaDB 10.6+
