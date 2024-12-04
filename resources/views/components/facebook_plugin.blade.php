<script>
    if (typeof FB === 'undefined') {
        window.fbAsyncInit = function() {
            FB.init({
                appId      : {{ $facebookAppId }},
                cookie     : true,
                xfbml      : true,
                version    : 'v21.0'
            });
        };

        // equivalent to
        // <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js">
        (function(d, script) {
            script = d.createElement("script");
            script.type = "text/javascript";
            script.async = true;
            script.src = "https://connect.facebook.net/en_US/sdk.js";
            d.getElementsByTagName("head")[0].appendChild(script);
        })(document);
    } else {
        console.log("Facebook SDK is already loaded.");
    }
</script>
