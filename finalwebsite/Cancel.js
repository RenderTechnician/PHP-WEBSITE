//Renawal1 Function
function cancel1() {
$.ajax({
  method: "POST",
  url: "Cancelapp.php",
  data: {id : 1}
})
 .done(function( msg ) {
    alert(msg);
  });
}

//function number1{alert("Number");}