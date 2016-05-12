<?php

if(!class_exists('Human')) { include 'Human.php'; }
class Auteur extends Human
{
    public function createArticle($nom, $thematique, $texte, $db)
    {
        $date = date("d-m-Y");
        $var = $this->getId();
        $addArticle = 'INSERT INTO article SET nom = :nom, txt = :txt, date = :date, id_theme = :thematique, id_profil = :id_profil';
        $stmt = $db->prepare($addArticle);
        $stmt->bindParam(':txt', $texte, PDO::PARAM_STR, 255);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR, 255);
        $stmt->bindParam(':thematique', $thematique, PDO::PARAM_STR, 255);
        $stmt->bindParam(':id_profil', $var, PDO::PARAM_STR, 255);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 255);
        $stmt->execute();
    }

    public function modifierArticle($id_article, $texte, $db)
    {
        $date = date("d-m-Y");
        $modifArticle = 'UPDATE article SET txt = :txt, date = :date WHERE id_article = :id_article';
        $stmt = $db->prepare($modifArticle);
        $stmt->bindParam(':txt', $texte, PDO::PARAM_STR, 255);
        $stmt->bindParam(':id_article', $id_article, PDO::PARAM_STR, 255);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR, 255);
        $stmt->execute();
    }
}