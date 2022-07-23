<?php

namespace App\Repository;

use App\Entity\Specialist;

interface SpecialistRepositoryInterface
{
    /**
     * @param bool $onlineFirst sort by online specialists first
     * @param bool $activeOnly filter on active specialists only
     *
     * @return Specialist[]
     */
    public function search(
        bool $onlineFirst = false,
        bool $activeOnly = true
    ): array;
}
