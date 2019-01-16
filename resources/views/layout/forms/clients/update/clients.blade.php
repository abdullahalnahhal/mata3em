<form action="{{route('clients.update',['id'=>$client->id])}}" method="post" accept-charset="utf-8" autocomplete="off">
    @csrf
    <div class="row clearfix">
        <div class="col-sm-4">
            <div class="form-group form-float ">
                <div class="form-line">
                    <br>
                    <input type="text" name='name' class="form-control" required aria-required="true" maxlength='200' value='{{$client->name}}'>
                    <label class="form-label">@lang('clients.Client Name')</label>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
           <div class="form-group form-float ">
               <div class="form-line">
                   <br>
                   <input type="text" name='tel1' class="form-control" required aria-required="true" maxlength='30' value='{{$client->tel1}}'>
                   <label class="form-label">@lang('clients.Client Telephone 1')</label>
               </div>
           </div>
       </div>
       <div class="col-sm-4">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="text" name='tel2' class="form-control" maxlength='30' value='{{$client->tel2??''}}'>
                  <label class="form-label">@lang('clients.Client Telephone 2')</label>
              </div>
          </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-sm-12">
          <div class="form-group form-float ">
              <div class="form-line">
                  <textarea type="text" name='address' class="form-control no-resize" required aria-required="true" resize='false'>{{$client->address}}</textarea>
                  <label class="form-label">@lang('clients.Client Address')</label>
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
