// Visible settingan Layout
$('[name="set_visible"]').change(function() {
    if ($(this).is(':checked')) {
        $('.setting-dokumen').css({display: 'block'});
        $('[name="set_ttd"]').prop('checked', true);
        $('.image-ttd').css({display: 'block'});

        // Update revisi pak bagus
        $('.selector').css({display: 'block'});
        $('.selector-qrcode').css({display: 'block'});
        $('.selector-footnote').css({display: 'block'});
    } else {
        $('.setting-dokumen').css({display: 'none'});
        $('[name="set_ttd"]').prop('checked', false);
        $('.image-ttd').css({display: 'none'});

        $('.selector').css({display: 'none'});
        $('.selector-qrcode').css({display: 'none'});
        $('.selector-footnote').css({display: 'none'});
    }
});

// Setting TTD
$('[name="set_ttd"]').change(function() {
    if ($(this).is(':checked')) {
        // $('#info-picture').html('Anda menggunakan tanda tangan');
        $('.image-ttd').css({display: 'block'});
        $('.image-position').css({display: 'block'});
        $('.selector').css({display: 'block'});
    } else {
        $('.image-ttd').css({display: 'none'});
        $('.image-position').css({display: 'none'});
        $('.selector').css({display: 'none'});
    }
});

// Setting QR
$('[name="set_ttd_sign_qr"]').change(function() {
    if ($(this).is(':checked')) {
        $('.target-qrcode').css({display: 'block'});
        $('.form-qrcode').css({display: 'block'});

        $('.selector-qrcode').css({display: 'block'});
    } else {
        $('.target-qrcode').css({display: 'none'});
        $('.form-qrcode').css({display: 'none'});

        $('.selector-qrcode').css({display: 'none'});
    }
});

$('[name="footnote_status"]').change(function() {
    if ($(this).is(':checked')) {
        $('.target-footnote').css({display: 'block'});
        $('.form-footnote').css({display: 'block'});

        $('.selector-footnote').css({display: 'block'});
    } else {
        $('.target-footnote').css({display: 'none'});
        $('.form-footnote').css({display: 'none'});

        $('.selector-footnote').css({display: 'none'});
    }
});
