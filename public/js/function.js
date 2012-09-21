function verif_search(){
    var search = document.getElementById('search_value_id');
	
    if(search.value == ""){
	search.className = 'input_text_passive incorrect';
	alert('Veuillez renseigner au moins un mot clef.');
	return false;
    } else {
	search.className = 'input_text_passive';
	return true;
    }
}
/** research **/
$(document).ready(function(){
    var widthWindowOnLoad = (($(window).width()-555)/2);
    $('#article').animate({
	'margin':'0 0 0 '+widthWindowOnLoad+'px'
    });
    // A la saisie d'une lettre 
    $('#search_value_id').bind('keypress',function(e){
	var key = $(this).val().length;
	// Si on backspace la saisie
	if(key > 1){
	    openPreview();
	}
	researchPreview();
    });
    // MAJ du contenu de l'encart si les domaines changes 
    $('.div_answer').live('click',function(){
	researchPreview();
    });
    // Si l'on ferme le panel droite de recherche alors qu'il reste des caractères de saisi
    $('#image_back').live('click',function(){
	// on réinitialise tout
	$('.selected_answer').removeClass('selected_answer');
	$('#type_search').val('');
	if($('#content_form').css('display') != 'none'){
	    closePreview();
	    $('#search_value_id').val('');
	    var location = window.location.href;
	    var end_of_url = location.substring(location.lastIndexOf( "/" )+1, location.length);
	    var lang_tag = end_of_url.split('-');
	    load_news_text(0, lang_tag[0]);
	}
    });
    
});
// Ouverture de l'encart de résultats pertinents'
function openPreview(){
    $('#selecteur').animate({
	'left':'-300px'
    },500);
    $('#article').delay(500).animate({
	'margin':'0 0 0 20px',
	'width':'970px'
    },1000);
    $('#researchPreview').delay(1100).fadeIn();
}
// Fermeture de l'encart de résultats pertinents'
function closePreview(){
    var width = (($(window).width()-555)/2);
    
    $('#researchPreview').fadeOut();
    $('#selecteur').delay(1000).animate({
	'left':'0'
    },1000);
    $('#article').delay(500).animate({
	'margin':'0 0 0 '+width+'px',
	'width':'555px'
    },500);
    
    
}
// MAJ du contenu de l'encart 
function researchPreview(){
    
    var where = $("#type_search").val();
    var what = $("#search_value_id").val();
    $("#researchPreview").html('<img src="public/media/image/loader.gif" />');
    $.ajax({
	type:'POST',
	url:'script/search.php',
	data:{
	    'what':what,
	    'where':where
	},
	success:function(response){
	    $("#researchPreview").empty();
	    $("#researchPreview").delay(800).append(response);
	}
    });
}