function hideData()
{
	document.getElementById('panel_background').style.display="none";
	document.getElementById('hide_nav').style.display="block";
}

function hidemenu()
{
	document.getElementById('hide_nav').style.display="none";
}

function loadData(id)
{
    i=1; 
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
		    if(xmlhttp.responseText==0){
			document.getElementById('error_panel').style.display="block";
			}
			else
			{
			document.getElementById('panel_background').style.display="block";
		    document.getElementById("panel").innerHTML="";
            document.getElementById("panel").innerHTML=xmlhttp.responseText;
			}
        }
    }
    xmlhttp.open("GET","order.php?id="+id,true);
    xmlhttp.send();
}

function counter(arrow){
	var in_stock=document.getElementById("inStock").innerHTML;
	var nmb_container=document.getElementById("center");
	var tot_value=document.getElementById("order_price");
	var price=document.getElementById("price").innerHTML;
	nmb_container.innerHTML="";
	if(arrow=="left"){
		if(i<=1)
			i=1;
		else
			i--;
	}
	if(arrow=="right"){
		if(i>=in_stock)
			i=in_stock;
		else
			i++;
	}
	nmb_container.innerHTML=""+i;
	tot_value.innerHTML=""+Math.round(price*i)+" din";
}

function input_focus(id,default_value){
	var inp=document.getElementById(id);
	if (inp.value=='Password')
	inp.type='password';
	
	inp.style.color='black';
	if(inp.value.trim()==default_value)
		inp.value="";
	}

function input_blur(id,default_value){
	var inp=document.getElementById(id);
	
	if(inp.value.trim()==''){
	    	if (inp.type=='password')
	        inp.type='text';
	          
		inp.value=default_value;
		inp.style.color='silver';
	}
}
function order(id){
	var city=document.getElementById("dest_city").value;
	var address=document.getElementById("dest_address").value;
	//var nmb=document.getElementById("dest_nmb").value;
	var nmb_pro=document.getElementById("center").innerHTML;
	var price=document.getElementById("price").innerHTML;
	var name=document.getElementById("product_name").innerHTML;
	//if ( city!="City" && address!="Address" && nmb!="nmb"){
		var xmlhttp;
		
		if (window.XMLHttpRequest)// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			
		else// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
		xmlhttp.onreadystatechange=function(){
		
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("panel").innerHTML="";
				document.getElementById("panel").innerHTML=xmlhttp.responseText;
			}
		}
	xmlhttp.open("POST","buy.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("id="+id+"&city="+city+"&address="+address+"&nmbp="+nmb_pro+"&price="+price+"&name="+name);
	//}
}