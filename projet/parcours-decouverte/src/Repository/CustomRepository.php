<?php

namespace App\Repository;

use PhpParser\Builder\Class_;

class CustomRepository
{

    public function findNombreOrga()
    {
        $rawQuery1 = 'SELECT distinct partenaire.organisme, COUNT(debut) AS nombre
        FROM partenaire
        JOIN user ON partenaire.id = user.partenaire_id
        JOIN evenement ON user.id = evenement.user_id
        WHERE debut < cast(now() as DATE)
        AND debut > cast((now() + INTERVAL -1 year) as DATE)
        AND roles like \'%"ROLE_ORGANISATEUR"%\'
        group by partenaire.organisme
        ORDER BY nombre DESC
        LIMIT 5;';
        return $rawQuery1;
    }

    public function findListeOrga()
    {
        $rawQuery2 = 'SELECT distinct partenaire.organisme,YEAR(debut) annee, month(debut) mois, COUNT(debut) AS nombre
        FROM partenaire
        JOIN user ON partenaire.id = user.partenaire_id
        JOIN evenement ON user.id = evenement.user_id
        WHERE debut < cast(now() as DATE)
        AND debut > cast((now() + INTERVAL -1 year) as DATE)
        AND partenaire.organisme In (:org1, :org2, :org3, :org4, :org5)
        group by partenaire.organisme, mois
        ORDER BY partenaire.organisme, annee DESC, mois ASC;';
        return $rawQuery2;
    }

    public function findQuantityOrga()
    {
        $rawQuery3 = 'SELECT count(distinct partenaire.organisme) quantite
        FROM partenaire
        JOIN user ON partenaire.id = user.partenaire_id
        JOIN evenement ON user.id = evenement.user_id
        WHERE debut < cast(now() as DATE)
        AND debut > cast((now() + INTERVAL -1 year) as DATE)
        AND roles like \'%"ROLE_ORGANISATEUR"%\'';
        return $rawQuery3;
    }

    public function findNombreCandidat()
    {
        $rawQuery1 = 'SELECT partenaire.organisme, COUNT(candidat.nom) AS nombre
        FROM candidat
        JOIN evenement ON candidat.evenement_id = evenement.id
        JOIN user ON candidat.user_id = user.id
        JOIN partenaire ON user.partenaire_id = partenaire.id
        WHERE debut < cast(now() as DATE)
        AND debut > cast((now() + INTERVAL -1 year) as DATE)
        
        AND roles like \'%"ROLE_PRESCRIPTEUR"%\'
        GROUP BY partenaire.organisme
        ORDER BY nombre DESC
        LIMIT 5;';
        return $rawQuery1;
    }

    public function findListeCandidat()
    {
        $rawQuery2 = 'SELECT distinct partenaire.organisme,YEAR(debut) annee, MONTH(debut) mois, COUNT(candidat.nom) nombre
        FROM candidat
        JOIN evenement ON candidat.evenement_id = evenement.id
        JOIN user ON candidat.user_id = user.id
        JOIN partenaire ON user.partenaire_id = partenaire.id
        WHERE debut < cast(now() as DATE)
        AND debut > cast((now() + INTERVAL -1 year) as DATE)
        AND partenaire.organisme IN (:pre1, :pre2, :pre3, :pre4, :pre5)
        GROUP BY partenaire.organisme, mois
        ORDER BY partenaire.organisme, annee DESC, mois ASC;';
        return $rawQuery2;
    }

    public function findQuantityCandidat()
    {
        $rawQuery3 = 'SELECT count(distinct partenaire.organisme) quantite
        FROM candidat
        JOIN evenement ON candidat.evenement_id = evenement.id
        JOIN user ON candidat.user_id = user.id
        JOIN partenaire ON user.partenaire_id = partenaire.id
        WHERE debut < cast(now() as DATE)
        AND debut > cast((now() + INTERVAL -1 year) as DATE)
        AND roles like \'%"ROLE_PRESCRIPTEUR"%\'';
        return $rawQuery3;
    }
}
