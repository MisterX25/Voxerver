$(document).ready(function() {
    $("table tr td").click(function(){
        value = $(this).text();
        $('input[name="selectfirstword"]').val(value);
        $('div.selectfirstword').text(value);
        console.log(this);
    });
    $("table tr th").click(function(){
        value = $(this).text();
        $('div.selectlanguage').text(value);
        console.log(this);
    });

});