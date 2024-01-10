<div class="content-wrapper">
    <div class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Fullname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Is Active</label>
                        <select class="form-control" name="is_active">
                            <option value="ya">YA</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
        <?php
        // Check if a success flash message exists
        if ($this->session->flashdata('failed')) {
            echo '<div class="alert alert-danger" id="failed-message">' . $this->session->flashdata('failed') . '</div>';
        }
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Automatically hide the success message after 3 seconds
        setTimeout(function() {
            $("#failed-message").fadeOut("slow");
        }, 1000); // 3000 milliseconds = 3 seconds
    });
</script>