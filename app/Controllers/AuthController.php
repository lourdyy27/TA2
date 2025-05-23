<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function showLogin()
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
            $session->set('user_id', $user['id']);
            return redirect()->to('/tasks');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials.');
        }
    }

    public function showRegister()
    {
        return view('auth/register');
    }

    public function register()
    {
        $session = session();
        $model = new UserModel();
        $data = [
            'username'   => $this->request->getPost('username'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $model->insert($data);
        $user = $model->where('email', $data['email'])->first();
        $session->set('user_id', $user['id']);

        return redirect()->to('/tasks');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
