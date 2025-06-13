<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TaskModel;

class TaskAPI extends ResourceController
{
    protected $format = 'json';

    public function index()
    {
        $model = new TaskModel();

        // Check if a user_id is passed as a query param to filter
        $userId = $this->request->getGet('user_id');

        if ($userId) {
            $tasks = $model->where('user_id', $userId)->findAll();
        } else {
            $tasks = $model->findAll(); // Return all tasks if no filter
        }

        return $this->respond($tasks);
    }
}
