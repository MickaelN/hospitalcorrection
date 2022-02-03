//Je selectionne tout les éléments HTML ayant pour class infoEdit. Cela devient une liste d'élément itérable
const infoEdit = document.querySelectorAll(".infoEdit")
//Je converti cette liste en tableau
const infoEditArray = Array.from(infoEdit)
infoEditArray.map((elmt)=>{
    elmt.addEventListener("click",function(){
        let modifyId = this.getAttribute("data-modify")
        document.getElementById(modifyId + "Input").style.display = "inline-block"
        document.getElementById(modifyId + "IconCheck").style.display = "inline-block"
        document.getElementById(modifyId + "IconModify").style.display = "none"
        document.getElementById(modifyId + "Span").style.display = "none"
     })
})

//Permet de transformer la date fr en date sql
birthdateInput.value = moment(birthdateSpan.textContent,"DD/MM/YYYY").format("YYYY-MM-DD")

/**
 * A
 * J
 * A
 * X
 */