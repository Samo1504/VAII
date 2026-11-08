<?php

/** @var \App\Models\ArchiveObject[] $archiveObjects */
/** @var \Framework\Support\LinkGenerator $link */
?>
<main class="page-content" id="zoznam-objektov">
    <section class="page-heading" aria-labelledby="page-title">
        <div>
            <p class="eyebrow">Digitálny archív</p>
            <h1 id="page-title">Zoznam objektov</h1>
            <p class="page-intro">Vyhľadávajte, filtrujte a prezerajte archivované materiály.</p>
        </div>
        <div class="heading-actions">
            <button class="button button-secondary" type="button">Exportovať do CSV</button>
            <a class="button button-primary" href="<?= $link->url('archiveObject.add') ?>">
                <span aria-hidden="true">+</span> Pridať objekt
            </a>
        </div>
    </section>

    <section class="filter-panel" aria-labelledby="filter-title">
        <div class="section-heading">
            <div>
                <h2 id="filter-title">Vyhľadávanie a filtre</h2>
                <p>Zúžte zoznam podľa názvu, kategórie, inštitúcie alebo dátumu.</p>
            </div>
            <span class="filter-icon" aria-hidden="true">⌕</span>
        </div>

        <form class="filter-form">
            <div class="field field-search">
                <label for="search">Názov</label>
                <input id="search" name="search" type="search" placeholder="Hľadať podľa názvu…">
            </div>
            <div class="field">
                <label for="category">Kategória</label>
                <select id="category" name="category">
                    <option value="">Všetky kategórie</option>
                    <option>Dokumenty</option>
                    <option>Fotografie</option>
                    <option>Kroniky</option>
                    <option>Korešpondencia</option>
                    <option>Mapy</option>
                    <option>Plány</option>
                </select>
            </div>
            <div class="field">
                <label for="institution">Inštitúcia</label>
                <select id="institution" name="institution">
                    <option value="">Všetky inštitúcie</option>
                    <option>Štátny archív Žilina</option>
                    <option>Mestské múzeum</option>
                    <option>Obecný úrad Terchová</option>
                </select>
            </div>
            <div class="field">
                <label for="status">Stav</label>
                <select id="status" name="status">
                    <option value="">Všetky stavy</option>
                    <option>Digitalizované</option>
                    <option>Uložené</option>
                </select>
            </div>
            <div class="field field-date">
                <label for="date-from">Dátum od</label>
                <input id="date-from" name="date-from" type="date">
            </div>
            <div class="field field-date">
                <label for="date-to">Dátum do</label>
                <input id="date-to" name="date-to" type="date">
            </div>
            <div class="filter-actions">
                <button class="button button-primary" type="button">Filtrovať</button>
                <button class="button button-quiet" type="reset">Zrušiť filtre</button>
            </div>
        </form>
    </section>

    <section class="results-panel" aria-labelledby="results-title">
        <div class="results-heading">
            <div>
                <h2 id="results-title">Archívne záznamy</h2>
                <p>Nájdených objektov: <strong><?= count($archiveObjects) ?></strong></p>
            </div>
        </div>

        <div class="table-wrap">
            <table class="records-table">
                <thead>
                    <tr>
                        <th scope="col"><span class="visually-hidden">Náhľad</span></th>
                        <th scope="col">Názov</th>
                        <th scope="col">Kategória</th>
                        <th scope="col">Inštitúcia</th>
                        <th scope="col">Dátum</th>
                        <th scope="col">Stav</th>
                        <th scope="col"><span class="visually-hidden">Akcie</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($archiveObjects as $object) {
                        $status = $object->getStav();
                        $statusLabel = match ($status) {
                            'digitized', 'Digitalizované' => 'Digitalizované',
                            'stored', 'Uložené' => 'Uložené',
                            default => $status,
                        };
                        $statusClass = match ($status) {
                            'digitized', 'Digitalizované' => 'status-digitized',
                            'stored', 'Uložené' => 'status-stored',
                            default => '',
                        };
                        ?>
                        <tr>
                            <td class="preview-cell">
                                <span class="record-preview" aria-hidden="true">#<?= e((string)$object->getId()) ?></span>
                            </td>
                            <th scope="row" data-label="Názov"><?= e($object->getName() ?? 'Bez názvu') ?></th>
                            <td data-label="Kategória"><?= e($object->getCategory() ?? 'Neuvedená') ?></td>
                            <td data-label="Inštitúcia"><?= e($object->getInstitution() ?? 'Neuvedená') ?></td>
                            <td data-label="Dátum"><?= e($object->getDatum()) ?></td>
                            <td data-label="Stav">
                                <span class="status <?= e($statusClass) ?>"><?= e($statusLabel) ?></span>
                            </td>
                            <td data-label="Akcie">
                                <div class="record-actions">
                                    <form method="post" action="<?= $link->url('archiveObject.edit') ?>">
                                        <input type="hidden" name="id" value="<?= e((string)$object->getId()) ?>">
                                        <button class="button button-secondary" type="submit">Upraviť</button>
                                    </form>
                                    <form method="post" action="<?= $link->url('archiveObject.delete') ?>">
                                        <input type="hidden" name="id" value="<?= e((string)$object->getId()) ?>">
                                        <button class="button button-danger" type="submit">Zmazať</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if ($archiveObjects === []) { ?>
                        <tr>
                            <td colspan="7">Zatiaľ nie sú evidované žiadne archívne objekty.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </section>
</main>
