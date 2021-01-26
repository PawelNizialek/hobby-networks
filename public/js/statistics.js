const starButtons = document.querySelectorAll(".fa-star");

function giveStar() {
    const star = this;
    const container = star.parentElement.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");
    fetch(`/setStar/${id}`)
        .then(function () {
            star.innerHTML = parseInt(star.innerHTML) + 1;
        })
}

starButtons.forEach(button => button.addEventListener("click", giveStar));