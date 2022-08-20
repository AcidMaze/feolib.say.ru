//Управление меню на мобильных устройствах
jQuery(document).ready(function($)
{
	"use strict";
	var menu = $('.nav-options');
    var hamburger = $('.hamburger');
    var menuActive = false;
	initMenu();
	function initMenu()
	{
		if(hamburger.length)
		{
			hamburger.on('click', function()
			{
				if(!menuActive)
				{
					openMenu();
				}
                else{
                    closeMenu();
                }
			});
		}
    }
	function openMenu()
	{
        menuActive = true;
		menu.addClass('active');
        document.getElementById("m_menu").src = "/images/hambuger_close.svg";
	}
	function closeMenu()
	{
        menuActive = false;
		menu.removeClass('active');
        document.getElementById("m_menu").src = "/images/hambuger.svg";
	}
});