@extends('Dashboard.layouts.master')
@section('title')
   الكوبونات
@stop
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الكوبونات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   عرض الكل</span>
            </div>
        </div>
    </div>
    
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    
    <div class="row row-sm">
      
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                    <a href="{{route('coupon.create')}}" class="btn btn-primary" role="button"
                       aria-pressed="true">إضافة كوبون </a>
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
                                <th>رمز الكوبون</th>
                                <th>الصلاحية</th>
                                <th>النوع</th>
                                <th>الكمية المسموحة</th>
                                <th>الكمية المستخدمة</th>
                                <th>الحالة</th>
                                <th>تاريخ الانشاء</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="checkbox" name="delete_select" value="{{$coupon->id}}" class="delete_select">
                                    </td>
                                    <td>{{ $coupon->coupon_code }} </td>
                                    
                                    <td>
                                    {{ $coupon->coupon_validity == 'permanent' ? trans('messages.permanent') : trans('messages.custom')}}
                                    </td>
                            
                                    <td>
                                    {{ $coupon->coupon_type == 'cash' ? trans('messages.cash') : trans('messages.percentage')}}
                                    </td>
                                    <td>
                                    {{ $coupon->count_coupon_limit }}
                                    </td>
                                    <td>
                                    {{ $coupon->used }}
                                    </td>
                                
                                    <td>
                                        <div
                                            class="dot-label bg-{{$coupon->status == 'Active' ? 'success':'danger'}} ml-1"></div>
                                        {{$coupon->status == 'Active' ? trans('form_trans.Enabled'):trans('form_trans.Not_enabled')}}
                                    </td>

                                    <td>{{ $coupon->created_at->diffForHumans() }}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('form_trans.process')}}<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('coupon.edit',$coupon->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>

                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$coupon->id}}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;تغير الحالة</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$coupon->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @include('Dashboard.coupon.delete')
                                <!-- @include('Dashboard.coupon.delete_select') -->

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
