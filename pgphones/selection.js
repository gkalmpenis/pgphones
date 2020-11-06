$(document).ready(function() {

	$('.brandlogos .brands a').click(function(event) {
		event.preventDefault(); //To prevent default redirecting
		
		var href = $(this).attr("href");
		//The href link is of type "products.php?name=somevalue"
		
		//Changing the contents of the appropriate div
		$('.brandlogos').hide().load(href).fadeIn('normal');
	});


	$('.prodAppearance #addCartForm, .cart #quantityChangeForm').submit(function(event) {				
		var form = $(this);
		var action = form.attr('action');
		var data = form.serialize();
		
		//Creating the link "cart.php?value=..."
		var url = action+"?"+data;
		
		//Changing the contents of the appropriate div
		$('.cart').load(url);
		
		event.preventDefault(); //To prevent default redirecting
		event.unbind(); //Unbind. To stop multiple form submit.
	});

});
