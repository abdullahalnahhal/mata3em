<form action="{{route('clients.create',['order'=>1])}}" method="post" accept-charset="utf-8" autocomplete="off">
    @csrf
    <div class="row clearfix">
        <div class="col-sm-12">
            <div class="form-group form-float">
                <div class="form-line">
                    <br>
                    <input type="text" name='name' id='name' class="form-control" required aria-required="true" maxlength='200' value='{{old('name')}}'>
                    <label class="form-label">@lang('orders.Client Name')</label>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group form-float">
                <div class="form-line">
                    <br>
                    <input type="text" name='tel1' id='phone' class="form-control" required aria-required="true" value='{{old('phone')}}'>
                    <label class="form-label">@lang('orders.Client Phone')</label>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group form-float">
                <div class="form-line">
                    <br>
                    <input type="text" name='address' id='address' class="form-control" required aria-required="true" value='{{old('address')}}'>
                    <label class="form-label">@lang('orders.Client Address')</label>
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
