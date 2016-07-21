Title: Kanboard 1.0.17
Date: 2015-07-26
---

New open source license for Kanboard
------------------------------------

Kanboard is now distributed under the MIT License instead of the AGPLv3 license.
This license is more permissive and impose less restrictions.

The MIT license is also more "corporate friendly", legal departments of many large companies do not accept software under GPL license for various reasons.
Now, they can try Kanboard without any constraints.

Advanced search syntax
----------------------

The main change of this version is the new search engine that uses a simple query language.

![Search](https://kanboard.net/screenshots/tour/board-filters.png)

The query language is very useful for advanced search.
You can find tasks by assignee, swimlane, column, due date, categories, description, etc.

The same search engine is available globally for all projects and it's also used to filter the board.

[Learn more about the search syntax](https://kanboard.net/documentation/search)

New project view switcher
-------------------------

Now, you can switch easily between the board, calendar and list views:

![View Switcher](https://kanboard.net/screenshots/documentation/list-view.png)

Keyboard shortcuts are available too.

[Read the documentation](https://kanboard.net/documentation/project-views)

URL rewriting
-------------

Kanboard have nice urls now, it's automatically enabled if you already have the Apache mode rewrite enabled.

![Nice url](https://kanboard.net/screenshots/news/1.0.17/nice-urls.png)

Some shortcuts are available:

- Go to the task #123: **/t/123**
- Go to the board of the project #2: **/b/2**
- Go to the project calendar #5: **/c/5**
- Go to the list view of the project #8: **/l/8**
- Go to the project settings for the project id #42: **/p/42**

[More details in the documentation](https://kanboard.net/documentation/nice-urls)

Lead and cycle time
-------------------

- The lead time is the time between the task creation and the date of completion (task closed).
- The cycle time is the time between the start date and the date of completion.

![Cycle and Lead time](https://kanboard.net/screenshots/documentation/average-lead-cycle-time.png)

- Each task have new section analytics that display the lead and cycle time
- In project reports, you can see a chart with the average lead and cycle time

Average time into each column
-----------------------------

A new project report is available that display the average time spent into each column:

![Average time per column](https://kanboard.net/screenshots/documentation/average-time-spent-into-each-column.png)

[Read the documentation](https://kanboard.net/documentation/analytics)

Automated Docker build
----------------------

Now, each new commit on the repository trigger a new build on the Docker Hub.
So it's very easy to try the last development version of Kanboard.

- [Kanboard on Docker Hub](https://registry.hub.docker.com/u/kanboard/kanboard/)
- [Learn more](https://kanboard.net/documentation/docker)

New features
------------

* Added new dashboard layout
* Added settings option to disable subtask timer
* Added settings option to include or exclude closed tasks into CFD
* Added settings option to define the default task color
* Added new config option to disable automatic creation of LDAP accounts
* Added loading icon on board view
* Prompt user when moving or duplicate a task to another project
* Added current values when moving/duplicate a task to another project and add a loading icon
* Added memory consumption in debug log
* Added form to create remote user
* Added edit form for user authentication
* Added config option to hide login form
* Display OAuth2 urls on integration page
* Added keyboard shortcuts to switch between board/calendar/list view
* Added keyboard shortcut to focus on the search box
* Added Slack channel override
* Added task analytics
* Added icon to set automatically the start date
* Added datetime picker for start date

Other improvements
------------------

* Added Czech translation
* Updated Spanish translation
* Updated German Translation
* Display user initials when tasks are in collapsed mode
* Show title in tooltip for collapsed tasks
* Improve alert box fadeout to avoid an empty space
* Set focus on the dropdown for category popover
* Make escape keyboard shorcut global
* Check the box remember me by default
* Store redirect login url in session instead of using url parameter
* Update Gitlab webhook
* Do not rewrite remember me cookie for each request
* Set the assignee as organizer for ical events
* Increase date range for ics export
* Reduce spacing on cards
* Move board collapse/expand mode to server side to avoid board flickering
* Use ajax requests for board collapse/expand
* Do not set anchor for the default swimlane on the link back to board
* Replace timeserie axis to category axis for charts
* Hide task age in compact mode
* Improve quick-add subtasks form
* Reduce the size of the filter box for smaller screen
* Added icon to hide/show sidebar
* Update GitLab logo
* Improve Dockerfile
* Add urls in api response for tasks and projects

Breaking changes
----------------

* New OAuth url for Google and Github authentication

Bug fixes
---------

* Screenshot dropdown: unexpected scroll down on the board view and focus lost when clicking on the drop zone
* No creator when duplicating a task
* Avoid the creation of multiple subtask timer for the same task and user

Download
--------

- [Full ChangeLog](https://github.com/kanboard/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.17](https://kanboard.net/kanboard-1.0.17.zip)
