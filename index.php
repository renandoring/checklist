<?php
include_once 'Dao.class.php';
include_once 'Connection.class.php';

$conn = new Connection();
$conn->Connect();

$dao = new Dao();
?>
<html>
<head>
<title></title>
<script language="javascript">
function createchkboxes()
{
           for (var i = 0; i <= 0; i++) {
               var meuTexto = document.getElementById('myText').value;
               var label = document.createElement('label');
               var br = document.createElement('br');
               var alabel = document.getElementById('div1');
               var last = alabel[alabel.length - 1];
               label.htmlFor = "lbl"+i;
               label.appendChild(Createcheckbox('test' + i));
               label.appendChild(document.createTextNode(meuTexto));
               label.appendChild(br);
               	   document.getElementById('div1').appendChild(label);
                
            }
}

 function Createcheckbox(chkboxid) {
     var meuTexto = document.getElementById('myText').value;
     if(meuTexto == ''){
         alert ("Digite um valor válido!");
     }else{
           var checkbox = document.createElement('input');
           checkbox.type = "checkbox";
           checkbox.onclick = function(){
                if((checkbox).checked){
                    //alert("OK");
                    
                }
//           	this.onclick = null;
//           	var label = this.parentNode;
//           	label.removeChild(this);
//           	label.parentNode.removeChild(label);
           };
           checkbox.id = chkboxid;
           checkbox.value = chkboxid;
           return checkbox;
       }
 }

function deleteAll(divId){
	var div = document.getElementById(divId), child;
	while(child = div.firstChild){
		div.removeChild(child);
	}
}

function getValues(divId){
	var boxes = document.getElementById(divId).getElementsByTagName('input'), vals = [];
	for(var i = 0; i < boxes.length; ++i){
		vals.push(boxes[i].value);
	}
	alert(vals.join('\n'));
}
</script>
<style>
    .blue{
        color: blue;
    }
</style>
</head>
<body>
<form>
<input type="text" name="textinput" id="myText" size="30" maxlenght="70"/>
<input type="button" id="btncreate" value="Create" onclick="createchkboxes()"/>
<input type="button" id="btndelete" value="Delete all" onclick="deleteAll('div1');"/>
<input type="button" id="btngetvalues" value="Get values" onclick="getValues('div1');"/>
<Div id='div1'>
</div>
</form>
</body>