<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>CSS Laptop</title>

<style>
    .laptop-wrapper {width: 100%;}
    .laptop-screen-frame {
        border: 1px solid #000;
        padding: 1.250em;
        margin: 0.625em 0.625em 0em 0.625em;
        border-radius: 1.250em 1.250em 0em 0em;
        border-bottom:none;
        background: rgb(149,149,149); 
    }
    .laptop-screen-content {
        background: #fff;
        height: auto;
    }
    .laptop-body {
        height:1.250em; 
        background: rgb(255,255,255);
        border: 1px solid #666;
    }
    .laptop-button {
        height:0.400em;
        width: 15%;
        margin:auto;
        border-radius: 0em 0em 10.00em 10.000em;
        background: rgb(216,216,216);
        margin-bottom: 0.625em;
        border: 1px solid #666;
        border-top: none;
    }
    .laptop-base {
        height:0.375em;
        border-radius: 0em 0em 10.00em 10.000em;
    background: rgb(216,216,216);
    margin-bottom: 0.625em;
    border: 1px solid #666;
    border-top: none;
    }
    img {
        max-width: 100%;
        height:auto;
    }
    @media \0screen {
       img { 
        width: auto;
      }
    }
</style>
</head>

<body>

<div class="container">
	<div class="laptop-wrapper">
		<div class="laptop-screen-frame">
        	<div class="laptop-screen-content">
            	<img src="screenshot.jpg" />
            </div>
        </div>
        <div class="laptop-body">
        	<div class="laptop-button">
            </div>
        </div>
        <div class="laptop-base">
        </div>
    </div>

</div>

</body>
</html>