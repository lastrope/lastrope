function put_typeSearch_hidden(name, active){
	var type_search = document.getElementById('type_search');
	
	if(type_search == ""){
		type_search.value = name;
	} else {
		type_search.value = ' ' + name;
	}
}