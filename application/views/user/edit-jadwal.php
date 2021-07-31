<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <form action="<?= base_url('user/editjadwal'); ?>" method="post">
        <div class="modal-body">
            <div class="form-group">
                <label>Kode Matakuliah</label>
                <input type="text" class="form-control" id="kodemtk" name="kodemtk" placeholder="" value="<?= $jadwal['kodemtk']; ?>" required readonly>
            </div>
            <div class="form-group">
                <label>Nama Matakuliah</label>
                <input type="text" class="form-control" id="namamtk" name="namamtk" placeholder="" value="<?= $jadwal['namamtk']; ?>" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Nama Dosen</label>
                <input type="text" class="form-control" id="namadosen" name="namadosen" placeholder="" value="<?= $jadwal['namadosen']; ?>" required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="form-label">Hari</label>
                <select class="required form-select" name="hari" id="hari" value="<?= $jadwal['hari']; ?>" required>
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
                <input type="time" class="form-control" id="mulai" name="mulai" placeholder="" value="<?= $jadwal['mulai']; ?>" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Selesai</label>
                <input type="time" class="form-control" id="selesai" name="selesai" placeholder="" value="<?= $jadwal['selesai']; ?>" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Fakultas</label>
                <select class="required form-select" name="fakultas" id="fakultas" value="<?= $jadwal['fakultas']; ?>" required>
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
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>