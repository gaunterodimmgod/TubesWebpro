<?php $this->load->view('head'); ?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo $this->session->flashdata('pesan'); ?>
                <p></p>
                <section class="panel">
                    <header class="panel-heading">
                        Master Data History
                    </header>
                    <form method="get" action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <select class="form-control" style="width:235px;" id="nama_pasien" name="nama_pasien">
                                        <option>Pilih Pasien</option>
                                        <?php
                                        $pasien = $this->db->get('tbl_pasien');
                                        foreach ($pasien->result() as $key => $value) {
                                            echo "<option value=" . $value->id_pasien . ">" . $value->nama_pasien . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" value="Tampilkan" class="btn btn-success" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="panel-body table-responsive">
                        <table id="myTable" class="table table-hover">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($history as $p) { ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $p->nama_pasien; ?></td>
                                        <td><?php echo $p->tanggal; ?></td>
                                        <td><?php echo $p->nama_riwayat; ?></td>
                                        <td><?php echo $p->sakit; ?></td>
                                        <td><?php echo $p->obat; ?></td>
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
    <div class="footer-main">
        Developed by <a href="#" target="">ClemPHC</a> &copy; <?php echo date('Y'); ?>
    </div>
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php $this->load->view('foot'); ?>