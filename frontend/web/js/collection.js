let items = document.querySelectorAll('.mixAndMatchCarousel .carousel-item')
if(items.length > 4) {
    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i = 1; i < minPerSlide; i++) {
            if (!next) {
                // wrap carousel by using first child
                next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
    })
} else {
    $('#btnPrevRecipeCarousel,#btnNextRecipeCarousel').addClass('d-none');
}