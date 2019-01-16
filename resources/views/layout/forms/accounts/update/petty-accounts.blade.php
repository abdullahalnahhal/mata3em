<form action="{{route('accounts.petty-accounts.update', ['id'=>$account->id])}}" method="post" accept-charset="utf-8" autocomplete="off">
    @csrf
    <div class="row clearfix">
        <div class="col-sm-4">
            <div class="form-group form-float ">
                <div class="form-line">
                    <br>
                    <input type="text" name='title' class="form-control" required aria-required="true" maxlength='200' value='{{$account->title}}'>
                    <label class="form-label">@lang('accounts.Title')</label>
                </div>
            </div>
        </div>
         <div class="col-sm-6">
            <div class="form-group form-float ">
                <div class="form-line">
                    <br>
                    <input type="text" name='description' class="form-control" value='{{$account->description}}'>
                    <label class="form-label">@lang('accounts.Description')</label>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
           <div class="form-group form-float ">
               <div class="form-line">
                   <br>
                   <input type="number" name='amount' class="form-control" required aria-required="true" step='0.00001' value='{{$account->amount}}'>
                   <label class="form-label">@lang('accounts.Amount')</label>
               </div>
           </div>
       </div>
    <br>
    <button type="submit" class="btn btn-block btn-lg btn-info waves-effect">
        <i class="material-icons">save</i>
        <span>@lang('common.Save')</span>
    </button>
</form>
