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
     * @param $id
     *
     * @return Collection
     */
     public function getById($id): array;

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
     * @param $id
     * @param array $attributes
     *
     * @return mixed
     */
     public function update($id, array $attributes);

    /**
     * Delete a specified record.
     *
     * @param $id
     *
     * @return bool
     */
     public function delete($id): bool;
}

