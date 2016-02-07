<?php
class RecipeController extends BaseController {
    protected static $classname = "Recipe";

    public static function index_vars(&$vars) {
        $vars['recipe_user'] = array();
        foreach ($vars['all'] as $v) {
            $vars['recipe_user'][] = array('recipe' => $v, 'user' => User::find($v->user_id));
        }
    }

    public static function show_vars(&$vars, $id) {
        $vars['images'] = Image::find_by('recipe_id', $id);

        if ($vars['val'] && $vars['val']->user_id)
            $vars['user'] = User::find($vars['val']->user_id);

        $vars['ingredients'] = array();
        foreach (Recipe_Ingredient::find_by('recipe_id', $id) as $k => $v) {
            $vars['ingredients'][] = array('ingredient' => Ingredient::find($v->ingredient_id),
                'amount' => $v->amount, 'unit' => Unit::find($v->unit_id));
        }
    }
}
