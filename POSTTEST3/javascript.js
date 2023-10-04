document.addEventListener("DOMContentLoaded", function() {
    var toggleButton = document.getElementById("toggle-mode");
    var boxes = document.querySelectorAll('.box');

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

function showAlert() {
    alert("PAGE UNDER MAINTENANCE!");
}








