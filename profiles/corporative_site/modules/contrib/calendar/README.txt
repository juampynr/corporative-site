Creates calendar displays of Views results.

Create a new calendar by enabling or cloning the default calendar,
changing the date argument to use the correct date field(s), and setting
up the year, month, day, week, and block views with the desired styles 
and fields.

If the Calendar iCal module is enabled, an iCal feed can be
attached to the view.

For a quick and easy start, install the Date Tools module, then use
the Date Tools Wizard to create a content type with a date field
and a calendar that displays that field, all in a single step!



NOTES WHEN SWITCHING FROM 7.2 to 7.3

The views created in the 7.2 version of Calendar won't work in 7.3
because all the handlers have changed. If you are using the default
view, you will need to revert it to pick up the changes. 

If you have calendars that were created by the Date Tools module, they are
default views. Go to each one and revert them so they pick up the new code.

If you are using custom (non-default) views it will probably be easier to 
delete them and just start over than to try to find all the places where the
plugins and handlers need to be altered. Start with the new default
calendar (after reverting it so any previous changes have been
removed). Then clone it and make the following changes:

- In the 'Fields' section, remove the node updated date and add your calendar date.
- Click on each display (Year, Month, Day, Week, Block) and edit the contextual
  filter for the display. Uncheck the node updated date in the list of date fields
  and check instead the date you want to use in the calendar.
- Click on the Upcoming display and edit the filter. Uncheck the node updated date
  and check instead the date you want to use in the calendar.
- If you have the iCal module enabled, click on the iCal display. Edit the
  Row plugin settings and select the date field you want to use in the iCal feed.

After you have made these changes, go to the Views Tools tab and clear the Views 
caches. Also go to admin/config/regional/settings, make sure the right
first day of the week is selected, and resubmit that page even if you
don't make any changes. That step is to fix a bug that might have set that date
to the wrong value.

After that your new views should work correctly and you can try out the
new settings to make whatever additional changes you like.