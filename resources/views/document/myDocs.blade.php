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
                        <h1><em class="text-primary">My Documents</em></h1>
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
                                
                                <h4 style="font-weight: bold">Update Images of following documents here</h4>
                                <h6 style="color:red; font-weight: bold">Images/Documents should not be more than 1024KB and it should be jpg or png. In case of signature and Thumb Impression, do it on paper and take picture</h6>
                                <x-jet-validation-errors class="mb-4" />
                                <hr width="100%">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">Matric*</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                                <div class="card-body text-center">
                                                    <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->matric) && !empty($documents->matric))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->matric)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->matric)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="matric"> 
                                                    </form>
                                                    
                                                    
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">FSc*</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body text-center">
                                                  <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->fsc) && !empty($documents->fsc))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->fsc)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->fsc)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                </div>
                                              </div>
                                                <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="fsc"> 
                                                    </form>
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">MCAT Result*</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body text-center">
                                                  <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->mcat_result) && !empty($documents->mcat_result))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->mcat_result)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->mcat_result)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                </div>
                                              </div>
                                              <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="mcat_result"> 
                                                    </form>
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">CNIC*</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body text-center">
                                                  <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->cnic) && !empty($documents->cnic))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->cnic)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->cnic)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                </div>
                                              </div>
                                              <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="cnic"> 
                                                    </form>
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">State Subject</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body text-center">
                                                  <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->state_subject) && !empty($documents->state_subject))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->state_subject)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->state_subject)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                </div>
                                              </div>
                                              <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="state_subject"> 
                                                    </form>
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">Domicile*</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body text-center">
                                                  <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->domicile) && !empty($documents->domicile))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->domicile)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->domicile)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                </div>
                                              </div>
                                              <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="domicile"> 
                                                    </form>
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">PRC</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body text-center">
                                                  <small style="margin-top: -1.25rem;display: block;">Upload Refugee Card for Refugees 1989</small>
                                                  <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->prc) && !empty($documents->prc))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->prc)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->prc)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                </div>
                                              </div>
                                              <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="prc"> 
                                                    </form>
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">Sign and ThumbImpression*</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body text-center">
                                                  <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->signature) && !empty($documents->signature))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->signature)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->signature)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                </div>
                                              </div>
                                              <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="signature"> 
                                                    </form>
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">Proof of Dual Nationality</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body text-center">
                                                  <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->overseas) && !empty($documents->overseas))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->overseas)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->overseas)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                </div>
                                              </div>
                                              <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="overseas"> 
                                                    </form>
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">Proof of Disability</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body text-center">
                                                  <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->disable) && !empty($documents->disable))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->disable)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->disable)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                </div>
                                              </div>
                                              <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="disable"> 
                                                    </form>
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">Doctor's Child</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body text-center">
                                                  <small style="margin-top: -1.25rem;display: block;">Proof of Service in AJK As Doctor (10 Years)</small>
                                                  <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->doctor) && !empty($documents->doctor))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->doctor)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->doctor)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                </div>
                                              </div>
                                              <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="doctor"> 
                                                    </form>
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                              <div class="card-header">
                                                <h3 class="card-title">Hafiz-e-Quran Certificate</h3>
                                
                                                <div class="card-tools">
                                                  <!--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>-->
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                                <div class="card-body text-center">
                                                  <div style="max-height:200px;overflow:hidden;">
                                                        @if(isset($documents->hafiz) && !empty($documents->hafiz))
                                                            <a href="{{\Illuminate\Support\Facades\Storage::url($documents->hafiz)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($documents->hafiz)}}"  style="max-width:100%;"></a>
                                                        @else
                                                            <img src="{{url('dist/img/document-default.png')}}" style="max-width:100%;">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="myuploadingwrapper" style="display:none;">  
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active uploadProgressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                        </div>
                                                        <div class="loaded_n_total"></div>
                                                    </div>
                                                    <div class="status" style="display:none;"></div>
                                                    <form name="upload" class="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_user_images')}}" method="post">
                                                        @csrf
                                                      <input type="file" class="form-control certificate_image" name="certificate_image" required="required" />
                                                      <input type="hidden" name="type" value="hafiz"> 
                                                    </form>
                                                </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                    </div>
                                    <a class="btn btn-primary" href="{{route('profile',Auth::user()->id)}}">Next</a>
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
 



    <script type="text/javascript">
        var upload_wrapper = '';
        
        function uploadProgressHandler(event) {
                console.log('Progress Event');
            upload_wrapper.find(".loaded_n_total").html("Uploaded " + event.loaded + " bytes of " + event.total);
            
            var percent = (event.loaded / event.total) * 100;
            var progress = Math.round(percent);
            upload_wrapper.find(".uploadProgressBar").html(progress + "%");
            upload_wrapper.find(".uploadProgressBar").css("width", progress + "%");
        }
    
        function loadHandler(event) {
            console.log('Load Event');
            
            upload_wrapper.find(".uploadProgressBar").css("width", "0%");
            upload_wrapper.find(".uploadProgressBar").html("0%");
            upload_wrapper.find('.myuploadingwrapper').hide();
            upload_wrapper.find('.imageUploadForm').show();
            
            var data = $.parseJSON(event.target.responseText);
           
            if(data.hasOwnProperty('status')){
                console.log(data);
                if(data.status == true)
                {
                    
                    upload_wrapper.find('.status').hide();
                    upload_wrapper.find("img").attr('src',data.image_path);
                    upload_wrapper.find("input.certificate_image").val('');
                }
                else
                {
                    upload_wrapper.find('.status').show();
                    upload_wrapper.find(".status").html(data.msg);
                }
            }
            else{
                console.log(data);
                upload_wrapper.find('.status').show();
                upload_wrapper.find(".status").html(data.error[0]);
            }
            
            
            
        }
    
        function errorHandler(event) {
                console.log('Error Event');
            upload_wrapper.find(".status").html("Upload Failed");
            upload_wrapper.find('.myuploadingwrapper').hide();
            upload_wrapper.find('.imageUploadForm').show();
            upload_wrapper.find('.status').show();
        }
    
        function abortHandler(event) {
                console.log('Abort Event');
            upload_wrapper.find(".status").html("Upload Aborted");
            upload_wrapper.find('.myuploadingwrapper').hide();
            upload_wrapper.find('.imageUploadForm').show();
            upload_wrapper.find('.status').show();
        }
    
    
    
    
        $(document).ready(function (e) {
            $('.imageUploadForm').on('submit',(function(e) {
                e.preventDefault();
                console.log('Submit Event');
                var formData = new FormData(this);
        
                $.ajax({
                    type:'POST',
                    url: $(this).attr('action'),
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    //dataType: "json",
                    xhr: function () {
                        
                        upload_wrapper.find('.myuploadingwrapper').show();
                        upload_wrapper.find('.imageUploadForm').hide();
                        upload_wrapper.find(".status").html('');
                        
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress",uploadProgressHandler,false);
                        xhr.addEventListener("load", loadHandler, false);
                        xhr.addEventListener("error", errorHandler, false);
                        xhr.addEventListener("abort", abortHandler, false);
                        //xhr.addEventListener("complete", abortHandler, false);
        
                        return xhr;
                    }
                });
            }));
        
            $("input.certificate_image").on("change", function() {
                console.log('Chenge Event');
                upload_wrapper = $(this).closest("div.card");
                upload_wrapper.find(".imageUploadForm").submit();
            });
        });
    </script>
@endsection
