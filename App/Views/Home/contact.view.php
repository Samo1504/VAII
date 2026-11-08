<?php

/** @var \Framework\Support\LinkGenerator $link */
?>
<main class="page-content" id="kontakt">
    <section class="page-heading" aria-labelledby="page-title">
        <div>
            <p class="eyebrow">Digitálny archív</p>
            <h1 id="page-title">Kontakt</h1>
            <p class="page-intro">Informácie o pracovisku, ktoré spravuje archívnu evidenciu.</p>
        </div>
    </section>

    <section class="filter-panel" aria-labelledby="contact-title">
        <div class="section-heading">
            <div>
                <h2 id="contact-title">Fakulta riadenia a informatiky</h2>
                <p>Žilinská univerzita v Žiline</p>
            </div>
        </div>
        <address>
            Univerzitná 8215/1<br>
            010 26 Žilina, Slovensko<br>

        </address>
    </section>

    <p><a class="detail-link" href="<?= $link->url('home.index') ?>">Späť na zoznam objektov →</a></p>
</main>
