<?php declare(strict_types=1);

namespace App\Repositories\Implementations;

use App\Repositories\Interfaces\Common as CommonInt;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class Common implements CommonInt
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
     * @param int $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAll($perPage = 1) : LengthAwarePaginator
    {
        $this->validateLimit($perPage);

        return $this->model::paginate($perPage);
    }

    /**
     * Method to validate limit param.
     *
     * @param $perPage
     */
    public function validateLimit ($perPage)
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
    public function getById (int $id): array
    {
        $record = [];
        $model = $this->model->find($id);
        if ($model !== null) {
            $record = $model->getAttributes();
            unset($record['created_at'], $record['updated_at']);
        }

        return $record;
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        $model = [];

        try {
            $model = $this->model::create($attributes);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return $model;
    }

    /**
     * Method to update record.
     *
     * @param int $id
     * @param array $attributes
     *
     * @return bool
     */
    public function update(int $id, array $attributes): bool
    {
        return (bool) $this->model->where('id', $id)
                                  ->update($attributes);
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
