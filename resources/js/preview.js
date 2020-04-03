const previewTitle = ()=> {
    let post = document.querySelector('#title').value;
    document.querySelector('.preview-title').textContent = document.querySelector('#title').value;
}
const previewBody = ()=> {
    document.querySelector('#preview-body').textContent = document.querySelector('#body').value;

}