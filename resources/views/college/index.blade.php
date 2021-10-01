@extends('admin.master')
@section('title')
AJKMC Admission Test | Qualification
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><em class="text-primary">Manage Institutions</em></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session('error'))
                        <div class="alert " role="alert">
                            {{ session('error') }}
                        </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('colleges.store') }}">
                                @csrf
                                <div class="row" >
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" class="form-control" name="colleges" placeholder="e.g; AJK Medical College">
                                    </div>
                                    <button type="submit" class="btn btn-success mb-2">Add</button>
                                </div>
                                <div class="row">
                                    <hr width="100%">
                                </div>

                            </form>
                            <h5 style="font-weight: bold">Institute's List</h5>
                            <div class="row" >
                                <?php $count=0;?>
                                <div class="table-responsive">
                                    <table  class="display" style="width:100%" id="myTable">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Institute's Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($colleges as $college)
                                            <tr>
                                                <th scope="row">{{$count+=1}}</th>
                                                <th scope="row">{{$college->colleges}}</th>
                                                <td colspan="2">
                                                    {{--<a href=""><i class="text-blue fa fa-edit"></i></a>--}}
                                                    <form action="{{route('colleges.destroy', $college->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class=" fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endsection
