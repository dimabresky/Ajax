# Ajax.php

Использует два статических метода

Ajax::start({id области для отправки ajax-ответа}, {строквый массив аттрибутов для html тега div}) - определяет начало области ajax-ответа

Ajax::end({id области для отправки ajax-ответа}) - определяет конец области ajax-ответа

Пример использования:

include "Ajax.php";

\travelsoft\Ajax::start({id области для отправки ajax-ответа}, {строквый массив аттрибутов для html тега div});

// бизнес-логика

\travelsoft\Ajax::end({id области для отправки ajax-ответа});


Для получения результата работы области бизнес-логики необходимо послать с запросом параметр ajax="id области для отправки ajax-ответа"
