<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h2>
            <b>Data User</b>
        </h2>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <div class="content">

        <a href="<?= base_url(); ?>usercontroller/tambah" class="btn btn-primary" style="margin-bottom:3rem;">Tambah Data</a>

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
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Is Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($user as $data) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['username']; ?></td>
                                <td><?= $data['fullname']; ?></td>
                                <td><?= $data['is_active']; ?></td>
                                <td>
                                    <a href="<?= base_url() ?>usercontroller/edit/<?= $data['id_user']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?= $data['id_user']; ?>)" class=" btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <?php
        // Check if a success flash message exists
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
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed, redirect to the delete action
                window.location.href = "<?= base_url() ?>usercontroller/hapus/" + id;
            }
        });
    }


    $(document).ready(function() {

        setTimeout(function() {
            $("#success-message").fadeOut("slow");
        }, 1000); // 3000 milliseconds = 3 seconds
        setTimeout(function() {
            $("#flash-message").fadeOut("slow");
        }, 1000); // 3000 milliseconds = 3 seconds
    });
</script>