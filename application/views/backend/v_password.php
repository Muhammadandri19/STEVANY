<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Ganti Password</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Ganti Password</h3>
                </div>

                <div class="card-body">

                    <form action="<?= base_url('index.php/password/update'); ?>" method="post">

                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" name="password_lama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="konfirmasi_password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">
                            Simpan Password
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </section>

</div>