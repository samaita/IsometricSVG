
<html>
	<head>
		<title>ISOMETRIC</title>
		<style>
			object{
				position: absolute;
			}
			div#loadCanvas {
			    transform: scale(0.5);
			    -webkit-transform:scale(0.5);
			    -ms-transform:scale(0.5);
   			    -o-transform:scale(0.5);
			    width: 100%;
			    height:400px;
			    margin-top: 25%;
			}
		</style>
		<script src='assets/jquery/jquery.min.js'></script>
		<script>
			$(document).ready(function(){
				
				var frst1 = getSVG("frst-1");
				
				var rd13 = getSVG("rd-1-3");
				var rd24 = getSVG("rd-2-4");
				var rdbrdg13 = getSVG("rd-brdg-1-3");
				var rdbrdg24 = getSVG("rd-brdg-2-4");

				var rdtrn12 = getSVG("rd-trn-1-2");
				var rdtrn23 = getSVG("rd-trn-2-3");
				var rdtrn34 = getSVG("rd-trn-3-4");
				var rdtrn41 = getSVG("rd-trn-4-1");

				var rdintrsc31 = getSVG("rd-intrsc-3-1");
				var rdintrsc32 = getSVG("rd-intrsc-3-2");
				var rdintrsc33 = getSVG("rd-intrsc-3-3");
				var rdintrsc34 = getSVG("rd-intrsc-3-4");
				var rdintrsc4 = getSVG("rd-intrsc-4");

				var rvr13 = getSVG("rvr-1-3");
				var rvr24 = getSVG("rvr-2-4");

				var rvrtrn12 = getSVG("rvr-trn-1-2");
				var rvrtrn23 = getSVG("rvr-trn-2-3");
				var rvrtrn34 = getSVG("rvr-trn-3-4");
				var rvrtrn41 = getSVG("rvr-trn-4-1");
				
				var map = [
					[frst1,		frst1,		frst1,		frst1,		frst1,		frst1,		frst1,		frst1],
					[rd24, 		rdintrsc33, rd24, 		rd24, 		rd24, 		rdtrn34, 	frst1, 		frst1],
					[frst1,		rd13,		frst1,		frst1, 		frst1,		rd13,		frst1, 		rvrtrn23],
					[rvr24,		rdbrdg13,	rvr24,		rvrtrn34, 	frst1, 		rd13, 		frst1,		rvr13],
					[frst1,		rd13,		frst1,		rvr13,		frst1,		rdintrsc32,	rd24,		rdbrdg24],
					[frst1,		rd13,		frst1,		rvrtrn12,	rvr24,		rdbrdg13,	rvr24,		rvrtrn41],
					[rd24,		rdintrsc4,	rd24,		rd24,		rd24,		rdintrsc31,	rdtrn34,	frst1],
					[frst1,		rd13,		frst1,		frst1,		frst1,		frst1,		rd13,		frst1],
					[frst1,		rd13,		frst1,		frst1,		frst1,		frst1,		rd13,		frst1]
					];
				
				for(var zCount = map[0].length - 1;zCount > -1 ; zCount--){
					for(var xCount = 0; xCount < map.length; xCount++){
						console.log(xCount, zCount);
						console.log(map[xCount][zCount]);
						$("#loadCanvas").append(setProp(map[xCount][zCount], xCount, zCount, map[0].length-1));
					}
				}

			});

			function getSVG(param){
				var assetsLocation = "assets/svg/";
				return assetsLocation + param + ".svg"; 
			}
			function setProp(data, xIndex, zIndex, max){
				marginLeft = (xIndex + zIndex - Math.floor(max/2)) * 122.20; 
				marginTop = (xIndex - zIndex - Math.floor(max/2)) * 70.5; 
				//console.log(xIndex, zIndex);
				return "<object data="+ data +" style='margin-left:"+ marginLeft +"px;margin-top:"+ marginTop +"px'></object>";
			}
		</script>
	</head>
	<body>
		<div id='loadCanvas'>			
		</div>
	</body>
</html>