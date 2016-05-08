Title: Kanboard 1.0.21
Date: 2015-11-22
---

This version focus on fixing regressions from previous releases.

New plugins
-----------

* [Mattermost](https://github.com/kanboard/plugin-mattermost)
* [Wunderlist Import](https://github.com/EpocDotFr/kanboard-wunderlist)

Do not forget to update installed plugins.

Breaking changes
----------------

* Projects with duplicate name are now allowed:
    - For Postgres and Mysql the unique constraint is removed by database migration
    - However Sqlite does not support alter table, only new databases will have the unique constraint removed

New features
------------

* New automatic action: Assign a category based on a link
* Added Bosnian translation

Improvements
------------

* Dropdown menu entry are now clickable outside of the html link
* Improve error handling of plugins
* Use PHP7 function random_bytes() to generate tokens if available
* CSV task export show the assignee name in addition to the assignee username
* Add new hooks for plugins
* Remove workaround for "INSERT ON DUPLICATE KEY UPDATE..."

Internal code refactoring
-------------------------

* Rewrite of session management
* Move some classes to a new namespace Kanboard\Core\Http

Bug fixes
---------

* Loading cs_CZ locale display the wrong language in datetime picker
* Datepicker is closed unexpectedly on blur event
* Fix bug in daily project summary CSV export
* Fix PHP error when adding a new user with email notification enabled
* Add missing template for activity stream to show event "file.create"
* Fix wrong value for PLUGINS_DIR in config.default.php
* Make CSV export compatible with PHP 5.3
* Avoid Safari to append .html at the end of downloaded files

Download
--------

- [Full ChangeLog](https://github.com/fguillot/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.21](https://kanboard.net/kanboard-1.0.21.zip)
- [How to update Kanboard to a new version](https://kanboard.net/documentation/update)
