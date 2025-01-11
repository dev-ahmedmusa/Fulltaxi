<!-- Modal -->
<div class="modal fade" id="edit{{ $document->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل ألمستندات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('document.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">الاسم</label>
                    <input type="text" name="name" value="{{$document->name}}" class="form-control">
                </div>
                <div class="modal-body">
                    <label for="exampleInputPassword1">مدة صلاحية المستند بالسنة</label>
                    <input type="number" name="expire_valid_for" value="{{$document->expire_valid_for}}"  class="form-control">
                </div>

                <div class="form-group">
                                    
                                    <p>  نوع المستند</p><select name="doc_type" class="form-control select2-no-search">
                                     <option label="Choose one">
                                     </option>
                                     <option value="Driver" {{$document->doc_type == "Driver" ? 'selected' : ''}}>
                                       كابتن
                                     </option>
                                     <option value="Vehicle" {{$document->doc_type == "Vehicle" ? 'selected' : ''}}>
                                       مركبة
                                     </option>
                                     <option value="Restaurant" {{$document->doc_type == "Restaurant" ? 'selected' : ''}}>
                                       مطعم
                                     </option>
                                 
                                 </select>
                         
                             </div>
<input type="hidden" name="id" value="{{$document->id}}">
                <div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									الحالة 
								</div>
								<div class="main-toggle-group-demo">
									<div class="main-toggle">
										<span></span>
									</div>
									
								</div>
								
							</div>
						</div>

                
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-success">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
