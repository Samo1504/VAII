<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\ArchiveObject|null $archiveObject */

$archiveObject = $archiveObject ?? null;
$isEdit = $archiveObject !== null;
$status = $isEdit ? $archiveObject->getStav() : '';
?>
<main class="page-content">
    <section class="page-heading" aria-labelledby="page-title">
        <div>
            <p class="eyebrow">Digitálny archív</p>
            <h1 id="page-title"><?= $isEdit ? 'Upraviť archívny objekt' : 'Pridať archívny objekt' ?></h1>
            <p class="page-intro">
                <?= $isEdit ? 'Upravte údaje archívneho materiálu.' : 'Vyplňte základné informácie o archivovanom materiáli.' ?>
            </p>
        </div>
    </section>

    <section class="filter-panel" aria-label="<?= $isEdit ? 'Formulár úpravy archívneho objektu' : 'Formulár nového archívneho objektu' ?>">
        <form class="filter-form archive-object-form" method="post" action="<?= $link->url('archiveObject.save') ?>">
            <?php if ($isEdit) { ?>
                <input type="hidden" name="id" value="<?= e((string)$archiveObject->getId()) ?>">
            <?php } ?>

            <div class="field field-search">
                <label for="name">Názov objektu <span aria-hidden="true">*</span></label>
                <input id="name" name="name" type="text" maxlength="50" required
                       placeholder="Napr. Mapa Žilinského kraja"
                       value="<?= e($archiveObject?->getName() ?? '') ?>">
            </div>

            <div class="field">
                <label for="category">Kategória</label>
                <input id="category" name="category" type="text" maxlength="50"
                       placeholder="Napr. Mapy"
                       value="<?= e($archiveObject?->getCategory() ?? '') ?>">
            </div>

            <div class="field">
                <label for="institution">Inštitúcia</label>
                <input id="institution" name="institution" type="text" maxlength="50"
                       placeholder="Napr. Štátny archív Žilina"
                       value="<?= e($archiveObject?->getInstitution() ?? '') ?>">
            </div>

            <div class="field">
                <label for="datum">Dátum <span aria-hidden="true">*</span></label>
                <input id="datum" name="datum" type="date" required
                       value="<?= e($archiveObject?->getDatum() ?? '') ?>">
            </div>

            <div class="field">
                <label for="stav">Stav <span aria-hidden="true">*</span></label>
                <select id="stav" name="stav" required>
                    <option value="" disabled <?= $status === '' ? 'selected' : '' ?>>Vyberte stav</option>
                    <option value="Digitalizované" <?= in_array($status, ['Digitalizované', 'digitized'], true) ? 'selected' : '' ?>>
                        Digitalizované
                    </option>
                    <option value="Uložené" <?= in_array($status, ['Uložené', 'stored'], true) ? 'selected' : '' ?>>
                        Uložené
                    </option>
                    <?php if ($status !== '' && !in_array($status, ['Digitalizované', 'digitized', 'Uložené', 'stored'], true)) { ?>
                        <option value="<?= e($status) ?>" selected><?= e($status) ?></option>
                    <?php } ?>
                </select>
            </div>

            <p class="form-help">Povinné polia sú označené hviezdičkou.</p>

            <div class="filter-actions">
                <a class="button button-quiet" href="<?= $link->url('home.index') ?>">Zrušiť</a>
                <button class="button button-primary" type="submit">
                    <?= $isEdit ? 'Uložiť zmeny' : 'Pridať objekt' ?>
                </button>
            </div>
        </form>
    </section>
</main>
