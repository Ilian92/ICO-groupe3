document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.carousel-item');
    const cardName = document.querySelector('.card-details .card-name');
    const cardDescription = document.querySelector('.card-details .card-description');
    const badge = document.querySelector('.card-details .badge');
    const leftArrow = document.querySelector('.arrow.left');
    const rightArrow = document.querySelector('.arrow.right');

    let activeIndex = 30;

    function updateCarousel() {
        items.forEach((item, index) => {
            item.classList.toggle('active', index === activeIndex);
        });
        const activeItem = items[activeIndex];
        cardName.textContent = activeItem.querySelector('.card-name').textContent;
        cardDescription.textContent = activeItem.querySelector('.card-description').textContent;
        badge.innerHTML = activeItem.querySelector('.badge-info').innerHTML;
        const offset = -(activeIndex * (items[0].offsetWidth + 51) - (carousel.offsetWidth / 2 - items[0].offsetWidth / 2));
        carousel.style.transform = `translateX(${offset}px)`;
    }

    leftArrow.addEventListener('click', () => {
        activeIndex = (activeIndex > 0) ? activeIndex - 1 : items.length - 1;
        carousel.style.transition = 'transform 0.3s ease';
        updateCarousel();
    });

    rightArrow.addEventListener('click', () => {
        activeIndex = (activeIndex < items.length - 1) ? activeIndex + 1 : 0;
        carousel.style.transition = 'transform 0.3s ease';
        updateCarousel();
    });

    items.forEach((item, index) => {
        item.addEventListener('click', () => {
            activeIndex = index;
            updateCarousel();
        });
    });

    updateCarousel();
});