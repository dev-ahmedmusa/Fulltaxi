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
   
@section('title')
   إضافةالكباتن
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{trans('pages_trans.clients')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
               إضافة كابتن \ سائق</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @include('Dashboard.messages_alert')
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									تسجيل كابتن 
								</div>
							
								
                                         <form action="{{route('drivers.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                                <h3>البيانات الاساسية</h3>
                        
                            <div class="pd-30 pd-sm-40 ">

                                <div class="row row-xs align-items-center mg-b-20">
            
                                    <label for="exampleInputEmail1">
                                        {{ trans('form_trans.first_name') }}</label>
            
                                    <div class="col-md-5 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="first_name" type="text" autofocus>
                                        @error('first_name') <span class="text-red-600">{{ $message }}</span> @enderror
            
                                    </div>
            
            
                                    <label for="exampleInputEmail1">
                                        {{ trans('form_trans.last_name') }}</label>
            
                                    <div class="col-md-5 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="last_name" type="text" autofocus>
                                        @error('last_name') <span class="text-red-600">{{ $message }}</span> @enderror
                                    </div>
            
                                </div>
                                <div class="row row-xs align-items-center mg-b-20">
            
            
                                    <label for="exampleInputEmail1">
                                        اختر الدولة
                                    </label>
                                    <div class="col-md-4 mg-t-5 mg-md-t-0">
                                        <select name="country_code" class="form-control">
                                            @error('country_code') <span class="text-red-600">{{ $message }}</span> @enderror
                                            <option label="Choose one">
                                            </option>
            
                                            @foreach ($countries as $country)
                                                <option value="{{ $country['dial_code'] }}">
                                                    {{ $country['name'] }} {{ $country['dial_code'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
            
                                    
                                        <label for="exampleInputEmail1">
                                            {{ trans('form_trans.phone') }}</label>
                                   
                                    <div class="col-md-6 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="phone" type="tel">
                                        @error('phone') <span class="text-red-600">{{ $message }}</span> @enderror
                                    </div>
            
            
            
            
            
            
                                </div>
                                <div class="row row-xs align-items-center mg-b-20">
            
                                    <label for="exampleInputEmail1">
                                        البريد الالكتروني</label>
            
                                    <div class="col-md-5 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="email" type="email" autofocus>
                                        @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
                                    </div>
            
            
                                    <label for="exampleInputEmail1">
                                        كلمة المرور</label>
            
                                    <div class="col-md-4 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="password" type="password" autofocus>
                                        @error('password') <span class="text-red-600">{{ $message }}</span> @enderror
                                    </div>
            
                                </div>
            
            
            
            
            
            
                                <div class="row row-xs align-items-center mg-b-20">
                                    
                                        <label for="exampleInputEmail1">
                                            {{ trans('form_trans.gender') }}
                                        </label>
                                    
                                    <div class="col-md-5 mg-t-5 mg-md-t-0">
                                        <select name="gender" class="form-control">
                                            @error('gender') <span class="text-red-600">{{ $message }}</span> @enderror
                                            <option label="Choose one">
                                            </option>
                                            <option value="male">
                                                {{ trans('form_trans.male') }}
                                            </option>
                                            <option value="female">
                                                {{ trans('form_trans.female') }}
                                            </option>
            
                                        </select>
                                    </div>
                                </div>
            
                        </div>
                       
                        <h3>بيانات المركبة </h3>
                        
                            <div class="row row-xs align-items-center mg-b-20">
    
                                <label for="exampleInputEmail1">
                                    الشركة المصنعة</label>
        
                               
                                    
                                    <div class="col-md-5 mg-t-5 mg-md-t-0">
                                        <select name="make_id" class="form-control">
                                            @error('make_id') <span class="text-red-600">{{ $message }}</span> @enderror
                                            <option label="Choose one">
                                            </option>
                                            <option value="1">
                                          تويوتا
                                            </option>
                                            <option value="2">
                                                هيونداي
                                                  </option>
                                                  <option value="3">
                                                    نيسان
                                                      </option>
            
                                        </select>
                                    </div>
                                    <label for="exampleInputEmail1">
                                        الموديل</label>
            
                                        <div class="col-md-5 mg-t-5 mg-md-t-0">
                                            <select name="vehicle_model_id" class="form-control">
                                                @error('vehicle_model_id') <span class="text-red-600">{{ $message }}</span> @enderror
                                                <option label="Choose one">
                                                </option>
                                                <option value="1">
                                              كامري
                                                </option>
                                                <option value="2">
                                                   اكسنت
                                                      </option>
                                                      <option value="3">
                                                        التيما
                                                          </option>
                
                                            </select>
                                        </div>
                                </div>
                                <div class="row row-xs align-items-center mg-b-20">
                                    <label for="exampleInputEmail1">
                                        سنة التصنيع</label>
             
                                     <div class="col-md-5 mg-t-5 mg-md-t-0">
                                         <input class="form-control" name="year" type="text" autofocus>
                                         @error('year') <span class="text-red-600">{{ $message }}</span> @enderror
             
                                     </div>
             
             
                                     <label for="exampleInputEmail1">
                                         اللون</label>
             
                                     <div class="col-md-5 mg-t-5 mg-md-t-0">
                                         <input class="form-control" name="color" type="text" autofocus>
                                         @error('color') <span class="text-red-600">{{ $message }}</span> @enderror
                                     </div>
             
                                 
             
                                
        
                                </div>
                                <div class="row row-xs align-items-center mg-b-20">
    
                                    <label for="exampleInputEmail1">
                                        رقم اللوحة</label>
            
                                    <div class="col-md-5 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="plate_number" type="text" autofocus>
                                        @error('plate_number') <span class="text-red-600">{{ $message }}</span> @enderror
            
                                    </div>
            
            
                                   
                                </div>
                           
    
                        
                        <h3>إرفاق المستندات</h3>
                        
                            


                            <div class="row">
                                @foreach ($documents as $doc)
                                    
                              
                                <div class="col-sm-6">
                                    
                                        
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div>
                                                            <h6 class="card-title mb-1">{{$doc->name}}</h6>
                                                            
                                                        </div>
                                                        
                                                        
                                                        <div class="row mb-4">
                                                            <div class="col-sm-12 col-md-4">
                                                              
                                                                <input type="file" accept="image/*" name="{{$doc->doc_type}}" onchange="loadFile(event)">
                                                                <img style="border-radius:50%" width="150px" height="150px" id="{{$doc->id}}"/>
                                                            </div>
                                                            
                                                         
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                       
                                  
                                </div>
                                <input type="hidden" name="documents_count" value="{{$documents_count}}">
                                @endforeach
                              
                            </div>
                         
                           
                       
                        <button type="submit"
                        class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{ trans('form_trans.submit') }}</button>
                    </form>
								
							</div>
						</div>
					</div>
					
				</div>
				<!-- /row -->

				
				<!-- row closed -->
			
        @endsection
@section('js')

    <script>
        var loadFile = function(event) {
            
            // var id = document.getElementById('imageID').val;
            var output = document.getElementById('output');
            // console.log(id);
            
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
           
        };
    </script>

    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('Dashboard/js/select2.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/advanced-form-elements.js') }}"></script>

    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('Dashboard/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!--Internal  Select2 js -->
    <script src="{{URL::asset('Dashboard/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Jquery.steps js -->
    <script src="{{URL::asset('Dashboard/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!--Internal  Form-wizard js -->
    <script src="{{URL::asset('Dashboard/js/form-wizard.js')}}"></script>
   


@endsection