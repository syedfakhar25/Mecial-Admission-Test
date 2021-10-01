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
                                {{--<h4 style="font-weight: bold">Uploaded Documents</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 style="font-weight: bold">Matric</h6>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->matric)}}    " alt="img" height="300px">
                                    </div>
                                    <div class="col-md-4">
                                        <h6 style="font-weight: bold">FSC</h6>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->fsc)}}    " alt="img" height="300px">
                                    </div>
                                    <div class="col-md-4">
                                        <h6 style="font-weight: bold">CNIC</h6>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->cnic)}}    " alt="img" height="300px">
                                    </div>
                                    <div class="col-md-4">
                                        <h6 style="font-weight: bold">State Subject</h6>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->state_subject)}}    " alt="img" height="300px">
                                    </div>
                                    <div class="col-md-4">
                                        <h6 style="font-weight: bold">Domicile</h6>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->domicile)}}    " alt="img" height="300px">
                                    </div>
                                    <div class="col-md-4">
                                        <h6 style="font-weight: bold">PRC</h6>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->prc)}}    " alt="img" height="300px">
                                    </div>
                                    <div class="col-md-4">
                                        <h6 style="font-weight: bold">Signature and Thumb Impression</h6>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->signature)}}    " alt="img" height="300px">
                                    </div>
                                </div>--}}
                                <h4 style="font-weight: bold">Update Images of following documents here</h4>
                                <h6 style="color:red; font-weight: bold">In case of signature and Thumb Impression, do it on paper and take picture</h6>
                                <x-jet-validation-errors class="mb-4" />
                                <hr width="100%">
                                <form method="POST" action="{{ route('documents.update', $documents[0]->id) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">Matric </label>  <img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->matric)}}    " alt="img" height="100px">
                                                <input type="file" class="form-control" name="matric1" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">FSc </label><img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->fsc)}}    " alt="img" height="100px">
                                                <input type="file" class="form-control" name="fsc1"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">CNIC </label><img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->cnic)}}    " alt="img" height="100px">
                                                <input type="file" class="form-control" name="cnic1" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">State Subject </label><img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->state_subject)}}    " alt="img" height="100px">
                                                <input type="file" class="form-control" name="state_subject1"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">Domicile  </label><img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->domicile)}}    " alt="img" height="100px">
                                                <input type="file" class="form-control" name="domicile1"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">PRC (Not Applicable for Refugees 1947/89)</label><img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->prc)}}    " alt="img" height="100px">
                                                <input type="file" class="form-control" name="prc1"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="customFile">Signature and Thumb Impression </label><img src="{{\Illuminate\Support\Facades\Storage::url($documents[0]->signature)}}    " alt="img" height="100px">
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
