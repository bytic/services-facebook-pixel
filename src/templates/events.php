<?php
/** @var \ByTIC\FacebookPixel\FacebookPixel $this */
$events = $this->getEvents();
?>
<!-- Facebook Pixel Code Events -->
<script>
    <?php foreach ($events as $event) { ?>
    fbq('track', '<?php echo $event->getTrackName()?>');
    <?php } ?>
</script>