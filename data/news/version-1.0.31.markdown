Title: Kanboard 1.0.31
Date: 2016-07-03
---

The main change of this release are tags.
Each task can have multiple tags.
Tags can specific for each project or global to the application.

New features
------------

* Added tags: global and specific by project
* Added application and project roles validation for API procedure calls
* Added new API call: "getProjectByIdentifier"
* Added new API calls for external task links, project attachments and subtask time tracking

Improvements
------------

* Use PHP 7 for the Docker image
* Preserve role for existing users when using ReverseProxy authentication
* Handle priority for task and project duplication
* Expose task reference field to the user interface
* Improve ICal export
* Added argument owner_id and identifier to project API calls
* Rewrite integration tests to run with Docker containers
* Use the same task form layout everywhere
* Removed some tasks dropdown menus that are now available with task edit form
* Make embedded documentation readable in multiple languages (if a translation is available)
* Added acceptance tests (browser tests)

Bug fixes
---------

* Fixed broken CSV exports
* Fixed identical background color for LetterAvatar on 32bits platforms (Hash greater than PHP_MAX_INT)
* Fixed lexer issue with non word characters
* Flush memory cache in worker to get latest config values
* Fixed empty title for web notification with only one overdue task
* Take default swimlane into consideration for SwimlaneModel::getFirstActiveSwimlane()
* Fixed "due today" highlighting

Download
--------

- [Full ChangeLog](https://github.com/fguillot/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.31](https://kanboard.net/kanboard-1.0.31.zip)
- [How to upgrade Kanboard to a new version](https://kanboard.net/documentation/update)
