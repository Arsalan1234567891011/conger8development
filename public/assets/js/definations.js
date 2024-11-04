function get_base_url(){
    return "https://app.congreg8.org";
}

function get_controller(){
    var url      = window.location.href;
    var split = (url.split('/'));
    return split[3];
}


function get_function(){
    var url      = window.location.href;
    var split = (url.split('/'));
    return split[6];
}


function get_parameter(){
	var url      = window.location.href;
	var split = (url.split('/'));
	var parameter = split[6];

	if(parameter > 0){
		return parameter;
	}else{
		return 0;
	}
}
