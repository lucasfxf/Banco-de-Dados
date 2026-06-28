🟡 Subconsultas — Parte 2 (com mais de uma tabela)
📘 Ideia principal

Agora a subconsulta não olha só uma tabela.

👉 Ela ajuda a descobrir algo
👉 e a query principal usa isso pra buscar em outra tabela

🧠 Exemplo simples (pra entender a lógica)

👉 “Quais cidades pertencem ao país com maior população?”

Passo 1 (subconsulta):
SELECT MAX(population) FROM country
Passo 2:
SELECT name FROM country
WHERE population = (subconsulta)
Passo 3 (final):
SELECT name 
FROM city
WHERE countrycode = (
    SELECT code 
    FROM country 
    WHERE population = (
        SELECT MAX(population) FROM country
    )
);
🧠 O segredo (isso aqui é OURO)

👉 Você resolve em camadas:

problema final
quebra em partes
monta de dentro pra fora
⚠️ Padrão que mais cai

👉 “algo que pertence ao X que tem Y”

Ex:
cidades do país com maior população
atores de filmes acima da média
clientes com compras acima da média

🟡 Exercício 1 (nível prova real)
👉 Liste os atores que participaram de filmes que têm:
duração (length) maior que a média

-- TESTE 
select nome
from actor
where film_actor = (
	select name
    from film 
    where length > (select avg(length) from film));
    
    SELECT first_name, last_name
FROM actor
WHERE actor_id IN (
    SELECT actor_id
    FROM film_actor
    WHERE film_id IN (
        SELECT film_id
        FROM film
        WHERE length > (
            SELECT AVG(length) FROM film
        )
    )
);


🧠 Quando usar IN, =, ON, etc
🔵 1. = (igual)

👉 Use quando a subconsulta retorna UM único valor

✔ Exemplo:
WHERE length = (SELECT MAX(length) FROM film)

👉 MAX() retorna 1 valor só → usa =

🟡 2. IN

👉 Use quando a subconsulta retorna VÁRIOS valores

✔ Exemplo:
WHERE film_id IN (
    SELECT film_id FROM film WHERE length > 100
)

👉 aqui podem vir vários film_id → usa IN

🔴 Regra de ouro (PROVA)
Situação	Usa
1 valor	=
vários valores	IN
🔵 3. ON

👉 Usado em JOIN

Serve pra ligar tabelas

✔ Exemplo:
FROM film_actor fa
JOIN actor a ON fa.actor_id = a.actor_id

👉 aqui você está dizendo:
“como as tabelas se conectam”

🟣 4. OF ❌

👉 Esquece isso em SQL comum
👉 praticamente não usa nesse contexto de prova

🧠 Como identificar rápido na prova

Se você ver:

AVG, MAX, MIN → geralmente =
SELECT ... FROM ... sem agregação → provavelmente IN
💡 Dica ninja

Se você não sabe:

👉 usa IN
→ porque funciona com vários valores
→ e também funciona com 1


🟡 Exercício 2 (continuação)

👉 Liste as cidades que pertencem ao país com:

menor expectativa de vida
💡 Tabelas
country → life_expectancy, code
city → countrycode
🧠 Dica de construção (passo a passo)
descobrir a menor expectativa de vida
descobrir qual país tem isso
pegar as cidades desse país

-- teste 
select nome
from city
where country_code in (
	select country_code
    from country 
    where life_expectancy = (select max(life_expectancy) from country));

-- correção 
SELECT name
FROM city
WHERE countrycode IN (
    SELECT code
    FROM country
    WHERE life_expectancy = (
        SELECT MIN(life_expectancy) FROM country
    )
);

🟡 Exercício 3 (último dessa parte 🔥)
👉 Liste os países que têm:
população maior que a média
mostrar: name, continent, population

-- teste  (acertei)
select name, continent, population
from country 
where population > (select avg(population) from country)

🧠 O problema não é subconsulta

É entender o papel do IN

💡 Pensa assim (isso vai simplificar MUITO)
👉 IN = “está dentro dessa lista”
🔵 Exemplo simples (sem banco)
WHERE id IN (1, 2, 3)

👉 Tradução:
“id está dentro dessa lista”

🔴 Agora com subconsulta
WHERE id IN (
    SELECT id FROM tabela
)

👉 Tradução:
“id está dentro dos resultados dessa consulta”

🔥 Agora o clique (isso destrava tudo)
Exemplo real:
SELECT name
FROM city
WHERE countrycode IN (
    SELECT code
    FROM country
);
🧠 Traduzindo em português

👉 “pegue cidades onde o código do país
está dentro dos códigos retornados pela outra consulta”

🎯 Regra prática (decora isso)

👉 Sempre que você ver:

“que pertencem a…”
“que fazem parte de…”
“que estão em…”

👉 provavelmente é IN

🧠 Comparação rápida
🔵 =

👉 1 valor

WHERE population = (SELECT MAX(population) FROM country)
🟡 IN

👉 vários valores

WHERE countrycode IN (
    SELECT code FROM country
)


🔥 Agora vamos testar se realmente fixou
🟡 Exercício rápido (só com IN)
👉 Liste os atores (actor) que participaram de algum filme.
💡 Dica:
film_actor tem actor_id

-- testee 
select name
from actor
where actor_id in (
	select actor_id
    from film_actor
    );
    