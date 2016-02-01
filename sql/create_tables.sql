-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE "meal" (
	"id" SERIAL PRIMARY KEY,
	"name" TEXT NOT NULL,
	"instructions" TEXT
);

CREATE TABLE "category" (
	"id" SERIAL PRIMARY KEY,
	"name" TEXT NOT NULL
);

CREATE TABLE "user" (
	"id" SERIAL PRIMARY KEY,
	"username" TEXT NOT NULL,
	"password" TEXT NOT NULL
);

CREATE TABLE "indigrent" (
	"id" SERIAL PRIMARY KEY,
	"name" TEXT NOT NULL,
	"price" BIGINT,
	"info" TEXT
);

CREATE TABLE "recipe" (
	"id" SERIAL PRIMARY KEY,
	"name" TEXT NOT NULL,
	"instructions" TEXT,
	"category_id" INTEGER REFERENCES "category"(id) NOT NULL
);

CREATE TABLE "image" (
	"recipe_id" INTEGER REFERENCES "recipe"(id) PRIMARY KEY,
	"url" TEXT NOT NULL
);

CREATE TABLE "recipe_indigrent" (
	"recipe_id" INTEGER REFERENCES "recipe"(id),
	"indigrent_id" INTEGER REFERENCES "indigrent"(id),
	"amount" TEXT NOT NULL,
	PRIMARY KEY("recipe_id", "indigrent_id")
);

CREATE TABLE "meal_recipe" (
	"meal_id" INTEGER REFERENCES "meal"(id),
	"recipe_id" INTEGER REFERENCES "recipe"(id),
	PRIMARY KEY("meal_id", "recipe_id")
);
