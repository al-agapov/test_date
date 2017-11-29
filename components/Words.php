<?php

namespace app\Components;


class words
{

    public static function getWord($word){

        $suf = Array();

        $suf[] = 'ование';
        $suf[] = 'ельный';
        $suf[] = 'енный';
        $suf[] = 'ировать';
        $suf[] = 'овая';
        $suf[] = 'ого';
        $suf[] = 'ему';
        $suf[] = 'ный';
        $suf[] = 'ями';
        $suf[] = 'чно';
        $suf[] = 'ах';
        $suf[] = 'ях';
        $suf[] = 'ей';
        $suf[] = 'ях';
        $suf[] = 'ом';
        $suf[] = 'ий';
        $suf[] = 'ые';
        $suf[] = 'ие';
        $suf[] = 'ый';
        $suf[] = 'ий';
        $suf[] = 'ам';
        $suf[] = 'ах';
        $suf[] = 'ми';
        $suf[] = 'ям';
        $suf[] = 'та';
        $suf[] = 'ов';

        $suf[] = 'ок';

        $suf[] = 'сичк'; //женский вариант

        $suf[] = 'ик'; //ум-ласкать
        $suf[] = 'ки'; //ум-ласкать
        $suf[] = 'ка';

        $suf[] = 'ся';	//глагол - возвр.
        $suf[] = 'ть';	//глагол - инфинитив
        $suf[] = 'но';

        $suf[] = 'ец';  //суффикс слова огурец

        $suf[] = 'у';
        $suf[] = 'и';
        $suf[] = 'ы';
        $suf[] = 'е';
        $suf[] = 'а';
        $suf[] = 'я';
        $suf[] = 'ь';
        $suf[] = 'о';
        $suf[] = 'ю';
        $suf[] = 'ч';

        $rsuf = Array();
        $rsuf[] = 'ир';
        $rsuf[] = 'ов';
        $rsuf[] = 'ев';
        $rsuf[] = 'и';

        $min_word_l = 4;

        $tsuf = $suf;
        $sz = sizeof($tsuf);
        for($i = 0; $i < $sz; $i++) {
            $csuf = $tsuf[$i];
            $suf_l = strlen($csuf);
            $word_l = strlen($word);

            if( ($word_l - $suf_l) <= $min_word_l)
                continue;

            if(substr($word, $word_l-$suf_l, $suf_l) == $csuf) {
                $word = substr($word, 0, $word_l-$suf_l);
            }
        }

        $tsuf = $rsuf;
        $sz = sizeof($tsuf);
        for($i = 0; $i < $sz; $i++) {
            $csuf = $tsuf[$i];
            $suf_l = strlen($csuf);
            $word_l = strlen($word);

            if( ($word_l - $suf_l) <= $min_word_l)
                continue;

            if(substr($word, $word_l-$suf_l, $suf_l) == $csuf) {
                $word = substr($word, 0, $word_l-$suf_l);
            }
        }


        return $word;

    }


}