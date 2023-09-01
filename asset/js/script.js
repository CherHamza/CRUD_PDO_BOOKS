console.log('Hello Toi');


function Supp(link) {
    console.log('j ai cliquer');
    if (confirm('Confirmer la suppression ?')) {
        document.location.href = link;
    }
}