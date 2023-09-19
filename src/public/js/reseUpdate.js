document.addEventListener("DOMContentLoaded", function () {
    const switches = document.querySelectorAll(".switch");

    switches.forEach((switchButton) => {
        switchButton.addEventListener("click", function () {
            const card = this.closest(".rese-card");
            const invalidElement = card.querySelector(".invalid");

            if (invalidElement.style.display === "none" || invalidElement.style.display === "") {
                invalidElement.style.display = "block";
            } else {
                invalidElement.style.display = "none";
            }
        });
    });
});
