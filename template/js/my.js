let part = location.href.split('/');
let request = part[3];
if (request == "") {
    request = "index";
}
$("#link-" + request).addClass("active");