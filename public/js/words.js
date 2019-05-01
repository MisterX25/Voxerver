$(document).ready(function() {
    //Get the semantic_id for the selected word. Also show the selected word in the div block.
    $("table tr td").click(function(){
        value = $(this).text();
        $('div.selectfirstword').text(value);
        $('#idsem').val($(this).data('idsem'));
        //console.log($('#idsem').val());
    });

    //Get the selected language_id. Also show in a div the selected language (both form).
    $("table tr th").click(function(){
        value = $(this).text();
        $('div.selectlanguage').text(value);
        $('#idlanguage').val($(this).data('idlang')); // take the data-idlang attribute of the <td> and put it in the hidden form field
        $('#idlang').val($(this).data('idlang')); // this one is for the "defineword" form (If two inputs have the same class's name, only the first one is updated).
        //console.log(this);
    });
});