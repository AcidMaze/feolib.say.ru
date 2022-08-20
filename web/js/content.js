//Управление фильтрацией
jQuery(document).ready(function($)
{
	"use strict";
	var reviewMenu = $('.send-review-block');
	var check_send = $('.check-send');
    var reviewMenuActive = false;
	initReviewMenu();
	function initReviewMenu()
	{
        if(check_send.length)
		{
			check_send.on('click', function()
			{
				if(!reviewMenuActive)
				{
					openReviewMenu();
				}
				else{
					closeReviewMenu();
				}
        	});
		}
    }
	function openReviewMenu()
	{
        reviewMenuActive = true;
		reviewMenu.addClass('active');
		document.getElementById('showrevform').innerText = "Закрыть";
	}
	function closeReviewMenu()
	{
        reviewMenuActive = false;
		reviewMenu.removeClass('active');
		document.getElementById('showrevform').innerText = "Оставить отзыв";
	}

	var form_inut = $('.form-date');
	form_inut.dateDropper({
	
	}); 
})