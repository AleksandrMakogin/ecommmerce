@extends('admin.admin_master')

@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-center">

                <div class="box box-widget widget-user col-8 ">

                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black" style="background: url({{asset('backend/images/gallery/full/10.jpg')}}) center center;">
                        <h3 class="widget-user-username " style="color: #122b40">Имя Админа : {{$adminData->name}}</h3>


                        <h6 class="widget-user-desc" style="color: #122b40">email: {{$adminData->email}}</h6>

                    </div>
                    <div class="widget-user-image">
                        <img class="rounded-circle" src="{{(!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/no_image.jpg') }}" alt="User Avatar">
                    </div>

                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">12K</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 br-1 bl-1">
                                <div class="description-block">
                                    <h5 class="description-header">550</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">158</h5>
                                    <span class="description-text">TWEETS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>

                            <!-- /.col -->
                        </div>
                        <a href="{{route('admin.profile.edit')}}" style="float: right" class="btn btn-rounded btn-success mb-5">Редактировать профиль</a>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection