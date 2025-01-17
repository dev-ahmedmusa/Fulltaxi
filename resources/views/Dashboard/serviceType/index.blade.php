@extends('Dashboard.layouts.master')
@section('title')
    {{trans('Dashboard/main-sidebar_trans.section')}}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">انواع الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض الكل</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')
				<!-- row -->
                    <!-- row opened -->
                    <div class="row row-sm">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                                           إضافة نوع خدمة جديد
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-md-nowrap" id="example1">
                                            <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">الاسم</th>
                                                <th class="wd-15p border-bottom-0">صورة</th>
                                                <th class="wd-15p border-bottom-0">الوصــف</th>
                                               
                                                <th class="wd-20p border-bottom-0">الحالة</th>
                                                <th class="wd-20p border-bottom-0">العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($serviceTypes as $serviceType)
                                               <tr>
                                                   <td>{{$loop->iteration}}</td>
                                                   <td><a href="{{route('serviceType.show',$serviceType->id)}}">{{$serviceType->name}}</a> </td>
                                                   <td>
                                        @if($serviceType->image)
                                            <img src="{{URL::asset('uploadAttachment/'.$serviceType->image)}}" data-src="{{URL::asset('uploadAttachment/'.$serviceType->image)}}"
                                                 height="50px" width="50px" alt="">

                                        @else
                                            <img src="{{Url::asset('Dashboard/img/doctor_default.png')}}" height="50px"
                                                 width="50px" alt="">
                                        @endif
                                    </td>
                                                   <td>{{ \Str::limit($serviceType->note, 50) }}</td>
                                                   <td>{{ $serviceType->created_at->diffForHumans() }}</td>
                                                   <td>
                                                       <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$serviceType->id}}"><i class="las la-pen"></i></a>
                                                       <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$serviceType->id}}"><i class="las la-trash"></i></a>
                                                   </td>
                                               </tr>

                                               @include('Dashboard.serviceType.edit')
                                               @include('Dashboard.serviceType.delete')

                                           @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div>
                        <!--/div-->

                    @include('Dashboard.serviceType.add')
                    <!-- /row -->

				</div>
				<!-- row closed -->

			<!-- Container closed -->

		<!-- main-content closed -->
@endsection
@section('js')


    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
