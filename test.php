<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
body{
	background: #ccc;
}

.content{
	background: #333;
	border: 2px solid #000;
}

.col1{
	background: #f00;
	border: 2px solid #c00;
}

.col2{
	background: #0f0;
	border: 2px solid #0c0;
}

.col3{
	background: #00f;
	border: 2px solid #00c;
}

.col4{
	background: #ff0;
	border: 2px solid #cc0;
}

.box01{
	background: #f00;
	border: 2px solid #c00;
	position: relative;
	width: 100px;
}

.box02{
	height: 50px;
	position: absolute;
	right: 0px;
	top: 0px;
	width: 50px;
}

.box03{
	height: 50px;
	position: relative;
	width: 50px;
}

.relative1 {
	background: #f00;
	position: relative;
}
.relative2 {
	position: relative;
	right: -50px;
	width: 500px;
}

	</style>
</head>
<body>
	<div class="content">
		<div class="relative1 col1">
			uno
			<div class="col2">
				uno uno
			</div>
		</div>

		<div class="relative2 col3">
			dos
		</div>

		<div class="col4">
			tres
		</div>
	</div>
</body>
</html>