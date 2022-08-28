/*contruction des variables*/
const intervalesCaractères = document.getElementById('intervalesCaractères')
const nombreCaractères = document.getElementById('nombreCaractères')
const inclueMajusculeElement = document.getElementById('inclueMajuscule')
const inclueNombresElement = document.getElementById('inclueNombres')
const inclueSymbolesElement = document.getElementById('inclueSymboles')
const form = document.getElementById('passwordGeneratorForm')
const affichagePassword = document.getElementById('affichagePassword')

/*générer les codes de caractères*/
const UPPERCASE_CHAR_CODES = arrayFromLowToHigh(65, 90)
const LOWERCASE_CHAR_CODES = arrayFromLowToHigh(97, 122)
const NUMBER_CHAR_CODES = arrayFromLowToHigh(48, 57)
const SYMBOL_CHAR_CODES = arrayFromLowToHigh(33, 47).concat(
    arrayFromLowToHigh(58, 64)
).concat(
    arrayFromLowToHigh(91, 96)
).concat(
    arrayFromLowToHigh(123, 126)
)

nombreCaractères.addEventListener('input', syncconstituerNbreCaractères)
intervalesCaractères.addEventListener('input', syncconstituerNbreCaractères)

/*Appel des fonctions quand elles sont sélectionnées*/
form.addEventListener('submit', e => {
    e.preventDefault()
    const constituerNbreCaractères = nombreCaractères.value
    const inclueMajuscule = inclueMajusculeElement.checked
    const inclueNombres = inclueNombresElement.checked
    const inclueSymboles = inclueSymbolesElement.checked
    const password = générerPassword(constituerNbreCaractères, inclueMajuscule, inclueNombres, inclueSymboles)
    affichagePassword.innerText = password
})

/*fonction pour générer le mot de passe*/
function générerPassword(constituerNbreCaractères, inclueMajuscule, inclueNombres, inclueSymboles) {
    let charCodes = LOWERCASE_CHAR_CODES
    if (inclueMajuscule) charCodes = charCodes.concat(UPPERCASE_CHAR_CODES)
    if (inclueSymboles) charCodes = charCodes.concat(SYMBOL_CHAR_CODES)
    if (inclueNombres) charCodes = charCodes.concat(NUMBER_CHAR_CODES)

    const passwordCaractères = []
    for (let i = 0; i < constituerNbreCaractères; i++) {
        const characterCode = charCodes[Math.floor(Math.random() * charCodes.length)]
        passwordCaractères.push(String.fromCharCode(characterCode))
    }
    return passwordCaractères.join('')
}

/*fonction générer code de caractères*/
function arrayFromLowToHigh(low, high) {
    const array = []
    for (let i = low; i <= high; i++) {
        array.push(i)
    }
    return array
}

/*fonction pour le nombre de caractères*/
function syncconstituerNbreCaractères(e) {
    const value = e.target.value
    nombreCaractères.value = value
    intervalesCaractères.value = value
}