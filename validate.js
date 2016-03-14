
function _(x)
{
return document.getElementById(x);

}
/*function checkonlypass()
{

var p=_("pass").value;
var n= p.length;
if(p=="")
alert("Please fill in the Password");
else if(n<8)
{
	alert("Password must be of 8 characters");
	document.getElementById("pass").focus();
	}

}
function checkcity()
{
	var c=_("city").value;
	if(c=="")
		alert("Please fill in the city");
}
function checkname()
{
console.log("5");
	var c=_("name").value;
	if(c==""){
		alert("Please fill in the Name");
	
	errormode("name");}
}*/
function checkpass()
{
	console.log("15");
	var s=_("pass").value;
	var t=_("cpass").value;
	if(t=="")
             //alert("Please confirm the password");
         console.log("Pctp");

	else if(s==t)
		_("ppstatus").innerHTML="Password Match";
	else{
	alert("Passwords don't match");
	errormode("cpass");
}
}
	var zz=0;
function checkuser()
{

	console.log("IN");
	var u=_("mail").value;
	
		//_("unstatus").innerHTML="Checking...";
		if (u == '') {
          //document.getElementById("unstatus").innerHtml = "";
          zz=2;
          return;
      }
      else {
          if (window.XMLHttpRequest) {
              xmlhttp = new XMLHttpRequest();
          }
          else {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }

          xmlhttp.onreadystatechange = function () {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


                  //show(sem);
                  console.log(xmlhttp.responseText);

               if(xmlhttp.responseText==1)
               {
               zz=1;
               //	_("unstatus").innerHTML="Nice Name!";
               	}
               else if(xmlhttp.responseText==0)
               {
               
alert("Email already taken");
}



              }
          }
      }
      xmlhttp.open("GET", "check.php?un=" + u, true);
      xmlhttp.send();
      return;
}
function signup()
{
	//alert("dsfg");
	console.log("signup");
	checkuser();
	var a=1;
	var u=_("name").value;
	//var n=_("name").value;
	var e=_("mail").value;
	//var g=_("sex").value;
	var p=_("pass").value;
	var pp=_("cpass").value;
	//var c=_("city").value;
	/*if(u=="")
	{
		alert("Please select a username");
		errormode("user");
		return false;

	}*/
	

	if(u=="")
	{
	alert("Name not filled properly");
	//_("name").focus();
	errormode("name");
	return false;
	
	}


	/*else if(g=="")
	{
	alert("Gender not selected");
	errormode("sex");
	return false;
	
	}
	
	else if(c=="")
	{
	alert("City not selected");
	errormode("city");
	return false;
	
	}*/
else if(p=="")
	{
	alert("Please fill the password");
	errormode("pass");
	return false;
	
	}
	else if(pp=="")
	{
	alert("Please retype the password for confirmation");
	errormode("cpass");
	return false;
	
	}
	else if(p!=pp)
	{
	alert("Passwords don't match");
	errormode("pass");
	return false;
	
	}
	else if(p.length<8)
	{
	alert("Passwords should be of atleast 8 characters");
	return false;
	errormode("pass");
	//_("pass").focus();
	}
	else if(zz==0)
	{
	alert("Email already taken");
	errormode("usrname");
	return false;
	//_("usrname").focus();
	}
	else if(zz==2)
	{
		alert("Please write an email Id");
		errormode("email");
		return false;
	}
	
	else return true;

}
function errormode(vt)
{
	
_(vt).style.borderColor = "red";
_(vt).focus();
return;


}
function nor(tr)
{
	//console.log( tr);
 _(tr).style.borderColor="black";
 return;

}

					
