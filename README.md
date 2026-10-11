# Archívna evidencia

Samuel Chovanec  
5ZYI31

## Stručný opis projektu
Webová aplikácia slúži na evidenciu archívnych objektov, napríklad dokumentov, fotografií a máp. Je určená návštevníkom, ktorí chcú objekty vyhľadávať a prezerať, a pracovníkom archívu, ktorí potrebujú spravovať ich záznamy.

Aplikácia nahrádza neprehľadnú alebo papierovú evidenciu a umožňuje uchovávať základné informácie o objektoch, ich kategóriách, inštitúciách a priložených súboroch na jednom mieste. Archivár spravuje záznamy po prihlásení, zatiaľ čo administrátor spravuje používateľské účty a ich roly.

## Role v projekte
- **Návštevník:** prehliada a filtruje verejné záznamy; nemôže ich meniť.
- **Archivár:** po prihlásení vytvára, zobrazuje, upravuje a maže záznamy objektov a kategórií; nahráva a spravuje súbory pri objektoch.
- **Administrátor:** spravuje používateľské účty a priraďuje im rolu archivára alebo administrátora.

## Prípady použitia podľa rolí
- Návštevník vyhľadá objekt podľa názvu alebo kategórie a otvorí jeho detail.
- Archivár pridá, upraví alebo odstráni objekt a priložený súbor.
- Archivár vytvorí, upraví alebo odstráni kategóriu.
- Administrátor vytvorí alebo upraví používateľský účet a nastaví mu rolu.

## Plánované entity
- **Objekt:** predstavuje evidovaný archívny materiál; obsahuje názov, opis, dátum, stav, kategóriu, inštitúciu a cestu k prílohe.
- **Kategória:** slúži na triedenie objektov; obsahuje názov a opis.
- **Inštitúcia:** označuje inštitúciu, v ktorej je objekt evidovaný; obsahuje názov a základné kontaktné údaje.

## Vzťahy medzi entitami
Jedna kategória môže obsahovať viac objektov (1:N), rovnako aj jedna inštitúcia (1:N). Používatelia sú vedení samostatne a nezapočítavajú sa medzi uvedené entity.

## Hlavné stránky aplikácie
1. **Zoznam objektov** – verejné vyhľadávanie a filtrovanie záznamov.
2. **Detail objektu** – informácie o objekte a dostupná príloha.
3. **Prihlásenie** – vstup do časti pre správu archívu.
4. **Správa objektov** – zoznam a mazanie záznamov; dostupné iba archivárovi.
5. **Formulár objektu** – vytvorenie a úprava záznamu vrátane nahratia súboru.
6. **Správa kategórií** – vytvorenie, úprava a mazanie kategórií.
7. **Správa používateľov** – vytvorenie účtu a nastavenie roly; dostupné iba administrátorovi.

## Rozdelenie funkcionality
- **Základná funkcionalita:**
  - Návštevník si zobrazí zoznam objektov, vyhľadá ich podľa názvu alebo kategórie a otvorí detail objektu.
  - Archivár sa prihlási a spravuje objekty: pridáva nové záznamy, zobrazuje ich, upravuje a maže.
  - Archivár spravuje kategórie rovnakými operáciami. Pri objektoch vyberá kategóriu a inštitúciu.
  - Archivár nahráva, zobrazuje a odstraňuje súbory priradené k objektom.
  - Administrátor vytvára a upravuje používateľské účty a priraďuje im rolu.
  - Zoznam objektov sa filtruje asynchrónne cez AJAX a formulár objektu sa odosiela bez opätovného načítania celej stránky.
  - Formuláre sa kontrolujú na strane klienta aj servera. Prístup k správe dát je obmedzený podľa roly; heslá sa ukladajú ako bezpečné hashe a databázové dotazy používajú ochranu pred SQL injection.
- **Rozširujúca funkcionalita:**
  - Stránkovanie zoznamu objektov.
  - Náhľady obrázkov priamo v detaile objektu.
  - Rozšírené filtrovanie objektov podľa stavu, inštitúcie alebo dátumu.
  - Export zoznamu objektov do CSV súboru.
