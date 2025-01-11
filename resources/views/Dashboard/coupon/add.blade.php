@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/toggle-switch/toggle.min.css')}}" rel="stylesheet">

    <!-- Internal Select2 css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">

@section('title')
   إضافة الكوبونات
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الكوبونات</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
               إضافة كوبون</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @include('Dashboard.messages_alert')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<h4 class="card-title mb-1">الكوبونات</h4>
							</div>
							<div class="card-body pt-0">
								<form class="form-horizontal" action="{{ route('coupon.store') }}" method="post" autocomplete="off">
                                {{ csrf_field() }}
                                    <label>رمز الكوبون</label>
									<div class="form-group">
										<input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="كود الكوبون">
                                      
									
											
											
										    <a onClick="randomStringToInput(this)" class="btn btn-success">توليد رمز عشوائي
  
</a>
									</div>
									<div class="form-group">
                                        <label>وصف الكوبون</label>
                                        <textarea class="form-control" name="coupon_description" placeholder="Textarea" rows="3"></textarea>
									</div>
									<!-- <div class="form-group">
                                    
										<p>الكوبون مخصص ل</p><select class="form-control select2-no-search">
											<option label="Choose one">
											</option>
											<option value="Firefox">
												العملاء
											</option>
											<option value="Chrome">
												الكباتن
											</option>
										
										</select>
								
									</div> -->
                                    <div class="form-group">
                                    
                                       <p>  نوع الكوبون</p><select class="form-control select2-no-search" name="coupon_type">
                                        <option label="Choose one">
                                        </option>
                                        <option value="cash">
                                            قيمة نقدية
                                        </option>
                                        <option value="percentage">
                                           نسبة
                                        </option>
                                    
                                    </select>
                            
                                </div>
                                <label> الخصم</label>
									<div class="form-group">
										<input type="number" class="form-control" id="discount_value" name="discount_value" placeholder="الخصم">

									</div>
                                <div class="row">
                                
                                    <label>صلاحية الكوبون</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 mg-t-20 mg-lg-t-0">
										<label class="rdiobox"><input  id="permanent" name="coupon_validity" onClick="showhidedate(this.value)" value="permanent" type="radio"> <span>دائم</span></label>
									</div>
                                    <div class="col-lg-3 mg-t-20 mg-lg-t-0">
										<label class="rdiobox"><input  id="custom" name="coupon_validity" onClick="showhidedate(this.value)" value="custom" type="radio"> <span>مخصص</span></label>
									</div>
								</div>

                  <div id="dateEx1" style="display:none">

								<div class="main-content-label mg-b-5">
								تاريخ بداية صلاحية الكوبون
								</div>
								
								<div class="row row-sm mg-b-20">
									<div class="input-group col-md-6">
										<div class="input-group-prepend">
											
										</div><input class="form-control" id="dateStartExpire" name="start_date" placeholder="MM/DD/YYYY" type="date">
									</div>
								</div><!-- wd-200 -->
                              
								<div class="main-content-label mg-b-5">
								تاريخ نهاية صلاحية الكوبون
								</div>
								
								<div class="row row-sm mg-b-20">
									<div class="input-group col-md-6">
										<div class="input-group-prepend">
											
										</div><input class="form-control" id="dateEndExpire" name="expire_date" placeholder="MM/DD/YYYY" type="date">
									</div>
								</div><!-- wd-200 -->
</div>
                                <label> الكمية</label>
									<div class="form-group">
										<input type="number" class="form-control" id="count_coupon" name="count_coupon_limit" placeholder="كمية الكوبونات">
                                    
									
									</div>
                                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status">
                                    <label class="custom-control-label" for="customSwitch1">الحالة</label>
                                </div>

                                                            
                                </div>
								
							</div>
						</div>
					</div>
						

							</div>
                            <button type="submit"
                                    class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{ trans('form_trans.submit') }}</button>
                        </div>
								</form>
							</div>
						</div>
					</div>
					
				</div>
				<!-- row -->

				<!-- row -->
			
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
       
   <script >
  
                    //$('input:radio[name=validity_type][value=permanent]').attr('checked', true);
                    window.onload = function() {
            
            document.getElementById('permanent').checked = true;
            document.getElementById('custom').checked = false;

                };

                $('.fc-datepicker').datetimepicker({format: 'yyyy-mm-dd', pickTime:false });
     
        // $('#all').click(function(){
        //     if($('#all').is(":checked")) {
        //         $('#count').val('');
        //         $('#count').prop('readonly', true);
        //         $('#count').prop('required', false);  
        //     }else {
        //         $('#count').prop('readonly', false);
        //         $('#count').prop('required', true);  
        //     } ;
        // })

        // $('#validity_type').click(function(){
        //     if($('#validity_type').is(":checked")) {
            function showhidedate(val) {
            //     $('#dateStartExpire').val('');
            //     $('#dateEndExpire').prop('readonly', true);
            // }else {
            //     $('#dateStartExpire').prop('readonly', false);
            // } ;
            if(val == "custom"){
                document.getElementById("dateEx1").style.display = '';
                document.getElementById('permanent').checked = false;
            }
else{
    document.getElementById("dateEx1").style.display = 'none'; 
    document.getElementById('custom').checked = false;  
}
           
                    // document.getElementById("date2").style.display = '';
                    // document.getElementById("dActiveDate").lang = '*';
                    // document.getElementById("dExpiryDate").lang = '*';
            }
        // })

        function randomStringToInput(clicked_element)
            {
                var self = $(clicked_element);
                var random_string = generateRandomString(6);
                $('input[name=coupon_code]').val(random_string);

            }
            function generateRandomString(string_length)
            {
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                var string = '';
                for (var i = 0; i <= string_length; i++)
                {
                    var rand = Math.round(Math.random() * (characters.length - 1));
                    var character = characters.substr(rand, 1);
                    string = string + character;
                }
                return string;
            }
         
    </script> 

@endsection
@section('js')

<!--Internal  Datepicker js -->
<script src="{{URL::asset('Dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('Dashboard/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal toggle-switch.min js -->
<script src="{{URL::asset('Dashboard/plugins/toggle-switch/toggle.min.js')}}"></script>

<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('Dashboard/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->

@endsection