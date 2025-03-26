document.addEventListener("DOMContentLoaded", function () {
    // I grab the form element
    const form = document.getElementById("contactForm");
    const responseMessage = document.getElementById("response");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // I prevent the default form submission

        // I create a FormData object to send form data asynchronously
        let formData = new FormData(form);

        // I send the data to process.php using fetch API
        fetch("process.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json()) // I parse the JSON response
        .then(data => {
            responseMessage.textContent = data.message;
            responseMessage.style.color = data.success ? "green" : "red";
        })
        .catch(error => {
            responseMessage.textContent = "Error submitting form.";
            responseMessage.style.color = "red";
        });
    });
});
