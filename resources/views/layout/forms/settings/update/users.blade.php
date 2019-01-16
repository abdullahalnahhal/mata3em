<form action="{{route('settings.users.update', ['id'=>$user->id])}}" method="post" accept-charset="utf-8" autocomplete="off">
    @csrf
    <div class="row clearfix">
        <div class="col-sm-3">
            <div class="form-group form-float ">
                <div class="form-line">
                    <br>
                    <input type="text" name='name' class="form-control" required aria-required="true" maxlength='200' value='{{$user->name}}'>
                    <label class="form-label">@lang('settings.User Name')</label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group form-float ">
                <div class="form-line">
                    <br>
                    <input type="text" name='username' class="form-control" required aria-required="true" maxlength='200' value='{{$user->email}}'>
                    <label class="form-label">@lang('settings.User Login Name')</label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group form-float ">
                <div class="form-line">
                    <br>
                    <input type="password" name='password' class="form-control" required aria-required="true" maxlength='200' >
                    <label class="form-label">@lang('settings.User Password')</label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group form-float ">
                <div class="form-line">
                    <br>
                    <input type="password" name='password_confirm' class="form-control" required aria-required="true" maxlength='200'>
                    <label class="form-label">@lang('settings.User Password Confirmation')</label>
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
