<?php
/** @var \ByTIC\FacebookPixel\FacebookPixel $this */
$events = $this->getEvents();
?>

    <!-- Facebook Pixel Code Events -->
<?php if (is_array($events) && count($events)) { ?>
    <script>
        <?php foreach ($events as $event) { ?>
            fbq('track', '<?php echo $event->getTrackName()?>', <?php echo json_encode($event->getProperties()); ?>);
        <?php } ?>
    </script>
<?php } ?>