<!-- Modal -->
<div class="modal fade" id="edit{{ $cancelReason->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل الاقسام</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cancelReason.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">الاسم</label>
                  
                    <input type="text" name="reason" value="{{ $cancelReason->reason }}" class="form-control">
                </div>
                <div class="row row-sm mg-b-20">
                <div class="col-lg-6">
										<p class="mg-b-10">      تحديد سبب الالغاء يظهر ل</p>
                                        <select name="for_user" class="form-control select2-no-search">
											<option label="Choose one">
											</option>
                                    
											<option value="Passenger" {{$cancelReason->for_user == 'Passenger' ? 'selected' : ''}}>
                                        {{$cancelReason->for_user == 'Passenger'? 'العملاء' : 'الكباتن' }}
											</option>
											<option value="Driver" {{$cancelReason->for_user == 'Driver' ? 'selected' : ''}}>
                                            {{$cancelReason->for_user == 'Driver'? 'الكباتن' : 'العملاء' }}
											</option>
										</select>
									</div><!-- col-4 -->				
                                    
                                    
                                    
									
                            </div>
                            <input type="hidden" name="id" value="{{ $cancelReason->id }}">
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-success">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
