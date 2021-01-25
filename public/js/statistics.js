const starButtons = document.querySelectorAll(".fa-star");
// const dislikeButtons = document.querySelectorAll(".fa-minus-square");

function giveStar() {
    const star = this;
    const container = star.parentElement.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");
    fetch(`/setStar/${id}`)
        .then(function () {
            star.innerHTML = parseInt(star.innerHTML) + 10;
        })
}

// function giveDislike() {
//     const dislikes = this;
//     const container = dislikes.parentElement.parentElement.parentElement;
//     const id = container.getAttribute("id");
//
//     fetch(`/dislike/${id}`)
//         .then(function () {
//             dislikes.innerHTML = parseInt(dislikes.innerHTML) + 1;
//         })
// }

starButtons.forEach(button => button.addEventListener("click", giveStar));
// dislikeButtons.forEach(button => button.addEventListener("click", giveDislike));