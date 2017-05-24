<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 24.05.2017
 * Time: 21:31
 */
class formular
{
    public function inputField($label,$name){
        echo "<div class=\"row\">
                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\">".$label."</label>
                        <div class=\"col-sm-6\">
                            <input type=\"text\" class=\"form-control\" size=\"40\" maxlength=\"250\" name=\"$name\">
                        </div>
                    </div>
                </div>";
    }

    public function submitButton($text){
        echo "<div class=\"row\">
                        <div class=\"col-sm-2\"></div>
                        <div class=\"col-sm-1\">
                            <input type=\"submit\" class=\"btn btn-primary\" value=\"$text\">
                        </div>
                    </div>
                </div>";
    }

    public function selectStart($label){
        echo "<div class=\"row\">
        <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\">$label</label>
                <div class=\"col-sm-6\">
                <select name=\"carline[]\" id=\"example-getting-started\" multiple=\"multiple\" class=\"checkbox-inline\">";
    }

    public function checkBox($carline){
        echo "<option name=\"carline[]\" type=\"checkbox\" title=\"$carline\" value=\"$carline\">$carline</option>";
    }

    public function selectFinish(){
        echo "</select>
            </div>
        </div>
        </div>";
    }
}