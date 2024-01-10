<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h2>
            <b>Data Jenis Obat</b>
        </h2>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <div class="content">

        <a href="<?= base_url(); ?>Jenisobatcontroller/tambah" class="btn btn-primary" style="margin-bottom:3rem;">Tambah Data</a>

        <div class="box mt-5">
            <div class="box-header">
                <h3 class="box-title">Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jenis Obat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($jenis as $data) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['nama_jenis_obat']; ?></td>
                                <td>
                                    <a href="<?= base_url() ?>jenisobatcontroller/edit/<?= $data['id_jenis_obat']; ?>" class="btn btn-primary">Edit</a>
                                    <a href=" javascript:void(0);" onclick="confirmDelete(<?= $data['id_jenis_obat']; ?>)" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <?php

        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success" id="success-message">' . $this->session->flashdata('success') . '</div>';
        }
        if ($this->session->flashdata('flash')) {
            echo '<div class="alert alert-danger" id="flash-message">' . $this->session->flashdata('flash') . '</div>';
        }
        ?>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function confirmDelete(id) {
        Swal.fire({
            title: 'apakah anda yakin?',
            text: 'Data yang dihapus akan hilang!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: "No, cancel it!",
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.href = "<?= base_url() ?>jenisobatcontroller/hapus/" + id;
            }
        });
    }


    $(document).ready(function() {

        setTimeout(function() {
            $("#success-message").fadeOut("slow");
        }, 1000);
        setTimeout(function() {
            $("#flash-message").fadeOut("slow");
        }, 1000);
    });
</script>