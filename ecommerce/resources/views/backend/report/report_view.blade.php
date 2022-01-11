@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!--   ------------ Add Search Page -------- -->
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Поиск по дате </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('search-by-date') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Выбрать дату <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" class="form-control" >
                                            @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Поиск">
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>




                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Поиск по месяцам </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('search-by-month') }}" >
                                    @csrf


                                    <div class="form-group">
                                        <h5>Выбрать месяц  <span class="text-danger">*</span></h5>
                                        <div class="controls">

                                            <select name="month" class="form-control">
                                                <option label="Выберите месяц"></option>
                                                <option value="January">Январь</option>
                                                <option value="February">Февраль</option>
                                                <option value="March">Март</option>
                                                <option value="April">Апрель</option>
                                                <option value="May">Май</option>
                                                <option value="Jun">Июнь</option>
                                                <option value="July">Июль</option>
                                                <option value="August">Август</option>
                                                <option value="September">Сентябрь</option>
                                                <option value="October">Октябрь</option>
                                                <option value="November">Ноябрь</option>
                                                <option value="December">Декабрь</option>


                                            </select>

                                            @error('month')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Выбрать год  <span class="text-danger">*</span></h5>
                                        <div class="controls">

                                            <select name="year_name" class="form-control">
                                                <option label="Выбрать год"></option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                            </select>

                                            @error('year_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Поиск">
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Поиск по году </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('search-by-year') }}" >
                                    @csrf
                                    <div class="form-group">
                                        <h5>Выбарть год  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="year" class="form-control">
                                                <option label="Choose One"></option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                            </select>

                                            @error('year')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Поиск">
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!--   ------------End  Add Search Page -------- -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
