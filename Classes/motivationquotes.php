<?php
namespace Classes;
use PDO;

class Motivationquote {
    public function listQuotes($dbcon) {
        $sql = "SELECT * FROM quotes";
        $pdobtm = $dbcon->prepare($sql); //btm: berryteam system
        $pdobtm->execute();

        $motivationquotes = $pdobtm->fetchAll(PDO::FETCH_ASSOC);
        return $motivationquotes;
    }

    public function addMotiQuotes($dbcon, $quotes, $category) {
        $sql = "INSERT INTO quotes (quotes, category)";
        $pst = $dbcon->prepare($sql);

        $pst->bindParam(':quotes', $quotes);
        $pst->bindParam(':category', $category);

        $count = $pst->execute();
        return $count;
    }

    public function getMotiQuoteById($id, $dbcon) {
        $sql = "SELECT * FROM quotes WHERE id = :id";
        $pst = $dbcon->prepare($sql);
        $pst -> bindParam(':id', $id);
        $pst -> execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }

    public function updateMotiQuotes($dbcon, $quotes, $category, $id) {
        $sql = "Update quotes
                set quotes = :quotes,
                category = :category,
                WHERE id = :id";

        $pst =   $dbcon->prepare($sql);

        $pst->bindParam(':quotes', $quotes);
        $pst->bindParam(':category', $category);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }

    public function deleteMotiQuotes($db, $id) {
        $sql = "DELETE FROM quotes WHERE `ID` = :id";

        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }







}