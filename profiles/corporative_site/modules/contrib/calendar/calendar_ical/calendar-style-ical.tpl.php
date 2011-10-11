<?php
/**
 * $title
 *   The name of the calendar.
 */
if (empty($method)) {
  $method = 'PUBLISH';
}
?>
BEGIN:VCALENDAR
VERSION:2.0
METHOD:<?php print $method; ?>
<?php if (!empty($calname)): ?>
X-WR-CALNAME;VALUE=TEXT:<?php print $calname . "\r\n"; ?>
<?php endif; ?>
PRODID:-//Drupal iCal API//EN
<?php print $rows ?>
END:VCALENDAR
