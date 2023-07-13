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

@if(tenant() && get_static_option_central('google_analytics_gt4_tenant') == 'on')
    {{-- load global google analytics code  --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id={{get_static_option_central('google_analytics_gt4_ID')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', "{{get_static_option_central('google_analytics_gt4_ID')}}");
    </script>
@endif


<!-- Google Tag Manager -->

Paste this code as high in the <head> of the page as possible:
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MCM8939');</script>
<!-- End Google Tag Manager -->

