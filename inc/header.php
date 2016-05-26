<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Projet TOTO</title>
		<style type="text/css" media="screen">
			html, body {
				font-family: :Tahoma, Verdana, sans-serif;
				color:white;
				font-weight: 700;

				margin: 0;
				padding:0;

				background: url(img/backgroundstile.jpg) no-repeat center fixed;
				-webkit-background-size: cover; /* pour anciens Chrome et Safari */
	  			background-size: cover; /* version standardisée */	
			}
			main {
				width: 1500px;
				height: 100%;

				background:rgba(29, 31, 33, 0.85);
				
				margin:auto;
			}
			li a{
				color:#e26666;
			}
			td a{
				color:#e26666;
			}
			#studentlist li {
				list-style:none;
			}
			#studentlist li:nth-child(odd){
				background-color: darkgray;
			}
			h3{
				background:rgba(0, 0, 0, 1);
				line-height: 35px;
			}
			button{
				background:rgba(0, 0, 0, 1);
				line-height: 35px;
				
				clear: both;
				display: inline;
				border-style: none;
				font-weight: 700;
				outline-style: none;

				margin-top: 15px;
				margin-bottom: 35px;
				margin-left: 5px;
				margin-right: 5px;
			}
			button a{
				color:white;
				list-style: none;
				text-decoration: none;
			}
			button:hover{
				background-color: #414bbf;
			}
			.button1{
				float: left;
				display: inline;
			}
			.button2{
				margin-top: -2px;
				display: inline;
				
			}
			.homebutton{
				display: inline;
				text-decoration: none;
			}
			ul{
				list-style: none;
				margin-bottom: -15px;
			}
			table{
				text-align: left;
				margin-left: 35px;
			}
			.td2{
				text-align:center;
			}
			.inputbutton{
				background:rgba(0, 0, 0, 1);
				outline-style: none;
				
				color:white;
				font-weight: 700;
			}
			.inputbutton:hover{
				background-color: #414bbf;
				font-weight: 700;
			}
		</style>

	</head>
	<body>
		<form action="search.php" method="get">
			<input class="inputbox" type="text" name="search" value="">
			<input class="inputbutton" type="submit" value="Rechercher">
		</form>
		<br>
	<main>
	