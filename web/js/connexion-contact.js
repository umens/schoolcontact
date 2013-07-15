<script language="JavaScript">

var numLists = 1;

function doCheckCount(ccObj){
  if(ccObj.checked) numLists = numLists + 1;
  else numLists = numLists - 1;
}
  
function CheckSS(){
  theFrm = document.frmSS;

  hasDot = theFrm.email.value.indexOf(".");
  hasAt = theFrm.email.value.indexOf("@");

  if(theFrm.name.value == ''){
    alert('Entrez votre nom');
    theFrm.name.focus();
    return false;
  }
  if(theFrm.surname.value == ''){
    alert('Entrez votre surnom');
    theFrm.surname.focus();
    return false;
  }
  if(hasDot + hasAt < 0){
    alert("Entrer une adresse email valide.");
    theFrm.email.focus();
    theFrm.email.select();
    return false;
  }
  if(numLists == 0){
    alert("Choisissez une liste de diffusion pour vous abonner.");
    return false;
  }
  return checkForm();
}

</script>

<!--FORM COUNSTRUCTOR-->
<script type="text/javascript" src="http://www.emailposte.com/templates/js/forms.js"></script>
<script language="JavaScript" type="text/javascript">
var err_empty='Field [field] is empty';
var err_invalid='Field [field] is not filled correctly';

var regs=new Array(1);
var mands=new Array(1);
var fields=new Array(1);

//All fields names
//Associated patterns
//Mandatory fields


function check_empty(id_attr, field){
  if(field.value==''){
    error = err_empty.replace(/\[field\]/, fields[id_attr]);
    return error;
  } else return '';
}

function check_pattern(id_attr, field){
  var pattern=regs[id_attr];
  if (field.value && pattern.test(field.value) == false)  {
    error = err_invalid.replace(/\[field\]/, fields[id_attr]);
    return error;
  } else return '';
}

function checkForm(){
  var form=document.frmSS;
  var len=form.elements.length;
  
  //Check if all fields are filled coorectly (not empty and valid to patterns)
  for(var i=0;i<len;i++){
    if(!(/attr_/).test(form.elements[i].name)) continue;
    var id_attr=form.elements[i].name.substr(5);
    if(mands[id_attr]!=null) {
      var err=check_empty(id_attr, form.elements[i]);
      if(err!='') {
        window.alert(err);
        form.elements[i].focus();
        return false;
      }
    }
    if(regs[id_attr]!=null) {
      var err=check_pattern(id_attr, form.elements[i]);
      if(err!='') {
        window.alert(err);
        form.elements[i].focus();
        return false;
      }
    }
  }
  return true;
}
</script>
<script type="text/javascript" src="http://www.emailposte.com/templates/js/yui_yahoo.js"></script>
  <script type="text/javascript" src="http://www.emailposte.com/templates/js/event.js"></script>
  <script type="text/javascript" src="http://www.emailposte.com/templates/js/dom.js"></script>
  <script type="text/javascript" src="http://www.emailposte.com/templates/js/animation.js"></script>

  
  <script type="text/javascript">
    YAHOO.example.init = function() {
    
       var attributes = {
          backgroundColor: { from: '#FF0000', to: '#FFFFFF' },
          color: { from: '#000000', to: '#FF0000' }
       };
    
       var anim = new YAHOO.util.ColorAnim('errorReport', attributes);
       anim.animate();
    };
    YAHOO.util.Event.onAvailable('errorReport', YAHOO.example.init);
  </script>
    <!-- Font Face Corbel -->
    <script src="http://cufon.shoqolate.com/js/cufon-yui.js" type="text/javascript"></script>
    <script src="/bootstrap/js/corbel.cufonfonts.js" type="text/javascript"></script>
    <script type="text/javascript">
    Cufon.replace('.corbel_bold_italic', { fontFamily: 'Corbel Bold Italic', hover: true }); 
    Cufon.replace('.corbel_italic', { fontFamily: 'Corbel Italic', hover: true }); 
    Cufon.replace('.corbel_bold', { fontFamily: 'Corbel Bold', hover: true }); 
    Cufon.replace('.corbel', { fontFamily: 'Corbel', hover: true }); 
    </script>