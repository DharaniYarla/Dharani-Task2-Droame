$(document).ready(function() {
	// Submit form data via AJAX
	$('form').submit(function(e) {
	  e.preventDefault();
	  $.ajax({
		type: 'POST',
		url: 'add_customer.php',
		data: $('form').serialize(),
		success: function(response) {
		  // Reload the table data
		  location.reload();
		},
		error: function() {
		  alert('Error adding customer');
		}
	  });
	});
  
	// Delete customer via AJAX
	$('table').on('click', 'button.delete', function() {
	  var customerId = $(this).closest('tr').find('td:first-child').text();
	  $.ajax({
		type: 'POST',
		url: 'delete_customer.php',
		data: {id: customerId},
		success: function(response) {
		  // Reload the table data
		  location.reload();
		},
		error: function() {
		  alert('Error deleting customer');
		}
	  });
	});
  });
  
  
