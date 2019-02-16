<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>MONSTROSIX</title>
        <link rel="icon" type="image/png" href="<?php echo base_url();?>temp/home/images/logo.png">
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>temp/home/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>temp/home/css/custom.css" rel="stylesheet">
        <!-- fonts -->
        <link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
          <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="<?php echo base_url(); ?>leaflet/leaflet.css"/>
        <script src="<?php echo base_url(); ?>leaflet/leaflet.js"></script>
        
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5 left-wrapper">
                    <div class="event-banner-wrapper">
                        <div class="logo">
                            <img src="<?php echo base_url();?>temp/home/images/logo.png" width="30%">
                        </div>
                        <h2>
                            <?php echo $home->nama_acara;?>
                            <span>
                                <?php echo date('d M Y', strtotime($home->tgl_acara)); ?>, <?php echo date('H:i', strtotime($home->jam_acara)); ?>
                            </span>
                        </h2>
                        <h3 id="demo" class="event-banner-wrapper-h3"></h3>
                        <p><?php echo $home->create_by; ?></p>
                        <div class="event-banner-wrapper-sosmed">
                            <a href="instagram://user?username=monstrosix">
                                <img src="<?php echo base_url(); ?>temp/home/images/instagram.png" width="40%">
                            </a>
                            <a href="http://line.me/ti/p/%40uqr5723g" target="_blank">
                                <img src="<?php echo base_url(); ?>temp/home/images/line.png" width="45%">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 right-wrapper">
                    <div class="event-ticket-wrapper">
                        <div class="event-tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#Home" aria-controls="Home" role="tab" data-toggle="tab">Home</a>
                            </li>
                            <li role="presentation">
                                <a href="#venue" aria-controls="merch" role="tab" data-toggle="tab">Merch</a>
                            </li>
                            <li role="presentation">
                                <a href="#termCondition" aria-controls="termCondition" role="tab" data-toggle="tab">Terms & Conditions</a>
                            </li>
                            <li role="presentation">
                                <a href="#about" aria-controls="About" role="tab" data-toggle="tab">About</a></li>
                            </li>
                        </ul>
                        
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="Home">
                                <div class="row">
                                    <?php foreach($tiket as $item){ ?>
                                        <div class="col-md-12">
                                            <div class="ticketBox" data-ticket-price="<?php echo $item->harga; ?>">
                                                <div class="inactiveStatus"></div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <div class="ticket-name">
                                                            <?php echo $item->nama_kategori; ?>
                                                            <span>1 Ticket for 1 person</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="ticket-price-count-box">
                                                            <div class="ticket-control">
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-default btn-number-<?php echo $item->id_kategori; ?>" disabled="disabled" data-type="minus-<?php echo $item->id_kategori; ?>" data-field="<?php echo $item->id_kategori; ?>[<?php echo $item->id_kategori; ?>]">
                                                                            <span class="glyphicon glyphicon-minus"></span>
                                                                        </button>
                                                                    </span>

                                                                    <input type="text" name="<?php echo $item->id_kategori; ?>[<?php echo $item->id_kategori; ?>]" class="form-control input-number-<?php echo $item->id_kategori; ?>" value="0" min="0" max="5">

                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-default btn-number-<?php echo $item->id_kategori; ?>" data-type="plus-<?php echo $item->id_kategori; ?>" data-field="<?php echo $item->id_kategori; ?>[<?php echo $item->id_kategori; ?>]">
                                                                            <span class="glyphicon glyphicon-plus"></span>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <p class="price">Rp. <?php echo number_format($item->harga,0,',','.'); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ticket-description">
                                                    <p><?php echo $item->deskripsi; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="venue">
                                <div class="row">
                                    <?php foreach($merch as $item1){ ?>
                                        <div class="col-md-12">
                                            <div class="ticketBox">
                                                <div class="inactiveStatus"></div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="ticket-name">
                                                            <div class="text-center">
                                                                <img src="<?php echo base_url(); ?>temp/merch/<?php echo $item1->foto;?>"  class="img-thumbnail" width="50%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ticket-description">
                                                    <?php echo $item1->deskripsi; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="termCondition">
                                <p><?php echo $home->term; ?></p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="about">
                                <p><?php echo $home->about; ?></p>
                                <hr>
                                <div id="mapid" style="width: 100%; height: 400px;"></div>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="cart">
                        <div class="row">
                            <div class="col-xs-6"><p></p></div>
                        <div class="col-xs-6">
                            <div class="text-right">
                                <a class="btn Proceed" data-toggle="modal" data-target="#ticket-details">PROCEED</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
      
        <div class="modal right fade" id="ticket-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="<?php echo base_url(); ?>temp/home/images/icons/cancel.png">
                        </button>
                        <h4 class="modal-title">Your Tickets</h4>
                    </div>

                    <div class="modal-body">
                        <form>
                            <?php foreach($tiket as $item){ ?>
                                <div class="cart-information">
                                    <div class="ticket-type">
                                        <?php echo $item->nama_kategori; ?>
                                        <span>1 Ticket for 1 person</span>
                                    </div>
                           
                                    <ul>
                                        <input type="hidden" name="nama_kategori_<?php echo $item->id_kategori; ?>" id="nama_kategori_<?php echo $item->id_kategori; ?>" value="<?php echo $item->nama_kategori; ?>">
                                        <input type="hidden" name="id_kategori_<?php echo $item->id_kategori; ?>" id="id_kategori_<?php echo $item->id_kategori; ?>" value="<?php echo $item->id_kategori; ?>">
                                        <li>Tickets: <span class="ticket-count-<?php echo $item->id_kategori; ?>"></span></li>
                                        <li>Price: <span class="ticket-amount-<?php echo $item->id_kategori; ?>"></span></li>
                                        <hr>
                                        <li>Total: <span class="total-amount-<?php echo $item->id_kategori; ?>"></span></li>
                                    </ul>
                                </div>
                            <?php } ?>

                            <div class="contactForm">
                                <h3>Share your contact Details</h3>
                                    <input type="hidden" name="id_pemesan" id="id_pemesan" value="<?php echo $token; ?>">
                                    <input type="hidden" name="tgl_pesan" id="tgl_pesan" value="<?php echo date("Y-m-d H:i:s"); ?>">
                                    <input type="hidden" name="tgl_bayar" id="tgl_bayar" value="<?php echo date("Y-m-d H:i:s", mktime(0,0,0,date("n"),date("j")+2,date("Y"))); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email ID">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Enter your Mobile No.">
                                </div>
                                <a type="submit" class="btn" id="Payment">Proceed to Payment</a>                                
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="loadInput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="loader">
                    <div>
                        <img src="<?php echo base_url();?>temp/home/images/icons/preloader.gif" />
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
        <script src="<?php echo base_url();?>temp/home/js/bootstrap.min.js"></script>

    </body>
</html>


<script type="text/javascript">
    $(window).load(function() {
        // $("#loadInput").modal("show");;
    });

    <?php foreach($tiket as $item) { ?>

        $('.btn-number-<?php echo $item->id_kategori; ?>').click(function(e){

            e.preventDefault();
        
            fieldName = $(this).attr('data-field');
            type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");

            var ticketPrice = $(this).parents('.ticketBox').attr('data-ticket-price');
            var ticketType = $(this).parents('.ticketBox').find('.ticket-name').html();
            var total_<?php echo $item->id_kategori; ?>;
       
            var currentVal = parseInt($('.input-number-<?php echo $item->id_kategori; ?>').val());
            if (!isNaN(currentVal)) {
                if($(this).attr('data-type') == 'minus-<?php echo $item->id_kategori; ?>') {
                    if(currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                        $('.ticket-count-<?php echo $item->id_kategori; ?>').html(input.val());
                        $('.ticket-amount-<?php echo $item->id_kategori; ?>').html(<?php echo $item->harga; ?>);
                        $('.total-amount-<?php echo $item->id_kategori; ?>').html(<?php echo $item->harga; ?> * input.val());
                    }
                    if(parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }
       
                } else if($(this).attr('data-type') == 'plus-<?php echo $item->id_kategori; ?>') {
                    if(currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                        $('.ticket-count-<?php echo $item->id_kategori; ?>').html(input.val());
                        $('.ticket-amount-<?php echo $item->id_kategori; ?>').html(<?php echo $item->harga; ?>);
                        $('.total-amount-<?php echo $item->id_kategori; ?>').html(<?php echo $item->harga; ?> * input.val());
                    }
                    if(parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }
                }

            } else {
                input.val(0);
            }
        });
    <?php } ?>

    <?php foreach($tiket as $item){ ?>
            $('.input-number-<?php echo $item->id_kategori; ?>').focusin(function(){
                $(this).data('oldValue', $(this).val());
            });

            $('.input-number-<?php echo $item->id_kategori; ?>').change(function() {
                minValue =  parseInt($(this).attr('min'));
                maxValue =  parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());
                name = $(this).attr('name');

                if(valueCurrent >= minValue) {
                    $(".btn-number-<?php echo $item->id_kategori; ?>[data-type='minus-<?php echo $item->id_kategori; ?>'][data-field='"+name+"']").removeAttr('disabled')
                } else {
                    alert('Sorry, the minimum value was reached');
                    $(this).val($(this).data('oldValue'));
                }

                if(valueCurrent <= maxValue) {
                    $(".btn-number-<?php echo $item->id_kategori; ?>[data-type='plus-<?php echo $item->id_kategori; ?>'][data-field='"+name+"']").removeAttr('disabled')
                } else {
                    alert('Sorry, the maximum value was reached');
                    $(this).val($(this).data('oldValue'));
                }
            });
        <?php } ?>    
   
    function activeTicket(target, inputValue, ticketPrice, total, ticketType) {
        if(inputValue > 0) {
            $('#buyTicket .ticketBox').addClass('inActiveTicket');
            $(target).parents('.ticketBox').removeClass('inActiveTicket').addClass('activeTicket');
            $('.cart .btn').removeClass('disabled');
        } else {
            $('#buyTicket .ticketBox').removeClass('inActiveTicket');
            $(target).parents('.ticketBox').removeClass('activeTicket inActiveTicket');
            $('.cart .btn').addClass('disabled');
        }
    }

    $('#Payment').on('click',function(){

        var id_pemesan = $('#id_pemesan').val();
        var tgl_pesan = $('#tgl_pesan').val();
        var tgl_bayar = $('#tgl_bayar').val();
        var nama_pemesan = $('#nama_pemesan').val();
        var email = $('#email').val();
        var no_telp = $('#no_telp').val();

        if(nama_pemesan == ""){
            alert("Nama Pemesan Harus Diisi");
        }else if(email == ""){
            alert("Nama Email Harus Diisi");
        }else if(no_telp == ""){
            alert("No Telp Harus Diisi")
        }else{
            var namaKategori= [];
            var kategori = [];
            var countTiket = [];
            var amountTiket = [];
            var totalTiket = [];

            <?php foreach($tiket as $item){ ?>
                var nama_kategori_<?php echo $item->id_kategori; ?> = $('#nama_kategori_<?php echo $item->id_kategori; ?>').val();
                var kategori_<?php echo $item->id_kategori; ?> = $('#id_kategori_<?php echo $item->id_kategori; ?>').val();
                var count_<?php echo $item->id_kategori; ?> = document.querySelector(".ticket-count-<?php echo $item->id_kategori; ?>").innerHTML;
                var amount_<?php echo $item->id_kategori; ?> = document.querySelector(".ticket-amount-<?php echo $item->id_kategori; ?>").innerHTML;
                var total_<?php echo $item->id_kategori; ?> = document.querySelector(".total-amount-<?php echo $item->id_kategori; ?>").innerHTML;

                if(count_<?php echo $item->id_kategori; ?> == ''){
                    count_<?php echo $item->id_kategori; ?> = 0;
                }else{
                    count_<?php echo $item->id_kategori; ?>
                }

                if(amount_<?php echo $item->id_kategori; ?> == ''){
                    amount_<?php echo $item->id_kategori; ?> = 0;
                }else{
                    amount_<?php echo $item->id_kategori; ?>
                }

                if(total_<?php echo $item->id_kategori; ?> == ''){
                    total_<?php echo $item->id_kategori; ?> = 0;
                }else{
                    total_<?php echo $item->id_kategori; ?>
                }

                namaKategori.push(nama_kategori_<?php echo $item->id_kategori; ?>);
                kategori.push(kategori_<?php echo $item->id_kategori; ?>);
                countTiket.push(count_<?php echo $item->id_kategori; ?>);
                amountTiket.push(amount_<?php echo $item->id_kategori; ?>);
                totalTiket.push(total_<?php echo $item->id_kategori; ?>);

            <?php } ?>

            var fd;
            fd = new FormData();
            fd.append('id_pemesan',id_pemesan);
            fd.append('tgl_pesan',tgl_pesan);
            fd.append('tgl_bayar',tgl_bayar);
            fd.append('nama_pemesan',nama_pemesan);
            fd.append('email',email);
            fd.append('no_telp',no_telp);
            fd.append('kategori',kategori);
            fd.append('jumlah',countTiket);
            fd.append('total',totalTiket);
            fd.append('namaKategori',namaKategori)

            $.ajax({
                type : "POST",
                data : fd,
                url  : "<?php echo site_url('Home/Simpan');?>",
                dataType: 'JSON',
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $("#loadInput").modal("show");;
                },
                complete: function(data){
                    $("#loadInput").modal("hide");
                    alert("Terimakasih. Silahkan Cek Email Anda");
                    location.reload();
                },
                success: function(data){
                    console.log(data);
                    if(data.state == 0){
                        alert(data.message);
                        location.reload();
                    }else{
                        alert(data.message);
                    }
                }
            });
            return false;
        }

    });

    var countDownDate = new Date("<?php echo date('M', strtotime($home->tgl_acara)); ?> <?php echo date('d', strtotime($home->tgl_acara)); ?>, <?php echo date('Y', strtotime($home->tgl_acara)); ?> <?php echo date('H', strtotime($home->jam_acara)); ?>:<?php echo date('i', strtotime($home->jam_acara)); ?>:<?php echo date('s', strtotime($home->jam_acara)); ?>").getTime();
    console.log(countDownDate);
    //var countDownDate = new Date("Feb 15, 2019 15:37:25").getTime();
    var x = setInterval(function() {

        var now = new Date().getTime();
        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);

    /*var mymap = L.map('mapid').setView([<?php echo $home->lat; ?>, <?php echo $home->long; ?>], 13);

    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18
    }).addTo(mymap);*/

    var mapOptions = {
        center: [<?php echo $home->lat; ?>, <?php echo $home->long; ?>],
        zoom: 10
    }
    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    var map = new L.map('mapid', mapOptions);
    map.addLayer(layer);

    L.marker([<?php echo $home->lat; ?>, <?php echo $home->long; ?>]).addTo(map);
</script>