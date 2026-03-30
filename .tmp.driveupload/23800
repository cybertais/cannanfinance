function getfile_pdf(urlLink, val){
    $.ajax({ type: 'GET', url: document.location.origin + urlLink + val, dataType: 'json', success: function(result){
        if(result.status==1){
            const linkSource = "data:application/pdf;base64,"+result.b64file;
            const fileName = result.docname;
            const downloadLink = document.createElement("a");
            downloadLink.href = linkSource;
            downloadLink.download = fileName;
            downloadLink.click();
        }else{
            alert(result.message);
        }

    }, error: function(result){
        var msg='Error. Check internet Connection or Check the Server Administrator';
        console.log(msg);
    }
    }); //end ajax
}



const checkOnlineStatus = async () => {
    try {
      const online = await fetch(document.location.origin+"/information/test");
      return online.status >= 200 && online.status < 300; // either true or false
    } catch (err) {
      console.log(err);
      return false; // definitely offline
    }
  };
  
  
  
  setInterval(async () => {
    const result = await checkOnlineStatus();
  if(!result){
        $.rtnotify({title:"Error",message: "Internet Error!", type: "error"});
        $('button:submit').attr('disabled","disabled');
        $('input').attr("disabled","disabled");
        $('select').attr("disabled","disabled");
        $('form').css("opacity",".5");
        $('input').css("cursor","not-allowed");
        $('select').css("cursor","not-allowed");
        $('button:submit').css("cursor","progress"); 
  }else{
      // online statement
  }
  }, 3000);