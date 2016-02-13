<?php
class BeerController extends BaseController {
    protected static $classname = "Beer";

    public static function edit_stored_params(&$vars) {
        $vars['brewery_id'] = intval($vars['brewery_id']);
        $vars['style_id'] = intval($vars['style_id']);
    }

    public static function edit_update_params(&$vars) {
        unset($vars['name']);
        unset($vars['brewery_id']);
        $vars['style_id'] = intval($vars['style_id']);
    }

    public static function index_vars(&$vars) {
        $vars['beers'] = array();
        foreach ($vars['all'] as $k => $v) {
            $vars['beers'][] = array('beer' => $v, 'brewery' => Brewery::find($v->brewery_id), 'style' => Style::find($v->style_id));
        }
    }

    public static function show_vars(&$vars, $id) {
        $vars['brewery'] = Brewery::find($vars['val']->brewery_id);
        $vars['style'] = Style::find($vars['val']->style_id);
    }

    public static function create_vars(&$vars) {
        $vars['breweries'] = Brewery::all();
        $vars['styles'] = Style::all();
    }

    public static function edit_vars(&$vars, $id) {
        $vars['brewery'] = Brewery::find($vars['val']->brewery_id);
        $vars['styles'] = Style::all();
    }
}
