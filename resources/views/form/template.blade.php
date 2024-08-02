<!DOCTYPE html>
<html lang="en">

<head>
    <?= view('shared.headerhead'); ?>
</head>
<style>
    @media screen and (max-width: 600px) {
        table {
            display: block;
            overflow-x: auto;
        }
    }
</style>

<body>
    <?= view('shared.headerbody'); ?>
    <?= view('shared.sidebar', ['sidebar_selected' => 'template']); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Template</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Formulir</a></li>
                    <li class="breadcrumb-item active">Template</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @if (session('action_message'))
            <div class="alert alert-secondary">
                {{ session('action_message') }}
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Template Formulir</h5>
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#form-add">Tambah formulir</button>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jadwal_list as $no => $jadwal): ?>
                                    <tr>
                                        <td>
                                            <?= $jadwal['nama'] ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-data-<?= $no ?>"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-data-<?= $no ?>"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>
            </div>

            <!-- modal crud -->
            <?php foreach ($jadwal_list as $no => $jadwal): ?>

            <!-- edit modal -->
            <div class="modal fade" id="edit-data-<?= $no ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Jadwal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST">
                            <div class="modal-body">
                                <div class="form-group d-none">
                                    <input type="hidden" class="form-control" id="id_jadwal" name="id_jadwal"
                                        value="<?= $jadwal['id_jadwal'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-form-label">Nama Pegawai:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $jadwal['nama'] ?>" disabled>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" name="edit-data">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- delete modal -->
            <div class="modal fade" id="delete-data-<?= $no ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST">
                            <div class="modal-body">
                                <h4>Yakin ingin hapus jadwal?</h4>
                                <div class="form-group d-none">
                                    <label for="id_user" class="col-form-label"></label>
                                    <input type="hidden" class="form-control" id="id_jadwal" name="id_jadwal" value="<?= $jadwal['id_jadwal'] ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger" name="delete-data">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- End Crud Modal -->

            <!-- Add Modal -->
            <div class="modal fade form-data-template" id="form-add" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="d-flex flex-row gap-1">
                                <h5 class="modal-title edit-text rounded" id="form-add-title">Judul Formulir</h5>
                                <i class="bi bi-pencil-fill fs-13px"></i>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('/form/template')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div id="form-add-section">
                                    <div class="form-group my-2 d-flex flex-column" id="form-add-s1">
                                        <div class="align-self-center p-2 shadow-sm rounded mt-4 d-none" id="form-add-s1-image">
                                            <img src="assets/img/qristes.png" alt="">
                                        </div>
                                        <div class="d-flex flex-row gap-1">
                                            <label class="col-form-label edit-text rounded" id="form-add-s1-label" name="none">Text:</label>
                                            <i class="bi bi-pencil-fill mt-1 fs-13px"></i>
                                        </div>
                                        <div class="d-flex flex-row gap-2">
                                            <input type="text" class="form-control" id="form-add-s1-input" value="Hello World" disabled>
                                            <select class="form-control w-50" id="form-add-s1-type" name="none">
                                                <option value="string">String</option>
                                                <option value="number">Number</option>
                                                <option value="file">File</option>
                                                <option value="payment">Payment</option>
                                            </select>
                                            <button type="button" class="btn btn-outline-danger" id="form-add-s1-delete"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <button type="button" class="btn btn-outline-secondary mb-3 w-100" id="form-add-button-add">Add Item</button>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" name="add-data">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- End Add Modal -->
        </section>

    </main><!-- End #main -->
</body>

<?= view('shared.footer')?>

</html>
