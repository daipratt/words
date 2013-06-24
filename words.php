<?php
    class Words{
        // Declare variables
        private $word;
        private $file = file_get_contents('wordlist.txt');
        private $wordAry = explode("\n", $file);

        function Words($word){
            $this->word = $word;
        }

        function isValid($word){
            $count = 0;
            for ($i = 0; $i < count($wordAry); $i++){
                if ($wordAry[$i] == $word){
                    $count++;
                    return TRUE;
                    break;
                }
            }
            if ($count == 0){
                return FALSE;
            }
        }
    }
?>
