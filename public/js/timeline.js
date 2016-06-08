var counter = 0;

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
		console.log(counter);
	},
	error: function(){
		alert('Sorry for the inconvenience. If you see this error often please contact our support.');
	}
})
}