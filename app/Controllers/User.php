<?php

namespace App\Controllers;

use App\Models\Pengajuan_Model;
use CodeIgniter\Controller;

class User extends Controller
{
    public function dashboard()
    {
        // Tampilkan view dashboard
        return view('user/dashboard');
    }

    public function pengajuanProker()
    {
        return view('user/pengajuanProker');
    }

    public function submitPengajuanProker()
    {
        // Proses submit pengajuan program kerja
        $model = new Pengajuan_Model();

        $db = \Config\Database::connect();

        $data = [
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'tujuan' => $this->request->getPost('tujuan'),
            'target' => $this->request->getPost('target'),
            'nama_penanggung_jawab' => $this->request->getPost('nama_penanggung_jawab'),
            'email_penanggung_jawab' => $this->request->getPost('email_penanggung_jawab'),
            'telepon_penanggung_jawab' => $this->request->getPost('telepon_penanggung_jawab'),
            'anggaran' => $this->request->getPost('anggaran')
        ];

        $db->table('pengakuan_proker')->insert($data);

        return redirect()->to('/user/dashboard');
    }

}

?>