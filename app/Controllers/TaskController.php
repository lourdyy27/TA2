<?php
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

        $validationRules = [
            'title'       => 'required|max_length[255]',
            'description' => 'required',
            'status'      => 'required|in_list[Pending,In Progress,Completed]',
            'priority'    => 'required|in_list[Low,Medium,High]',
            'due_date'    => 'required',
            'attachment'  => 'permit_empty|uploaded[attachment]|max_size[attachment,2048]|ext_in[attachment,jpg,jpeg,png,pdf,doc,docx]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('attachment');
        $fileName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/', $fileName);
        }

        $model = new TaskModel();
        $model->insert([
            'user_id'     => session()->get('user_id'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
            'priority'    => $this->request->getPost('priority'),
            'due_date'    => $this->request->getPost('due_date'),
            'attachment'  => $fileName,
            'created_at'  => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('tasks'))->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {
        $this->checkAuth();

        $model = new TaskModel();
        $task = $model
            ->where('id', $id)
            ->where('user_id', session()->get('user_id'))
            ->first();

        if (!$task) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        $this->checkAuth();

        $model = new TaskModel();
        $task = $model
            ->where('id', $id)
            ->where('user_id', session()->get('user_id'))
            ->first();

        if (!$task) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        $validationRules = [
            'title'       => 'required|max_length[255]',
            'description' => 'required',
            'status'      => 'required|in_list[Pending,In Progress,Completed]',
            'priority'    => 'required|in_list[Low,Medium,High]',
            'due_date'    => 'required',
            'attachment'  => 'permit_empty|max_size[attachment,2048]|ext_in[attachment,jpg,jpeg,png,pdf,doc,docx]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('attachment');
        $fileName = $task['attachment']; // Keep old if no new

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/', $fileName);
        }

        $model->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
            'priority'    => $this->request->getPost('priority'),
            'due_date'    => $this->request->getPost('due_date'),
            'attachment'  => $fileName,
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('tasks'))->with('success', 'Task updated successfully!');
    }

    public function delete($id)
    {
        $this->checkAuth();

        $model = new TaskModel();
        $model
            ->where('id', $id)
            ->where('user_id', session()->get('user_id'))
            ->delete();

        return redirect()->to(base_url('tasks'))->with('success', 'Task deleted successfully!');
    }

    public function view($id)
    {
        $this->checkAuth();

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

    public function adminUserTasks($userId)
{
    $this->checkAuth();

    if (session()->get('role') !== 'admin') {
        return redirect()->to('/tasks')->with('error', 'Unauthorized access.');
    }

    $taskModel = new TaskModel();
    $userTasks = $taskModel->where('user_id', $userId)->findAll();

    return view('admin/user_tasks', [
        'tasks' => $userTasks,
        'user_id' => $userId
    ]);
    }

    public function adminDashboard()
{
    $this->checkAuth();

    if (session()->get('role') !== 'admin') {
        return redirect()->to('/tasks');
    }

    $userModel = new \App\Models\UserModel();
    $users = $userModel->findAll();

    return view('admin/dashboard', ['users' => $users]);
}


}
