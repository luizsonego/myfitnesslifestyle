
	function initialize() {
  		var mapProp = {
        		center:new google.maps.LatLng(51.567299, -0.212384),
        		zoom:15,
        		mapTypeId:google.maps.MapTypeId.ROADMAP,
        		disableDefaultUI:true
  		};
  		var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
	}

