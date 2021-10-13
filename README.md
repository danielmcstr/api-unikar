# iGestão Unikar - API 2ª via
Documentação da API para emissão de segunda via de boletos do iGestão

## Estrutura da documentação
```
├─── README.md  // este arquivo
├─── collection.json // arquivo para importação no POSTMAN V2.1
├─── examples
│    ├─── php
|    |     ├───curl
|    |           ├─── success.php
|    |           ├─── error.php // em breve
|    |           ├─── token_missing.php // em breve
│    ├─── js
|    |     ├─── jQuery
|    |           ├─── success.js // em breve
|    |           ├─── error.js // em breve
|    |           ├─── token_missing.js // em breve
|
```
## Overview
A API foi desenvolvida na padrão Representational State Transfer, **REST**. Para habilitar a integração de um serviço primeiro ela deve ser cadastrada no iGestão e através da solicitação será gerado um token de acesso a api. Este token deverá ser passado sempre no cabeçalho da request com a chave “X-Token”.

## Segunda Via de Boleto
### Requisição
#### ENDPOINT [POST] 
```http://unigestor.com.br/unikar/_modulos/asaas/segundaviaboleto.php```
#### HEADERS
```X-Token: [TOKEN]```
#### BODY
_formdata_
|key|value|description|
|---|---|---|
|placa|AAA1111|_required (string) or cpf_|
|cpf|999.999.999-99|_required (string) or placa_|
|offset|0|_optional (number) default:0_|
|limit|1|_optional (number) default:2_|
### Resposta
#### HEADER
```
X-Company: [NAME]
X-offset: [OFFSET]
X-Total: [TOTAL]
Content-Type: application/json;charset=utf-8
```
#### BODY
```json
{
    "error": false,
    "mensagem": "Payments found successfuly",
    "data": [
        {
            "dueDate": "2021-08-10",
            "bankSlipUrl": "https://www...",
            "description": "...",
            "value": 999.0,
            "status": "PENDING"
        }
    ]
}
```

#### EXEMPLO: Erro na requisição
```
HTTP Status Code:400
```
```json
{
    "error": true,
    "mensagem": "Invalid request"
}
```


#### EXEMPLO: Ausência de Token
```
HTTP Status Code:403
```
```json
{
    "error": true,
    "mensagem": "Missing Token"
}
```

#### EXEMPLO: Cliente não encontrado no iGestão
```
HTTP Status Code:404
```
```json
{
    "error": true,
    "mensagem": "Registry 'client' not found"
}
```
#### EXEMPLO: Cliente não encontrado no ASAAS
```
HTTP Status Code:404
```
```json
{
    "error": true,
    "mensagem": "Registry 'customer_asaas' not found"
}
```
#### EXEMPLO: Sem pagamentos em aberto
```
HTTP Status Code:404
```
```json
{
    "error": false,
    "mensagem": "Payments not found"
}
```


#### EXEMPLO: Há pagamentos em aberto que estão vencidos há mais de 5 dias
```
HTTP Status Code:422
```
```json
{
    "error": false,
    "mensagem": "Found a payment OVERDUE > 5 days 2021-09-15"
}
```

