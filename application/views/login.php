<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ClemPHC</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/jquery.autocomplete.css'); ?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
</head>

<body class="skin-black">
    <section class="content">
        <div class="row" style="margin-top:1%;">
            <div class="col-md-12">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <section class="panel">
                        <div class="panel-body table-responsive">
                            <center>
                                <h3>ClemPHC</h3>
                                <hr />
                                <?php echo $this->session->flashdata('pesan'); ?>
                                <?php echo form_open('login/proses/', ['class' => 'form-horizontal style-form']); ?>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input name="email" type="text" id="nama" class="form-control" placeholder="Email Anda" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input name="password" class="form-control" id="kelas" type="password" placeholder="Password Anda" required />
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <div class="col-sm-12">
                                        <input type="submit" value="LOGIN" class="btn btn-success" />&nbsp;
                                    </div>
                                </div>
                                <div style="margin-top: 20px;"></div>
                            </center>
                            <hr />
                            <?php form_close(); ?>
                        </div>
                    </section>
                    <p>&nbsp;</p>
                    <center><sub>Developed by <a href="#" target="">ClemPHC</a> &copy; <?php echo date('Y'); ?></sub></center>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>