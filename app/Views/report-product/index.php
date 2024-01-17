<?= $this->extend('main/layout'); ?>


<?= $this->section('isi'); ?>

<div class="row">
    <div class="col-lg-6">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Laporan Chart</div>
            <div class="card-body bg-white viewTampilGrafik">

            </div>
        </div>

    </div>

    <div class="col-lg-6 border">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Tabel</div>
            <div class="card-body bg-white ">
                <div class="row">
                    <div class="col">Brand</div>

                    <div class="col"> Jawa Barat</div>
                    <div class="col"> Kalimantan</div>
                    <div class="col"> jawa tengah</div>
                    <div class="col"> bali</div>

                 </div>

                 <div class="row">
                    <div class="col">Roti Tawar</div>
                 </div>
                 <div class="row">
                    <div class="col">Susu Kaleng</div>
                 </div>
               
               

            </div>
           

            </div>
        </div>

    </div>
</div>

<script>
    function tampilGrafik(){
        $.ajax({
            type:'post',
            url:'<?= base_url('reportProduct/tampilGrafik') ?>',
            data:{
                tanggal :'2021-11'
            },
            dataType:'json',
            beforeSend: function() {
                $('.viewTampilGrafik').html('<i class="fa fa-spin fa-spinner"> </i>')
            },
            success: function(response){
                if(response.data){
                    $('.viewTampilGrafik').html(response.data)
                }        
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        })
    }

    $(document).ready(function(){
        alert('saya minta maaf sebelumnya pak, karena masih belum siap, ini dikarenakan selama 2 hari ini saya banyak pekerjaan di kerjaan saya. ')
        tampilGrafik();
    })
</script>

<?= $this->endSection('isi'); ?>