<?php

/**
 * Created by PhpStorm.
 * User: salim
 *
 * Klasse definiert verschiedene Formularfelder
 */
class formular
{
    //------------------------------------------------------

    /**
     * @param $value
     *
     * label
     */
    public function labelField($value){
        echo "<div class=\"row formMarginBottom\">
                    <div class=\"form-group\">
                        <div class=\"col-sm-2 control-label\"></div>
                        <div class=\"col-sm-8\">
                            <div class=\"itemField col-sm-8 control-label\">".$value."</div>
                        </div>
                    </div>
                </div>";
    }

    //------------------------------------------------------

    /**
     * @param $label
     * @param $name
     * @param $value
     * @param $placeholder
     * @param $id
     * @param $labelSize
     * @param $size
     *
     * input field
     */
    public function inputField($label,$name, $value, $placeholder, $id, $labelSize, $size){
        echo "<div class=\"row formMarginBottom\">
                    <div class=\"form-group\">
                        <label class=\"col-sm-$labelSize control-label\">".$label."</label>
                    <div class=\"col-sm-$size\">
                        <input type=\"text\" class=\"form-control\" size=\"40\" maxlength=\"250\" name=\"$name\" value=\"$value\" placeholder=\"$placeholder\" id=\"$id\">
                    </div>
                    </div>
            </div>";
    }

    //------------------------------------------------------

    /**
     * @param $label
     * @param $name
     * @param $value
     * @param $labelSize
     * @param $size
     *
     * textarea
     */
    public function textareaField($label,$name,$value, $labelSize, $size){
        echo "<div class=\"row formMarginBottom\">
                    <div class=\"form-group\">
                        <label class=\"col-sm-$labelSize control-label\">".$label."</label>
                    <div class=\"col-sm-$size\">
                        <textarea onkeyup='auto_grow(this)' class=\"form-control\" name=\"$name\">$value</textarea>
                    </div>
                </div>
            </div>";
    }

    //------------------------------------------------------

    /**
     * @param $label
     * @param $name
     * @param $value
     * @param $placeholder
     * @param $id
     * @param $labelSize
     * @param $size
     *
     * password field
     */
    public function passwordField($label,$name, $value, $placeholder, $id, $labelSize, $size){
        echo "<div class=\"row formMarginBottom\">
                    <div class=\"form-group\">
                        <label class=\"col-sm-$labelSize control-label\">".$label."</label>
                        <div class=\"col-sm-$size\">
                            <input type=\"password\" class=\"form-control\" size=\"40\" maxlength=\"250\" name=\"$name\" value=\"$value\" placeholder=\"$placeholder\" id=\"$id\">
                        </div>
                    </div>
                </div>";
    }

    //------------------------------------------------------

    /**
     * @param $headline
     * @param $target
     * @param $name
     * @param $buttonValue
     *
     * upload file
     */
    public function uploadFile($headline, $target, $name){
        echo "<div class=\"container\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-body\">
                    <h4>$headline</h4>
                        <form action=\"$target\" method=\"post\" enctype=\"multipart/form-data\">
                        <div class=\"form-inline\">
                            <div class=\"form-group\">
                                <input type=\"file\" class=\"form-control\" name=\"$name\"/>
                            </div>
                            <button type=\"submit\" class=\"btn btn-sm btn-primary\">Hochladen</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>";
    }

    //------------------------------------------------------

    /**
     * @param $name
     * @param $text
     *
     * hidden field
     */
    public function hiddenField($name, $text){
        echo "<input type=\"hidden\" name=\"$name\" value=\"$text\">";
    }

    //------------------------------------------------------

    /**
     * @param $name
     * @param $value1
     * @param $value2
     *
     * option field
     */
    public function optionField($name, $value1, $value2){
        echo "<div class=\"row formMarginBottom\">
            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">$name</label>
                <div class=\"col-sm-8\">
                    <select class=\"form-control\" name=\"authorization\">
                        <option selected value=\"user\" name=\"authorization\">$value1</option>
                        <option value=\"admin\" name=\"authorization\">$value2</option>
                    </select>
                </div>
                <div class=\"col-sm-4 errorContainer\"></div>
            </div>
        </div>";
    }

    //------------------------------------------------------

    /**
     * @param $col
     * @param $text
     *
     * button
     */
    public function submitButton($col, $text){
        echo "<div class=\"row formMarginBottom\">
                        <div class=\"col-sm-$col\"></div>
                        <div class=\"col-sm-1\">
                            <input type=\"submit\" class=\"btn btn-primary\" value=\"$text\">
                        </div>
                    </div>
                </div>";
    }

    //------------------------------------------------------

    /**
     * @param $target
     * @param $title
     *
     * link
     */
    public function ahref($target,$title){
        echo "<a href=\"$target\">$title</a>";
    }

    //------------------------------------------------------

    /**
     * @param $label
     *
     * start multiselect
     */
    public function selectStart($label){
        echo "<div class=\"row formMarginBottom\">
        <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\">$label</label>
                <div class=\"col-sm-6\">
                <select name=\"carline[]\" id=\"example-getting-started\" multiple=\"multiple\" class=\"checkbox-inline\">";
    }

    //------------------------------------------------------

    /**
     * @param $carline
     *
     * multiselect checkbox
     */
    public function checkBox($carline){
        echo "<option name=\"carline[]\" type=\"checkbox\" title=\"$carline\" value=\"$carline\">$carline</option>";
    }

    //------------------------------------------------------

    /**
     * ende multiselect
     */
    public function selectFinish(){
        echo "</select></div></div></div>";
    }

    //------------------------------------------------------

    /**
     * @param $carName
     * @param $temp
     *
     * carline mit Pruefung, ob carline in array vorhanden
     */
    public function carlineCheck($carName, $temp){
        if (in_array($carName, $temp)) {
            echo "<option type='checkbox' selected title=$carName value=\"$carName\">$carName</option>";
        }else {
            echo "<option type='checkbox' title=$carName value=\"$carName\">$carName</option>";
        }
    }

    //------------------------------------------------------
}