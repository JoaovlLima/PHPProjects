<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

```mermaid
classDiagram
    class Usuario {
        +Integer id
        +String nome
        +String email
        +String senha
    }

    class Categoria {
        +Integer id
        +String nome
        +String tipo
        +Integer usuario_id
        +Usuario usuario
    }

    class Conta {
        +Integer id
        +String nome
        +Decimal saldo
        +Integer usuario_id
        +Usuario usuario
    }

    class Transacao {
        +Integer id
        +String descricao
        +Decimal valor
        +Date data
        +String tipo
        +Integer categoria_id
        +Integer conta_id
        +Integer usuario_id
        +Categoria categoria
        +Conta conta
        +Usuario usuario
    }

    Usuario "1" --> "*" Categoria : "possui"
    Usuario "1" --> "*" Conta : "possui"
    Usuario "1" --> "*" Transacao : "realiza"
    Categoria "1" --> "*" Transacao : "classifica"
    Conta "1" --> "*" Transacao : "contabiliza"
    
```


