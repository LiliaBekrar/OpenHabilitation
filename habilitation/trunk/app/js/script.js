/**
 * Script JS spécifique à l'applicatif, ce script est destiné à être
 * appelé en dernier dans la pile des fichiers JS.
 *
 * @package openmairie_exemple
 * @version SVN : $Id: script.js 2202 2013-03-28 17:30:48Z fmichon $
 */

function app_initialize_content() {
	get_agent();

}

function get_agent() {

var liste = [{"matricule":"05913","value":"RAYNAUD","label":"FRANCOIS","sexe":"M","date_titularisation":"01\/04\/81","date_fp":"01\/04\/80"}];
/*
$('#search_agent').autocomplete({
    source : liste,//liste, // on inscrit la liste de suggestions
    minLength : 2, // on indique qu'il faut taper au moins 2 caractères pour afficher l'autocomplétion
    select : function(event, ui){ // lors de la sélection d'une proposition
		alert(ui.item.value); // message d alerte
        $('#nom').val( ui.item.value ); // on ajoute la description de l'objet dans un bloc
		$('#prenom').val( ui.item.prenom );
    },
    position : {
        my : 'bottom',
        at : 'top'
    }, // ici, ma liste se placera au-dessus et à l'extérieur de mon champ de texte. right et left
     
});
}
*/
var web_agent = $("input[name='web_agent']").val();
$('#search_agent').autocomplete({
    source : function (request, response) {
		$.ajax({
			url: web_agent,
			data: { q: request.term },
			dataType: "json",
			success: function (data) {
				response($.map(data, function (item) {
					return { label: item.nom+' '+item.prenom,
						     value: item.nom+' '+item.prenom,
						     nom : item.nom,
						     prenom : item.prenom,
						     date_fonction_publique: item.date_fonction_publique,
						     date_naissance: item.date_naissance,
						     matricule: item.matricule,
						     grade: item.grade,
						     };
				}));
			}
		});
	},
    minLength : 2, // on indique qu'il faut taper au moins 2 caractères pour afficher l'autocomplétion
    select : function(event, ui){ // lors de la sélection d'une proposition
		var con = confirm('Etes vous sur de vouloir l\'agent '+ui.item.value+ ' ? \n\n ne le '+ui.item.date_naissance+'   \n grade : '+ui.item.grade+' ');
		if(con == true) {
			//alert(ui.item.value); // message d alerte
			$('#nom').val( ui.item.nom ); // on ajoute la description de l'objet dans un bloc
			$('#prenom').val( ui.item.prenom );
			$('#date_fonction_publique').val( ui.item.date_fonction_publique );
			$('#matricule').val( ui.item.matricule );
			$('#date_naissance').val( ui.item.date_naissance );
			$('#grade').val( ui.item.grade );
		}else
			$('#search_agent')[0].val();
    },
    position : {
        my : 'bottom',
        at : 'top'
    }, // ici, ma liste se placera au-dessus et à l'extérieur de mon champ de texte. right et left
     
});
}


function get_date_habilitation() {
	//alert("ca passe");
	$('#date_validite_habilitation').val( $("input[name='date_debut']").val());
}

