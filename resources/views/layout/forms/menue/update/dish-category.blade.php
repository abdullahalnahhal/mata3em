<form action="{{route('menue.dish-categories.update',['id' => $category->id])}}" method="post" accept-charset="utf-8" autocomplete="off">
    @csrf
    <div class="row clearfix">
        <div class="col-sm-4">
            <div class="form-group form-float ">
                <div class="form-line">
                    <br>
                    <input type="text" name='name' class="form-control" required aria-required="true" maxlength='200' value='{{$category->name}}'>
                    <label class="form-label">@lang('menue.Category Name')</label>
                </div>
            </div>
        </div>
         <div class="col-sm-4">
            <div class="form-group form-float ">
                <div class="form-line">
                    <br>
                    <input type="text" name='shortcut' class="form-control" required aria-required="true" maxlength='5' value='{{$category->shortcut}}'>
                    <label class="form-label">@lang('menue.Category Shortcut')</label>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <br>
            <br>
            @if(!$category->status)
            <input type="checkbox" id="status" name="status" value='1' class="filled-in">
            @else
            <input type="checkbox" id="status" name="status" value='1' class="filled-in" checked>
            @endif
            <label for="status"><b>@lang('common.Status')</b></label>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-block btn-lg btn-info waves-effect">
        <i class="material-icons">save</i>
        <span>@lang('common.Save')</span>
    </button>
</form>
