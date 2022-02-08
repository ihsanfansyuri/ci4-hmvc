function previewImg() {
    const foto = document.querySelector('#id_foto');
    const fotoLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    fotoLabel.textContent = foto.files[0].name;

    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);

    fileFoto.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}