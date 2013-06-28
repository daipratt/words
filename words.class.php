<?php
    
    /*
     *    File:    		Words.class.php
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
            $file = file_get_contents('wordlist.txt');
            $wordAry = explode("\n", $file);
            $count = 0;
            for ($i = 0; $i < count($wordAry); $i++){
                if ($wordAry[$i] == $this->word){
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
            $word = strtoupper($this->word);
            $word = $word."\n";
            $fh = fopen($filename, 'r');
            $olddata = fread($fh, filesize($filename));
            $pos = strpos($olddata, $this->word);
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

        #TODO: set this function up
        // request google translation for request word
        function translate($lang){
            $lang = str_split($lang, 2);
            // http://translate.google.com/#en/pl/hello
            $url = "http://translate.google.com/#en/".$lang[0]."/".$this->word;
            return $url;
        }

        // determins if the word and another word is an anagram or not.
        function is_anagram($word2){
            $word1Split = str_split($this->word);
            $word2Split = str_split($word2);
            sort($word1Split);
            sort($word2Split);
            for ($i = 0; $i < count($word1Split); $i++){
                if ($word1Split[$i] != $word2Split[$i]){
                    return FALSE;
                }
            }  
            return TRUE;
        }
    }
?>
