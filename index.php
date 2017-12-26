<html>
<head>
	<body>
		<table>
			<tr>
				<td>
					Nama
				</td>
				<td>
					:
				</td>
				<td>
					Faruq
				</td>
			</tr>
			<tr>
				<td>
					Nrp
				</td>
				<td>
					:
				</td>
				<td>
					2110151059
				</td>
			</tr>
			<tr>
				<td>
					Kelas
				</td>
				<td>
					:
				</td>
				<td>
					3 D4 ITB
				</td>
			</tr>
		</table>
		<br>
		<br>
		<br>
		<h1>data training</h1>
		<form>
			<table border="1" id="tbodyTraining">
				<tr>
					
					<td>
						Cuaca
					</td>
					<td>
						Temperatur
					</td>
					<td>
						kecepatan angin
					</td>

					<td>
						olahraga
					</td>
				</tr>
					<tr>
					
					<td>
						cerah
					</td>
					<td>
						normal
					</td>
					<td>
						pelan
					</td>

					<td>
						ya
					</td>
				</tr>
				<tr>
					
					<td>
						cerah
					</td>
					<td>
						normal
					</td>
					<td>
						pelan
					</td>

					<td>
						ya
					</td>
				</tr>
				<tr>
					
					<td>
						hujan
					</td>
					<td>
						tinggi
					</td>
					<td>
						pelan
					</td>

					<td>
						tidak
					</td>
				</tr>
				<tr>
					
					<td>
						cerah
					</td>
					<td>
						normal
					</td>
					<td>
						kencang
					</td>

					<td>
						ya
					</td>
				</tr>
				<tr>
					
					<td>
						hujan
					</td>
					<td>
						tinggi
					</td>
					<td>
						kencang
					</td>

					<td>
						tidak
					</td>
				</tr>
				<tr>
					
					<td>
						cerah
					</td>
					<td>
						normal
					</td>
					<td>
						pelan
					</td>

					<td>
						ya
					</td>
				</tr>
				
			</table>
			
		</form>

			<h1>data testing</h1>
			<table border="1" id="hipotes">
				<tr>
					
					<td>
						Cuaca
					</td>
					<td>
						Temperatur
					</td>
					<td>
						kecepatan angin
					</td>

					<td>
						olahraga
					</td>
				</tr>
				<tr>
					<td>
						<select name="xt" id="xtest">
							<option value="0">-</option>
							<option value="1">cerah</option>
							<option value="2">hujan</option>
						</select>
					</td>
					<td>
						<select name="yt" id="ytest">
							<option value="0">-</option>
							<option value="1">normal</option>
							<option value="2">tinggi</option>
						</select>
					</td>
					<td>
						<select name="kt" id="ktest">
							<option value="0">-</option>
							<option value="1">pelan</option>
							<option value="2">kencang</option>
							
						</select>
					</td>
					<td>
						<p id="enjoytest"></p>
					</td>
				</tr>
				
			</table>
				<button type="button" id="testbut">testing</button>
	</body>
</head>
<script src="jquery-1.11.3.min.js"></script>
<script>
	var data=[[1,1,1,1],
				 [1,1,1,1],
				 [2,2,1,2],
				 [1,1,2,1],
				 [2,2,2,2],
				 [1,1,1,1]];

	var totYa =0;
	var totTdk =0;
	var jumYa = 0;
	var jumTdk = 0;
	var permutX1_ya=1;
	var permutX1_tdk=1;
	var permutX2_ya=1;
	var permutX2_tdk=1;
	var permutX3_ya=1;
	var permutX3_tdk=1;
	var permutYa=0;
	var permutTak=0;
	var fixYa=0;
	var fixTdk=0;
	$('#testbut').click(function(event) {
		var bagus=0;
		var x1 = document.getElementById('xtest').value;
		var x2 = document.getElementById('ytest').value;
		var x3 = document.getElementById('ktest').value;

		//menghitung fakta
		for(var baris=0;baris<6;baris++){
				if(data[baris][3]==1){
					totYa++;
				}
				else{
					totTdk++;
				}
		}
		permutYa = totYa/6;
		permutTak = totTdk/6;
		if(x3!=0){
			for(var baris=0;baris<6;baris++){
				if(x3==data[baris][2] && data[baris][3]==1){
					jumYa++;
				}
				if(x3==data[baris][2] && data[baris][3]==2){
					jumTdk++;
				}
			}
			permutX3_ya=jumYa/totYa;
			permutX3_tdk = jumTdk/totTdk;
			jumYa=0;
			jumTdk=0;
			

		}
		if(x2!=0){
			for(var baris=0;baris<6;baris++){
				if(x2==data[baris][1] && data[baris][3]==1){
					jumYa++;
				}
				if(x2==data[baris][1] && data[baris][3]==2){
					jumTdk++;
				}
			}
			//alert(jumYa);
			permutX2_ya=jumYa/totYa;
			permutX2_tdk = jumTdk/totTdk;
			jumYa=0;
			jumTdk=0;

		}
		 if(x1!=0){
			for(var baris=0;baris<6;baris++){
				if(x1==data[baris][0] && data[baris][3]==1){
					jumYa++;
				}
				if(x1==data[baris][0] && data[baris][3]==2){
					jumTdk++;
				}
			}
			permutX1_ya=jumYa/totYa;
			permutX1_tdk = jumTdk/totTdk;
			
		}		 
		fixYa = permutX1_ya*permutX2_ya*permutX3_ya*permutYa*100;
		fixTdk = permutX1_tdk*permutX2_tdk*permutX3_tdk*permutTak*100;
		document.getElementById('enjoytest').innerHTML = ""+fixYa+"%"+" "+"Ya"+" "+""+fixTdk+"%"+" "+"Tidak";





	});


</script>
</html>