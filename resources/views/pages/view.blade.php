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
                            <th class="tg-0pky" colspan="2" style="height: 8px;">{{$package->service_level}}</th>
                            <th class="tg-0pky center" rowspan="2">
                                <img style="height: 60px;margin-top: 6px;filter:brightness(10%);" src="{{ asset('logo_pos.png') }}"/>
                            </th>
                        </tr>
                        <tr>
                            <td class="tg-0pky center" colspan="2" style="height: 8px;">
                                <img style="height: 33px;width: 6.5cm;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAeAAAAAeAQMAAADO9V8LAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAEBJREFUOI3ty8ENADAIAkAHaOL+2zgACQvxqHSMhocJKldDQtDxoAnOpoE0zoRv6K28H8RdXLer4ODg4ODgn/EF/XYmqKpQYYgAAAAASUVORK5CYII=" alt="barcode">
                                <p style="padding: 0px;margin-top: -1px;margin-bottom: -1px;">
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
                                        US(US)
                                    </center>
                                </div>
                            </td>
                            <td class="tg-0pky" rowspan="3">
                                <center>
                                    <!--?xml version="1.0" encoding="UTF-8"?-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="85px" height="85px" viewBox="0 0 85 85"><defs><rect id="r0" width="4" height="4" fill="#000000"></rect></defs><rect x="0" y="0" width="85" height="85" fill="#fefefe"></rect><use x="0" y="0" xlink:href="#r0"></use><use x="4" y="0" xlink:href="#r0"></use><use x="8" y="0" xlink:href="#r0"></use><use x="12" y="0" xlink:href="#r0"></use><use x="16" y="0" xlink:href="#r0"></use><use x="20" y="0" xlink:href="#r0"></use><use x="24" y="0" xlink:href="#r0"></use><use x="32" y="0" xlink:href="#r0"></use><use x="36" y="0" xlink:href="#r0"></use><use x="48" y="0" xlink:href="#r0"></use><use x="56" y="0" xlink:href="#r0"></use><use x="60" y="0" xlink:href="#r0"></use><use x="64" y="0" xlink:href="#r0"></use><use x="68" y="0" xlink:href="#r0"></use><use x="72" y="0" xlink:href="#r0"></use><use x="76" y="0" xlink:href="#r0"></use><use x="80" y="0" xlink:href="#r0"></use><use x="0" y="4" xlink:href="#r0"></use><use x="24" y="4" xlink:href="#r0"></use><use x="36" y="4" xlink:href="#r0"></use><use x="48" y="4" xlink:href="#r0"></use><use x="56" y="4" xlink:href="#r0"></use><use x="80" y="4" xlink:href="#r0"></use><use x="0" y="8" xlink:href="#r0"></use><use x="8" y="8" xlink:href="#r0"></use><use x="12" y="8" xlink:href="#r0"></use><use x="16" y="8" xlink:href="#r0"></use><use x="24" y="8" xlink:href="#r0"></use><use x="32" y="8" xlink:href="#r0"></use><use x="40" y="8" xlink:href="#r0"></use><use x="48" y="8" xlink:href="#r0"></use><use x="56" y="8" xlink:href="#r0"></use><use x="64" y="8" xlink:href="#r0"></use><use x="68" y="8" xlink:href="#r0"></use><use x="72" y="8" xlink:href="#r0"></use><use x="80" y="8" xlink:href="#r0"></use><use x="0" y="12" xlink:href="#r0"></use><use x="8" y="12" xlink:href="#r0"></use><use x="12" y="12" xlink:href="#r0"></use><use x="16" y="12" xlink:href="#r0"></use><use x="24" y="12" xlink:href="#r0"></use><use x="32" y="12" xlink:href="#r0"></use><use x="44" y="12" xlink:href="#r0"></use><use x="56" y="12" xlink:href="#r0"></use><use x="64" y="12" xlink:href="#r0"></use><use x="68" y="12" xlink:href="#r0"></use><use x="72" y="12" xlink:href="#r0"></use><use x="80" y="12" xlink:href="#r0"></use><use x="0" y="16" xlink:href="#r0"></use><use x="8" y="16" xlink:href="#r0"></use><use x="12" y="16" xlink:href="#r0"></use><use x="16" y="16" xlink:href="#r0"></use><use x="24" y="16" xlink:href="#r0"></use><use x="32" y="16" xlink:href="#r0"></use><use x="36" y="16" xlink:href="#r0"></use><use x="40" y="16" xlink:href="#r0"></use><use x="56" y="16" xlink:href="#r0"></use><use x="64" y="16" xlink:href="#r0"></use><use x="68" y="16" xlink:href="#r0"></use><use x="72" y="16" xlink:href="#r0"></use><use x="80" y="16" xlink:href="#r0"></use><use x="0" y="20" xlink:href="#r0"></use><use x="24" y="20" xlink:href="#r0"></use><use x="56" y="20" xlink:href="#r0"></use><use x="80" y="20" xlink:href="#r0"></use><use x="0" y="24" xlink:href="#r0"></use><use x="4" y="24" xlink:href="#r0"></use><use x="8" y="24" xlink:href="#r0"></use><use x="12" y="24" xlink:href="#r0"></use><use x="16" y="24" xlink:href="#r0"></use><use x="20" y="24" xlink:href="#r0"></use><use x="24" y="24" xlink:href="#r0"></use><use x="32" y="24" xlink:href="#r0"></use><use x="40" y="24" xlink:href="#r0"></use><use x="48" y="24" xlink:href="#r0"></use><use x="56" y="24" xlink:href="#r0"></use><use x="60" y="24" xlink:href="#r0"></use><use x="64" y="24" xlink:href="#r0"></use><use x="68" y="24" xlink:href="#r0"></use><use x="72" y="24" xlink:href="#r0"></use><use x="76" y="24" xlink:href="#r0"></use><use x="80" y="24" xlink:href="#r0"></use><use x="36" y="28" xlink:href="#r0"></use><use x="40" y="28" xlink:href="#r0"></use><use x="0" y="32" xlink:href="#r0"></use><use x="4" y="32" xlink:href="#r0"></use><use x="8" y="32" xlink:href="#r0"></use><use x="12" y="32" xlink:href="#r0"></use><use x="24" y="32" xlink:href="#r0"></use><use x="32" y="32" xlink:href="#r0"></use><use x="40" y="32" xlink:href="#r0"></use><use x="52" y="32" xlink:href="#r0"></use><use x="64" y="32" xlink:href="#r0"></use><use x="68" y="32" xlink:href="#r0"></use><use x="72" y="32" xlink:href="#r0"></use><use x="80" y="32" xlink:href="#r0"></use><use x="0" y="36" xlink:href="#r0"></use><use x="8" y="36" xlink:href="#r0"></use><use x="16" y="36" xlink:href="#r0"></use><use x="20" y="36" xlink:href="#r0"></use><use x="28" y="36" xlink:href="#r0"></use><use x="36" y="36" xlink:href="#r0"></use><use x="40" y="36" xlink:href="#r0"></use><use x="48" y="36" xlink:href="#r0"></use><use x="52" y="36" xlink:href="#r0"></use><use x="56" y="36" xlink:href="#r0"></use><use x="60" y="36" xlink:href="#r0"></use><use x="72" y="36" xlink:href="#r0"></use><use x="80" y="36" xlink:href="#r0"></use><use x="0" y="40" xlink:href="#r0"></use><use x="4" y="40" xlink:href="#r0"></use><use x="16" y="40" xlink:href="#r0"></use><use x="24" y="40" xlink:href="#r0"></use><use x="28" y="40" xlink:href="#r0"></use><use x="32" y="40" xlink:href="#r0"></use><use x="48" y="40" xlink:href="#r0"></use><use x="52" y="40" xlink:href="#r0"></use><use x="56" y="40" xlink:href="#r0"></use><use x="68" y="40" xlink:href="#r0"></use><use x="0" y="44" xlink:href="#r0"></use><use x="12" y="44" xlink:href="#r0"></use><use x="36" y="44" xlink:href="#r0"></use><use x="48" y="44" xlink:href="#r0"></use><use x="52" y="44" xlink:href="#r0"></use><use x="56" y="44" xlink:href="#r0"></use><use x="64" y="44" xlink:href="#r0"></use><use x="8" y="48" xlink:href="#r0"></use><use x="16" y="48" xlink:href="#r0"></use><use x="24" y="48" xlink:href="#r0"></use><use x="36" y="48" xlink:href="#r0"></use><use x="40" y="48" xlink:href="#r0"></use><use x="44" y="48" xlink:href="#r0"></use><use x="72" y="48" xlink:href="#r0"></use><use x="76" y="48" xlink:href="#r0"></use><use x="80" y="48" xlink:href="#r0"></use><use x="32" y="52" xlink:href="#r0"></use><use x="40" y="52" xlink:href="#r0"></use><use x="52" y="52" xlink:href="#r0"></use><use x="56" y="52" xlink:href="#r0"></use><use x="60" y="52" xlink:href="#r0"></use><use x="64" y="52" xlink:href="#r0"></use><use x="72" y="52" xlink:href="#r0"></use><use x="80" y="52" xlink:href="#r0"></use><use x="0" y="56" xlink:href="#r0"></use><use x="4" y="56" xlink:href="#r0"></use><use x="8" y="56" xlink:href="#r0"></use><use x="12" y="56" xlink:href="#r0"></use><use x="16" y="56" xlink:href="#r0"></use><use x="20" y="56" xlink:href="#r0"></use><use x="24" y="56" xlink:href="#r0"></use><use x="36" y="56" xlink:href="#r0"></use><use x="40" y="56" xlink:href="#r0"></use><use x="52" y="56" xlink:href="#r0"></use><use x="56" y="56" xlink:href="#r0"></use><use x="80" y="56" xlink:href="#r0"></use><use x="0" y="60" xlink:href="#r0"></use><use x="24" y="60" xlink:href="#r0"></use><use x="36" y="60" xlink:href="#r0"></use><use x="40" y="60" xlink:href="#r0"></use><use x="44" y="60" xlink:href="#r0"></use><use x="48" y="60" xlink:href="#r0"></use><use x="56" y="60" xlink:href="#r0"></use><use x="60" y="60" xlink:href="#r0"></use><use x="72" y="60" xlink:href="#r0"></use><use x="80" y="60" xlink:href="#r0"></use><use x="0" y="64" xlink:href="#r0"></use><use x="8" y="64" xlink:href="#r0"></use><use x="12" y="64" xlink:href="#r0"></use><use x="16" y="64" xlink:href="#r0"></use><use x="24" y="64" xlink:href="#r0"></use><use x="44" y="64" xlink:href="#r0"></use><use x="56" y="64" xlink:href="#r0"></use><use x="64" y="64" xlink:href="#r0"></use><use x="68" y="64" xlink:href="#r0"></use><use x="76" y="64" xlink:href="#r0"></use><use x="80" y="64" xlink:href="#r0"></use><use x="0" y="68" xlink:href="#r0"></use><use x="8" y="68" xlink:href="#r0"></use><use x="12" y="68" xlink:href="#r0"></use><use x="16" y="68" xlink:href="#r0"></use><use x="24" y="68" xlink:href="#r0"></use><use x="32" y="68" xlink:href="#r0"></use><use x="40" y="68" xlink:href="#r0"></use><use x="52" y="68" xlink:href="#r0"></use><use x="68" y="68" xlink:href="#r0"></use><use x="72" y="68" xlink:href="#r0"></use><use x="76" y="68" xlink:href="#r0"></use><use x="0" y="72" xlink:href="#r0"></use><use x="8" y="72" xlink:href="#r0"></use><use x="12" y="72" xlink:href="#r0"></use><use x="16" y="72" xlink:href="#r0"></use><use x="24" y="72" xlink:href="#r0"></use><use x="32" y="72" xlink:href="#r0"></use><use x="36" y="72" xlink:href="#r0"></use><use x="44" y="72" xlink:href="#r0"></use><use x="60" y="72" xlink:href="#r0"></use><use x="64" y="72" xlink:href="#r0"></use><use x="68" y="72" xlink:href="#r0"></use><use x="72" y="72" xlink:href="#r0"></use><use x="0" y="76" xlink:href="#r0"></use><use x="24" y="76" xlink:href="#r0"></use><use x="32" y="76" xlink:href="#r0"></use><use x="36" y="76" xlink:href="#r0"></use><use x="40" y="76" xlink:href="#r0"></use><use x="44" y="76" xlink:href="#r0"></use><use x="48" y="76" xlink:href="#r0"></use><use x="56" y="76" xlink:href="#r0"></use><use x="0" y="80" xlink:href="#r0"></use><use x="4" y="80" xlink:href="#r0"></use><use x="8" y="80" xlink:href="#r0"></use><use x="12" y="80" xlink:href="#r0"></use><use x="16" y="80" xlink:href="#r0"></use><use x="20" y="80" xlink:href="#r0"></use><use x="24" y="80" xlink:href="#r0"></use><use x="32" y="80" xlink:href="#r0"></use><use x="44" y="80" xlink:href="#r0"></use><use x="48" y="80" xlink:href="#r0"></use><use x="52" y="80" xlink:href="#r0"></use><use x="60" y="80" xlink:href="#r0"></use><use x="76" y="80" xlink:href="#r0"></use></svg>

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
                                Bea kirim : {{\App\Providers\money($koli->shipping_cost)}}<br>
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
                                <div style="padding:5px">
                                    <div style="float:left; margin-right:6px">
                                        <center>
                                            <!--?xml version="1.0" standalone="no"?-->

                                            <svg width="34.8" height="34.8" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <desc>https://www.posindonesia.co.id/id/tracking/{{$package->airway_bill}}</desc>
                                                <g id="elements" fill="black" stroke="none">
                                                    <rect x="0" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="1.2" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="15.6" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="19.2" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="27.6" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="0" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="1.2" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="1.2" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="1.2" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="1.2" width="1.2" height="1.2"></rect>
                                                    <rect x="15.6" y="1.2" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="1.2" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="1.2" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="1.2" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="1.2" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="1.2" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="10.8" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="19.2" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="2.4" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="10.8" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="15.6" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="3.6" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="15.6" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="19.2" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="4.8" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="6" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="6" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="6" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="6" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="6" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="6" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="6" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="6" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="6" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="6" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="6" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="1.2" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="19.2" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="27.6" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="7.2" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="8.4" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="8.4" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="8.4" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="8.4" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="8.4" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="8.4" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="8.4" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="1.2" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="19.2" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="27.6" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="9.6" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="8.4" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="10.8" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="19.2" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="27.6" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="10.8" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="8.4" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="10.8" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="15.6" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="27.6" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="12" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="8.4" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="13.2" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="14.4" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="8.4" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="15.6" width="1.2" height="1.2"></rect>
                                                    <rect x="1.2" y="16.8" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="16.8" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="16.8" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="16.8" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="16.8" width="1.2" height="1.2"></rect>
                                                    <rect x="19.2" y="16.8" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="16.8" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="16.8" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="16.8" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="16.8" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="16.8" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="1.2" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="10.8" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="18" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="19.2" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="19.2" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="19.2" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="19.2" width="1.2" height="1.2"></rect>
                                                    <rect x="8.4" y="19.2" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="19.2" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="19.2" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="19.2" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="19.2" width="1.2" height="1.2"></rect>
                                                    <rect x="27.6" y="19.2" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="19.2" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="10.8" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="19.2" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="27.6" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="20.4" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="15.6" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="21.6" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="22.8" width="1.2" height="1.2"></rect>
                                                    <rect x="8.4" y="22.8" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="22.8" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="22.8" width="1.2" height="1.2"></rect>
                                                    <rect x="19.2" y="22.8" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="22.8" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="22.8" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="22.8" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="22.8" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="22.8" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="1.2" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="8.4" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="27.6" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="24" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="15.6" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="19.2" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="25.2" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="1.2" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="10.8" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="15.6" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="26.4" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="27.6" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="27.6" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="27.6" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="27.6" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="27.6" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="27.6" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="27.6" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="27.6" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="27.6" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="10.8" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="26.4" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="27.6" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="28.8" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="10.8" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="13.2" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="15.6" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="16.8" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="27.6" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="30" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="19.2" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="22.8" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="31.2" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="31.2" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="14.4" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="18" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="21.6" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="30" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="33.6" y="32.4" width="1.2" height="1.2"></rect>
                                                    <rect x="0" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="1.2" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="2.4" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="3.6" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="4.8" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="6" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="7.2" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="9.6" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="10.8" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="12" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="20.4" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="24" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="25.2" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="27.6" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="28.8" y="33.6" width="1.2" height="1.2"></rect>
                                                    <rect x="32.4" y="33.6" width="1.2" height="1.2"></rect>
                                                </g>
                                            </svg>

                                        </center>
                                    </div>
                                    <div style="float:left">
                                        <span style="font-size:6pt">
                                                                                            {{ $package->airway }}
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
                                4. Asuransi : {{\App\Providers\money($koli->surcharge)}}
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
