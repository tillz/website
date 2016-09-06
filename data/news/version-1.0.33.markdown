Title: Kanboard 1.0.33
Date: 2016-09-05
---

The user interface is now more responsive for mobiles and tablets. 
Resizing the browser window will not break the user interface like before.

This release is also the beginning of the modernization of the tools used to build the user interface.

The vanilla CSS has been converted to SASS with variables and mixins. 
This is now easier to customize the different styles, colors or fonts.

Some Javascript code has been converted to [Vue.js](https://vuejs.org/) components. 
The long-term goal is to replace most jQuery stuff with a modern Javascript framework.

New features
------------

* Move a task without drag and drop (smartphones and tablets)
* Add the possibility to unlock users from the user interface
* New API calls for task metadata
* New automatic actions:
    - Define color by Swimlane
    - Define priority by Swimlane

Improvements
------------

* Introduce Vue.js to manage user interface components
* Add column "Reference" and "Creator Name" in CSV task export
* Show both time spent and estimated on the board
* Store board collapsed mode user preference in the database
* Store comment sorting direction in the database
* Avoid tags overlapping on the board
* Show project name in notifications
* Allow priority changes for inverted priority scales
* Add the possibility to attach template hooks with local variables and callback
* Add "reference" hooks
* Show project name in task forms
* Convert vanilla CSS to SASS
* Make user interface more responsive for smartphones and tablets
* Support version operators for plugin directory: >= and >
* Update Spanish documentation

Other changes
-------------

* Time spent (in hours) for subtasks are not rounded to the nearest quarter anymore

Bug fixes
---------

* Fix improper HTML escaping for textarea (potential XSS)
* Do not show closed tasks on public boards
* Fix undefined constant in config example file
* Fix PHP notice when sending overdue notifications
* Fix wrong project date format (shown as 01/01/1970)
    - If the dates still not correct, modify and save the date

Download
--------

- [Full ChangeLog](https://github.com/kanboard/kanboard/blob/master/ChangeLog)
- [Download the version 1.0.33](https://kanboard.net/kanboard-1.0.33.zip)
- [How to upgrade Kanboard to a new version](https://kanboard.net/documentation/update)
