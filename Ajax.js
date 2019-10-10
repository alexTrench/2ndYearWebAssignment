/**
 * Created by Alexander on 22/11/2017.
 */
function updateTarget( txt ) {
    'use strict';
    document.getElementById('target').innerHTML = txt;
}

function getRequest( url, callbackFunction, config ) {
    'use strict';
    var httpRequest, useJSON,
        responseType = config && config.responseType;

    useJSON = responseType === 'json'; // true if responseType is 'json'

    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        httpRequest = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) { // IE
        try {
            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {}
        }
    }

    if (!httpRequest) {
        alert('Giving up :( Cannot create an XMLHTTP instance');
        return false;
    }

    if (useJSON && httpRequest.overrideMimeType) {
        httpRequest.overrideMimeType('application/json');
    }

    httpRequest.onreadystatechange = function() {
        var completed = 4, successful = 200, returnValue;
        if (httpRequest.readyState == completed) {
            if (httpRequest.status == successful) {
                if (useJSON) {
                    returnValue = JSON.parse(httpRequest.responseText);
                } else {
                    returnValue = httpRequest.responseText;
                }
                callbackFunction( returnValue );
            } else {
                alert('There was a problem with the request.');
            }
        }
    };
    httpRequest.open('get', url, true);
    httpRequest.send(null);
}  // end of function getRequest

// the function that will be called by the onreadystatechange event
function alertContents(httpRequest) {
    'use strict';
    // assign the readystate numbers to more friendly variables
    var completed = 4, successful = 200;
    if (httpRequest.readyState == completed) {
        if (httpRequest.status == successful) {
            // assign the responseText from the httpRequest to the target element
            document.getElementById('target').innerHTML = httpRequest.responseText;
        } else {
            alert('There was a problem with the request.');
        }
    }
}






