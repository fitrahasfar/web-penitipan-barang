<?php

session_start();

include "backend/koneksi.php";
include "backend/hitung-barang.php";

if (!isset($_SESSION['user'])) {
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="assets/css/styleAdmin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Sistem Penitipan Barang</title>

</head>

<body>
    <div class="p-5">
        <br>
        <div class="text-center" id="header-section">
            <h1 id="title-name">Sistem Penitipan Barang</h1>
            <a href="admin.php" class="mr-5" id="home-link">Home</a>
            <a href="backend/cek-logout.php" id="logout-link">Logout</a>
        </div>
        <div class="row g-3 mt-4 mb-4 justify-content-center">
            <div class="col-sm-6 col-md-3">
                <div class="card text-center shadow-sm border-0 small-card">
                    <div class="card-body py-3 px-2">
                        <h6 class="text-muted mb-1">Total Penitipan Barang</h6>
                        <h4 class="fw-semibold text-primary m-0"><?= $cBarang ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card text-center shadow-sm border-0 small-card">
                    <div class="card-body py-3 px-2">
                        <h6 class="text-muted mb-1">Total Barang Disimpan</h6>
                        <h4 class="fw-semibold text-success m-0"><?= $cSimpan ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card text-center shadow-sm border-0 small-card">
                    <div class="card-body py-3 px-2">
                        <h6 class="text-muted mb-1">Total Barang Diambil</h6>
                        <h4 class="fw-semibold text-danger m-0"><?= $cAmbil ?></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barang Tersimpan -->
        <div class="card mb-5">
            <div class="card-body">
                <div class="card-title text-center" id="header-daftar-barang">
                    <h2>Daftar Penitipan Barang</h2>
                </div>
                <!-- Button Modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalInput">
                    Tambah Barang
                </button>
                <!-- Button Modal -->
                <table id="tbTitip" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Rak</th>
                            <th>Tanggal Titip</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query_select = mysqli_query($connect, "SELECT * from tbarang WHERE status = 'Disimpan' ORDER BY tggl_titip DESC");
                        while ($data = mysqli_fetch_array($query_select)):
                        ?>

                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['nama_pelanggan']; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['jenis_barang']; ?></td>
                                <td><?php echo $data['tempat']; ?></td>
                                <td><?php echo $data['tggl_titip']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                                <td class="text-nowrap text-center">
                                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAmbil<?= $no ?>">Ambil</a>
                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate<?= $no ?>">Update</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $no ?>">Hapus</a>
                                </td>
                            </tr>

                            <!-- Modal Data Ambil Barang -->
                            <div class="modal fade" id="modalAmbil<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengembalian Barang</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="backend/cek-crud.php" method="post">
                                            <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>">
                                            <input type="hidden" name="tggl_ambil" value="<?php echo date('Y-m-d'); ?>">
                                            <div class="modal-body">
                                                <h6 class="text-center">
                                                    Konfirmasi Pengembalian Barang ini?
                                                    <br>
                                                    <span class="text-primary"><?= $data['nama_pelanggan'] ?> - <?= $data['nama_barang'] ?></span>
                                                    <h6 />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary" name="confirmData">Konfirmasi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Data Ambil Barang -->

                            <!-- Modal Update Data Barang -->
                            <div class="modal fade" id="modalUpdate<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Data Penitipan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="backend/cek-crud.php" method="post">
                                            <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                                    <input type="text" required class="form-control" name="nama_pelanggan" value="<?= $data['nama_pelanggan'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                                    <input type="text" required class="form-control" name="nama_barang" value="<?= $data['nama_barang'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jenis_barang" class="form-label">Jenis Barang</label>
                                                    <select class="form-select" required aria-label="Default select example" name="jenis_barang">
                                                        <option value="<?= $data['jenis_barang'] ?>"><?= $data['jenis_barang'] ?></option>
                                                        <option value="Elektronik">Elektronik</option>
                                                        <option value="Non-Elektronik">Non-Elektronik</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tempat" class="form-label">Tempat Penyimpanan</label>
                                                    <select class="form-select" required aria-label="Default select example" name="tempat">
                                                        <option value="<?= $data['tempat'] ?>"><?= $data['tempat'] ?></option>
                                                        <option value="Rak 1">Rak 1</option>
                                                        <option value="Rak 2">Rak 2</option>
                                                        <option value="Rak 3">Rak 3</option>
                                                        <option value="Rak 4">Rak 4</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tggl_titip" class="form-label">Tanggal Titip</label>
                                                    <input type="date" class="form-control" required name="tggl_titip" value="<?= $data['tggl_titip'] ?>">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary" name="updateData">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Update Data Barang -->

                            <!-- Modal Hapus Data Barang -->
                            <div class="modal fade" id="modalDelete<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data Penitipan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="backend/cek-crud.php" method="post">
                                            <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>">
                                            <div class="modal-body">
                                                <h6 class="text-center">
                                                    Apakah anda ingin menghapus data ini?
                                                    <br>
                                                    <span class="text-danger"><?= $data['nama_pelanggan'] ?> - <?= $data['nama_barang'] ?></span>
                                                    <h6 />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger" name="deleteData">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Hapus Data Barang -->

                        <?php
                            $no++;
                        endwhile;
                        ?>
                    </tbody>
                </table>

                <!-- Modal Input Data barang -->
                <div class="modal fade" id="modalInput" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Penitipan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="backend/cek-crud.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                        <input type="text" required class="form-control" name="nama_pelanggan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                        <input type="text" required class="form-control" name="nama_barang">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_barang" class="form-label">Jenis Barang</label>
                                        <select class="form-select" required aria-label="Default select example" name="jenis_barang">
                                            <option selected value="Elektronik">Elektronik</option>
                                            <option value="Non-Elektronik">Non-Elektronik</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tempat" class="form-label">Tempat Penyimpanan</label>
                                        <select class="form-select" required aria-label="Default select example" name="tempat">
                                            <option selected value="Rak 1">Rak 1</option>
                                            <option value="Rak 2">Rak 2</option>
                                            <option value="Rak 3">Rak 3</option>
                                            <option value="Rak 4">Rak 4</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tggl_titip" class="form-label">Tanggal Titip</label>
                                        <input type="date" class="form-control" required name="tggl_titip" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary" name="inputData">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Input Data barang -->

            </div>
        </div>

        <!-- Barang DIambil -->
         <div class="card">
            <div class="card-body">
                <div class="card-title text-center" id="header-daftar-barang">
                    <h2>Daftar Barang yang Telah Dikembalikan</h2>
                </div>
                <table id="tbAmbil" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Tanggal Titip</th>
                            <th>Tanggal Ambil</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query_select = mysqli_query($connect, "SELECT * from tbarang WHERE status = 'Diambil' ORDER BY tggl_titip DESC");
                        while ($data = mysqli_fetch_array($query_select)):
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['nama_pelanggan']; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['jenis_barang']; ?></td>
                                <td><?php echo $data['tggl_titip']; ?></td>
                                <td><?php echo $data['tggl_ambil']; ?></td>
                                <td><a href="#" class="btn btn-sm btn-success"><?php echo $data['status']; ?></a></td>
                            </tr>
                        <?php
                            $no++;
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#tbTitip').DataTable({
                pageLength: 5,
                lengthChange: false,
                pagingType: "simple",
                language: {
                    search: "Cari:",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    }
                }
            });

            $('#tbAmbil').DataTable({
                pageLength: 5,
                lengthChange: false,
                pagingType: "simple",
                language: {
                    search: "Cari:",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    }
                }
            })
        });
    </script>
    <footer class="admin-footer">
        <p>&copy; 2025 | Sistem Penitipan Barang</p>
    </footer>
</body>
</html>