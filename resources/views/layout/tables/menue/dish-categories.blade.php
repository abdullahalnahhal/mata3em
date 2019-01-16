<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example-no-pagination dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('menue.Category Name')</th>
                <th>@lang('common.Status')</th>
                <th>@lang('common.Actions')</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>#</th>
              <th>@lang('menue.Category Name')</th>
              <th>@lang('common.Status')</th>
              <th>@lang('common.Actions')</th>
            </tr>
        </tfoot>
        <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach($categories as $category)
            <tr>
                <td>{{++$counter}}</td>
                <td>{{$category->name}}</td>
                <td>{{status($category->status)}}</td>
                <td>
                  <a href="{{route('menue.dish-categories.edit', ['id' => $category->id])}}" class="btn bg-blue waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                      <i class="material-icons">edit</i>
                  </a>
                  <a href="{{route('menue.dish-categories.delete', ['id' => $category->id])}}" class="btn bg-red waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                      <i class="material-icons">delete</i>
                  </a>
                  <a href="{{route('menue.dish-categories.view', ['id' => $category->id])}}" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.View')">
                      <i class="material-icons">remove_red_eye</i>
                  </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
