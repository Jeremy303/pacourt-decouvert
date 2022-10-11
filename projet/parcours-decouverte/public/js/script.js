/* OUVRTIR / FERMER MENU SLIDE POUR TABLETTE & MOBILE */
$(function() {
    $('#icon-menu-croix').hide();
    $('#icon-menu').on( "click", function() {
        $('#icon-menu').hide();
        $('#icon-menu-croix').show();
        $('.sidebar').show();
    });

    $('#icon-menu-croix').on( "click", function() {
        $('#icon-menu').show();
        $('#icon-menu-croix').hide();
        $('.sidebar').hide();
    });

    $(window).scroll(function() {
        $(".sidebar").hide();
        $('#icon-menu').show();
        $('#icon-menu-croix').hide();
    });   
});

/** TABLEAU PAGE AFFICHAGE EVENEMENT */
$(function() {
    $.fn.dataTable.moment( 'DD/MM/YYYY' );

    Table = $('#tableau_evenements').dataTable({
        retrieve: true, /** récupère une instance DataTables existante pour évité une erreur d'initialisation ("Cannot reinitialise DataTable") */
        paging: false, /** désactive la pagination */
            "info": false, /** désactive les infos (bas gauche), exemple: Showing 1 to 14 of 14 entries */
        language: { /** pour changer de langue */
            
            "search": "Rechercher"
        },
        columnDefs: [ { orderable: false, targets: [0] } ]
    });

    Table = $('#tableau_evenements_passes').dataTable({
        retrieve: true, /** récupère une instance DataTables existante pour évité une erreur d'initialisation ("Cannot reinitialise DataTable") */
        paging: false, /** désactive la pagination */
            "info": false, /** désactive les infos (bas gauche), exemple: Showing 1 to 14 of 14 entries */
        language: { /** pour changer de langue */
            
            "search": "Rechercher"
        }
    });
});

/** TABLEAU AFFICHAGE TOUT LES UTILISATEURS */
$(function() {
    $.fn.dataTable.moment( 'DD/MM/YYYY' );
    
    Table = $('#myTableUtilisateur').dataTable({
        retrieve: true, /** récupère une instance DataTables existante pour évité une erreur d'initialisation ("Cannot reinitialise DataTable") */
        paging: false, /** désactive la pagination */
            "info": false, /** désactive les infos (bas gauche), exemple: Showing 1 to 14 of 14 entries */
        language: { /** pour changer de langue */
            
            "search": "Rechercher"
        }
    });
});

/** TABLEAU AFFICHAGE UTILISATEURS EN ATTENTE DE CONFIRMATION */
$(function() {
    Table = $('#myTableUtilisateurAttente').dataTable({
        retrieve: true, /** récupère une instance DataTables existante pour évité une erreur d'initialisation ("Cannot reinitialise DataTable") */
        paging: false, /** désactive la pagination */
            "info": false, /** désactive les infos (bas gauche), exemple: Showing 1 to 14 of 14 entries */
        language: { /** pour changer de langue */
            
            "search": "Rechercher"
        }
    });
});

/** AFFICHAGE DU TABLEAU EN FONCTION DE L'ONGLET SELECTIONNE */
$(function() {

    $('#ContenuTableauUtilisateursAttente').show();
    $('#ContenuTableauAllUtilisateurs').show();
});

