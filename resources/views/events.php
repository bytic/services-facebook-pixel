<?php
declare(strict_types=1);

/** @var FacebookPixel $this */

use ByTIC\FacebookPixel\FacebookPixel;
use ByTIC\FacebookPixel\Renderer\Events\EventProperties;

$events = $events ?? [];
?>

<!-- Facebook Pixel Code Events -->
<?php if (is_array($events) && count($events)) { ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            <?php foreach ($events as $event) { ?>
            fbq('track', '<?= $event->getEventName(); ?>', <?= EventProperties::for($event); ?>);
            <?php } ?>
        });
    </script>
<?php } ?>
<!-- Facebook Pixel Code Events END -->
