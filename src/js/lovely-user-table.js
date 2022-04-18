var httpRequest;
function makeRequest(userId)
{
    httpRequest = new XMLHttpRequest();
    if (!httpRequest) {
        alert('Cannot create an XMLHTTP instance');
        return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('GET', users.ajaxurl + '?userId=' + userId);
    httpRequest.send();
}
function alertContents()
{
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
            document.getElementById("userDetailSection").innerHTML = httpRequest.responseText;
        } else {
            alert('There was a problem with the request.');
        }
    }
}
