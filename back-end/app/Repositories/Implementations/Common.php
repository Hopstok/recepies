<?php declare(strict_types=1);

namespace App\Repositories\Implementations;

use App\Repositories\Interfaces\Common as CommonInt;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Common implements CommonInt
{
    /** @var Model $model */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all record from DB.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model::all();
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
