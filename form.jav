document.querySelector(".speaker-form").addEventListener("submit", function(event) {
    var name = document.querySelector('input[name="name"]').value.trim();
    var email = document.querySelector('input[name="email"]').value.trim();
    var phone = document.querySelector('input[name="phone"]').value.trim();
    var product = document.querySelector('select[name="product"]').value;
    
    if (name === "" || email === "" || phone === "" || product === "") {
        alert("Todos los campos son obligatorios.");
        event.preventDefault();
    } else if (!validateEmail(email)) {
        alert("Por favor, ingresa un correo electrónico válido.");
        event.preventDefault();
    }
});

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

document.querySelector(".speaker-form").addEventListener("submit", function(event) {
    event.preventDefault();
    var formData = new FormData(this);

    fetch("form.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Oops! Algo salió mal.");
    });
});
