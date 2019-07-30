
var parser = new UAParser();
var uastring = navigator.userAgent;
parser.setUA(uastring);
var result = parser.getResult();

var browsername = result.browser.name;
var browserversion = result.browser.version;
var devicetype = result.device.type;
var devicevendor = result.device.vendor;
var osname = result.os.name;
var devicemodel;
var osversion;
var engine = result.engine.name;
var engineversion = result.engine.version;
function fill() {
    if (result.os.name == "iOS") {
        if (result.device.model == "iPhone") {
            document.getElementById('devicemodel').innerHTML = getiPhoneModel();
            devicemodel = getiPhoneModel();
        } else {
            document.getElementById('devicemodel').innerHTML = getiPadModel();
            devicemodel = getiPadModel();
        }
    } else {
        if( result.device.model != undefined) {
            document.getElementById('devicemodel').innerHTML = result.device.model;
            devicemodel = result.device.model;
        }
        else{
            if (result.os.version != undefined){
                document.getElementById('devicemodel').innerHTML = "Android "+ result.os.version+" smartphone";
                devicemodel = "Android "+ result.os.version+" smartphone";
                //fillInfo();
            }
            else{
                document.getElementById('devicemodel').innerHTML = "Unidentified phone";
                devicemodel = "Unidentified phone";
                //fillInfo();
            }
        }
    }

    if(devicevendor!=undefined){
    }
    else{
    }
    if (result.os.version == undefined) {
        osversion = "not disclosed";
    } else {
        osversion = result.os.version;
    }

}

var btnCopy = document.getElementById( 'copy' );

btnCopy.addEventListener( 'click', function(){
    var myCode = document.getElementById('devicemodel').innerText;
    var fullLink = document.createElement('input');
    document.body.appendChild(fullLink);
    fullLink.value = myCode;
    var isiOSDevice = navigator.userAgent.match(/ipad|iphone/i);
    if (isiOSDevice) {
        var editable = fullLink.contentEditable;
        var readOnly = fullLink.readOnly;

        fullLink.contentEditable = true;
        fullLink.readOnly = false;

        var range = document.createRange();
        range.selectNodeContents(fullLink);

        var selection = window.getSelection();
        selection.removeAllRanges();
        selection.addRange(range);

        fullLink.setSelectionRange(0, 999999);
        fullLink.contentEditable = editable;
        fullLink.readOnly = readOnly;

    }
    fullLink.select();
    document.execCommand("copy", false);
    btnCopy.classList.add( 'copied' );

    var temp = setInterval( function(){
        btnCopy.classList.remove( 'copied' );
        clearInterval(temp);
    }, 600 );
    fullLink.remove();
} );

