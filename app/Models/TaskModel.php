<?php
namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'title', 'description', 'status', 'priority', 'due_date', 'attachment', 'created_at', 'updated_at'];

    protected $useTimestamps = false;
}
