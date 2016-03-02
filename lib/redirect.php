<?php

  class Redirect{

    public static function to($path, $message = null){
      // Katsotaan onko $message parametri asetettu
      if(!is_null($message)){
        // Jos on, lisätään se sessioksi JSON-muodossa
        $_SESSION['flash_message'] = json_encode($message);
      }

      if (is_null($path)) {
        // polku oli null, palauta edelliseen osoitteeseen tai alemmalle tasolle
        if (is_string($_SERVER['HTTP_REFERER']))
          header('Location: ' . $_SERVER['HTTP_REFERER']);
        else
          header('Location: ../');
      } else {
        // Ohjataan käyttäjä annettuun polkuun
        header('Location: ' . BASE_PATH . $path);
      }

      exit();
    }

  }
