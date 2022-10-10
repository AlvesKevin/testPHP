<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost:3306;dbname=fhcn0606_laboiteajeu;charset=utf8', 'fhcn0606');
    }catch (Exception $e){
        die('Erreur'.$e->getMessage());
    }
