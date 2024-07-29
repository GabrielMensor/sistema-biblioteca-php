function scrollContentLeft() {
    const scrollContainer = document.getElementById('add-last');    /* colocar verificação */
    scrollContainer.scrollLeft -= 200;
    console.log('Scroll Content Left:', scrollContainer.scrollLeft);
}

function scrollContentRight() {
    const scrollContainer = document.getElementById('add-last');    /* colocar verificação */
    scrollContainer.scrollLeft += 200;
    console.log('Scroll Content Right:', scrollContainer.scrollLeft);
}