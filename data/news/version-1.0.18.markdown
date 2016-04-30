Title: Kanboard 1.0.18
Date: 2015-08-30
---

Gantt chart for tasks and projects
----------------------------------

The main feature of this release is the new Gantt chart:

![Task Gantt chart](http://kanboard.net/screenshots/documentation/gantt-chart-project.png)

You can easily plan your projects by dragging and dropping tasks.

- [Documentation about Gantt chart for tasks](http://kanboard.net/documentation/gantt-chart-tasks)
- [Documentation about Gantt chart for projects](http://kanboard.net/documentation/gantt-chart-projects)

Hide and show columns
---------------------

It's now possible to hide columns on the board:

![Show and hide columns on the board](http://kanboard.net/screenshots/documentation/board-hide-show-column.png)

Each column can also scroll vertically now. 

[Documentation](http://kanboard.net/documentation/board-show-hide-columns)

User API access
---------------

The first iteration of the user API is now implemented.
New features can be easily implemented if needed.

The user API is there to facilitate the creation of mobile or desktop clients. 
People will be able to use any client without having an API key.

[Documentation about the API](http://kanboard.net/documentation/api-json-rpc)

New features
------------

* Include documentation in the application
* [Add Gitlab authentication](http://kanboard.net/documentation/gitlab-authentication)
* Add users and categories filters on the board
* [Add new role "Project Administrator"](http://kanboard.net/documentation/user-management)
* [Add login bruteforce protection with captcha and account lockdown](http://kanboard.net/documentation/bruteforce-protection)
* Add new api procedures: getDefaultTaskColor(), getDefaultTaskColors() and getColorList()
* Add config parameter to define session duration
* Add config parameter to disable/enable RememberMe authentication
* Add start/end date for projects
* Add new automated action to change task color based on the task link
* Add milestone marker in board task
* Add search in task title when using an integer only input
* Add Portuguese (European) translation
* Add Norwegian translation

Improvements
------------

* Add handle to move tasks on touch devices
* Improve file attachments tooltip on the board
* Adjust automatically the height of the placeholder during drag and drop
* Show all tasks when using no search criteria
* Add column vertical scrolling
* Set dynamically column height based on viewport size
* Enable support for Github Enterprise when using Github Authentication
* Update iCalendar library to display organizer name
* Improve sidebar menus
* Add no referrer policy in meta tags
* Run automated unit tests with Sqlite/Mysql/Postgres on Travis-ci
* Add Makefile and remove the scripts directory

Bug fixes
---------

* Wrong template name for subtasks tooltip due to previous refactoring
* Fix broken url for closed tasks in project view
* Fix permission issue when changing the url manually
* Fix bug task estimate is reseted when using subtask timer
* Fix screenshot feature with Firefox 40
* Fix bug when uploading files with cyrilic characters

Download
--------

- [Full ChangeLog](https://github.com/fguillot/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.18](http://kanboard.net/kanboard-1.0.18.zip)
