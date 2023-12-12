<?php

namespace Master;

use Config\Query_builder;

class komoditas
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('komoditas')->get()->resultArray();
        $res = ' <a href="?target=komoditas&act=tambah_komoditas" class="btn btn-info btn-sm">Tambah komoditas</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="300">' . $r['jenis'] . '</td>
                    <td>' . $r['nama'] . '</td>
                    <td width="300">' . $r['harga'] . '</td>
                    <td width="150">
                        <a href="?target=komoditas&act=edit_komoditas&id=' . $r['jenis'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=komoditas&act=delete_komoditas&id=' . $r['jenis'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=komoditas" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=komoditas&act=simpan_komoditas" method="post">
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>
                  
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $jenis = $_POST['jenis'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];

        $data = array(
            'jenis' => $jenis,
            'nama' => $nama,
            'harga' => $harga,
        );
        return $this->db->table('komoditas')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('komoditas')->where("jenis='$id'")->get()->rowArray();

        $res = '<a href="?target=komoditas" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=komoditas&act=update_komoditas" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['jenis'] . '">
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="' . $r['jenis'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="' . $r['nama'] . '">
                    </div>
                    <div class="mb-3">
                    <label for="Harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="' . $r['harga'] . '">
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
        $jenis = $_POST['jenis'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];

        $data = array(
            'jenis' => $jenis,
            'nama' => $nama,
            'harga' => $harga,
        );

        return $this->db->table('komoditas')->where("jenis='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('komoditas')->where("jenis='$id'")->delete();
    }
}
