<?php declare(strict_types=1);

namespace App\Repositories\Implementations;

use App\Repositories\Interfaces\Common as ICommon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use InvalidArgumentException;

class Common implements ICommon
{
    /** @var Model $model */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Return items paginated.
     *
     * @param string $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAll(string $perPage = '1'): LengthAwarePaginator
    {
        $this->validateLimit($perPage);

        return $this->model::paginate($perPage);
    }

    /**
     * Method to validate limit param.
     *
     * @param string $perPage
     */
    public function validateLimit(string $perPage)
    {
        if (is_numeric($perPage) === false && $perPage !== null) {
            throw new InvalidArgumentException('The limit param is not valid');
        }
    }

    /**
     * Get the specified record.
     *
     * @param int $id
     *
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model::create($attributes);
    }

    /**
     * Method to update record.
     *
     * @param int $id
     * @param array $attributes
     *
     * @return Model
     */
    public function update(int $id, array $attributes): Model
    {
        $this->model->where('id', $id)
                    ->update($attributes);

        return $this->model;
    }

    /**
     * Method to delete record.
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        return (bool) $this->model->destroy($id);
    }
}
