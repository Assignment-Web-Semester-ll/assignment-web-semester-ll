function createCookie(name, value, days) {
    console.log('InvokeCreateCookie');
    var expires;
    if (days) {
        console.log("Work1");
        console.log(name);
        console.log(value);
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        console.log("Work2");
        expires = "";
    }
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
    console.log("Work3");
}
function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
} 


// createCookie("code", "10", "1");
// setTimeout(() => {
//     var st = "<?php if(isset($_COOKIE['code'])) { echo 'yes'; }else{ echo 'no';} ?>";
//     console.log(st);
// }, 1000);