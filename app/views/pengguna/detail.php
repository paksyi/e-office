<div class="mx-auto">
    <!-- Masukkan data -->
    <div class="card">
        <div class="card-header">
            <?= $data['judul']; ?>
        </div>
        <div class="card-body">
            <!-- Pesan Notifikasi -->
            <div class="col-12">
                <?php Flasher::flash(); ?>
            </div>

            <form action="<?= BASEURL; ?>/Pengguna/update" method="POST">
            <input type="hidden" name="id_pengguna" id="id_pengguna" value="<?= $data['pengguna']['id_pengguna']; ?>">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['pengguna']['nama']; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="unit" class="col-sm-2 col-form-label">Unit Kerja</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="unit" name="unit" value="<?= $data['pengguna']['unit']; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jabatan" name="jabatan">
                            <option value="">- Pilih Jabatan -</option>
                            <option value="hs" <?php if($data['pengguna']['jabatan'] == "hs") echo "selected" ?>>Homestaf</option>
                            <option value="ls" <?php if($data['pengguna']['jabatan'] == "ls") echo "selected" ?>>Localstaf</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <a href="<?= BASEURL; ?>/Pengguna" class="btn btn-primary">Kembali</a>
                    <input type="submit" name="ubah" value="Ubah Data" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
