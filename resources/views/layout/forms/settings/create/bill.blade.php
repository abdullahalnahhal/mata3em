<form action="{{route('settings.bill.new')}}" method="post" accept-charset="utf-8" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="row clearfix">
      <div class="col-sm-3">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="number" name='delivery' class="form-control"  step='0.00001'  maxlength='200' value='{{$settings['delivery']??0}}'>
                  <label class="form-label">@lang('settings.Delivery Service Value')</label>
              </div>
          </div>
      </div>
      <div class="col-sm-3">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="number" name='tax_value' class="form-control"  step='0.00001' maxlength='200' value='{{$settings['tax_value']??0}}'>
                  <label class="form-label">@lang('settings.Tax By Value')</label>
              </div>
          </div>
      </div>
      <div class="col-sm-3">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="number" name='tax_percentage' class="form-control"  step='0.00001' value='{{$settings['tax_percentage']??0}}'>
                  <label class="form-label">@lang('settings.Tax By Percentage')</label>
               </div>
          </div>
       </div>
       <div class="col-sm-3">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="number" name='page_width' class="form-control" step='0.00001' value='{{$settings['page_width']??0}}'>
                  <label class="form-label">@lang('settings.Page Width')</label>
              </div>
          </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group form-float ">
            <div class="form-line">
                <br>
                <input type="number" name='padding_width' class="form-control" step='0.00001' value='{{$settings['padding_width']??0}}'>
                <label class="form-label">@lang('settings.Internal Spacing')</label>
            </div>
        </div>
     </div>
     <div class="col-sm-3">
       <div class="form-group form-float ">
           <div class="form-line">
               <br>
               <input type="number" name='font_size' class="form-control" step='0.00001' value='{{$settings['font_size']??0}}'>
               <label class="form-label">@lang('settings.Font Size')</label>
           </div>
       </div>
    </div>
    <div class="col-sm-3">
      <div class="form-group form-float ">
          <div class="form-line">
              <br>
              <input type="text" name='welcome_word' class="form-control"  value='{{$settings['welcome_word']??''}}'>
              <label class="form-label">@lang('settings.Welcome word')</label>
          </div>
      </div>
   </div>
   <div class="col-sm-3">
     <div class="form-group form-float ">
         <div class="form-line">
             <br>
             <input type="file" name='logo' class="form-control">
             <label class="form-label">@lang('settings.Logo')</label>
         </div>
     </div>
  </div>
    <div class="col-sm-3">
      <div class="form-group form-float ">
          <div class="form-line">
              <br>
              <input type="number" name='borders_size' class="form-control" step='0.00001' value='{{$settings['borders_size']??0}}'>
              <label class="form-label">@lang('settings.Borders Size')</label>
          </div>
      </div>
   </div>
     <div class="col-sm-2">
         <br>
         <br>
         @if(!isset($settings['barcode']) || !$settings['barcode'])
         <input type="checkbox" id="barcode" name="barcode" value='1' class="filled-in">
         @else
         <input type="checkbox" id="barcode" name="barcode" value='1' class="filled-in" checked>
         @endif
         <label for="barcode"><b>@lang('common.Make Bar Code')</b></label>
     </div>

  </div>
  <br>
  <button type="submit" class="btn btn-block btn-lg btn-info waves-effect">
      <i class="material-icons">save</i>
      <span>@lang('common.Save')</span>
  </button>
</form>
