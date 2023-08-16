// Replace Contact Form 7 Message Classes
(function($) {
    $(document).ready(function() {
        document.addEventListener( 'wpcf7submit', function( event ) {
            $('.wpcf7-response-output').addClass('uk-alert');
        }, false );
        document.addEventListener( 'wpcf7invalid', function( event ) {
            $('.wpcf7-response-output').removeClass('uk-alert-warning uk-alert-success').addClass('uk-alert-danger');
        }, false );
        document.addEventListener( 'wpcf7spam', function( event ) {
            $('.wpcf7-response-output').removeClass('uk-alert-danger uk-alert-success').addClass('uk-alert-warning');
        }, false );
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            $('.wpcf7-response-output').removeClass('uk-alert-warning uk-alert-danger').addClass('uk-alert-success');
        }, false );
        document.addEventListener( 'wpcf7mailfailed', function( event ) {
            $('.wpcf7-response-output').removeClass('uk-alert-warning uk-alert-success').addClass('uk-alert-danger');
        }, false );
    });
})(jQuery);
