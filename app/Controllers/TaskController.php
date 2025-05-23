<?php
// TaskController.php
namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Controller;

class TaskController extends Controller
{
    public function __construct()
    {
        helper(['form']);
    }

    private function checkAuth()
    {
        if (!session()->get('user_id')) {
            redirect()->to(base_url('login'))->send();
            exit;
        }
    }

    public function index()
    {
        $this->checkAuth();

        $model = new TaskModel();
        $tasks = $model->where('user_id', session()->get('user_id'))->findAll();

        return view('tasks/index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $this->checkAuth();
        return view('tasks/create');
    }

    public function store()
    {
        $this->checkAuth();

        $model = new TaskModel();
        $model->insert([
            'user_id'     => session()->get('user_id'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
            'priority'    => $this->request->getPost('priority'),
            'due_date'    => $this->request->getPost('due_date'),
            'created_at'  => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('tasks'));
    }

    public function edit($id)
    {
        $this->checkAuth();

        $model = new TaskModel();
        $task = $model
            ->where('id', $id)
            ->where('user_id', session()->get('user_id'))
            ->first();

        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        $this->checkAuth();

        $model = new TaskModel();
        $model->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
            'priority'    => $this->request->getPost('priority'),
            'due_date'    => $this->request->getPost('due_date'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('tasks'));
    }

    public function delete($id)
    {
        $this->checkAuth();

        $model = new TaskModel();
        $model
            ->where('id', $id)
            ->where('user_id', session()->get('user_id'))
            ->delete();

        return redirect()->to(base_url('tasks'));
    }

    public function view($id)
    {
        if ($redirect = $this->checkAuth()) return $redirect;
    
        $model = new TaskModel();
        $task = $model
            ->where('id', $id)
            ->where('user_id', session()->get('user_id'))
            ->first();
    
        if (!$task) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }
    
        return view('tasks/view', ['task' => $task]);
    }
    

}
