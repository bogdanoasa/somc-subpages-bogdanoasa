jQuery(document).ready(function() {
	var sortOrder = '';
	if(jQuery('.somc_subpages_shortcode .somc_sort').hasClass('desc')) sortOrder='desc';
	else sortOrder = 'asc';
	jQuery('.somc_subpages_shortcode ul.children').before('<span class="somc_display"></span><span class="somc_sort '+sortOrder+'"></span>');

	if(jQuery('.somc_subpages_widget .somc_sort').hasClass('desc')) sortOrder='desc';
	else sortOrder = 'asc';
	jQuery('.somc_subpages_widget ul.children').before('<span class="somc_display"></span><span class="somc_sort '+sortOrder+'"></span>');


	jQuery('li').on('click','.somc_display',function(){
		jQuery(this).toggleClass('open');
		jQuery(this).parent().children('ul').toggle("slow");	
		return false;
	});

	jQuery('ul').on('click','.somc_sort',function(){
		var itemsHtml = [];
		var sortableArray = [];
		jQuery(this).next('ul').children('li').each(function() { 
			itemsHtml.push(jQuery(this).html());
		});	

		for(var i=0;i<itemsHtml.length;i++) {
			sortableArray[i] = jQuery(itemsHtml[i]).html().toLowerCase()+"%%%"+i;
		}	

		if(jQuery(this).hasClass('desc')) {
			sortableArray.reverse();
			jQuery(this).removeClass('desc');
			jQuery(this).addClass('asc');
		} else {
			sortableArray.sort();
			jQuery(this).removeClass('asc');
			jQuery(this).addClass('desc');
		}

		jQuery(this).next('ul').children('li').remove();

		for(var i=0;i<sortableArray.length;i++) {
			var res = sortableArray[i].split("%%%"); 
			sortableArray[i] = itemsHtml[res[1]];
			jQuery(this).next('ul').append("<li>"+sortableArray[i]+"</li>");
		}

		return false;
	});
});