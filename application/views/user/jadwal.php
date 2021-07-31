<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg ">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newJadwalModal">Tambah Jadwal</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Matakuliah</th>
                        <th scope="col">Nama Matakuliah</th>
                        <th scope="col">Nama Dosen</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Mulai</th>
                        <th scope="col">Selesai</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jadwal as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $j['kodemtk']; ?></td>
                            <td><?= $j['namamtk']; ?></td>
                            <td><?= $j['namadosen']; ?></td>
                            <td><?= $j['hari']; ?></td>
                            <td><?= $j['mulai']; ?></td>
                            <td><?= $j['selesai']; ?></td>
                            <td><?= $j['fakultas']; ?></td>
                            <td>
                                <a href=" <?= base_url('user/editjadwal/') . $j['kodemtk']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url('user/hapusjadwal/') . $j['kodemtk']; ?>" class="badge badge-danger" onclick="return confirm('yakin?'); ">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newJadwalModal" tabindex="-1" aria-labelledby="newJadwalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newJadwalModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/jadwal'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Matakuliah</label>
                        <input type="text" class="form-control" id="kodemtk" name="kodemtk" placeholder="" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Nama Matakuliah</label>
                        <input type="text" class="form-control" id="namamtk" name="namamtk" placeholder="" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input type="text" class="form-control" id="namadosen" name="namadosen" placeholder="" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Hari</label>
                        <select class="required form-select" name="hari" id="hari" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mulai</label>
                        <input type="time" class="form-control" id="mulai" name="mulai" placeholder="" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Selesai</label>
                        <input type="time" class="form-control" id="selesai" name="selesai" placeholder="" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Fakultas</label>
                        <select class="required form-select" name="fakultas" id="fakultas" required>
                            <option value="FTI">Fakultas Teknologi Informasi</option>
                            <option value="AS">Akademi Sekretari</option>
                            <option value="FEB">Fakultas Ekonomi dan Bisnis</option>
                            <option value="FISIP">Fakultas Ilmu Sosial dan Ilmu Politik</option>
                            <option value="FT">Fakultas Teknik</option>
                            <option value="FIKOM">Fakultas Ilmu Komunikasi</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>