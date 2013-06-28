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

        // bool: returns if word is valid
        function is_valid(){
            $file = file_get_contents('txt/wordlist.txt');
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

        # TODO: create function to display word definition
        // Horrible outline...Still looking at other options
        function definition(){
            
            $filename = "definitions.txt";
            $word = strtoupper($word);
            $word = $word."\n";
            $fh = fopen($filename, 'r');
            $olddata = fread($fh, filesize($filename));
            $pos = strpos($olddata, $word);
            $count = 3000;
            $char = substr($olddata, $pos, $count);
            $lineBreaks = nl2br($char);
            $explode = explode("<br />", trim($lineBreaks));
            $definition = "";
            echo $explode[0];
            for ($i = 1; $i < count($explode); $i++){
                if (strtoupper($explode[$i]) == $explode[$i]){
                    break;
                }
                $definition += $explode[$i];
            }
            if(!strpos($olddata, $word)) {
               $definition = "Error";
            }

            fclose($fh);
            return $definiton;
        }
    }
?>
