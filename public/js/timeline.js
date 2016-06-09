var counter = 0;

/*
*	Get the index.blade.php view of the timeline with a limit of 20. Then split the html apart so we only get the statuses,
*/

function loadMessages() {
	counter = counter + 20
	$.ajax({
		url: '/getMoreStatuses/' + counter,
		type: 'GET',
		success: function(data){
			split = data.split('age">');
			clean = split[1].split('<script');
			$('#btnLoadMessages').remove();
			$('#loadMessage').append(clean[0]);
		},
		error: function(){
			alert('Onze excuses voor het ongemak. Als deze melding vaker voorkomt neem dan contact op met de server beheerder.');
		}
	})
}