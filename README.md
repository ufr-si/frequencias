# Registrador de frequências
Um sistema básico de registro de frequências em uma aula.

## Pré-requisitos
* Um servidor configurado com:
** PHP7
** Apache

## Como usar
1. Suba o servidor
2. Acesse o endereço do seu servidor (http://<ip>)
3. Para adicionar uma frequência, basta usar um dos IDs cadastrado em roster.json
4. Para acessar a lista de frequências, acesse lista_frequencias.php

## Arquivo frequencia.json
O arquivo frequencia.json contém as frequências para o dia atual.
Formato: 

```
{
  "20_09_2018": {
    "data": [
      {
        "rga": 1,
        "nome": "Exemplo1",
        "frequencia": "F"
      },
      {
        "rga": 2,
        "nome": "Exemplo2",
        "frequencia": "F"
      },
      {
        "rga": 3,
        "nome": "Exemplo3",
        "frequencia": "F"
      },
      {
        "rga": 4,
        "nome": "Exemplo 4",
        "frequencia": "F"
      }
    ]
  }
}
```

## Arquivo roster.json
```
{
  "cod_disciplina":"SO20181",
  "nome_disciplna":"Sistemas Operacionais",
  "data":{
      "1" : "Exemplo1",
      "2" : "Exemplo2",
      "3" : "Exemplo 3",
      "4" : "Exemplo 4"
      }
}
``
