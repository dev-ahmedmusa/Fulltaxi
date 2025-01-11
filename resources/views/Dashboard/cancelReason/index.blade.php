@extends('Dashboard.layouts.master')
@section('title')
    اسباب الالغاء
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
							<h4 class="content-title mb-0 my-auto">اسباب الالغاء</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض الكل</span>
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
                                           إضافة سبب إلغاء جديد
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-md-nowrap" id="example1">
                                            <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">السبب</th>
                                                <th class="wd-15p border-bottom-0">مخصص ل</th>
                                                <th class="wd-20p border-bottom-0">الحالة</th>
                                                <th class="wd-20p border-bottom-0">العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($reasons as $cancelReason)
                                               <tr>
                                                   <td>{{$loop->iteration}}</td>
                                                   <td><a href="">{{$cancelReason->reason}}</a> </td>
                                                   <td>{{$cancelReason->for_user}}</td>
                                                
                                                   <td>
                                        <div
                                            class="dot-label bg-{{$cancelReason->status == 1 ? 'success':'danger'}} ml-1"></div>
                                        {{$cancelReason->status == 1 ? trans('form_trans.Enabled'):trans('form_trans.Not_enabled')}}
                                    </td>
                                                   
                                                   <td>{{ $cancelReason->created_at->diffForHumans() }}</td>
                                                   <td>
                                                       <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$cancelReason->id}}"><i class="las la-pen"></i></a>
                                                       <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$cancelReason->id}}"><i class="las la-trash"></i></a>
                                                   </td>
                                               </tr>

                                               @include('Dashboard.cancelReason.edit')
                                               @include('Dashboard.cancelReason.delete')

                                           @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div>
                        <!--/div-->

                    @include('Dashboard.cancelReason.add')
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
