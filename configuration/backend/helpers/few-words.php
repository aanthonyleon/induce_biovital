<?php    
    function truncate_string($string, $maxlength, $extension) {
        $cutmarker = "**cut_here**";
    
        if (strlen($string) > $maxlength) {

    	    $string = wordwrap($string, $maxlength, $cutmarker);
    	    $string = explode($cutmarker, $string);
            //$string, returned by explode()
    	    $string = $string[0] . $extension;
        }
        
        return $string;
    }

    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }

    function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos   = array_keys($words);
            $text  = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
?>