@php
    $method = "get_static_option_central";
      if (is_null(tenant())){
          $method = "get_static_option";
      }
@endphp

@if($method('google_tag_manager_status') === 'on')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{$method('google_analytics_gt4_ID')}}"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif

@if(tenant() && get_static_option_central('google_tag_manager_tenant') == 'on')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{get_static_option_central('google_analytics_gt4_ID')}}"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif

@if($method('adroll_pixels_status') === 'on')
    <script type="text/javascript">
        adroll_adv_id = "{{$method('adroll_adviser_id')}}";
        adroll_pix_id = "{{$method('adroll_publisher_id')}}";
        adroll_version = "2.0";

        (function(w, d, e, o, a) {
            w.__adroll_loaded = true;
            w.adroll = w.adroll || [];
            w.adroll.f = ['setProperties', 'identify', 'track'];
            var roundtripUrl = "https://s.adroll.com/j/" + adroll_adv_id + "/roundtrip.js";
            for (a = 0; a < w.adroll.f.length; a++) {
                w.adroll[w.adroll.f[a]] = w.adroll[w.adroll.f[a]] || (function(n) { return function() { w.adroll.push([n, arguments]) } })(w.adroll.f[a])
            };
            e = d.createElement('script');
            o = d.getElementsByTagName('script')[0];
            e.async = 1;
            e.src = roundtripUrl;
            o.parentNode.insertBefore(e, o);
        })(window, document);
        adroll.track("pageView");
    </script>
@endif



@if(tenant() && get_static_option_central('adroll_pixels_tenant') == 'on')
<script type="text/javascript">
    adroll_adv_id = "{{$method('adroll_adviser_id')}}";
    adroll_pix_id = "{{$method('adroll_publisher_id')}}";
    adroll_version = "2.0";

    (function(w, d, e, o, a) {
        w.__adroll_loaded = true;
        w.adroll = w.adroll || [];
        w.adroll.f = ['setProperties', 'identify', 'track'];
        var roundtripUrl = "https://s.adroll.com/j/" + adroll_adv_id + "/roundtrip.js";
        for (a = 0; a < w.adroll.f.length; a++) {
            w.adroll[w.adroll.f[a]] = w.adroll[w.adroll.f[a]] || (function(n) { return function() { w.adroll.push([n, arguments]) } })(w.adroll.f[a])
        };
        e = d.createElement('script');
        o = d.getElementsByTagName('script')[0];
        e.async = 1;
        e.src = roundtripUrl;
        o.parentNode.insertBefore(e, o);
    })(window, document);
    adroll.track("pageView");
</script>
@endif
