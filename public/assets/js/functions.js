function callAjax(url, data){

    var result;

    $.ajax({
        type: "POST",
        url: url,
        data: data,
        async: false,
        success: function(data){
            result = data;
        }
    })

    return result;
}

