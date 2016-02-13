<?php
class RatingController extends BaseController {
    protected static $classname = "Rating";

    public static function can_edit($id) {
        $v = Rating::find($id);
        if ($v && static::is_logged_user($v->user_id))
            return true;
        return false;
    }

    public static function index_vars(&$vars) {
        $vars['ratings'] = array();
        foreach ($vars['all'] as $k => $v) {
            $vars['ratings'][] = array('rating' => $v, 'beer' => Beer::find($v->beer_id), 'user' => User::find($v->user_id));
        }
    }

    public static function show_vars(&$vars, $id) {
        $vars['beer'] = Beer::find($vars['val']->beer_id);
        $vars['user'] = User::find($vars['val']->user_id);
    }

    public static function edit_vars(&$vars, $id) {
        $vars['beer'] = Beer::find($vars['val']->beer_id);
        $vars['user'] = User::find($vars['val']->user_id);
    }

    public static function create_vars(&$vars) {
        $vars['beers'] = Beer::all();
    }

    public static function edit_stored_params(&$vars) {
        $vars['user_id'] = self::get_user_logged_in()->id;
        $vars['beer_id'] = intval($vars['beer_id']);
        $vars['rating'] = intval($vars['rating']);
    }

    public static function edit_update_params(&$vars) {
        unset($vars['user_id']);
        unset($vars['beer_id']);
        $vars['rating'] = intval($vars['rating']);
    }
}
