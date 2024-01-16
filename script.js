function toggleMenu() {
  const menu = document.querySelector(".menu-links");
  const icon = document.querySelector(".hamburger-icon");
  menu.classList.toggle("open");
  icon.classList.toggle("open");
}

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("form").addEventListener("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    fetch("contact.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert(data.message);
          document.getElementById("form").reset();
        } else {
          alert("Erreur lors du traitement des données.");
        }
      })
      .catch((error) => {
        alert("Erreur lors de la requête Fetch : " + error.message);
      });
  });
});
