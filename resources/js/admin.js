/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');


 window.boolpress = {
    previewImage() {
        let reader = new FileReader();
        reader.readAsDataURL(document.getElementById("image").files[0]);
        reader.onload = function (event) {
            document.getElementById("uploadPreview").src = event.target.result;
        };
    }
}
