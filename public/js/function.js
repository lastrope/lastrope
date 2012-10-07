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