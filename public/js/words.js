$(document).ready(function() {
    $("table tr td").click(function(){
        value = $(this).text();
        $('input[name="selectfirstword"]').val(value);
        $('div.selectfirstword').text(value);
        $('#idlang').val($(this).data('idlang')); // take the data-idlang attribute of the <td> and put it in the hidden form field
        $('#idsem').val($(this).data('idsem'));
        console.log(this);
    });
    $("table tr th").click(function(){
        value = $(this).text();
        $('div.selectlanguage').text(value);
        console.log(this);
    });

});