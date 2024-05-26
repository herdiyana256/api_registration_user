<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class UserController extends ResourceController
{
    public function register()
    {
        // Dapatkan data user dari request JSON
        $userData = $this->request->getJSON();

        // Ekstrak data user
        $username = $userData->username;
        $email = $userData->email;
        $password = $userData->password;

        // Validasi input
        $rules = [
            'username' => 'required|min_length[5]|max_length[255]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors(), 400);
        }

        // Simpan data user ke database
        $userModel = new UserModel();
        $userModel->insert([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        // Kirim respons JSON
        return $this->respond([
            'status' => 'success',
            'message' => 'Registrasi user berhasil',
        ], 200);
    }

    public function updatePassword($userId)
    {
        // Dapatkan data pengguna dari request JSON
        $userData = $this->request->getJSON();

        // Validasi input
        $rules = [
            'password' => 'required|min_length[8]',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors(), 400);
        }

        // Perbarui kata sandi pengguna
        $userModel = new UserModel();
        $user = $userModel->find($userId);
        if (!$user) {
            return $this->failNotFound('Pengguna tidak ditemukan');
        }

        $password = $userData->password;
        $userModel->update($userId, ['password' => password_hash($password, PASSWORD_DEFAULT)]);

        // Kirim respons JSON
        return $this->respond([
            'status' => 'success',
            'message' => 'Kata sandi berhasil diperbarui',
        ], 200);
    }

    public function delete($userId = null)
    {
        // Periksa apakah pengguna ada di database
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if (!$user) {
            return $this->failNotFound('Pengguna tidak ditemukan');
        }

        // Hapus pengguna
        $userModel->delete($userId);

        // Kirim respons JSON
        return $this->respondDeleted([
            'status' => 'success',
            'message' => 'Pengguna berhasil dihapus',
        ]);
    }

    public function show($userId = null) // GET
    {
        // Periksa apakah ID pengguna telah diberikan
        if ($userId === null) {
            return $this->fail('ID pengguna harus diberikan', 400);
        }

        // Dapatkan data pengguna dari database
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        // Periksa apakah pengguna ditemukan
        if (!$user) {
            return $this->failNotFound('Pengguna tidak ditemukan');
        }

        // Kirim respons JSON
        return $this->respond($user);
    }
}
