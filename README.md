## Cars API

Endpoints: 

GET
- /api/cars - Вывод всех машин
- /api/cars?number[sort]=asc - Сортировка всех машин по алфавиту desc/asc
- /api/cars?year[sort]=asc&year[lte]=2015 - Сортировка по году по возрастанию и фильтр год <= 2015 (Доступные параметры: [lt <, lte <=, eq =, gt > , gte >=])
- /api/cars?year[lt]=2015&amp;year[sort]=asc&amp;dataType=excel - Экспорт в xlsx
- /api/cars?mark[eq]=Toyota - Фильтр по марке (Можно объединять с другими)
- /api/cars/{id} - Единичная запись
- /api/mark/{name} - Получить модели марки

POST
- /api/cars - Добавление машины (name, number, vin_code, color)

PUT
- /api/cars/{id} - Редактирование

DELETE
- /api/cars/{id} - Удаление
