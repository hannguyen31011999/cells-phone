function getDataByYear(data,nam)
{
    var listOfValue = [];
    var listOfMonth = [];
    data.forEach(function(element){
        listOfMonth.push(element.month);
        listOfValue.push(parseInt(element.total));
    });
    Highcharts.chart('container',{
        chart: {
            type: 'column'
          },
        title: {
            text: 'Tổng sản phẩm của năm '+ nam,
          },
        accessibility: {
            announceNewData: {
              enabled: true
            }
          },
        xAxis: {
            title: {
                text: 'Tháng'
            },
            categories: listOfMonth,
        },
        yAxis: {
            title: {
              text: 'Đơn vị'
            }
          },
        tooltip: {
            headerFormat: '<span style="font-size:11px">Tháng {point.x}</span><br>',
            pointFormat: '<span>{point.y} Sản phẩm</b><br/>',
        },
        series: [
            {
                type: 'column',
                colorByPoint: true,
                data: listOfValue,
                showInLegend: false
            }
        ]
    });
}

function getDatabyMonth(data,nam,thang)
{
        var listOfValue = [];
        var listOfMonth = [];
        data.forEach(function(element){
            listOfMonth.push(element.day);
            listOfValue.push(parseInt(element.total));
        });
        Highcharts.chart('container',{
            chart: {
                type: 'column'
              },
            title: {
                text: 'Tổng sản phẩm của tháng '+ thang + " năm "+nam,
              },
            accessibility: {
                announceNewData: {
                  enabled: true
                }
              },
            xAxis: {
                title: {
                    text: 'Ngày'
                },
                categories: listOfMonth,
            },
            yAxis: {
                title: {
                  text: 'Đơn vị'
                }
              },
            tooltip: {
                headerFormat: '<span style="font-size:11px">Ngày {point.x}</span><br>',
                pointFormat: '<span>{point.y} Sản phẩm</b><br/>',
            },
            series: [
                {
                    type: 'column',
                    colorByPoint: true,
                    data: listOfValue,
                    showInLegend: false
                }
            ]
    });
}


$(document).ready(function(){
    var date = new Date();
    var year = date.getFullYear();
    var revenue = $('#container').data('order');
    for (var i = 2018; i <= year; i++) {
        if(i==year)
        {
            $('#doanh-thu').append($('<option />').val(i).attr("selected","selected").html(i));
            break;
        }
        $('#doanh-thu').append($('<option />').val(i).html(i));
    }

    for (var i = 1; i <= 12; i++) {
        $('#doanh-thu-month').append($('<option />').val(i).html(i));
    }
    getDataByYear(revenue,year);

    $('#submit-doanhthu').submit(function(e) {
        var nam = $('#doanh-thu').val();
        var thang = $('#doanh-thu-month').val();
        if(thang=="Tháng")
        {
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/admin/statistical/product',
                data: {
                  "year":nam
                },
                success: function(response) {
                    getDataByYear(response,nam);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
        }
        else
        {
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/admin/statistical/product',
                data: {
                  "year":nam,
                  "month":thang
                },
                success: function(response) {
                    getDatabyMonth(response,nam,thang);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
        }
        e.preventDefault();
    });
});