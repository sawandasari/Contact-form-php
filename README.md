# Contact Form - PHP

## Description

Welcome to my Contact Form project! 🎉 This project is a simple web-based contact form built with HTML, CSS, JavaScript, and PHP. It allows users to send messages directly from a website to a specified email address. The main objective of this project was to create a smooth and responsive form where users can submit their name, email, and message.

## Features

- **User-Friendly Form**: The form includes fields for name, email, and message. These fields are validated to ensure all information is properly entered before submission.
- **Asynchronous Form Submission**: The form uses AJAX (through JavaScript) to send data without reloading the page, providing a seamless user experience.
- **Input Sanitization**: To prevent security issues, all user inputs are sanitized using PHP’s built-in filter functions.
- **Responsive Design**: The design is responsive, making it functional across various devices.

## Important Notes

- **Email Functionality**: 
  - Please note that the email functionality in this project **does not actually send emails** in its current state. This is because I am not using an SMTP library such as PHPMailer. In the current setup, the PHP `mail()` function is used, which will not work as expected on local development environments without proper configuration (e.g., no mail server available).
  - To enable email functionality in a production environment, an SMTP service (like Gmail, SendGrid, etc.) should be integrated, and PHPMailer or a similar library should be used.

- **Frontend and Backend**: 
  - **Frontend**: The form is created using HTML5 and CSS3 for styling, with JavaScript handling the AJAX request to submit the form asynchronously.
  - **Backend**: PHP is used to process the form data. It validates the user inputs, checks for errors, and sends a response back to the frontend.
