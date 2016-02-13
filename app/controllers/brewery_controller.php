<?php
class BreweryController extends BaseController {
    protected static $classname = "Brewery";

    public static function show_vars(&$vars, $id) {
        $vars['beers'] = Beer::find_by('brewery_id', $id);
    }

    public static function edit_stored_params(&$vars) {
        $vars['founded'] = intval($vars['founded']);
    }

    public static function edit_update_params(&$vars) {
        unset($vars['name']);
        $vars['founded'] = intval($vars['founded']);
    }
}
