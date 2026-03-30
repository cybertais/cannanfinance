$(document).ready(function(){
    $("form").on("submit", function(e){
        e.preventDefault();
            $.ajax({
                type: 'POST', 
                enctype: 'multipart/form-data',
                url: `${url}/${control}/pf`,
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json', 
                beforeSend: function(){
                    document.getElementById('vipform').classList.add('dim');
                    $("#loader").show();
                },
                success: function(result){
                    $("#loader").hide();
                    document.getElementById('vipform').classList.remove('dim');
                    if(result.hasError == false){
                               window.location.href = `${url}/${control}`;             
                    }
                    eventListenterFeedback(result);
                },
                error: function(result){
                    console.log(result);
                }
            }); //end ajax
    }); // end for submit
});