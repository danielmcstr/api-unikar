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
|    |           ├─── error.php
|    |           ├─── token_missing.php
│    ├─── js
|    |     ├─── jQuery
|    |           ├─── success.js
|    |           ├─── error.js
|    |           ├─── token_missing.js
|
```
## Overview
A API foi desenvolvida na padrão Representational State Transfer, **REST**. Para habilitar a integração de um serviço primeiro ela deve ser cadastrada no iGestão e através da solicitação será gerado um token de acesso a api. Este token deverá ser passado sempre no cabeçalho da request com a chave “X-Token”.

## Requisição Segunda Via de Boleto
