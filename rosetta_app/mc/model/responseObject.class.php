<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 25.05.2017
 * Time: 11:51
 */
class responseObject
{
    public function success($response){
        echo "<div class=\"row formMarginBottom \">
                    <div class=\"col-sm-8\">
                            <p>$response</p>
                    </div>
                </div>";
    }

    public function error($response){
        echo "<div class=\"row formMarginBottom \">
                    <div class=\"col-sm-8\">
                            <p>$response</p>
                    </div>
                </div>";
    }

    /**
     * @param $response
     * @param $size
     * @param $class
     */
    public function response($response, $size, $class){
        echo "<div class=\"row formMarginBottom $class\">
                    <div class=\"col-sm-$size\">
                            <p>$response</p>
                    </div>
                </div>";
    }
}