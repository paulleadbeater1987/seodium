
document.getElementById("post_form").addEventListener("submit", function(event) {
    // Get form data
    const name = document.getElementById("contact_name").value.trim();
    const email = document.getElementById("contact_email").value.trim();
    const dateOfBirth = document.getElementById("contact_dateofbirth").value.trim();

    // Validate name
    if (name === "") {
        alert("Please enter your name.");
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Validate email format
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email === "" || !emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Validate date of birth
    if (dateOfBirth === "") {
        alert("Please enter your date of birth.");
        event.preventDefault(); // Prevent form submission
        return;
    }

    // If everything is valid, the form will be submitted
});


document.getElementById("show_bear_dance").addEventListener("click", function(event) {
    // Prevent default link behavior
    event.preventDefault();
    
    const bearDance = document.getElementById("bear_dance");

    // Toggle the display style between none and block
    if (bearDance.style.display === "none" || bearDance.style.display === "") {
        bearDance.style.display = "block";
    } else {
        bearDance.style.display = "none";
    }
});
