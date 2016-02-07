-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO "user" (username, password, name) VALUES ('root', '1234', 'Risto Rikasmies');
INSERT INTO "user" (username, password, name) VALUES ('teemu', 'koiv', 'Teemu Koivisto');

INSERT INTO "unit" (unit, info) VALUES ('tl', 'teelusikka');
INSERT INTO "unit" (unit, info) VALUES ('rkl', 'ruokalusikka');
INSERT INTO "unit" (unit, info) VALUES ('dl', 'desilitra');
INSERT INTO "unit" (unit, info) VALUES ('kkp', 'kahvikuppi');
INSERT INTO "unit" (unit, info) VALUES ('mm', 'maustemitta');
INSERT INTO "unit" (unit, info) VALUES ('l', 'litra');
INSERT INTO "unit" (unit, info) VALUES ('g', 'gramma');
INSERT INTO "unit" (unit, info) VALUES ('kg', 'kilogramma');
INSERT INTO "unit" (unit, info) VALUES ('pkt', 'paketti');
INSERT INTO "unit" (unit, info) VALUES ('tlk', 'tölkki');
INSERT INTO "unit" (unit, info) VALUES ('prk', 'purkki');
INSERT INTO "unit" (unit, info) VALUES ('rs', 'rasia');
INSERT INTO "unit" (unit, info) VALUES ('ps', 'pussi');
INSERT INTO "unit" (unit, info) VALUES ('kpl', 'kappale');

INSERT INTO "ingredient" (name, info) VALUES ('Ananas', 'raikas');
INSERT INTO "ingredient" (name, info) VALUES ('Jauheliha', 'vähäsuolainen');
INSERT INTO "ingredient" (name, info) VALUES ('Suola', NULL);
INSERT INTO "ingredient" (name, info) VALUES ('Muna', NULL);

INSERT INTO "recipe" (name, instructions, user_id) VALUES ('Ananas-jauheliha pizza', '1. Mene kauppaan, 2. osta Ananas-jauheliha pizza, 3. paista pizza', 1);
INSERT INTO "recipe" (name, instructions, user_id) VALUES ('Ananas-muna pizza', '1. Mene kauppaan, 2. osta Ananas-muna pizza, 3. paista pizza', 2);

INSERT INTO "recipe_ingredient" (recipe_id, ingredient_id, amount, unit_id) VALUES (1, 1, 1.0, 11);
INSERT INTO "recipe_ingredient" (recipe_id, ingredient_id, amount, unit_id) VALUES (1, 2, 200.0, 7);
INSERT INTO "recipe_ingredient" (recipe_id, ingredient_id, amount, unit_id) VALUES (2, 3, 1.0, 11);
INSERT INTO "recipe_ingredient" (recipe_id, ingredient_id, amount, unit_id) VALUES (2, 4, 3.0, 14);
