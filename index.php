<html>
	<head>
		<title>ISOMETRIC</title>
		<style>

			body{
				margin:0px;
			}
			object, svg{
				position: absolute;
			}
			svg{
				transition: all 250ms;
				transform: scale(0.5);
			    -webkit-transform:scale(0.5);
			    -ms-transform:scale(0.5);
   			    -o-transform:scale(0.5);
			}
			div#loadCanvas {
			    width: 100%;
			    overflow:hidden;
			    height:100%;
			}
			
			.selected{
				transform: scale(1.5) !important;
			    -webkit-transform:scale(1.5) !important;
			    -ms-transform:scale(1.5) !important;
   			    -o-transform:scale(1.5) !important;
   			    z-index: 1000 !important;
			}

			#blackLayer{
				background: rgba(0,0,0,0.5);
				width:100%;
				height:100%;
				position:absolute;
				z-index: 999;
				top: 0;
			}
		</style>
		<script src='assets/jquery/jquery.min.js'></script>
		<script>
			$(document).ready(function(){
				$('#blackLayer').hide();

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
				// var map = [
				// 	[frst1,		frst1,		frst1],
				// 	[rd24, 		rdintrsc33, rd24 ],
				// 	[frst1,		rd13,		frst1],

				// ];
				// var map = [
				// 	[9,5,1],
				// 	[10,6,2],
				// 	[11,7,3],
				// 	[12, 8,4],
				// 	];
				// var map = [
				// [-2,-1,0,1,2],
				// [-2,-1,0,1,2],
				// [-2,-1,0,1,2],
				// ];
				var maxCount = 1;
				for(var zCount = map[0].length - 1;zCount > -1 ; zCount--){
					for(var xCount = 0; xCount < map.length; xCount++){
						//console.log(xCount, zCount);
						var objectName = (map[xCount][zCount]);
						//console.log(map[xCount][zCount]);
						//$("#loadCanvas").append(setProp(objectName, xCount, zCount, map[0].length-1));
						setObj(objectName, xCount, zCount, map[0].length-1, maxCount);
						//setObjPosition(xCount, zCount, map[0].length-1);
						maxCount++;
					}
				}
			});

			// Load as SVG Not Object
			function setObj(data, xIndex, zIndex, max, Count){
				$.get(data, function( data ) {
					marginLeft = (xIndex + zIndex - Math.floor(max/2)) * 59.2; 
					marginTop = (xIndex - zIndex - Math.floor(max/2)) * 34.2; 
					a = (new XMLSerializer()).serializeToString(data);
					a = a.substring(4);
					a = "<svg id=obj"+ xIndex + zIndex +" style='margin-left:"+ marginLeft +"px;margin-top:"+ marginTop +"px; z-index:"+Count+"'" + a;
					$("#loadCanvas").append(a);
					addInteractivity("svg#obj"+xIndex+zIndex);
					return a;
				});			
			}

			function addInteractivity(id){
				//fly(id);
				select(id);
			}

			function fly(object){
				// console.log(object+':hover');
				// marginTopValue = $(object).css('margin-top');
				// marginTopValue = Number(marginTopValue.substring(0, marginTopValue.length-2));
				// $(object+':hover').css('margin-top',marginTopValue-10 + '!important');
				// $(object).hover(function(){
				// 	marginTopValue = $(this).css('margin-top');
				// 	marginTopValue = Number(marginTopValue.substring(0, marginTopValue.length-2));
				// 	$(this).css('margin-top',marginTopValue-10);
				// 	console.log(marginTopValue-10);
				// });
				$(object)
				.mouseenter(
					function(){
						marginTopValue = $(this).css('margin-top');
						marginTopValue = Number(marginTopValue.substring(0, marginTopValue.length-2));
						$(this).css('margin-top',marginTopValue-10);
					})
				.mouseleave(
					function(){
						marginTopValue = $(this).css('margin-top');
						marginTopValue = Number(marginTopValue.substring(0, marginTopValue.length-2));
						$(this).css('margin-top',marginTopValue+10);
					});

			}

			function select(object){
				$(object).click(function(){
					$(this).attr("class",'selected');
					$('#blackLayer').fadeIn();
				});
				$(object).dblclick(function(){
					$(this).attr("class",'');
					$('#blackLayer').fadeOut();
				})
			}

			// function setObjIdPosition(xIndex, zIndex, max, Count){
			// 	$("#loadCanvas svg:nth-child("+Count+")").attr('id','obj'+xCount+ zCount);
			// 	console.log("LOAD");
			// }

			//Attempt of reducing total request by assign every map as an object, then load it to map, not request it again and again

			// function getSVG(param){
			// 	var assetsLocation = "assets/svg/";
			// 	mapTile(assetsLocation + param + ".svg");
			// 	return assetsLocation + param + ".svg"; 
			// }			

			// function mapTile(param){
			// 	this.desc = param;
			// 	this.map = $.get(param, function( data ) {
			// 		//marginLeft = (xIndex + zIndex - Math.floor(max/2)) * 122.20; 
			// 		//marginTop = (xIndex - zIndex - Math.floor(max/2)) * 70.5; 
			// 		a = (new XMLSerializer()).serializeToString(data);
			// 	}).done(function() {
			// 		 return data.responseText;
			// 	});
			// }

			//Load SVG file
			function getSVG(param){
				var assetsLocation = "assets/svg/";
				return assetsLocation + param + ".svg"; 
			}

			// function setProp(data, xIndex, zIndex, max){
			// 	marginLeft = (xIndex + zIndex - Math.floor(max/2)) * 122.20; 
			// 	marginTop = (xIndex - zIndex - Math.floor(max/2)) * 70.5; 
			// 	return "<object id=obj"+ xIndex + zIndex +" data="+ data +" style='margin-left:"+ marginLeft +"px;margin-top:"+ marginTop +"px' onload=setClick('"+data+"',"+xIndex+"," +zIndex+");></object>";
			// }

			// function setClick(objectName, xCount, zCount){
			// 	b = "obj"+xCount+zCount;
			// 	c = objectName.substring(11, objectName.length-4);
			// 	var a = document.getElementById(b).contentDocument.getElementById(c);
			// 	//console.log(a, b, c);
			// 	$(a).click(function(){
			// 		console.log(c);
			// 	});
			// 	// console.log('done');
			// }
		</script>
	</head>
	<body>
		
		<div id='loadCanvas'>
			<div id='blackLayer'></div>

		</div>
	</body>
</html>