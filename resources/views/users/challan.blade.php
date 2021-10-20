@extends('admin.master')
@section('title')
    AJKMC Admission Test | Challan Form
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><em class="text-primary">Challan Form</em> &nbsp;<a class="btn btn-danger text-white" onclick="window.print()">Print</a></h1>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        {{--<button id="cmd">generate PDF</button>--}}
        <!-- Main content -->
        <section class="content" id="content">
            <div class="container-fluid">

                @if(Auth::user()->category==NULL)
                    <div class="card">
                        <div class="row">
                            <div class="col">
                                <h2 class="text-danger"> <b><em>Complete the Personal Information First</em></b></h2>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row" >
                        <div class="col-md-12 text-center" >
                            <h4 style="border-style: solid">Final Copy</h4>
                        </div>
                    </div>
                    <div class="card" style="border: 3px solid black; border-collapse: collapse;">

                        <div class="row">
                            <div class="col-md-3 text-left" style="padding-left: 50px"><img src="https://upload.wikimedia.org/wikipedia/commons/8/88/AzadKashmirSeal.png" alt="img" height="80"></div>
                            <div class="col-md-6 text-center"><h4>Depositor Receipt (Customer Copy)</h4></div>
                            <div class="col-md-3 text-right" style="padding-right: 50px;"><img src="https://www.abl.com/src/uploads/2020/11/Allied-Bank-Logo1.png" alt="img" height="80"></div>
                        </div>

                        <div class="row"><br></div>
                        <div class="row">
                            <div class="col-md-6" style="padding-left: 50px; font-size: 20px;">
                                <b>Challan ID </b> &nbsp; &nbsp;
                                @if(Auth::user()->test_type == 'mcat')
                                    <u>MCAT-{{date('y-m-d')}}-{{Auth::user()->id}}</u>
                                @else
                                    <u>SAT-{{date('y-m-d')}}-{{Auth::user()->id}}</u>
                                @endif
                            </div>
                            <div class="col-md-6 text-right" style="padding-right: 50px; font-size: 20px;">
                                <b>CNIC No </b> &nbsp; &nbsp;<u>{{Auth::user()->cnic}}</u>
                            </div>
                        </div>

                        <div class="row"><br></div>
                        <div class="row">
                            <div class="col-md-12" style="padding-left: 50px; font-size: 20px;">
                                <b>Name </b> &nbsp; &nbsp; <u><b>{{Auth::user()->name}}</b></u>
                            </div>
                        </div>

                        <div class="row"><br></div>
                        <div class="row">
                            <div class="col-md-12" style="padding-left: 50px; font-size: 20px;">
                                <b>Father Name </b> &nbsp; &nbsp; <u><b>{{Auth::user()->guardian_name}}</b></u>
                            </div>
                        </div>

                        <div class="row"><br></div>
                        <div class="row">
                            <div class="col-md-6" style="padding-left: 50px; font-size: 20px;">
                                <b>Account No: </b> &nbsp; &nbsp;  <u><b>00100265520700</b></u>
                            </div>
                            <div class="col-md-6 text-right" style="padding-right: 50px; font-size: 20px;">
                                <b>Date </b> &nbsp; &nbsp;  <u><b>{{date('d-m-y')}}</b></u>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="padding: 70px; font-size: 20px;">
                                <style>
                                    table, td, th {
                                        border: 1px solid black;
                                    }

                                    table {
                                        border-collapse: collapse;
                                        width: 100%;
                                    }
                                </style>
                                <table>
                                    <tr>
                                        <th style="width: 80%; ">Application Fee</th>
                                        <th>{{$app_fee = 3000.00}}</th>
                                    </tr>
                                    <tr>
                                        <td><b>Bank Services Charges</b></td>
                                        <td>{{$service = 170.00}}</td>

                                    </tr>

                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right" style="padding-right: 50px; font-size: 20px;">
                                <b>Total Amount </b> &nbsp; &nbsp;  <u><b>Rs {{$app_fee + $service}} /-</b></u>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center" style="padding-right: 50px; font-size: 20px;">
                                <b>Amount in words </b> &nbsp; &nbsp;  <u><b>Three thousand one hundred and seventy rupees only</b></u>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-left" style="padding: 50px">

                                <h6 style="text-decoration:overline; font-weight:bold">Customer Signature</h6>
                            </div>
                            <div class="col-md-6 text-right" style="padding: 50px">
                                <h6 style="text-decoration:overline; font-weight:bold">Depositer Signature</h6>
                            </div>
                        </div>
                    </div>
{{--

                    <div class="row"> <hr width="100%"> </div>
--}}

                    <div class="card" style="border: 3px solid black; border-collapse: collapse;">
                        <div class="row">
                            <div class="col-md-3 text-left" style="padding-left: 50px"><img src="https://upload.wikimedia.org/wikipedia/commons/8/88/AzadKashmirSeal.png" alt="img" height="80"></div>
                            <div class="col-md-6 text-center"><h4>Depositor Receipt (Bank Copy)</h4></div>
                            <div class="col-md-3 text-right" style="padding-right: 50px;"><img src="https://www.abl.com/src/uploads/2020/11/Allied-Bank-Logo1.png" alt="img" height="80"></div>
                        </div>

                        <div class="row"><br></div>
                        <div class="row">
                            <div class="col-md-6" style="padding-left: 50px; font-size: 20px;">
                                <b>Challan ID </b> &nbsp; &nbsp;
                                @if(Auth::user()->test_type == 'mcat')
                                    <u>MCAT-{{date('y-m-d')}}-{{Auth::user()->id}}</u>
                                @else
                                    <u>SAT-{{date('y-m-d')}}-{{Auth::user()->id}}</u>
                                @endif
                            </div>
                            <div class="col-md-6 text-right" style="padding-right: 50px; font-size: 20px;">
                                <b>CNIC No </b> &nbsp; &nbsp;<u>{{Auth::user()->cnic}}</u>
                            </div>
                        </div>

                        <div class="row"><br></div>
                        <div class="row">
                            <div class="col-md-12" style="padding-left: 50px; font-size: 20px;">
                                <b>Name </b> &nbsp; &nbsp; <u><b>{{Auth::user()->name}}</b></u>
                            </div>
                        </div>

                        <div class="row"><br></div>
                        <div class="row">
                            <div class="col-md-12" style="padding-left: 50px; font-size: 20px;">
                                <b>Father Name </b> &nbsp; &nbsp; <u><b>{{Auth::user()->guardian_name}}</b></u>
                            </div>
                        </div>

                        <div class="row"><br></div>
                        <div class="row">
                            <div class="col-md-6" style="padding-left: 50px; font-size: 20px;">
                                <b>Account No: </b> &nbsp; &nbsp;  <u><b>00100265520700</b></u>
                            </div>
                            <div class="col-md-6 text-right" style="padding-right: 50px; font-size: 20px;">
                                <b>Date </b> &nbsp; &nbsp;  <u><b>{{date('d-m-y')}}</b></u>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="padding: 70px; font-size: 20px;">
                                <style>
                                    table, td, th {
                                        border: 1px solid black;
                                    }

                                    table {
                                        border-collapse: collapse;
                                        width: 100%;
                                    }
                                </style>
                                <table>
                                    <tr>
                                        <th style="width: 80%; ">Application Fee</th>
                                        <th>{{$app_fee}}</th>
                                    </tr>
                                    <tr>
                                        <td><b>Bank Services Charges</b></td>
                                        <td>{{$service}}</td>

                                    </tr>

                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right" style="padding-right: 50px; font-size: 20px;">
                                <b>Total Amount </b> &nbsp; &nbsp;  <u><b>Rs{{$app_fee + $service}}/-</b></u>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center" style="padding-right: 50px; font-size: 20px;">
                                <b>Amount in words </b> &nbsp; &nbsp;  <u><b>Three thousand one hundred and seventy rupees only</b></u>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-left" style="padding: 50px">

                                <h6 style="text-decoration:overline; font-weight:bold">Customer Signature</h6>
                            </div>
                            <div class="col-md-6 text-right" style="padding: 50px">
                                <h6 style="text-decoration:overline; font-weight:bold">Depositer Signature</h6>
                            </div>
                        </div>
                    </div>

                    </div>
            @endif

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script>
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });
</script>
@endsection
