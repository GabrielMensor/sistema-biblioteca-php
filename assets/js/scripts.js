function scrollContentLeft(scrollName) {
    const scrollContainer = document.getElementById(scrollName);
    try {
        scrollContainer.scrollLeft -= 200;
    } catch (error) {
        return
    }
    console.log('Scroll Content Left:', scrollContainer.scrollLeft);
}

function scrollContentRight(scrollName) {
    const scrollContainer = document.getElementById(scrollName);
    try {
        scrollContainer.scrollLeft += 200;
    } catch (error) {
        return
    }
    console.log('Scroll Content Right:', scrollContainer.scrollLeft);
}

window.onload = function() {                                // executar o scroll apenas depois de toda a página carregada, para evitar mensagens de erro por carregamento
    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('scroll-button')) {
            if (e.target.parentNode.id.slice(0,-10) === 'add-last') {
                console.log('add-last clicado')
                const scrollName = "add-last"
    
                if (e.target.classList.contains('left')) {
                    console.log('left')
                    scrollContentLeft(scrollName)
                }
                else if (e.target.classList.contains('right')) {
                    console.log("right")
                    scrollContentRight(scrollName)
                }
            }
            if (e.target.parentNode.id.slice(0,-10) === 'see-more') {
                console.log('book element clicado')
                const scrollName = "see-more"
                if (e.target.classList.contains('left')) {
                    console.log('left')
                    scrollContentLeft(scrollName)
                }
                else if (e.target.classList.contains('right')) {
                    console.log("right")
                    scrollContentRight(scrollName)
                }
            }
        }
    })
}