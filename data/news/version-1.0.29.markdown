Title: Kanboard 1.0.29
Date: 2016-06-05
---

This release contains mostly internal code refactoring. 
The goal is to improve the quality of the source code, simplify automated tests and make the software more extensible.

The most relevant features are the new plugin manager and the background job workers. 
Now, you can install and upgrade plugins in one click from the user interface and improve the performances of Kanboard by using a pool of workers.

New features
------------

* [Manage plugin from the user interface](https://kanboard.net/documentation/plugin-directory) and from the command line
* Added support for [background workers](https://kanboard.net/documentation/worker)
* Added the possibility to convert a subtask to a task
* Added menu entry to add tasks from all project views
* Add tasks in bulk from the board
* Add dropdown for projects
* Added config parameter to allow self-signed certificates for the HTTP client

Improvements
------------

* Display local date format in date picker
* Configure email settings with the user interface in addition to config file
* Upgrade Docker image to Alpine Linux 3.4
* Move task import to a separate section
* Mark web notification as read when clicking on it
* Support strtotime strings for date search
* Reset failed login counter and unlock user when changing password
* Task do not open anymore in a new window on the Gantt chart
* Do not display task progress for tasks with no start/end date
* Use Gulp and Bower to manage assets
* Controller and Middleware refactoring
* Replace jQuery mobile detection by the library isMobile

Plugins
-------

**All existing plugins must be updated.**

New plugins:

- [Beanstalk](https://kanboard.net/plugin/beanstalk)
- [RabbitMQ](https://kanboard.net/plugin/rabbitmq)
- [Database Object Storage](https://kanboard.net/plugin/database-storage)

Bug fixes
---------

* Fixed user date format parsing for dates that can be valid in multiple formats
* Do not sync user role if LDAP groups are not configured
* Fixed issue with unicode handling for letter based avatars and user initials
* Do not send notifications to disabled users
* Fixed wrong redirect when removing a task from the task view page

Breaking changes
----------------

* Webhook to create tasks have been removed, use the API instead
* All controllers have been renamed, people who are not using URL rewriting will see different URLs
* All models have been renamed, plugin maintainers will have to update their plugins

Download
--------

- [Full ChangeLog](https://github.com/fguillot/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.29](https://kanboard.net/kanboard-1.0.29.zip)
- [How to upgrade Kanboard to a new version](https://kanboard.net/documentation/update)
