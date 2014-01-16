(function(){
	// limite dos textos
	var limitText = function() {
		var count = "140";
		var txt = document.text_generator.txt.value;
		var len = txt.length;
		if(len > count){
		        txt = txt.substring(0,count);
		        document.text_generator.txt.value = txt;
		        return false;
		}
		document.text_generator.limit.value = count-len;
	}
	// gera as mensagens
	var getMessage = function(){
		var txt, generatorMsg, show_text, text, min_txt, input_send;

		txt = document.getElementById("txt");
		generatorMsg =	document.getElementById("generatorMsg");
		show_text = generatorMsg.querySelector(".text_generated").childNodes[1];

		min_txt = document.querySelector(".min_txt").childNodes[0];
		
		txt.onkeyup = txt.onkeypress = function() {
			show_text.innerHTML = this.value;
			input_send = document.getElementById("msg").value = this.value;
			limitText();
		}
	}

	var share = function() {
		console.log('teste')
	}

	var btn_share = document.getElementById("shareButton");

		btn_share.onclick = function(evt) {
			
			share();

			evt.preventDefault();
			evt.stopPropagation();
		}

	getMessage();
})();
	

