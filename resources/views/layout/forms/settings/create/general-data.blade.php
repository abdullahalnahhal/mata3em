<form action="{{route('settings.general-data.new')}}" method="post" accept-charset="utf-8" autocomplete="off">
    @csrf
    <div class="row clearfix">
      <div class="col-sm-4">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="text" name='name' class="form-control" required aria-required="true" maxlength='200' value='{{$settings['name']}}'>
                  <label class="form-label">@lang('settings.Restaurant Name')</label>
              </div>
          </div>
      </div>
      <div class="col-sm-8">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="text" name='address' class="form-control" required aria-required="true" maxlength='200' value='{{$settings['address']}}'>
                  <label class="form-label">@lang('settings.Restaurant Address')</label>
              </div>
          </div>
      </div>
      <div class="col-sm-3">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="text" name='phone1' class="form-control" required aria-required="true"  value='{{$settings['phone1']}}'>
                  <label class="form-label">@lang('settings.Restaurant Phone 1')</label>
               </div>
          </div>
       </div>
       <div class="col-sm-3">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="text" name='phone2' class="form-control"  value='{{$settings['phone2']??''}}'>
                  <label class="form-label">@lang('settings.Restaurant Phone 2')</label>
              </div>
          </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group form-float ">
            <div class="form-line">
                <br>
                <input type="text" name='phone3' class="form-control"  value='{{$settings['phone3']??''}}'>
                <label class="form-label">@lang('settings.Restaurant Phone 3')</label>
            </div>
        </div>
     </div>
     <div class="col-sm-3">
        <div class="form-group form-float ">
            <div class="form-line">
                <br>
                <input type="text" name='phone4' class="form-control"  value='{{$settings['phone4']??''}}'>
                <label class="form-label">@lang('settings.Restaurant Phone 4')</label>
            </div>
        </div>
    </div>

  </div>
  <br>
  <button type="submit" class="btn btn-block btn-lg btn-info waves-effect">
      <i class="material-icons">save</i>
      <span>@lang('common.Save')</span>
  </button>
</form>
