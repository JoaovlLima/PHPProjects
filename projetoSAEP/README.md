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
        - int id
        - String nome
        - String email
    }

    class Setor {
        - int id
        - String nome
    }

    class Tarefa {
        - int id
        - String titulo
        - String descricao
        - Date dataCriacao
        - Date dataConclusao
        - Status status
        - int setorId
    }

    class Kanban {
        - int id
        - String titulo
        - Date dataCriacao
    }

    class Status {
        - int id
        - String nome
    }

    Usuario "1" -- "0..*" Setor : acessa
    Setor "1" -- "0..*" Tarefa : gerencia
    Tarefa "1" -- "1" Status : possui
    Kanban "1" -- "0..*" Tarefa : organiza

    
```


