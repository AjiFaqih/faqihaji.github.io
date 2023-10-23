document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.getElementById("toggle-mode");
    const boxes = document.querySelectorAll('.box');

    // Menyalakan dark mode
    function enableDarkMode() {
        document.body.classList.remove("light-mode");
        document.body.style.fontWeight = 'bold';
        // shadow box
        boxes.forEach(box => {
            box.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.5)';
        });
        
        localStorage.setItem("mode", "dark");
        toggleButton.textContent = "Light Mode";
    }

    // Menyalakan light mode
    function enableLightMode() {
        document.body.classList.add("light-mode");
        document.body.style.fontWeight = 'normal';
        boxes.forEach(box => {
            box.style.boxShadow = '0 12px 24px rgba(0, 0, 0, 0.9)';
        });
        localStorage.setItem("mode", "light");
        toggleButton.textContent = "Dark Mode";
    }

    toggleButton.addEventListener("click", function() {
        if (document.body.classList.contains("light-mode")) {
            enableDarkMode();
        } else {
            enableLightMode();
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var popup = document.getElementById("popup");
    var showPopupButton = document.getElementById("showPopup");
    var closeButton = document.getElementById("closePopup");

    // Menampilkan POP UP box saat link "Kontak" diklik
    showPopupButton.onclick = function (e) {
        e.preventDefault();
        popup.style.visibility = "visible";
    };

    // Menutup POP UP
    closeButton.onclick = function (e) {
        e.preventDefault(); 
        popup.style.visibility = "hidden";
    };

    popup.onclick = function (e) {
        if (e.target === popup) {
            popup.style.visibility = "hidden";
        }
    };
});







