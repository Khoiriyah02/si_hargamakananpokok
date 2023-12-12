<?php

use master\komoditas;
use master\tpid;
use master\tpi;
use master\menu;

include('autoload.php');
include('config/Database.php');

$menu = new menu();
$komoditas = new komoditas($dataKoneksi);
$tpid = new tpid($dataKoneksi);
$tpi = new tpi($dataKoneksi);
// $komoditas->tambah();
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epariani</title>
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> SI HARGA MAKANAN POKOK </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Mymenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggle-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['link']; ?>" class="nav-link">
                                    <?php echo $r['text']; ?>
                            </a>
                        </li>
                    <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>
            <?php
            if (!isset($target)or $target == "home") {
                echo "Hai, Selamat datang di beranda SI HARGA MAKANAN POKOK";
                // ============ start kontent komoditas ======================
            } elseif ($target == "komoditas") {
                if ($act == "tambah_komoditas") {
                    echo $komoditas->tambah();
                } elseif ($act == "simpan_komoditas") {
                    if ($komoditas->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=komoditas';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=komoditas';
                        </script>";
                    } 
                } elseif ($act == "edit_komoditas") {
                    $id = $_GET['id'];
                    echo $komoditas->edit($id);
                } elseif ($act == "update_komoditas") {
                    if ($komoditas->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=komoditas';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=komoditas';
                        </script>";
                    }
                } elseif ($act == "delete_komoditas") {
                    $id = $_GET['id'];
                    if ($komoditas->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=komoditas';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=komoditas';
                        </script>";
                    }
                } else {
                    echo $komoditas->index();
                }
                // ====================== end konten tpid =========================
                
                // tpid
            } elseif ($target == "tpid") {
                if ($act == "tambah_tpid") {
                echo $tpid->tambah();
                } elseif ($act == "simpan_tpid") {
                    if ($tpid->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=tpid';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=tpid';
                        </script>";
                    } 
                } elseif ($act == "edit_tpid") {
                    $id = $_GET['id'];
                    echo $tpid->edit($id);
                } elseif ($act == "update_tpid") {
                    if ($tpid->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=tpid';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=tpid';
                        </script>";
                    }
                } elseif ($act == "delete_tpid") {
                    $id = $_GET['id'];
                    if ($tpid->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=tpid';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=tpid';
                        </script>";
                    }
                } else {
                    echo $tpid->index();
                }

                // tpi
            } elseif ($target == "tpi") {
                if ($act == "tambah_tpi") {
                echo $tpi->tambah();
                } elseif ($act == "simpan_tpi") {
                    if ($tpi->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=tpi';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=tpi';
                        </script>";
                    } 
                } elseif ($act == "edit_tpi") {
                    $id = $_GET['id'];
                    echo $tpi->edit($id);
                } elseif ($act == "update_tpi") {
                    if ($tpi->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=tpi';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=tpi';
                        </script>";
                    }
                } elseif ($act == "delete_tpi") {
                    $id = $_GET['id'];
                    if ($tpi->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=tpi';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=tpi';
                        </script>";
                    }
                } else {
                    echo $tpi->index();
                }


                // no page
            } else {
                echo "Page 404 Not found";
            }
            ?>

        </div>
    </div>

</body>

</html>