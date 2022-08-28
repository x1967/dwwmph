/*gerer les données pour les avoir en francais*/
let allPokemon = [];
let tableauFin = [];
const searchInput = document.querySelector('.recherche-poke input');
const listePoke = document.querySelector('.liste-poke');
const chargement = document.querySelector('.loader');

const types = {
    grass: '#78c850',
    ground: '#E2BF65',
    dragon: '#6F35FC',
    fire: '#F58271',
    electric: '#F7D02C',
    fairy: '#D685AD',
    poison: '#966DA3',
    bug: '#B3F594',
    water: '#6390F0',
    normal: '#D9D5D8',
    psychic: '#F95587',
    flying: '#A98FF3',
    fighting: '#C25956',
    rock: '#B6A136',
    ghost: '#735797',
    ice: '#96D9D6'
};

/*appel des 151 premiers pokemon*/
function fetchPokemonBase() {
    fetch("https://pokeapi.co/api/v2/pokemon?limit=151")

    .then(reponse => reponse.json())

    .then((allPoke) => {
        // console.log(allPoke);/*plus la peinde de l'appeler*/
        /*pour chaque éléments du tableau on envoie une fonction*/
        allPoke.results.forEach((pokemon) => {
            /*appeler cette m"éthode avec chque élément du tableau*/
            fetchPokemonComplet(pokemon);

        })

    })

}
/*appel de la fonction*/
fetchPokemonBase();

function fetchPokemonComplet(pokemon) {

    let objPokemonFull = {};
    let url = pokemon.url;
    let nameP = pokemon.name;

    fetch(url)
        .then(reponse => reponse.json())
        .then((pokeData) => {
            // console.log(pokeData);

            objPokemonFull.pic = pokeData.sprites.front_default;
            objPokemonFull.type = pokeData.types[0].type.name;
            objPokemonFull.id = pokeData.id;


            fetch(`https://pokeapi.co/api/v2/pokemon-species/${nameP}`)
                .then(reponse => reponse.json())
                .then((pokeData) => {
                    // console.log(pokeData);

                    objPokemonFull.name = pokeData.names[4].name;
                    allPokemon.push(objPokemonFull);

                    /*chargement de tous les pokemons*/
                    if (allPokemon.length === 151) {
                        // console.log(allPokemon);
                        /*trier les cartes*/
                        tableauFin = allPokemon.sort((a, b) => {
                            /*la valeur courante moins un autre élément-peut avoir trois valeurs*/
                            return a.id - b.id;
                            /*couper le tableau-garder les 21 premiers-pour les 21 premières cartes*/
                            /*slice découpe un tableau et en retourne un autre*/
                        }).slice(0, 21);
                        // console.log(tableauFin);

                        createCard(tableauFin);
                        chargement.style.display = "none";
                    }

                })

        })

}

// Création des cartes

function createCard(arr) {

    for (let i = 0; i < arr.length; i++) {

        /*tri : une carte pour un pokémon*/
        const carte = document.createElement('li');
        let couleur = types[arr[i].type];
        carte.style.background = couleur;
        const txtCarte = document.createElement('h5');
        txtCarte.innerText = arr[i].name;
        const idCarte = document.createElement('p');
        idCarte.innerText = `ID# ${arr[i].id}`;
        const imgCarte = document.createElement('img');
        imgCarte.src = arr[i].pic;

        carte.appendChild(imgCarte);
        carte.appendChild(txtCarte);
        carte.appendChild(idCarte);

        listePoke.appendChild(carte);

    }

}

// Scroll Infini

window.addEventListener('scroll', () => {

    const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
    // scrollTop = scroll depuis le top
    // scrollHeight = scroll total
    // clientHeight = hauteur de la fenêtre, partie visible.

    if (clientHeight + scrollTop >= scrollHeight - 20) {
        addPoke(6);
    }

})

let index = 21;

function addPoke(nb) {
    if (index > 151) {
        return;
    }
    const arrToAdd = allPokemon.slice(index, index + nb);
    //arrToAdd : afficher un morceau de tableau.Prendre les 6  pokemons apres les 21 premiers.//
    console.log(index, index + nb);
    createCard(arrToAdd);
    index += nb; //rajoute au 21 ainsi de suite//
}



searchInput.addEventListener('keyup', recherche); //a l'ecoute-méthode recherche//

function recherche() {

    if (index < 151) {
        addPoke(130);
    }

    let filter, allLi, titleValue, allTitles;
    filter = searchInput.value.toUpperCase();
    allLi = document.querySelectorAll('li');
    allTitles = document.querySelectorAll('li > h5');


    for (i = 0; i < allLi.length; i++) {

        titleValue = allTitles[i].innerText;

        if (titleValue.toUpperCase().indexOf(filter) > -1) {
            allLi[i].style.display = "flex";
        } else {
            allLi[i].style.display = "none";
        }

    }

}








// Animation Input-pour la fin//

searchInput.addEventListener('input', function(e) {

    if (e.target.value !== "") {
        e.target.parentNode.classList.add('active-input');
    } else if (e.target.value === "") {
        e.target.parentNode.classList.remove('active-input');
    }

})