$(document).ready(function() {
    $('#short_profile').click(function() {
        if ($('#short_profile').hasClass('selected')) {
            $('#short_profile').removeClass('selected')
        } else {
            $('#short_profile').addClass('selected')
        }
    });
    $('.wrapper').click(function() {
        if ($('#short_profile').hasClass('selected')) {
            $('#short_profile').removeClass('selected')
        }
    });
    $('input.myInput').on('focusout', (function() {
        if ($(this).val() != '') {
            $(this).addClass("has-data");
        } else {
            $(this).removeClass("has-data");
        }
    }));

    $("#select_all").change(function() { //"select all" change 
        var status = this.checked; // "select all" checked status
        $('.checkbox').each(function() { //iterate all listed checkbox items
            this.checked = status; //change ".checkbox" checked status
        });
    });

    $('.checkbox').change(function() { //".checkbox" change 
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if (this.checked == false) { //if this item is unchecked
            $("#select_all")[0].checked = false; //change "select all" checked status to false
        }

        //check "select all" if all checkbox items are checked
        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $("#select_all")[0].checked = true; //change "select all" checked status to true
        }
    });

    // *********************- بداية برمجة اخاء الرسائل start close the message -*******************//

    // var myAllMessages = [];
    var myAllMessages = document.getElementsByClassName('default_msessger');

    if (myAllMessages.length > 0) {
        removeMassege();
    }
    console.log(myAllMessages);

    function removeMassege() {
        var minNum = myAllMessages.length;
        var myInterval = setInterval(function() {
            if (myAllMessages[0] !== 0) {
                // console.log(myAllMessages[0]);
                myAllMessages[0].remove();
            }
            minNum--;
            if (minNum === 0) {
                ///console.log("the end");
                clearInterval(myInterval);
            }
        }, 5000)

    }
    // *********************- نهاية برمجة اخاء الرسائل end close the message -*******************//

    $("#mytable").DataTable();

    var myLanguage = {
        errorTitle: 'أكمل الحقول التالية بتعني'
    };
    $.validate({
        form: '#mainForm',
        language: myLanguage,
        modules: 'security',
        validateOnBlur: false,
        errorMessagePosition: 'top',
        onError: function() {
            //alert('alert !');
        },
        onSuccess: function() {
            //alert('success!');
        }
    });

});