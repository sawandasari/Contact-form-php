document.addEventListener("DOMContentLoaded", function () {
    //  to grab the form element
    const form = document.getElementById("contactForm");
    const responseMessage = document.getElementById("response");
    
    // Checkign if form and responseMessage elements exist in the DOM
    if (!form || !responseMessage) {
        console.error("Form or response message element not found.");
        return;
    }

    form.addEventListener("submit", function (event) {
        event.preventDefault(); //to prevent the default form submission

        // created a FormData objcet to send form data asynchronously
        let formData = new FormData(form);

       
        // Sending the data to process.php using the fetch API
        fetch("process.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            // Checkiing if the response status is OK 
            if (!response.ok) {
                throw new Error("Server error: " + response.statusText);
            }
            return response.json(); 
        })
        .then(data => {
            // response message
            responseMessage.textContent = data.message;
            responseMessage.style.color = data.success ? "green" : "red";
        })
        .catch(error => {
            // Display an error message if something goes wrong
            responseMessage.textContent = error.message || "Error submitting form.";
            responseMessage.style.color = "red";
        });
    });
});
