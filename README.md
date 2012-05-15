framework3
==========

A PHP framework for quick and manageable data applications

## Structure ##

There are 4 classes of objects:
1.  The __Framework__ object simply decides, based http request information, what page, template, etc. to use
2.  __Pages__ just are unique "Activities" (as they are called in android), which assign modules to positions on the template
3.  __Modules__ define ways of displaying/managing pieces of information
4.  __Queries__ define a piece of information for modules to work with

### Files ###
In the framework, each parent objects for these are defined in a "lib" directory, and pages, modules, and queries have their own directories.  Additionally templates and their image, css, and js resources are in a templates directory.

## Implementation ##

To implement the framework, you would just define a "Query" object for each of the data objects in your application.  These objects have functions which modify their object and return it for object chaining.
After that, modules need to be defined for viewing or modifying pieces or sets of information.  A calendar module might define a way of selecting a specific date.
Each module may take one or more query objects, which could tell a calendar module whether it is viewing/changing information for a user's birthday or for an appointment date.
Next, a template needs to be created to house our modules, with named positions.
Finally, specific page objects need to be created and placed in the pages directory, defining what modules go where with which queries, and when the page should be chosen.

