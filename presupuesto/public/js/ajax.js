function objetoAjax(){
    var xmlhttp=false;
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
    try{
        xmlhttp = new ActiveXObject("microsoft.XMLHTTP");   

    }catch(e){
xmlhttp = false;
    }
    }

    if(!xmlhttp && typeof XMLHttpRequest!='undefined'){
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;

}
