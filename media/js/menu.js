/***
 * 
 */
$(document).ready(function(){
/***********级联下拉框*******************/

	var menuid = $(".menuid").val();
	var submenuid = $(".sub_menuid").val();
	var three_submenuid = $(".three_sub_menuid").val();
	
	var menu_name = "#menu"+menuid;
	var submenu_name = "#sub_menu"+submenuid;
	var three_submenu_name = "#three_sub_menu"+three_submenuid;
	
	var menu1 = $(menu_name);
	var submenu1 = menu1.children("ul");
	var arrow1 = menu1.children("a").children("span.arrow");
	
	var menu2 = $(submenu_name);
	var submenu2 = menu2.children("ul");
	var arrow2 = menu2.children("a").children("span.arrow");
	
	var menu3 = $(three_submenu_name);
	
	menu1.addClass("open");
	arrow1.addClass("open");
	arrow1.removeClass("ion-ios-arrow-left").addClass("ion-ios-arrow-down");
	menu1.addClass("active");
	menu1.find("a").append("<span class='selected'></span>");
                    
	menu2.attr("class","open");
	arrow2.attr("class", "arrow open");

	submenu1.children(submenu_name).attr("class","open");
	submenu1.css({"display":"block"});
	
	submenu2.children(submenu_name).attr("class","open");
	submenu2.css({"display":"block"});
	
	menu3.attr("class","open");
	
	if(menuid==0){
		$(".start").addClass("active");
		$(".start").find("a").append("<span class='selected'></span>");
	}
   
});