Title: Kanboard 1.0.19
Date: 2015-10-11
---

New plugin API
--------------

This release brings a new plugin system.
This is the first draft of the plugin API.

The goal is to make Kanboard more flexible. Any developer should be able add new features, extend or override the default behavior of Kanboard.
At the moment, the plugin API is not complete so it's possible to ask for new hooks in the issues tracker.

The second objective is to simplify the code base.
**Kanboard focus on simplicity**.
Non necessary features should be a plugin, in this version some features have been moved outside of the core.

Core functionalities moved to plugins:

* Budget planning: https://github.com/kanboard/plugin-budget
* SubtaskForecast: https://github.com/kanboard/plugin-subtask-forecast
* Timetable: https://github.com/kanboard/plugin-timetable

People who where using these features need to install the necessary plugins to have the fonctionnality back.

To install a plugin, you just need to unzip the archive in the plugins folder, that's it.

- [List of plugins](http://kanboard.net/plugins)
- [Plugin API](http://kanboard.net/documentation/plugins)

Other new features
------------------

* Added web notifications
* Added LDAP group sync
* Added swimlane description
* Added Bahasa Indonesia translation
* Added API procedures: getMyOverdueTasks, getOverdueTasksByProject and GetMyProjects
* Added user API access for procedure getProjectActivity()
* Added config parameter to enable/disable Syslog
* Added custom filters
* Added http client proxy support

Improvements
------------

* When duplicating a task, redirect to the new task
* Include more shortcut links into the view "My projects"
* Duplicate a project with tasks will copy the new tasks in the same columns
* Offer alternative method to create Mysql and Postgres databases (import sql dump)
* Make sure there is always a trailing slash for application_url
* Do not show the checkbox "Show default swimlane" when there is no active swimlanes
* Append filters instead of replacing value for users and categories dropdowns
* Do not show empty swimlanes in public view
* Change swimlane layout to save space on the screen
* Add the possibility to set/unset max column height (column scrolling)
* Show "Open this task" in dropdown menu for closed tasks
* Show assignee on card only when someone is assigned (hide nobody text)
* Highlight selected item in dropdown menus
* Gantt chart: change bar color according to task progress
* Replace color dropdown by color picker in task forms
* Creating another task stay in the popover (no full page refresh anymore)
* Avoid scrollbar in Gantt chart for row title on Windows platform
* Remove unnecessary margin for calendar header
* Show localized documentation if available
* Add event subtask.delete
* Add abstract storage layer
* Add abstract cache layer

Other changes
-------------

* Data directory permissions are not checked anymore
* Data directory is not mandatory anymore for people that use a remote database and remote object storage

Bug fixes
---------

* Fix typo in template that prevent the Gitlab OAuth link to be displayed
* Fix Markdown preview links focus
* Avoid dropdown menu to be truncated inside a column with scrolling
* Deleting subtask doesn't update task time tracking
* Fix Mysql error about gitlab_id when creating remote user
* Fix subtask timer bug (event called recursively)
* Fix Postgres issue "Cardinality violation" when there is multiple "is_milestone_of" links
* Fix issue with due date greater than year 2038

Download
--------

- [Full ChangeLog](https://github.com/fguillot/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.19](http://kanboard.net/kanboard-1.0.19.zip)
