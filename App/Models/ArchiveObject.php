<?php

namespace App\Models;

use Framework\Core\Model;

class ArchiveObject extends Model
{
    public int $id;
    public ?string $name = null;
    public ?string $category = null;
    public ?string $institution = null;
    public string $datum;
    public string $stav;

    protected static ?string $tableName = 'archiveObject';

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getInstitution(): ?string
    {
        return $this->institution;
    }

    public function getDatum(): string
    {
        return $this->datum;
    }

    public function getStav(): string
    {
        return $this->stav;
    }
}
