-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE "user" (
	"id" SERIAL PRIMARY KEY,
	"username" TEXT NOT NULL UNIQUE,
	"password" TEXT NOT NULL,
	"name" TEXT NOT NULL
);

CREATE TABLE "style" (
	"id" SERIAL PRIMARY KEY,
	"name" TEXT NOT NULL,
	"info" TEXT
);

CREATE TABLE "brewery" (
	"id" SERIAL PRIMARY KEY,
	"name" TEXT NOT NULL,
	"founded" INTEGER NOT NULL,
	"info" TEXT
);

CREATE TABLE "beer" (
	"id" SERIAL PRIMARY KEY,
	"brewery_id" INTEGER NOT NULL REFERENCES "brewery"(id) ON DELETE CASCADE,
	"style_id" INTEGER NOT NULL REFERENCES "style"(id) ON DELETE CASCADE,
	"name" TEXT NOT NULL,
	"info" TEXT
);

CREATE TABLE "rating" (
	"id" SERIAL PRIMARY KEY,
	"beer_id" INTEGER NOT NULL REFERENCES "beer"(id) ON DELETE CASCADE,
	"user_id" INTEGER NOT NULL REFERENCES "user"(id) ON DELETE CASCADE,
	"rating" INTEGER NOT NULL,
	"info" TEXT
);
