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
        function fbq_await() {
            if (typeof fbq === 'function') {
                <?php foreach ($events as $event) { ?>
                fbq('track', '<?= $event->getEventName(); ?>', <?= EventProperties::for($event); ?>);
                <?php } ?>
            } else {
                setTimeout(fbq_await, 250);
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            fbq_await();
        });
    </script>
<?php } ?>
<!-- Facebook Pixel Code Events END -->
