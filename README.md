# Postavleno_test


```docker-compose сделан для того, чтобы можно было локально проверить работоспособность проекта```

## Setup:

* php 8.0 +
* docker (опционально)

## Локальный запуск:

* ```make start``` или ```php -S localhost:8080 -t public public/index.php```
* ```make redis``` или ```docker-compose up -d```

### Пример команд:
  * добавить данные в кэш ```./command redis add a 123```
  * удалить данные из кэша по ключу ```./command redis delete a```
    
## Задание:

```
Задание 1. 
Консольная программа на php(cli)
Требуется реализовать компонент который позволит добавлять и удалять данные из Redis.

Команда добавления: $ ./command redis add {key} {value}
Команда удаления: $ ./command redis delete {key}

В Redis установить ttl 1 час. Дополнительно учесть возможность перехода на другое хранилище, например Memcached.
PHP компонент не должен иметь сторонних зависимостей от библиотек(composer)(за исключением работы с Redis)

Задание 2. 
Реализовать веб страницу(+ бекенд) для отображения информации из «задания 1»
Вывести список данных в формате:
<li>{key}: {value} <a href=‘#’ class=‘remove’>delete</a></li>

Данные требуется получать(удалять) используя REST запросы.

Получение данных: GET /api/redis
Ответ:
status: true,
code: 200,
data: {
 {key}: {value},
 {key}: {value},
 {key}: {value},
 …
}

Удаление данных: DELETE /api/redis/{key}
Ответ:
status: true,
code: 200,
data: {}

В случае ошибок, ответ в формате: 
status: false,
code: 500,
data: {
 ’message’: ‘Error info message’
}

Верстка не имеет значения. Требуется использовать нативный js(без jQuery). 
```

