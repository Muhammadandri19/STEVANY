<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Profil Saya</h1>
        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form action="<?= base_url('profil/update'); ?>"
                        method="post"
                        enctype="multipart/form-data">

                        <div class="text-center mb-4">

                            <img src="<?= base_url('uploads/pengguna/' . $profil->pengguna_foto); ?>"
                                width="150"
                                class="img-thumbnail">

                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>

                            <input type="text"
                                name="pengguna_nama"
                                value="<?= $profil->pengguna_nama; ?>"
                                class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Username</label>

                            <input type="text"
                                name="pengguna_username"
                                value="<?= $profil->pengguna_username; ?>"
                                class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>

                            <input type="email"
                                name="pengguna_email"
                                value="<?= $profil->pengguna_email; ?>"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Foto Profil</label>

                            <input type="file"
                                name="pengguna_foto"
                                class="form-control">
                        </div>

                        <button type="submit"
                            class="btn btn-primary">

                            Update Profil

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>

</div>