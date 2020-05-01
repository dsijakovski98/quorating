// reqForms = document.getElementsByName("req-form");

acceptButtons = document.getElementsByName("accept-request");
denyButtons = document.getElementsByName("deny-request");

postVal = document.getElementById("post_val");

acceptButtons.forEach((button) => {
    button.addEventListener("click", submitForm);
});
denyButtons.forEach((button) =>{
    button.addEventListener("click", submitForm);
});
// acceptButton.addEventListener("mousedown", submitForm);
// denyButton.addEventListener("mousedown", submitForm);


function submitForm(e) {
    e.stopPropagation();
    // console.log("Submitting form...");
    button = e.target;
    id = button.id[button.id.length - 1];
    
    formID = "request_form" + id;
    form = document.getElementById(formID);
    if(button.id.includes("accept")) {
        form.children[3].value = "accept";
    }
    else {
        form.children[3].value = "deny";
    }
    modalID = "#exampleModal" + id;

    form.submit();

    $(modalID).modal('hide');

}