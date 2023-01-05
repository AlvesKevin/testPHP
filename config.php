<?php
    try
    {
        $bdd = new PDO('mysql:host=109.234.164.178;dbname=;charset=utf8', '' ,'');
    }catch (Exception $e){
        die('Erreur'.$e->getMessage());
    }
