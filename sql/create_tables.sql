-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE "user" (
	"id" SERIAL PRIMARY KEY,
	"username" TEXT NOT NULL UNIQUE,
	"password" TEXT NOT NULL
);

CREATE TABLE "ingredient" (
	"id" SERIAL PRIMARY KEY,
	"name" TEXT NOT NULL,
	"info" TEXT,
	"user_id" INTEGER NOT NULL REFERENCES "user"(id) ON DELETE CASCADE
);

CREATE TABLE "recipe" (
	"id" SERIAL PRIMARY KEY,
	"name" TEXT NOT NULL,
	"instructions" TEXT,
	"user_id" INTEGER NOT NULL REFERENCES "user"(id) ON DELETE CASCADE
);

CREATE TABLE "image" (
	"recipe_id" INTEGER REFERENCES "recipe"(id) ON DELETE CASCADE,
	"url" TEXT NOT NULL
);

CREATE TABLE "recipe_ingredient" (
	"recipe_id" INTEGER REFERENCES "recipe"(id) ON DELETE CASCADE,
	"ingredient_id" INTEGER REFERENCES "ingredient"(id) ON DELETE RESTRICT,
	"amount" TEXT NOT NULL
);
