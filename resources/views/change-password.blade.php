@extends('admin.master')

@section('title')
    Change Password
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><em style="font-weight: bold">Change Password</em></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            {{--Dashboard Users--}}
            <div class="card">
                <div class="card-body">
                    <form method="PUT" action="{{route('pass-changed')}}">
                        @csrf
                        <div class="form-group col-md-6">
                            <label>Enter New Password</label>
                            <input type="password" name="password" value="" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-success">Change</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable( {
                /*dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ]*/
            } );
        } );
    </script>
@endsection
