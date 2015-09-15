$(document).ready(function() {

		//Selector parent element required
		equalizeHeight('.equalize');

		function equalizeHeight(element) {
			//Get children of parent element
			var childElements = $(element).children();
			//Get greatest height of all child elements
			var maxHeight = 0;
			for (var i = 0; i < childElements.length; i++) {
				if ( $(childElements[i]).height() > maxHeight ) {
					maxHeight = $(childElements[i]).height();
				};
			};
			//Assign heigh to all child elements
			for (var i = 0; i < childElements.length; i++) {
				$(childElements[i]).css('height', maxHeight);					
			};
		}


		//This function enables dropdown when checkbox is checked
		$(document).on('click', '#attend-stay-home', function () {
			if ($(this).is(':checked')) {
				//if this is checked remove disabled
				$('#room-type').removeAttr('disabled');
			}
			else {
				//else add disabled
				$('#room-type').attr('disabled', 'disabled');
			}
		});



		//This hides message status message
		$(document).on('click', '.close-message', function () {
			$('.status-message').hide();
		});

});