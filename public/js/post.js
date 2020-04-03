setTimeout(() => {
    document.querySelector('.new-comment-button').classList.add('new-comment-button-toggle');
}, '1000');

const newComment = ()=> {
    document.querySelector('.new-comment-button').classList.toggle('new-comment-button-toggle');
    document.querySelector('.new-comment').classList.toggle('new-comment-toggle');
}
const options = ()=> {
    document.querySelector('.options').classList.add('options-toggle');
}
const optionsOff = e => {
    if(!e.target.matches('.post-options , .options *')) {
        document.querySelector('.options').classList.remove('options-toggle');
    }
}

const postEdit = ()=> {
    document.querySelector('.options').classList.remove('options-toggle');
    document.querySelector('.responsive-title').style.display = "none";
    document.querySelector('.post-edit-form').style.display="block";
    document.querySelector('.text-details').style.display="none";
    
}

document.body.addEventListener('click',optionsOff);
