

@extends('frontend.main_master')

@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">

               @include('frontend.common.user_sidebar')

                <div class="col-md-2">

                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h4 class="text-center"><span class="text-primary"> Обновить </span><strong class="text-danger" >{{\Illuminate\Support\Facades\Auth::user()->name}}</strong><span class="text-primary">
                              <b class="text-danger">профиль</b>    </span>   </h4>
                    </div>
                     <div class="card-body">
                         <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data" >
                             @csrf
                             <div class="form-group">
                                 <label class="info-title" for="name">Имя <span></span></label>
                                 <input type="text" class="form-control " id="name" name="name" value="{{$user->name}}">
                                 @error('name')
                                 <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                 @enderror
                             </div>

                             <div class="form-group">
                                 <label class="info-title" for="email">Почта <span></span></label>
                                 <input type="email" class="form-control " id="email" name="email" value="{{$user->email}}">
                                 @error('email')
                                 <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                 @enderror
                             </div>

                             <div class="form-group">
                                 <label class="info-title" for="phone">Телефон <span></span></label>
                                 <input type="text" class="form-control " id="phone" name="phone" value="{{$user->phone}}">
                                 @error('phone')
                                 <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                 @enderror
                             </div>

                             <div class="form-group">
                                 <label class="info-title" for="profile_photo_path">Фото профиля <span></span></label>
                                 <input type="file" class="form-control " id="profile_photo_path" name="profile_photo_path" >
                                 @error('profile_photo_path')
                                 <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                 @enderror
                             </div>
                             <div class="form-group">
                                <button type="submit" class="btn btn-danger" >Обновить </button>
                             </div>

                         </form>
                     </div>

                </div>
            </div>
        </div>
    </div>
@endsection

