var http = createRequestObject();
var objectId = '';


function createRequestObject(htmlObjectId){
    var obj;
    var browser = navigator.appName;
    
    objectId = htmlObjectId;
    
    if(browser == "Microsoft Internet Explorer"){
        obj = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else{
        obj = new XMLHttpRequest();
    }
    return obj;    
}

function sendReq(serverFileName, variableNames, variableValues) {
	var paramString = '';
	
	variableNames = variableNames.split(',');
	variableValues = variableValues.split(',');
	
	for(i=0; i<variableNames.length; i++) {
		paramString += variableNames[i]+'='+variableValues[i]+'&';
	}
	paramString = paramString.substring(0, (paramString.length-1));
			
	if (paramString.length == 0) {
	   	http.open('get', serverFileName);
	}
	else {
		http.open('get', serverFileName+'?'+paramString);
	}
    http.onreadystatechange = handleResponse;
    http.send(null);
}

function handleResponse() {
	
	if(http.readyState == 4){
		responseText = http.responseText;
		document.getElementById(objectId).innerHTML = responseText;
    }
}