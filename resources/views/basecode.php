<?php
declare(strict_types=1);

use ByTIC\FacebookPixel\FacebookPixel;

/** @var FacebookPixel $pixel */
$pixel = $pixel ?? null;
$pixels = $pixels ?? [$pixel];
?>
<!-- Facebook Pixel Code -->
<?php
if (!is_array($pixels) || count($pixels) < 1) {
    return;
}
?>
<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    <?php foreach ($pixels as $pixel) { ?>
    fbq('init', '<?= $pixel->getPixelId(); ?>');
    <?php } ?>
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=<?= $pixel->getPixelId(); ?>&ev=PageView&noscript=1"/>
</noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->