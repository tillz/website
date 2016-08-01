Title: Kanboard 1.0.32
Date: 2016-08-01
---

New features
------------

* New automated actions:
    - Close tasks without activity in a specific column
    - Set due date automatically
    - Move a task to another column when closed
    - Move a task to another column when not moved during a given period
* New filter "moved" for moved date of tasks
* Added internal task links to activity stream
* Added new event for removed comments
* Added search filter for task priority
* Added the possibility to hide tasks in dashboard for a specific column
* Documentation translated in Russian

Improvements
------------

* Improve background worker and job handler
* New template hooks
* Removed individual column scrolling on board, columns use the height of all tasks
* Improve project page titles
* Remove sidebar titles when not necessary
* Internal events management refactoring
* Handle header X-Real-IP to get IP address
* Display project name for task auto-complete fields
* Make search attributes not case sensitive
* Display TOTP issuer for 2FA
* Make sure that the table schema_version use InnoDB for Mysql
* Use the library PicoFeed to generate RSS/Atom feeds
* Change all links to the new repository

Bug fixes
---------

* Allow users to see inactive projects
* Fixed typo in template that prevent project permissions to be duplicated
* Fixed search query with multiple assignees (nested OR conditions)
* Fixed Markdown editor auto-grow on the task form (Safari)
* Fixed compatibility issue with PHP 5.3 for OAuthUserProvider class

Download
--------

- [Full ChangeLog](https://github.com/kanboard/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.32](https://kanboard.net/kanboard-1.0.32.zip)
- [How to upgrade Kanboard to a new version](https://kanboard.net/documentation/update)
