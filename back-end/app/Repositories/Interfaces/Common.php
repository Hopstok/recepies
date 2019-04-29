<?php declare(strict_types=1);

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use InvalidArgumentException;

/**
 * Interface Common
 *
 * This interface contain the common firm for methods.
 * All methods are common to all Database Entity.
 */
interface Common
{
    /**
     * Get all data records.
     *
     * @param string $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAll(string $perPage): LengthAwarePaginator;

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
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * Update a specified record.
     *
     * @param int $id
     * @param array $attributes
     *
     * @return Model
     */
    public function update(int $id, array $attributes): Model;

    /**
     * Delete a specified record.
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * Validate
     * @param string $perPage
     *
     * @throws InvalidArgumentException
     */
    public function validateLimit(string $perPage);
}

