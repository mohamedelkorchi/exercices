formulaire.addEventListener("submit", function(e) // ca fonctione sans initialiser la variable du formulaire ?

{
    nomFiltre = new RegExp ("^[a-zA-Z ]+$");
    testNom = nomFiltre.test(nom.value);

    if (nom.value == "")
    {
        erreurNom.textContent = "Veuillez renseigner un nom.";
        erreurNom.style.color = "#B2051F"; // comment avoir la palette de couleurs ?
        e.preventDefault();
    }
    else if (testNom != true)
    {
        erreurNom.textContent = "Renseignez correctement votre nom.";
        erreurNom.style.color = "red";
        e.preventDefault();
    }
    else 
    {
        erreurNom.textContent = ""
    }



    prenomFiltre = new RegExp ("^[a-zA-Z ]+$");
    testPrenom = prenomFiltre.test(prenom.value);

    if (prenom.value =="")
    {
        erreurPrenom.textContent = "Veuillez renseigner un prénom. "
        erreurPrenom.style.color = "#B2051F";
        e.preventDefault();
    }
    else if (testPrenom != true)
    {
        erreurPrenom.textContent = "Renseignez correctement votre prénom."
        erreurPrenom.style.color = "red"
        e.preventDefault();
    }
    else
    {
        erreurPrenom.textContent = "";
    }



    let homme = document.getElementById("masculin").checked;
    let femme = document.getElementById("feminin").checked;
    let sexes = femme || homme;

    if (sexes != true)
    {
        erreurSexe.textContent = "Indiquez votre sexe."
        erreurSexe.style.color = "#B2051F";
        e.preventDefault();
    }
    else
    {
        erreurSexe.textContent = "";
    }



    if (ddn.value == "")
    {
        erreurDdn.textContent = "Indiquez votre date de naissance."
        erreurDdn.style.color = "#B2051F";
        e.preventDefault();
    }
    else
    {
        erreurDdn.textContent = ""
    }



    cpFiltre = new RegExp ("^[0-9]{5}$")
    testCp = cpFiltre.test(cp.value);
    // console.log(cp.value);

    if (cp.value == "")
    {
        erreurCp.textContent = "Champ obligatoire.";
        erreurCp.style.color = "#B2051F";
        e.preventDefault();
    }
    else if (testCp != true)
    {
        erreurCp.textContent = "Le code postal doit comporter 5 chiffres."
        erreurCp.style.color = "red";
        e.preventDefault();
    }
    else
    {
        erreurCp.textContent = "";
    }




    mailFiltre = new RegExp ("^[a-z0-9.A-Z_ ]+@[a-zA-Z]+[.]{1}[a-zA-Z]{2,4}$");
    testmail = mailFiltre.test(email.value);

    if (email.value == "")
    {
        erreurMail.textContent = "Renseignez un Email.";
        erreurMail.style.color = "#B2051F";
        e.preventDefault();
    }
    else if (testmail != true)
    {
        erreurMail.textContent = "Inscrivez correctement votre Email."
        erreurMail.style.color = "red";
        e.preventDefault();
    }
    else
    {
        erreurMail.textContent = ""
    }



//  console.log(sujet.value);
    if (sujet.value == "selectionner")
    {
        erreurSujet.textContent = "Veuillez selectionner un sujet.";
        erreurSujet.style.color = "#B2051F";
        e.preventDefault();
    }    
    else
    {
        erreurSujet.textContent = "";
    }



    questionFiltre = new RegExp ("^[\\S ]{20,}$"); // 2 anti slash 
    testQuestion = questionFiltre.test(question.value);

    if (question.value == "")
    {
        erreurQuestion.textContent = "Veuillez inserer votre demande svp.";
        erreurQuestion.style.color = "#B2051F";
        e.preventDefault();
    }
    else if (testQuestion != true)
    {
        erreurQuestion.textContent = "20 caractères minimum.";
        erreurQuestion.style.color = "red";
        e.preventDefault();
    }
    else
    {
        erreurQuestion.textContent ="";
    }



    let accepterFormulaire = document.getElementById("accepter").checked;
    if (accepterFormulaire == "")
    {
        erreurAccepter.textContent = "Veuillez accepter pour envoyer le formulaire.";
        erreurAccepter.style.color = "#B2051F";
        e.preventDefault();
    }
    else
    {
        erreurAccepter.textContent = "";
    }

    if (erreurAccepter.textContent+erreurCp.textContent+erreurDdn.textContent+erreurMail.textContent+erreurNom.textContent+erreurPrenom.textContent+erreurQuestion.textContent+erreurSexe.textContent+erreurSujet.textContent == "")
    {
        alert("Envoi du formulaire imminent ... ")
    };
    // if (nom.value&&prenom.value&&ddn.value&&cp.value&&question.value&&email.value&&sujet.value&&)
    // {
    //     alert("Formulaire envoyé :-) ")
    // }

})



