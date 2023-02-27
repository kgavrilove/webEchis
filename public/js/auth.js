/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/auth.js ***!
  \******************************/
window.addEventListener('load', function () {
  function validate(value) {
    if (value == "") {
      return false;
    } else {
      return true;
    }
  }

  $(".loginBtn").click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault(); // alert($("#email").val());

    var email = $("#email").val();
    var password = $("#password").val();
    $.ajax({
      url: '/login',
      type: 'POST',
      data: {
        email: email,
        password: password
      },
      success: function success(data) {
        document.location.reload();
      },
      error: function error(xhr, status, errorThrown) {
        var err = JSON.parse(xhr.responseText);
        $.each(err.errors, function (key, value) {
          text = value.toString().replace(/[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
          alert(JSON.stringify(text));
          return false;
        }); //alert(JSON.stringify(err.errors[]));
      }
    });
  });
});
window.addEventListener('load', function () {
  $('.msg').hide();
  $(".registerBtn").click(function (e) {
    $('.msg').hide();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault(); // alert($("#email").val());

    var email = $("#email").val();
    var password = $("#password").val();
    var name = $("#name").val();
    var fullname = $("#fullname").val();
    var passwordRetry = $("#passwordRetry").val();
    $.ajax({
      url: '/auth',
      type: 'POST',
      data: {
        email: email,
        password: password,
        name: name,
        fullname: fullname,
        passwordRetry: passwordRetry
      },
      success: function success(data) {
        document.location.reload();
      },
      error: function error(xhr, status, errorThrown) {
        $('.msg').show();

        if (xhr.status == 422) {
          var err = JSON.parse(xhr.responseText); ////

          $.each(err.errors, function (key, value) {
            text = value.toString().replace(/[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
            $('.msgError').text(JSON.stringify(text));
            return false;
          }); ////
        } else if (xhr.status === 0) {
          $('.msgError').text('Not connected.\nPlease verify your network connection.');
        } else if (xhr.status == 404) {
          $('.msgError').text('The requested page not found. [404]');
        } else if (xhr.status == 500) {
          $('.msgError').text('Internal Server Error [500].');
        } else {
          $('.msgError').text('Uncaught Error.\n' + xhr.responseText);
        }
      }
    });
  });
});
/******/ })()
;