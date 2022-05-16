function previewImage(id) {
    let att_id = 'image_' + id;
    let image = document.getElementById(att_id);
    let imagePreview = document.getElementById("image_preview_" + id);

    let ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);
    ofReader.onload = function (oFREvent) {
        imagePreview.innerHTML = '<img id=' + att_id + ' name=' + att_id + ' class="img-thumbnail" src="' + oFREvent.target.result + '">';
    }
}

function previewImages() {
    const image = document.querySelector('#image');
    const imagePreview = document.getElementById("images-preview");

    imagePreview.innerHTML = '';
    for (let i = 0; i < image.files.length; i++) {
        let ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[i])
        ofReader.onload = function (oFREvent) {
            imagePreview.innerHTML += '<img class="img-thumbnail" src="' + oFREvent.target.result + '">';
        }
    }
}

function removeImage(id) {
    let imagePreview = document.getElementById("div_image_" + id);
    imagePreview.innerHTML = '<input class="form-control" name="deleted_images[]" type="hidden" value="'+id+'">';
}