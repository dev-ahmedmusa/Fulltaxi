<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة مستند  جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('document.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">الاسم in English</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="modal-body">
                    <label for="exampleInputPassword1"> الاسم باللغة العربية</label>
                    <input type="text" name="name_ar" class="form-control">
                </div>
                <div class="modal-body">
                    <label for="exampleInputPassword1">مدة صلاحية المستند بالسنة</label>
                    <input type="number" name="expire_valid_for" class="form-control">
                </div>
                <div class="modal-body">
                    <p>
                        يرجي كتابة نوع المستند هكذا مثلا : vehicle_image_back
                    </p>
                    <label for="exampleInputPassword1">مدة صلاحية المستند بالسنة</label>
                    <input type=" text" name="doc_type" class="form-control">
                </div>
                <div class="form-group">
                                    
                                    <p>   المستند خاص ب:</p><select name="doc_for" class="form-control select2-no-search">
                                     <option label="Choose one">
                                     </option>
                                     <option value="Driver">
                                       كابتن
                                     </option>
                                     <option value="Vehicle">
                                       مركبة
                                     </option>
                                     <option value="Restaurant">
                                       مطعم
                                     </option>
                                 
                                 </select>
                         
                             </div>

                             <div class="card">
                                <div class="card-body">
                                    
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status">
                                        <label class="custom-control-label" for="customSwitch1">الحالة</label>
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
