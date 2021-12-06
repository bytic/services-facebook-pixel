<?php
/** @var \ByTIC\FacebookPixel\FacebookPixel $this */
$events = $this->getEvents();
?>

    <!-- Facebook Pixel Code Events -->
<?php if (is_array($events) && count($events)) { ?>
    <script>
        <?php foreach ($events as $event) { ?>
            <?php
            $properties = $event->getProperties();
            if (count($properties)) {
                $propertiesString = json_encode($properties);
                $propertiesString = preg_replace('/"([^"]+)"\s*:\s*/', '$1:', $propertiesString);
            } else {
                $propertiesString = '{}';
            }
            $eventIdParams = '';
            $eventId = $event->getEventId();
            if (!empty($eventId)) {
               $eventIdParams = ', {eventID: \''.$eventId.'\'}';
            }
            ?>
            fbq('track', '<?php echo $event->getEventName()?>', <?= $propertiesString; ?><?= $eventIdParams; ?>);
        <?php } ?>
    </script>
<?php } ?>