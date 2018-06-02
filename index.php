
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="css/temp.css"  media="screen,projection"/>

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>



	<div class="container">
		<div><h3 class="center">Mate em 2</h3><p class="center"><br/>Clique em um jogo para expandi-lo</p><p class="center">Clique em "Copiar Conte&uacutedo" para copi&aacute-lo para a &aacuterea de transferencia</p></div>
		<div class="divider"></div>
		<ul class="collapsible popout" data-collapsible="expandable" id="lista">





















		</ul>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript">
		


		function copyTextToClipboard(text) {
			var textArea = document.createElement("textarea");

			textArea.style.position = 'fixed';
			textArea.style.top = 0;
			textArea.style.left = 0;
			textArea.style.width = '2em';
			textArea.style.height = '2em';
			textArea.style.padding = 0;
			textArea.style.border = 'none';
			textArea.style.outline = 'none';
			textArea.style.boxShadow = 'none';
			textArea.style.background = 'transparent';
			textArea.value = text;

			document.body.appendChild(textArea);
			textArea.select();

			try {
				var successful = document.execCommand('copy');
				var msg = successful ? 'successful' : 'unsuccessful';
				console.log('Copying text command was ' + msg);
			} catch (err) {
				console.log('Oops, unable to copy');
				window.prompt("Copie para área de transferência: Ctrl+C e tecle Enter", text);
			}

			document.body.removeChild(textArea);
		}


		
		$(document).ready(function() {




			var win = $(window);
			var x=0;
			for(x=0;x<70;x++){

				$.ajax({
					url: 'jogos/jogo '+x+'.html',
					dataType: 'html',
					success: function(html) {
						$('#lista').append(html);
						$('.modal').modal();
					}
				});



			}
			win.scroll(function() {
				if ($(document).height() - win.height() == win.scrollTop()) {
					for(y=x;x<y+100;x++){
						console.log(x);
						$.ajax({
							url: 'jogos/jogo '+x+'.html',
							dataType: 'html',
							success: function(html) {
								$('#lista').append(html);
								$('.modal').modal();
							}
						});
					}

				}

			});


		});



	</script>
</body>
</html>