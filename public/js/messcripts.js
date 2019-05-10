function redirectToEdit(route) {
    window.location.href = route;
}

function supprimerArticle($bouton){


    // formulaire dans lequel la balise qui a généré l'appel AJAX était placée
    var $formulaire = $bouton.parents("form:first");
    var donneesFormulaire = $formulaire.serialize();     // on ne lit aucune donnée dans le formulaire mais on a besoin du jeton anti-CSRF
    var actionFormulaire = $formulaire.attr('action');   // l'URL pour l'appel AJAX doit être absolu

    // appel AJAX
    $.ajax({
        type: "POST",
        url: actionFormulaire,
        dataType: "json",
        data: donneesFormulaire
    })
        .done(function (response, textStatus, jqXHR) {
            if (response.reussi) {
                var $parentDiv = $bouton.parent().parent().parent();
                $bouton.parent().parent().remove();
                if ($parentDiv.children().length === 0) {
                    $parentDiv.append("<div class=\"col-lg-12\">\n" +
                        "<p>Aucun article n'est disponible en ce moment.</p>\n" +
                        "</div>")
                }
            } else {
                afficherPopupErreur('Oups, un problème a empêché la supression de l\'article.');
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            // le message est volontairement différent du précédent pour aider à cibler la cause de l'erreur
            afficherPopupErreur('Nous sommes désolés, il n\'est pas possible de compléter l\'opération pour l\'instant.');
        });
}


$(document).ready(function () {
    var thisAppend = jQuery('#appendedInput');
    $('#thisImage').click(function () {
        if (thisAppend.children().length === 0) {
            thisAppend.append(
                '<input type="file" class="form-control-file" name="image" id="image"\n' +
                'value="{{old(\'image\')}}">' + '<input type="hidden" name="effacer" value="effacer">')
        }

    });
    //APEL AJAX
    $('.a_link').click(function (event) {
        var $bouton = $(this);
        event.preventDefault();    // peu d'utilité ici mais serait nécessaire si l'appel AJAX était généré par un clic sur un bouton
        afficherPopupConfirmation("Désirez-vous vraiment supprimer cet item ?", function() {supprimerArticle($bouton)});

    });

    //SUPPRESSION SANS AJAX
    // $('.a_link').click(function () {
    //
    //     afficherPopupConfirmationSubmit('Désirez-vous vraiment supprimer cet item ?', $(this).parents("form:first"));
    //     // $(this).parent().submit();
    //
    //
    // })

    $('.jeu').click(function () {
        $(location).attr('href', $(this).data('url'))
    })
});

//--------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------//
// bibliothèque bâtie sur jQuery-confirm : https://craftpip.github.io/jquery-confirm/


// Affiche un popup d'information et l'usager doit cliquer sur OK pour le refermer
// source : http://christianelagace.com
// Paramètre : le texte du message qui sera affiché dans le popup
// Retourne une référence à la boîte de dialogue


function afficherPopupInformation(message) {
    $.confirm({
        title: 'Information',
        content: message,
        type: 'green',
        buttons: {
            OK: {
                text: 'OK',
                btnClass: 'btn-green',
            },
        }
    });
}


// Affiche un popup d'avertissement et l'usager doit cliquer sur OK pour le refermer
// source : http://christianelagace.com
// Paramètre : le texte du message qui sera affiché dans le popup


function afficherPopupAvertissement(message) {
    $.confirm({
        title: 'Erreur',
        content: message,
        icon: 'fa fa-warning',
        type: 'orange',
        buttons: {
            OK: {
                text: 'OK',
                btnClass: 'btn-orange',
            },
        }
    });
}


// Affiche un popup d'erreur et l'usager doit cliquer sur OK pour le refermer
// source : http://christianelagace.com
// Paramètre : le texte du message qui sera affiché dans le popup


function afficherPopupErreur(message) {
    $.confirm({
        title: 'Erreur',
        content: message,
        type: 'red',
        buttons: {
            OK: {
                text: 'OK',
                btnClass: 'btn-red',
            },
        }
    });
}


// À partir d'un lien <a href>, affiche un popup de confirmation et l'usager doit cliquer sur Oui ou sur Non.
// Le Oui redirige vers la page spécifiée dans l'attribut href du lien
// alors que le Non referme la boîte de dialogue sans rien modifier.
// source : htts://christianelagace.com
// Paramètres : question : le texte de la question qui sera affichée dans le popup
//              lien (optionnel) : référence au lien qui cause l'affichage du popup
//                                 On y lira l'attribut href pour savoir quelle page afficher sur un oui.
// Utilisation : afficherPopupConfirmationLien('Désirez-vous vraiment supprimer cet item ?', this);


function afficherPopupConfirmationLien(question, lien) {
    $.confirm({
        title: 'Confirmation',
        content: question,
        icon: 'fa fa-question',
        buttons: {
            oui: {
                text: "Oui",
                action: function () {
                    var hrefdefini = false;


                    if (lien != null) {
                        if ($(lien).attr("href") != undefined) {
                            hrefdefini = true;
                            // affiche la page de l'attribut href
                            window.location.href = $(lien).attr("href");
                        }
                    }
                    if (!hrefdefini) {
                        // réaffiche la page actuelle
                        window.location.reload();
                    }
                }
            },
            non: {
                text: "Non",
            }
        }
    });
}


// Affiche un popup de confirmation et l'usager doit cliquer sur Oui ou sur Non.
// Le Oui soumet le formulaire dont la référence a été reçue en paramètre
// alors que le Non referme la boîte de dialogue sans rien modifier.
// source : http://christianelagace.com
// Paramètres : question : le texte de la question qui sera affichée dans le popup
//              $formulaire (optionnel) : référence au formulaire doit être soumis.
//                                         Si non spécifié, réaffichera la page actuelle.
// Utilisation : afficherPopupConfirmation('Désirez-vous vraiment supprimer cet item ?', $(this).parents("form:first"));


function afficherPopupConfirmationSubmit(question, $formulaire) {
    $.confirm({
        title: 'Confirmation',
        content: question,
        icon: 'fa fa-question',
        buttons: {
            oui: {
                text: "Oui",
                action: function () {
                    if ($formulaire != null) {
                        $formulaire.submit();
                    } else {
                        // réaffiche la page actuelle
                        window.location.reload();

                    }
                }
            },
            non: {
                text: "Non",
            }
        }
    });
}


// Affiche un popup de confirmation et l'usager doit cliquer sur Oui ou sur Non.
// Le Oui exécute la fonction dont la référence a été reçue en paramètre
// alors que le Non referme la boîte de dialogue sans rien modifier.
// source : http://christianelagace.com
// Paramètres : question : le texte de la question qui sera affichée dans le popup
//              callback (optionnel) : référence à la fonction JavaScript qui doit être exécutée.
//                                     Si non spécifié, réaffichera la page actuelle.
// Utilisation : afficherPopupConfirmation('Désirez-vous vraiment supprimer cet item ?', nomFonction);
//
//               ou, pour passer des paramètres à la fonction :
//
//               afficherPopupConfirmation('Désirez-vous vraiment supprimer cet item ?', function() {
//                   nomFonction(unParametre, unAutreParametre)
//               });


function afficherPopupConfirmation(question, callback) {
    $.confirm({
        title: 'Confirmation',
        content: question,
        icon: 'fa fa-question',
        buttons: {
            oui: {
                text: "Oui",
                action: function () {
                    if (callback != null && typeof callback == "function") {
                        callback();
                    } else {
                        // réaffiche la page actuelle
                        window.location.reload();
                    }
                }
            },
            non: {
                text: "Non",
            }
        }
    });
}


// Affiche un popup de saisie avec une seule case de saisie.
// Le bouton de soumission exécute la fonction dont la référence a été reçue en paramètre
// alors que le bouton d'annulation referme la boîte de dialogue sans rien modifier.
// source : http://christianelagace.com
// Paramètres : titre : le titre à afficher dans le haut du popup
//              question : le texte de la question qui sera affichée en haut de la case de saisie.
//              defaut : valeur par défaut à afficher dans la case de saisie.
//              callback (optionnel) : référence à la fonction JavaScript qui doit être exécutée.
//                                     Si non spécifié, réaffichera la page actuelle.
// Utilisation : afficherPopupConfirmation('Désirez-vous vraiment supprimer cet item ?', nomFonction);
//
//               ou, pour passer des paramètres à la fonction :
//
//               afficherPopupConfirmation('Désirez-vous vraiment supprimer cet item ?', function() {
//                   nomFonction(unParametre, unAutreParametre)
//               });

// afficherPopupConfirmation

//--------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------//

