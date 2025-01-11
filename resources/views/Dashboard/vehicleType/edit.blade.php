@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

    <!-- Internal Select2 css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('Dashboard/plugins/time-picker/bootstrap-clockpicker.css')}}" rel="stylesheet">

@section('title')
   إضافة المركبات
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> المركبات</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
               إضافة مركبة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @include('Dashboard.messages_alert')
				<!-- row -->
        <form method="POST" action="{{ route('vehicleType.update', 'test') }}" enctype="multipart/form-data">
        {{ method_field('patch') }}
        {{ csrf_field() }}
                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">

								<div class="main-content-label mg-b-5">
									تحديد نوع الخدمة
								</div>
								
								<div class="row row-sm mg-b-20">
									<div class="col-lg-4">
										<select class="form-control select2-no-search" name="service_type_id">
											<option label="Choose one">
												-------------
											</option>
											@foreach($serviceType as $service)
											<option value="{{$service->id}}" {{$service->id == $vehicle->service_type_id ? "selected" : ""}}>
											{{ $service->name}}
											</option>
											@endforeach
										
										</select>
									</div><!-- col-4 -->
								
								
								</div>



                  </div>
                    </div>
                </div>
				<div class="row row-sm">
					<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<h4 class="card-title mb-1">الخدمات</h4>
								<p class="mb-2">انواع المركبات</p>
							</div>
							<div class="card-body pt-0">
								
									<div class="form-group">
									<label for="exampleInputEmail1"> الاسم </label>
										<input type="text" class="form-control" name="name" value="{{$vehicle->name}}">
									</div>
									
<input type="hidden" name="id" value="{{$vehicle->id}}">

									<div class="form-group">
									<label for="exampleInputEmail1"> الوصف  </label>
										<input type="text" class="form-control" name="note" value="{{$vehicle->note}}">
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1"> عدد الركاب </label>
										<input type="number" class="form-control" name="person_size" value="{{$vehicle->person_size}}">
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1"> البحث في النطاق الدائري بالكيلومتر </label>
										<input type="number" class="form-control" name="radius" value="{{$vehicle->radius}}">
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1">  وقت الانتظار بالدقائق</label>
										<input type="number" class="form-control" name="waiting_feet_time_limit" value="{{$vehicle->waiting_feet_time_limit}}">
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1">    نسبة خصم الشركة للخدمة</label>
										<input type="number" class="form-control" name="trip_deduction_percent" value="{{$vehicle->trip_deduction_percent}}">
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1">    قيمة خصم الشركة للخدمة</label>
										<input type="text" class="form-control" name="trip_deduction_amount"  value="{{$vehicle->trip_deduction_amount}}">
									</div>
								
								
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
						<div class="card  box-shadow-0 ">
							<div class="card-header">
								<h4 class="card-title mb-1">التسعيرة</h4>
								
							</div>
							<div class="card-body pt-0">
								
									<div class="">
										<div class="form-group">
											<label for="exampleInputEmail1">اقل سعر للمشوار</label>
											<input type="text" class="form-control" name="minPrice"value=" {{$vehicle->minPrice}} ">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">التعرفة الاساسية</label>
											<input type="text" class="form-control" name="baseFare"value=" {{$vehicle->baseFare}}">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">  التعرفة للكيلومتر</label>
											<input type="text" class="form-control"  name="pricePerKM"value="{{$vehicle->pricePerKM}}">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">التعرفة لكل دقيقة</label>
											<input type="text" class="form-control" name="pricePerMin"value="{{$vehicle->pricePerMin}}">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">التعرفة لكل دقيقة انتظار</label>
											<input type="text" class="form-control" name="waiting_fees"value=" {{$vehicle->waiting_fees}}">
										</div>
									</div>
								
							</div>
						</div>
					</div>
				 </div>
				 <!-- row -->

				
				 <div class="row">
				   <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
						<!--div-->
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									تحديد اوقات الذروة
								</div>
								<div class="">
										<div class="form-group">
											<label for="exampleInputEmail1">بداية وقت ذروة النهار</label>
											<div class="input-group col-md-6">
										<div class="input-group-prepend">
										
										</div><input class="form-control" name="daySurgeStart" type="time" value="{{$vehicle->daySurgeStart}}">
								
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1"> نهاية وقت ذروة النهار</label>
											<div class="input-group col-md-6">
										<div class="input-group-prepend">
											<!-- <div class="input-group-text">
												<i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
											</div> -->
										</div><input class="form-control"  name="daySurgeEnd" type="time"  value="{{$vehicle->daySurgeEnd}}">
								
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">  بداية وقت ذروة الليل </label>
											<div class="input-group col-md-6">
										<div class="input-group-prepend">
											<!-- <div class="input-group-text">
												<i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
											</div> -->
										</div><input class="form-control"  name="nightSurgeStart" type="time" value="{{$vehicle->nightSurgeStart}}">
								
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">نهاية وقت ذروة الليل  </label>
										
										<div class="input-group col-md-6">
										<div class="input-group-prepend">
											<!-- <div class="input-group-text">
												<i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
											</div> -->
										</div><input class="form-control"  name="nightSurgeEnd" type="time" value="{{$vehicle->nightSurgeEnd}}">
								
											</div>
										</div>
									</div>
								
								
							
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
						<!--div-->
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									تحديد تسعيرة اوقات الذروة
								</div>
								<div class="">
										<div class="form-group">
											<label for="exampleInputEmail1">تسعيرة الكيلومتر وقت ذروة النهار</label>
											<input type="text" class="form-control" name="daySurgepriceKM" value="{{$vehicle->daySurgepriceKM}}">
										</div>
										
										
										<div class="form-group">
											<label for="exampleInputPassword1">تسعيرة الكيلومتر  وقت ذروة الليل   </label>
											<input type="text" class="form-control" name="nightSurgepriceKM"value="{{$vehicle->nightSurgepriceKM}}">
										</div>
									</div>
								
								
							
							</div>
						</div>
					</div>
				 </div>
				
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									رفع صورة الخدمة
								</div>
								<p class="mg-b-20">رفع صورة للخدمة بالمقاسات </p>
								<div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        {{ trans('form_trans.image') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input type="file" accept="image/*" name="image"  onchange="loadFile(event)">
                                    <img style="border-radius:50%" width="150px" height="150px" id="output"/>
                                </div>
                            </div>
							</div>
						</div>
					</div>
					<!--/div-->

					<!--div-->
				
					<div class="col-lg-6 mg-t-20 mg-lg-t-0">
					<button type="submit"
					class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{ trans('form_trans.submit') }}</button>	
				   </div>
		

				



			

					<!--div-->
				
				</div>
				<!-- row closed -->
			 </div>
			<!-- Container closed -->
		</form>
	</div>
		<!-- main-content closed -->
@endsection
@section('js')

<script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

// $('#clockpicker').clockpicker({
//     placement: 'top',
//     align: 'left',
//     donetext: 'Done'
// });
$('.clockpicker').datetimepicker({format: 'HH:mm:ss', pickDate:false });
    </script>

<!--Internal  Datepicker js -->
<script src="{{URL::asset('Dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('Dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('Dashboard/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('Dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('Dashboard/plugins/pickerjs/picker.min.js')}}"></script>
<!--Internal  timepicker js -->
<script src="{{URL::asset('Dashboard/plugins/time-picker/jquery-clockpicker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('Dashboard/js/form-elements.js')}}"></script>
@endsection