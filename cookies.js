function writeCookie(name, value, days) {
    // По умолчанию куки являются временными, не имея срока хранения
    var expires = "";

    // Указав число дней, вы сделаете куки постоянными
    if(days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }

    // Присвоим куки имя, значение и срок хранения
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    // Найдем конкретный куки и вернем его значение
    var searchName = name + "=";
    var cookies = document.cookie.split(';');
    for(var i = 0; i < cookies.length; i++) {
        var c = cookies[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1, c.length);
        if(c.indexOf(searchName) == 0)
            return c.substring(searchName.length, c.length);
    }
    return null;
}

function eraseCookie(name){
    // Удалим выбранный куки
    writeCookie(name, "", -1);
}

