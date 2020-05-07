<?php $this->load->view('head'); ?>
<aside class="right-side">
    <section class="content">
        <div class="row" style="margin-bottom:5px;">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <center>
                            <h3>ClemPHC</h3>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-red"><i class="fa fa-users"></i></span>
                <div class="sm-st-info">
                    <h2 class="font-bold"><?php echo $pasien->bulan_pasien; ?> Pasien yang Berkunjung</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-green"><i class="fa fa-users"></i></span>
                <div class="sm-st-info">
                    <h2 class="font-bold"><?php echo $riwayat->bulan_riwayat; ?> Pasien yang Sakit</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="footer-main">
        Developed by <a href="#" target="">ClemPHC</a> &copy; <?php echo date('Y'); ?>
    </div>
</aside>
</div>

<?php $this->load->view('foot'); ?>