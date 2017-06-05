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
        echo "<div class='container'>
                <div class=\"container row formMarginBottom col-sm-$size response $class\">
                    <div class=\"\">
                            $response
                    </div>
                    </div>
                </div>";
    }

    //--------------------------------------------------------------------------------------------------------------------------

    public function uploadResponse($fileName, $itemCount)
    {
        if ($itemCount == 0) {
            $class = "responseFalse";
            $headerText = "Upload hat leider nicht geklappt";
        } else {
            $class = "responseSuccess";
            $headerText = "Upload hat geklappt";
        }
        if ($itemCount == 1){
            $responseText = "Es wurde {$itemCount} Datensatz hinzugefügt";
        }else{
            $responseText = "Es wurden {$itemCount} Datensätze hinzugefügt";
        }
        echo "<div class='container'>
                <div class=\"container row  col-sm-8 responseUploadHeader {$class} responseShadow\">
                    <div class=\"col-sm-12\">
                            <h4>{$headerText}</h4>
                    </div>
                    </div>
                    <div class=\"row col-sm-8 responseContent responseShadow\">
                            <p>Dateiname: {$fileName}</p>
                            <p>{$responseText}</p>
                    </div>
                </div>";
    }

    //--------------------------------------------------------------------------------------------------------------------------

}