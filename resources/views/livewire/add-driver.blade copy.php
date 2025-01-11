<div>
    <!-- row -->
    <div class="row">
        @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

   
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <div id="wizard1">
                        @if ($step === 1)
                        <h3>البيانات الاساسية</h3>
                        <section>
                            <div class="pd-30 pd-sm-40 bg-gray-200">

                                <div class="row row-xs align-items-center mg-b-20">

                                    <label for="exampleInputEmail1">
                                        {{ trans('form_trans.first_name') }}</label>

                                    <div class="col-md-5 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="first_name" type="text" autofocus>
                                    </div>


                                    <label for="exampleInputEmail1">
                                        {{ trans('form_trans.last_name') }}</label>

                                    <div class="col-md-5 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="last_name" type="text" autofocus>
                                    </div>

                                </div>
                                <div class="row row-xs align-items-center mg-b-20">


                                    <label for="exampleInputEmail1">
                                        اختر الدولة
                                    </label>
                                    <div class="col-md-4 mg-t-5 mg-md-t-0">
                                        <select name="country_code" class="form-control">
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
                                    </div>






                                </div>
                                <div class="row row-xs align-items-center mg-b-20">

                                    <label for="exampleInputEmail1">
                                        البريد الالكتروني</label>

                                    <div class="col-md-5 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="email" type="email" autofocus>
                                    </div>


                                    <label for="exampleInputEmail1">
                                        كلمة المرور</label>

                                    <div class="col-md-4 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="password" type="password" autofocus>
                                    </div>

                                </div>






                                <div class="row row-xs align-items-center mg-b-20">
                                    
                                        <label for="exampleInputEmail1">
                                            {{ trans('form_trans.gender') }}
                                        </label>
                                    
                                    <div class="col-md-5 mg-t-5 mg-md-t-0">
                                        <select nam="gender" class="form-control">
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

                        </section>
                        @endif
                        <h3>بيانات المركبة</h3>
                        <section>
                            <div class="table-responsive mg-t-20">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Cart Subtotal</td>
                                            <td class="text-right">$792.00</td>
                                        </tr>
                                        <tr>
                                            <td><span>Totals</span></td>
                                            <td class="text-right text-muted"><span>$792.00</span></td>
                                        </tr>
                                        <tr>
                                            <td><span>Order Total</span></td>
                                            <td>
                                                <h2 class="price text-right mb-0">$792.00</h2>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <h3>رفع المستندات</h3>
                        <section>
                            <div class="form-group">
                                <label class="form-label">CardHolder Name</label>
                                <input type="text" class="form-control" id="name1" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Card number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-append">
                                        <button class="btn btn-info" type="button"><i class="fab fa-cc-visa"></i>
                                            &nbsp; <i class="fab fa-cc-amex"></i> &nbsp;
                                            <i class="fab fa-cc-mastercard"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group mb-sm-0">
                                        <label class="form-label">Expiration</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="MM"
                                                name="expiremonth">
                                            <input type="number" class="form-control" placeholder="YY"
                                                name="expireyear">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 ">
                                    <div class="form-group mb-0">
                                        <label class="form-label">CVV <i class="fa fa-question-circle"></i></label>
                                        <input type="number" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /row -->

    <!-- row -->

    <!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
