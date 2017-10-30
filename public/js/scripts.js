var internalErrorMessage = "An internal error occured.";

function sendAjaxRequest(form, successFunction, failFunction)
{
$.ajax({
type: form.attr("method"),
url: form.attr("action"),
cache: false,
data: form.serializeArray()
})
.done(successFunction)
.fail(failFunction);
}

