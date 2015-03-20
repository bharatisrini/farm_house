
<style>
.click-nav ul {
	font-weight:500;
}
.click-nav ul li {
	position:relative;
	list-style:none;
	cursor:pointer;
}
.click-nav ul li ul {
	position:absolute;
	left:0;
	right:0;
}
.click-nav ul .clicker {
	background:#FFFFFF;
	color:#22222;
}
.click-nav ul .clicker:hover,
.click-nav ul .active {

}
.dsp img {
	position:absolute;
}
.click-nav ul li a {
	transition:background-color 0.2s ease-in-out;
	-webkit-transition:background-color 0.2s ease-in-out;
	-moz-transition:background-color 0.2s ease-in-out;
	display:block;
	
	background:#FFF;
	color:#333;
	text-decoration:none;
	width:130px;
	font-size:14px;
}
.click-nav ul li a:hover {
	background:#F2F2F2;
}
/* Fallbacks */
.click-nav .no-js ul {
	display:none;
}
.click-nav .no-js:hover ul {
	display:block;

}
</style>

<header class="group">
	<div class="wrapper group" align="center">
    	<div class="logo group"><a href="index.php"><img src="images/logo-big.png" alt="Logo" /></a></div>
        <div class="top-menu">
        	<ul>
                <li><a href="javascript:void(0)" class="lang"></a>
                	<ul class="sub-menu">
                    	<li><a href="" class="active">Eng</a></li>
                        <li><a href="">Chi</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>