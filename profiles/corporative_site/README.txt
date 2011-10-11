Requirements
============
Drush make: http://drupal.org/project/drush_make
For more information about make files read "Drush make theory for happy profile development" at
http://drupal.org/node/1006620

Installation
============
Create a filename called "build_corporative_site.make" with the following contents:

; make file for corporative-site profile
core = 7.x
projects[] = drupal
api = 2

; Profile.
projects[corporative_site][type] = "profile"
projects[corporative_site][download][type] = "git"
projects[corporative_site][download][module] = "corporative_site"
projects[corporative_site][download][branch] = "7.x-1.x"

Run the following drush command:

  drush make build_corporative_site.make corporative_site

The above command will create a directory "corporative_site" with Drupal 7 and the Corporative Site installation profile.
