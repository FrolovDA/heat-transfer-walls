/*
 * Set class for active link
 */
let part = location.href.split('/');
let request = part[3];
if (request == "") {
    request = "index";
}
$("#link-" + request).addClass("active");

/*
 * Config MathJax
 */
MathJax.Hub.Config({
    tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
});