-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO "user" (username, password) VALUES ('root', '1234');

INSERT INTO "indigrent" (name, price, info) VALUES ('Ananas 50g', 100, 'raikas');
INSERT INTO "indigrent" (name, price, info) VALUES ('Jauheliha', 500, 'vähäsuolainen');
INSERT INTO "indigrent" (name, price, info) VALUES ('Jaffa', 250, 'no comment');
INSERT INTO "indigrent" (name, price, info) VALUES ('Coca Cola', 250, 'no comment');

INSERT INTO "category" (name) VALUES ('Alkuruoka');
INSERT INTO "category" (name) VALUES ('Pääruoka');
INSERT INTO "category" (name) VALUES ('Jälkiruoka');
INSERT INTO "category" (name) VALUES ('Juoma');

INSERT INTO "meal" (name, instructions) VALUES ('Pizza-limu kombo', 'nautitaan sohvalla elokuvan äärellä');

INSERT INTO "recipe" (name, instructions, category_id) VALUES ('Ananas-jauheliha pizza', '1. Mene kauppaan, 2. osta Ananas-jauheliha pizza, 3. paista pizza', 2);
INSERT INTO "recipe" (name, instructions, category_id) VALUES ('Jaffa-Cola', '1. Mene kauppaan, 2. osta jaffaa ja kokista, 3. kaada molempia puoli lasillista samaan lasiin', 4);

INSERT INTO "recipe_indigrent" (recipe_id, indigrent_id, amount) VALUES (1, 1, '1 purkki');
INSERT INTO "recipe_indigrent" (recipe_id, indigrent_id, amount) VALUES (1, 2, '200g');
INSERT INTO "recipe_indigrent" (recipe_id, indigrent_id, amount) VALUES (2, 3, '20cl');
INSERT INTO "recipe_indigrent" (recipe_id, indigrent_id, amount) VALUES (2, 4, '20cl');

INSERT INTO "meal_recipe" (meal_id, recipe_id) VALUES (1, 1);
INSERT INTO "meal_recipe" (meal_id, recipe_id) VALUES (1, 2);
