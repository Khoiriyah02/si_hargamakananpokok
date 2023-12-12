<?php

namespace Master;

use Config\Query_builder;

class tpi
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('tpi')->get()->resultArray();
        $res = ' <a href="?target=tpi&act=tambah_tpi" class="btn btn-info btn-sm">Tambah tpi</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="100">' . $r['nip'] . '</td>
                    <td>' . $r['nama'] . '</td>
                   
                    <td width="150">
                        <a href="?target=tpi&act=edit_tpi&id=' . $r['nip'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=tpi&act=delete_tpi&id=' . $r['nip'] . '" class="btn btn-danger btn-sm">
                            Hapus
                        </a>
                    </td>
                </tr>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<a href="?target=tpi" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=tpi&act=simpan_tpi" method="post">
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                  
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];

        $data = array(
            'nip' => $nip,
            'nama' => $nama,
        );
        return $this->db->table('tpi')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('tpi')->where("nip='$id'")->get()->rowArray();

        $res = '<a href="?target=tpi" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=tpi&act=update_tpi" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['nip'] . '">
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="' . $r['nip'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="' . $r['nama'] . '">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>';
        return $res;
    }

    public function cekRadio($val1, $val2)
    {
        if ($val1 == $val2) {
            return "checked";
        }
        return "";
    }

    public function update()
    {
        $param = $_POST['param'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];

        $data = array(
            'nip' => $nip,
            'nama' => $nama,
        );

        return $this->db->table('tpi')->where("nip='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('tpi')->where("nip='$id'")->delete();
    }
}
