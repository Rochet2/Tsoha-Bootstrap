-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO "user" (username, password) VALUES ('root', '1234');

INSERT INTO "ingredient" (name, info, user_id) VALUES ('Ananas', 'raikas', 1);
INSERT INTO "ingredient" (name, info, user_id) VALUES ('Jauheliha', 'vähäsuolainen', 1);
INSERT INTO "ingredient" (name, info, user_id) VALUES ('Jaffa', 'no comment', 1);
INSERT INTO "ingredient" (name, info, user_id) VALUES ('Coca Cola', 'no comment', 1);

INSERT INTO "recipe" (name, instructions, user_id) VALUES ('Ananas-jauheliha pizza', '1. Mene kauppaan, 2. osta Ananas-jauheliha pizza, 3. paista pizza', 1);
INSERT INTO "recipe" (name, instructions, user_id) VALUES ('Jaffa-Cola', '1. Mene kauppaan, 2. osta jaffaa ja kokista, 3. kaada molempia puoli lasillista samaan lasiin', 1);

INSERT INTO "recipe_ingredient" (recipe_id, ingredient_id, amount) VALUES (1, 1, '1 purkki');
INSERT INTO "recipe_ingredient" (recipe_id, ingredient_id, amount) VALUES (1, 2, '200g');
INSERT INTO "recipe_ingredient" (recipe_id, ingredient_id, amount) VALUES (2, 3, '20cl');
INSERT INTO "recipe_ingredient" (recipe_id, ingredient_id, amount) VALUES (2, 4, '20cl');
