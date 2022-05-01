// on input/text enter--------------------------------------------------------------------------------------
$('.usrInput').on('keyup keypress', function (e) {
	var keyCode = e.keyCode || e.which;
	var text = $(".usrInput").val();
	if (keyCode === 13) {
		if (text == "" || $.trim(text) == '') {
			e.preventDefault();
			return false;
		} else {
			$(".usrInput").blur();
			setUserResponse(text);
			odiyatoeng(text);
			// send(text);
			e.preventDefault();
			return false;
		}
	}
});


//------------------------------------- Set user response------------------------------------
function setUserResponse(val) {


	var UserResponse = '<img class="userAvatar" src=' + "./static/img/userAvatar.jpg" + '><p class="userMsg">' + val + ' </p><div class="clearfix"></div>';
	$(UserResponse).appendTo('.chats').show('slow');
	$(".usrInput").val('');
	scrollToBottomOfResults();
	$('.suggestions').remove();
}

//---------------------------------- Scroll to the bottom of the chats-------------------------------
function scrollToBottomOfResults() {
	var terminalResultsDiv = document.getElementById('chats');
	terminalResultsDiv.scrollTop = terminalResultsDiv.scrollHeight;
}
function odiyatoeng(message){
	let apiUrl = `https://medicbot-languageapi.herokuapp.com/or/en/${message}`;
	fetch(apiUrl).then(res => res.json()).then(data => {
		// console.log(data.text + ' this is or to en'),
		// message = data.text,
		// console.log(message + ' this one'),
		send(data.text);
	});
}
function send(message) {
	console.log("User Message:", message)
	// translate here to english
	$.ajax({
		url: 'https://rasa-server-prateek0159.cloud.okteto.net/webhooks/rest/webhook',
		type: 'POST',
		contentType: 'application/json',

		data: JSON.stringify({
			"message": message,
			"sender": "Me"
		}),
		success: function (data, textStatus) {
			console.log(data)
			if(data != null){
				setBotResponse(data);
			}

			console.log("Rasa Response: ", data, "\n Status:", textStatus)
		},
		error: function (errorMessage) {
			setBotResponse("");
			console.log('Error' + errorMessage);

		},  
		timeout: 3000
	});
}

// function translate(msg){
// 	let apiUrl = `https://api.mymemory.translated.net/get?q=${message}&langpair=hi-IN|en-GB&de=prateek.nits.cs@gmail.com`;
// 	fetch(apiUrl).then(res => res.json()).then(data => {
// 		console.log(data.responseData.translatedText);
// 		message = data.responseData.translatedText;
// 		console.log(message);
// 	});
// }
//------------------------------------ Set bot response -------------------------------------
function setBotResponse(val) {
	setTimeout(function () {
		if (val.length < 1) {
			//if there is no response from Rasa
			msg = 'I couldn\'t get that. Let\' try something else!';

			var BotResponse = '<img class="botAvatar" src="./static/img/botAvatar.png"><p class="botMsg">' + msg + '</p><div class="clearfix"></div>';
			$(BotResponse).appendTo('.chats').hide().fadeIn(1000);

		} else {
			//if we get response from Rasa
			for (i = 0; i <val.length; i++) {
				//check if there is text message
				if (val[i].hasOwnProperty("text")) {
					var BotResponse = ''
					let apiUrl = `https://medicbot-languageapi.herokuapp.com/en/or/${val[i].text}`;
					fetch(apiUrl).then(res => res.json()).then(data => {
						// console.log(data.text + ' this is en to or'),
						BotResponse = '<img class="botAvatar" src="./static/img/botAvatar.png"><p class="botMsg">' + data.text + '</p><div class="clearfix"></div>';
						$(BotResponse).appendTo('.chats').hide().fadeIn(1000);
  			   		});
				}
				// if (val[i].hasOwnProperty("text")) {
				// 	console.log(val[i].text + ' second func');
				// 	// translate val[i.text] here into hindi
				// 	var BotResponse = '<img class="botAvatar" src="./static/img/botAvatar.png"><p class="botMsg">' + val[i].text + '</p><div class="clearfix"></div>';
				// 	$(BotResponse).appendTo('.chats').hide().fadeIn(1000);
				// }

				//check if there is image
				if (val[i].hasOwnProperty("image")) {
					var BotResponse = '<div class="singleCard">' +
						'<img class="imgcard" src="' + val[i].image + '">' +
						'</div><div class="clearfix">'
					$(BotResponse).appendTo('.chats').hide().fadeIn(1000);
				}
				if (val[i].hasOwnProperty("buttons")) {
					addSuggestion(val[i].buttons);
				}
				//check if there is  button message
				

			}
			
			scrollToBottomOfResults();
		}

	}, 500);
}

// function engtohin(data){
// 	let apiUrl = `https://api.mymemory.translated.net/get?q=${engMessage}&langpair=en-GB|hi-IN&de=prateek.nits.cs@gmail.com`;
// 					fetch(apiUrl).then(res => res.json()).then(data => {
// 						console.log(data.responseData.translatedText + ' yo'),
// 						engMessage = data.responseData.translatedText
//   			   		});
// }

// ------------------------------------------ Toggle chatbot -----------------------------------------------
$('#profile_div').click(function () {
	$('.profile_div').toggle();
	$('.widget').toggle();
	scrollToBottomOfResults();
});

$('#close').click(function () {
	$('.profile_div').toggle();
	$('.widget').toggle();
});


// ------------------------------------------ Suggestions -----------------------------------------------

function addSuggestion(textToAdd) {
	setTimeout(function () {
		var suggestions = textToAdd;
		var suggLength = textToAdd.length;
		$(' <div class="singleCard"> <div class="suggestions"><div class="menu"></div></div></diV>').appendTo('.chats').hide().fadeIn(1000);
		// Loop through suggestions
		for (i = 0; i < suggLength; i++) {
			$('<div class="menuChips" data-payload=\''+(suggestions[i].payload)+'\'>' + suggestions[i].title + "</div>").appendTo(".menu");
		}
		scrollToBottomOfResults();
	}, 1000);
}


// on click of suggestions, get the value and send to rasa
$(document).on("click", ".menu .menuChips", function () {
	var text = this.innerText;
	var payload= this.getAttribute('data-payload');
	console.log("button payload: ",this.getAttribute('data-payload'))
	setUserResponse(text);
	send(payload);
	$('.suggestions').remove(); //delete the suggestions 
});