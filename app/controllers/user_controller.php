<?php
class UserController extends BaseController {
    protected static $classname = "User";
    
    public static function show_vars(&$vars, $id) {
        $vars['recipes'] = Recipe::find_by('user_id', $id);
    }
}
