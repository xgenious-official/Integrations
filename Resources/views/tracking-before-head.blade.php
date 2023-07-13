@php
    $method = "get_static_option_central";
      if (is_null(tenant())){
          $method = "get_static_option";
      }
@endphp

@if($method('google_analytics_gt4_status') === 'on')
{{-- load google analytics code  --}}
<script async src="https://www.googletagmanager.com/gtag/js?id={{$method('google_analytics_gt4_ID')}}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', "{{$method('google_analytics_gt4_ID')}}");
</script>
@endif

@if(tenant() && get_static_option_central('google_tag_manager_tenant') == 'on')
    <script async src="https://www.googletagmanager.com/gtag/js?id={{get_static_option_central('google_analytics_gt4_ID')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', "{{get_static_option_central('google_analytics_gt4_ID')}}");
    </script>
@endif



