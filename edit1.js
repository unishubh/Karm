function _(x)
{
return document.getElementById(x);
}
function namer()
{
_("name").style.display="block";
}
function namerd()
{
	_("name").style.display="none";
}
function name_update()
{
	
    var xmlhttp;
                                                                                                     
     var name= document.getElementById("nameedit").value;
     alert(name);
     if(name=="")
     {
     	alert("Please write a name");
     	return;
     }
    if (window.XMLHttpRequest) {
        
        xmlhttp = new XMLHttpRequest();
    } else {
        
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
               //document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
               alert(xmlhttp.responseText);
           }
           else if(xmlhttp.status == 400) {
              alert('There was an error 400')
           }
           else {
               alert('something else other than 200 was returned')
           }
        }
    }

    xmlhttp.open("GET", "updatename.php?n=" + name, true);
    xmlhttp.send();

}
function ager()
{
  console.log("ager");
_("agee").style.display="block";
}
function agerd()
{
  _("agee").style.display="none";
}
function age_update()
{
  
    var xmlhttp;
                                                                                                     
     var name= document.getElementById("ageedit").value;
     alert(name);
     if(name=="")
     {
      alert("Please write a name");
      return;
     }
    if (window.XMLHttpRequest) {
        
        xmlhttp = new XMLHttpRequest();
    } else {
        
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
               //document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
               alert(xmlhttp.responseText);
           }
           else if(xmlhttp.status == 400) {
              alert('There was an error 400')
           }
           else {
               alert('something else other than 200 was returned')
           }
        }
    }

    xmlhttp.open("GET", "updateage.php?n=" + name, true);
    xmlhttp.send();

}
function citer()
{
  console.log("ager");
_("citee").style.display="block";
}
function citerd()
{
  _("citee").style.display="none";
}
function city_update()
{
  
    var xmlhttp;
                                                                                                     
     var name= document.getElementById("cityedit").value;
     alert(name);
     if(name=="")
     {
      alert("Please write a name");
      return;
     }
    if (window.XMLHttpRequest) {
        
        xmlhttp = new XMLHttpRequest();
    } else {
        
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
               //document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
               alert(xmlhttp.responseText);
           }
           else if(xmlhttp.status == 400) {
              alert('There was an error 400')
           }
           else {
               alert('something else other than 200 was returned')
           }
        }
    }

    xmlhttp.open("GET", "updatecity.php?n=" + name, true);
    xmlhttp.send();

}
function worker()
{
  console.log("ager");
_("workee").style.display="block";
}
function workerd()
{
  _("workee").style.display="none";
}
function work_update()
{
  
    var xmlhttp;
                                                                                                     
     var name= document.getElementById("workedit").value;
     alert(name);
     if(name=="")
     {
      alert("Please write a name");
      return;
     }
    if (window.XMLHttpRequest) {
        
        xmlhttp = new XMLHttpRequest();
    } else {
        
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
               //document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
               alert(xmlhttp.responseText);
           }
           else if(xmlhttp.status == 400) {
              alert('There was an error 400')
           }
           else {
               alert('something else other than 200 was returned')
           }
        }
    }

    xmlhttp.open("GET", "workedit.php?n=" + name, true);
    xmlhttp.send();

}