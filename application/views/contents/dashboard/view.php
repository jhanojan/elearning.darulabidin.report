<style>
    .menu-utama{
        min-height:320px;
        cursor:pointer;
        border:1px solid rgba(0,0,0,.1);
        padding-bottom:5px;
    }
    .caption{
        border:1px solid rgba(0,0,0,.1);
        padding-top:5px;
        margin-bottom:10px;
        background:#1a237e;
        color:white;
        font-family:"Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    #kehadiran_bg{
        background-image:url('<?php echo base_url()?>assets/img/kehadiran.png') ;
        background-repeat: no-repeat;
        background-size: 100% 100%;

    }
    #nilai_bg{
        background-image:url('<?php echo base_url()?>assets/img/nilai.png') ;
        background-repeat: no-repeat;
        background-size: 100% 100%;

    }
    #nilai_lainnya_bg{
        background-image:url('<?php echo base_url()?>assets/img/nilai_lainnya.png') ;
        background-repeat: no-repeat;
        background-size: 100% 100%;

    }
    
</style>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 " class="col-md-12">
    <div class="well-lg">
        <h3>Selamat Datang</h3>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-4 col-xs-12" onclick="kehadiran()">
            <div class="col-md-12 menu-utama" id="kehadiran_bg">
                &nbsp;
            </div>
            <div class="col-md-12 caption" style="text-align:center">
                <h3>Kehadiran</h3>
            </div>
        </div>
        <div class="col-lg-4 col-xs-12" onclick="nilai()">
            <div class="col-md-12 menu-utama" id="nilai_bg">
                &nbsp;
            </div>
            <div class="col-md-12 caption" style="text-align:center">
                <h3>Nilai Siswa</h3>
            </div>
        </div>
        <div class="col-lg-4 col-xs-12" onclick="nilai_lainnya()">
            <div class="col-md-12 menu-utama" id="nilai_lainnya_bg">
                &nbsp;
            </div>
            <div class="col-md-12 caption" style="text-align:center">
                <h3>Nilai Lainnya</h3>
            </div>
        </div>
    </div>
    <?php //echo $api_tes->api_name;?>
    
</div>
<script>
    function kehadiran(){
        window.location.assign('<?php echo base_url()?>report_kehadiran');
    }
    function nilai(){
        window.location.assign('<?php echo base_url()?>report_nilai');
    }
    function nilai_lainnya(){
        window.location.assign('<?php echo base_url()?>report_nilai_lainnya');
    }
</script>