const saveButtons = document.querySelectorAll(".fa-save");
const deleteButtons = document.querySelectorAll(".fa-trash-alt");

function save() {
    const save = this;
    const container = save.parentElement.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");
    fetch(`/save/${id}`)
        .then(function () {
            alert("saved!");
        })
}
function remove(){
    const remove = this;
    const container = remove.parentElement.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");
    fetch(`/remove/${id}`)
        .then(function () {
            alert("removed!");
            window.location.reload(true);
        })
}
saveButtons.forEach(button => button.addEventListener("click", save));
deleteButtons.forEach(button => button.addEventListener("click", remove));