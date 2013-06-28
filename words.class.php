<?php
    
    /*
     *    File:			Words.class.php
     *	Description:	A php script that does anything with words
     *	Author:			Chase Willden 06/28/2013
     */
     
    class Word{
        // Declare variables
        private $word;

        public function __construct($wordArg){
            $this->word = $wordArg;
        }

        public function set_word($newWord){
            $this->word = $newWord;
        }

        public function get_word(){
            return $this->word;
        }

        // returns if valid
        function is_valid(){
            $file = file_get_contents('wordlist.txt');
            $wordAry = explode("\n", $file);
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
