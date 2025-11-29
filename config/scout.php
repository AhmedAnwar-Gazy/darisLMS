<?php

return [

    'driver' => env('SCOUT_DRIVER', 'collection'),
    'prefix' => env('SCOUT_PREFIX', ''),
    'queue' => env('SCOUT_QUEUE', false),
    'after_commit' => false,
    'chunk' => [
        'searchable' => 500,
        'unsearchable' => 500,
    ],
    'soft_delete' => false,
    'identify' => env('SCOUT_IDENTIFY', false),

    'typesense' => [
        'client-settings' => [
            'api_key' => env('TYPESENSE_API_KEY', 'xyz'),
            'nodes' => [
                [
                    'host' => env('TYPESENSE_HOST', 'localhost'),
                    'port' => env('TYPESENSE_PORT', '8108'),
                    'path' => env('TYPESENSE_PATH', ''),
                    'protocol' => env('TYPESENSE_PROTOCOL', 'http'),
                ],
            ],
            'nearest_node' => [
                'host' => env('TYPESENSE_HOST', 'localhost'),
                'port' => env('TYPESENSE_PORT', '8108'),
                'path' => env('TYPESENSE_PATH', ''),
                'protocol' => env('TYPESENSE_PROTOCOL', 'http'),
            ],
            'connection_timeout_seconds' => env('TYPESENSE_CONNECTION_TIMEOUT_SECONDS', 2),
            'healthcheck_interval_seconds' => env('TYPESENSE_HEALTHCHECK_INTERVAL_SECONDS', 30),
            'num_retries' => env('TYPESENSE_NUM_RETRIES', 3),
            'retry_interval_seconds' => env('TYPESENSE_RETRY_INTERVAL_SECONDS', 1),
        ],
        'model-settings' => [
            App\Models\ToolBrickfieldChecks::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'checktype', 'type' => 'string'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'checkgroup', 'type' => 'int64'],
                        ['name' => 'status', 'type' => 'int32', 'facet' => true],
                        ['name' => 'severity', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'checktype,shortname',
                ],
            ],
            App\Models\ToolBrickfieldProcess::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'item', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'innercontextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timecompleted', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'item',
                ],
            ],
            App\Models\ToolBrickfieldSchedule::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextlevel', 'type' => 'int64'],
                        ['name' => 'instanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'int32', 'facet' => true],
                        ['name' => 'timeanalyzed', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolCohortroles::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'cohortid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolCustomlangComponents::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'version', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,version',
                ],
            ],
            App\Models\ToolDataprivacyPurpose::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'bool', 'facet' => true],
                        ['name' => 'lawfulbases', 'type' => 'string'],
                        ['name' => 'sensitivedatareasons', 'type' => 'string'],
                        ['name' => 'retentionperiod', 'type' => 'string'],
                        ['name' => 'protected', 'type' => 'bool', 'facet' => true],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,description,lawfulbases,sensitivedatareasons,retentionperiod',
                ],
            ],
            App\Models\ToolDataprivacyCategory::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'bool', 'facet' => true],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,description',
                ],
            ],
            App\Models\ToolDataprivacyCtxexpired::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'unexpiredroles', 'type' => 'string'],
                        ['name' => 'expiredroles', 'type' => 'string'],
                        ['name' => 'defaultexpired', 'type' => 'bool', 'facet' => true],
                        ['name' => 'status', 'type' => 'int32', 'facet' => true],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'unexpiredroles,expiredroles',
                ],
            ],
            App\Models\ToolDataprivacyContextlist::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'component',
                ],
            ],
            App\Models\ToolMfa::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'factor', 'type' => 'string'],
                        ['name' => 'secret', 'type' => 'string'],
                        ['name' => 'label', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'createdfromip', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'lastverified', 'type' => 'int64'],
                        ['name' => 'revoked', 'type' => 'bool', 'facet' => true],
                        ['name' => 'lockcounter', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'factor,secret,label,createdfromip',
                ],
            ],
            App\Models\ToolMonitorRules::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'bool', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'plugin', 'type' => 'string'],
                        ['name' => 'eventname', 'type' => 'string'],
                        ['name' => 'template', 'type' => 'string'],
                        ['name' => 'templateformat', 'type' => 'bool', 'facet' => true],
                        ['name' => 'frequency', 'type' => 'int32'],
                        ['name' => 'timewindow', 'type' => 'int32'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'description,name,plugin,eventname,template',
                ],
            ],
            App\Models\ToolUsertoursTours::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'pathmatch', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'endtourlabel', 'type' => 'string'],
                        ['name' => 'configdata', 'type' => 'string'],
                        ['name' => 'displaystepnumbers', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,description,pathmatch,endtourlabel,configdata',
                ],
            ],
            App\Models\BlockRecentActivity::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'cmid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'action', 'type' => 'bool', 'facet' => true],
                        ['name' => 'modname', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'modname',
                ],
            ],
            App\Models\BlockRssClient::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'title', 'type' => 'string'],
                        ['name' => 'preferredtitle', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'shared', 'type' => 'int32'],
                        ['name' => 'url', 'type' => 'string'],
                        ['name' => 'skiptime', 'type' => 'int64'],
                        ['name' => 'skipuntil', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'title,preferredtitle,description,url',
                ],
            ],
            App\Models\EnrolLtiLti2Consumer::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'consumerkey256', 'type' => 'string'],
                        ['name' => 'consumerkey', 'type' => 'string'],
                        ['name' => 'secret', 'type' => 'string'],
                        ['name' => 'ltiversion', 'type' => 'string'],
                        ['name' => 'consumername', 'type' => 'string'],
                        ['name' => 'consumerversion', 'type' => 'string'],
                        ['name' => 'consumerguid', 'type' => 'string', 'facet' => true],
                        ['name' => 'profile', 'type' => 'string'],
                        ['name' => 'toolproxy', 'type' => 'string'],
                        ['name' => 'settings', 'type' => 'string'],
                        ['name' => 'protected', 'type' => 'bool', 'facet' => true],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'enablefrom', 'type' => 'int64'],
                        ['name' => 'enableuntil', 'type' => 'int64'],
                        ['name' => 'lastaccess', 'type' => 'int64'],
                        ['name' => 'created', 'type' => 'int64'],
                        ['name' => 'updated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,consumerkey256,consumerkey,secret,ltiversion,consumername,consumerversion,consumerguid,profile,toolproxy,settings',
                ],
            ],
            App\Models\EnrolLtiLti2ShareKey::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'sharekey', 'type' => 'string'],
                        ['name' => 'resourcelinkid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'autoapprove', 'type' => 'bool', 'facet' => true],
                        ['name' => 'expires', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'sharekey',
                ],
            ],
            App\Models\EnrolLtiAppRegistration::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'platformid', 'type' => 'string', 'facet' => true],
                        ['name' => 'clientid', 'type' => 'string', 'facet' => true],
                        ['name' => 'uniqueid', 'type' => 'string', 'facet' => true],
                        ['name' => 'platformclienthash', 'type' => 'string'],
                        ['name' => 'platformuniqueidhash', 'type' => 'string'],
                        ['name' => 'authenticationrequesturl', 'type' => 'string'],
                        ['name' => 'jwksurl', 'type' => 'string'],
                        ['name' => 'accesstokenurl', 'type' => 'string'],
                        ['name' => 'status', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,platformid,clientid,uniqueid,platformclienthash,platformuniqueidhash,authenticationrequesturl,jwksurl,accesstokenurl',
                ],
            ],
            App\Models\Config::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,value',
                ],
            ],
            App\Models\ConfigPlugins::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'plugin', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'plugin,name,value',
                ],
            ],
            App\Models\Course::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'category', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'fullname', 'type' => 'string'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'summary', 'type' => 'string'],
                        ['name' => 'summaryformat', 'type' => 'int32'],
                        ['name' => 'format', 'type' => 'string', 'facet' => true],
                        ['name' => 'showgrades', 'type' => 'int32'],
                        ['name' => 'newsitems', 'type' => 'int32'],
                        ['name' => 'startdate', 'type' => 'int64'],
                        ['name' => 'enddate', 'type' => 'int64'],
                        ['name' => 'relativedatesmode', 'type' => 'bool', 'facet' => true],
                        ['name' => 'marker', 'type' => 'int64'],
                        ['name' => 'maxbytes', 'type' => 'int64'],
                        ['name' => 'legacyfiles', 'type' => 'int32'],
                        ['name' => 'showreports', 'type' => 'int32'],
                        ['name' => 'visible', 'type' => 'bool', 'facet' => true],
                        ['name' => 'visibleold', 'type' => 'bool', 'facet' => true],
                        ['name' => 'downloadcontent', 'type' => 'bool', 'facet' => true],
                        ['name' => 'groupmode', 'type' => 'int32'],
                        ['name' => 'groupmodeforce', 'type' => 'int32'],
                        ['name' => 'defaultgroupingid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'lang', 'type' => 'string', 'facet' => true],
                        ['name' => 'calendartype', 'type' => 'string'],
                        ['name' => 'theme', 'type' => 'string', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'requested', 'type' => 'bool', 'facet' => true],
                        ['name' => 'enablecompletion', 'type' => 'bool', 'facet' => true],
                        ['name' => 'completionnotify', 'type' => 'bool', 'facet' => true],
                        ['name' => 'cacherev', 'type' => 'int64'],
                        ['name' => 'originalcourseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'showactivitydates', 'type' => 'bool', 'facet' => true],
                        ['name' => 'showcompletionconditions', 'type' => 'bool', 'facet' => true],
                        ['name' => 'pdfexportfont', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'fullname,shortname,idnumber,summary,format,lang,calendartype,theme,pdfexportfont',
                ],
            ],
            App\Models\CourseCategories::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'parent', 'type' => 'int64'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'coursecount', 'type' => 'int64'],
                        ['name' => 'visible', 'type' => 'bool', 'facet' => true],
                        ['name' => 'visibleold', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'depth', 'type' => 'int64'],
                        ['name' => 'path', 'type' => 'string'],
                        ['name' => 'theme', 'type' => 'string', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,idnumber,description,path,theme',
                ],
            ],
            App\Models\CourseCompletionAggrMethd::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'criteriatype', 'type' => 'int64'],
                        ['name' => 'method', 'type' => 'bool', 'facet' => true],
                        ['name' => 'value', 'type' => 'float'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CourseCompletionCriteria::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'criteriatype', 'type' => 'int64'],
                        ['name' => 'module', 'type' => 'string'],
                        ['name' => 'moduleinstance', 'type' => 'int64'],
                        ['name' => 'courseinstance', 'type' => 'int64'],
                        ['name' => 'enrolperiod', 'type' => 'int64'],
                        ['name' => 'timeend', 'type' => 'int64'],
                        ['name' => 'gradepass', 'type' => 'float'],
                        ['name' => 'role', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'module',
                ],
            ],
            App\Models\CourseCompletionCritCompl::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'criteriaid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'gradefinal', 'type' => 'float'],
                        ['name' => 'unenroled', 'type' => 'int64'],
                        ['name' => 'timecompleted', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CourseCompletions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'timeenrolled', 'type' => 'int64'],
                        ['name' => 'timestarted', 'type' => 'int64'],
                        ['name' => 'timecompleted', 'type' => 'int64'],
                        ['name' => 'reaggregate', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CourseModulesCompletion::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'coursemoduleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'completionstate', 'type' => 'bool', 'facet' => true],
                        ['name' => 'overrideby', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CourseSections::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'section', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'summary', 'type' => 'string'],
                        ['name' => 'summaryformat', 'type' => 'int32'],
                        ['name' => 'sequence', 'type' => 'string'],
                        ['name' => 'visible', 'type' => 'bool', 'facet' => true],
                        ['name' => 'availability', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,summary,sequence,availability',
                ],
            ],
            App\Models\CourseRequest::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'fullname', 'type' => 'string'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'summary', 'type' => 'string'],
                        ['name' => 'summaryformat', 'type' => 'int32'],
                        ['name' => 'category', 'type' => 'int64', 'facet' => true],
                        ['name' => 'reason', 'type' => 'string'],
                        ['name' => 'requester', 'type' => 'int64'],
                        ['name' => 'password', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'fullname,shortname,summary,reason,password',
                ],
            ],
            App\Models\CacheFilters::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'filter', 'type' => 'string'],
                        ['name' => 'version', 'type' => 'int64'],
                        ['name' => 'md5key', 'type' => 'string'],
                        ['name' => 'rawtext', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'filter,md5key,rawtext',
                ],
            ],
            App\Models\Log::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'time', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'ip', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'module', 'type' => 'string'],
                        ['name' => 'cmid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'action', 'type' => 'string', 'facet' => true],
                        ['name' => 'url', 'type' => 'string'],
                        ['name' => 'info', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'ip,module,action,url,info',
                ],
            ],
            App\Models\LogQueries::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'qtype', 'type' => 'int32'],
                        ['name' => 'sqltext', 'type' => 'string'],
                        ['name' => 'sqlparams', 'type' => 'string'],
                        ['name' => 'error', 'type' => 'int32'],
                        ['name' => 'info', 'type' => 'string'],
                        ['name' => 'backtrace', 'type' => 'string'],
                        ['name' => 'exectime', 'type' => 'float'],
                        ['name' => 'timelogged', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'sqltext,sqlparams,info,backtrace',
                ],
            ],
            App\Models\LogDisplay::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'module', 'type' => 'string'],
                        ['name' => 'action', 'type' => 'string', 'facet' => true],
                        ['name' => 'mtable', 'type' => 'string'],
                        ['name' => 'field', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'module,action,mtable,field,component',
                ],
            ],
            App\Models\Message::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'useridfrom', 'type' => 'int64'],
                        ['name' => 'useridto', 'type' => 'int64'],
                        ['name' => 'subject', 'type' => 'string'],
                        ['name' => 'fullmessage', 'type' => 'string'],
                        ['name' => 'fullmessageformat', 'type' => 'int32'],
                        ['name' => 'fullmessagehtml', 'type' => 'string'],
                        ['name' => 'smallmessage', 'type' => 'string'],
                        ['name' => 'notification', 'type' => 'bool', 'facet' => true],
                        ['name' => 'contexturl', 'type' => 'string'],
                        ['name' => 'contexturlname', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timeuserfromdeleted', 'type' => 'int64'],
                        ['name' => 'timeusertodeleted', 'type' => 'int64'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'eventtype', 'type' => 'string'],
                        ['name' => 'customdata', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'subject,fullmessage,fullmessagehtml,smallmessage,contexturl,contexturlname,component,eventtype,customdata',
                ],
            ],
            App\Models\MessageRead::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'useridfrom', 'type' => 'int64'],
                        ['name' => 'useridto', 'type' => 'int64'],
                        ['name' => 'subject', 'type' => 'string'],
                        ['name' => 'fullmessage', 'type' => 'string'],
                        ['name' => 'fullmessageformat', 'type' => 'int32'],
                        ['name' => 'fullmessagehtml', 'type' => 'string'],
                        ['name' => 'smallmessage', 'type' => 'string'],
                        ['name' => 'notification', 'type' => 'bool', 'facet' => true],
                        ['name' => 'contexturl', 'type' => 'string'],
                        ['name' => 'contexturlname', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timeread', 'type' => 'int64'],
                        ['name' => 'timeuserfromdeleted', 'type' => 'int64'],
                        ['name' => 'timeusertodeleted', 'type' => 'int64'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'eventtype', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'subject,fullmessage,fullmessagehtml,smallmessage,contexturl,contexturlname,component,eventtype',
                ],
            ],
            App\Models\Modules::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'cron', 'type' => 'int64'],
                        ['name' => 'lastcron', 'type' => 'int64'],
                        ['name' => 'search', 'type' => 'string'],
                        ['name' => 'visible', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,search',
                ],
            ],
            App\Models\MyPages::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'private', 'type' => 'bool', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name',
                ],
            ],
            App\Models\User::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'auth', 'type' => 'string', 'facet' => true],
                        ['name' => 'confirmed', 'type' => 'bool', 'facet' => true],
                        ['name' => 'policyagreed', 'type' => 'bool', 'facet' => true],
                        ['name' => 'deleted', 'type' => 'bool', 'facet' => true],
                        ['name' => 'suspended', 'type' => 'bool', 'facet' => true],
                        ['name' => 'mnethostid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'username', 'type' => 'string'],
                        ['name' => 'password', 'type' => 'string'],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'firstname', 'type' => 'string'],
                        ['name' => 'lastname', 'type' => 'string'],
                        ['name' => 'email', 'type' => 'string'],
                        ['name' => 'emailstop', 'type' => 'bool', 'facet' => true],
                        ['name' => 'phone1', 'type' => 'string'],
                        ['name' => 'phone2', 'type' => 'string'],
                        ['name' => 'institution', 'type' => 'string'],
                        ['name' => 'department', 'type' => 'string'],
                        ['name' => 'address', 'type' => 'string'],
                        ['name' => 'city', 'type' => 'string'],
                        ['name' => 'country', 'type' => 'string'],
                        ['name' => 'lang', 'type' => 'string', 'facet' => true],
                        ['name' => 'calendartype', 'type' => 'string'],
                        ['name' => 'theme', 'type' => 'string', 'facet' => true],
                        ['name' => 'timezone', 'type' => 'string'],
                        ['name' => 'firstaccess', 'type' => 'int64'],
                        ['name' => 'lastaccess', 'type' => 'int64'],
                        ['name' => 'lastlogin', 'type' => 'int64'],
                        ['name' => 'currentlogin', 'type' => 'int64'],
                        ['name' => 'lastip', 'type' => 'string'],
                        ['name' => 'secret', 'type' => 'string'],
                        ['name' => 'picture', 'type' => 'int64'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'mailformat', 'type' => 'bool', 'facet' => true],
                        ['name' => 'maildigest', 'type' => 'bool', 'facet' => true],
                        ['name' => 'maildisplay', 'type' => 'int32', 'facet' => true],
                        ['name' => 'autosubscribe', 'type' => 'bool', 'facet' => true],
                        ['name' => 'trackforums', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'trustbitmask', 'type' => 'int64'],
                        ['name' => 'imagealt', 'type' => 'string'],
                        ['name' => 'lastnamephonetic', 'type' => 'string'],
                        ['name' => 'firstnamephonetic', 'type' => 'string'],
                        ['name' => 'middlename', 'type' => 'string'],
                        ['name' => 'alternatename', 'type' => 'string'],
                        ['name' => 'moodlenetprofile', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'auth,username,password,idnumber,firstname,lastname,email,phone1,phone2,institution,department,address,city,country,lang,calendartype,theme,timezone,lastip,secret,description,imagealt,lastnamephonetic,firstnamephonetic,middlename,alternatename,moodlenetprofile',
                ],
            ],
            App\Models\UserPreferences::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,value',
                ],
            ],
            App\Models\UserLastaccess::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeaccess', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\StatsDaily::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeend', 'type' => 'int64'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'stattype', 'type' => 'string'],
                        ['name' => 'stat1', 'type' => 'int64'],
                        ['name' => 'stat2', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'stattype',
                ],
            ],
            App\Models\StatsWeekly::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeend', 'type' => 'int64'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'stattype', 'type' => 'string'],
                        ['name' => 'stat1', 'type' => 'int64'],
                        ['name' => 'stat2', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'stattype',
                ],
            ],
            App\Models\StatsMonthly::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeend', 'type' => 'int64'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'stattype', 'type' => 'string'],
                        ['name' => 'stat1', 'type' => 'int64'],
                        ['name' => 'stat2', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'stattype',
                ],
            ],
            App\Models\StatsUserDaily::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeend', 'type' => 'int64'],
                        ['name' => 'statsreads', 'type' => 'int64'],
                        ['name' => 'statswrites', 'type' => 'int64'],
                        ['name' => 'stattype', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'stattype',
                ],
            ],
            App\Models\StatsUserWeekly::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeend', 'type' => 'int64'],
                        ['name' => 'statsreads', 'type' => 'int64'],
                        ['name' => 'statswrites', 'type' => 'int64'],
                        ['name' => 'stattype', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'stattype',
                ],
            ],
            App\Models\StatsUserMonthly::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeend', 'type' => 'int64'],
                        ['name' => 'statsreads', 'type' => 'int64'],
                        ['name' => 'statswrites', 'type' => 'int64'],
                        ['name' => 'stattype', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'stattype',
                ],
            ],
            App\Models\Role::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'archetype', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,shortname,description,archetype',
                ],
            ],
            App\Models\Context::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextlevel', 'type' => 'int64'],
                        ['name' => 'instanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'path', 'type' => 'string'],
                        ['name' => 'depth', 'type' => 'int32'],
                        ['name' => 'locked', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'path',
                ],
            ],
            App\Models\ContextTemp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'path', 'type' => 'string'],
                        ['name' => 'depth', 'type' => 'int32'],
                        ['name' => 'locked', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'path',
                ],
            ],
            App\Models\Capabilities::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'captype', 'type' => 'string'],
                        ['name' => 'contextlevel', 'type' => 'int64'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'riskbitmask', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,captype,component',
                ],
            ],
            App\Models\UserInfoField::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'datatype', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'required', 'type' => 'int32'],
                        ['name' => 'locked', 'type' => 'int32'],
                        ['name' => 'visible', 'type' => 'int32', 'facet' => true],
                        ['name' => 'forceunique', 'type' => 'int32'],
                        ['name' => 'signup', 'type' => 'int32'],
                        ['name' => 'defaultdata', 'type' => 'string'],
                        ['name' => 'defaultdataformat', 'type' => 'int32'],
                        ['name' => 'param1', 'type' => 'string'],
                        ['name' => 'param2', 'type' => 'string'],
                        ['name' => 'param3', 'type' => 'string'],
                        ['name' => 'param4', 'type' => 'string'],
                        ['name' => 'param5', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'shortname,name,datatype,description,defaultdata,param1,param2,param3,param4,param5',
                ],
            ],
            App\Models\UserInfoCategory::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name',
                ],
            ],
            App\Models\UserInfoData::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'fieldid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'data', 'type' => 'string'],
                        ['name' => 'dataformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'data',
                ],
            ],
            App\Models\QuestionCategories::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'info', 'type' => 'string'],
                        ['name' => 'infoformat', 'type' => 'int32'],
                        ['name' => 'stamp', 'type' => 'string'],
                        ['name' => 'parent', 'type' => 'int64'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'idnumber', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,info,stamp,idnumber',
                ],
            ],
            App\Models\MnetApplication::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'display_name', 'type' => 'string'],
                        ['name' => 'xmlrpc_server_url', 'type' => 'string'],
                        ['name' => 'sso_land_url', 'type' => 'string'],
                        ['name' => 'sso_jump_url', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,display_name,xmlrpc_server_url,sso_land_url,sso_jump_url',
                ],
            ],
            App\Models\MnetHost2service::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'hostid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'serviceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'publish', 'type' => 'bool', 'facet' => true],
                        ['name' => 'subscribe', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\MnetLog::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'hostid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'remoteid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'time', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'ip', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'coursename', 'type' => 'string'],
                        ['name' => 'module', 'type' => 'string'],
                        ['name' => 'cmid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'action', 'type' => 'string', 'facet' => true],
                        ['name' => 'url', 'type' => 'string'],
                        ['name' => 'info', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'ip,coursename,module,action,url,info',
                ],
            ],
            App\Models\MnetRpc::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'functionname', 'type' => 'string'],
                        ['name' => 'xmlrpcpath', 'type' => 'string'],
                        ['name' => 'plugintype', 'type' => 'string'],
                        ['name' => 'pluginname', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'help', 'type' => 'string'],
                        ['name' => 'profile', 'type' => 'string'],
                        ['name' => 'filename', 'type' => 'string'],
                        ['name' => 'classname', 'type' => 'string'],
                        ['name' => 'static', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'functionname,xmlrpcpath,plugintype,pluginname,help,profile,filename,classname',
                ],
            ],
            App\Models\MnetRemoteRpc::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'functionname', 'type' => 'string'],
                        ['name' => 'xmlrpcpath', 'type' => 'string'],
                        ['name' => 'plugintype', 'type' => 'string'],
                        ['name' => 'pluginname', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'functionname,xmlrpcpath,plugintype,pluginname',
                ],
            ],
            App\Models\MnetService::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'apiversion', 'type' => 'string'],
                        ['name' => 'offer', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,description,apiversion',
                ],
            ],
            App\Models\MnetService2rpc::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'serviceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'rpcid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\MnetRemoteService2rpc::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'serviceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'rpcid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\MnetSsoAccessControl::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'username', 'type' => 'string'],
                        ['name' => 'mnet_host_id', 'type' => 'int64', 'facet' => true],
                        ['name' => 'accessctrl', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'username,accessctrl',
                ],
            ],
            App\Models\EventsHandlers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'eventname', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'handlerfile', 'type' => 'string'],
                        ['name' => 'handlerfunction', 'type' => 'string'],
                        ['name' => 'schedule', 'type' => 'string'],
                        ['name' => 'status', 'type' => 'int64', 'facet' => true],
                        ['name' => 'internal', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'eventname,component,handlerfile,handlerfunction,schedule',
                ],
            ],
            App\Models\TagColl::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'isdefault', 'type' => 'int32'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'sortorder', 'type' => 'int32'],
                        ['name' => 'searchable', 'type' => 'int32'],
                        ['name' => 'customurl', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,component,customurl',
                ],
            ],
            App\Models\GradeLetters::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'lowerboundary', 'type' => 'float'],
                        ['name' => 'letter', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'letter',
                ],
            ],
            App\Models\CacheFlags::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'flagtype', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'value', 'type' => 'string'],
                        ['name' => 'expiry', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'flagtype,name,value',
                ],
            ],
            App\Models\PortfolioInstance::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'plugin', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'visible', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'plugin,name',
                ],
            ],
            App\Models\MessageProviders::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'capability', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,component,capability',
                ],
            ],
            App\Models\MessageProcessors::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name',
                ],
            ],
            App\Models\Repository::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'string', 'facet' => true],
                        ['name' => 'visible', 'type' => 'bool', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'type',
                ],
            ],
            App\Models\RepositoryInstanceConfig::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'instanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,value',
                ],
            ],
            App\Models\BackupCourses::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'laststarttime', 'type' => 'int64'],
                        ['name' => 'lastendtime', 'type' => 'int64'],
                        ['name' => 'laststatus', 'type' => 'string'],
                        ['name' => 'nextstarttime', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'laststatus',
                ],
            ],
            App\Models\Block::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'cron', 'type' => 'int64'],
                        ['name' => 'lastcron', 'type' => 'int64'],
                        ['name' => 'visible', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name',
                ],
            ],
            App\Models\ExternalServices::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'requiredcapability', 'type' => 'string'],
                        ['name' => 'restrictedusers', 'type' => 'bool', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'downloadfiles', 'type' => 'bool', 'facet' => true],
                        ['name' => 'uploadfiles', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,requiredcapability,component,shortname',
                ],
            ],
            App\Models\ExternalFunctions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'classname', 'type' => 'string'],
                        ['name' => 'methodname', 'type' => 'string'],
                        ['name' => 'classpath', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'capabilities', 'type' => 'string'],
                        ['name' => 'services', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,classname,methodname,classpath,component,capabilities,services',
                ],
            ],
            App\Models\License::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'fullname', 'type' => 'string'],
                        ['name' => 'source', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'version', 'type' => 'int64'],
                        ['name' => 'custom', 'type' => 'bool', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'shortname,fullname,source',
                ],
            ],
            App\Models\RegistrationHubs::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'token', 'type' => 'string'],
                        ['name' => 'hubname', 'type' => 'string'],
                        ['name' => 'huburl', 'type' => 'string'],
                        ['name' => 'confirmed', 'type' => 'bool', 'facet' => true],
                        ['name' => 'secret', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'token,hubname,huburl,secret',
                ],
            ],
            App\Models\Profiling::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'runid', 'type' => 'string', 'facet' => true],
                        ['name' => 'url', 'type' => 'string'],
                        ['name' => 'data', 'type' => 'string'],
                        ['name' => 'totalexecutiontime', 'type' => 'int64'],
                        ['name' => 'totalcputime', 'type' => 'int64'],
                        ['name' => 'totalcalls', 'type' => 'int64'],
                        ['name' => 'totalmemory', 'type' => 'int64'],
                        ['name' => 'runreference', 'type' => 'int32'],
                        ['name' => 'runcomment', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'runid,url,data,runcomment',
                ],
            ],
            App\Models\LockDb::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'resourcekey', 'type' => 'string'],
                        ['name' => 'expires', 'type' => 'int64'],
                        ['name' => 'owner', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'resourcekey,owner',
                ],
            ],
            App\Models\TaskScheduled::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'classname', 'type' => 'string'],
                        ['name' => 'lastruntime', 'type' => 'int64'],
                        ['name' => 'nextruntime', 'type' => 'int64'],
                        ['name' => 'blocking', 'type' => 'int32'],
                        ['name' => 'minute', 'type' => 'string'],
                        ['name' => 'hour', 'type' => 'string'],
                        ['name' => 'day', 'type' => 'string'],
                        ['name' => 'month', 'type' => 'string'],
                        ['name' => 'dayofweek', 'type' => 'string'],
                        ['name' => 'faildelay', 'type' => 'int64'],
                        ['name' => 'customised', 'type' => 'int32'],
                        ['name' => 'disabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timestarted', 'type' => 'int64'],
                        ['name' => 'hostname', 'type' => 'string'],
                        ['name' => 'pid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component,classname,minute,hour,day,month,dayofweek,hostname',
                ],
            ],
            App\Models\MessageinboundHandlers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'classname', 'type' => 'string'],
                        ['name' => 'defaultexpiration', 'type' => 'int64'],
                        ['name' => 'validateaddress', 'type' => 'bool', 'facet' => true],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component,classname',
                ],
            ],
            App\Models\Oauth2Issuer::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'image', 'type' => 'string'],
                        ['name' => 'baseurl', 'type' => 'string'],
                        ['name' => 'clientid', 'type' => 'string', 'facet' => true],
                        ['name' => 'clientsecret', 'type' => 'string'],
                        ['name' => 'loginscopes', 'type' => 'string'],
                        ['name' => 'loginscopesoffline', 'type' => 'string'],
                        ['name' => 'loginparams', 'type' => 'string'],
                        ['name' => 'loginparamsoffline', 'type' => 'string'],
                        ['name' => 'alloweddomains', 'type' => 'string'],
                        ['name' => 'scopessupported', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'int32', 'facet' => true],
                        ['name' => 'showonloginpage', 'type' => 'int32'],
                        ['name' => 'basicauth', 'type' => 'int32'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'requireconfirmation', 'type' => 'int32'],
                        ['name' => 'servicetype', 'type' => 'string'],
                        ['name' => 'loginpagename', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,image,baseurl,clientid,clientsecret,loginscopes,loginscopesoffline,loginparams,loginparamsoffline,alloweddomains,scopessupported,servicetype,loginpagename',
                ],
            ],
            App\Models\H5pLibraries::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'machinename', 'type' => 'string'],
                        ['name' => 'title', 'type' => 'string'],
                        ['name' => 'majorversion', 'type' => 'int32'],
                        ['name' => 'minorversion', 'type' => 'int32'],
                        ['name' => 'patchversion', 'type' => 'int32'],
                        ['name' => 'runnable', 'type' => 'bool', 'facet' => true],
                        ['name' => 'fullscreen', 'type' => 'bool', 'facet' => true],
                        ['name' => 'embedtypes', 'type' => 'string'],
                        ['name' => 'preloadedjs', 'type' => 'string'],
                        ['name' => 'preloadedcss', 'type' => 'string'],
                        ['name' => 'droplibrarycss', 'type' => 'string'],
                        ['name' => 'semantics', 'type' => 'string'],
                        ['name' => 'addto', 'type' => 'string'],
                        ['name' => 'coremajor', 'type' => 'int32'],
                        ['name' => 'coreminor', 'type' => 'int32'],
                        ['name' => 'metadatasettings', 'type' => 'string'],
                        ['name' => 'tutorial', 'type' => 'string'],
                        ['name' => 'example', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'machinename,title,embedtypes,preloadedjs,preloadedcss,droplibrarycss,semantics,addto,metadatasettings,tutorial,example',
                ],
            ],
            App\Models\Adminpresets::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'comments', 'type' => 'string'],
                        ['name' => 'site', 'type' => 'string'],
                        ['name' => 'author', 'type' => 'string'],
                        ['name' => 'moodleversion', 'type' => 'string'],
                        ['name' => 'moodlerelease', 'type' => 'string'],
                        ['name' => 'iscore', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timeimported', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,comments,site,author,moodleversion,moodlerelease',
                ],
            ],
            App\Models\AdminpresetsIt::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'adminpresetid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'plugin', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'plugin,name,value',
                ],
            ],
            App\Models\AdminpresetsItA::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,value',
                ],
            ],
            App\Models\AdminpresetsApp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'adminpresetid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'time', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\AdminpresetsAppIt::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'adminpresetapplyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'configlogid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\AdminpresetsAppItA::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'adminpresetapplyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'configlogid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'itemname', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'itemname',
                ],
            ],
            App\Models\AdminpresetsPlug::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'adminpresetid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'plugin', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'int32', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'plugin,name',
                ],
            ],
            App\Models\AdminpresetsAppPlug::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'adminpresetapplyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'plugin', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'int32'],
                        ['name' => 'oldvalue', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'plugin,name',
                ],
            ],
            App\Models\CourseModulesViewed::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'coursemoduleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\XapiStates::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'stateid', 'type' => 'string', 'facet' => true],
                        ['name' => 'statedata', 'type' => 'string'],
                        ['name' => 'registration', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'component,stateid,statedata,registration',
                ],
            ],
            App\Models\MoodlenetShareProgress::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'int32', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'cmid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'resourceurl', 'type' => 'string'],
                        ['name' => 'status', 'type' => 'int32', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'resourceurl',
                ],
            ],
            App\Models\EditorAttoAutosave::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'elementid', 'type' => 'string', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pagehash', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'drafttext', 'type' => 'string'],
                        ['name' => 'draftid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pageinstance', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'elementid,pagehash,drafttext,pageinstance',
                ],
            ],
            App\Models\TinyAutosave::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'elementid', 'type' => 'string', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pagehash', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'drafttext', 'type' => 'string'],
                        ['name' => 'draftid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pageinstance', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'elementid,pagehash,drafttext,pageinstance',
                ],
            ],
            App\Models\MessageAirnotifierDevices::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userdeviceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'enable', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\MessagePopup::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'messageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'isread', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\MnetserviceEnrolCourses::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'hostid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'remoteid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'categoryname', 'type' => 'string'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'fullname', 'type' => 'string'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'summary', 'type' => 'string'],
                        ['name' => 'summaryformat', 'type' => 'int32'],
                        ['name' => 'startdate', 'type' => 'int64'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'rolename', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'categoryname,fullname,shortname,idnumber,summary,rolename',
                ],
            ],
            App\Models\Assign::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'alwaysshowdescription', 'type' => 'int32'],
                        ['name' => 'nosubmissions', 'type' => 'int32'],
                        ['name' => 'submissiondrafts', 'type' => 'int32'],
                        ['name' => 'sendnotifications', 'type' => 'int32'],
                        ['name' => 'sendlatenotifications', 'type' => 'int32'],
                        ['name' => 'duedate', 'type' => 'int64'],
                        ['name' => 'allowsubmissionsfromdate', 'type' => 'int64'],
                        ['name' => 'grade', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'requiresubmissionstatement', 'type' => 'int32'],
                        ['name' => 'completionsubmit', 'type' => 'int32'],
                        ['name' => 'cutoffdate', 'type' => 'int64'],
                        ['name' => 'gradingduedate', 'type' => 'int64'],
                        ['name' => 'teamsubmission', 'type' => 'int32'],
                        ['name' => 'requireallteammemberssubmit', 'type' => 'int32'],
                        ['name' => 'teamsubmissiongroupingid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'blindmarking', 'type' => 'int32'],
                        ['name' => 'hidegrader', 'type' => 'int32'],
                        ['name' => 'revealidentities', 'type' => 'int32'],
                        ['name' => 'attemptreopenmethod', 'type' => 'string'],
                        ['name' => 'maxattempts', 'type' => 'int32'],
                        ['name' => 'markingworkflow', 'type' => 'int32'],
                        ['name' => 'markingallocation', 'type' => 'int32'],
                        ['name' => 'sendstudentnotifications', 'type' => 'int32'],
                        ['name' => 'preventsubmissionnotingroup', 'type' => 'int32'],
                        ['name' => 'activity', 'type' => 'string'],
                        ['name' => 'activityformat', 'type' => 'int32'],
                        ['name' => 'timelimit', 'type' => 'int64'],
                        ['name' => 'submissionattachments', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,attemptreopenmethod,activity',
                ],
            ],
            App\Models\Bigbluebuttonbn::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'int32', 'facet' => true],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'meetingid', 'type' => 'string', 'facet' => true],
                        ['name' => 'moderatorpass', 'type' => 'string'],
                        ['name' => 'viewerpass', 'type' => 'string'],
                        ['name' => 'wait', 'type' => 'bool', 'facet' => true],
                        ['name' => 'record', 'type' => 'bool', 'facet' => true],
                        ['name' => 'recordallfromstart', 'type' => 'bool', 'facet' => true],
                        ['name' => 'recordhidebutton', 'type' => 'bool', 'facet' => true],
                        ['name' => 'welcome', 'type' => 'string'],
                        ['name' => 'voicebridge', 'type' => 'int32'],
                        ['name' => 'openingtime', 'type' => 'int64'],
                        ['name' => 'closingtime', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'presentation', 'type' => 'string'],
                        ['name' => 'participants', 'type' => 'string'],
                        ['name' => 'userlimit', 'type' => 'int32'],
                        ['name' => 'recordings_html', 'type' => 'bool', 'facet' => true],
                        ['name' => 'recordings_deleted', 'type' => 'bool', 'facet' => true],
                        ['name' => 'recordings_imported', 'type' => 'bool', 'facet' => true],
                        ['name' => 'recordings_preview', 'type' => 'bool', 'facet' => true],
                        ['name' => 'clienttype', 'type' => 'bool', 'facet' => true],
                        ['name' => 'muteonstart', 'type' => 'bool', 'facet' => true],
                        ['name' => 'disablecam', 'type' => 'bool', 'facet' => true],
                        ['name' => 'disablemic', 'type' => 'bool', 'facet' => true],
                        ['name' => 'disableprivatechat', 'type' => 'bool', 'facet' => true],
                        ['name' => 'disablepublicchat', 'type' => 'bool', 'facet' => true],
                        ['name' => 'disablenote', 'type' => 'bool', 'facet' => true],
                        ['name' => 'hideuserlist', 'type' => 'bool', 'facet' => true],
                        ['name' => 'completionattendance', 'type' => 'int32'],
                        ['name' => 'completionengagementchats', 'type' => 'int32'],
                        ['name' => 'completionengagementtalks', 'type' => 'int32'],
                        ['name' => 'completionengagementraisehand', 'type' => 'int32'],
                        ['name' => 'completionengagementpollvotes', 'type' => 'int32'],
                        ['name' => 'completionengagementemojis', 'type' => 'int32'],
                        ['name' => 'guestallowed', 'type' => 'int32'],
                        ['name' => 'mustapproveuser', 'type' => 'int32'],
                        ['name' => 'guestlinkuid', 'type' => 'string', 'facet' => true],
                        ['name' => 'guestpassword', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,meetingid,moderatorpass,viewerpass,welcome,presentation,participants,guestlinkuid,guestpassword',
                ],
            ],
            App\Models\BigbluebuttonbnLogs::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'bigbluebuttonbnid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'meetingid', 'type' => 'string', 'facet' => true],
                        ['name' => 'log', 'type' => 'string'],
                        ['name' => 'meta', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'meetingid,log,meta',
                ],
            ],
            App\Models\BookChapters::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'bookid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pagenum', 'type' => 'int64'],
                        ['name' => 'subchapter', 'type' => 'int64'],
                        ['name' => 'title', 'type' => 'string'],
                        ['name' => 'content', 'type' => 'string'],
                        ['name' => 'contentformat', 'type' => 'int32'],
                        ['name' => 'hidden', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'importsrc', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'title,content,importsrc',
                ],
            ],
            App\Models\Chat::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'keepdays', 'type' => 'int64'],
                        ['name' => 'studentlogs', 'type' => 'int32'],
                        ['name' => 'chattime', 'type' => 'int64'],
                        ['name' => 'schedule', 'type' => 'int32'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro',
                ],
            ],
            App\Models\Choice::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'publish', 'type' => 'int32'],
                        ['name' => 'showresults', 'type' => 'int32'],
                        ['name' => 'display', 'type' => 'int32'],
                        ['name' => 'allowupdate', 'type' => 'int32'],
                        ['name' => 'allowmultiple', 'type' => 'int32'],
                        ['name' => 'showunanswered', 'type' => 'int32'],
                        ['name' => 'includeinactive', 'type' => 'int32'],
                        ['name' => 'limitanswers', 'type' => 'int32'],
                        ['name' => 'timeopen', 'type' => 'int64'],
                        ['name' => 'timeclose', 'type' => 'int64'],
                        ['name' => 'showpreview', 'type' => 'int32'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'completionsubmit', 'type' => 'bool', 'facet' => true],
                        ['name' => 'showavailable', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro',
                ],
            ],
            App\Models\Data::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'comments', 'type' => 'int32'],
                        ['name' => 'timeavailablefrom', 'type' => 'int64'],
                        ['name' => 'timeavailableto', 'type' => 'int64'],
                        ['name' => 'timeviewfrom', 'type' => 'int64'],
                        ['name' => 'timeviewto', 'type' => 'int64'],
                        ['name' => 'requiredentries', 'type' => 'int32'],
                        ['name' => 'requiredentriestoview', 'type' => 'int32'],
                        ['name' => 'maxentries', 'type' => 'int32'],
                        ['name' => 'rssarticles', 'type' => 'int32'],
                        ['name' => 'singletemplate', 'type' => 'string'],
                        ['name' => 'listtemplate', 'type' => 'string'],
                        ['name' => 'listtemplateheader', 'type' => 'string'],
                        ['name' => 'listtemplatefooter', 'type' => 'string'],
                        ['name' => 'addtemplate', 'type' => 'string'],
                        ['name' => 'rsstemplate', 'type' => 'string'],
                        ['name' => 'rsstitletemplate', 'type' => 'string'],
                        ['name' => 'csstemplate', 'type' => 'string'],
                        ['name' => 'jstemplate', 'type' => 'string'],
                        ['name' => 'asearchtemplate', 'type' => 'string'],
                        ['name' => 'approval', 'type' => 'int32'],
                        ['name' => 'manageapproved', 'type' => 'int32'],
                        ['name' => 'scale', 'type' => 'int64'],
                        ['name' => 'assessed', 'type' => 'int64'],
                        ['name' => 'assesstimestart', 'type' => 'int64'],
                        ['name' => 'assesstimefinish', 'type' => 'int64'],
                        ['name' => 'defaultsort', 'type' => 'int64'],
                        ['name' => 'defaultsortdir', 'type' => 'int32'],
                        ['name' => 'editany', 'type' => 'int32'],
                        ['name' => 'notification', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'config', 'type' => 'string'],
                        ['name' => 'completionentries', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,singletemplate,listtemplate,listtemplateheader,listtemplatefooter,addtemplate,rsstemplate,rsstitletemplate,csstemplate,jstemplate,asearchtemplate,config',
                ],
            ],
            App\Models\Feedback::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'anonymous', 'type' => 'bool', 'facet' => true],
                        ['name' => 'email_notification', 'type' => 'bool', 'facet' => true],
                        ['name' => 'multiple_submit', 'type' => 'bool', 'facet' => true],
                        ['name' => 'autonumbering', 'type' => 'bool', 'facet' => true],
                        ['name' => 'site_after_submit', 'type' => 'string'],
                        ['name' => 'page_after_submit', 'type' => 'string'],
                        ['name' => 'page_after_submitformat', 'type' => 'int32'],
                        ['name' => 'publish_stats', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timeopen', 'type' => 'int64'],
                        ['name' => 'timeclose', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'completionsubmit', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,site_after_submit,page_after_submit',
                ],
            ],
            App\Models\FeedbackTemplate::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'ispublic', 'type' => 'bool', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name',
                ],
            ],
            App\Models\Folder::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'revision', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'display', 'type' => 'int32'],
                        ['name' => 'showexpanded', 'type' => 'bool', 'facet' => true],
                        ['name' => 'showdownloadfolder', 'type' => 'bool', 'facet' => true],
                        ['name' => 'forcedownload', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro',
                ],
            ],
            App\Models\Forum::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'type', 'type' => 'string', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'duedate', 'type' => 'int64'],
                        ['name' => 'cutoffdate', 'type' => 'int64'],
                        ['name' => 'assessed', 'type' => 'int64'],
                        ['name' => 'assesstimestart', 'type' => 'int64'],
                        ['name' => 'assesstimefinish', 'type' => 'int64'],
                        ['name' => 'scale', 'type' => 'int64'],
                        ['name' => 'grade_forum', 'type' => 'int64'],
                        ['name' => 'grade_forum_notify', 'type' => 'int32'],
                        ['name' => 'maxbytes', 'type' => 'int64'],
                        ['name' => 'maxattachments', 'type' => 'int64'],
                        ['name' => 'forcesubscribe', 'type' => 'bool', 'facet' => true],
                        ['name' => 'trackingtype', 'type' => 'int32'],
                        ['name' => 'rsstype', 'type' => 'int32'],
                        ['name' => 'rssarticles', 'type' => 'int32'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'warnafter', 'type' => 'int64'],
                        ['name' => 'blockafter', 'type' => 'int64'],
                        ['name' => 'blockperiod', 'type' => 'int64'],
                        ['name' => 'completiondiscussions', 'type' => 'int32'],
                        ['name' => 'completionreplies', 'type' => 'int32'],
                        ['name' => 'completionposts', 'type' => 'int32'],
                        ['name' => 'displaywordcount', 'type' => 'bool', 'facet' => true],
                        ['name' => 'lockdiscussionafter', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'type,name,intro',
                ],
            ],
            App\Models\ForumRead::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'forumid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'discussionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'postid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'firstread', 'type' => 'int64'],
                        ['name' => 'lastread', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ForumTrackPrefs::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'forumid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\Glossary::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'allowduplicatedentries', 'type' => 'int32'],
                        ['name' => 'displayformat', 'type' => 'string'],
                        ['name' => 'mainglossary', 'type' => 'int32'],
                        ['name' => 'showspecial', 'type' => 'int32'],
                        ['name' => 'showalphabet', 'type' => 'int32'],
                        ['name' => 'showall', 'type' => 'int32'],
                        ['name' => 'allowcomments', 'type' => 'int32'],
                        ['name' => 'allowprintview', 'type' => 'int32'],
                        ['name' => 'usedynalink', 'type' => 'int32'],
                        ['name' => 'defaultapproval', 'type' => 'int32'],
                        ['name' => 'approvaldisplayformat', 'type' => 'string'],
                        ['name' => 'globalglossary', 'type' => 'int32'],
                        ['name' => 'entbypage', 'type' => 'int32'],
                        ['name' => 'editalways', 'type' => 'int32'],
                        ['name' => 'rsstype', 'type' => 'int32'],
                        ['name' => 'rssarticles', 'type' => 'int32'],
                        ['name' => 'assessed', 'type' => 'int64'],
                        ['name' => 'assesstimestart', 'type' => 'int64'],
                        ['name' => 'assesstimefinish', 'type' => 'int64'],
                        ['name' => 'scale', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'completionentries', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,displayformat,approvaldisplayformat',
                ],
            ],
            App\Models\GlossaryFormats::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'popupformatname', 'type' => 'string'],
                        ['name' => 'visible', 'type' => 'int32', 'facet' => true],
                        ['name' => 'showgroup', 'type' => 'int32'],
                        ['name' => 'showtabs', 'type' => 'string'],
                        ['name' => 'defaultmode', 'type' => 'string'],
                        ['name' => 'defaulthook', 'type' => 'string'],
                        ['name' => 'sortkey', 'type' => 'string'],
                        ['name' => 'sortorder', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,popupformatname,showtabs,defaultmode,defaulthook,sortkey,sortorder',
                ],
            ],
            App\Models\Imscp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'revision', 'type' => 'int64'],
                        ['name' => 'keepold', 'type' => 'int64'],
                        ['name' => 'structure', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,structure',
                ],
            ],
            App\Models\Label::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro',
                ],
            ],
            App\Models\Lesson::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'practice', 'type' => 'int32'],
                        ['name' => 'modattempts', 'type' => 'int32'],
                        ['name' => 'usepassword', 'type' => 'int32'],
                        ['name' => 'password', 'type' => 'string'],
                        ['name' => 'dependency', 'type' => 'int64'],
                        ['name' => 'conditions', 'type' => 'string'],
                        ['name' => 'grade', 'type' => 'int64'],
                        ['name' => 'custom', 'type' => 'int32'],
                        ['name' => 'ongoing', 'type' => 'int32'],
                        ['name' => 'usemaxgrade', 'type' => 'int32'],
                        ['name' => 'maxanswers', 'type' => 'int32'],
                        ['name' => 'maxattempts', 'type' => 'int32'],
                        ['name' => 'review', 'type' => 'int32'],
                        ['name' => 'nextpagedefault', 'type' => 'int32'],
                        ['name' => 'feedback', 'type' => 'int32'],
                        ['name' => 'minquestions', 'type' => 'int32'],
                        ['name' => 'maxpages', 'type' => 'int32'],
                        ['name' => 'timelimit', 'type' => 'int64'],
                        ['name' => 'retake', 'type' => 'int32'],
                        ['name' => 'activitylink', 'type' => 'int64'],
                        ['name' => 'mediafile', 'type' => 'string'],
                        ['name' => 'mediaheight', 'type' => 'int64'],
                        ['name' => 'mediawidth', 'type' => 'int64'],
                        ['name' => 'mediaclose', 'type' => 'int32'],
                        ['name' => 'slideshow', 'type' => 'int32'],
                        ['name' => 'width', 'type' => 'int64'],
                        ['name' => 'height', 'type' => 'int64'],
                        ['name' => 'bgcolor', 'type' => 'string'],
                        ['name' => 'displayleft', 'type' => 'int32'],
                        ['name' => 'displayleftif', 'type' => 'int32'],
                        ['name' => 'progressbar', 'type' => 'int32'],
                        ['name' => 'available', 'type' => 'int64'],
                        ['name' => 'deadline', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'completionendreached', 'type' => 'bool', 'facet' => true],
                        ['name' => 'completiontimespent', 'type' => 'int64'],
                        ['name' => 'allowofflineattempts', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,password,conditions,mediafile,bgcolor',
                ],
            ],
            App\Models\Lti::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'typeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'toolurl', 'type' => 'string'],
                        ['name' => 'securetoolurl', 'type' => 'string'],
                        ['name' => 'instructorchoicesendname', 'type' => 'bool', 'facet' => true],
                        ['name' => 'instructorchoicesendemailaddr', 'type' => 'bool', 'facet' => true],
                        ['name' => 'instructorchoiceallowroster', 'type' => 'bool', 'facet' => true],
                        ['name' => 'instructorchoiceallowsetting', 'type' => 'bool', 'facet' => true],
                        ['name' => 'instructorcustomparameters', 'type' => 'string'],
                        ['name' => 'instructorchoiceacceptgrades', 'type' => 'bool', 'facet' => true],
                        ['name' => 'grade', 'type' => 'int64'],
                        ['name' => 'launchcontainer', 'type' => 'int32'],
                        ['name' => 'resourcekey', 'type' => 'string'],
                        ['name' => 'password', 'type' => 'string'],
                        ['name' => 'debuglaunch', 'type' => 'bool', 'facet' => true],
                        ['name' => 'showtitlelaunch', 'type' => 'bool', 'facet' => true],
                        ['name' => 'showdescriptionlaunch', 'type' => 'bool', 'facet' => true],
                        ['name' => 'servicesalt', 'type' => 'string'],
                        ['name' => 'icon', 'type' => 'string'],
                        ['name' => 'secureicon', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,toolurl,securetoolurl,instructorcustomparameters,resourcekey,password,servicesalt,icon,secureicon',
                ],
            ],
            App\Models\LtiToolProxies::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'regurl', 'type' => 'string'],
                        ['name' => 'state', 'type' => 'int32', 'facet' => true],
                        ['name' => 'guid', 'type' => 'string', 'facet' => true],
                        ['name' => 'secret', 'type' => 'string'],
                        ['name' => 'vendorcode', 'type' => 'string'],
                        ['name' => 'capabilityoffered', 'type' => 'string'],
                        ['name' => 'serviceoffered', 'type' => 'string'],
                        ['name' => 'toolproxy', 'type' => 'string'],
                        ['name' => 'createdby', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,regurl,guid,secret,vendorcode,capabilityoffered,serviceoffered,toolproxy',
                ],
            ],
            App\Models\LtiTypes::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'baseurl', 'type' => 'string'],
                        ['name' => 'tooldomain', 'type' => 'string'],
                        ['name' => 'state', 'type' => 'int32', 'facet' => true],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'coursevisible', 'type' => 'bool', 'facet' => true],
                        ['name' => 'ltiversion', 'type' => 'string'],
                        ['name' => 'clientid', 'type' => 'string', 'facet' => true],
                        ['name' => 'toolproxyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'enabledcapability', 'type' => 'string'],
                        ['name' => 'parameter', 'type' => 'string'],
                        ['name' => 'icon', 'type' => 'string'],
                        ['name' => 'secureicon', 'type' => 'string'],
                        ['name' => 'createdby', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'description', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,baseurl,tooldomain,ltiversion,clientid,enabledcapability,parameter,icon,secureicon,description',
                ],
            ],
            App\Models\LtiTypesConfig::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'typeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,value',
                ],
            ],
            App\Models\LtiSubmission::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'ltiid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'datesubmitted', 'type' => 'int64'],
                        ['name' => 'dateupdated', 'type' => 'int64'],
                        ['name' => 'gradepercent', 'type' => 'float'],
                        ['name' => 'originalgrade', 'type' => 'float'],
                        ['name' => 'launchid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'state', 'type' => 'int32', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\LtiCoursevisible::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'typeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'coursevisible', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\Page::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'content', 'type' => 'string'],
                        ['name' => 'contentformat', 'type' => 'int32'],
                        ['name' => 'legacyfiles', 'type' => 'int32'],
                        ['name' => 'legacyfileslast', 'type' => 'int64'],
                        ['name' => 'display', 'type' => 'int32'],
                        ['name' => 'displayoptions', 'type' => 'string'],
                        ['name' => 'revision', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,content,displayoptions',
                ],
            ],
            App\Models\Quiz::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'timeopen', 'type' => 'int64'],
                        ['name' => 'timeclose', 'type' => 'int64'],
                        ['name' => 'timelimit', 'type' => 'int64'],
                        ['name' => 'overduehandling', 'type' => 'string'],
                        ['name' => 'graceperiod', 'type' => 'int64'],
                        ['name' => 'preferredbehaviour', 'type' => 'string'],
                        ['name' => 'canredoquestions', 'type' => 'int32'],
                        ['name' => 'attempts', 'type' => 'int32'],
                        ['name' => 'attemptonlast', 'type' => 'int32'],
                        ['name' => 'grademethod', 'type' => 'int32'],
                        ['name' => 'decimalpoints', 'type' => 'int32'],
                        ['name' => 'questiondecimalpoints', 'type' => 'int32'],
                        ['name' => 'reviewattempt', 'type' => 'int32'],
                        ['name' => 'reviewcorrectness', 'type' => 'int32'],
                        ['name' => 'reviewmaxmarks', 'type' => 'int32'],
                        ['name' => 'reviewmarks', 'type' => 'int32'],
                        ['name' => 'reviewspecificfeedback', 'type' => 'int32'],
                        ['name' => 'reviewgeneralfeedback', 'type' => 'int32'],
                        ['name' => 'reviewrightanswer', 'type' => 'int32'],
                        ['name' => 'reviewoverallfeedback', 'type' => 'int32'],
                        ['name' => 'questionsperpage', 'type' => 'int64'],
                        ['name' => 'navmethod', 'type' => 'string'],
                        ['name' => 'shuffleanswers', 'type' => 'int32'],
                        ['name' => 'sumgrades', 'type' => 'float'],
                        ['name' => 'grade', 'type' => 'float'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'password', 'type' => 'string'],
                        ['name' => 'subnet', 'type' => 'string'],
                        ['name' => 'browsersecurity', 'type' => 'string'],
                        ['name' => 'delay1', 'type' => 'int64'],
                        ['name' => 'delay2', 'type' => 'int64'],
                        ['name' => 'showuserpicture', 'type' => 'int32'],
                        ['name' => 'showblocks', 'type' => 'int32'],
                        ['name' => 'completionattemptsexhausted', 'type' => 'bool', 'facet' => true],
                        ['name' => 'completionminattempts', 'type' => 'int64'],
                        ['name' => 'allowofflineattempts', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,overduehandling,preferredbehaviour,navmethod,password,subnet,browsersecurity',
                ],
            ],
            App\Models\QuizReports::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'displayorder', 'type' => 'int64'],
                        ['name' => 'capability', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,capability',
                ],
            ],
            App\Models\QuizStatistics::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'hashcode', 'type' => 'string'],
                        ['name' => 'whichattempts', 'type' => 'int32'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'firstattemptscount', 'type' => 'int64'],
                        ['name' => 'highestattemptscount', 'type' => 'int64'],
                        ['name' => 'lastattemptscount', 'type' => 'int64'],
                        ['name' => 'allattemptscount', 'type' => 'int64'],
                        ['name' => 'firstattemptsavg', 'type' => 'float'],
                        ['name' => 'highestattemptsavg', 'type' => 'float'],
                        ['name' => 'lastattemptsavg', 'type' => 'float'],
                        ['name' => 'allattemptsavg', 'type' => 'float'],
                        ['name' => 'median', 'type' => 'float'],
                        ['name' => 'standarddeviation', 'type' => 'float'],
                        ['name' => 'skewness', 'type' => 'float'],
                        ['name' => 'kurtosis', 'type' => 'float'],
                        ['name' => 'cic', 'type' => 'float'],
                        ['name' => 'errorratio', 'type' => 'float'],
                        ['name' => 'standarderror', 'type' => 'float'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'hashcode',
                ],
            ],
            App\Models\Resource::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'tobemigrated', 'type' => 'int32'],
                        ['name' => 'legacyfiles', 'type' => 'int32'],
                        ['name' => 'legacyfileslast', 'type' => 'int64'],
                        ['name' => 'display', 'type' => 'int32'],
                        ['name' => 'displayoptions', 'type' => 'string'],
                        ['name' => 'filterfiles', 'type' => 'int32'],
                        ['name' => 'revision', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,displayoptions',
                ],
            ],
            App\Models\ResourceOld::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'string', 'facet' => true],
                        ['name' => 'reference', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'alltext', 'type' => 'string'],
                        ['name' => 'popup', 'type' => 'string'],
                        ['name' => 'options', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'oldid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'cmid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'newmodule', 'type' => 'string'],
                        ['name' => 'newid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'migrated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,type,reference,intro,alltext,popup,options,newmodule',
                ],
            ],
            App\Models\Scorm::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'scormtype', 'type' => 'string'],
                        ['name' => 'reference', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'version', 'type' => 'string'],
                        ['name' => 'maxgrade', 'type' => 'string'],
                        ['name' => 'grademethod', 'type' => 'int32'],
                        ['name' => 'whatgrade', 'type' => 'int64'],
                        ['name' => 'maxattempt', 'type' => 'int64'],
                        ['name' => 'forcecompleted', 'type' => 'bool', 'facet' => true],
                        ['name' => 'forcenewattempt', 'type' => 'bool', 'facet' => true],
                        ['name' => 'lastattemptlock', 'type' => 'bool', 'facet' => true],
                        ['name' => 'masteryoverride', 'type' => 'bool', 'facet' => true],
                        ['name' => 'displayattemptstatus', 'type' => 'bool', 'facet' => true],
                        ['name' => 'displaycoursestructure', 'type' => 'bool', 'facet' => true],
                        ['name' => 'updatefreq', 'type' => 'bool', 'facet' => true],
                        ['name' => 'sha1hash', 'type' => 'string'],
                        ['name' => 'md5hash', 'type' => 'string'],
                        ['name' => 'revision', 'type' => 'int64'],
                        ['name' => 'launch', 'type' => 'int64'],
                        ['name' => 'skipview', 'type' => 'bool', 'facet' => true],
                        ['name' => 'hidebrowse', 'type' => 'bool', 'facet' => true],
                        ['name' => 'hidetoc', 'type' => 'bool', 'facet' => true],
                        ['name' => 'nav', 'type' => 'bool', 'facet' => true],
                        ['name' => 'navpositionleft', 'type' => 'int64'],
                        ['name' => 'navpositiontop', 'type' => 'int64'],
                        ['name' => 'auto', 'type' => 'bool', 'facet' => true],
                        ['name' => 'popup', 'type' => 'bool', 'facet' => true],
                        ['name' => 'options', 'type' => 'string'],
                        ['name' => 'width', 'type' => 'int64'],
                        ['name' => 'height', 'type' => 'int64'],
                        ['name' => 'timeopen', 'type' => 'int64'],
                        ['name' => 'timeclose', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'completionstatusrequired', 'type' => 'bool', 'facet' => true],
                        ['name' => 'completionscorerequired', 'type' => 'int64'],
                        ['name' => 'completionstatusallscos', 'type' => 'bool', 'facet' => true],
                        ['name' => 'autocommit', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,scormtype,reference,intro,version,sha1hash,md5hash,options',
                ],
            ],
            App\Models\ScormElement::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'element', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'element',
                ],
            ],
            App\Models\Survey::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'template', 'type' => 'int64'],
                        ['name' => 'days', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'questions', 'type' => 'string'],
                        ['name' => 'completionsubmit', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,questions',
                ],
            ],
            App\Models\SurveyQuestions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'text', 'type' => 'string'],
                        ['name' => 'shorttext', 'type' => 'string'],
                        ['name' => 'multi', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'int32', 'facet' => true],
                        ['name' => 'options', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'text,shorttext,multi,intro,options',
                ],
            ],
            App\Models\Url::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'externalurl', 'type' => 'string'],
                        ['name' => 'display', 'type' => 'int32'],
                        ['name' => 'displayoptions', 'type' => 'string'],
                        ['name' => 'parameters', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,externalurl,displayoptions,parameters',
                ],
            ],
            App\Models\Wiki::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'firstpagetitle', 'type' => 'string'],
                        ['name' => 'wikimode', 'type' => 'string'],
                        ['name' => 'defaultformat', 'type' => 'string'],
                        ['name' => 'forceformat', 'type' => 'bool', 'facet' => true],
                        ['name' => 'editbegin', 'type' => 'int64'],
                        ['name' => 'editend', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,firstpagetitle,wikimode,defaultformat',
                ],
            ],
            App\Models\WikiSynonyms::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'subwikiid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pagesynonym', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'pagesynonym',
                ],
            ],
            App\Models\WikiLocks::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'pageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sectionname', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'lockedat', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'sectionname',
                ],
            ],
            App\Models\WorkshopallocationScheduled::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'workshopid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'enabled', 'type' => 'int32', 'facet' => true],
                        ['name' => 'submissionend', 'type' => 'int64'],
                        ['name' => 'timeallocated', 'type' => 'int64'],
                        ['name' => 'settings', 'type' => 'string'],
                        ['name' => 'resultstatus', 'type' => 'int64'],
                        ['name' => 'resultmessage', 'type' => 'string'],
                        ['name' => 'resultlog', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'settings,resultmessage,resultlog',
                ],
            ],
            App\Models\WorkshopevalBestSettings::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'workshopid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'comparison', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\WorkshopformRubricConfig::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'workshopid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'layout', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'layout',
                ],
            ],
            App\Models\PaygwPaypal::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'paymentid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pp_orderid', 'type' => 'string', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'pp_orderid',
                ],
            ],
            App\Models\QuestionDatasetItems::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'definition', 'type' => 'int64'],
                        ['name' => 'itemnumber', 'type' => 'int64'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'value',
                ],
            ],
            App\Models\QtypeEssayOptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'responseformat', 'type' => 'string'],
                        ['name' => 'responserequired', 'type' => 'int32'],
                        ['name' => 'responsefieldlines', 'type' => 'int32'],
                        ['name' => 'minwordlimit', 'type' => 'int64'],
                        ['name' => 'maxwordlimit', 'type' => 'int64'],
                        ['name' => 'attachments', 'type' => 'int32'],
                        ['name' => 'attachmentsrequired', 'type' => 'int32'],
                        ['name' => 'graderinfo', 'type' => 'string'],
                        ['name' => 'graderinfoformat', 'type' => 'int32'],
                        ['name' => 'responsetemplate', 'type' => 'string'],
                        ['name' => 'responsetemplateformat', 'type' => 'int32'],
                        ['name' => 'maxbytes', 'type' => 'int64'],
                        ['name' => 'filetypeslist', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'responseformat,graderinfo,responsetemplate,filetypeslist',
                ],
            ],
            App\Models\QtypeMatchOptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'shuffleanswers', 'type' => 'int32'],
                        ['name' => 'correctfeedback', 'type' => 'string'],
                        ['name' => 'correctfeedbackformat', 'type' => 'int32'],
                        ['name' => 'partiallycorrectfeedback', 'type' => 'string'],
                        ['name' => 'partiallycorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'incorrectfeedback', 'type' => 'string'],
                        ['name' => 'incorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'shownumcorrect', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'correctfeedback,partiallycorrectfeedback,incorrectfeedback',
                ],
            ],
            App\Models\QtypeMultichoiceOptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'layout', 'type' => 'int32'],
                        ['name' => 'single', 'type' => 'int32'],
                        ['name' => 'shuffleanswers', 'type' => 'int32'],
                        ['name' => 'correctfeedback', 'type' => 'string'],
                        ['name' => 'correctfeedbackformat', 'type' => 'int32'],
                        ['name' => 'partiallycorrectfeedback', 'type' => 'string'],
                        ['name' => 'partiallycorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'incorrectfeedback', 'type' => 'string'],
                        ['name' => 'incorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'answernumbering', 'type' => 'string'],
                        ['name' => 'shownumcorrect', 'type' => 'int32'],
                        ['name' => 'showstandardinstruction', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'correctfeedback,partiallycorrectfeedback,incorrectfeedback,answernumbering',
                ],
            ],
            App\Models\QtypeRandomsamatchOptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'choose', 'type' => 'int64'],
                        ['name' => 'subcats', 'type' => 'int32'],
                        ['name' => 'correctfeedback', 'type' => 'string'],
                        ['name' => 'correctfeedbackformat', 'type' => 'int32'],
                        ['name' => 'partiallycorrectfeedback', 'type' => 'string'],
                        ['name' => 'partiallycorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'incorrectfeedback', 'type' => 'string'],
                        ['name' => 'incorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'shownumcorrect', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'correctfeedback,partiallycorrectfeedback,incorrectfeedback',
                ],
            ],
            App\Models\QtypeShortanswerOptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'usecase', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\SearchSimpledbIndex::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'docid', 'type' => 'string', 'facet' => true],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'title', 'type' => 'string'],
                        ['name' => 'content', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'areaid', 'type' => 'string', 'facet' => true],
                        ['name' => 'type', 'type' => 'bool', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'owneruserid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'modified', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'description1', 'type' => 'string'],
                        ['name' => 'description2', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'docid,title,content,areaid,description1,description2',
                ],
            ],
            App\Models\ToolCustomlang::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'lang', 'type' => 'string', 'facet' => true],
                        ['name' => 'componentid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'stringid', 'type' => 'string', 'facet' => true],
                        ['name' => 'original', 'type' => 'string'],
                        ['name' => 'master', 'type' => 'string'],
                        ['name' => 'local', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'timecustomized', 'type' => 'int64'],
                        ['name' => 'outdated', 'type' => 'int32'],
                        ['name' => 'modified', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'lang,stringid,original,master,local',
                ],
            ],
            App\Models\ToolDataprivacyCtxlevel::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextlevel', 'type' => 'int32'],
                        ['name' => 'purposeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolDataprivacyCtxinstance::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'purposeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolDataprivacyCtxlstCtx::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextlistid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'int32', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolMonitorSubscriptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'ruleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'cmid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'lastnotificationsent', 'type' => 'int64'],
                        ['name' => 'inactivedate', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolUsertoursSteps::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'tourid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'title', 'type' => 'string'],
                        ['name' => 'content', 'type' => 'string'],
                        ['name' => 'contentformat', 'type' => 'int32'],
                        ['name' => 'targettype', 'type' => 'int32'],
                        ['name' => 'targetvalue', 'type' => 'string'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'configdata', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'title,content,targetvalue,configdata',
                ],
            ],
            App\Models\EnrolLtiLti2ToolProxy::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'toolproxykey', 'type' => 'string'],
                        ['name' => 'consumerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'toolproxy', 'type' => 'string'],
                        ['name' => 'created', 'type' => 'int64'],
                        ['name' => 'updated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'toolproxykey,toolproxy',
                ],
            ],
            App\Models\EnrolLtiLti2Context::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'consumerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'lticontextkey', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'string', 'facet' => true],
                        ['name' => 'settings', 'type' => 'string'],
                        ['name' => 'created', 'type' => 'int64'],
                        ['name' => 'updated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'lticontextkey,type,settings',
                ],
            ],
            App\Models\EnrolLtiLti2Nonce::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'consumerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'value', 'type' => 'string'],
                        ['name' => 'expires', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'value',
                ],
            ],
            App\Models\EnrolLtiDeployment::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'deploymentid', 'type' => 'string', 'facet' => true],
                        ['name' => 'platformid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'legacyconsumerkey', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,deploymentid,legacyconsumerkey',
                ],
            ],
            App\Models\ToolBrickfieldCacheCheck::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'bool', 'facet' => true],
                        ['name' => 'checkid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'checkcount', 'type' => 'int64'],
                        ['name' => 'errorcount', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolBrickfieldSummary::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'bool', 'facet' => true],
                        ['name' => 'activities', 'type' => 'int64'],
                        ['name' => 'activitiespassed', 'type' => 'int64'],
                        ['name' => 'activitiesfailed', 'type' => 'int64'],
                        ['name' => 'errorschecktype1', 'type' => 'int64'],
                        ['name' => 'errorschecktype2', 'type' => 'int64'],
                        ['name' => 'errorschecktype3', 'type' => 'int64'],
                        ['name' => 'errorschecktype4', 'type' => 'int64'],
                        ['name' => 'errorschecktype5', 'type' => 'int64'],
                        ['name' => 'errorschecktype6', 'type' => 'int64'],
                        ['name' => 'errorschecktype7', 'type' => 'int64'],
                        ['name' => 'failedchecktype1', 'type' => 'int64'],
                        ['name' => 'failedchecktype2', 'type' => 'int64'],
                        ['name' => 'failedchecktype3', 'type' => 'int64'],
                        ['name' => 'failedchecktype4', 'type' => 'int64'],
                        ['name' => 'failedchecktype5', 'type' => 'int64'],
                        ['name' => 'failedchecktype6', 'type' => 'int64'],
                        ['name' => 'failedchecktype7', 'type' => 'int64'],
                        ['name' => 'percentchecktype1', 'type' => 'int64'],
                        ['name' => 'percentchecktype2', 'type' => 'int64'],
                        ['name' => 'percentchecktype3', 'type' => 'int64'],
                        ['name' => 'percentchecktype4', 'type' => 'int64'],
                        ['name' => 'percentchecktype5', 'type' => 'int64'],
                        ['name' => 'percentchecktype6', 'type' => 'int64'],
                        ['name' => 'percentchecktype7', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\GradeCategories::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'parent', 'type' => 'int64'],
                        ['name' => 'depth', 'type' => 'int64'],
                        ['name' => 'path', 'type' => 'string'],
                        ['name' => 'fullname', 'type' => 'string'],
                        ['name' => 'aggregation', 'type' => 'int64'],
                        ['name' => 'keephigh', 'type' => 'int64'],
                        ['name' => 'droplow', 'type' => 'int64'],
                        ['name' => 'aggregateonlygraded', 'type' => 'bool', 'facet' => true],
                        ['name' => 'aggregateoutcomes', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'hidden', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'path,fullname',
                ],
            ],
            App\Models\Workshop::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'instructauthors', 'type' => 'string'],
                        ['name' => 'instructauthorsformat', 'type' => 'int32'],
                        ['name' => 'instructreviewers', 'type' => 'string'],
                        ['name' => 'instructreviewersformat', 'type' => 'int32'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'phase', 'type' => 'int32'],
                        ['name' => 'useexamples', 'type' => 'int32'],
                        ['name' => 'usepeerassessment', 'type' => 'int32'],
                        ['name' => 'useselfassessment', 'type' => 'int32'],
                        ['name' => 'grade', 'type' => 'float'],
                        ['name' => 'gradinggrade', 'type' => 'float'],
                        ['name' => 'strategy', 'type' => 'string'],
                        ['name' => 'evaluation', 'type' => 'string'],
                        ['name' => 'gradedecimals', 'type' => 'int32'],
                        ['name' => 'submissiontypetext', 'type' => 'bool', 'facet' => true],
                        ['name' => 'submissiontypefile', 'type' => 'bool', 'facet' => true],
                        ['name' => 'nattachments', 'type' => 'int32'],
                        ['name' => 'submissionfiletypes', 'type' => 'string'],
                        ['name' => 'latesubmissions', 'type' => 'int32'],
                        ['name' => 'maxbytes', 'type' => 'int64'],
                        ['name' => 'examplesmode', 'type' => 'int32'],
                        ['name' => 'submissionstart', 'type' => 'int64'],
                        ['name' => 'submissionend', 'type' => 'int64'],
                        ['name' => 'assessmentstart', 'type' => 'int64'],
                        ['name' => 'assessmentend', 'type' => 'int64'],
                        ['name' => 'phaseswitchassessment', 'type' => 'int32'],
                        ['name' => 'conclusion', 'type' => 'string'],
                        ['name' => 'conclusionformat', 'type' => 'int32'],
                        ['name' => 'overallfeedbackmode', 'type' => 'int32'],
                        ['name' => 'overallfeedbackfiles', 'type' => 'int32'],
                        ['name' => 'overallfeedbackfiletypes', 'type' => 'string'],
                        ['name' => 'overallfeedbackmaxbytes', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro,instructauthors,instructreviewers,strategy,evaluation,submissionfiletypes,conclusion,overallfeedbackfiletypes',
                ],
            ],
            App\Models\CoursePublished::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'huburl', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timepublished', 'type' => 'int64'],
                        ['name' => 'enrollable', 'type' => 'bool', 'facet' => true],
                        ['name' => 'hubcourseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timechecked', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'huburl',
                ],
            ],
            App\Models\Groupings::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'configdata', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,idnumber,description,configdata',
                ],
            ],
            App\Models\ToolRecyclebinCourse::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'section', 'type' => 'int64'],
                        ['name' => 'module', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name',
                ],
            ],
            App\Models\GradeSettings::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,value',
                ],
            ],
            App\Models\Groups::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'enrolmentkey', 'type' => 'string'],
                        ['name' => 'picture', 'type' => 'int64'],
                        ['name' => 'visibility', 'type' => 'bool', 'facet' => true],
                        ['name' => 'participation', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'idnumber,name,description,enrolmentkey',
                ],
            ],
            App\Models\H5pactivity::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'grade', 'type' => 'int64'],
                        ['name' => 'displayoptions', 'type' => 'int32'],
                        ['name' => 'enabletracking', 'type' => 'bool', 'facet' => true],
                        ['name' => 'grademethod', 'type' => 'int32'],
                        ['name' => 'reviewmode', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro',
                ],
            ],
            App\Models\ToolBrickfieldCacheActs::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'bool', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'totalactivities', 'type' => 'int64'],
                        ['name' => 'failedactivities', 'type' => 'int64'],
                        ['name' => 'passedactivities', 'type' => 'int64'],
                        ['name' => 'errorcount', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component',
                ],
            ],
            App\Models\Book::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'intro', 'type' => 'string'],
                        ['name' => 'introformat', 'type' => 'int32'],
                        ['name' => 'numbering', 'type' => 'int32'],
                        ['name' => 'navstyle', 'type' => 'int32'],
                        ['name' => 'customtitles', 'type' => 'int32'],
                        ['name' => 'revision', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,intro',
                ],
            ],
            App\Models\CourseFormatOptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'format', 'type' => 'string', 'facet' => true],
                        ['name' => 'sectionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'format,name,value',
                ],
            ],
            App\Models\ToolRecyclebinCategory::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'fullname', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'shortname,fullname',
                ],
            ],
            App\Models\CourseCompletionDefaults::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'module', 'type' => 'int64'],
                        ['name' => 'completion', 'type' => 'bool', 'facet' => true],
                        ['name' => 'completionview', 'type' => 'bool', 'facet' => true],
                        ['name' => 'completionusegrade', 'type' => 'bool', 'facet' => true],
                        ['name' => 'completionpassgrade', 'type' => 'bool', 'facet' => true],
                        ['name' => 'completionexpected', 'type' => 'int64'],
                        ['name' => 'customrules', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'customrules',
                ],
            ],
            App\Models\GradeImportNewitem::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'itemname', 'type' => 'string'],
                        ['name' => 'importcode', 'type' => 'int64'],
                        ['name' => 'importer', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'itemname',
                ],
            ],
            App\Models\EventSubscriptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'url', 'type' => 'string'],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'eventtype', 'type' => 'string'],
                        ['name' => 'pollinterval', 'type' => 'int64'],
                        ['name' => 'lastupdated', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'url,eventtype,name',
                ],
            ],
            App\Models\MessageContactRequests::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'requesteduserid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CompetencyCoursecompsetting::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pushratingstouserplans', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CompetencyUsercompplan::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'competencyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'planid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'proficiency', 'type' => 'int32'],
                        ['name' => 'grade', 'type' => 'int64'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\EventsQueue::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'eventdata', 'type' => 'string'],
                        ['name' => 'stackdump', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'eventdata,stackdump',
                ],
            ],
            App\Models\Sessions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'state', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sid', 'type' => 'string', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sessdata', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'firstip', 'type' => 'string'],
                        ['name' => 'lastip', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'sid,sessdata,firstip,lastip',
                ],
            ],
            App\Models\TaskAdhoc::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'classname', 'type' => 'string'],
                        ['name' => 'nextruntime', 'type' => 'int64'],
                        ['name' => 'faildelay', 'type' => 'int64'],
                        ['name' => 'customdata', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'blocking', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timestarted', 'type' => 'int64'],
                        ['name' => 'hostname', 'type' => 'string'],
                        ['name' => 'pid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'component,classname,customdata,hostname',
                ],
            ],
            App\Models\ToolMfaAuth::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'lastverified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\InfectedFiles::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'filename', 'type' => 'string'],
                        ['name' => 'quarantinedfile', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'reason', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'filename,quarantinedfile,reason',
                ],
            ],
            App\Models\RepositoryOnedriveAccess::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'permissionid', 'type' => 'string', 'facet' => true],
                        ['name' => 'itemid', 'type' => 'string', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'permissionid,itemid',
                ],
            ],
            App\Models\Scale::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'scale', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,scale,description',
                ],
            ],
            App\Models\QuizaccessSebTemplate::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'content', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,description,content',
                ],
            ],
            App\Models\BlogExternal::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'url', 'type' => 'string'],
                        ['name' => 'filtertags', 'type' => 'string'],
                        ['name' => 'failedlastsync', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'timefetched', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,description,url,filtertags',
                ],
            ],
            App\Models\CompetencyUserevidence::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'bool', 'facet' => true],
                        ['name' => 'url', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,description,url',
                ],
            ],
            App\Models\Comments::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'commentarea', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'content', 'type' => 'string'],
                        ['name' => 'format', 'type' => 'int32', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'component,commentarea,content',
                ],
            ],
            App\Models\MessageinboundMessagelist::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'messageid', 'type' => 'string', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'address', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'messageid,address',
                ],
            ],
            App\Models\ToolDataprivacyRequest::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'int64', 'facet' => true],
                        ['name' => 'comments', 'type' => 'string'],
                        ['name' => 'commentsformat', 'type' => 'int32'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'requestedby', 'type' => 'int64'],
                        ['name' => 'status', 'type' => 'int32', 'facet' => true],
                        ['name' => 'dpo', 'type' => 'int64'],
                        ['name' => 'dpocomment', 'type' => 'string'],
                        ['name' => 'dpocommentformat', 'type' => 'int32'],
                        ['name' => 'systemapproved', 'type' => 'int32'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'creationmethod', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'comments,dpocomment',
                ],
            ],
            App\Models\CompetencyTemplatecohort::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'templateid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'cohortid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CompetencyPlan::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'templateid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'origtemplateid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'bool', 'facet' => true],
                        ['name' => 'duedate', 'type' => 'int64'],
                        ['name' => 'reviewerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,description',
                ],
            ],
            App\Models\UserPasswordHistory::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'hash', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'hash',
                ],
            ],
            App\Models\UserPasswordResets::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timerequested', 'type' => 'int64'],
                        ['name' => 'timererequested', 'type' => 'int64'],
                        ['name' => 'token', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'token',
                ],
            ],
            App\Models\AssignfeedbackEditpdfQuick::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'rawtext', 'type' => 'string'],
                        ['name' => 'width', 'type' => 'int64'],
                        ['name' => 'colour', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'rawtext,colour',
                ],
            ],
            App\Models\ConfigLog::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'plugin', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                        ['name' => 'oldvalue', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'plugin,name,value,oldvalue',
                ],
            ],
            App\Models\Badge::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usercreated', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'issuername', 'type' => 'string'],
                        ['name' => 'issuerurl', 'type' => 'string'],
                        ['name' => 'issuercontact', 'type' => 'string'],
                        ['name' => 'expiredate', 'type' => 'int64'],
                        ['name' => 'expireperiod', 'type' => 'int64'],
                        ['name' => 'type', 'type' => 'bool', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'message', 'type' => 'string'],
                        ['name' => 'messagesubject', 'type' => 'string'],
                        ['name' => 'attachment', 'type' => 'bool', 'facet' => true],
                        ['name' => 'notification', 'type' => 'bool', 'facet' => true],
                        ['name' => 'status', 'type' => 'bool', 'facet' => true],
                        ['name' => 'nextcron', 'type' => 'int64'],
                        ['name' => 'version', 'type' => 'string'],
                        ['name' => 'language', 'type' => 'string'],
                        ['name' => 'imageauthorname', 'type' => 'string'],
                        ['name' => 'imageauthoremail', 'type' => 'string'],
                        ['name' => 'imageauthorurl', 'type' => 'string'],
                        ['name' => 'imagecaption', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,description,issuername,issuerurl,issuercontact,message,messagesubject,version,language,imageauthorname,imageauthoremail,imageauthorurl,imagecaption',
                ],
            ],
            App\Models\BackupControllers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'backupid', 'type' => 'string', 'facet' => true],
                        ['name' => 'operation', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'string', 'facet' => true],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'format', 'type' => 'string', 'facet' => true],
                        ['name' => 'interactive', 'type' => 'int32'],
                        ['name' => 'purpose', 'type' => 'int32'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'int32', 'facet' => true],
                        ['name' => 'execution', 'type' => 'int32'],
                        ['name' => 'executiontime', 'type' => 'int64'],
                        ['name' => 'checksum', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'progress', 'type' => 'float'],
                        ['name' => 'controller', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'backupid,operation,type,format,checksum,controller',
                ],
            ],
            App\Models\MessageUsersBlocked::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'blockeduserid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CompetencyUsercompcourse::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'competencyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'proficiency', 'type' => 'int32'],
                        ['name' => 'grade', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CompetencyUserevidencecomp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userevidenceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'competencyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\AuthLtiLinkedLogin::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'issuer', 'type' => 'string'],
                        ['name' => 'issuer256', 'type' => 'string'],
                        ['name' => 'sub', 'type' => 'string'],
                        ['name' => 'sub256', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'issuer,issuer256,sub,sub256',
                ],
            ],
            App\Models\TaskLog::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'int32', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'classname', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timestart', 'type' => 'float'],
                        ['name' => 'timeend', 'type' => 'float'],
                        ['name' => 'dbreads', 'type' => 'int64'],
                        ['name' => 'dbwrites', 'type' => 'int64'],
                        ['name' => 'result', 'type' => 'int32'],
                        ['name' => 'output', 'type' => 'string'],
                        ['name' => 'hostname', 'type' => 'string'],
                        ['name' => 'pid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component,classname,output,hostname',
                ],
            ],
            App\Models\CompetencyPlancomp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'planid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'competencyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\UserDevices::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'appid', 'type' => 'string', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'model', 'type' => 'string'],
                        ['name' => 'platform', 'type' => 'string'],
                        ['name' => 'version', 'type' => 'string'],
                        ['name' => 'pushid', 'type' => 'string', 'facet' => true],
                        ['name' => 'uuid', 'type' => 'string', 'facet' => true],
                        ['name' => 'publickey', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'appid,name,model,platform,version,pushid,uuid,publickey',
                ],
            ],
            App\Models\Notifications::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'useridfrom', 'type' => 'int64'],
                        ['name' => 'useridto', 'type' => 'int64'],
                        ['name' => 'subject', 'type' => 'string'],
                        ['name' => 'fullmessage', 'type' => 'string'],
                        ['name' => 'fullmessageformat', 'type' => 'bool', 'facet' => true],
                        ['name' => 'fullmessagehtml', 'type' => 'string'],
                        ['name' => 'smallmessage', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'eventtype', 'type' => 'string'],
                        ['name' => 'contexturl', 'type' => 'string'],
                        ['name' => 'contexturlname', 'type' => 'string'],
                        ['name' => 'timeread', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'customdata', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'subject,fullmessage,fullmessagehtml,smallmessage,component,eventtype,contexturl,contexturlname,customdata',
                ],
            ],
            App\Models\Question::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'parent', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'questiontext', 'type' => 'string'],
                        ['name' => 'questiontextformat', 'type' => 'int32'],
                        ['name' => 'generalfeedback', 'type' => 'string'],
                        ['name' => 'generalfeedbackformat', 'type' => 'int32'],
                        ['name' => 'defaultmark', 'type' => 'float'],
                        ['name' => 'penalty', 'type' => 'float'],
                        ['name' => 'qtype', 'type' => 'string'],
                        ['name' => 'length', 'type' => 'int64'],
                        ['name' => 'stamp', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'createdby', 'type' => 'int64'],
                        ['name' => 'modifiedby', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,questiontext,generalfeedback,qtype,stamp',
                ],
            ],
            App\Models\UserPrivateKey::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'script', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'instance', 'type' => 'int64'],
                        ['name' => 'iprestriction', 'type' => 'string'],
                        ['name' => 'validuntil', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'script,value,iprestriction',
                ],
            ],
            App\Models\MessageContacts::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contactid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\Oauth2AccessToken::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'issuerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'token', 'type' => 'string'],
                        ['name' => 'expires', 'type' => 'int64'],
                        ['name' => 'scope', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'token,scope',
                ],
            ],
            App\Models\AnalyticsModels::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'trained', 'type' => 'bool', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'target', 'type' => 'string'],
                        ['name' => 'indicators', 'type' => 'string'],
                        ['name' => 'timesplitting', 'type' => 'string'],
                        ['name' => 'predictionsprocessor', 'type' => 'string'],
                        ['name' => 'version', 'type' => 'int64'],
                        ['name' => 'contextids', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,target,indicators,timesplitting,predictionsprocessor,contextids',
                ],
            ],
            App\Models\UpgradeLog::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'int64', 'facet' => true],
                        ['name' => 'plugin', 'type' => 'string'],
                        ['name' => 'version', 'type' => 'string'],
                        ['name' => 'targetversion', 'type' => 'string'],
                        ['name' => 'info', 'type' => 'string'],
                        ['name' => 'details', 'type' => 'string'],
                        ['name' => 'backtrace', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'plugin,version,targetversion,info,details,backtrace',
                ],
            ],
            App\Models\Oauth2SystemAccount::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'issuerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'refreshtoken', 'type' => 'string'],
                        ['name' => 'grantedscopes', 'type' => 'string'],
                        ['name' => 'email', 'type' => 'string'],
                        ['name' => 'username', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'refreshtoken,grantedscopes,email,username',
                ],
            ],
            App\Models\ToolMfaSecrets::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'factor', 'type' => 'string'],
                        ['name' => 'secret', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'expiry', 'type' => 'int64'],
                        ['name' => 'revoked', 'type' => 'bool', 'facet' => true],
                        ['name' => 'sessionid', 'type' => 'string', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'factor,secret,sessionid',
                ],
            ],
            App\Models\CompetencyUsercomp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'competencyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'int32', 'facet' => true],
                        ['name' => 'reviewerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'proficiency', 'type' => 'int32'],
                        ['name' => 'grade', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\RoleAllowSwitch::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'allowswitch', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\RoleContextLevels::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextlevel', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\EnrolFlatfile::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'action', 'type' => 'string', 'facet' => true],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timestart', 'type' => 'int64'],
                        ['name' => 'timeend', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'action',
                ],
            ],
            App\Models\RoleAllowView::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'allowview', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolDataprivacyPurposerole::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'purposeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'lawfulbases', 'type' => 'string'],
                        ['name' => 'sensitivedatareasons', 'type' => 'string'],
                        ['name' => 'retentionperiod', 'type' => 'string'],
                        ['name' => 'protected', 'type' => 'bool', 'facet' => true],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'lawfulbases,sensitivedatareasons,retentionperiod',
                ],
            ],
            App\Models\RoleAllowOverride::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'allowoverride', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\RoleAllowAssign::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'allowassign', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\Enrol::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'enrol', 'type' => 'string'],
                        ['name' => 'status', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'enrolperiod', 'type' => 'int64'],
                        ['name' => 'enrolstartdate', 'type' => 'int64'],
                        ['name' => 'enrolenddate', 'type' => 'int64'],
                        ['name' => 'expirynotify', 'type' => 'bool', 'facet' => true],
                        ['name' => 'expirythreshold', 'type' => 'int64'],
                        ['name' => 'notifyall', 'type' => 'bool', 'facet' => true],
                        ['name' => 'password', 'type' => 'string'],
                        ['name' => 'cost', 'type' => 'string'],
                        ['name' => 'currency', 'type' => 'string'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'customint1', 'type' => 'int64'],
                        ['name' => 'customint2', 'type' => 'int64'],
                        ['name' => 'customint3', 'type' => 'int64'],
                        ['name' => 'customint4', 'type' => 'int64'],
                        ['name' => 'customint5', 'type' => 'int64'],
                        ['name' => 'customint6', 'type' => 'int64'],
                        ['name' => 'customint7', 'type' => 'int64'],
                        ['name' => 'customint8', 'type' => 'int64'],
                        ['name' => 'customchar1', 'type' => 'string'],
                        ['name' => 'customchar2', 'type' => 'string'],
                        ['name' => 'customchar3', 'type' => 'string'],
                        ['name' => 'customdec1', 'type' => 'float'],
                        ['name' => 'customdec2', 'type' => 'float'],
                        ['name' => 'customtext1', 'type' => 'string'],
                        ['name' => 'customtext2', 'type' => 'string'],
                        ['name' => 'customtext3', 'type' => 'string'],
                        ['name' => 'customtext4', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'enrol,name,password,cost,currency,customchar1,customchar2,customchar3,customtext1,customtext2,customtext3,customtext4',
                ],
            ],
            App\Models\GradingAreas::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'areaname', 'type' => 'string'],
                        ['name' => 'activemethod', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component,areaname,activemethod',
                ],
            ],
            App\Models\CustomfieldCategory::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int64'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'area', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,description,component,area',
                ],
            ],
            App\Models\PaymentAccounts::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'archived', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,idnumber',
                ],
            ],
            App\Models\MessageConversations::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'convhash', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'itemtype', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,convhash,component,itemtype',
                ],
            ],
            App\Models\FilterConfig::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'filter', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'filter,name,value',
                ],
            ],
            App\Models\CompetencyEvidence::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'usercompetencyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'action', 'type' => 'int32', 'facet' => true],
                        ['name' => 'actionuserid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'descidentifier', 'type' => 'string'],
                        ['name' => 'desccomponent', 'type' => 'string'],
                        ['name' => 'desca', 'type' => 'string'],
                        ['name' => 'url', 'type' => 'string'],
                        ['name' => 'grade', 'type' => 'int64'],
                        ['name' => 'note', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'descidentifier,desccomponent,desca,url,note',
                ],
            ],
            App\Models\ToolMonitorEvents::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'eventname', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextlevel', 'type' => 'int64'],
                        ['name' => 'contextinstanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'link', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'eventname,link',
                ],
            ],
            App\Models\QuestionSetReferences::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'usingcontextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'questionarea', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'questionscontextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'filtercondition', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component,questionarea,filtercondition',
                ],
            ],
            App\Models\ContentbankContent::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'contenttype', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'visibility', 'type' => 'bool', 'facet' => true],
                        ['name' => 'instanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'configdata', 'type' => 'string'],
                        ['name' => 'usercreated', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,contenttype,configdata',
                ],
            ],
            App\Models\BlockInstances::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'blockname', 'type' => 'string'],
                        ['name' => 'parentcontextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'showinsubcontexts', 'type' => 'int32'],
                        ['name' => 'requiredbytheme', 'type' => 'int32'],
                        ['name' => 'pagetypepattern', 'type' => 'string'],
                        ['name' => 'subpagepattern', 'type' => 'string'],
                        ['name' => 'defaultregion', 'type' => 'string'],
                        ['name' => 'defaultweight', 'type' => 'int64'],
                        ['name' => 'configdata', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'blockname,pagetypepattern,subpagepattern,defaultregion,configdata',
                ],
            ],
            App\Models\RoleNames::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name',
                ],
            ],
            App\Models\RoleAssignments::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'modifierid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component',
                ],
            ],
            App\Models\SearchIndexRequests::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'searcharea', 'type' => 'string'],
                        ['name' => 'timerequested', 'type' => 'int64'],
                        ['name' => 'partialarea', 'type' => 'string'],
                        ['name' => 'partialtime', 'type' => 'int64'],
                        ['name' => 'indexpriority', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'searcharea,partialarea',
                ],
            ],
            App\Models\FilterActive::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'filter', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'active', 'type' => 'int32', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'filter',
                ],
            ],
            App\Models\LogstoreStandardLog::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'eventname', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'action', 'type' => 'string', 'facet' => true],
                        ['name' => 'target', 'type' => 'string'],
                        ['name' => 'objecttable', 'type' => 'string'],
                        ['name' => 'objectid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'crud', 'type' => 'string'],
                        ['name' => 'edulevel', 'type' => 'bool', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextlevel', 'type' => 'int64'],
                        ['name' => 'contextinstanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'relateduserid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'anonymous', 'type' => 'bool', 'facet' => true],
                        ['name' => 'other', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'origin', 'type' => 'string'],
                        ['name' => 'ip', 'type' => 'string'],
                        ['name' => 'realuserid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'eventname,component,action,target,objecttable,crud,other,origin,ip',
                ],
            ],
            App\Models\Cohort::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'visible', 'type' => 'bool', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'theme', 'type' => 'string', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,idnumber,description,component,theme',
                ],
            ],
            App\Models\QuestionUsages::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'preferredbehaviour', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component,preferredbehaviour',
                ],
            ],
            App\Models\AnalyticsIndicatorCalc::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'starttime', 'type' => 'int64'],
                        ['name' => 'endtime', 'type' => 'int64'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sampleorigin', 'type' => 'string'],
                        ['name' => 'sampleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'indicator', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'float'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'sampleorigin,indicator',
                ],
            ],
            App\Models\Communication::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'instanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'instancetype', 'type' => 'string'],
                        ['name' => 'provider', 'type' => 'string'],
                        ['name' => 'roomname', 'type' => 'string'],
                        ['name' => 'avatarfilename', 'type' => 'string'],
                        ['name' => 'active', 'type' => 'bool', 'facet' => true],
                        ['name' => 'avatarsynced', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component,instancetype,provider,roomname,avatarfilename',
                ],
            ],
            App\Models\Favourite::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'itemtype', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'ordering', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'component,itemtype',
                ],
            ],
            App\Models\CompetencyTemplate::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'visible', 'type' => 'int32', 'facet' => true],
                        ['name' => 'duedate', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'shortname,description',
                ],
            ],
            App\Models\ReportbuilderReport::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'source', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'int32', 'facet' => true],
                        ['name' => 'uniquerows', 'type' => 'bool', 'facet' => true],
                        ['name' => 'conditiondata', 'type' => 'string'],
                        ['name' => 'settingsdata', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'area', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'usercreated', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,source,conditiondata,settingsdata,component,area',
                ],
            ],
            App\Models\RepositoryInstances::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'typeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'username', 'type' => 'string'],
                        ['name' => 'password', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'readonly', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,username,password',
                ],
            ],
            App\Models\RoleCapabilities::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'roleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'capability', 'type' => 'string'],
                        ['name' => 'permission', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'modifierid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'capability',
                ],
            ],
            App\Models\QuestionBankEntries::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questioncategoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'ownerid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'idnumber',
                ],
            ],
            App\Models\QuestionDatasetDefinitions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'category', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'int64', 'facet' => true],
                        ['name' => 'options', 'type' => 'string'],
                        ['name' => 'itemcount', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,options',
                ],
            ],
            App\Models\MnetHost::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'deleted', 'type' => 'bool', 'facet' => true],
                        ['name' => 'wwwroot', 'type' => 'string'],
                        ['name' => 'ip_address', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'public_key', 'type' => 'string'],
                        ['name' => 'public_key_expires', 'type' => 'int64'],
                        ['name' => 'transport', 'type' => 'int32'],
                        ['name' => 'portno', 'type' => 'int32'],
                        ['name' => 'last_connect_time', 'type' => 'int64'],
                        ['name' => 'last_log_id', 'type' => 'int64', 'facet' => true],
                        ['name' => 'force_theme', 'type' => 'bool', 'facet' => true],
                        ['name' => 'theme', 'type' => 'string', 'facet' => true],
                        ['name' => 'applicationid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sslverification', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'wwwroot,ip_address,name,public_key,theme',
                ],
            ],
            App\Models\Tag::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'tagcollid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'rawname', 'type' => 'string'],
                        ['name' => 'isstandard', 'type' => 'bool', 'facet' => true],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'flag', 'type' => 'int32'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,rawname,description',
                ],
            ],
            App\Models\TagArea::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'itemtype', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'tagcollid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'callback', 'type' => 'string'],
                        ['name' => 'callbackfile', 'type' => 'string'],
                        ['name' => 'showstandard', 'type' => 'bool', 'facet' => true],
                        ['name' => 'multiplecontexts', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component,itemtype,callback,callbackfile',
                ],
            ],
            App\Models\PortfolioTempdata::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'data', 'type' => 'string'],
                        ['name' => 'expirytime', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'instance', 'type' => 'int64'],
                        ['name' => 'queued', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'data',
                ],
            ],
            App\Models\PortfolioInstanceConfig::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'instance', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,value',
                ],
            ],
            App\Models\PortfolioInstanceUser::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'instance', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,value',
                ],
            ],
            App\Models\ExternalServicesUsers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'externalserviceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'iprestriction', 'type' => 'string'],
                        ['name' => 'validuntil', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'iprestriction',
                ],
            ],
            App\Models\ExternalServicesFunctions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'externalserviceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'functionname', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'functionname',
                ],
            ],
            App\Models\ExternalTokens::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'token', 'type' => 'string'],
                        ['name' => 'privatetoken', 'type' => 'string'],
                        ['name' => 'tokentype', 'type' => 'int32'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'externalserviceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sid', 'type' => 'string', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'creatorid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'iprestriction', 'type' => 'string'],
                        ['name' => 'validuntil', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'lastaccess', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'token,privatetoken,sid,iprestriction,name',
                ],
            ],
            App\Models\MessageinboundDatakeys::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'handler', 'type' => 'int64'],
                        ['name' => 'datavalue', 'type' => 'int64'],
                        ['name' => 'datakey', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'expires', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'datakey',
                ],
            ],
            App\Models\Oauth2RefreshToken::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'issuerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'token', 'type' => 'string'],
                        ['name' => 'scopehash', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'token,scopehash',
                ],
            ],
            App\Models\BadgeExternalBackpack::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'backpackapiurl', 'type' => 'string'],
                        ['name' => 'backpackweburl', 'type' => 'string'],
                        ['name' => 'apiversion', 'type' => 'string'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'oauth2_issuerid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'backpackapiurl,backpackweburl,apiversion',
                ],
            ],
            App\Models\Oauth2Endpoint::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'url', 'type' => 'string'],
                        ['name' => 'issuerid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,url',
                ],
            ],
            App\Models\AuthOauth2LinkedLogin::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'issuerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'username', 'type' => 'string'],
                        ['name' => 'email', 'type' => 'string'],
                        ['name' => 'confirmtoken', 'type' => 'string'],
                        ['name' => 'confirmtokenexpires', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'username,email,confirmtoken',
                ],
            ],
            App\Models\Oauth2UserFieldMapping::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'issuerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'externalfield', 'type' => 'string'],
                        ['name' => 'internalfield', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'externalfield,internalfield',
                ],
            ],
            App\Models\H5p::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'jsoncontent', 'type' => 'string'],
                        ['name' => 'mainlibraryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'displayoptions', 'type' => 'int32'],
                        ['name' => 'pathnamehash', 'type' => 'string'],
                        ['name' => 'contenthash', 'type' => 'string'],
                        ['name' => 'filtered', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'jsoncontent,pathnamehash,contenthash,filtered',
                ],
            ],
            App\Models\H5pLibraryDependencies::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'libraryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'requiredlibraryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'dependencytype', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'dependencytype',
                ],
            ],
            App\Models\H5pLibrariesCachedassets::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'libraryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'hash', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'hash',
                ],
            ],
            App\Models\AssignSubmission::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'assignment', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'timestarted', 'type' => 'int64'],
                        ['name' => 'status', 'type' => 'string', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'attemptnumber', 'type' => 'int64'],
                        ['name' => 'latest', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'status',
                ],
            ],
            App\Models\AssignPluginConfig::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'assignment', 'type' => 'int64'],
                        ['name' => 'plugin', 'type' => 'string'],
                        ['name' => 'subtype', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'plugin,subtype,name,value',
                ],
            ],
            App\Models\AssignUserMapping::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'assignment', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\AssignGrades::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'assignment', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'grader', 'type' => 'int64'],
                        ['name' => 'grade', 'type' => 'float'],
                        ['name' => 'attemptnumber', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\AssignUserFlags::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'assignment', 'type' => 'int64'],
                        ['name' => 'locked', 'type' => 'int64'],
                        ['name' => 'mailed', 'type' => 'int32'],
                        ['name' => 'extensionduedate', 'type' => 'int64'],
                        ['name' => 'workflowstate', 'type' => 'string'],
                        ['name' => 'allocatedmarker', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'workflowstate',
                ],
            ],
            App\Models\BigbluebuttonbnRecordings::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'bigbluebuttonbnid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'recordingid', 'type' => 'string', 'facet' => true],
                        ['name' => 'headless', 'type' => 'bool', 'facet' => true],
                        ['name' => 'imported', 'type' => 'bool', 'facet' => true],
                        ['name' => 'status', 'type' => 'bool', 'facet' => true],
                        ['name' => 'importeddata', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'recordingid,importeddata',
                ],
            ],
            App\Models\ChatMessages::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'chatid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'issystem', 'type' => 'bool', 'facet' => true],
                        ['name' => 'message', 'type' => 'string'],
                        ['name' => 'timestamp', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'message',
                ],
            ],
            App\Models\ChatUsers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'chatid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'version', 'type' => 'string'],
                        ['name' => 'ip', 'type' => 'string'],
                        ['name' => 'firstping', 'type' => 'int64'],
                        ['name' => 'lastping', 'type' => 'int64'],
                        ['name' => 'lastmessageping', 'type' => 'int64'],
                        ['name' => 'sid', 'type' => 'string', 'facet' => true],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'lang', 'type' => 'string', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'version,ip,sid,lang',
                ],
            ],
            App\Models\ChatMessagesCurrent::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'chatid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'issystem', 'type' => 'bool', 'facet' => true],
                        ['name' => 'message', 'type' => 'string'],
                        ['name' => 'timestamp', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'message',
                ],
            ],
            App\Models\ChoiceOptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'choiceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'text', 'type' => 'string'],
                        ['name' => 'maxanswers', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'text',
                ],
            ],
            App\Models\DataRecords::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'dataid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'approved', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\DataFields::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'dataid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'type', 'type' => 'string', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'required', 'type' => 'bool', 'facet' => true],
                        ['name' => 'param1', 'type' => 'string'],
                        ['name' => 'param2', 'type' => 'string'],
                        ['name' => 'param3', 'type' => 'string'],
                        ['name' => 'param4', 'type' => 'string'],
                        ['name' => 'param5', 'type' => 'string'],
                        ['name' => 'param6', 'type' => 'string'],
                        ['name' => 'param7', 'type' => 'string'],
                        ['name' => 'param8', 'type' => 'string'],
                        ['name' => 'param9', 'type' => 'string'],
                        ['name' => 'param10', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'type,name,description,param1,param2,param3,param4,param5,param6,param7,param8,param9,param10',
                ],
            ],
            App\Models\FeedbackCompleted::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'feedback', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'random_response', 'type' => 'int64'],
                        ['name' => 'anonymous_response', 'type' => 'bool', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\FeedbackSitecourseMap::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'feedbackid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\FeedbackCompletedtmp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'feedback', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'guestid', 'type' => 'string', 'facet' => true],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'random_response', 'type' => 'int64'],
                        ['name' => 'anonymous_response', 'type' => 'bool', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'guestid',
                ],
            ],
            App\Models\FeedbackItem::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'feedback', 'type' => 'int64'],
                        ['name' => 'template', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'label', 'type' => 'string'],
                        ['name' => 'presentation', 'type' => 'string'],
                        ['name' => 'typ', 'type' => 'string'],
                        ['name' => 'hasvalue', 'type' => 'bool', 'facet' => true],
                        ['name' => 'position', 'type' => 'int32'],
                        ['name' => 'required', 'type' => 'bool', 'facet' => true],
                        ['name' => 'dependitem', 'type' => 'int64'],
                        ['name' => 'dependvalue', 'type' => 'string'],
                        ['name' => 'options', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,label,presentation,typ,dependvalue,options',
                ],
            ],
            App\Models\ForumDiscussions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'forum', 'type' => 'int64'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'firstpost', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'assessed', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timestart', 'type' => 'int64'],
                        ['name' => 'timeend', 'type' => 'int64'],
                        ['name' => 'pinned', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timelocked', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name',
                ],
            ],
            App\Models\ForumGrades::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'forum', 'type' => 'int64'],
                        ['name' => 'itemnumber', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'grade', 'type' => 'float'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ForumDigests::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'forum', 'type' => 'int64'],
                        ['name' => 'maildigest', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ForumSubscriptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'forum', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\GlossaryEntries::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'glossaryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'concept', 'type' => 'string'],
                        ['name' => 'definition', 'type' => 'string'],
                        ['name' => 'definitionformat', 'type' => 'int32'],
                        ['name' => 'definitiontrust', 'type' => 'int32'],
                        ['name' => 'attachment', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'teacherentry', 'type' => 'int32'],
                        ['name' => 'sourceglossaryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'usedynalink', 'type' => 'int32'],
                        ['name' => 'casesensitive', 'type' => 'int32'],
                        ['name' => 'fullmatch', 'type' => 'int32'],
                        ['name' => 'approved', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'concept,definition,attachment',
                ],
            ],
            App\Models\GlossaryCategories::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'glossaryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'usedynalink', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name',
                ],
            ],
            App\Models\LessonTimer::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'lessonid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'starttime', 'type' => 'int64'],
                        ['name' => 'lessontime', 'type' => 'int64'],
                        ['name' => 'completed', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timemodifiedoffline', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\LessonPages::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'lessonid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'prevpageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'nextpageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'qtype', 'type' => 'int32'],
                        ['name' => 'qoption', 'type' => 'int32'],
                        ['name' => 'layout', 'type' => 'int32'],
                        ['name' => 'display', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'title', 'type' => 'string'],
                        ['name' => 'contents', 'type' => 'string'],
                        ['name' => 'contentsformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'title,contents',
                ],
            ],
            App\Models\LessonGrades::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'lessonid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'grade', 'type' => 'string'],
                        ['name' => 'late', 'type' => 'int32'],
                        ['name' => 'completed', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\LtiTypesCategories::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'typeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\LtiAccessTokens::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'typeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'scope', 'type' => 'string'],
                        ['name' => 'token', 'type' => 'string'],
                        ['name' => 'validuntil', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'lastaccess', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'scope,token',
                ],
            ],
            App\Models\LtiToolSettings::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'toolproxyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'typeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'coursemoduleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'settings', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'settings',
                ],
            ],
            App\Models\QuizGrades::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'quiz', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'grade', 'type' => 'float'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\QuizAttempts::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'quiz', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'attempt', 'type' => 'int32'],
                        ['name' => 'uniqueid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'layout', 'type' => 'string'],
                        ['name' => 'currentpage', 'type' => 'int64'],
                        ['name' => 'preview', 'type' => 'int32'],
                        ['name' => 'state', 'type' => 'string', 'facet' => true],
                        ['name' => 'timestart', 'type' => 'int64'],
                        ['name' => 'timefinish', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'timemodifiedoffline', 'type' => 'int64'],
                        ['name' => 'timecheckstate', 'type' => 'int64'],
                        ['name' => 'sumgrades', 'type' => 'float'],
                        ['name' => 'gradednotificationsenttime', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'layout,state',
                ],
            ],
            App\Models\QuizSlots::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'slot', 'type' => 'int64'],
                        ['name' => 'quizid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'page', 'type' => 'int64'],
                        ['name' => 'displaynumber', 'type' => 'string'],
                        ['name' => 'requireprevious', 'type' => 'int32'],
                        ['name' => 'maxmark', 'type' => 'float'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'displaynumber',
                ],
            ],
            App\Models\QuizFeedback::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'quizid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'feedbacktext', 'type' => 'string'],
                        ['name' => 'feedbacktextformat', 'type' => 'int32'],
                        ['name' => 'mingrade', 'type' => 'float'],
                        ['name' => 'maxgrade', 'type' => 'float'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'feedbacktext',
                ],
            ],
            App\Models\QuizSections::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'quizid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'firstslot', 'type' => 'int64'],
                        ['name' => 'heading', 'type' => 'string'],
                        ['name' => 'shufflequestions', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'heading',
                ],
            ],
            App\Models\ScormScoes::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'scorm', 'type' => 'int64'],
                        ['name' => 'manifest', 'type' => 'string'],
                        ['name' => 'organization', 'type' => 'string'],
                        ['name' => 'parent', 'type' => 'string'],
                        ['name' => 'identifier', 'type' => 'string'],
                        ['name' => 'launch', 'type' => 'string'],
                        ['name' => 'scormtype', 'type' => 'string'],
                        ['name' => 'title', 'type' => 'string'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'manifest,organization,parent,identifier,launch,scormtype,title',
                ],
            ],
            App\Models\ScormAttempt::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'scormid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'attempt', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ScormAiccSession::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'scormid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'hacpsession', 'type' => 'string'],
                        ['name' => 'scoid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'scormmode', 'type' => 'string'],
                        ['name' => 'scormstatus', 'type' => 'string'],
                        ['name' => 'attempt', 'type' => 'int64'],
                        ['name' => 'lessonstatus', 'type' => 'string'],
                        ['name' => 'sessiontime', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'hacpsession,scormmode,scormstatus,lessonstatus,sessiontime',
                ],
            ],
            App\Models\SurveyAnalysis::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'survey', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'notes', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'notes',
                ],
            ],
            App\Models\SurveyAnswers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'survey', 'type' => 'int64'],
                        ['name' => 'question', 'type' => 'int64'],
                        ['name' => 'time', 'type' => 'int64'],
                        ['name' => 'answer1', 'type' => 'string'],
                        ['name' => 'answer2', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'answer1,answer2',
                ],
            ],
            App\Models\WikiSubwikis::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'wikiid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolMonitorHistory::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'sid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timesent', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\EnrolLtiLti2ResourceLink::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'consumerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'ltiresourcelinkkey', 'type' => 'string'],
                        ['name' => 'settings', 'type' => 'string'],
                        ['name' => 'primaryresourcelinkid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'shareapproved', 'type' => 'bool', 'facet' => true],
                        ['name' => 'created', 'type' => 'int64'],
                        ['name' => 'updated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'ltiresourcelinkkey,settings',
                ],
            ],
            App\Models\EnrolLtiContext::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'string', 'facet' => true],
                        ['name' => 'ltideploymentid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'type', 'type' => 'string', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'contextid,type',
                ],
            ],
            App\Models\GradeCategoriesHistory::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'action', 'type' => 'int64', 'facet' => true],
                        ['name' => 'oldid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'source', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'loggeduser', 'type' => 'int64'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'parent', 'type' => 'int64'],
                        ['name' => 'depth', 'type' => 'int64'],
                        ['name' => 'path', 'type' => 'string'],
                        ['name' => 'fullname', 'type' => 'string'],
                        ['name' => 'aggregation', 'type' => 'int64'],
                        ['name' => 'keephigh', 'type' => 'int64'],
                        ['name' => 'droplow', 'type' => 'int64'],
                        ['name' => 'aggregateonlygraded', 'type' => 'bool', 'facet' => true],
                        ['name' => 'aggregateoutcomes', 'type' => 'bool', 'facet' => true],
                        ['name' => 'aggregatesubcats', 'type' => 'bool', 'facet' => true],
                        ['name' => 'hidden', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'source,path,fullname',
                ],
            ],
            App\Models\WorkshopSubmissions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'workshopid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'example', 'type' => 'int32'],
                        ['name' => 'authorid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'title', 'type' => 'string'],
                        ['name' => 'content', 'type' => 'string'],
                        ['name' => 'contentformat', 'type' => 'int32'],
                        ['name' => 'contenttrust', 'type' => 'int32'],
                        ['name' => 'attachment', 'type' => 'int32'],
                        ['name' => 'grade', 'type' => 'float'],
                        ['name' => 'gradeover', 'type' => 'float'],
                        ['name' => 'gradeoverby', 'type' => 'int64'],
                        ['name' => 'feedbackauthor', 'type' => 'string'],
                        ['name' => 'feedbackauthorformat', 'type' => 'int32'],
                        ['name' => 'timegraded', 'type' => 'int64'],
                        ['name' => 'published', 'type' => 'int32'],
                        ['name' => 'late', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'title,content,feedbackauthor',
                ],
            ],
            App\Models\WorkshopformRubric::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'workshopid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sort', 'type' => 'int64'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'description',
                ],
            ],
            App\Models\WorkshopformComments::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'workshopid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sort', 'type' => 'int64'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'description',
                ],
            ],
            App\Models\WorkshopformNumerrors::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'workshopid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sort', 'type' => 'int64'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'descriptiontrust', 'type' => 'int64'],
                        ['name' => 'grade0', 'type' => 'string'],
                        ['name' => 'grade1', 'type' => 'string'],
                        ['name' => 'weight', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'description,grade0,grade1',
                ],
            ],
            App\Models\WorkshopformAccumulative::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'workshopid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sort', 'type' => 'int64'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'grade', 'type' => 'int64'],
                        ['name' => 'weight', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'description',
                ],
            ],
            App\Models\WorkshopAggregations::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'workshopid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'gradinggrade', 'type' => 'float'],
                        ['name' => 'timegraded', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\WorkshopformNumerrorsMap::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'workshopid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'nonegative', 'type' => 'int64'],
                        ['name' => 'grade', 'type' => 'float'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CourseModules::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course', 'type' => 'int64'],
                        ['name' => 'module', 'type' => 'int64'],
                        ['name' => 'instance', 'type' => 'int64'],
                        ['name' => 'section', 'type' => 'int64'],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'added', 'type' => 'int64'],
                        ['name' => 'score', 'type' => 'int32'],
                        ['name' => 'indent', 'type' => 'int32'],
                        ['name' => 'visible', 'type' => 'bool', 'facet' => true],
                        ['name' => 'visibleoncoursepage', 'type' => 'bool', 'facet' => true],
                        ['name' => 'visibleold', 'type' => 'bool', 'facet' => true],
                        ['name' => 'groupmode', 'type' => 'int32'],
                        ['name' => 'groupingid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'completion', 'type' => 'bool', 'facet' => true],
                        ['name' => 'completiongradeitemnumber', 'type' => 'int64'],
                        ['name' => 'completionview', 'type' => 'bool', 'facet' => true],
                        ['name' => 'completionexpected', 'type' => 'int64'],
                        ['name' => 'completionpassgrade', 'type' => 'bool', 'facet' => true],
                        ['name' => 'showdescription', 'type' => 'bool', 'facet' => true],
                        ['name' => 'availability', 'type' => 'string'],
                        ['name' => 'deletioninprogress', 'type' => 'bool', 'facet' => true],
                        ['name' => 'downloadcontent', 'type' => 'bool', 'facet' => true],
                        ['name' => 'lang', 'type' => 'string', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'idnumber,availability,lang',
                ],
            ],
            App\Models\LessonOverrides::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'lessonid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'available', 'type' => 'int64'],
                        ['name' => 'deadline', 'type' => 'int64'],
                        ['name' => 'timelimit', 'type' => 'int64'],
                        ['name' => 'review', 'type' => 'int32'],
                        ['name' => 'maxattempts', 'type' => 'int32'],
                        ['name' => 'retake', 'type' => 'int32'],
                        ['name' => 'password', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'password',
                ],
            ],
            App\Models\GroupingsGroups::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'groupingid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeadded', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\QuizOverrides::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'quiz', 'type' => 'int64'],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeopen', 'type' => 'int64'],
                        ['name' => 'timeclose', 'type' => 'int64'],
                        ['name' => 'timelimit', 'type' => 'int64'],
                        ['name' => 'attempts', 'type' => 'int32'],
                        ['name' => 'password', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'password',
                ],
            ],
            App\Models\GroupsMembers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeadded', 'type' => 'int64'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component',
                ],
            ],
            App\Models\AssignOverrides::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'assignid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'allowsubmissionsfromdate', 'type' => 'int64'],
                        ['name' => 'duedate', 'type' => 'int64'],
                        ['name' => 'cutoffdate', 'type' => 'int64'],
                        ['name' => 'timelimit', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\H5pactivityAttempts::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'h5pactivityid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'attempt', 'type' => 'int32'],
                        ['name' => 'rawscore', 'type' => 'int64'],
                        ['name' => 'maxscore', 'type' => 'int64'],
                        ['name' => 'scaled', 'type' => 'float'],
                        ['name' => 'duration', 'type' => 'int64'],
                        ['name' => 'completion', 'type' => 'bool', 'facet' => true],
                        ['name' => 'success', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\Event::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'format', 'type' => 'int32', 'facet' => true],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'repeatid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'modulename', 'type' => 'string'],
                        ['name' => 'instance', 'type' => 'int64'],
                        ['name' => 'type', 'type' => 'int32', 'facet' => true],
                        ['name' => 'eventtype', 'type' => 'string'],
                        ['name' => 'timestart', 'type' => 'int64'],
                        ['name' => 'timeduration', 'type' => 'int64'],
                        ['name' => 'timesort', 'type' => 'int64'],
                        ['name' => 'visible', 'type' => 'int32', 'facet' => true],
                        ['name' => 'uuid', 'type' => 'string', 'facet' => true],
                        ['name' => 'sequence', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'subscriptionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'priority', 'type' => 'int64'],
                        ['name' => 'location', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,description,component,modulename,eventtype,uuid,location',
                ],
            ],
            App\Models\EventsQueueHandlers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'queuedeventid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'handlerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'int64', 'facet' => true],
                        ['name' => 'errormessage', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'errormessage',
                ],
            ],
            App\Models\GradeOutcomes::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'fullname', 'type' => 'string'],
                        ['name' => 'scaleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'shortname,fullname,description',
                ],
            ],
            App\Models\CompetencyFramework::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'scaleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'scaleconfiguration', 'type' => 'string'],
                        ['name' => 'visible', 'type' => 'int32', 'facet' => true],
                        ['name' => 'taxonomies', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'shortname,idnumber,description,scaleconfiguration,taxonomies',
                ],
            ],
            App\Models\Rating::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'ratingarea', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'scaleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'rating', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'component,ratingarea',
                ],
            ],
            App\Models\Competency::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'competencyframeworkid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'parentid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'path', 'type' => 'string'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'ruletype', 'type' => 'string'],
                        ['name' => 'ruleoutcome', 'type' => 'int32'],
                        ['name' => 'ruleconfig', 'type' => 'string'],
                        ['name' => 'scaleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'scaleconfiguration', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'shortname,description,idnumber,path,ruletype,ruleconfig,scaleconfiguration',
                ],
            ],
            App\Models\ScaleHistory::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'action', 'type' => 'int64', 'facet' => true],
                        ['name' => 'oldid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'source', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'loggeduser', 'type' => 'int64'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'scale', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'source,name,scale,description',
                ],
            ],
            App\Models\QuizaccessSebQuizsettings::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'quizid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'cmid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'templateid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'requiresafeexambrowser', 'type' => 'bool', 'facet' => true],
                        ['name' => 'showsebtaskbar', 'type' => 'bool', 'facet' => true],
                        ['name' => 'showwificontrol', 'type' => 'bool', 'facet' => true],
                        ['name' => 'showreloadbutton', 'type' => 'bool', 'facet' => true],
                        ['name' => 'showtime', 'type' => 'bool', 'facet' => true],
                        ['name' => 'showkeyboardlayout', 'type' => 'bool', 'facet' => true],
                        ['name' => 'allowuserquitseb', 'type' => 'bool', 'facet' => true],
                        ['name' => 'quitpassword', 'type' => 'string'],
                        ['name' => 'linkquitseb', 'type' => 'string'],
                        ['name' => 'userconfirmquit', 'type' => 'bool', 'facet' => true],
                        ['name' => 'enableaudiocontrol', 'type' => 'bool', 'facet' => true],
                        ['name' => 'muteonstartup', 'type' => 'bool', 'facet' => true],
                        ['name' => 'allowspellchecking', 'type' => 'bool', 'facet' => true],
                        ['name' => 'allowreloadinexam', 'type' => 'bool', 'facet' => true],
                        ['name' => 'activateurlfiltering', 'type' => 'bool', 'facet' => true],
                        ['name' => 'filterembeddedcontent', 'type' => 'bool', 'facet' => true],
                        ['name' => 'expressionsallowed', 'type' => 'string'],
                        ['name' => 'regexallowed', 'type' => 'string'],
                        ['name' => 'expressionsblocked', 'type' => 'string'],
                        ['name' => 'regexblocked', 'type' => 'string'],
                        ['name' => 'allowedbrowserexamkeys', 'type' => 'string'],
                        ['name' => 'showsebdownloadlink', 'type' => 'bool', 'facet' => true],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'quitpassword,linkquitseb,expressionsallowed,regexallowed,expressionsblocked,regexblocked,allowedbrowserexamkeys',
                ],
            ],
            App\Models\ToolDataprivacyRqstCtxlst::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'requestid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextlistid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\BadgeIssued::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'badgeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'uniquehash', 'type' => 'string'],
                        ['name' => 'dateissued', 'type' => 'int64'],
                        ['name' => 'dateexpire', 'type' => 'int64'],
                        ['name' => 'visible', 'type' => 'bool', 'facet' => true],
                        ['name' => 'issuernotified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'uniquehash',
                ],
            ],
            App\Models\BadgeCriteria::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'badgeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'criteriatype', 'type' => 'int64'],
                        ['name' => 'method', 'type' => 'bool', 'facet' => true],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'description',
                ],
            ],
            App\Models\BadgeRelated::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'badgeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'relatedbadgeid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\BadgeEndorsement::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'badgeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'issuername', 'type' => 'string'],
                        ['name' => 'issuerurl', 'type' => 'string'],
                        ['name' => 'issueremail', 'type' => 'string'],
                        ['name' => 'claimid', 'type' => 'string', 'facet' => true],
                        ['name' => 'claimcomment', 'type' => 'string'],
                        ['name' => 'dateissued', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'issuername,issuerurl,issueremail,claimid,claimcomment',
                ],
            ],
            App\Models\BadgeManualAward::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'badgeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'recipientid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'issuerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'issuerrole', 'type' => 'int64'],
                        ['name' => 'datemet', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\BadgeAlignment::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'badgeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'targetname', 'type' => 'string'],
                        ['name' => 'targeturl', 'type' => 'string'],
                        ['name' => 'targetdescription', 'type' => 'string'],
                        ['name' => 'targetframework', 'type' => 'string'],
                        ['name' => 'targetcode', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'targetname,targeturl,targetdescription,targetframework,targetcode',
                ],
            ],
            App\Models\BackupLogs::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'backupid', 'type' => 'string', 'facet' => true],
                        ['name' => 'loglevel', 'type' => 'int32'],
                        ['name' => 'message', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'backupid,message',
                ],
            ],
            App\Models\MessagePopupNotifications::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'notificationid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\QtypeDdmarkerDrags::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'no', 'type' => 'int64'],
                        ['name' => 'label', 'type' => 'string'],
                        ['name' => 'infinite', 'type' => 'int32'],
                        ['name' => 'noofdrags', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'label',
                ],
            ],
            App\Models\QtypeMatchSubquestions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'questiontext', 'type' => 'string'],
                        ['name' => 'questiontextformat', 'type' => 'int32'],
                        ['name' => 'answertext', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'questiontext,answertext',
                ],
            ],
            App\Models\QuestionNumericalOptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'question', 'type' => 'int64'],
                        ['name' => 'showunits', 'type' => 'int32'],
                        ['name' => 'unitsleft', 'type' => 'int32'],
                        ['name' => 'unitgradingtype', 'type' => 'int32'],
                        ['name' => 'unitpenalty', 'type' => 'float'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\QuestionResponseAnalysis::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'hashcode', 'type' => 'string'],
                        ['name' => 'whichtries', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'variant', 'type' => 'int64'],
                        ['name' => 'subqid', 'type' => 'string', 'facet' => true],
                        ['name' => 'aid', 'type' => 'string', 'facet' => true],
                        ['name' => 'response', 'type' => 'string'],
                        ['name' => 'credit', 'type' => 'float'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'hashcode,whichtries,subqid,aid,response',
                ],
            ],
            App\Models\QuestionNumericalUnits::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'question', 'type' => 'int64'],
                        ['name' => 'multiplier', 'type' => 'float'],
                        ['name' => 'unit', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'unit',
                ],
            ],
            App\Models\QuestionMultianswer::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'question', 'type' => 'int64'],
                        ['name' => 'sequence', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'sequence',
                ],
            ],
            App\Models\QuestionCalculatedOptions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'question', 'type' => 'int64'],
                        ['name' => 'synchronize', 'type' => 'int32'],
                        ['name' => 'single', 'type' => 'int32'],
                        ['name' => 'shuffleanswers', 'type' => 'int32'],
                        ['name' => 'correctfeedback', 'type' => 'string'],
                        ['name' => 'correctfeedbackformat', 'type' => 'int32'],
                        ['name' => 'partiallycorrectfeedback', 'type' => 'string'],
                        ['name' => 'partiallycorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'incorrectfeedback', 'type' => 'string'],
                        ['name' => 'incorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'answernumbering', 'type' => 'string'],
                        ['name' => 'shownumcorrect', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'correctfeedback,partiallycorrectfeedback,incorrectfeedback,answernumbering',
                ],
            ],
            App\Models\QtypeDdmarkerDrops::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'no', 'type' => 'int64'],
                        ['name' => 'shape', 'type' => 'string'],
                        ['name' => 'coords', 'type' => 'string'],
                        ['name' => 'choice', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'shape,coords',
                ],
            ],
            App\Models\QuestionStatistics::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'hashcode', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'slot', 'type' => 'int64'],
                        ['name' => 'subquestion', 'type' => 'int32'],
                        ['name' => 'variant', 'type' => 'int64'],
                        ['name' => 's', 'type' => 'int64'],
                        ['name' => 'effectiveweight', 'type' => 'float'],
                        ['name' => 'negcovar', 'type' => 'int32'],
                        ['name' => 'discriminationindex', 'type' => 'float'],
                        ['name' => 'discriminativeefficiency', 'type' => 'float'],
                        ['name' => 'sd', 'type' => 'float'],
                        ['name' => 'facility', 'type' => 'float'],
                        ['name' => 'subquestions', 'type' => 'string'],
                        ['name' => 'maxmark', 'type' => 'float'],
                        ['name' => 'positions', 'type' => 'string'],
                        ['name' => 'randomguessscore', 'type' => 'float'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'hashcode,subquestions,positions',
                ],
            ],
            App\Models\QuestionNumerical::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'question', 'type' => 'int64'],
                        ['name' => 'answer', 'type' => 'int64'],
                        ['name' => 'tolerance', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'tolerance',
                ],
            ],
            App\Models\QuestionAnswers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'question', 'type' => 'int64'],
                        ['name' => 'answer', 'type' => 'string'],
                        ['name' => 'answerformat', 'type' => 'int32'],
                        ['name' => 'fraction', 'type' => 'float'],
                        ['name' => 'feedback', 'type' => 'string'],
                        ['name' => 'feedbackformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'answer,feedback',
                ],
            ],
            App\Models\QtypeDdmarker::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'shuffleanswers', 'type' => 'int32'],
                        ['name' => 'correctfeedback', 'type' => 'string'],
                        ['name' => 'correctfeedbackformat', 'type' => 'int32'],
                        ['name' => 'partiallycorrectfeedback', 'type' => 'string'],
                        ['name' => 'partiallycorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'incorrectfeedback', 'type' => 'string'],
                        ['name' => 'incorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'shownumcorrect', 'type' => 'int32'],
                        ['name' => 'showmisplaced', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'correctfeedback,partiallycorrectfeedback,incorrectfeedback',
                ],
            ],
            App\Models\QuestionTruefalse::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'question', 'type' => 'int64'],
                        ['name' => 'trueanswer', 'type' => 'int64'],
                        ['name' => 'falseanswer', 'type' => 'int64'],
                        ['name' => 'showstandardinstruction', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\QuestionCalculated::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'question', 'type' => 'int64'],
                        ['name' => 'answer', 'type' => 'int64'],
                        ['name' => 'tolerance', 'type' => 'string'],
                        ['name' => 'tolerancetype', 'type' => 'int64'],
                        ['name' => 'correctanswerlength', 'type' => 'int64'],
                        ['name' => 'correctanswerformat', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'tolerance',
                ],
            ],
            App\Models\QtypeDdimageortextDrags::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'no', 'type' => 'int64'],
                        ['name' => 'draggroup', 'type' => 'int64'],
                        ['name' => 'infinite', 'type' => 'int32'],
                        ['name' => 'label', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'label',
                ],
            ],
            App\Models\QuestionHints::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'hint', 'type' => 'string'],
                        ['name' => 'hintformat', 'type' => 'int32'],
                        ['name' => 'shownumcorrect', 'type' => 'bool', 'facet' => true],
                        ['name' => 'clearwrong', 'type' => 'bool', 'facet' => true],
                        ['name' => 'options', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'hint,options',
                ],
            ],
            App\Models\QuestionDdwtos::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'shuffleanswers', 'type' => 'int32'],
                        ['name' => 'correctfeedback', 'type' => 'string'],
                        ['name' => 'correctfeedbackformat', 'type' => 'int32'],
                        ['name' => 'partiallycorrectfeedback', 'type' => 'string'],
                        ['name' => 'partiallycorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'incorrectfeedback', 'type' => 'string'],
                        ['name' => 'incorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'shownumcorrect', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'correctfeedback,partiallycorrectfeedback,incorrectfeedback',
                ],
            ],
            App\Models\QtypeDdimageortextDrops::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'no', 'type' => 'int64'],
                        ['name' => 'xleft', 'type' => 'int64'],
                        ['name' => 'ytop', 'type' => 'int64'],
                        ['name' => 'choice', 'type' => 'int64'],
                        ['name' => 'label', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'label',
                ],
            ],
            App\Models\QtypeDdimageortext::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'shuffleanswers', 'type' => 'int32'],
                        ['name' => 'correctfeedback', 'type' => 'string'],
                        ['name' => 'correctfeedbackformat', 'type' => 'int32'],
                        ['name' => 'partiallycorrectfeedback', 'type' => 'string'],
                        ['name' => 'partiallycorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'incorrectfeedback', 'type' => 'string'],
                        ['name' => 'incorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'shownumcorrect', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'correctfeedback,partiallycorrectfeedback,incorrectfeedback',
                ],
            ],
            App\Models\QuestionGapselect::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'shuffleanswers', 'type' => 'int32'],
                        ['name' => 'correctfeedback', 'type' => 'string'],
                        ['name' => 'correctfeedbackformat', 'type' => 'int32'],
                        ['name' => 'partiallycorrectfeedback', 'type' => 'string'],
                        ['name' => 'partiallycorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'incorrectfeedback', 'type' => 'string'],
                        ['name' => 'incorrectfeedbackformat', 'type' => 'int32'],
                        ['name' => 'shownumcorrect', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'correctfeedback,partiallycorrectfeedback,incorrectfeedback',
                ],
            ],
            App\Models\AnalyticsModelsLog::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'modelid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'version', 'type' => 'int64'],
                        ['name' => 'evaluationmode', 'type' => 'string'],
                        ['name' => 'target', 'type' => 'string'],
                        ['name' => 'indicators', 'type' => 'string'],
                        ['name' => 'timesplitting', 'type' => 'string'],
                        ['name' => 'score', 'type' => 'float'],
                        ['name' => 'info', 'type' => 'string'],
                        ['name' => 'dir', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'evaluationmode,target,indicators,timesplitting,info,dir',
                ],
            ],
            App\Models\AnalyticsPredictSamples::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'modelid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'analysableid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timesplitting', 'type' => 'string'],
                        ['name' => 'rangeindex', 'type' => 'int64'],
                        ['name' => 'sampleids', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'timesplitting,sampleids',
                ],
            ],
            App\Models\AnalyticsTrainSamples::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'modelid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'analysableid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timesplitting', 'type' => 'string'],
                        ['name' => 'sampleids', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'timesplitting,sampleids',
                ],
            ],
            App\Models\AnalyticsPredictions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'modelid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sampleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'rangeindex', 'type' => 'int32'],
                        ['name' => 'prediction', 'type' => 'float'],
                        ['name' => 'predictionscore', 'type' => 'float'],
                        ['name' => 'calculations', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timestart', 'type' => 'int64'],
                        ['name' => 'timeend', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'calculations',
                ],
            ],
            App\Models\AnalyticsUsedAnalysables::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'modelid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'action', 'type' => 'string', 'facet' => true],
                        ['name' => 'analysableid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'firstanalysis', 'type' => 'int64'],
                        ['name' => 'timeanalysed', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'action',
                ],
            ],
            App\Models\UserEnrolments::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'status', 'type' => 'int64', 'facet' => true],
                        ['name' => 'enrolid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timestart', 'type' => 'int64'],
                        ['name' => 'timeend', 'type' => 'int64'],
                        ['name' => 'modifierid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\EnrolPaypal::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'business', 'type' => 'string'],
                        ['name' => 'receiver_email', 'type' => 'string'],
                        ['name' => 'receiver_id', 'type' => 'string', 'facet' => true],
                        ['name' => 'item_name', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'instanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'memo', 'type' => 'string'],
                        ['name' => 'tax', 'type' => 'string'],
                        ['name' => 'option_name1', 'type' => 'string'],
                        ['name' => 'option_selection1_x', 'type' => 'string'],
                        ['name' => 'option_name2', 'type' => 'string'],
                        ['name' => 'option_selection2_x', 'type' => 'string'],
                        ['name' => 'payment_status', 'type' => 'string'],
                        ['name' => 'pending_reason', 'type' => 'string'],
                        ['name' => 'reason_code', 'type' => 'string'],
                        ['name' => 'txn_id', 'type' => 'string', 'facet' => true],
                        ['name' => 'parent_txn_id', 'type' => 'string', 'facet' => true],
                        ['name' => 'payment_type', 'type' => 'string'],
                        ['name' => 'timeupdated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'business,receiver_email,receiver_id,item_name,memo,tax,option_name1,option_selection1_x,option_name2,option_selection2_x,payment_status,pending_reason,reason_code,txn_id,parent_txn_id,payment_type',
                ],
            ],
            App\Models\EnrolLtiTools::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'enrolid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'ltiversion', 'type' => 'string'],
                        ['name' => 'institution', 'type' => 'string'],
                        ['name' => 'lang', 'type' => 'string', 'facet' => true],
                        ['name' => 'timezone', 'type' => 'string'],
                        ['name' => 'maxenrolled', 'type' => 'int64'],
                        ['name' => 'maildisplay', 'type' => 'int32', 'facet' => true],
                        ['name' => 'city', 'type' => 'string'],
                        ['name' => 'country', 'type' => 'string'],
                        ['name' => 'gradesync', 'type' => 'bool', 'facet' => true],
                        ['name' => 'gradesynccompletion', 'type' => 'bool', 'facet' => true],
                        ['name' => 'membersync', 'type' => 'bool', 'facet' => true],
                        ['name' => 'membersyncmode', 'type' => 'bool', 'facet' => true],
                        ['name' => 'roleinstructor', 'type' => 'int64'],
                        ['name' => 'rolelearner', 'type' => 'int64'],
                        ['name' => 'secret', 'type' => 'string'],
                        ['name' => 'uuid', 'type' => 'string', 'facet' => true],
                        ['name' => 'provisioningmodelearner', 'type' => 'int32'],
                        ['name' => 'provisioningmodeinstructor', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'ltiversion,institution,lang,timezone,city,country,secret,uuid',
                ],
            ],
            App\Models\GradingDefinitions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'areaid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'method', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'status', 'type' => 'int64', 'facet' => true],
                        ['name' => 'copiedfromid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'usercreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecopied', 'type' => 'int64'],
                        ['name' => 'options', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'method,name,description,options',
                ],
            ],
            App\Models\CustomfieldField::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'string', 'facet' => true],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int64'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'configdata', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'shortname,name,type,description,configdata',
                ],
            ],
            App\Models\PaymentGateways::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'accountid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'gateway', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'config', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'gateway,config',
                ],
            ],
            App\Models\Payments::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'paymentarea', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'amount', 'type' => 'string'],
                        ['name' => 'currency', 'type' => 'string'],
                        ['name' => 'accountid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'gateway', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'component,paymentarea,amount,currency,gateway',
                ],
            ],
            App\Models\MessageConversationMembers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'conversationid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\MessageConversationActions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'conversationid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'action', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\Messages::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'useridfrom', 'type' => 'int64'],
                        ['name' => 'conversationid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'subject', 'type' => 'string'],
                        ['name' => 'fullmessage', 'type' => 'string'],
                        ['name' => 'fullmessageformat', 'type' => 'bool', 'facet' => true],
                        ['name' => 'fullmessagehtml', 'type' => 'string'],
                        ['name' => 'smallmessage', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'fullmessagetrust', 'type' => 'int32'],
                        ['name' => 'customdata', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'subject,fullmessage,fullmessagehtml,smallmessage,customdata',
                ],
            ],
            App\Models\BlockPositions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'blockinstanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pagetype', 'type' => 'string'],
                        ['name' => 'subpage', 'type' => 'string'],
                        ['name' => 'visible', 'type' => 'int32', 'facet' => true],
                        ['name' => 'region', 'type' => 'string'],
                        ['name' => 'weight', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'pagetype,subpage,region',
                ],
            ],
            App\Models\CohortMembers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'cohortid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeadded', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\QuestionAttempts::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionusageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'slot', 'type' => 'int64'],
                        ['name' => 'behaviour', 'type' => 'string'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'variant', 'type' => 'int64'],
                        ['name' => 'maxmark', 'type' => 'float'],
                        ['name' => 'minfraction', 'type' => 'float'],
                        ['name' => 'maxfraction', 'type' => 'float'],
                        ['name' => 'flagged', 'type' => 'bool', 'facet' => true],
                        ['name' => 'questionsummary', 'type' => 'string'],
                        ['name' => 'rightanswer', 'type' => 'string'],
                        ['name' => 'responsesummary', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'behaviour,questionsummary,rightanswer,responsesummary',
                ],
            ],
            App\Models\CommunicationCustomlink::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'commid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'url', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'url',
                ],
            ],
            App\Models\CommunicationUser::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'commid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'synced', 'type' => 'bool', 'facet' => true],
                        ['name' => 'deleted', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\MatrixRoom::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'commid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'roomid', 'type' => 'string', 'facet' => true],
                        ['name' => 'topic', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'roomid,topic',
                ],
            ],
            App\Models\ReportbuilderSchedule::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'reportid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'enabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'audiences', 'type' => 'string'],
                        ['name' => 'format', 'type' => 'string', 'facet' => true],
                        ['name' => 'subject', 'type' => 'string'],
                        ['name' => 'message', 'type' => 'string'],
                        ['name' => 'messageformat', 'type' => 'int64'],
                        ['name' => 'userviewas', 'type' => 'int64'],
                        ['name' => 'timescheduled', 'type' => 'int64'],
                        ['name' => 'recurrence', 'type' => 'int64'],
                        ['name' => 'reportempty', 'type' => 'int64'],
                        ['name' => 'timelastsent', 'type' => 'int64'],
                        ['name' => 'timenextsend', 'type' => 'int64'],
                        ['name' => 'usercreated', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,audiences,format,subject,message',
                ],
            ],
            App\Models\ReportbuilderAudience::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'reportid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'heading', 'type' => 'string'],
                        ['name' => 'classname', 'type' => 'string'],
                        ['name' => 'configdata', 'type' => 'string'],
                        ['name' => 'usercreated', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'heading,classname,configdata',
                ],
            ],
            App\Models\ReportbuilderColumn::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'reportid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'uniqueidentifier', 'type' => 'string'],
                        ['name' => 'aggregation', 'type' => 'string'],
                        ['name' => 'heading', 'type' => 'string'],
                        ['name' => 'columnorder', 'type' => 'int64'],
                        ['name' => 'sortenabled', 'type' => 'bool', 'facet' => true],
                        ['name' => 'sortdirection', 'type' => 'bool', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'usercreated', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'uniqueidentifier,aggregation,heading',
                ],
            ],
            App\Models\ReportbuilderFilter::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'reportid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'uniqueidentifier', 'type' => 'string'],
                        ['name' => 'heading', 'type' => 'string'],
                        ['name' => 'iscondition', 'type' => 'bool', 'facet' => true],
                        ['name' => 'filterorder', 'type' => 'int64'],
                        ['name' => 'usercreated', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'uniqueidentifier,heading',
                ],
            ],
            App\Models\FilesReference::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'repositoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'lastsync', 'type' => 'int64'],
                        ['name' => 'reference', 'type' => 'string'],
                        ['name' => 'referencehash', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'reference,referencehash',
                ],
            ],
            App\Models\QuestionReferences::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'usingcontextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'questionarea', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'questionbankentryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'version', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component,questionarea',
                ],
            ],
            App\Models\QuestionVersions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionbankentryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'version', 'type' => 'int64'],
                        ['name' => 'questionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'string', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'status',
                ],
            ],
            App\Models\QuestionDatasets::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'question', 'type' => 'int64'],
                        ['name' => 'datasetdefinition', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\MnetserviceEnrolEnrolments::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'hostid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'remotecourseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'rolename', 'type' => 'string'],
                        ['name' => 'enroltime', 'type' => 'int64'],
                        ['name' => 'enroltype', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'rolename,enroltype',
                ],
            ],
            App\Models\MnetSession::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'username', 'type' => 'string'],
                        ['name' => 'token', 'type' => 'string'],
                        ['name' => 'mnethostid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'useragent', 'type' => 'string'],
                        ['name' => 'confirm_timeout', 'type' => 'int64'],
                        ['name' => 'session_id', 'type' => 'string', 'facet' => true],
                        ['name' => 'expires', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'username,token,useragent,session_id',
                ],
            ],
            App\Models\TagCorrelation::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'tagid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'correlatedtags', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'correlatedtags',
                ],
            ],
            App\Models\TagInstance::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'tagid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'itemtype', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'tiuserid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'ordering', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'component,itemtype',
                ],
            ],
            App\Models\PortfolioLog::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'time', 'type' => 'int64'],
                        ['name' => 'portfolio', 'type' => 'int64'],
                        ['name' => 'caller_class', 'type' => 'string'],
                        ['name' => 'caller_file', 'type' => 'string'],
                        ['name' => 'caller_component', 'type' => 'string'],
                        ['name' => 'caller_sha1', 'type' => 'string'],
                        ['name' => 'tempdataid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'returnurl', 'type' => 'string'],
                        ['name' => 'continueurl', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'caller_class,caller_file,caller_component,caller_sha1,returnurl,continueurl',
                ],
            ],
            App\Models\PortfolioMaharaQueue::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'transferid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'token', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'token',
                ],
            ],
            App\Models\BadgeBackpackOauth2::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'issuerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'externalbackpackid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'token', 'type' => 'string'],
                        ['name' => 'refreshtoken', 'type' => 'string'],
                        ['name' => 'expires', 'type' => 'int64'],
                        ['name' => 'scope', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'token,refreshtoken,scope',
                ],
            ],
            App\Models\BadgeBackpack::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'email', 'type' => 'string'],
                        ['name' => 'backpackuid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'autosync', 'type' => 'bool', 'facet' => true],
                        ['name' => 'password', 'type' => 'string'],
                        ['name' => 'externalbackpackid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'email,password',
                ],
            ],
            App\Models\H5pContentsLibraries::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'h5pid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'libraryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'dependencytype', 'type' => 'string'],
                        ['name' => 'dropcss', 'type' => 'bool', 'facet' => true],
                        ['name' => 'weight', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'dependencytype',
                ],
            ],
            App\Models\AssignsubmissionOnlinetext::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'assignment', 'type' => 'int64'],
                        ['name' => 'submission', 'type' => 'int64'],
                        ['name' => 'onlinetext', 'type' => 'string'],
                        ['name' => 'onlineformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'onlinetext',
                ],
            ],
            App\Models\AssignsubmissionFile::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'assignment', 'type' => 'int64'],
                        ['name' => 'submission', 'type' => 'int64'],
                        ['name' => 'numfiles', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\AssignfeedbackEditpdfAnnot::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'gradeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pageno', 'type' => 'int64'],
                        ['name' => 'x', 'type' => 'int64'],
                        ['name' => 'y', 'type' => 'int64'],
                        ['name' => 'endx', 'type' => 'int64'],
                        ['name' => 'endy', 'type' => 'int64'],
                        ['name' => 'path', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'string', 'facet' => true],
                        ['name' => 'colour', 'type' => 'string'],
                        ['name' => 'draft', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'path,type,colour',
                ],
            ],
            App\Models\AssignfeedbackEditpdfCmnt::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'gradeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'x', 'type' => 'int64'],
                        ['name' => 'y', 'type' => 'int64'],
                        ['name' => 'width', 'type' => 'int64'],
                        ['name' => 'rawtext', 'type' => 'string'],
                        ['name' => 'pageno', 'type' => 'int64'],
                        ['name' => 'colour', 'type' => 'string'],
                        ['name' => 'draft', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'rawtext,colour',
                ],
            ],
            App\Models\AssignfeedbackComments::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'assignment', 'type' => 'int64'],
                        ['name' => 'grade', 'type' => 'int64'],
                        ['name' => 'commenttext', 'type' => 'string'],
                        ['name' => 'commentformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'commenttext',
                ],
            ],
            App\Models\AssignfeedbackFile::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'assignment', 'type' => 'int64'],
                        ['name' => 'grade', 'type' => 'int64'],
                        ['name' => 'numfiles', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\AssignfeedbackEditpdfRot::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'gradeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pageno', 'type' => 'int64'],
                        ['name' => 'pathnamehash', 'type' => 'string'],
                        ['name' => 'isrotated', 'type' => 'bool', 'facet' => true],
                        ['name' => 'degree', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'pathnamehash',
                ],
            ],
            App\Models\ChoiceAnswers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'choiceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'optionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\DataContent::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'fieldid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'recordid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'content', 'type' => 'string'],
                        ['name' => 'content1', 'type' => 'string'],
                        ['name' => 'content2', 'type' => 'string'],
                        ['name' => 'content3', 'type' => 'string'],
                        ['name' => 'content4', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'content,content1,content2,content3,content4',
                ],
            ],
            App\Models\FeedbackValue::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course_id', 'type' => 'int64', 'facet' => true],
                        ['name' => 'item', 'type' => 'int64'],
                        ['name' => 'completed', 'type' => 'int64'],
                        ['name' => 'tmp_completed', 'type' => 'int64'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'value',
                ],
            ],
            App\Models\FeedbackValuetmp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'course_id', 'type' => 'int64', 'facet' => true],
                        ['name' => 'item', 'type' => 'int64'],
                        ['name' => 'completed', 'type' => 'int64'],
                        ['name' => 'tmp_completed', 'type' => 'int64'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'value',
                ],
            ],
            App\Models\ForumPosts::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'discussion', 'type' => 'int64'],
                        ['name' => 'parent', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'created', 'type' => 'int64'],
                        ['name' => 'modified', 'type' => 'int64'],
                        ['name' => 'mailed', 'type' => 'int32'],
                        ['name' => 'subject', 'type' => 'string'],
                        ['name' => 'message', 'type' => 'string'],
                        ['name' => 'messageformat', 'type' => 'int32'],
                        ['name' => 'messagetrust', 'type' => 'int32'],
                        ['name' => 'attachment', 'type' => 'string'],
                        ['name' => 'totalscore', 'type' => 'int32'],
                        ['name' => 'mailnow', 'type' => 'int64'],
                        ['name' => 'deleted', 'type' => 'bool', 'facet' => true],
                        ['name' => 'privatereplyto', 'type' => 'int64'],
                        ['name' => 'wordcount', 'type' => 'int64'],
                        ['name' => 'charcount', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'subject,message,attachment',
                ],
            ],
            App\Models\ForumDiscussionSubs::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'forum', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'discussion', 'type' => 'int64'],
                        ['name' => 'preference', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\GlossaryAlias::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'entryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'alias', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'alias',
                ],
            ],
            App\Models\GlossaryEntriesCategories::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'entryid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\LessonBranch::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'lessonid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'retry', 'type' => 'int64'],
                        ['name' => 'flag', 'type' => 'int32'],
                        ['name' => 'timeseen', 'type' => 'int64'],
                        ['name' => 'nextpageid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\LessonAnswers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'lessonid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'jumpto', 'type' => 'int64'],
                        ['name' => 'grade', 'type' => 'int32'],
                        ['name' => 'score', 'type' => 'int64'],
                        ['name' => 'flags', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'answer', 'type' => 'string'],
                        ['name' => 'answerformat', 'type' => 'int32'],
                        ['name' => 'response', 'type' => 'string'],
                        ['name' => 'responseformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'answer,response',
                ],
            ],
            App\Models\ScormScoesData::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'scoid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,value',
                ],
            ],
            App\Models\ScormSeqObjective::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'scoid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'primaryobj', 'type' => 'bool', 'facet' => true],
                        ['name' => 'objectiveid', 'type' => 'string', 'facet' => true],
                        ['name' => 'satisfiedbymeasure', 'type' => 'bool', 'facet' => true],
                        ['name' => 'minnormalizedmeasure', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'objectiveid',
                ],
            ],
            App\Models\ScormSeqRolluprule::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'scoid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'childactivityset', 'type' => 'string'],
                        ['name' => 'minimumcount', 'type' => 'int64'],
                        ['name' => 'minimumpercent', 'type' => 'string'],
                        ['name' => 'conditioncombination', 'type' => 'string'],
                        ['name' => 'action', 'type' => 'string', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'childactivityset,conditioncombination,action',
                ],
            ],
            App\Models\ScormSeqRuleconds::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'scoid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'conditioncombination', 'type' => 'string'],
                        ['name' => 'ruletype', 'type' => 'int32'],
                        ['name' => 'action', 'type' => 'string', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'conditioncombination,action',
                ],
            ],
            App\Models\ScormScoesValue::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'scoid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'attemptid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'elementid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'value', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'value',
                ],
            ],
            App\Models\WikiPages::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'subwikiid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'title', 'type' => 'string'],
                        ['name' => 'cachedcontent', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'timerendered', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pageviews', 'type' => 'int64'],
                        ['name' => 'readonly', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'title,cachedcontent',
                ],
            ],
            App\Models\EnrolLtiLti2UserResult::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'resourcelinkid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'ltiuserkey', 'type' => 'string'],
                        ['name' => 'ltiresultsourcedid', 'type' => 'string', 'facet' => true],
                        ['name' => 'created', 'type' => 'int64'],
                        ['name' => 'updated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'ltiuserkey,ltiresultsourcedid',
                ],
            ],
            App\Models\EnrolLtiResourceLink::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'resourcelinkid', 'type' => 'string', 'facet' => true],
                        ['name' => 'ltideploymentid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'resourceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'lticontextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'lineitemsservice', 'type' => 'string'],
                        ['name' => 'lineitemservice', 'type' => 'string'],
                        ['name' => 'lineitemscope', 'type' => 'string'],
                        ['name' => 'resultscope', 'type' => 'string'],
                        ['name' => 'scorescope', 'type' => 'string'],
                        ['name' => 'contextmembershipsurl', 'type' => 'string'],
                        ['name' => 'nrpsserviceversions', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'resourcelinkid,lineitemsservice,lineitemservice,lineitemscope,resultscope,scorescope,contextmembershipsurl,nrpsserviceversions',
                ],
            ],
            App\Models\WorkshopAssessments::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'submissionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'reviewerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'weight', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'grade', 'type' => 'float'],
                        ['name' => 'gradinggrade', 'type' => 'float'],
                        ['name' => 'gradinggradeover', 'type' => 'float'],
                        ['name' => 'gradinggradeoverby', 'type' => 'int64'],
                        ['name' => 'feedbackauthor', 'type' => 'string'],
                        ['name' => 'feedbackauthorformat', 'type' => 'int32'],
                        ['name' => 'feedbackauthorattachment', 'type' => 'int32'],
                        ['name' => 'feedbackreviewer', 'type' => 'string'],
                        ['name' => 'feedbackreviewerformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'feedbackauthor,feedbackreviewer',
                ],
            ],
            App\Models\WorkshopformRubricLevels::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'dimensionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'grade', 'type' => 'float'],
                        ['name' => 'definition', 'type' => 'string'],
                        ['name' => 'definitionformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'definition',
                ],
            ],
            App\Models\Post::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'module', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'groupid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'moduleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'coursemoduleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'subject', 'type' => 'string'],
                        ['name' => 'summary', 'type' => 'string'],
                        ['name' => 'content', 'type' => 'string'],
                        ['name' => 'uniquehash', 'type' => 'string'],
                        ['name' => 'rating', 'type' => 'int64'],
                        ['name' => 'format', 'type' => 'int64', 'facet' => true],
                        ['name' => 'summaryformat', 'type' => 'int32'],
                        ['name' => 'attachment', 'type' => 'string'],
                        ['name' => 'publishstate', 'type' => 'string'],
                        ['name' => 'lastmodified', 'type' => 'int64'],
                        ['name' => 'created', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'module,subject,summary,content,uniquehash,attachment,publishstate',
                ],
            ],
            App\Models\BlockRecentlyaccesseditems::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'cmid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timeaccess', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolBrickfieldAreas::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'int32', 'facet' => true],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'tablename', 'type' => 'string'],
                        ['name' => 'fieldorarea', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'filename', 'type' => 'string'],
                        ['name' => 'reftable', 'type' => 'string'],
                        ['name' => 'refid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'cmid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'component,tablename,fieldorarea,filename,reftable',
                ],
            ],
            App\Models\H5pactivityAttemptsResults::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'attemptid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'subcontent', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'interactiontype', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'correctpattern', 'type' => 'string'],
                        ['name' => 'response', 'type' => 'string'],
                        ['name' => 'additionals', 'type' => 'string'],
                        ['name' => 'rawscore', 'type' => 'int64'],
                        ['name' => 'maxscore', 'type' => 'int64'],
                        ['name' => 'duration', 'type' => 'int64'],
                        ['name' => 'completion', 'type' => 'bool', 'facet' => true],
                        ['name' => 'success', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'subcontent,interactiontype,description,correctpattern,response,additionals',
                ],
            ],
            App\Models\GradeOutcomesHistory::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'action', 'type' => 'int64', 'facet' => true],
                        ['name' => 'oldid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'source', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'loggeduser', 'type' => 'int64'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'fullname', 'type' => 'string'],
                        ['name' => 'scaleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'source,shortname,fullname,description',
                ],
            ],
            App\Models\GradeOutcomesCourses::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'outcomeid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\GradeItems::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'itemname', 'type' => 'string'],
                        ['name' => 'itemtype', 'type' => 'string'],
                        ['name' => 'itemmodule', 'type' => 'string'],
                        ['name' => 'iteminstance', 'type' => 'int64'],
                        ['name' => 'itemnumber', 'type' => 'int64'],
                        ['name' => 'iteminfo', 'type' => 'string'],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'calculation', 'type' => 'string'],
                        ['name' => 'gradetype', 'type' => 'int32'],
                        ['name' => 'grademax', 'type' => 'float'],
                        ['name' => 'grademin', 'type' => 'float'],
                        ['name' => 'scaleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'outcomeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'gradepass', 'type' => 'float'],
                        ['name' => 'multfactor', 'type' => 'float'],
                        ['name' => 'plusfactor', 'type' => 'float'],
                        ['name' => 'aggregationcoef', 'type' => 'float'],
                        ['name' => 'aggregationcoef2', 'type' => 'float'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'display', 'type' => 'int64'],
                        ['name' => 'decimals', 'type' => 'bool', 'facet' => true],
                        ['name' => 'hidden', 'type' => 'int64'],
                        ['name' => 'locked', 'type' => 'int64'],
                        ['name' => 'locktime', 'type' => 'int64'],
                        ['name' => 'needsupdate', 'type' => 'int64'],
                        ['name' => 'weightoverride', 'type' => 'bool', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'itemname,itemtype,itemmodule,iteminfo,idnumber,calculation',
                ],
            ],
            App\Models\CompetencyModulecomp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'cmid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'competencyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'ruleoutcome', 'type' => 'int32'],
                        ['name' => 'overridegrade', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CompetencyRelatedcomp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'competencyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'relatedcompetencyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CompetencyCoursecomp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'competencyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'ruleoutcome', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\CompetencyTemplatecomp::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'templateid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'competencyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\BadgeCriteriaMet::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'issuedid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'critid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'datemet', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\BadgeCriteriaParam::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'critid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,value',
                ],
            ],
            App\Models\QuestionResponseCount::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'analysisid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'try', 'type' => 'int64'],
                        ['name' => 'rcount', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\AnalyticsPredictionActions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'predictionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'actionname', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'actionname',
                ],
            ],
            App\Models\EnrolLtiToolConsumerMap::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'toolid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'consumerid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\EnrolLtiUsers::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'toolid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'serviceurl', 'type' => 'string'],
                        ['name' => 'sourceid', 'type' => 'string', 'facet' => true],
                        ['name' => 'ltideploymentid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'consumerkey', 'type' => 'string'],
                        ['name' => 'consumersecret', 'type' => 'string'],
                        ['name' => 'membershipsurl', 'type' => 'string'],
                        ['name' => 'membershipsid', 'type' => 'string', 'facet' => true],
                        ['name' => 'lastgrade', 'type' => 'float'],
                        ['name' => 'lastaccess', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'serviceurl,sourceid,consumerkey,consumersecret,membershipsurl,membershipsid',
                ],
            ],
            App\Models\GradingformGuideComments::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'definitionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'description',
                ],
            ],
            App\Models\GradingInstances::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'definitionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'raterid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'rawgrade', 'type' => 'float'],
                        ['name' => 'status', 'type' => 'int64', 'facet' => true],
                        ['name' => 'feedback', 'type' => 'string'],
                        ['name' => 'feedbackformat', 'type' => 'int32'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'feedback',
                ],
            ],
            App\Models\GradingformGuideCriteria::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'definitionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'shortname', 'type' => 'string'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                        ['name' => 'descriptionmarkers', 'type' => 'string'],
                        ['name' => 'descriptionmarkersformat', 'type' => 'int32'],
                        ['name' => 'maxscore', 'type' => 'float'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'shortname,description,descriptionmarkers',
                ],
            ],
            App\Models\GradingformRubricCriteria::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'definitionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'description', 'type' => 'string'],
                        ['name' => 'descriptionformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'description',
                ],
            ],
            App\Models\CustomfieldData::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'fieldid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'instanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'intvalue', 'type' => 'int64'],
                        ['name' => 'decvalue', 'type' => 'float'],
                        ['name' => 'shortcharvalue', 'type' => 'string'],
                        ['name' => 'charvalue', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                        ['name' => 'valueformat', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'shortcharvalue,charvalue,value',
                ],
            ],
            App\Models\MessageUserActions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'messageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'action', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\MessageEmailMessages::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'useridto', 'type' => 'int64'],
                        ['name' => 'conversationid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'messageid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\QuestionAttemptSteps::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionattemptid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'sequencenumber', 'type' => 'int64'],
                        ['name' => 'state', 'type' => 'string', 'facet' => true],
                        ['name' => 'fraction', 'type' => 'float'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'state',
                ],
            ],
            App\Models\QuizOverviewRegrades::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'questionusageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'slot', 'type' => 'int64'],
                        ['name' => 'newfraction', 'type' => 'float'],
                        ['name' => 'oldfraction', 'type' => 'float'],
                        ['name' => 'regraded', 'type' => 'int32'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\Files::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contenthash', 'type' => 'string'],
                        ['name' => 'pathnamehash', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'component', 'type' => 'string'],
                        ['name' => 'filearea', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'filepath', 'type' => 'string'],
                        ['name' => 'filename', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'filesize', 'type' => 'int64'],
                        ['name' => 'mimetype', 'type' => 'string'],
                        ['name' => 'status', 'type' => 'int64', 'facet' => true],
                        ['name' => 'source', 'type' => 'string'],
                        ['name' => 'author', 'type' => 'string'],
                        ['name' => 'license', 'type' => 'string'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'referencefileid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'contenthash,pathnamehash,component,filearea,filepath,filename,mimetype,source,author,license',
                ],
            ],
            App\Models\BadgeExternalIdentifier::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'sitebackpackid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'internalid', 'type' => 'string', 'facet' => true],
                        ['name' => 'externalid', 'type' => 'string', 'facet' => true],
                        ['name' => 'type', 'type' => 'string', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'internalid,externalid,type',
                ],
            ],
            App\Models\BadgeExternal::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'backpackid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'collectionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'entityid', 'type' => 'string', 'facet' => true],
                        ['name' => 'assertion', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'entityid,assertion',
                ],
            ],
            App\Models\ForumQueue::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'discussionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'postid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'timemodified', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\LessonAttempts::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'lessonid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'pageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'answerid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'retry', 'type' => 'int32'],
                        ['name' => 'correct', 'type' => 'int64'],
                        ['name' => 'useranswer', 'type' => 'string'],
                        ['name' => 'timeseen', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'useranswer',
                ],
            ],
            App\Models\ScormSeqMapinfo::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'scoid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'objectiveid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'targetobjectiveid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'readsatisfiedstatus', 'type' => 'bool', 'facet' => true],
                        ['name' => 'readnormalizedmeasure', 'type' => 'bool', 'facet' => true],
                        ['name' => 'writesatisfiedstatus', 'type' => 'bool', 'facet' => true],
                        ['name' => 'writenormalizedmeasure', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ScormSeqRolluprulecond::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'scoid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'rollupruleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'operator', 'type' => 'string'],
                        ['name' => 'cond', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'operator,cond',
                ],
            ],
            App\Models\ScormSeqRulecond::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'scoid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'ruleconditionsid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'refrencedobjective', 'type' => 'string'],
                        ['name' => 'measurethreshold', 'type' => 'string'],
                        ['name' => 'operator', 'type' => 'string'],
                        ['name' => 'cond', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'refrencedobjective,operator,cond',
                ],
            ],
            App\Models\WikiLinks::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'subwikiid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'frompageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'topageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'tomissingpage', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'tomissingpage',
                ],
            ],
            App\Models\WikiVersions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'pageid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'content', 'type' => 'string'],
                        ['name' => 'contentformat', 'type' => 'string'],
                        ['name' => 'version', 'type' => 'int32'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'content,contentformat',
                ],
            ],
            App\Models\WorkshopGrades::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'assessmentid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'strategy', 'type' => 'string'],
                        ['name' => 'dimensionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'grade', 'type' => 'float'],
                        ['name' => 'peercomment', 'type' => 'string'],
                        ['name' => 'peercommentformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'strategy,peercomment',
                ],
            ],
            App\Models\BlogAssociation::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contextid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'blogid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolBrickfieldContent::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'areaid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'contenthash', 'type' => 'string'],
                        ['name' => 'iscurrent', 'type' => 'bool', 'facet' => true],
                        ['name' => 'status', 'type' => 'int32', 'facet' => true],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timechecked', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'contenthash',
                ],
            ],
            App\Models\GradeImportValues::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'newgradeitem', 'type' => 'int64'],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'finalgrade', 'type' => 'float'],
                        ['name' => 'feedback', 'type' => 'string'],
                        ['name' => 'importcode', 'type' => 'int64'],
                        ['name' => 'importer', 'type' => 'int64'],
                        ['name' => 'importonlyfeedback', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'feedback',
                ],
            ],
            App\Models\GradeGrades::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'rawgrade', 'type' => 'float'],
                        ['name' => 'rawgrademax', 'type' => 'float'],
                        ['name' => 'rawgrademin', 'type' => 'float'],
                        ['name' => 'rawscaleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'finalgrade', 'type' => 'float'],
                        ['name' => 'hidden', 'type' => 'int64'],
                        ['name' => 'locked', 'type' => 'int64'],
                        ['name' => 'locktime', 'type' => 'int64'],
                        ['name' => 'exported', 'type' => 'int64'],
                        ['name' => 'overridden', 'type' => 'int64'],
                        ['name' => 'excluded', 'type' => 'int64'],
                        ['name' => 'feedback', 'type' => 'string'],
                        ['name' => 'feedbackformat', 'type' => 'int64'],
                        ['name' => 'information', 'type' => 'string'],
                        ['name' => 'informationformat', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'aggregationstatus', 'type' => 'string'],
                        ['name' => 'aggregationweight', 'type' => 'float'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'feedback,information,aggregationstatus',
                ],
            ],
            App\Models\GradeItemsHistory::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'action', 'type' => 'int64', 'facet' => true],
                        ['name' => 'oldid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'source', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'loggeduser', 'type' => 'int64'],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'categoryid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'itemname', 'type' => 'string'],
                        ['name' => 'itemtype', 'type' => 'string'],
                        ['name' => 'itemmodule', 'type' => 'string'],
                        ['name' => 'iteminstance', 'type' => 'int64'],
                        ['name' => 'itemnumber', 'type' => 'int64'],
                        ['name' => 'iteminfo', 'type' => 'string'],
                        ['name' => 'idnumber', 'type' => 'string'],
                        ['name' => 'calculation', 'type' => 'string'],
                        ['name' => 'gradetype', 'type' => 'int32'],
                        ['name' => 'grademax', 'type' => 'float'],
                        ['name' => 'grademin', 'type' => 'float'],
                        ['name' => 'scaleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'outcomeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'gradepass', 'type' => 'float'],
                        ['name' => 'multfactor', 'type' => 'float'],
                        ['name' => 'plusfactor', 'type' => 'float'],
                        ['name' => 'aggregationcoef', 'type' => 'float'],
                        ['name' => 'aggregationcoef2', 'type' => 'float'],
                        ['name' => 'sortorder', 'type' => 'int64'],
                        ['name' => 'hidden', 'type' => 'int64'],
                        ['name' => 'locked', 'type' => 'int64'],
                        ['name' => 'locktime', 'type' => 'int64'],
                        ['name' => 'needsupdate', 'type' => 'int64'],
                        ['name' => 'display', 'type' => 'int64'],
                        ['name' => 'decimals', 'type' => 'bool', 'facet' => true],
                        ['name' => 'weightoverride', 'type' => 'bool', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'source,itemname,itemtype,itemmodule,iteminfo,idnumber,calculation',
                ],
            ],
            App\Models\LtiserviceGradebookservices::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'gradeitemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'courseid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'toolproxyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'typeid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'baseurl', 'type' => 'string'],
                        ['name' => 'ltilinkid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'resourceid', 'type' => 'string', 'facet' => true],
                        ['name' => 'tag', 'type' => 'string'],
                        ['name' => 'subreviewurl', 'type' => 'string'],
                        ['name' => 'subreviewparams', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'baseurl,resourceid,tag,subreviewurl,subreviewparams',
                ],
            ],
            App\Models\EnrolLtiUserResourceLink::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'ltiuserid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'resourcelinkid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\GradingformGuideFillings::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'instanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'criterionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'remark', 'type' => 'string'],
                        ['name' => 'remarkformat', 'type' => 'int32'],
                        ['name' => 'score', 'type' => 'float'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'remark',
                ],
            ],
            App\Models\GradingformRubricLevels::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'criterionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'score', 'type' => 'float'],
                        ['name' => 'definition', 'type' => 'string'],
                        ['name' => 'definitionformat', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'definition',
                ],
            ],
            App\Models\GradingformRubricFillings::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'instanceid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'criterionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'levelid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'remark', 'type' => 'string'],
                        ['name' => 'remarkformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'remark',
                ],
            ],
            App\Models\QuestionAttemptStepData::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'attemptstepid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'value', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'name,value',
                ],
            ],
            App\Models\AnalyticsUsedFiles::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'modelid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'fileid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'action', 'type' => 'string', 'facet' => true],
                        ['name' => 'time', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'action',
                ],
            ],
            App\Models\FileConversion::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'sourcefileid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'targetformat', 'type' => 'string'],
                        ['name' => 'status', 'type' => 'int64', 'facet' => true],
                        ['name' => 'statusmessage', 'type' => 'string'],
                        ['name' => 'converter', 'type' => 'string'],
                        ['name' => 'destfileid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'data', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'targetformat,statusmessage,converter,data',
                ],
            ],
            App\Models\ToolBrickfieldResults::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'contentid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'checkid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'errorcount', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\GradeGradesHistory::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'action', 'type' => 'int64', 'facet' => true],
                        ['name' => 'oldid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'source', 'type' => 'string'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'loggeduser', 'type' => 'int64'],
                        ['name' => 'itemid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'rawgrade', 'type' => 'float'],
                        ['name' => 'rawgrademax', 'type' => 'float'],
                        ['name' => 'rawgrademin', 'type' => 'float'],
                        ['name' => 'rawscaleid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'finalgrade', 'type' => 'float'],
                        ['name' => 'hidden', 'type' => 'int64'],
                        ['name' => 'locked', 'type' => 'int64'],
                        ['name' => 'locktime', 'type' => 'int64'],
                        ['name' => 'exported', 'type' => 'int64'],
                        ['name' => 'overridden', 'type' => 'int64'],
                        ['name' => 'excluded', 'type' => 'int64'],
                        ['name' => 'feedback', 'type' => 'string'],
                        ['name' => 'feedbackformat', 'type' => 'int64'],
                        ['name' => 'information', 'type' => 'string'],
                        ['name' => 'informationformat', 'type' => 'int64'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'source,feedback,information',
                ],
            ],
            App\Models\ToolBrickfieldErrors::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'resultid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'linenumber', 'type' => 'int64'],
                        ['name' => 'errordata', 'type' => 'string'],
                        ['name' => 'htmlcode', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'errordata,htmlcode',
                ],
            ],
            App\Models\ToolPolicyVersions::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'name', 'type' => 'string'],
                        ['name' => 'type', 'type' => 'int32', 'facet' => true],
                        ['name' => 'audience', 'type' => 'int32'],
                        ['name' => 'archived', 'type' => 'int32'],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'policyid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'agreementstyle', 'type' => 'int32'],
                        ['name' => 'optional', 'type' => 'int32'],
                        ['name' => 'revision', 'type' => 'string'],
                        ['name' => 'summary', 'type' => 'string'],
                        ['name' => 'summaryformat', 'type' => 'int32'],
                        ['name' => 'content', 'type' => 'string'],
                        ['name' => 'contentformat', 'type' => 'int32'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'name,revision,summary,content',
                ],
            ],
            App\Models\ToolPolicy::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'sortorder', 'type' => 'int32'],
                        ['name' => 'currentversionid', 'type' => 'int64', 'facet' => true],
                    ],
                    'default_sorting_field' => 'id',
                ],
                'search-parameters' => [
                    'query_by' => 'id',
                ],
            ],
            App\Models\ToolPolicyAcceptances::class => [
                'collection-schema' => [
                    'fields' => [
                        ['name' => 'id', 'type' => 'string'],
                        ['name' => 'policyversionid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'userid', 'type' => 'int64', 'facet' => true],
                        ['name' => 'status', 'type' => 'bool', 'facet' => true],
                        ['name' => 'lang', 'type' => 'string', 'facet' => true],
                        ['name' => 'usermodified', 'type' => 'int64'],
                        ['name' => 'timecreated', 'type' => 'int64'],
                        ['name' => 'timemodified', 'type' => 'int64'],
                        ['name' => 'note', 'type' => 'string'],
                    ],
                    'default_sorting_field' => 'timecreated',
                ],
                'search-parameters' => [
                    'query_by' => 'lang,note',
                ],
            ],
        ],
    ],
];
