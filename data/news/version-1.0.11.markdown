Title: Kanboard 1.0.11
Date: 2015-01-10
---

Here are the new features of the version 1.0.11:

Swimlanes
---------

![Swimlanes](https://kanboard.net/screenshots/features/swimlanes.png)

Boards can be divided into horizontal lanes. 
So you can have a better organization of your tasks.

By example, in software development you can separate different releases. 
Swimlanes are configurable in project settings.

Read the [documentation about swimlanes](https://kanboard.net/documentation/swimlanes) for more details.

Project managers
----------------

A new user role is introduced: **Project manager**. 

![Project permissions](https://kanboard.net/screenshots/features/permissions.png)

Any standard users can be promoted project manager. 

- Project managers can change the configuration of the project and access to the reportings.
- Standard project members can only use the board.

Read the [documentation about project permissions](https://kanboard.net/documentation/project-permissions) for more details.

Other improvements
------------------

- Gitlab webhooks
- Subtasks export
- Board filter values are stored in the browser local storage
- Add default categories for projects in settings
- Better responsive design for tablets
- Task search is not anymore case sensitive for people using Postgresql
- Hungarian translation added and other translations updated by contributors
- The event handling use the library `Symfony\EventDispatcher` instead of my own dispatcher
- I replaced the library `Monolog` by my lightweight logging library `SimpleLogger`
- Several internal code refactoring (template helpers and acl)
- Bug fixes

Focus for the next version
--------------------------

- Keyboard shortcuts
- Improve the API to be able to create mobile applications easily
- Integrate the pull-request about the calendar view

[Download the version 1.0.11](https://kanboard.net/kanboard-1.0.11.zip)

Thanks to everybody!
