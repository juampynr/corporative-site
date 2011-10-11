<?php
/**
 * 
 *   $event['uid'] - a unique id for the event (usually the url).
 *   $event['summary'] - the name of the event.
 *   $event['start'] - the formatted start date of the event.
 *   $event['end'] - the formatted end date of the event.
 *   $event['rrule'] - the RRULE of the event, if any.
 *   $event['timezone'] - the formatted timezone name of the event, if any.
 *   $event['url'] - the url for the event.
 *   $event['location'] - the name of the event location.
 *   $event['description'] - a description of the event.
 * 
 *   Note that there are empty spaces after RRULE, URL, LOCATION, etc
 *   that are needed to make sure we get the required line break.
 * 
 */
$date = date_now('UTC');
$current_date = !empty($event['current_date']) ? $event['current_date'] : $date->format(DATE_FORMAT_ICAL);
?>
BEGIN:VEVENT
UID:<?php print($event['uid'] . "\r\n") ?>
SUMMARY:<?php print($event['summary'] . "\r\n") ?>
DTSTAMP:<?php print($current_date . "Z\r\n") ?>
DTSTART:<?php print($event['start'] . "Z\r\n") ?>
<?php if (!empty($event['end'])): ?>
DTEND:<?php print($event['end'] . "Z\r\n") ?>
<?php endif; ?>
<?php if (!empty($event['rrule'])) : ?>
<?php print($event['rrule'] . "\r\n") ?>
<?php endif; ?>
<?php if (!empty($event['url'])): ?>
URL;VALUE=URI:<?php print($event['url'] . "\r\n") ?>
<?php endif; ?>
<?php if (!empty($event['location'])): ?>
LOCATION:<?php print($event['location'] . "\r\n") ?>
<?php endif; ?>
<?php if (!empty($event['description'])) : ?>
DESCRIPTION:<?php print($event['description'] . "\r\n") ?>
<?php endif; ?>
END:VEVENT
