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
                        Data Riwayat Pasien
                        <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah Riwayat</a>
                    </header>
                    <div class="panel-body table-responsive">
                        <table class="table table-hover" id="myTable1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>
                                        <center>Nama Pasien</center>
                                    </th>
                                    <th>
                                        <center>Tanggal</center>
                                    </th>
                                    <th>
                                        <center>Nama User</center>
                                    </th>
                                    <th>
                                        <center>Sakit</center>
                                    </th>
                                    <th>
                                        <center>Obat</center>
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
                                        <td><?php echo $row->tanggal; ?></td>
                                        <td><?php echo $row->nama_riwayat; ?></td>
                                        <td><?php echo $row->sakit; ?></td>
                                        <td><?php echo $row->obat; ?></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-edit<?= $row->id_riwayat; ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a href="<?php echo site_url('riwayat/hapus/' . $row->id_riwayat); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $row->nama_pasien; ?> ?');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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
                    <h3 class="modal-title" id="myModalLabel">Tambah Riwayat</h3>
                </div>
                <form class="form-horizontal" action="<?php echo base_url('riwayat/tambah_proses'); ?>" method="POST" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Nama Pasien</center>
                            </label>
                            <div class="col-xs-9">
                                <select class="form-control" name="id_pasien" style="width:335px;">
                                    <option>Pilih Pasien</option>
                                    <?php
                                    $pasien = $this->db->get('tbl_pasien');
                                    foreach ($pasien->result() as $key => $value) {
                                        echo "<option value=" . $value->id_pasien . ">" . $value->nama_pasien . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Tanggal</center>
                            </label>
                            <div class="col-xs-9">
                                <div class="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" data-date-format="yyyy-mm-dd" type="date" name="tanggal" placeholder="Tanggal" required style="width:335px" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Nama User</center>
                            </label>
                            <div class="col-xs-9">
                                <input class="form-control" type="text" placeholder="<?php echo $this->session->userdata('nama_dokter'); ?>" style="width:335px;" required readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Sakit</center>
                            </label>
                            <div class="col-xs-9">
                                <input name="sakit" class="form-control" type="text" placeholder="Sakit" style="width:335px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">
                                <center>Obat</center>
                            </label>
                            <div class="col-xs-9">
                                <input name="obat" class="form-control" type="text" placeholder="Obat" style="width:335px;">
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
    <?php $no = 0;
    foreach ($all as $row) : $no++; ?>
        <div class="modal fade" id="modal-edit<?= $row->id_riwayat; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Riwayat</h3>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url('riwayat/edit_proses'); ?>" method="POST" role="form">
                        <div class="row">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-xs-9">
                                        <input value="<?= $row->id_riwayat; ?>" name="id_riwayat" class="form-control" type="hidden" placeholder="Id User" style="width:335px;" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Nama Pasien</label>
                                    <div class="col-xs-9">
                                        <select class="form-control" name="id_pasien" style="width:335px;">
                                            <option>Pilih Pasien</option>
                                            <?php
                                            $pasien = $this->db->get('tbl_pasien');
                                            foreach ($pasien->result() as $key => $bag) { ?>
                                                <option value="<?php echo $bag->id_pasien; ?>" <?php if ($row->id_pasien == $bag->id_pasien) {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                                    <?php echo $bag->nama_pasien; ?>
                                                </option>;
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Tanggal</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <div class="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" data-date-format="yyyy-mm-dd" type="date" name="tanggal" value="<?= $row->tanggal; ?>" placeholder="Tanggal" required style="width:335px" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Nama User</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <input class="form-control" type="text" placeholder="<?php echo $this->session->userdata('nama_dokter'); ?>" style="width:335px;" required readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Sakit</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <input value="<?= $row->sakit; ?>" name="sakit" class="form-control" type="text" placeholder="Sakit" style="width:335px;" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">
                                        <center>Obat</center>
                                    </label>
                                    <div class="col-xs-9">
                                        <input value="<?= $row->obat; ?>" name="obat" class="form-control" type="text" placeholder="Obat" style="width:335px;">
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
    <div class="footer-main">
        Developed by <a href="#" target="">ClemPHC</a> &copy; <?php echo date('Y'); ?>
    </div>
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<?php $this->load->view('foot'); ?>