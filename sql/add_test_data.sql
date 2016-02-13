-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO "user" (username, password, name) VALUES ('root', '1234', 'Risto Rikasmies');
INSERT INTO "user" (username, password, name) VALUES ('teemu', 'koiv', 'Teemu Koivisto');

INSERT INTO "style" (name, info) VALUES ('IPA', 'jotain infoo');
INSERT INTO "style" (name, info) VALUES ('Stout', NULL);
INSERT INTO "style" (name, info) VALUES ('Lager', NULL);

INSERT INTO "brewery" (name, founded, info) VALUES ('Stadin panimo', 2010, NULL);
INSERT INTO "brewery" (name, founded, info) VALUES ('Solmu', 2009, 'Vaasankadulla Kalliossa');
INSERT INTO "brewery" (name, founded, info) VALUES ('Sinebrychoff', 1985, NULL);

INSERT INTO "beer" (brewery_id, style_id, name, info) VALUES (1, 1, 'Stadin IPA', NULL);
INSERT INTO "beer" (brewery_id, style_id, name, info) VALUES (2, 3, 'Hunajaolut', 'Solmu pubista saa tätä');
INSERT INTO "beer" (brewery_id, style_id, name, info) VALUES (2, 3, 'Iso 3', NULL);

INSERT INTO "rating" (beer_id, user_id, rating, info) VALUES (1, 1, 6, 'Tosi hyvää');
INSERT INTO "rating" (beer_id, user_id, rating, info) VALUES (1, 2, 4, 'Menettelee');
INSERT INTO "rating" (beer_id, user_id, rating, info) VALUES (2, 1, 2, 'Aika pahaa');
INSERT INTO "rating" (beer_id, user_id, rating, info) VALUES (2, 2, 2, 'Joo, pahaa');
