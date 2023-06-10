function SaveDataUsingAjax(targate_loaction,form_type,form_data) {
    $.ajax({
        url:targate_loaction,
        method:form_type,
        data:form_data,
        success:function (res) {
            alert(res);
        },
        error:function () {
            alert("something went wrong");
        }

    })
}
