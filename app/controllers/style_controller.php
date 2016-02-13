<?php
class StyleController extends BaseController {
    protected static $classname = "Style";

    public static function edit_update_params(&$vars) {
        unset($vars['name']);
    }
}
