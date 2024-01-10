<div class="content-wrapper">
    <div class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Jenis Obat</label>
                        <input type="hidden" name="id_jenis_obat" value="<?= $jenis['id_jenis_obat']; ?>">
                        <input type="text" class="form-control" name="nama_jenis_obat" value="<?= $jenis['nama_jenis_obat']; ?>">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>