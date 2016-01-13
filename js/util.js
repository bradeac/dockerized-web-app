function makeAjaxRequest(Url, Data){
	return $.ajax({
	  method: "POST",
	  url: Url,
	  data: Data
	})
}


function displayDatetime(){
	
	setInterval(function(){
		var getDatetimeRequest = makeAjaxRequest('api/getDatetime.php', {});
		getDatetimeRequest.success(function(data){
			var dataParsed = JSON.parse(data);
			$('#datetime_area').val(dataParsed.datetime)
			var datetimeArea = document.getElementById('datetime_area');
			datetimeArea.innerHTML = dataParsed.datetime;

			console.log($('#datetime_area').val());
			console.log(dataParsed.datetime);
		});

	}, 10000);

}