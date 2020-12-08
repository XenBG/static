$(function() {
    // Cookie consent block

    let $cookies = Cookies.get('realtogroup_cookies');
    let cookieBar = false;

    if ($cookies != 1) {
        cookieBar = true;

        if (cookieBar == true) {
            setTimeout(function() {
                $('.cookie-consent').addClass('show');
            }, 800);
        } else {
            $('.cookie-consent').removeClass('show');

            setTimeout(function() {
                $('.cookie-consent').remove();
            }, 300);
        }

        $('#cookie-agree').click(function(e) {
            cookieBar = false;

            Cookies.set('realtogroup_cookies', 1, {
                expires: 365,
                path: '/'
            });

            $('.cookie-consent').removeClass('show');

            setTimeout(function() {
                $('.cookie-consent').remove();
            }, 300);
        });
    } else {
        $('.cookie-consent').remove();
    }
});
