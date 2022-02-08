search.addEventListener("input",function(){
    let value = this.value
    //On instancie l'objet XMLHttpRequest pour faire de l'AJAX
    let xhr = new XMLHttpRequest()
    //On ouvre une connexion en post vers le controller
    xhr.open("POST", "controllers/ajout-rendezvousCtrl.php", true)
    //On oublie pas ça sinon le controller ne recevera rien
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    //On spécifie les données à envoyer
    xhr.send("search="  + value) // $_POST['search'] = value
    //On attend une réponse du controller
    xhr.onreadystatechange = function () {
        //Si on a reçu une réponse et qu'elle est positive
        if (xhr.readyState == 4 && xhr.status == 200) {
            //On récupère un json
            const jsonPatient = xhr.responseText
            //On le parse pour pouvoir le parcourir
            const jsonPatientArray = JSON.parse(jsonPatient)
            //On vide la liste déroulante            
            patient.innerText = ""
            //On parcours le JSON
            jsonPatientArray.map((patientSelect)=>{
                //On selectionne la liste déroulante
                patient = document.getElementById("patient")
                //On crée une balise option virtuel
                let option = document.createElement("option")
                //On lui donne une value
                option.value = patientSelect.value
                //On lui donne un nom
                option.innerText = patientSelect.name
                //On l'attache à la liste déroulante
                patient.appendChild(option)
            })
        }
    };
})
