<?php

/**
 * Created by PhpStorm.
 * User: salim
 *
 * Klasse stellt verschieden Funktionen fuer Nutzerresponse bereit
 */
class responseObject
{
    /**
     * @param $response
     */
    public function success($response){
        echo "<div class=\"row formMarginBottom \">
                    <div class=\"col-sm-8\">
                            <p>$response</p>
                    </div>
                </div>";
    }

    /**
     * @param $response
     */
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

    /**
     * @param $fileName
     * @param $itemCount
     */
    public function uploadResponseXML($fileName, $itemCount)
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

    /**
     * @param $fileName
     * @param $fileSize
     */
    public function uploadResponsePDF($fileName,$fileSize){
        echo "<div class='container'>
                <div class=\"container row  col-sm-8 responseUploadHeader responseSuccess responseShadow\">
                    <div class=\"col-sm-12\">
                            <h4>Upload hat geklappt</h4>
                    </div>
                    </div>
                    <div class=\"row col-sm-8 responseContent responseShadow\">
                            <p>Dateiname: {$fileName}</p>
                            <p>Dateigröße: {$fileSize} kb</p>
                    </div>
                </div>";
    }

}