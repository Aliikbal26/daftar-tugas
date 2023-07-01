<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Controller;


class Home extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function dashboard()
    {
        // Menginisialisasi model
        $model = new TaskModel();

        // Mengambil semua tugas dari database
        $data['tasks'] = $model->findAll();
        return view('admin/dashboard', $data);
    }

    //view menambahkan tugas
    public function create()
    {
        return view('admin/create');
    }

    public function tambahTugas()
    {
        // Mengambil data dari permintaan Ajax
        $judul = $this->request->getPost('judul');

        // Menyimpan tugas baru ke database
        $model = new TaskModel();
        $model->insert([
            'judul' => $judul,
            'status' => 0
        ]);

        $session = session();
        $session->setFlashdata('success', 'Tugas berhasil ditambahkan!');

        return view('admin/create');
    }

    //view edit tugas
    public function edit($id)
    {
        $model = new TaskModel();
        $task = $model->find($id);

        return view('admin/edit', [
            'task' => $task
        ]);
    }

    //method mengedit tugas
    public function editTugas()
    {
        $model = new TaskModel();

        $id = $this->request->getPost('id');
        $judul = $this->request->getPost('judul');
        $status = $this->request->getPost('status');

        $model->update($id, [
            'judul' => $judul,
            'status' => $status
        ]);
        return redirect()->to('dashboard')->with('success', 'Tugas berhasil diperbarui.');
    }

    //edit status ajax
    public function update($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if (!$task) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Tugas tidak ditemukan.'
            ]);
        }

        $status = $this->request->getPost('status');

        $data = [
            'status' => $status
        ];

        $taskModel->update($id, $data);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Status tugas berhasil diperbarui.'
        ]);
    }
    public function destroy($id)
    {
        $model = new TaskModel();
        $model->delete($id);

        return redirect()->to('/dashboard')->with('success', 'Tugas berhasil dihapus.');
    }
}
