document.write('<scr'+'ipt type="text/javascript" src="library/capsule/mainMenu/js/subMenu.js" ></scr'+'ipt>');

$(document).ready(function () {

var input;

	$('div:not(#header)').hover(function () {
	$('.menuHover').removeClass('menuHover');
	var check = $('#mainMenuView1,#mainMenu-Service').length;
	
	if (check == 1) {
	input = '';
	$('#mainMenu-ServiceSneak').remove();
		$('#mainMenuView1,#mainMenu-Service').slideUp('fast', function () {
		$('#mainMenuView1,#mainMenu-Service,').remove();
		//$('#mainMenu-ServiceSneak').remove();
		});
	}
	
	});
	
	
	
	$("#mainMenu-Service a").live('hover',function(){
	
	var where	 = $.trim($(this).text().replace(/ /g,''));
	var where	 = 'menuMain'+where;
	var menu	 = eval(where);
	
	$('#mainMenu-ServiceSneak').html(menu);
	$('#mainMenu-ServiceSneak').slideDown('fast');
	
	});
	  
	

	$('.menuList').hover(function () {

	var where	 = $.trim($(this).text().replace(/ /g,''));
	var position = $(this).offset();
		
	$(this).children().addClass('menuHover');
	
	var menu	 = eval(where);

		if (where == input) {
		
		}
		else {
		
		$('.menuHover').removeClass('menuHover');
		
			if (menu != '') {
			input = where;
			$('#mainMenuView1,#mainMenu-Service,#mainMenu-ServiceSneak').remove();
			$('body').append(menu);
			$('#mainMenuView1,#mainMenu-Service').hide();
			$('#mainMenuView1,#mainMenu-Service').css('top', position.top + 39 + 'px').css('left', position.left - 1 + 'px');
			$('#mainMenuView1,#mainMenu-Service').slideDown('fast');
			$("<div id='mainMenu-ServiceSneak'></div>").insertAfter('#mainMenu-Service');
			$('#mainMenu-ServiceSneak').css('top', position.top + 284 + 'px').css('left', position.left - 1 + 'px');
			$('#mainMenu-ServiceSneak').hide();
			}
			else {
			input = where;
			$('#mainMenuView1,#mainMenu-Service,#mainMenu-ServiceSneak').remove();
			}
			
			$("#mainMenu-Service a").hover(function(){
			
			//var sneak = $('#mainMenu-ServiceSneak');
			//$(sneak).slideDown('fast');
			
			    $(this).animate({'padding-left': '5px'}, "fast");
				}, function(){
			    $(this).animate({'padding-left': '0px'}, "fast");
			    			    
			});
			
			
			
		}
	
	
	return false;
	
	});
	
	$('.searchBoxMain').val('enter to search');
	
	$('.searchBoxMain').focus(function () {
	$(this).val('');
	});
	
	$('.searchBoxMain').blur(function () {
	$(this).val('enter to search');
	});

});