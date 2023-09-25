const fileInput = document.getElementById('imageURL');
const imagePreview = document.getElementById('imagePreview');

fileInput.addEventListener('change', function () {
    const file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});