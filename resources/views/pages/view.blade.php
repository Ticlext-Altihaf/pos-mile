<?php
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
?>
<!DOCTYPE html>
<html lang="en" data-lt-installed="true"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Print Data</title>

    <!-- Styles -->
    <style>
        /* Style the header with a grey background and some padding */
        .button {
            background-color: #008CBA; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            font-size: 16px;
        }
        div.pagebr
        {
            page-break-inside:avoid;
        }

        @media  print {
            .buttonPage {
                visibility: hidden;
                display: none;
            }
            body * {
                visibility: hidden;
            }

            .control-box {
                visibility: hidden;
                display: none;
                height: 0px !important;
            }

            #section-to-print, #section-to-print * {
                visibility: visible;
            }
            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>
<body data-gr-c-s-loaded="true">




<div class="control-box" style="float: left;margin-left: 60px;width: 300px;"><br>



    <a href="#" class="button" onclick="myFunction()" style="">Print</a><br>


</div>

<div class="" style="float: right;width: 1100px;">
    <div id="section-to-print">

        <div class="pagebr">
            <title>{{$package->airway_bill}}</title>



            <div class="main_container page-break">
                <style type="text/css">
                    .tg {
                        border-collapse: collapse;
                        border-spacing: 0;
                        font-size: 9pt;
                    }

                    .tg1 {
                        border-collapse: collapse;
                        border-spacing: 0;
                        font-size: 9pt;
                    }

                    .tg td {
                        border-color: black;
                        border-style: solid;
                        border-width: 1px;
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                        overflow: hidden;
                        word-break: normal;
                        padding: 2px;
                    }

                    .tg1 td {
                        border-color: black;
                        border-style: solid;
                        border-width: 1px;
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                        overflow: hidden;
                        word-break: normal;
                        padding: 2px 3px;
                    }

                    .tg th {
                        border-color: black;
                        border-style: solid;
                        border-width: 1px;
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                        font-weight: normal;
                        overflow: hidden;
                        word-break: normal;
                        padding: 2px 3px;
                    }

                    .tg1 th {
                        border-color: black;
                        border-style: solid;
                        border-width: 1px;
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                        font-weight: normal;
                        overflow: hidden;
                        word-break: normal;
                        padding: 2px 3px;
                    }

                    .tg .tg-0pky {
                        border-color: inherit;
                        text-align: left;
                        vertical-align: top;
                        font-size: 7pt;
                    }

                    .tg1 .tg-0pky {
                        border-color: inherit;
                        text-align: left;
                        vertical-align: top;
                        font-size: 9pt;
                    }

                    .center {
                        text-align: center !important
                    }
                </style>
                <div style="display:block;width:10cm;height:15cm;padding:5px; margin-bottom:20px;">
                    <table class="tg1" style="table-layout: fixed;height:10cm;width:calc(10cm - 10px);margin-bottom:10px">
                        <colgroup>
                            <col style="width: 3.5cm">
                            <col style="width: 3.5cm">
                            <col style="width: 3cm">
                        </colgroup>
                        <thead>
                        <tr>
                            <th class="tg-0pky" colspan="2" style="height: 8px;">POS {{$package->service_name}}</th>
                            <th class="tg-0pky center" rowspan="2">
                                <img style="height: 60px;margin-top: 6px;filter:brightness(10%);" src="{{ asset('logo_pos.png') }}"/>
                            </th>
                        </tr>
                        <tr>
                            <td class="tg-0pky center" colspan="2" style="height: 8px;">
                                <div style="margin: 4px; -webkit-print-color-adjust: exact !important;">
                                    <img
                                        src="data:image/png;base64,{!!base64_encode($generator->getBarcode($package->airway_bill, $generator::TYPE_CODE_39, 1, 50))!!}"
                                        alt="barcode" style="width: 100%;height: 50px;"/>
                                </div>
                                <p style="padding: 0px;margin-top: 2px;margin-bottom: -1px;">
                                    {{$package->airway_bill}}
                                </p>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="tg-0pky" style="height:25px !important" colspan="3">Ref Pengiriman : {{$package->reference_number}}</td>
                        </tr>
                        <tr hidden>
                            <td class="tg-0pky" style="height:25px !important" colspan="3">   - Booking Code : CDS1222743433 </td>
                        </tr>
                        <tr style="height: 15px">
                            <td class="tg-0pky">
                                <center style="font-size:9pt">
                                    ID Pel:
                                </center>
                            </td>
                            <td class="tg-0pky" colspan="2">
                                <center style="font-size:9pt">
                                    {{$package->user->name}}
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-0pky" style="height: 40px;">
                            <span style="width: 150px;">
                                Dari<br>
                                <div style="font-size: 8pt;">
                                    {{$package->sender_address}}

                                    <span style="display:block">
                                        Telp : {{$package->sender_phone}}
                                    </span>
                                                                    </div>
                            </span>
                            </td>
                            <td class="tg-0pky" colspan="2" rowspan="2">
                                <div>
                                    <span style="font-size: 9pt;">Kepada</span>
                                    <div style="font-size: 8pt;">
                                        <div style="font-weight: bold;">{{$package->receiver_name}}</div>
                                        {{$package->receiver_address}}
                                        <div>
                                            Telp : {{$package->receiver_phone}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr style="height: 10px;">
                            <td class="tg-0pky">
                                Berat : {{$package->actual_weight}} KG <br>
                                10x10x1 cm (0.02)
                            </td>
                        </tr>
                        <tr style="height: 10px;">
                            <td class="tg-0pky">
                                <div style="vertical-align: middle;">
                                    <center style="font-size:9pt; font-weight:bold;">
                                        {{$package->receiver_postal_code}} ({{$package->receiver_postal_code}})
                                    </center>
                                </div>
                            </td>
                            <td class="tg-0pky" rowspan="3">
                                <center>
                                    <img src="{{(new \chillerlan\QRCode\QRCode())->render($package->airway_bill)}}"
                                         alt="QR Code"/>
                                </center>
                            </td>
                            <td class="tg-0pky">
                                <center style="font-size:9pt; font-weight:bold;">
                                    NON COD
                                </center>
                            </td>
                        </tr>
                        <tr style="height: 10px;">
                            <td class="tg-0pky" rowspan="2">
                                Tanggal Transaksi : <br>
                                18-Dec-2022<br>
                                Estimasi Antaran : <br>
                                28-Dec-2022 <br>
                            </td>
                            <td style="font-weight:bold;">
                                <center></center>
                            </td>
                        </tr>
                        <tr style="height: 5px;">
                            <td>
                                <center>
                                    1/1
                                </center>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @foreach($package->kolis as $koli)
                        <table class="tg" style="table-layout: fixed;width:calc(10cm - 10px);height:3cm;">
                        <colgroup>
                            <col style="width: 4cm">
                            <col style="width: 3cm">
                            <col style="width: 3cm">
                        </colgroup>
                        <tbody>
                        <tr style="height: 10px;">
                            <td class="tg-0pky">
                                Bukti Pengiriman<br>
                                <span>
                                Kantor Kirim :
                            </span>
                                <span style="font-size:6pt">
							{{$package->user->name}}<br>
							<span>
								<span>
									Tanggal Posting : {{$package->created_at->format('d-M-Y')}}<br>
								</span>
								<span>
									Wkt Posting : {{$package->created_at->format('H:i:s')}}<br>
								</span>
							                                                        <span>
                                {{$package->length ?? 0}}x{{$package->width ?? 0}}x{{$package->height ?? 0}} cm ({{$package->volume_weight ?? 0}})

                            </span>
                        </span></span></td>
                            <td class="tg-0pky">
                                Pengirim <br>
                                {{$package->sender_name}}<br>
                                <span style="font-size:5pt">
                                    {{$package->sender_address}}
                            </span>
                            </td>
                            <td class="tg-0pky">
                                Berat : {{$koli->weight}} KG <br>
                                Bea kirim : {{\App\Providers\money($package->shipment_cost)}}<br>
                            </td>
                        </tr>
                        <tr style="height: 10px; font-size:5pt;">
                            <td class="tg-0pky">
                                ID Pelanggan : <br>
                                <br>



                            </td>
                            <td class="tg-0pky">
                                Penerima <br>
                                <b>{{$package->receiver_name}}</b><br>
                                <span style="font-size:5pt">
                                {{$package->receiver_address}}
                            </span>
                            </td>
                            <td class="tg-0pky">
                                <center>
                                    <img style="width: 60px !important;filter:brightness(10%);" src="{{ asset('logo_pos.png') }}"/>
                                </center>

                            </td></tr>
                        <tr style="height: 10px;">
                            <td class="tg-0pky">
                                <div style="padding:3px">
                                    <div style="float:left; margin-right:6px">
                                        <center>

                                            <img
                                                style="width: 50px;"
                                                src="{{(new \chillerlan\QRCode\QRCode())->render("https://www.posindonesia.co.id/id/tracking/".$package->airway_bill)}}"
                                                alt="QR Code"/>

                                        </center>
                                    </div>
                                    <div style="float:left">
                                        <span style="font-size:6pt">
                                                                                            {{$package->airway_bill}}
                                                                                        <br>
                                        </span>
                                        <span style="font-size:4pt">
                                            Lacak paket di <br> https://www.posindonesia.co.id/id
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="tg-0pky" style="font-size: 6pt;" rowspan="2" colspan="2">
                                Pernyataan pengirim<br>
                                1. Setuju dengan ketentuan dan syarat pengiriman yang ditetapkan<br>
                                PT. Pos Indonesia (Persero)<br>
                                2. Isi Kiriman : {{$koli->description}}<br>

                                3. Nilai pertanggungan isi kiriman : <b>{{\App\Providers\money($koli->goods_value)}}</b><br>
                                4. Asuransi : {{$koli->surcharge}}
                            </td>
                        </tr>
                        <tr style="height: 10px;">
                            <td class="tg-0pky" style="font-size: 5pt;">
                                Jenis kiriman : {{$package->service_level}}
                                <br>
                                Estimasi Antaran : {{$package->delivery_time->format('d/m/Y')}}

                                <br>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>


<center>

</center>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    var currentPageGlobal = urlParams.get('page') ?? 1;
    $(document).ready(function() {
        showPage(currentPageGlobal);
        var selected_display_field = $.urlParam('selected_display_field');
        if(selected_display_field==""){
            $("#select_all").attr("checked",false);
            $("#label_checkbox").text("Select All");
        }else{
            $("#label_checkbox").text("Unselect All");

        }

        if(selected_display_field=="on"){
            $("#select_all").attr("checked",false);
            $("#label_checkbox").text("Select All");
        }
    });

    function myFunction() {
        window.print();
    }

    function showPage(currentPage) {
        // Hidden ALL
        if (document.getElementById('btnPage_'+currentPageGlobal)) {
            var btnPage = document.getElementById('btnPage_'+currentPageGlobal);
            btnPage.style.backgroundColor = 'Transparent';
            btnPage.style.color = 'black';
            $( ".label_"+currentPageGlobal).hide();
        }

        // Show CURRENT PAGE ONLY
        if (document.getElementById('btnPage_'+currentPage)) {
            var btnPage = document.getElementById('btnPage_'+currentPage);
            btnPage.style.backgroundColor = '#008CBA';
            btnPage.style.color = 'white';
            $( ".label_"+currentPage).show();
        }
    }

    function printOld() {
        var URL = `https://expos.mile.app/` + 'print-connote';
        window.open(URL);
    }

    $( ".template" ).change(function() {
        var template_name = $.urlParam('template_name');
        var organization_id = $.urlParam('organization_id');
        var parameter_id = $.urlParam('parameter_id');
        var data_source = $.urlParam('data_source');
        var parameter_fields = $.urlParam('parameter_fields');
        var display_field = $.urlParam('display_field');
        window.location.href = "?organization_id="+organization_id+"&template_name="+$('.template').val()+"&parameter_id="+parameter_id+"&parameter_fields="+parameter_fields+"&data_source="+data_source+"&display_field="+display_field;
    });


    $("#select_all").change(function(){  //"select all" change
        var status = this.checked;
        console.log(status);
        if(!status){
            $("#label_checkbox").text("Select All");
            // "select all" checked status
        }else{
            $("#label_checkbox").text("Unselect All");

        }
        $('.display_field').each(function(){ //iterate all listed checkbox items
            this.checked = status; //change ".checkbox" checked status
        });

        if(status){

            var selected = new Array();

            $("#tblPosts input[type=checkbox]:checked").each(function () {
                selected.push(this.value);
            });
            console.log(selected);
            var template_name = $.urlParam('template_name');
            var organization_id = $.urlParam('organization_id');
            var parameter_id = $.urlParam('parameter_id');
            var data_source = $.urlParam('data_source');
            var parameter_fields = $.urlParam('parameter_fields');
            var display_field = $.urlParam('display_field');
            var selected_data = selected.toString();
            window.location.href = "?organization_id="+organization_id+"&template_name="+$('.template').val()+"&parameter_id="+parameter_id+"&parameter_fields="+parameter_fields+"&data_source="+data_source+"&display_field="+display_field+"&selected_display_field="+selected_data;
        } else {
            var selected = new Array();

            $("#tblPosts input[type=checkbox]:checked").each(function () {
                selected.push(this.value);
            });

            var template_name = $.urlParam('template_name');
            var organization_id = $.urlParam('organization_id');
            var parameter_id = $.urlParam('parameter_id');
            var data_source = $.urlParam('data_source');
            var parameter_fields = $.urlParam('parameter_fields');
            var display_field = $.urlParam('display_field');
            var selected_data = selected.toString();
            window.location.href = "?organization_id="+organization_id+"&template_name="+$('.template').val()+"&parameter_id="+parameter_id+"&parameter_fields="+parameter_fields+"&data_source="+data_source+"&display_field="+display_field+"&selected_display_field="+selected_data;
        }

    });


    $(".display_field").change(function() {
        console.log(this.checked);

        var selected = new Array();

        $("#tblPosts input[type=checkbox]:checked").each(function () {
            selected.push(this.value);
        });
        console.log(selected);

        var template_name = $.urlParam('template_name');
        var organization_id = $.urlParam('organization_id');
        var parameter_id = $.urlParam('parameter_id');
        var data_source = $.urlParam('data_source');
        var parameter_fields = $.urlParam('parameter_fields');
        localStorage.setItem("printId",parameter_fields);
        var display_field = $.urlParam('display_field');
        var selected_data = selected.toString();
        window.location.href = "?organization_id="+organization_id+"&template_name="+$('.template').val()+"&parameter_id="+parameter_id+"&parameter_fields="+parameter_fields+"&data_source="+data_source+"&display_field="+display_field+"&selected_display_field="+selected_data;

    });

    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null) {
            return null;
        }
        return decodeURI(results[1]) || 0;
    }
</script>

</body></html>
