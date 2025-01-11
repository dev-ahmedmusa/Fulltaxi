@extends('Dashboard.layouts.master')
@section('title')
  الكباتن / السائقين
@stop
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('pages.services')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   عرض الكل</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                    <a href="{{route('drivers.create')}}" class="btn btn-primary" role="button"
                       aria-pressed="true">إضافة كابتن جديد</a>
                    <button type="button" class="btn btn-danger"
                            id="btn_delete_all">حذف الكل</button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><input name="select_all"  id="example-select-all"  type="checkbox"/></th>
                                <th>الاسم </th>
                                <th>الهاتف</th>
                                <th>عدد الرحلات</th>
                                <td>
                                    الرصيد
                                </td>
                                <th>عرض المستندات </th>

                                
                                <th>الحالة</th>
                                <th>تاريخ الانشاء</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drivers as $driver)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="checkbox" name="delete_select" value="{{$driver->id}}" class="delete_select">
                                    </td>
                                    <td style="align-items: stretch">{{ $driver->first_name }} {{$driver->last_name}}</td>
                                    <td style="direction: {{App::getLocale() =='ar' ? 'ltr' : 'ltr'  }}">
                                        {{$driver->country_code}}{{$driver->phone}} 
                                    </td>
                                    <td>
                                        5 رحلات
                                    </td>
                                    <td>
                                        <span>0.00 SDG</span>
                                        <button class="btn btn-sm btn-success">اضافة رصيد</button>
                                  <td>
                                    <a href="#"><img style="width: 30px;height:30px" src="{{URL::asset('Dashboard/img/docs.png')}}" ></a>
                                  </td>
                                
                                    <td>
                                        <div
                                            class="dot-label bg-{{$driver->status == 0 ? 'success':'danger'}} ml-1"></div>
                                        {{$driver->status == 0? trans('form_trans.Enabled'):trans('form_trans.Not_enabled')}}
                                    </td>

                                    <td>{{ $driver->created_at->diffForHumans() }}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('form_trans.process')}}<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('drivers.edit',$driver->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>
                                                {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password{{$driver->id}}"><i   class="text-primary ti-key"></i>&nbsp;&nbsp;تغير كلمة المرور</a> --}}
                                                {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$driver->id}}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;تغير الحالة</a> --}}
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$driver->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @include('Dashboard.drivers.delete')
                                @include('Dashboard.drivers.delete_select')
                                {{-- @include('Dashboard.drivers.update_password') --}}
                                {{-- @include('Dashboard.drivers.update_status') --}}
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for(var i in checkboxes){
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>


    <script type="text/javascript">
        $(function () {
            $("#btn_delete_all").click(function () {
                var selected = [];
                $("#example input[name=delete_select]:checked").each(function () {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_select').modal('show')
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        });
    </script>



@endsection