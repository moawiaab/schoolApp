$(document).ready(function(){

  var myLanguage = {
        errorTitle: 'عفوا، هناك أخطاء!'
    };
    $.validate({
        form : '#form_user_login',
        language : myLanguage,
        modules : 'file',
        validateOnBlur : false,
        errorMessagePosition : 'top',
        onError : function() {
            //alert('alert !');
        },
        onSuccess : function() {
            //alert('success!');
        }
    });

    $.validate({
        form : '#form-user-search',
        language : myLanguage,
        validateOnBlur : false,
        errorMessagePosition : 'top',
        onError : function() {
          //alert('alert !');
        },
        onSuccess : function() {
          //alert('success!');
          //  searchmillion();
            //alert('success!');
        }
    });

    $.validate({
        form : '#form_user_add',
        language : myLanguage,
        validateOnBlur : false,
        errorMessagePosition : 'top',
        onError : function() {
        alert('alert !');
        },
        onSuccess : function() {
          //alert('success!');
            //updateMillion();
            alert('success!');
        }
    });

    $('#form-user-search').submit(function(){
      return false;
    });

    $('#myModal').submit(function(){
      return false;
    });

});

function deleteArt(btn, e) {
   e.preventDefault();
   if (confirm("هل تريد فعلا حذف هذا الموظف")) {
       var obj = {
           ajax_action: 'user.delete',
           emp: $(btn).attr('emp')
       };
       $.post(
           'index.php',
           obj,
           function (data) {
               if (data == 1) {
                   window.location.reload();
               } else {
                   alert("واجهتا مشاكل، المرجو المحاولة.");
               }
           },
           'html'
       );
   }
}

function searchmillion(){

       var obj = {
           ajax_action : 'user.search',
            phon : $('#phon').val(),
            m_name : $('#m_name').val(),
            ctiy : $('#ctiy').val(),
            tyoe : $('#tyoe').val()
       };
       $.post(
           'index.php',
           obj,
           function(data) {
            // alert(data);
              $('.form-search-wper').slideUp();
              $('.mint-table-million tbody').html(data);
           },
           'html'
       );
   }

function updateMillion()
{
          var obj =
          {
              ajax_action: 'million.edit',
              emp: $(btn).attr('emp'),
              phon : $('#phon').val(),
              m_name : $('#m_name').val(),
              ctiy : $('#ctiy').val(),
              hulla : $('#hulla').val(),
              tyoe : $('#tyoe').val()
          };
          $.post
          (
              'index.php',
              obj,
              function (data)
               {
                alert(date);

              'html'
              }
          );


   }
