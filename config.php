<?php
    try
    {
        $bdd = new PDO('mysql:host=109.234.164.178;dbname=fhcn0606_laboiteajeu;charset=utf8', 'fhcn0606' ,'fMeE-5GqV-k3k@');
    }catch (Exception $e){
        die('Erreur'.$e->getMessage());
    }
