<?php $this->load->view('head'); ?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php
                $data = $this->session->flashdata('sukses');
                if ($data != "") { ?>
                    <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
                <?php } ?>
                <?php
                $data2 = $this->session->flashdata('error');
                if ($data2 != "") { ?>
                    <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?= $data2; ?></div>
                <?php } ?>
                <p></p>
                <section class="panel">
                    <header class="panel-heading">
                        Data User
                        <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah User</a></div>
                    </header>
                    <div class="panel-body table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>
                                        <center>Nama User</center>
                                    </th>
                                    <th>
                                        <center>Alamat</center>
                                    </th>
                                    <th>
                                        <center>Email</center>
                                    </th>
                                    <th>
                                        <center>No HP</center>
                                    </th>
                                    <th>
                                        <center>Jabatan</center>
                                    </th>
                                    <th>
                                        <center>Role</center>
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
                                        <td><?php echo $row->nama_dokter; ?></td>
                                        <td><?php echo $row->alamat; ?></td>
                                        <td><?php echo $row->email; ?></td>
                                        <td><?php echo $row->hp; ?></td>
                                        <td><?php echo $row->jabatan; ?></td>
                                        <td><?php echo $row->role; ?></td>
                                        <td>
                                            <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-edit<?= $row->id_dokter; ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="<?php echo site_url('user/hapus/' . $row->id_dokter); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $row->nama_dokter; ?> ?');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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
                    <h3 class="modal-title" id="myModalLabel">Tambah User</h3>
                </div>
                <form class="form-horizontal" action="<?php echo base_url('user/tambah_proses'); ?>" method="POST" role="form">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Nama User</center>
                            </label>
                            <div class="col-xs-9">
                                <input name="nama_dokter" id="nama_dokter" class="form-control" type="text" placeholder="Nama User" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Alamat</center>
                            </label>
                            <div class="col-xs-9">
                                <textarea class="form-control" name="alamat" rows="2" style="width:335px;" required=""></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Email</center>
                            </label>
                            <div class="col-xs-9">
                                <input name="email" id="email" class="form-control" type="text" placeholder="Email" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Password</center>
                            </label>
                            <div class="col-xs-9">
                                <input name="password" class="form-control" type="password" placeholder="Password" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>No HP</center>
                            </label>
                            <div class="col-xs-9">
                                <input name="hp" class="form-control" type="number" placeholder="No HP" style="width:335px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Jabatan</center>
                            </label>
                            <div class="col-xs-9">
                                <select class="form-control" name="jabatan" style="width:335px;">
                                    <option>Pilih Jabatan</option>
                                    <option value="dokter">Dokter</option>
                                    <option value="perawat">Perawatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Role</center>
                            </label>
                            <div class="col-xs-9">
                                <select class="form-control" name="role" style="width:335px;">
                                    <option>Pilih Role</option>
                                    <option value="dokter">Dokter</option>
                                    <option value="perawat">Perawat</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <?php $no = 0;
    foreach ($all as $row) : $no++; ?>
        <div class="modal fade" id="modal-edit<?= $row->id_dokter; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit User</h3>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url('user/edit_proses'); ?>" method="POST" role="form">
                        <div class="row">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-xs-9">
                                        <input value="<?= $row->id_dokter; ?>" name="id_dokter" class="form-control" type="hidden" placeholder="Id User" style="width:335px;" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Nama User</label>
                                    <div class="col-xs-9">
                                        <input value="<?= $row->nama_dokter; ?>" name="nama_dokter" class="form-control" type="text" placeholder="Nama User" style="width:335px;" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Alamat</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <textarea class="form-control" name="alamat" rows="2" style="width:335px;" required=""><?php echo $row->alamat; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Email</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <input value="<?= $row->email; ?>" name="email" class="form-control" type="text" placeholder="Email" style="width:335px;" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Password Lama</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <input name="passLama" class="form-control" type="password" placeholder="Password Lama" style="width:335px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Password Baru</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <input name="passBaru" class="form-control" type="password" placeholder="Password Baru" style="width:335px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Konfirmasi Password</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <input name="passKonf" class="form-control" type="password" placeholder="Konfirmasi Password" style="width:335px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>No HP</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <input value="<?= $row->hp; ?>" name="hp" class="form-control" type="number" placeholder="HP" style="width:335px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Jabatan</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <select class="form-control" value="<?= $row->jabatan; ?>" name="jabatan" style="width:335px;">
                                            <?php
                                            $selected = $row->jabatan;
                                            $var1 = $selected == "dokter" ? "selected" : "";
                                            $var2 = $selected == "perawat" ? "selected" : "";
                                            echo '<option>Pilih Jenis Jabatan</option>';
                                            echo '<option value="dokter" ' . $var1 . '>Dokter</option>';
                                            echo '<option value="perawat" ' . $var2 . '>Perawatan</option>';
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Role</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <select class="form-control" value="<?= $row->role; ?>" name="role" style="width:335px;">
                                            <?php
                                            $selected = $row->role;
                                            $var1 = $selected == "dokter" ? "selected" : "";
                                            $var2 = $selected == "perawat" ? "selected" : "";
                                            echo '<option>Pilih Role</option>';
                                            echo '<option value="dokter" ' . $var1 . '>Dokter</option>';
                                            echo '<option value="perawat" ' . $var2 . '>Perawat</option>';
                                            ?>
                                        </select>
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

    <!--MODAL HAPUS-->
    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus User</h4>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <input type="hidden" name="id_dokter" id="textid_dokter" value="">
                        <p>Apakah Anda yakin mau memhapus ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL HAPUS-->
    <div class="footer-main">
        Developed by <a href="#" target="">ClemPHC</a> &copy; <?php echo date('Y'); ?>
    </div>
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php $this->load->view('foot'); ?>