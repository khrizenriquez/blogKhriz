// JavaScript Document
function valida_correo(correo)
{
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo))
    {
	    return (true)
	}else
	{
		return (false);
	}
}

function valida_comentarios()
{
	var form=document.form;
	if (form.nom.value==0)
	{
		document.getElementById("valor").innerHTML="<hr><font color='#ff0000'>El nombre está vacío</font><hr>";
		form.nom.value="";
		form.nom.focus();
		return false;
	}else
	{
		document.getElementById("valor").innerHTML="";
	}
	if(form.correo.value==0)
	{
		document.getElementById("valor").innerHTML="<hr><font color='#ff0000'>El E-Mail est&aacute; vac&iacute;o</font><hr>";
		form.correo.value="";
		form.correo.focus();
		return false;
	}else
	{
		document.getElementById("valor").innerHTML="";
	}
	if (valida_correo(form.correo.value)==false)
	{
		document.getElementById("valor").innerHTML="<hr><font color='#ff0000'>El E-Mail ingresado no es v&aacute;lido</font><hr>";
		form.correo.value="";
		form.correo.focus();
		return false;
	}else
	{
		document.getElementById("valor").innerHTML="";
	}
	if (form.mensaje.value==0)
	{
		document.getElementById("valor").innerHTML="<hr><font color='#ff0000'>El mensaje est&aacute; vac&iacute;o</font><hr>";
		form.mensaje.value="";
		form.mensaje.focus();
		return false;
	}else
	{
		document.getElementById("valor").innerHTML="";
	}
	form.url.value=location.href;
	form.submit();
}