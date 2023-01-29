const toggleBtn = document.querySelector("#toggle-btn");
const sidebar = document.querySelector(".sidebar");

toggleBtn.addEventListener("click", function() {
    if (sidebar.style.display === "none") {
        toggleBtn.innerHTML = "Hide";
        sidebar.style.display = "block";
    } else {
        toggleBtn.innerHTML = "Show";
        sidebar.style.display = "none";
    }
});