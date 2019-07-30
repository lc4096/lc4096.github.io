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

            devicemodel = getiPhoneModel();
        } else {

            devicemodel = getiPadModel();
        }
    } else {
        if (result.device.model != undefined) {
            devicemodel = result.device.model;
        } else {
            if (result.os.version != undefined) {
                devicemodel = "Android " + result.os.version + " smartphone";
            } else {
                devicemodel = "Unidentified phone";
            }
        }
        if (result.os.version == undefined) {

            osversion = "not disclosed";
        } else {

            osversion = result.os.version;
        }

    }
    if(devicevendor == undefined){
        devicevendor = "Unidentified vendor";
    }
    if(engineversion == undefined){
        engineversion = "Not disclosed";
    }
}
$(document).ready(function() {
    $("#source_form").submit(function(event) {
        event.preventDefault();
        if (result.device.type == "mobile" || result.device.type == "tablet") {
            $.post("insertSQLite_UA.php",
                {
                    browsername: browsername,
                    browserversion: browserversion,
                    devicetype: devicetype,
                    devicemodel: devicemodel,
                    devicevendor: devicevendor,
                    osname: osname,
                    osversion: osversion,
                    engine: engine,
                    engineversion: engineversion,
                    Pid: document.getElementById("Pid").value,
                    rawUA: navigator.userAgent
                },
                function (data, status) {
                    console.log(data.toString() + status.toString());
                });
            setTimeout(function(){
                window.location.href = "views/smartphone.php";
            }, 200);

        }else {
            window.location.href = "views/other.php"
        }
    });
});
function get(name){
    if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
        return decodeURIComponent(name[1]);
}

// function record() {
//     if (result.device.type == "mobile" || result.device.type == "tablet") {
//         $.post("insertSQLite_UA.php",
//             {
//                 browsername: browsername,
//                 browserversion: browserversion,
//                 devicetype: devicetype,
//                 devicemodel: devicemodel,
//                 devicevendor: devicevendor,
//                 osname: osname,
//                 osversion: osversion,
//                 engine: engine,
//                 engineversion: engineversion,
//                 Pid: document.getElementById("Pid").value,
//                 rawUA: navigator.userAgent
//             },
//             function (data, status) {
//
//                 alert(data.toString() + status.toString());
//             });
//     }
// }

fill();

if(get('id')!=undefined){
    if (result.device.type == "mobile" || result.device.type == "tablet") {
        $.post("insertSQLite_UA.php",
            {
                browsername: browsername,
                browserversion: browserversion,
                devicetype: devicetype,
                devicemodel: devicemodel,
                devicevendor: devicevendor,
                osname: osname,
                osversion: osversion,
                engine: engine,
                engineversion: engineversion,
                Pid: get('id'),
                rawUA: navigator.userAgent
            },
            function (data, status) {
                console.log(data.toString() + status.toString());
            });
        setTimeout(function(){
            window.location.href = "views/smartphone.php";
        }, 200);

    }else {
        window.location.href = "views/other.php"
    }
}