<?php $this->load->view('head'); ?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php
                $data = $this->session->flashdata('sukses');
                if ($data != "") { ?>
                    <div id="notifikasi" class="alert alert-success"><strong> Sukses! </strong> <?= $data; ?></div>
                <?php } ?>
                <?php
                $data2 = $this->session->flashdata('error');
                if ($data2 != "") { ?>
                    <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?= $data2; ?></div>
                <?php } ?>
                <p></p>
                <section class="panel">
                    <header class="panel-heading">
                        Data Pasien
                        <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah Pasien </a></div>
                        <br>
                    </header>
                    <div></div>
                    <div class="panel-body table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>
                                        <center>Nama Pasien</center>
                                    </th>
                                    <th>
                                        <center>Alamat</center>
                                    </th>
                                    <th>
                                        <center>No KTP</center>
                                    </th>
                                    <th>
                                        <center>No HP</center>
                                    </th>
                                    <th>
                                        <center>Email</center>
                                    </th>
                                    <th>
                                        <center>Aksi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="show_data">
                                <?php $i = 1;
                                foreach ($all as $row) { ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row->nama_pasien; ?></td>
                                        <td><?php echo $row->alamat_pasien; ?></td>
                                        <td><?php echo $row->noktp_pasien; ?></td>
                                        <td><?php echo $row->nohp_pasien; ?></td>
                                        <td><?php echo $row->email_pasien; ?></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-edit<?= $row->id_pasien; ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a href="<?php echo site_url('pasien/hapus/' . $row->id_pasien); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $row->nama_pasien; ?> ?');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Tambah Pasien</h3>
                </div>
                <form class="form-horizontal" action="<?php echo base_url('pasien/tambah_proses'); ?>" method="POST" role="form">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Nama Pasien</center>
                            </label>
                            <div class="col-xs-9">
                                <input name="nama_pasien" class="form-control" type="text" placeholder="Nama Pasien" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Alamat</center>
                            </label>
                            <div class="col-xs-9">
                                <textarea class="form-control" name="alamat_pasien" rows="2" style="width:335px;" required=""></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>No KTP</center>
                            </label>
                            <div class="col-xs-9">
                                <input name="noktp_pasien" class="form-control" type="number" placeholder="No KTP" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>No HP</center>
                            </label>
                            <div class="col-xs-9">
                                <input name="nohp_pasien" class="form-control" type="number" placeholder="No HP" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Email</center>
                            </label>
                            <div class="col-xs-9">
                                <input name="email_pasien" class="form-control" type="text" placeholder="Email" style="width:335px;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info" id="btn_simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <?php $no = 0;
    foreach ($all as $row) : $no++; ?>
        <div class="modal fade" id="modal-edit<?= $row->id_pasien; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Data Pasien</h3>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url('pasien/edit_proses'); ?>" method="POST" role="form">
                        <div class="row">
                            <div class="modal-body">

                                <div class="form-group">
                                    <div class="col-xs-9">
                                        <input value="<?= $row->id_pasien; ?>" name="id_pasien" class="form-control" type="hidden" placeholder="Id Pasien" style="width:335px;" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Nama Pasien</label>
                                    <div class="col-xs-9">
                                        <input value="<?= $row->nama_pasien; ?>" name="nama_pasien" class="form-control" type="text" placeholder="Nama Pasien" style="width:335px;" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Alamat</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <textarea class="form-control" name="alamat_pasien" rows="2" style="width:335px;" required=""><?php echo $row->alamat_pasien; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>No KTP</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <input value="<?= $row->noktp_pasien; ?>" name="noktp_pasien" class="form-control" type="number" placeholder="No KTP" style="width:335px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>No HP</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <input value="<?= $row->nohp_pasien; ?>" name="nohp_pasien" class="form-control" type="number" placeholder="No HP" style="width:335px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Email</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <input value="<?= $row->email_pasien; ?>" name="email_pasien" class="form-control" type="text" placeholder="Email" style="width:335px;">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!--END MODAL EDIT-->
    <div class="footer-main">
        Developed by <a href="#" target="">ClemPHC</a> &copy; <?php echo date('Y'); ?>
    </div>
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php $this->load->view('foot'); ?>