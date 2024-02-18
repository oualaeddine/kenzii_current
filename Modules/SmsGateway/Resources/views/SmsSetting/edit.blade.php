<div
        class="modal text-left"
        id="edit_sms_setting{{$id}}"
        tabindex="-1"
        role="dialog"
        aria-labelledby="edit_sms_setting{{$id}}"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit_sms_setting{{$id}}">Edit product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="modal-content pt-0" method="POST" action="{{route('sms_setting.update',$id)}}" >
                @csrf
                @method('PUT')
              
                <div class="modal-body">


                    <div class="row">
                            <div class="form-group col-md-12 text-right" dir="rtl">
                                <label class="form-label" for="text-edit" >Text</label>
                                
                                <textarea name="text" id="text-edit" class="form-control" cols="30" rows="4">{{$text}}</textarea>

                            </div>
                    </div>

                    <div class="row">
                        <div class=" form-group col-md-5">

                            <label class="form-label" for="status-edit">Status</label>
       
                            <input type="text" name="status" id="status-edit"  placeholder="put status" value="{{$status}}" required class="form-control">

                        </div>

                        <div class="form-group col-md-5">

                               <label class="form-label" for="is_active-edit">is active</label>
       
                                {{-- <div class="custom-control custom-control-primary custom-switch text-center"> --}}
                                    <input type="checkbox" name="is_active" id="is_active-edit" value="1" @if($is_active) checked="" @endif 
                                        class="form-control">
                                    {{-- <label class="custom-control-label" for="customSwitch3">is active</label> --}}
                                {{-- </div> --}}
                        
                        </div>
                 
                       
                    </div>

                    


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success data-submit mr-1" >
                       Save Changes
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>