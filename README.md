# Mini Gateway

> Repósitorio criado para, um teste técnico.
> Caso queira testar online, o link é http://mini-gateway.kohana.com.br
> libs utilizadas:

* [SANTO](https://github.com/mikaellemos033/santo)
* [PHINX](https://phinx.org/)
* [PHPUNIT](https://phpunit.de/)

## Instalação

> execute o composer para baixar as dependencias `comporser install`
> crie um arquivo chamado `phinx.yml` e `config/Database.php` e informe 
> os dados de conexão com o banco de dados e
> execute o comando `phinx migrate` e `phinx seed:run`

### Rotas do mini sistema

* GET shipping/:id
* GET corporations
* POST corporations
* POST payment/credit-card
* POST payment/ticket

#### GET shipping/:id
Lista os detalhes de uma compra...

#### GET corporations
Lista todas as empresas cadastradas

#### POST corporations
Cadastra uma nova empresa
Parâmetros:
* name: string, required


#### POST payment/credit-card
Realiza um pagamento com cartão de credito.
Parâmetros:
* corporation_id: integer, required
* amount: float, required
* description string, required
* user_name string, required
* user_email string, required
* user_document string, required
* card_name string, required
* card_number number, required
* card_code number, required
* card_date string, required, format: mm/yyyy

#### POST payment/ticket
Realiza um pagamento com boleto.
Parâmetros:
* corporation_id: integer, required
* amount: float, required
* description string, required
* user_name string, required
* user_email string, required
* user_document string, required