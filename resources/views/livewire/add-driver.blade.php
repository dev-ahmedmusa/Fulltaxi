
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
    
        @if (session()->has('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded">
                {{ session('success') }}
            </div>
        @endif
    
       
            <div class="formbold-steps">
                <ul>
                    <li class="formbold-step-menu1 {{$step === 1 ? 'active' : ''}}">
                        <span >1</span>
                        البيانات الاساسية
                    </li>
                    <li class="formbold-step-menu2 {{$step === 2 ? 'active' : ''}}">
                        <span >2</span>
                       بيانات المركبة
                    </li>
                    <li class="formbold-step-menu3 {{$step === 3 ? 'active' : ''}}">
                        <span >3</span>
                        رفع المستندات
                    </li>
                </ul>
            </div>
        
    
        @if ($step === 1)
            <div>

                <div class="pd-30 pd-sm-40 bg-gray-200">

                    <div class="row row-xs align-items-center mg-b-20">

                        <label for="exampleInputEmail1">
                            {{ trans('form_trans.first_name') }}</label>

                        <div class="col-md-5 mg-t-5 mg-md-t-0">
                            <input class="form-control" wire:model="personalInfo.first_name" type="text" autofocus>
                            @error('personalInfo.first_name') <span class="text-red-600">{{ $message }}</span> @enderror

                        </div>


                        <label for="exampleInputEmail1">
                            {{ trans('form_trans.last_name') }}</label>

                        <div class="col-md-5 mg-t-5 mg-md-t-0">
                            <input class="form-control" wire:model="personalInfo.last_name" type="text" autofocus>
                            @error('personalInfo.last_name') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="row row-xs align-items-center mg-b-20">


                        <label for="exampleInputEmail1">
                            اختر الدولة
                        </label>
                        <div class="col-md-4 mg-t-5 mg-md-t-0">
                            <select wire:model="personalInfo.country_code" class="form-control">
                                @error('personalInfo.country_code') <span class="text-red-600">{{ $message }}</span> @enderror
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
                            <input class="form-control" wire:model="personalInfo.phone" type="tel">
                            @error('personalInfo.phone') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>






                    </div>
                    <div class="row row-xs align-items-center mg-b-20">

                        <label for="exampleInputEmail1">
                            البريد الالكتروني</label>

                        <div class="col-md-5 mg-t-5 mg-md-t-0">
                            <input class="form-control" wire:model="personalInfo.email" type="email" autofocus>
                            @error('personalInfo.email') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>


                        <label for="exampleInputEmail1">
                            كلمة المرور</label>

                        <div class="col-md-4 mg-t-5 mg-md-t-0">
                            <input class="form-control" wire:model="personalInfo.password" type="password" autofocus>
                            @error('personalInfo.password') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                    </div>






                    <div class="row row-xs align-items-center mg-b-20">
                        
                            <label for="exampleInputEmail1">
                                {{ trans('form_trans.gender') }}
                            </label>
                        
                        <div class="col-md-5 mg-t-5 mg-md-t-0">
                            <select wire:model="personalInfo.gender" class="form-control">
                                @error('personalInfo.gender') <span class="text-red-600">{{ $message }}</span> @enderror
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
            </div>
        @endif
    
        @if ($step === 2)
            <div>
               
                
                    <div class="pd-30 pd-sm-40 bg-gray-200">
    
                        <div class="row row-xs align-items-center mg-b-20">
    
                            <label for="exampleInputEmail1">
                                الشركة المصنعة</label>
    
                           
                                
                                <div class="col-md-5 mg-t-5 mg-md-t-0">
                                    <select wire:model="vehicleDetails.gender" class="form-control">
                                        @error('vehicleDetails.make_id') <span class="text-red-600">{{ $message }}</span> @enderror
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
                            </div>
    
    
                            <label for="exampleInputEmail1">
                                الموديل</label>
    
                                <div class="col-md-5 mg-t-5 mg-md-t-0">
                                    <select wire:model="vehicleDetails.gender" class="form-control">
                                        @error('vehicleDetails.vehicle_model_id') <span class="text-red-600">{{ $message }}</span> @enderror
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
                                <input class="form-control" wire:model="vehicleDetails.first_name" type="text" autofocus>
                                @error('vehicleDetails.year') <span class="text-red-600">{{ $message }}</span> @enderror
    
                            </div>
    
    
                            <label for="exampleInputEmail1">
                                اللون</label>
    
                            <div class="col-md-5 mg-t-5 mg-md-t-0">
                                <input class="form-control" wire:model="vehicleDetails.last_name" type="text" autofocus>
                                @error('vehicleDetails.color') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>
    
                        </div>
    
                       
                        <div class="row row-xs align-items-center mg-b-20">
    
                            <label for="exampleInputEmail1">
                                رقم اللوحة</label>
    
                            <div class="col-md-5 mg-t-5 mg-md-t-0">
                                <input class="form-control" wire:model="vehicleDetails.plate_number" type="text" autofocus>
                                @error('vehicleDetails.plate_number') <span class="text-red-600">{{ $message }}</span> @enderror
    
                            </div>
    
    
                           
                        </div>
                    </div>
                </div>
            @endif
    
        @if ($step === 3)
            <div>
                <h2 class="text-xl mb-4">Step 3: Verification</h2>
                <label>ID Photo:</label>
                <input type="file" wire:model="verificationDetails.id_photo" class="block w-full border-gray-300 rounded-md mb-2">
                @error('verificationDetails.id_photo') <span class="text-red-600">{{ $message }}</span> @enderror
    
                <label>Address:</label>
                <textarea wire:model="verificationDetails.address" class="block w-full border-gray-300 rounded-md mb-2"></textarea>
                @error('verificationDetails.address') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        @endif
    
        <div class="mt-4">
            @if ($step > 1)
                <button wire:click="previousStep" class="px-4 py-2 bg-gray-300 rounded">Back</button>
            @endif
            @if ($step < 3)
                <button wire:click="nextStep" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">Next</button>
            @else
                <button wire:click="submit" class="px-4 py-2 bg-green-500 text-white rounded">Submit</button>
            @endif
        </div>
    </div>
    
</div>
</div>
</div>

