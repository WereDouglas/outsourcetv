		$(document).ready(function() {
			$('#show').innerFade({
				indexContainer: '#index',
				currentItemContainer: '.current',
				totalItemsContainer: '.total',
				speed: 1000,
				timeout: 6000,
				pauseLink: '.pause',
				prevLink: '.prev',
				nextLink: '.next'
			});	

			$('#news').innerFade({
				currentItemContainer: '.current',
				totalItemsContainer: '.total',
				speed: 1000,
				timeout: 10000
			});	

		});