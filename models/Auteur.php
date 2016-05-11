<?php

if(!class_exists('Human')) { include 'Human.php'; }
class Auteur extends Human
{
    public function createArticle($nom, $thematique, $texte, $db)
    {
        $addArticle = 'INSERT INTO article SET nom = :nom, id_article = :id_article, txt = :txt, date = :date, thematique = :thematique, id_profil = :id_profil';
        $stmt = $db->prepare($addArticle);
        $stmt->bindParam(':txt', $texte, PDO::PARAM_STR, 255);
        $stmt->bindParam(':date', $date = date("d-m-Y"), PDO::PARAM_STR, 255);
        $stmt->bindParam(':thematique', $thematique, PDO::PARAM_STR, 255);
        $stmt->bindParam(':id_profil', $this->id, PDO::PARAM_STR, 255);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 255);
        $stmt->execute();
    }

    public function modifierArticle($id_article, $texte, $db)
    {
        $modifArticle = 'UPDATE article SET txt = :txt, date = :date WHERE id_article = :id_article';
        $stmt = $db->prepare($addArticle);
        $stmt->bindParam(':txt', $texte, PDO::PARAM_STR, 255);
        $stmt->bindParam(':id_article', $id_article, PDO::PARAM_STR, 255);
        $stmt->bindParam(':date', $date = date("d-m-Y"), PDO::PARAM_STR, 255);
        $stmt->execute();
    }
}