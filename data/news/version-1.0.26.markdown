Title: Kanboard 1.0.26
Date: 2016-02-28
---

New features
------------

* Add drag and drop to change subtasks, swimlanes and columns positions
* Add file drag and drop and asynchronous upload
* Enable/Disable users
* Add setting option to disable private projects
* Add new config option to disable logout

Improvements
------------

* Use inline popup to create new columns
* Improve filter box design
* Improve image thumbnails and files table
* Add confirmation inline popup to remove custom filter
* Increase client_max_body_size value for Nginx
* Split Board model into multiple classes
* Improve logging for the Docker image

Breaking Changes
----------------

* API procedures:
    - "moveColumnUp" and "moveColumnDown" are replaced by "changeColumnPosition"
    - "moveSwimlaneUp" and "moveSwimlaneDown" are replaced by "changeSwimlanePosition"

Plugins
-------

* Updated plugins:
    - [Gitlab Webhook](https://kanboard.net/plugin/gitlab-webhook)
    - [Mailgun](https://kanboard.net/plugin/mailgun)

Bug fixes
---------

* Fix PHP notices during creation of first project and in subtasks table
* Fix filter dropdown not accessible when there are too many items
* Fix regression: unable to change project in "task move/duplicate to another project"

Download
--------

- [Full ChangeLog](https://github.com/kanboard/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.26](https://kanboard.net/kanboard-1.0.26.zip)
- [How to upgrade Kanboard to a new version](https://kanboard.net/documentation/update)
