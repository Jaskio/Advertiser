<?php

namespace App\Repositories;

abstract class EloquentCrud
{
    /**
     * Get Laravel's eloquent model to work with
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    abstract protected function getModel();

    /**
     * Insert $model into database
     *
     * @param  array   $requestData Any data to be inserted
     * @return object               Inserted Laravel's eloquent model
     */
    public function create(array $requestData) {   
        return $this->getModel()->create($requestData);
    }

    /**
     * Update $model with new data by an id
     *
     * @param  array  $requestData Any data to be updated
     * @return object              Updated Laravel's eloquent model
     */
    public function update(array $requestData) {
        $id = $requestData['id'] ?? 0;

        return $this->getModel()->where('id', $id)->update($requestData);
    }

    /**
     * Update $model with new data by any field we pass
     *
     * @param  string $field       Column to use in where condition
     * @param  mix    $value       Value to use with $field in where condition
     * @param  array  $requestData Data to update, corresponds to $model.
     * @return object              Updated Laravel's eloquent model
     */
    public function updateByField($field, $value, $requestData) {
        return $this->getModel()->where($field, $value)->update($requestData);
    }

    /**
     * Update multiple $model with new data by any field we pass
     *
     * @param  string $field       Column to use in where condition
     * @param  array  $value       Array of values to use with $field in where condition
     * @param  array  $requestData Data to update, corresponds to $model.
     * @return object              Updated Laravel's eloquent model
     */
    public function updateByFieldMultiple($field, array $value, $requestData) {
        return $this->getModel()->whereIn($field, $value)->update($requestData);
    }

    /**
     * Delete $model from database by an id
     * SoftDeletes is used,  unless $hardDelete is set to true
     *
     * @param  integer  $id         $model id to delete
     * @param  boolean  $hardDelete Whether to delete data from database or hide it only
     * @return object               Deleted Laravel's eloquent model
     */
    public function delete($id, $hardDelete = false) {
        return $hardDelete ?
                $this->getModel()->where('id', $id)->forceDelete() :
                $this->getModel()->where('id', $id)->delete();
    }

    /**
     * Multiple delete $model from database, based on array of ids.
     * SoftDeletes is used,  unless $hardDelete is set to true
     *
     * @param  array    $idsToDelete Array of $model ids to delete
     * @param  boolean  $hardDelete  Whether to delete data from database or hide it only
     * @return object                Deleted Laravel's eloquent models
     */
    public function deleteMultiple(array $idsToDelete, $hardDelete = false) {
        return $hardDelete ?
                $this->getModel()->whereIn('id', $idsToDelete)->forceDelete() :
                $this->getModel()->whereIn('id', $idsToDelete)->delete();
    }

    /**
     * Delete $model from database by any field we pass
     * SoftDeletes is used, unless $hardDelete is set to true
     *
     * @param  string  $field      Column to use in where condition
     * @param  mix     $value      Value to use with $field in where condition
     * @param  boolean $hardDelete Whether to delete data from database or hide it only
     * @return object              Deleted Laravel's eloquent model
     */
    public function deleteByField($field, $value, $hardDelete = false) {
        return $hardDelete ?
                $this->getModel()->where($field, $value)->forceDelete() :
                $this->getModel()->where($field, $value)->delete();
    }

    /**
     * Delete multiple $model from database by any field we pass
     * SoftDeletes is used, unless $hardDelete is set to true
     *
     * @param  string  $field      Column to use in where condition
     * @param  array   $value      Array of values to use with $field in where condition
     * @param  boolean $hardDelete Whether to delete data from database or hide it only
     * @return object              Deleted Laravel's eloquent model
     */
    public function deleteMultipleByField($field, $value, $hardDelete = false) {    
            return $hardDelete ?
                $this->getModel()->whereIn($field, $value)->forceDelete() :
                $this->getModel()->whereIn($field, $value)->delete();
    }
      
    /**
     * Get $model from database by any field we pass
     * No joins and relationships implemented
     * Deleted rows will not be returned, unless $withTrashed is set to true
     *
     * @param  string  $field       Column to use in where condition
     * @param  mix     $value       Value to use with $field in where condition
     * @param  boolean $withTrashed Whether to return trashed data or not (SoftDeletes)
     * @return array                Array of selected data
     */
    public function getByField($field, $value, $withTrashed = false) {
        return $withTrashed ?
                $this->getModel()->withTrashed()->where($field, $value)->get() :
                $this->getModel()->where($field, $value)->get();
    }

    /**
     * Get array of $models from database by any field we pass
     * No joins and relationships implemented
     * Deleted rows will not be returned, unless $withTrashed is set to true
     *
     * @param  string  $field       Column to use in where condition
     * @param  array   $value       Array of values to use with $field in where condition
     * @param  boolean $withTrashed Whether to return trashed data or not (SoftDeletes)
     * @return array                Array of selected data
     */
    public function getByFieldMultiple($field, $value, $withTrashed = false) {
        return $withTrashed ?
                $this->getModel()->withTrashed()->whereIn($field, $value)->get() :
                $this->getModel()->whereIn($field, $value)->get();
    }
}