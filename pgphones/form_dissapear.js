// Get the form background div
var reg_form_background = document.getElementById('registerFormBackground');
var ch_form_background = document.getElementById('checkoutFormBackground');
	

// When the user clicks anywhere outside of the form, close it
window.onclick = function(event) {
  if (event.target == reg_form_background) {
	reg_form_background.style.display = "none";
  }
  
  if (event.target == ch_form_background) {
	ch_form_background.style.display = "none";
  }
}
