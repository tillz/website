Title: Features of Kanboard
Description: Detailed list of features
Language: en_US
---

Work more efficiently with Kanboard
===================================

Simple
------

There is no fancy user interface, Kanboard focus on simplicity and minimalism.
The number of features is voluntary limited.

Visual and clear overview of your tasks
---------------------------------------

The Kanban board is the best way to know the current status of a project because it's visual.

![Kanban Board](/screenshots/board.png)

It's very easy to understand, there is nothing to explain.

Drag and drop tasks between columns easily
------------------------------------------

![Drag and drop tasks](/screenshots/drag-and-drop.png)

You can add, rename and remove columns at any time to adapt the board to your project.

Limit your work in progress to be more efficient
------------------------------------------------

![Limit work in progress](/screenshots/task-limit.png)

Avoid multitasking to stay focused on your work. When you are over the limit, the column is highlighted.

Search and filter tasks
-----------------------

Don't waste your time, find your tasks quickly with the simple but powerful search engine.

![Search Filters](/screenshots/search.png)

Kanboard have a very simple query language that offers the flexibility to find tasks in no time.

Apply dynamically custom filters on the board to find what you need. Search by assignees, description, categories, due date, etc.

Switch between board, calendar and list views
----------------------------------------------

Switch quickly between board, calendar and list views:

![List View](/screenshots/list-view.png)

In one click or with just one rapid keyboard shortcut, change the way to display your tasks.

Single dashboard for all projects
---------------------------------

![Dashboard](/screenshots/dashboard.png)

Get all important information in one place, your projects, your calendar, your assigned tasks and sub-tasks.

Work in a team or alone
-----------------------

Kanboard is designed for small teams, but you can also work alone.

![Project Permissions](/screenshots/project-permissions.png)

For each project, you can add members and project managers with more privileges.

Tasks, subtasks, attachments and comments
-----------------------------------------

![Task](/screenshots/task.png)

- Break down a task into sub-tasks, estimate the time or the complexity.
- Describe your task by using the [Markdown syntax](/documentation/syntax-guide).
- Add comments, documents, change the color, the category, the assignee, the due date.
- Move or duplicate your tasks across projects with one click.

Automated actions
-----------------

![Automatic Actions](/screenshots/automatic-actions.png)

- Don't repeat yourself! [Automate your workflow](/documentation/automatic-actions).
- Stop doing again and again the same thing manually.
- Change automatically the assignee, colors, categories and almost anything based on events.

Swimlanes
---------

![Swimlanes](/screenshots/swimlanes.png)

[Swimlanes](/documentation/swimlanes) are horizontal separations in your board.
You can divide the board into several sections to manage software releases or anything else.

Gantt Charts
------------

Visualize the time line of your projects easily and make accurate forecasts.

![Gantt for Projects](/screenshots/gantt-projects.png)

Planning projects are very easy since you can see clearly when a project will start and finish.

Analytics and Reports
---------------------

Analyze and improve your workflow by using the **cumulative flow diagram or the burn down chart**.

![Analytics](/screenshots/analytics.png)

Several [charts are available](/documentation/analytics) to get a quick overview of your projects.

Integrations
------------

Connect Kanboard with external services that you already use.

For example, you can create tasks directly by email:

![Incoming Emails](/screenshots/incoming-emails.png)

Choose between several SMTP providers to receive emails directly in Kanboard.

Synchronize issues and receive commits from code hosting platforms.
Close tasks, add comments, assign categories automatically and more by using webhooks for Github, Gitlab and Bitbucket.

Receive notifications directly by mail or by chat with Hipchat, Slack, Mattermost, RocketChat or Jabber.

Subscribe to the calendar and RSS feeds:

![iCalendar feed](/screenshots/ical.png)

Import in Microsoft Outlook or Apple Calendar your tasks with a due date.

Develop your own integration with the [API](/documentation/api-json-rpc) or the [webhooks](/documentation/webhooks):

![Python Client](/screenshots/api-dev.png)

Time Tracking
-------------

Track automatically the time spent on subtasks and tasks.
Compare the time spent to the time estimated.

Translated in 26 languages
--------------------------

Thanks to the different contributors, Kanboard is translated in Bahasa Indonesia, Bosnian, Brazilian, Chinese, Czech, Danish, Dutch, English, Finnish, French, German, Greek, Hungarian, Italian, Japanese, Korean, Malay, Norwegian, Polish, Portuguese, Russian, Serbian, Spanish, Swedish, Thai, Turkish.

Multiple Authentication Backends
--------------------------------

- Connect Kanboard to your existing [LDAP/Active Directory](/documentation/ldap-authentication) servers.
- Use external providers such as [Google](/plugin/google-auth), [Github](/plugin/github-auth) or [Gitlab](/plugin/gitlab-auth).
- Delegate the authentication to another system by using the [Reverse-Proxy mode](/documentation/reverse-proxy-authentication).

Host Almost Anywhere
--------------------

Install Kanboard on your shared hosting platform, your preferred VPS provider, your Raspberry Pi or localhost.
Deploy Kanboard with [Docker](/documentation/docker) or any cloud platform like [Heroku](/documentation/heroku).

If you don't want to deal with technical details, we propose a [managed hosting service](/hosting).

Super Easy Installation
-----------------------

There are almost no external dependency.

[Copy and paste the source code](/documentation/installation) and your are up and running.
Upgrades are really easy, the database schema is automatically migrated for you.

Multiple Database Support
-------------------------

Kanboard is compatible with [Sqlite](/documentation/sqlite-database), [Mysql](/documentation/mysql-configuration), MariaDB and [Postgres](/documentation/postgresql-configuration).

Security
--------

- Kanboard supports **two factor authentication** compatible with any <abbr title="Time-based One-time Password Algorithm">TOTP</abbr> software.
- Content security policies are used to avoid [XSS](https://en.wikipedia.org/wiki/Cross-site_scripting) attacks.
- Stored passwords use a [strong hashing algorithm](http://php.net/password_hash).
- [Brute force protection](/documentation/bruteforce-protection) and account lock down for authentication.

Free and Open Source software
-----------------------------

Kanboard is distributed under **the permissive MIT License**.
The software is mainly developed by Frédéric Guillot, but more than 60+ people have contributed!
