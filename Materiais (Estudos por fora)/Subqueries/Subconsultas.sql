⚠️ O segredo (isso aqui é prova)

👉 A subconsulta sempre resolve primeiro

🧩 Quando usar subconsulta?
quando precisa de:
média → AVG()
máximo → MAX()
mínimo → MIN()
soma → SUM()

✅ Correção
1. O que é subconsulta?

✔️ Certo
👉 consulta dentro de outra consulta

2. Quem executa primeiro?

❌ Você colocou: externa
✅ Correto: interna (subconsulta)

👉 Isso é MUITO importante

💡 Sempre:

roda a subconsulta
depois a principal usa o resultado
3. AVG()

✔️ Certo — média aritmética

🤔 Sobre média ponderada

Boa pergunta 👏 (nível mais avançado)

👉 Dá pra fazer sim, mas não existe função pronta

Você faz “na mão”:

SELECT SUM(valor * peso) / SUM(peso)
FROM tabela;

👉 isso é média ponderada

🧠 Resumo rápido (guarda isso)
subconsulta = dentro de outra
executa primeiro = interna
AVG = média simples
ponderada = faz com SUM()


-- teste 
select rental_duration
from filmes 
where rental_duration > (select avg(rental_duration) from filmes);

-- correção 
SELECT * 
FROM film
WHERE rental_duration > (
    SELECT AVG(rental_duration) FROM film
);

2. O que está sendo pedido
👉 “Liste os filmes” → normalmente esperam:
título (title)
ou *

-- teste 2 👉 Liste os filmes que têm:
-- rental_duration IGUAL ao MAIOR valor da tabela
select * 
from film
where rental_duration == (select max(rental_duration) from film);

-- correção 
SELECT * 
FROM film
WHERE rental_duration = (
    SELECT MAX(rental_duration) FROM film
);

🧠 Regra importante (prova)
Linguagem	Igual
SQL	=
Java / JS / etc	==
👉 Misturar isso = erro comum de prova

🟡 Exercício 3 (agora começa a ficar interessante)
👉 Liste os filmes que têm:
rental_duration MENOR que a média
e
👉 ordene do maior para o menor rental_duration

💡 Aqui tem 2 coisas:
subconsulta (AVG)
ORDER BY

-- teste 
select *
from film
where rental_duration < (select avg(rental_duration) from film
order by desc;

-- correção
SELECT *
FROM film
WHERE rental_duration < (
    SELECT AVG(rental_duration) FROM film
)
ORDER BY rental_duration DESC;


🟡 Exercício 4 (nível prova real)
👉 Liste os clientes que fizeram pagamentos:

acima da média da tabela payment
mostre: customer_id e amount
ordene do maior para o menor valor

-- teste (customer é cliente em ingles )
select * 
from customer
where payment > (select avg(payment) from customer)
select customer_id, amount
from customer
order by amount desc;

-- correçao 
SELECT customer_id, amount
FROM payment
WHERE amount > (
    SELECT AVG(amount) FROM payment
)
ORDER BY amount DESC;

🟡 Exercício 5 (último dessa parte 🔥)
Agora um pouco mais lógico:
👉 Liste os países que têm:
população maior que a média
mostrar: name, population

-- teste 
select name, population
from country
where population > (select avg(population) from country

SELECT name, population
FROM country
WHERE population > (
    SELECT AVG(population) FROM country
);
