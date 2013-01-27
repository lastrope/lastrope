//désactivation des "tooltips"
function deactivateTooltips() {
	var spans = document.getElementsByTagName('span'),
		spansLength = spans.length;

	for (var i = 0 ; i < spansLength ; i++) {
		if (spans[i].className == 'tooltip') {
			spans[i].style.display = 'none';
		}
	}
}

//récupérer la "tooltip" correspondante à l'input
function getTooltip(el) {
	while (el = el.nextSibling) {
		if (el.className == 'tooltip') {
			return el;
		}
	}
	return false;
}

//vérification du formulaire, renvoient true si ok
var check = {}; // On met toutes les fonctions dans un objet

check['nom'] = function(id) {
	var name = document.getElementById(id),
		tooltipStyle = getTooltip(name).style;

	if (name.value.length >= 2) {
		name.className = 'correct';
		tooltipStyle.display = 'none';
		return true;
	}
	else {
		name.className = 'incorrect';
		tooltipStyle.display = 'inline-block';
		return false;
	}
};
check['mail'] = function(id) {
	var name = document.getElementById(id),
		exp = new RegExp('^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$'),
		tooltipStyle = getTooltip(name).style;

	if (exp.test(name.value)) {
		name.className = 'correct';
		tooltipStyle.display = 'none';
		return true;
	}
	else {
		name.className = 'incorrect';
		tooltipStyle.display = 'inline-block';
		return false;
	}
};

//événements
(function() { //fonction anonyme pour éviter variables globales.
	var myForm = document.getElementById('form_contact'),
        inputs = document.getElementsByTagName('input'),
        inputsLength = inputs.length;

	for (var i = 0 ; i < inputsLength ; i++) {
		if (inputs[i].type == 'text' || inputs[i].type == 'password') {
			inputs[i].onkeyup = function() {check[this.id](this.id);};
		}
	}

	myForm.onsubmit = function() {
		var result = true;

		for (var i in check) {
		  result = check[i](i) && result;
		}
		if (!result) {
			alert('Certain champs sont mal remplis.');
			return false;
		}
		else{
			return true;
		} 
	};

	myForm.onreset = function() {
		for (var i = 0 ; i < inputsLength ; i++) {
			if(inputs[i].type == 'text' || inputs[i].type == 'password') {
				inputs[i].className = '';
			}
		}
		deactivateTooltips(); 
	};
})();

// désactivation des "tooltips"
deactivateTooltips();