<?php declare(strict_types=1);

namespace App\Repositories\Implementations;

use App\Repositories\Interfaces\Common;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CommonImpl implements Common
{
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
     * @param $id
     *
     * @return array
     */
    public function getById ($id): array
    {
        $record = [];
        $model = $this->model->find($id);
        if ($model !== null) {
            $record = $model['original'];
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
     * @param $id
     * @param array $attributes
     *
     * @return Model
     */
    public function update ($id, array $attributes): Model
    {
        return $this->model->where('id', $id)
            ->update($attributes);
    }

    /**
     * Method to delete record.
     *
     * @param $id
     *
     * @return bool
     */
    public function delete ($id): bool
    {
       return (bool) $this->model->destroy($id);
    }
}