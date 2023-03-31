/**
* Данных мало, но предположим, что для каждого города охвата есть свой домен 3го уровня (city.sitename.ru)
* В таком случае можно подготовить массив соответствия города и номера телефона, затем подставить получившийся номер,
* обратившись к элементу, содержащему номер телефона, по id. Если в массиве не оказалось соответствий, отдаём стандартный номер
*/

const phone_element_id = 'phone';
const current_city = location.hostname.split('.').shift() || 'default';
const default_phone = '8-800-000-00-00';
const city_phone_map = {
  'default' : default_phone,
  'moscow' : '8-800-111-11-11',
  'spb' : '8-800-222-22-22'
};
const phone = city_phone_map[current_city] ?? default_phone;
document.getElementById(phone_element_id).innerHTML = phone;
