function getXMLHttpRequest() {
    var xhr = null;
    
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest(); 
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
    
    return xhr;
}

var xhr = getXMLHttpRequest();
var reTweetContent = encodeURIComponent("contenu avec des espaces");

xhr.open("POST", "index.php?controller=home", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhr.send("reTweetContent=truc");