Title: Kanboard 1.0.15
Date: 2015-05-31
---

Here are the main improvements for this release:

Recurring tasks
---------------

It's now possible to configure recurring tasks in Kanboard.
To fit with the Kanban methodology, the recurring tasks are not based on a date but on board events.

- Recurring tasks are duplicated to the first column of the board when the selected events occurs (Moving a task from the first/last column or closing a task)
- The due date can be recalculated automatically
- Each task records the task id of the parent task that created it and the child task created

![Recurring task](http://kanboard.net/screenshots/documentation/recurring-tasks.png)

[Documentation](http://kanboard.net/documentation/recurring-tasks)

Jabber/XMPP integration
-----------------------

Such as Slack and Hipchat integrations, notifications can be sent to a Jabber chat room.

![Jabber notification](http://kanboard.net/screenshots/documentation/jabber-notification.png)

[Documentation](http://kanboard.net/documentation/jabber)

Improved task links
-------------------

- Allow auto-completion with the task id
- Links are grouped by label and more information are displayed (assignee and time tracking)
- It's now possible to edit a task link

Calendar improvements
---------------------

- The calendar is able to show all tasks in addition of tasks with a due date.
- The date of the events can be configured to be the task start date (default) or the creation date.

[Documentation](http://kanboard.net/documentation/calendar)

iCal feeds
----------

- For each project and user, you can subscribe to the iCalendar subscription.
- You can export the same information as the internal calendar to any calendar software like Apple Calendar, Google Calendar, Outlook, etc.
- This is a read-only access, it's not a CalDAV access.

![Edit iCal subscription](http://kanboard.net/screenshots/documentation/apple-calendar-edit-subscription.png)

[Documentation](http://kanboard.net/documentation/ical)

Webhooks changes
----------------

- The Kanboard webhook is more flexible now, all internal events are sent to your external program.
- You can receive events for tasks, subtasks, comments and attachments.

[Documentation](http://kanboard.net/documentation/webhooks)

New and modified API procedures
-------------------------------

The source code behind the API has been refactored and new procedures have been added:

- getProjectActivity
- getProjectActivities
- getDefaultSwimlane
- getActiveSwimlanes
- getAllSwimlanes
- getSwimlane
- getSwimlaneById
- getSwimlaneByName
- getAvailableActionEvents
- getCompatibleActionEvents
- getLinkById
- getLinkByLabel
- getOppositeLinkId
- getAllLinks
- createLink
- updateLink
- removeLink
- getTaskLinkById
- getAllTaskLinks
- createTaskLink
- updateTaskLink
- removeTaskLink
- getFile
- getAllFiles
- createFile
- removeFile

The API authentication can also be done with a custom HTTP header now.

[Documentation](http://kanboard.net/documentation/api-json-rpc)

Other improvements
------------------

- Private projects can be converted to a multiple users project but also the opposite
- Move swimlane title and add swimlane anchor
- The settings page is splitted into more sections
- Set autofocus to assignee dropdown (board popover)
- Add new automatic action to update the start date
- Add event "task creation" for the action TaskAssignColorColumn
- Add chosen select for user selection
- Add Debian 8 in Vagrant file
- Show swimlane dropdown only when necessary
- More functional tests for the API
- Helpers refactoring (reduce complexity and increase maintainability)
- Avoid creating multiple instances of Translator
- Rename directory app/Libs to app/Library
- Update logger to send only errors to Syslog and everything else to the debug file
- Fix bug: Increase length of attachments file names (Mysql) and truncate the name if too long
- Fix bug: editing private project enable user management
- Fix bug: change 2FA condition due to controller renaming
- Fix bug: add missing file extension for screenshot filename

Thanks to everybody!

[Download the version 1.0.15](http://kanboard.net/kanboard-1.0.15.zip)
