
<div id="container2" style="z-index:1;"></div>
<script type="text/javascript" src="include/swfobject.js"></script>

<div>
<script type="text/javascript">
	var s1 = new SWFObject("http://localhost:9090/siparmal/app/include/video/player.swf","ply","380","320","9","#ffffff");
	s1.addParam("flashvars","file=video4.flv&image=http://localhost:9090/siparmal/app/include/video/preview.jpg");
	s1.addParam("allowfullscreen","true");
	s1.addParam("allowscriptaccess","always");
	s1.write("container2");
</script>
</div>

