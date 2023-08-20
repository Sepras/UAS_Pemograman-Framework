<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengajuan_Model extends Model
{
    protected $table = 'pengajuan_proker';
    protected $allowedFields = ['nama_kegiatan', 'tujuan', 'target', 'nama_penanggung_jawab', 'email_penanggung_jawab', 'telepon_penanggung_jawab', 'anggaran'];

}

