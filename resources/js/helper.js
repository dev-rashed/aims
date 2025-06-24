const showUploadedFile = (avatar) => {
    return avatar != '' ? `${location.origin}/storage${avatar}` : 'https://picsum.photos/seed/picsum/200/300';
}
window.showUploadedFile = showUploadedFile

const convertAmount = (number, decimals = 2, dec_point = '.', thousands_sep = ',') => {
    var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    toFixedFix = function (n, prec) {
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        var k = Math.pow(10, prec);
        return Math.round(n * k) / k;
    },
    s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    const currency_position = $('input[name="currency_position"]').val();
    const currency   = JSON.parse($('input[name="currency"]').val());

    if(currency_position == 'Before Amount') {
        return currency.symbol+s.join(dec);
    }
    return s.join(dec)+currency.symbol;
}

window.convertAmount = convertAmount

const dateFormat = (date) => {
    const formatDate = $('input[name="formatDate"]').val();
    // moment().format();
}
window.dateFormat = dateFormat
