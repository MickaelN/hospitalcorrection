//Je selectionne tout les éléments HTML ayant pour class infoEdit. Cela devient une liste d'élément itérable
const infoEdit = document.querySelectorAll(".infoEdit")
//Je converti cette liste en tableau
const infoEditArray = Array.from(infoEdit)
infoEditArray.map((elmt) => {
    elmt.addEventListener("click", function () {
        let modifyId = this.getAttribute("data-modify")
        document.getElementById(modifyId + "Input").style.display = "inline-block"
        document.getElementById(modifyId + "IconCheck").style.display = "inline-block"
        document.getElementById(modifyId + "IconModify").style.display = "none"
        document.getElementById(modifyId + "Span").style.display = "none"
    })
})

//Permet de transformer la date fr en date sql
birthdateInput.value = moment(birthdateSpan.textContent, "DD/MM/YYYY").format("YYYY-MM-DD")

/**
 * AJAX
 */

const disableEdit = (id) => {
    document.getElementById(id + "Input").style.display = "none"
    document.getElementById(id + "IconCheck").style.display = "none"
    document.getElementById(id + "IconModify").style.display = "inline-block"
    document.getElementById(id + "Span").style.display = "inline-block"
}

const iconCheck = document.querySelectorAll(".fa-check-square")
const iconCheckArray = Array.from(iconCheck)
iconCheckArray.map((elmt) => {
    elmt.addEventListener("click", function () {
        //On récupère l'id du patient
        let id = patientInfo.getAttribute("data-id")
        //On récupère le nom du champ modifié
        let field = this.getAttribute("data-input")
        //On récupère la nouvelle valeur
        let value = document.getElementById(field + "Input").value
        //On instancie l'objet XMLHttpRequest pour faire de l'AJAX
        let xhr = new XMLHttpRequest()
        //On ouvre une connexion en post vers le controller
        xhr.open("POST", "controllers/profil-patientCtrl.php", true)
        //On oublie pas ça sinon le controller ne recevera rien
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        //On spécifie les données à envoyer
        xhr.send("field=" + field + "&value=" + value + "&id=" + id)
        //On attend une réponse du controller
        xhr.onreadystatechange = function () {
            //Si on a reçu une réponse et qu'elle est positive
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText == 1) {
                    document.getElementById(field + "Span").innerText = value
                    disableEdit(field)
                }
            }
        };
    })
})