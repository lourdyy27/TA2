<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // ✅ Fixed: use 'username' from the database and store as 'name' in session
            $session->set([
                'user_id' => $user['id'],
                'email'   => $user['email'],
                'name'    => $user['name'], // ✅ Corrected here
                'role'    => $user['role'],
            ]);

            return redirect()->to(base_url('tasks'));
        } else {
            $session->setFlashdata('error', 'Invalid email or password.');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
