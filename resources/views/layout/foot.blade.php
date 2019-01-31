<!-- Jquery Core Js -->
  <script src="{{asset('new/'.cLang().'/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('new/'.cLang().'/plugins/autosize/autosize.js')}}"></script>

  <!-- Bootstrap Core Js -->
  <script src="{{asset('new/'.cLang().'/plugins/bootstrap/js/bootstrap.js')}}"></script>

  <!-- Select Plugin Js -->
  <script src="{{asset('new/'.cLang().'/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

  <!-- Slimscroll Plugin Js -->
  <script src="{{asset('new/'.cLang().'/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

  <!-- Waves Effect Plugin Js -->
  <script src="{{asset('new/'.cLang().'/plugins/node-waves/waves.js')}}"></script>

  <!-- Jquery CountTo Plugin Js -->
  <script src="{{asset('new/'.cLang().'/plugins/jquery-countto/jquery.countTo.js')}}"></script>

  <!-- Custom Js -->
  <script src="{{asset('new/'.cLang().'/js/admin.js')}}"></script>
  <script src="{{asset('new/'.cLang().'/js/pages/ui/notifications.js')}}"></script>
  <script src="{{asset('new/'.cLang().'/js/pages/index.js')}}"></script>

  <!-- Demo Js -->
  <script src="{{asset('new/'.cLang().'/js/demo.js')}}"></script>
  <script src="{{asset('js/hot-keys.js')}}"></script>
  <script src="{{asset('js/init.js')}}"></script>
  <script src="{{asset('/js/jquery.scannerdetection.js')}}"></script>

  <!-- <script src="{{asset('new/'.cLang().'/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script> -->
  <script src="{{asset('new/'.cLang().'/plugins/jquery-datatable/jquery.dataTables.js')}}" deffer></script>
  <script src="{{asset('new/'.cLang().'/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
  <script src="{{asset('new/'.cLang().'/js/pages/tables/jquery-datatable.js')}}"></script>
  <script src="{{asset('new/'.cLang().'/js/demo.js')}}"></script>
  <script>
      @if (session('created'))
          showNotification("bg-orange", "{{ trans(session('created')) }}", "bottom", "{{revfull()}}", "animated fadeIn", "animated flipOutY");
      @endif
      @if (session('updated'))
          showNotification("bg-blue", "{{ trans(session('updated')) }}", "bottom", "{{revfull()}}", "animated fadeIn", "animated flipOutY");
      @endif
      @if (session('deleted'))
          showNotification("bg-blue-grey", "{{trans(session('deleted')) }}", "bottom", "{{revfull()}}", "animated fadeIn", "animated flipOutY");
      @endif
      @if($errors->any())
          @foreach($errors->all() as $error)
                showNotification("bg-black", "{{trans($error)}}", "bottom", '{{revfull()}}', "animated fadeIn", "animated flipOutY");
          @endforeach
      @endif
      $('form').on('submit', function(){
          $(".btn").addClass('disabled')
      });
  </script>
