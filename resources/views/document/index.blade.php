@extends('admin.master')
@section('title')
    AJKMC Admission Test | Documents
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><em class="text-primary">Documents</em></h1>
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
                                <h4 style="font-weight: bold">Upload Images of following documents here</h4>
                                <h6 style="color:red; font-weight: bold">In case of signature and Thumb Impression, do it on paper and take picture</h6>
                                <x-jet-validation-errors class="mb-4" />
                                <hr width="100%">
                                <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">Matric </label>
                                                <input type="file" class="form-control" name="matric1" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">FSc </label>
                                                <input type="file" class="form-control" name="fsc1"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">CNIC </label>
                                                <input type="file" class="form-control" name="cnic1" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">State Subject </label>
                                                <input type="file" class="form-control" name="state_subject1"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">Domicile  </label>
                                                <input type="file" class="form-control" name="domicile1"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">PRC (Not Applicable for Refugees 1947/89)</label>
                                                <input type="file" class="form-control" name="prc1"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">Signature and Thumb Impression </label>
                                                <input type="file" class="form-control" name="signature1"/>
                                            </div>
                                        </div>

                                    </div>
                                        <button class="btn btn-primary">Save & Next</button>
                                    </div>

                                </form>
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


@endsection
