var counter = 0;

/*
*	Get the index.blade.php view of the timeline with a limit of 20. Then split the html apart so we only get the statuses,
*/

function loadMessages(url) {
	counter = counter + 20
	$.ajax({
		url: '/' + url + '/' + counter,
		type: 'GET',
		success: function(data){
			split = data.split('age">');
			clean = split[1].split('<script');
			$('#btnLoadMessages').remove();
			$('#errorMsg').remove();
			$('#loadMessage').append(clean[0]);
		},
		error: function(){
			alert('Onze excuses voor het ongemak. Als deze melding vaker voorkomt neem dan contact op met de server beheerder.');
		}
	})
}

function loadProfileMessages(url) {
	counter = counter + 20
	$.ajax({
		url: '/' + url + '/' + counter,
		type: 'GET',
		success: function(data){
			split = data.split('berichten</h3>');
			clean = split[1].split('<script');
			$('#btnLoadMessages').remove();
			$('#errorMsg').remove();
			$('#loadMessage').append(clean[0]);
		},
		error: function(){
			alert('Onze excuses voor het ongemak. Als deze melding vaker voorkomt neem dan contact op met de server beheerder.');
		}
	})
}