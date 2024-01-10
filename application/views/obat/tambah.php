<div class="content-wrapper">
    <div class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data</h3>
            </div>
            <form method="POST">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Obat</label>
                        <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat">
                    </div>
                    <div class="form-group">
                        <label>Jenis Obat</label>
                        <select class="form-control" name="id_jenis_obat">
                            <option value="">--PILIH--</option>
                            <?php foreach ($jenis as $data) : ?>
                                <option value="<?= $data['id_jenis_obat']; ?>"><?= $data['nama_jenis_obat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Satuan</label>
                        <input type="text" class="form-control" name="satuan" placeholder="Satuan Obat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="text" class="form-control" name="harga" placeholder="Harga">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stok</label>
                        <input type="text" class="form-control" name="stok" placeholder="Stok Obat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Expired</label>
                        <input type="date" class="form-control" name="tanggal_exp" placeholder="Tanggal Exp">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>