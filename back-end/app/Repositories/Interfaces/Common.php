<?php declare(strict_types=1);

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface Common
 *
 * This interface contain the common firm for methods.
 * All methods are common to all Database Entity.
 */
interface Common
{
    /**
     * Get all records.
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Get the specified record.
     *
     * @param int $id
     *
     * @return array
     */
     public function getById(int $id): array;

    /**
     * Create a new record.
     *
     * @param array $attributes
     *
     * @return mixed
     */
     public function create(array $attributes);

    /**
     * Update a specified record.
     *
     * @param int $id
     * @param array $attributes
     *
     * @return bool
     */
     public function update(int $id, array $attributes): bool;

    /**
     * Delete a specified record.
     *
     * @param int $id
     *
     * @return bool
     */
     public function delete(int $id): bool;
}

