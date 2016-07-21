Title: Kanboard 1.0.12
Date: 2015-02-22
---

Here are the new features of the version 1.0.12:

Heroku one-click install button
-------------------------------

You can try Kanboard for free on [Heroku](https://www.heroku.com/) cloud platform.

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy?template=https://github.com/kanboard/kanboard)

This setup use Postgresql and doesn't require any configuration, everything is done automatically.

To deploy a custom configuration, just follow the [documentation about Heroku](https://kanboard.net/documentation/heroku).

Calendars
---------

This version introduce calendars:

![Calendar](https://kanboard.net/screenshots/documentation/calendar.png)

Calendars are visible on the dashboard, in the project view and from the user page.

For now, tasks with a due date and subtask time tracking are shown (see below).
Moving the task to another day change the due date.

Improved board filters
----------------------

Now, the filters hide the tasks instead of changing the opacity.
Moreover, the user interface have been improved to be more flexible:

![Board filters](https://kanboard.net/screenshots/news/1.0.12/board-filters.png)

You can also filter by recently modified tasks.

New dropdown menu for quick actions:

![Dropdown menu board](https://kanboard.net/screenshots/news/1.0.12/dropdown-menu-board.png)

Collapsible swimlanes
---------------------

Swimlanes can be hidden to save space on the screen:

![Collapsible swimlane](https://kanboard.net/screenshots/news/1.0.12/collapsible-swimlane.png)

Task stacking (expand/collapse tasks on the board)
---------------------------------------------------

When you have a lot of tasks on the board, it's very useful to collapse tasks:

![Tasks collapsed](https://kanboard.net/screenshots/news/1.0.12/tasks-collasped.png)

This feature can be toggled by using the keyboard shortcut **s** or with the board menu.

Dropdown menu for tasks on the board
------------------------------------

A new dropdown menu is available for each task on the board for quick editing:

![Dropdown menu tasks](https://kanboard.net/screenshots/news/1.0.12/dropdown-menu-tasks.png)

In one click, you can:

- Change the assignee
- Change the category
- Change the description
- Add a new comment
- Edit the task
- Close the task

Task links and relations
------------------------

Now, you can link tasks together:

![Task Links](https://kanboard.net/screenshots/documentation/task-links.png)

Default relationships are:

- **relates to**
- **blocks** | is blocked by
- **is blocked by** | blocks
- **duplicates** | is duplicated by
- **is duplicated by** | duplicates
- **is a child of** | is a parent of
- **is a parent of** | is a child of
- **targets milestone** | is a milestone of
- **is a milestone of** | targets milestone
- **fixes** | is fixed by
- **is fixed by** | fixes

Those labels can be changed in the application settings.

More flexible project duplication
----------------------------------

Now, you can select which part of the project you want to copy:

![Project duplication](https://kanboard.net/screenshots/news/1.0.12/project-duplication.png)

Keyboard shortcuts
------------------

Several keyboard shortcuts are introduced:

### Board view

- New task = **n**
- Expand/collapse tasks = **s**

### Application

- Open board switcher = **b**
- Close dialog box = **ESC**
- Submit a form = **CTRL+ENTER** or **⌘+ENTER**

Better time tracking
--------------------

The subtask time tracking information are now synchronized with the task time spent and time estimated:

![Subtask time tracking](https://kanboard.net/screenshots/documentation/subtask-time-tracking.png)

More information in the [documentation](https://kanboard.net/documentation/time-tracking)

Sponsored developments
----------------------

I started to accept custom developments for Kanboard, some of them are directly integrated in the open source version:

- Be able to access to any user dashboard as an admin user
- Add subtasks restrictions (only one subtask in progress allowed by a user)
- Add subtasks time tracking per user
- User time tracking visible in the task details page and the user page
- Display in the calendar the subtask time sheet

New API procedures
------------------

- `createLdapUser()`
- `getProjectActivity()`
- `getOverdueTasks()`

Better responsive design
------------------------

The user interface is more usable on tablets and smartphones.
There is no more overlapping text.
The board scroll horizontally.

It's not perfect on smartphone but you can navigate through the user interface without any problem.

Other improvements
------------------

- Kanboard v1.0.12 is compatible with **PHP 5.3.3** (Debian 6 and Centos 6.x)
- **LDAP username are now lowercase by default** to avoid duplicate users, to restore the previous behavior change the value of the constant `LDAP_USERNAME_CASE_SENSITIVE` to `true`
- Add board horizontal scrolling
- The dashboard icon is now the Kanboard logo instead of the home icon
- The age and time spent in the column are shown for each task on the board
- Columns can have a description in Markdown
- [Add Bitbucket webhook](https://kanboard.net/documentation/bitbucket-webhooks)
- Be able to disable the login form for specific users (for people that use an external authentication)
- Subtask counts on the board is now a percentage
- New automatic action: Add a new comment on task move for logging purpose
- The location of the debug file and the attachments can be modified with the constants `FILES_DIR` and `DEBUG_FILE`
- The date picker is now translated in all languages
- Pagination code refactoring
- Clicking on cancel inside a popover doesn't reload the page
- Many bug fixes

Related projects
----------------

Here are some external projects made by contributors:

- [FreeBSD port for Kanboard](https://kanboard.net/documentation/freebsd-installation)
- [CSV2Kanboard by @ashbike](https://github.com/ashbike/csv2kanboard)
- [Kanboard for Yunohost by @mbugeia](https://github.com/mbugeia/kanboard_ynh)
- [Trello import script by @matueranet](https://github.com/matueranet/kanboard-import-trello)
- [Chrome extension by Timo](https://chrome.google.com/webstore/detail/kanboard-quickmenu/akjbeplnnihghabpgcfmfhfmifjljneh?utm_source=chrome-ntp-icon), [Source code](https://github.com/BlueTeck/kanboard_chrome_extension)

**Thanks to all contributors!**

[Download the version 1.0.12](https://kanboard.net/kanboard-1.0.12.zip)
