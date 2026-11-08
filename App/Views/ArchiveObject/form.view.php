<?php

/** @var \Framework\Support\LinkGenerator $link */
?>
<main class="page-content">
    <section class="page-heading" aria-labelledby="page-title">
        <div>
            <p class="eyebrow">Digitálny archív</p>
            <h1 id="page-title">Pridať archívny objekt</h1>
            <p class="page-intro">Vyplňte základné informácie o archivovanom materiáli.</p>
        </div>
    </section>

    <section class="filter-panel" aria-label="Formulár nového archívneho objektu">
        <form class="filter-form archive-object-form" method="post" action="<?= $link->url('archiveObject.save') ?>">
            <div class="field field-search">
                <label for="name">Názov objektu <span aria-hidden="true">*</span></label>
                <input id="name" name="name" type="text" maxlength="50" required
                       placeholder="Napr. Mapa Žilinského kraja">
            </div>

            <div class="field">
                <label for="category">Kategória</label>
                <input id="category" name="category" type="text" maxlength="50"
                       placeholder="Napr. Mapy">
            </div>

            <div class="field">
                <label for="institution">Inštitúcia</label>
                <input id="institution" name="institution" type="text" maxlength="50"
                       placeholder="Napr. Štátny archív Žilina">
            </div>

            <div class="field">
                <label for="datum">Dátum <span aria-hidden="true">*</span></label>
                <input id="datum" name="datum" type="date" required>
            </div>

            <div class="field">
                <label for="stav">Stav <span aria-hidden="true">*</span></label>
                <select id="stav" name="stav" required>
                    <option value="" selected disabled>Vyberte stav</option>
                    <option value="Digitalizované">Digitalizované</option>
                    <option value="Uložené">Uložené</option>
                </select>
            </div>

            <p class="form-help">Povinné polia sú označené hviezdičkou.</p>

            <div class="filter-actions">
                <a class="button button-quiet" href="<?= $link->url('home.index') ?>">Zrušiť</a>
                <button class="button button-primary" type="submit">Pridať objekt</button>
            </div>
        </form>
    </section>
</main>
