function submitdata(id) {

    $.ajax({
        // type: "POST",
        url: "Admin/PostController/destroy/"+id,
        success:function(data){
           alert('df');
        }
    });
}