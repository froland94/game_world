function check_input(inp,def){
if (inp.value == def || inp.value == null){
inp.style.borderColor='red';
return false;
}
inp.style.borderColor='green';
return true;
}

function check_reg(){
var username=document.getElementById('reg_username');
var password=document.getElementById('reg_password');
var firstname=document.getElementById('firstname');
var surname=document.getElementById('surname');
var city=document.getElementById('city');
var address=document.getElementById('address');
var nmb=document.getElementById('nmb');
var captcha=document.getElementById('captcha');

if (check_input(username,'Username')!=false && check_input(password,'Password')!=false && check_input(firstname,'First name')!=false && check_input(surname,'Surname')!=false && check_input(city,'City')!=false && check_input(address,'Address')!=false && check_input(nmb,'nmb')!=false && check_input(captcha,'Captcha')!=false)
{
document.getElementById('reg_send').style.backgroundColor="rgb(50,150,50)";
var xmlhttp;
		
		if (window.XMLHttpRequest)// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			
		else// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				if(xmlhttp.responseText==1)
				{
		        reg_reset();
				alert('SUCCESFULL REGISTRATION');
				window.location.href = "index.php";
				}
				if(xmlhttp.responseText==0){
				document.getElementById("reg_send").style.backgroundColor="rgb(150,50,50)";
				alert('USER ALREADY EXISTS');
				username.value='Username';
				username.style.borderColor = "red";
				username.style.color = "silver";
				}
			}
		}
	xmlhttp.open("POST","reg.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("username="+username.value+"&password="+password.value+"&first="+firstname.value+"&sur="+surname.value+"&city="+city.value+"&address="+address.value+"&nmb="+nmb.value+"&captcha="+captcha.value);
}
}
function reg_reset()
{
document.getElementById("registration_panel").style.display="none";
document.getElementById("reg_send").style.backgroundColor="rgb(150,50,50)";
document.getElementById("reg_password").type='text';
document.getElementById("MyForm").reset();
var form = document.getElementById("MyForm");
var inp_list = form.getElementsByTagName("input");
for (var i = 0; i < inp_list.length; i++) {
  inp_list[i].style.borderColor = "silver";
  inp_list[i].style.color="silver";
}
}
firstTime=false;

function login(){
var username1=document.getElementById('username');
var password1=document.getElementById('password');
if((username1.value!='Username' && password1.value!='Password') || firstTime==false){

var xmlhttp;
		
		if (window.XMLHttpRequest)// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			
		else// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				if(xmlhttp.responseText==1 || xmlhttp.responseText==2){
				//document.getElementById('admin').style.display="block";
				document.getElementById('profile').style.display="block";
				document.getElementById('log_panel').style.display="none";
				document.getElementById('login_btn').style.display="none";
				//document.getElementById('shop_btn').style.display="block";
				//document.getElementById('games_btn').style.display="none";
				document.getElementById('my_purch_butt').style.display="block";
				document.getElementById('signin').style.display="none";
				document.getElementById('registration_button').style.display="none";
				document.getElementById('logout_button').style.display="block";
				document.getElementById('pur_button').style.display="block";
				}
				if(xmlhttp.responseText==0 && firstTime==true)
				alert("Username or Pass is invalid");
			firstTime=true;
			}
		}
	xmlhttp.open("POST","login.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("username="+username1.value+"&password="+password1.value);
	//window.location.href = "index.php";

}
}

function logout(){
var xmlhttp;
		
		if (window.XMLHttpRequest)// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			
		else// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				if(xmlhttp.responseText==1){
				//document.getElementById('admin').style.display="none";
				document.getElementById('profile').style.display="none";
				document.getElementById('login_btn').style.display="block";
				document.getElementById('registration_button').style.display="block";
				document.getElementById('logout_button').style.display="none";
				document.getElementById('pur_button').style.display="none";
				//document.getElementById('shop_btn').style.display="none";
				//document.getElementById('games_btn').style.display="block";
				document.getElementById('my_purch_butt').style.display="none";
				document.getElementById('pur_panel').innerHTML='';
				document.getElementById('pur_panel').style.display='none';
				document.getElementById('signin').style.display="block";
				
				try{
                 document.getElementById('panel').innerHTML="";
				 
				 }
                catch(err) {}
				
				}
			}
		}
	xmlhttp.open("GET","logout.php",true);
    xmlhttp.send();
}
on=true;
function purchases()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
		if(on==true){
		on=false;
		document.getElementById('pur_panel').style.display='block';
         document.getElementById('pur_panel').innerHTML=xmlhttp.responseText;
		 }
		 else
		{
		on=true;
		document.getElementById('pur_panel').style.display='none';
		}
        }
    }
    xmlhttp.open("GET","purchases.php",true);
    xmlhttp.send();
}