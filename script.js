function toggleMenu() {
  const menu = document.querySelector(".menu-links");
  const icon = document.querySelector(".hamburger-icon");
  menu.classList.toggle("open");
  icon.classList.toggle("open");
}

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("form").addEventListener("submit", function (e) {
    e.preventDefault();
    const toast = document.getElementById("toast");
    var formData = new FormData(this);

    fetch("contact.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          document.getElementById("form").reset();
          toast.classList.add("success");
          toast.innerText = "🚀 " + data.message;
          setTimeout(() => {
            toast.classList.remove("success");
            toast.innerText = "";
          }, 5000);
        } else {
          toast.classList.add("warning");
          toast.innerText = "⚠️ " + data.message;
          setTimeout(() => {
            toast.classList.remove("warning");
            toast.innerText = "";
          }, 5000);
        }
      })
      .catch((error) => {
        toast.classList.add("danger");
        toast.innerText = "⚡ Un problème est survenu.";
        setTimeout(() => {
          toast.classList.remove("danger");
          toast.innerText = "";
        }, 5000);
      });
  });
});
