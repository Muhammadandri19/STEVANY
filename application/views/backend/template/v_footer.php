<footer class="main-footer">

    <strong>
        Copyright &copy; <?= date('Y'); ?>
        Wisata Magelang.
    </strong>

    All rights reserved.

</footer>

</div>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>

<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>

<script src="<?= base_url('assets/plugins/toastr/toastr.min.js'); ?>"></script>

<script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>

<?php
$controller = strtolower($this->router->fetch_class());
?>

<script src="<?= base_url('assets/dist/js/' . $controller . '.js?v=' . time()); ?>"></script>

<?php if ($this->session->flashdata('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= $this->session->flashdata('success'); ?>'
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '<?= $this->session->flashdata('error'); ?>'
        });
    </script>
<?php endif; ?>

</body>

</html>