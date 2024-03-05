<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $mahasiswa = new MahasiswaModel();
        $keyword = $this->request->getPost('keyword');


        if ($keyword) {
            $result = $mahasiswa->search($keyword);
        } else {
            $result = $mahasiswa->paginate(5, 'mahasiswa');
        }
        $data['mahasiswa'] = $mahasiswa->paginate(5); // ubah self

        $data = [
            'title' => 'Mahasiswa',
            'mahasiswa' => $result,
            'pager' => $mahasiswa->pager,
            'keyword' => $keyword
        ];
        return view('mahasiswa/index', $data);
    }
    public function detail($nim)
    {
        $mahasiswa = new MahasiswaModel();
        //cek jika  ada data
        if (empty($mahasiswa->where('nim', $nim)->first())) {
            return redirect()->to('mahasiswa');
        }
        $data = [
            'title' => 'Mahasiswa',
            'mahasiswa' => $mahasiswa->where('nim', $nim)->first()
        ];
        return view('mahasiswa/detail', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Mahasiswa'
        ];
        return view('mahasiswa/create', $data);
    }
    public function save()
    {
        $mahasiswa = new MahasiswaModel();
        $rules = [
            'nim' => [
                'rules' => 'required|min_length[7]|is_unique[mahasiswas.nim]',
                'errors' => [
                    'required' => '{field} wajib diisi*',
                    'min_length' => '{field} minimal 7 karakter',
                    'is_unique' => '{field} tersebut sudah digunakan'


                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi*',

                ]
            ],
            'prodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi*',

                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi*',

                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi*',
                ]

            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,2048]|mime_in[foto,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Wajib upload foto*',
                    'max_size' => 'File Maksimal 2 MB*',
                    'mime_in' => 'File harus berupa gambar/foto'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();

        $foto->move('img', $namaFoto);

        $mahasiswa->save([
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'foto' => $namaFoto

        ]);

        session()->setFlashdata('success', 'Berhasil Menambahkan Data');
        return redirect()->to('mahasiswa');
    }
    public function delete($nim)
    {
        $mahasiswa = new MahasiswaModel();
        $mahasiswa->where('nim', $nim)->delete();

        // session()->setFlashdata('success', 'Berhasil Menghapus Data');
        return redirect()->to('mahasiswa')->with('success', 'Berhasil Menghapus Data');
    }

    public function edit($nim)
    {
        $mahasiswa = new MahasiswaModel();

        $data = [
            'title' => 'Mahasiswa',
            'mahasiswa' => $mahasiswa->where('nim', $nim)->first()
        ];
        return view('mahasiswa/edit', $data);
    }
    public function update($nim)
    {
        $mahasiswa = new MahasiswaModel();
        $rules = [
            'nim' => [
                'rules' => 'required|min_length[7]',
                'errors' => [
                    'required' => '{field} wajib diisi*',
                    'min_length' => '{field} minimal 7 karakter'


                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi*',

                ]
            ],
            'prodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi*',

                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi*',

                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi*',

                ]
            ]
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
        $mahasiswa->where('nim', $nim)->update(null, $this->request->getPost());
        return redirect()->to('mahasiswa')->with('success', 'Data Berhasil Diubah');
    }
}
