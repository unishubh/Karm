<html>
<head>
<style>
.modalDialog{
	position:fixed;
	font-family:Arial,comic sans ms,sans-serif;
	top:15%;
	bottom:0;
	left:0;
	right:0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition:400ms ease-in;
	pointer-events:none;
	text-decoration: none;
}
.modalDialog:target{
	opacity: 1;
	pointer-events:auto;
}
.modalDialog > div{
	width:400px;
	position: relative;
	top:0;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#fff,#999);
	background: -webkit-linear-gradient(#fff,#999);
	background: -o-linear-gradient(#fff,#999);
}
.close{
	background: #606061;
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right:-12px;
	text-align: center;
	top:-10px;
	width: 24px;
	text-decoration: none;
	font-weight: bold;
}
}
#marg
{
	border-color: black;
	border-spacing: 2px;

}
</style>
</head>
<body>


<div id="openModal" class="modalDialog">
<div>
<div id="mar">
<a href="#close" title="Close" class="close">X</a>
<h2>Search Results</h2>

</div>
</div>
</div>
</body>
</html>
