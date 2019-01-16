<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" name='trace' class="command" command='backendSearch' url='{{route('orders.orders.search',['order_number'=>'%search%'])}}' result-type='redirect' placeholder="@lang('common.START TYPING...')">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
