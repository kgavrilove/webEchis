/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/edit.js ***!
  \******************************/
window.addEventListener('load', function () {
  function isFieldsCorrect() {
    var name = $("#name").val();
    var author = $("#author").val();
    var scheme = $("#scheme").val();
    var a_color = $("#a_color").val();
    var b_color = $("#b_color").val();
    var c_color = $("#c_color").val();
    var d_color = $("#d_color").val();
    var e_color = $("#e_color").val();

    if (name && author && scheme && a_color && b_color && c_color && d_color && e_color) {
      return true;
    }

    return false;
  }

  $(".submitAssetEdit").click(function (e) {
    if (!isFieldsCorrect()) {
      alert('Fields is not correct');
    } else {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: '/editAsset',
        type: 'POST',
        data: {
          id: $("#id").val(),
          name: $("#name").val(),
          author: $("#author").val(),
          scheme: $("#scheme").val(),
          a_color: $("#a_color").val(),
          b_color: $("#b_color").val(),
          c_color: $("#c_color").val(),
          d_color: $("#d_color").val(),
          e_color: $("#e_color").val()
        },
        success: function success(data) {
          document.location.reload();
        },
        error: function error(xhr, status, errorThrown) {
          var err = JSON.parse(xhr.responseText);
          $.each(err.errors, function (key, value) {
            msg = value.toString();
            alert(JSON.stringify(msg));
            return false;
          });
        }
      });
    }
  }); // for colors page

  function updateHistogram(elem, arg, color) {
    var hist = [];
    var labelHist = [];

    for (var i = 0; i < arg.length; i++) {
      hist.push(arg[i][0]);
      labelHist.push(i);
    }

    var labels = [0, 1, 2, 3, 4, 5, 6];
    var data = {
      labels: labelHist,
      datasets: [{
        label: 'red',
        data: hist,
        fill: false,
        borderColor: color,
        tension: 0.1
      }]
    };
    var ctx = document.getElementById(elem).getContext("2d");
    var chart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }

  function generatePie(percentage, colorMap) {
    percentage = percentage.map(function (ele) {
      return ele.toFixed(2);
    });
    colors = [];
    colorNames = [];

    for (var i = 0; i < colorMap.length; i++) {
      b = colorMap[i][0];
      g = colorMap[i][1];
      r = colorMap[i][2];
      colors.push('rgb(' + r + ', ' + g + ', ' + b + ')');
      colorNames.push(i + 1);
    }

    console.log(colors);
    var ctx = document.getElementById('dominantColorsPie').getContext("2d");
    var myChart = new Chart(ctx, {
      type: 'pie',
      //'doughnut'
      data: {
        labels: colorNames,
        datasets: [{
          label: 'My First Dataset',
          data: percentage,
          backgroundColor: colors,
          hoverOffset: 4
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    myChart.update();
  }

  $(".submitAssetСolors").click(function (e) {
    var name = $("#kClusters").val();

    if (!name || name < 0) {
      alert('Ошибка в поле ');
    } else {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: '/dominantColors',
        type: 'POST',
        data: {
          id: $("#id").val(),
          kClusters: $("#kClusters").val()
        },
        success: function success(data) {
          alert(JSON.stringify(data));
          console.log(data);
          console.log(data['dominant']['data']['kMeans']);
          generatePie(data['dominant']['data']['kMeans']['percentage'], data['dominant']['data']['kMeans']['dominantColors']); // updateHistogram('dominantColorsHistRed',data['data']['histogram']['red'],'rgb(255,0,0)')
          // updateHistogram('dominantColorsHistGreen',data['data']['histogram']['green'],'rgb(0,255,0)')
          // updateHistogram('dominantColorsHistBlue',data['data']['histogram']['blue'],'rgb(0,0,255)')
        },
        error: function error(xhr, status, errorThrown) {
          var err = JSON.parse(xhr.responseText);
          $.each(err.errors, function (key, value) {
            text = value.toString();
            alert(JSON.stringify(text));
            return false;
          });
        }
      });
    }
  });
});
/******/ })()
;