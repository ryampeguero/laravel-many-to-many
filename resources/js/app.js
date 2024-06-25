import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";


const preview = document.getElementById('preview');

if (preview)
    imagePreview();

const form = document.getElementById('delete-form');
if(form)
    showDeleteModal();




//Functions

function showDeleteModal(){
    const deleteBtn = document.getElementById('delete');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        deleteBtn.addEventListener('click', () => {
            form.submit();
        })
    });   
}

function imagePreview() {

    const imgPath = document.getElementById('image');
    const btnPreview = document.getElementById('show-preview');

    btnPreview.addEventListener('click', (event) => {
        event.preventDefault();
        preview.innerHTML = "";
        const imgPreview = new Image();

        let file = imgPath.files; //Leggo i file contenuti nell'input
        console.log(file);

        const reader = new FileReader(); //Istanza della Classe FileReader

        reader.onload = async (event) => { //Carico asincro
            imgPreview.setAttribute('src', event.target.result)
        }

        reader.readAsDataURL(file[0]);

        preview.append(imgPreview);
    });

    console.log(imgPreview);
}