function changeStatus(id)
    {
        var status = document.getElementById("change-status"+id).value;
        $.ajax({
            type: 'get',
            url: '/admin/order/update',
            data: {
              "status":status,
              "id":id
            },
            success: function(response) {
                $('#modalSuccess').modal('show');
                $('#render-modal').text(response.messenger);
            },
            error: function (response) {
                alert(response.messenger);
            }
        });
    }

    function infomationCustomer(id){
        $.ajax({
            type: 'get',
            url: '/admin/order/list',
            data: {
              "id":id
            },
            success: function(response) {
                console.log(response);
                $('#render-customer').empty().html(response);
                $('#order'+id).modal('show');
            },
            error: function (response) {
                alert(response.messenger);
            }
        });
    }

    function filterStatus(){
        var status = document.getElementById('filter-status').value;
        $.ajax({
            type: 'get',
            url: '/admin/order/list',
            data: {
              "status":status
            },
            success: function(response) {
                console.log(response);
                $('#render-order').empty().html(response);
            },
            error: function (response) {
                alert(response.messenger);
            }
        });
    }