jQuery( document ).ready( function( $ ) {

    $( document ).on( 'click', '#add-don8', function( e ) {
        e.preventDefault();

        var cause = $( '#don8-cause' ).val();
        var currency = $( '#don8-currency' ).val();
        var amount = $( '#don8-amount' ).val();
        var button = $( '#don8-button' ).val();


        var shortcode = '[don8 ' +
            'cause="' + cause + '" ' +
            'currency="' + currency + '" ' +
            'amount="' + amount + '" ' +
            'button="' + button + '"]';

        window.parent.send_to_editor( shortcode );
    });
});
