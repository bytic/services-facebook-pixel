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
            ?>
            fbq('track', '<?php echo $event->getTrackName()?>', <?php echo $propertiesString; ?>);
        <?php } ?>
    </script>
<?php } ?>