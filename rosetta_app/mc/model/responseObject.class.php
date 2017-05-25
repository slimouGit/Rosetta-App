<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 25.05.2017
 * Time: 11:51
 */
class responseText
{
    public function success($response){
        echo "<div class=\"row formMarginBottom\">
                    <div class=\"col-sm-8\">
                            <p>$response</p>
                    </div>
                </div>";
    }
}