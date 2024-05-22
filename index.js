function redirecionarComprar() {
    window.location.href = './pages/Catalog/catalog.html'
};

const btnComprar = document.getElementById ('comprar');

btnComprar.addEventListener('click',redirecionarComprar);

const btnVerMais = document.getElementById ('verMais')

btnVerMais.addEventListener ('click', function(){
    document.getElementById ('infoBox').scrollIntoView({
        behavior: "smooth"
    })
});

function redirecionarContato() {
    window.location = './pages/About/about.html';
}

const btnContato = document.getElementById ('duvidasBotao')

btnContato.addEventListener ('click', redirecionarContato);
