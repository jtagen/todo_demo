$('document').ready(function() {


	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$('.item_delete').on('click',function() {
		var id = $(this).attr('data-id');
		var node = $(this).parent().parent().parent().parent();
		if (!confirm('Are you sure you want to delete the item "' + node.find('.item-name').html() + '"?')) {
			return;
		}

		$.ajax( "delete", {
			method: 'POST',
			data: {'id' : id},
			dataType: 'json',
			success: function(data) {
				if (data['result'] == "success") {
					node.remove();
					CheckEmpty();
				} else {
					alert(data['errormessage']);
				}
			},
			error: function(data) {
				alert("Error: unable to remove item");
			}
		});
		

	})
	$('.item_complete').on('change',function() {
		var id = $(this).val();
		var node = $(this).parent().parent().parent().parent();


		$.ajax( "complete", {
			method: 'POST',
			data: {'id' : id},
			dataType: 'json',
			success: function(data) {
				if (data['result'] == "success") {
					node.slideUp(500, function(){ $(this).remove(); CheckEmpty();});
				} else {
					alert(data['errormessage']);
				}
			},
			error: function(data) {
				alert("Error: unable to remove item");
			}
		});
		CheckEmpty();

	})




});


function CheckEmpty() {

	if ($('#todo_items').children().length == 0)
		var message = '<hr class="my-3"><p>You do not have any items on your list</p>';

		$('#todo_items').append(message);

}