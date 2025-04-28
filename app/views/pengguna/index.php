<div class="mx-auto">
    <!-- Pesan Notifikasi -->
    <div class="col-12">
        <?php Flasher::flash(); ?>
    </div>
    
    <!-- Masukkan data -->
    <div class="card">
        <div class="card-header">
            Daftar <?= $data['judul']; ?> Baru
        </div>
        <div class="card-body">
            <form action="<?= BASEURL; ?>/Pengguna/add" method="POST">
                <div class="mb-3 row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="unit" class="col-sm-2 col-form-label">Unit Kerja</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="unit" name="unit" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jabatan" name="jabatan">
                            <option value="">- Pilih Jabatan -</option>
                            <option value="hs" <?php if($jabatan == "hs") echo "selected" ?>>Homestaf</option>
                            <option value="ls" <?php if($jabatan == "ls") echo "selected" ?>>Localstaf</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    <!-- Pencarian data -->
    <div class="card">
        <div class="card-header">
            Cari <?= $data['judul']; ?>
        </div>
        <div class="card-body">
            <form action="<?= BASEURL; ?>/Pengguna/search" method="POST">
                <div class="row">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Ketik kata kunci.." value="">
                    </div>
                </div>
                <div>
                    <div class="col-sm-5">
                        <input type="submit" name="cari" value="Cari" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tampilkan data -->
    <div class="card">
        <div class="card-header text-white bg-secondary">
            Data <?= $data['judul']; ?>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Unit Kerja</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    <tbody>
                    <?php $urut = 1; 
                        foreach( $data['pengguna'] as $user ) : ?>
                        <tr>
                        <a href="<?= BASEURL; ?>/Pengguna/detail/<?= $user['id_pengguna']; ?>">
                            <th scope="row"><a href="<?= BASEURL; ?>/Pengguna/detail/<?= $user['id_pengguna']; ?>" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover"><?= $urut++; ?></a></th>
                            <td scope="row"><a href="<?= BASEURL; ?>/Pengguna/detail/<?= $user['id_pengguna']; ?>" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover"><?= $user['nama']; ?></a></td>
                            <td scope="row"><a href="<?= BASEURL; ?>/Pengguna/detail/<?= $user['id_pengguna']; ?>" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover"><?= $user['unit']; ?></a></td>
                            <td scope="row"><a href="<?= BASEURL; ?>/Pengguna/detail/<?= $user['id_pengguna']; ?>" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover"><?= $user['jabatan']; ?></a></td>
                            <td scope="row"><a href="<?= BASEURL; ?>/Pengguna/delete/<?= $user['id_pengguna']; ?>" class="badge text-bg-danger" onclick="return confirm('Anda yakin ingin menghapus <?= $user['nama']; ?>?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>