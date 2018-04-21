var myVariable;
function debug1() {
//alert('Prescription succesfully renewed');
$.ajax({
  method: "POST",
  url: "inputdata.php",
  data: {id : 1}
})
 .done(function( msg ) {
    alert(msg);
myVariable = 1;
  });
}
function debug2() {
alert('2');
}
function appcalender(){
$(location).attr('google.com');	
alert('1234');
}