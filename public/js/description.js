const aboutButtons = document.querySelectorAll("div#ABOUT button");
console.log(aboutButtons)

function giveDescription(){
    const save = this;
    const container = save.parentElement.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");
    // fetch(`/description/${id}`)
    //     .then(function () {
    //         // alert("saved!");
    //         // save.innerHTML = parseInt(save.innerHTML) + 1;
    //     })
    this.get("/saved");
}

aboutButtons.forEach(button => button.addEventListener("click", giveDescription));

