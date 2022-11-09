<?php
/**
 * EVO Manager language file
 *
 * @version 1.0.15
 * @date 2014/02/24
 * @author The EVO Project Team
 *
 * @language English
 * @package modx
 * @subpackage manager
 *
 * Please commit your language changes on Transifex (https://www.transifex.com/projects/p/modx-evolution/) or on GitHub (https://github.com/modxcms/evolution).
 */

//$modx_textdir = 'rtl'; // uncomment this line for RTL languages
$modx_lang_attribute = 'ru'; // Manager HTML/XML Language Attribute see http://en.wikipedia.org/wiki/ISO_639-1
$modx_manager_charset = 'UTF-8';

$_lang["about_msg"] =
    'Evolution CMS — это платформа для создания сайтов на языке PHP и система управления контентом, распространяемая под лицензией <a href="https://www.gnu.org/licenses/gpl-3.0.html">GNU GPL</a>.';
$_lang["about_title"] = 'Об Evolution CMS';
$_lang["access_permission_denied"] = 'У вас недостаточно прав для просмотра данного ресурса.';
$_lang["access_permission_parent_denied"] = 'У вас недостаточно прав для создания ресурса в данном разделе';
$_lang["access_permissions"] = 'Права доступа';
$_lang["access_permissions_add_resource_group"] = 'Создать новую группу ресурсов';
$_lang["access_permissions_add_user_group"] = 'Создать новую пользовательскую группу';
$_lang["access_permissions_docs_message"] =
    'Здесь вы можете выбрать, к каким группам ресурсов принадлежит этот ресурс.';
$_lang["access_permissions_group_link"] = 'Создать новую связь группы пользователей и группы ресурсов';
$_lang["access_permissions_introtext"] =
    'Здесь вы можете управлять доступом групп пользователей к группам ресурсов. Чтобы добавить пользователя в группу, при редактировании его выберите группу, к которой он будет принадлежать. Ресурс также можно добавить в группу при его редактировании.';
$_lang["access_permissions_link_to_group"] = 'с группой ресурсов';
$_lang["access_permissions_context"] = 'в контексте';
$_lang["access_permissions_link_user_group"] = 'Связать группу пользователей';
$_lang["access_permissions_links"] = 'Связи групп пользователей и групп ресурсов';
$_lang["access_permissions_links_tab"] =
    'Здесь можно определить, какие группы пользователей имеют доступ (то есть создавать и редактировать) к группам ресурсов. Чтобы привязать группу ресурсов к пользовательской группе, выберите группу из списка и нажмите \'Выполнить\'. Чтобы удалить привязку к группе, нажмите \'Удалить\'.';
$_lang["access_permissions_no_resources_in_group"] = 'Нет ресурсов.';
$_lang["access_permissions_no_users_in_group"] = 'Нет пользователей.';
$_lang["access_permissions_off"] =
    '<span class="warning">Права доступа не активированы.</span> Это означает, что никакие изменения не вступят в силу, до тех пор пока вы не измените настройки.';
$_lang["access_permissions_resource_groups"] = 'Группы ресурсов';
$_lang["access_permissions_resources_in_group"] = '<b>ресурсов в группе:</b> ';
$_lang["access_permissions_resources_tab"] =
    'Здесь вы можете увидеть все группы ресурсов. Также, здесь вы можете создать, переименовать, удалить группу, просмотреть ресурсы в группе. Для добавления или удаления ресурса из группы редактируйте ресурс непосредственно.';
$_lang["access_permissions_user_groups"] = 'Группы пользователей';
$_lang["access_permissions_user_message"] =
    'Здесь вы можете выбрать, к какой пользовательской группе принадлежит этот пользователь:';
$_lang["access_permissions_users_in_group"] = 'Пользователей в группе:';
$_lang["access_permissions_users_tab"] =
    'Здесь вы можете увидеть все группы пользователей. Также, здесь вы можете создать, переименовать, удалить группу, просмотреть членов группы. Для добавления или удаления пользователя из группы редактируйте пользователя непосредственно. Менеджеры всегда имеют доступ ко всем ресурсам.';
$_lang["account_email"] = 'E-mail учетной записи';
$_lang["actioncomplete"] =
    '<b>Действие успешно завершено</b><br />Пожалуйста, подождите, пока Evolution CMS произведет очистку.';
$_lang["activity_message"] = 'Этот список показывает недавно созданные или отредактированные ресурсы:';
$_lang["activity_title"] = 'Недавно созданные/отредактированные ресурсы';
$_lang["add"] = 'Создать';
$_lang["add_chunk"] = 'Чанк';
$_lang["add_doc"] = 'Ресурс';
$_lang["add_folder"] = 'Новая папка';
$_lang["add_plugin"] = 'Плагин';
$_lang["add_resource"] = 'Новый ресурс';
$_lang["add_snippet"] = 'Сниппет';
$_lang["add_tag"] = 'Создать тег';
$_lang["add_template"] = 'Шаблон';
$_lang["add_tv"] = 'Параметр (TV)';
$_lang["add_weblink"] = 'Новая ссылка';
$_lang["administrator_role_message"] = 'Эту роль невозможно редактировать или удалить.';
$_lang["administrators"] = 'Администраторам';
$_lang["after_saving"] = 'После сохранения';
$_lang["alert_delete_self"] = 'Вы не можете удалить себя :)';
$_lang["alias"] = 'Псевдоним';
$_lang["all_doc_groups"] = 'Без группы (доступен для всех)';
$_lang["all_events"] = 'Все события';
$_lang["all_usr_groups"] = 'Все группы (доступен для всех)';
$_lang["allow_mgr_access"] = 'Доступ к интерфейсу системы управления сайтом';
$_lang["allow_mgr_access_message"] =
    'Выберите этот параметр для разрешения / запрета доступа к системе управления сайтом.<br /><b>Примечание:</b> если параметр отключен, пользователь будет направлен на стартовую страницу системы управления или на начальную страницу сайта.';
$_lang["already_deleted"] = 'уже удален.';
$_lang["attachment"] = 'Прикрепленное';
$_lang["author_infos"] = 'Информация об авторах';
$_lang["automatic_alias_message"] =
    'Выберите \'Да\' для того, чтобы система автоматически генерировала псевдонимы на основе заголовков страниц (для транслитерации русских символов настройте плагин TransAlias).';
$_lang["automatic_alias_title"] = 'Автоматически генерировать псевдоним:';
$_lang["backup"] = 'Бэкап';
$_lang["bk_manager"] = 'Резервное копирование';
$_lang["block_message"] = 'После сохранения пользователь будет заблокирован.';
$_lang["blocked_minutes_message"] =
    'Здесь вы можете ввести время в минутах, на которое пользователь будет заблокирован, если он достигнет максимального количества разрешенных неудачных попыток входа в систему. Пожалуйста, введите это значение как число (не используйте знаков препинания, пробелов и т.д.)';
$_lang["blocked_minutes_title"] = 'Время блокирования:';
$_lang["cache_files_deleted"] = 'Следующие файлы были удалены:';
$_lang["cancel"] = 'Отмена';
$_lang["captcha_code"] = 'Код подтверждения';
$_lang["captcha_message"] =
    'Включите для усиления безопасности. Для авторизации необходимо будет ввести код, нераспознаваемый разного рода скриптами (показанный в виде графического изображения).';
$_lang["captcha_title"] = 'Использовать код CAPTCHA:';
$_lang["captcha_words_default"] =
    'EVO,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote';
$_lang["captcha_words_message"] =
    'Здесь вы можете задать список слов для генерирования кода CAPTCHA. Слова в списке должны разделяться запятыми.';
$_lang["captcha_words_title"] = 'Слова для генерации CAPTCHA-кодов:';
$_lang["category_heading"] = 'Категория';
$_lang["category_manager"] = 'Менеджер категорий';
$_lang["category_management"] = 'Категории';
$_lang["manage_categories"] = 'Категории';
$_lang["category_msg"] = 'Здесь вы можете просматривать и редактировать все элементы, сгруппированные по категориям.';
$_lang["cfg_base_path"] = 'MODX_BASE_PATH';
$_lang["cfg_base_url"] = 'MODX_BASE_URL';
$_lang["cfg_manager_path"] = 'MODX_MANAGER_PATH';
$_lang["cfg_manager_url"] = 'MODX_MANAGER_URL';
$_lang["cfg_site_url"] = 'MODX_SITE_URL';
$_lang["change_name"] = 'Изменить имя';
$_lang["change_password"] = 'Изменить пароль';
$_lang["change_password_confirm"] = 'Подтвердить пароль';
$_lang["change_password_message"] =
    'Введите новый пароль, затем введите его еще раз для подтверждения. Длина пароля должна составлять от 6 до 15 символов.';
$_lang["change_password_new"] = 'Новый пароль';
$_lang["charset_message"] =
    'Выберите кодировку страниц сайта. Помните, что Evolution CMS тестировалась не на всех кодировках. Для большинства языков подходит кодировка UTF-8.';
$_lang["charset_title"] = 'Кодировка:';
$_lang["chunk"] = 'Чанк (HTML-элемент шаблона)';
$_lang["chunk_code"] = 'Код чанка (HTML)';
$_lang["chunk_multiple_id"] = 'Ошибка: Несколько чанков имеют одинаковый идентификатор.';
$_lang["chunk_no_exist"] = 'Чанк не найден.';
$_lang["cleaningup"] = 'Очистка...';
$_lang["clean_uploaded_filename"] = 'Использовать транслитерацию при загрузке файлов.';
$_lang["clean_uploaded_filename_message"] =
    'Использовать настройки плагина transalias для транслитерации имен загружаемых файлов с сохранением точек и запятых.';
$_lang["clear_log"] = 'Очистить протокол';
$_lang["click_to_context"] = 'Контекстное меню';
$_lang["click_to_edit_title"] = 'Редактировать запись';
$_lang["click_to_view_details"] = 'Детали';
$_lang["close"] = 'Закрыть';
$_lang["code"] = 'Код';
$_lang["collapse_tree"] = 'Свернуть дерево';
$_lang["comment"] = 'Комментарий';
$_lang["configcheck_admin"] = 'Пожалуйста, свяжитесь с системным администратором и сообщите об этой ошибке';
$_lang["configcheck_cache"] = 'невозможна запись в папку кэширования';
$_lang["configcheck_cache_msg"] =
    'Evolution CMS не в состоянии записывать данные в папку кэширования. Система будет работать нормально, но кэширования происходить не будет. Для решения проблемы разрешите запись в папку <b>/assets/cache<b>.';
$_lang["configcheck_configinc"] = 'Файл конфигурации всё еще доступен для записи';
$_lang["configcheck_configinc_msg"] =
    'Злоумышленники потенциально могут нанести вред вашему сайту. <b>Серьёзно.</b> Пожалуйста, установите права доступа к файлу конфигурации (/[+MGR_DIR+]/includes/config.inc.php) в режим \'Только для чтения\'';
$_lang["configcheck_default_msg"] = 'Неопределенная ошибка.';
$_lang["configcheck_errorpage_unavailable"] =
    'Страница сообщения об ошибке, указанная в конфигурации сайта, недоступна.';
$_lang["configcheck_errorpage_unavailable_msg"] =
    'Это означает, что она не существует или недоступна обычным посетителям сайта. Это может привести к циклическому вызову функции \'сообщения об ошибке\' и большому количеству записей в журнале сайта. Убедитесь, что нет групп веб-пользователей, которым назначена эта страница.';
$_lang["configcheck_errorpage_unpublished"] =
    'Страница сообщения об ошибке, указанная в конфигурации сайта, не опубликована.';
$_lang["configcheck_errorpage_unpublished_msg"] =
    'Это означает, что она недоступна посетителям сайта. Необходимо опубликовать страницу сообщения об ошибке, чтобы эта функция работала правильно.';
$_lang["configcheck_filemanager_path"] =
    'Указан неверный <a href="index.php?a=17&tab=5">путь для файлового менеджера</a>';
$_lang["configcheck_filemanager_path_msg"] =
    'Это может произойти, например, после перемещения вашего сайта в другой каталог или на другой сервер. Пожалуйста, проверьте и обновите настройки вашей Evolution CMS';
$_lang["configcheck_hide_warning"] =
    '<a href="javascript:hideConfigCheckWarning(\'%s\');"><em>Больше не показывать это сообщение.</em></a>';
$_lang["configcheck_images"] = 'Папка изображений (images) недоступна для записи';
$_lang["configcheck_images_msg"] =
    'Папка изображений (images) недоступна для записи или не существует на сервере. Из этого следует, что управление изображениями работать не будет';
$_lang["configcheck_installer"] = 'Не удалена папка с файлами, использовавшимися в процессе установки';
$_lang["configcheck_installer_msg"] =
    'Папка /install содержит инсталляционные файлы Evolution CMS. Злоумышленники могут воспользоваться этими файлами для взлома/повреждения сайта, так что лучше удалить папку с сервера.';
$_lang["configcheck_lang_difference"] = 'Неверное количество записей в языковом пакете.';
$_lang["configcheck_lang_difference_msg"] =
    'Текущий языковой пакет имеет количество записей, отличное от требуемого. Несмотря на то, что система будет работать нормально, возможно, языковой пакет нуждается в доработке.';
$_lang["configcheck_notok"] = 'Конфигурация содержит ошибки.';
$_lang["configcheck_ok"] = 'Конфигурация не содержит ошибок.';
$_lang["configcheck_php_gdzip"] = 'GD и/или Zip PHP расширения не найдены';
$_lang["configcheck_php_gdzip_msg"] =
    'Для нормальной работы Evolution CMS необходимо, чтобы были разрешены GD и Zip расширения для PHP. Evolution CMS будет работать и без этих расширений, но вы не сможете использовать все возможности встроенного файл-менеджера, редактора изображений или код CAPTCHA для авторизации.';
$_lang["configcheck_rb_base_dir"] = 'Указан неверный <a href="index.php?a=17&tab=6">путь для файл-браузера</a>';
$_lang["configcheck_rb_base_dir_msg"] =
    'Это может произойти, например, после перемещения вашего сайта в другой каталог или на другой сервер. Пожалуйста, проверьте и обновите настройки вашей Evolution CMS';
$_lang["configcheck_register_globals"] =
    'Параметр \'register_globals\' имеет значение \'ON\' в конфигурационном файле \'php.ini\'.';
$_lang["configcheck_register_globals_msg"] =
    'Такая конфигурация делает ваш сайт значительно более уязвимым для Cross Site Scripting (XSS) атак. Обратитесь в службу поддержки вашего хостинга за информацией, каким образом выключить этот параметр.';
$_lang["configcheck_title"] = 'Проверка конфигурации';
$_lang["configcheck_templateswitcher_present"] = 'Обнаружен плагин TemplateSwitcher';
$_lang["configcheck_templateswitcher_present_delete"] =
    '<a href="javascript:deleteTemplateSwitcher();">Удалить плагин TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_disable"] =
    '<a href="javascript:disableTemplateSwitcher();">Отключить плагин TemplateSwitcher</a>';
$_lang["configcheck_templateswitcher_present_msg"] =
    'Обнаружены проблемы c кэшированием и производительностью при использовании плагина TemplateSwitcher';
$_lang["configcheck_unauthorizedpage_unavailable"] =
    'Страница сообщения об ограниченном доступе, указанная в конфигурации сайта, не опубликована или не существует.';
$_lang["configcheck_unauthorizedpage_unavailable_msg"] =
    'Это означает, что она не существует или недоступна обычным посетителям сайта. Это может привести к рекурсивному вызову функции \'сообщения об ошибке\' и большому количеству записей в журнале сайта. Убедитесь, что нет групп веб-пользователей, которым назначена эта страница.';
$_lang["configcheck_unauthorizedpage_unpublished"] =
    'Страница сообщения об ограниченном доступе, указанная в конфигурации сайта, не опубликована.';
$_lang["configcheck_unauthorizedpage_unpublished_msg"] =
    'Это означает, что она недоступна посетителям сайта. Необходимо опубликовать страницу сообщения об ограничении доступа, чтобы эта функция работала правильно.';
$_lang["configcheck_validate_referer"] = 'Предупреждение безопасности: проверка заголовка HTTP';
$_lang["configcheck_validate_referer_msg"] =
    'В конфигурации параметр <b>Проверять серверные заголовки HTTP_REFERER?</b> отключен. Мы рекомендуем ее включить. <a href="index.php?a=17">Перейти к настройке конфигурации</a>';
$_lang["configcheck_warning"] = 'Ошибка конфигурации:';
$_lang["configcheck_what"] = 'Что это значит?';
$_lang["confirm_block"] = 'Вы уверены, что хотите заблокировать пользователя?';
$_lang["confirm_delete_category"] = 'Вы уверены, что хотите удалить эту категорию?';
$_lang["confirm_delete_eventlog"] = 'Вы уверены, что хотите удалить протокол событий?';
$_lang["confirm_delete_file"] =
    'Вы уверены, что хотите удалить файл? \n\nЭто может вызвать проблемы с работой сайта. Удаляйте файл, только если вы на 100% уверены, что работа сайта не пострадает.';
$_lang["confirm_delete_group"] = 'Вы уверены, что хотите удалить эту группу?';
$_lang["confirm_delete_htmlsnippet"] = 'Вы уверены, что хотите удалить этот чанк?';
$_lang["confirm_delete_keywords"] = 'Вы уверены, что хотите удалить эти ключевые слова?';
$_lang["confirm_delete_module"] = 'Вы уверены, что хотите удалить этот модуль?';
$_lang["confirm_delete_plugin"] = 'Вы уверены, что хотите удалить этот плагин?';
$_lang["confirm_delete_record"] = 'Вы уверены, что хотите удалить эти записи?';
$_lang["confirm_delete_resource"] =
    'Вы уверены, что хотите удалить этот ресурс? \nВсе дочерние ресурсы будут также удалены.';
$_lang["confirm_delete_role"] = 'Вы уверены, что хотите удалить эту роль?';
$_lang["confirm_delete_snippet"] = 'Вы уверены, что хотите удалить этот сниппет?';
$_lang["confirm_delete_tags"] = 'Вы уверены, что хотите удалить выбранные META-теги?';
$_lang["confirm_delete_template"] = 'Вы уверены, что хотите удалить этот шаблон?';
$_lang["confirm_delete_tmplvars"] = 'Вы уверены, что хотите удалить этот параметр (TV) и все сохраненные в нем данные?';
$_lang["confirm_delete_user"] = 'Вы уверены, что хотите удалить этого пользователя?';
$_lang["delete_yourself"] = 'Вы не можете удалить себя';
$_lang["delete_last_admin"] = 'Вы не можете удалить последнего администратора';
$_lang["confirm_delete_permission"] = 'Вы уверены, что хотите удалить это право доступа?';
$_lang["confirm_duplicate_record"] = 'Вы уверены, что хотите сделать копию этой записи?';
$_lang["confirm_empty_trash"] = 'Удалить ВСЕ помеченные на удаление файлы навсегда? \n\nПродолжить?';
$_lang["confirm_load_depends"] = 'Вы уверены, что хотите загрузить панель \'Зависимости\' без сохранения изменений?';
$_lang["confirm_name_change"] =
    'Изменение имени пользователя может повлиять на работу некоторых дополнений Evolution CMS. \n\nВы уверены, что хотите изменить имя пользователя?';
$_lang["confirm_publish"] =
    '\n\nПубликация этого ресурса сейчас удалит все предустановленные расписания публикации. Если вы хотите установить новое расписание или оставить старое – выберите пункт \'Редактировать\'.\n\nПродолжить?';
$_lang["confirm_remove_locks"] =
    'Пользователи иногда закрывают браузер в процессе редактирования ресурсов, шаблонов, сниппетов и т.д., оставляя их заблокированными. Нажимая \'ОК\', вы удаляете все текущие блокировки. \n\nПродолжить?';
$_lang["confirm_reset_sort_order"] =
    'Вы уверены, что хотите сбросить \"sort order/index\" из всех перечисленных элементов до 0?';
$_lang["confirm_resource_duplicate"] =
    'Вы уверены, что хотите сделать копию этого ресурса? \nВсе дочерние ресурсы будут также скопированы.';
$_lang["confirm_setting_language_change"] =
    'Вы изменили значение по умолчанию, выполненные ранее исправления будут утеряны. Продолжить?';
$_lang["confirm_unblock"] = 'Вы уверены, что хотите разблокировать этого пользователя?';
$_lang["confirm_undelete"] =
    '\n\nВсе дочерние ресурсы, удаленные вместе с этим ресурсом, будут восстановлены. Однако ресурсы, удаленные ранее, не будут восстановлены.';
$_lang["confirm_unpublish"] =
    '\n\nОтмена публикации этого ресурса сейчас удалит все предустановленные расписания публикации. Если вы хотите установить новое расписание или оставить старое - выберите пункт \'Редактировать\'.\n\nПродолжить?';
$_lang["confirm_unzip_file"] = 'Вы уверены, что хотите распаковать архив? \n\nСуществующие файлы будут перезаписаны.';
$_lang["could_not_find_user"] = 'Не могу найти пользователя';
$_lang["create_folder_here"] = 'Дочерний контейнер';
$_lang["create_resource_here"] = 'Дочерний ресурс';
$_lang["create_resource_title"] = 'Создать ресурс';
$_lang["create_weblink_here"] = 'Дочерняя веб-ссылка';
$_lang["createdon"] = 'Дата создания';
$_lang["create_new"] = 'Создать';
$_lang["credits"] = 'Evolution CMS использует';
$_lang["credits_shouts_msg"] =
    '<p>Evolution CMS поддерживается на сайте <a href="https://evocms.ru/" target="_blank">evocms.ru</a>.</p>';
$_lang["custom_contenttype_message"] =
    'Здесь вы можете добавить типы содержимого (Content-Type) для сайта. Для этого введите тип содержимого и нажмите \'Добавить\'.';
$_lang["custom_contenttype_title"] = 'Типы содержимого (Content-Type):';
$_lang["database_charset"] = 'Кодировка базы данных';
$_lang["database_collation"] = 'Сопоставление базы данных';
$_lang["database_name"] = 'Имя базы данных';
$_lang["database_overhead"] =
    '<b style="color:#990033;">Примечание:</b> \'перерасход\' – это неиспользуемое, но зарезервированное MySQL пространство. Чтобы освободить это место, нажмите \'Перерасход\' в таблице (таблицах).';
$_lang["database_server"] = 'Сервер базы данных';
$_lang["database_table_clickbackup"] = ' создать и загрузить резервную копию выбранных таблиц';
$_lang["database_table_clickhere"] = 'Нажмите здесь,';
$_lang["database_table_datasize"] = 'Объём данных';
$_lang["database_table_droptablestatements"] = 'Включать в дамп инструкцию \'DROP TABLE\'';
$_lang["database_table_effectivesize"] = 'Занимаемый объём';
$_lang["database_table_indexsize"] = 'Объём индекса';
$_lang["database_table_overhead"] = 'Перерасход';
$_lang["database_table_records"] = 'Записи';
$_lang["database_table_tablename"] = 'Название таблицы';
$_lang["database_table_totals"] = 'Всего:';
$_lang["database_table_totalsize"] = 'Общий объём';
$_lang["database_tables"] = 'Таблицы базы данных';
$_lang["database_version"] = 'Версия базы данных:';
$_lang["date"] = 'Дата';
$_lang["datechanged"] = 'Дата изменения';
$_lang["datepicker_offset"] = 'Смещение лет: ';
$_lang["datepicker_offset_message"] = 'Число прошлых лет, которое будет показано в окне выбора даты.';
$_lang["datetime_format"] = 'Формат даты:';
$_lang["datetime_format_message"] = 'Выберите формат даты, который будет использован в системе управления.';
$_lang["default"] = 'По умолчанию:';
$_lang["defaultcache_message"] = 'Выберите \'Да\', чтобы новые ресурсы после создания кэшировались по умолчанию.';
$_lang["defaultcache_title"] = '\'Кэшируемый\' по умолчанию:';
$_lang["defaultmenuindex_message"] =
    'Выберите \'Да\', для автоматического увеличения позиции в меню для новых ресурсов.';
$_lang["defaultmenuindex_title"] = '\'Индексация меню\' по умолчанию:';
$_lang["defaultpublish_message"] = 'Выберите \'Да\', чтобы новые ресурсы после создания публиковались по умолчанию.';
$_lang["defaultpublish_title"] = '\'Публиковать\' по умолчанию:';
$_lang["defaultsearch_message"] =
    'Выберите \'Да\', чтобы новые ресурсы после создания были доступны для поиска по умолчанию.';
$_lang["defaultsearch_title"] = '\'Доступен для поиска\' по умолчанию:';
$_lang["defaulttemplate_message"] =
    'Выберите шаблон, который будет применяться к новым ресурсам по умолчанию. При редактировании ресурса вы можете установить любой шаблон.';
$_lang["defaulttemplate_title"] = 'Шаблон по умолчанию:';
$_lang["defaulttemplate_logic_title"] = 'Автоматическое назначение шаблона';
$_lang["defaulttemplate_logic_general_message"] = 'Шаблон, назначаемый новым ресурсам:';
$_lang["defaulttemplate_logic_system_message"] = '<b>Системный</b>: такой же шаблон, как в системных настройках.';
$_lang["defaulttemplate_logic_parent_message"] =
    '<b>Родитель</b>: такой же шаблон, как у родителя (если ресурс в корне сайта, шаблон Системный).';
$_lang["defaulttemplate_logic_sibling_message"] =
    '<b>Соседний</b>: такой же шаблон, как у соседних ресурсов в этом контейнере (если соседних ресурсов нет, шаблон Родитель).';
$_lang["delete"] = 'Удалить';
$_lang["delete_resource"] = 'Удалить';
$_lang["delete_tags"] = 'Удалить теги';
$_lang["deleting_file"] = 'Удаляется файл <b>%s</b>: ';
$_lang["description"] = 'Описание';
$_lang["deselect_keywords"] = 'Удалить ключевые слова';
$_lang["deselect_metatags"] = 'Удалить META-теги';
$_lang["disabled"] = 'Отключен';
$_lang["doc_data_title"] = 'Обзор ресурса';
$_lang["documentation"] = 'Документация';
$_lang["duplicate"] = 'Сделать копию';
$_lang["duplicate_alias_found"] = 'Ресурс <b>%s</b> уже использует псевдоним <b>%s</b>. Введите уникальный псевдоним.';
$_lang["duplicate_template_alias_found"] =
    'Шаблон <b>%s</b> уже использует псевдоним <b>%s</b>. Введите уникальный псевдоним.';
$_lang["duplicate_alias_message"] =
    'Выберите \'Да\', чтобы разрешить повторение псевдонимов.<br /><b>Примечание:</b> этот параметр должен использоваться вместе с включенной функцией \'Использовать вложенные URL\'.';
$_lang["duplicate_alias_title"] = 'Разрешить повторяющиеся псевдонимы:';
$_lang["duplicate_name_found_general"] =
    'Объект <b>%s</b> с именем <b>%s</b> уже существует. Пожайлуста, введите другое имя.';
$_lang["duplicate_name_found_module"] = 'Модуль с именем <b>%s</b> уже существует. Пожайлуста, введите другое имя.';
$_lang["duplicated_el_suffix"] = 'Копия';
$_lang["edit"] = 'Редактировать';
$_lang["edit_resource"] = 'Редактировать';
$_lang["edit_resource_title"] = 'Редактировать ресурс';
$_lang["edit_settings"] = 'Конфигурация';
$_lang["editedon"] = 'Дата редактирования';
$_lang["editing_file"] = 'Редактируемый файл: ';
$_lang["editor_css_path_message"] =
    'Введите путь к CSS-файлу, который вы хотите использовать для редактора. Рекомендуется вводить путь от корня сайта, например: /assets/site/style.css. Если вы не хотите использовать CSS-файл для редактора, оставьте это поле пустым.';
$_lang["editor_css_path_title"] = 'Путь к CSS файлу:';
$_lang["element"] = 'Элемент';
$_lang["element_categories"] = 'Общий просмотр';
$_lang["element_filter_msg"] = 'Введите здесь, чтобы отфильтровать список';
$_lang["element_management"] = 'Элементы';
$_lang["element_name"] = 'Название элемента';
$_lang["element_selector_msg"] = 'Выберите элемент(ы) из списка внизу и нажмите кнопку \'Вставить\'.';
$_lang["element_selector_title"] = 'Выбор элемента';
$_lang["elements"] = 'Элементы';
$_lang["email"] = 'E-mail';
$_lang["email_sent"] = 'Письмо отправлено';
$_lang["email_unique"] = 'Этот Email уже занят!';
$_lang["emailsender_message"] =
    'Укажите адрес e-mail, который будет отображен в письме подтверждения регистрации в поле \'От\'.';
$_lang["emailsender_title"] = 'Обратный адрес e-mail:';
$_lang["emailsubject_default"] = 'Данные для авторизации';
$_lang["emailsubject_message"] =
    'Укажите текст, который будет отображен в письме подтверждения регистрации в поле \'Тема\'.';
$_lang["emailsubject_title"] = 'Тема письма подтверждения регистрации:';
$_lang["empty_folder"] = 'Папка пуста';
$_lang["empty_recycle_bin"] = 'Очистить корзину';
$_lang["empty_recycle_bin_empty"] = 'Нет ресурсов, помеченных на удаление.';
$_lang["enable_resource"] = 'Подключить файл элементов.';
$_lang["enable_sharedparams"] = 'Включить \'общие\' параметры';
$_lang["enable_sharedparams_msg"] =
    '<b>Примечание:</b> вышеуказанный уникальный глобальный идентификатор (GUID) будет использован для идентификации этого модуля и общих параметров. GUID также используется для формирования связи модуля, плагинов или сниппетов, которые используют его общие параметры.';
$_lang["enabled"] = 'Включено';
$_lang["error"] = 'Ошибка';
$_lang["error_sending_email"] = 'Ошибка отправки e-mail';
$_lang["errorpage_message"] =
    'Введите ID ресурса, который вы хотите использовать как страницу ошибки (404 - ресурс не найден).<br /><b>Примечание:</b> убедитесь, что этот ID принадлежит существующему ресурсу, и что этот ресурс опубликован';
$_lang["errorpage_title"] = 'Страница ошибки \'404\':';
$_lang["event_id"] = 'ID события';
$_lang["eventlog"] = 'Протокол событий';
$_lang["eventlog_msg"] =
    'Протокол событий используется для отображения системных информационных сообщений, предупреждений и сообщений об ошибках. В колонке \'Код\' показан раздел системы управления, где произошло событие.';
$_lang["eventlog_viewer"] = 'Просмотр событий';
$_lang["everybody"] = 'Всем';
$_lang["existing_category"] = 'Существующие категории';
$_lang["expand_tree"] = 'Развернуть дерево';
$_lang["failed_login_message"] =
    'Здесь вы можете ввести количество неудачных попыток входа в систему, которые разрешены, прежде чем пользователь будет заблокирован.';
$_lang["failed_login_title"] = 'Лимит неудачных попыток входа в систему:';
$_lang["fe_editor_lang_message"] = 'Выберите язык редактора, который будет использоваться во фронтенде.';
$_lang["fe_editor_lang_title"] = 'Язык фронтенд-редактора:';
$_lang["file_delete_file"] = 'Удалить файл';
$_lang["file_delete_folder"] = 'Удалить папку';
$_lang["file_deleted"] = 'Удалено';
$_lang["file_download_file"] = 'Скачать файл';
$_lang["file_download_unzip"] = 'Распаковать файл';
$_lang["file_folder_chmod_error"] = 'Не удалось изменить права, необходимо установить нужные права вне Evolution CMS.';
$_lang["file_folder_created"] = 'Папка успешно создана';
$_lang["file_folder_deleted"] = 'Папка успешно удалена';
$_lang["file_folder_not_created"] = 'Невозможно создать папку';
$_lang["file_folder_not_deleted"] = 'Невозможно удалить папку. Убедитесь в том, что она пуста';
$_lang["file_not_deleted"] = 'Ошибка';
$_lang["file_not_saved"] = 'Невозможно сохранить файл';
$_lang["file_saved"] = 'Файл сохранен';
$_lang["file_unzip"] = 'Архив успешно распакован';
$_lang["file_unzip_fail"] = 'Архив не удалось распаковать';
$_lang["filemanager_path_message"] =
    'Часто IIS неправильно выводит параметр document_root, который используется файл-менеджером. Установите правильный путь во избежание проблем с файл-менеджером.';
$_lang["filemanager_path_title"] = 'Путь для файл-менеджера:';
$_lang["files_access_denied"] = 'Доступ запрещен';
$_lang["files_data"] = 'Суммарный объём';
$_lang["files_dir_listing"] = 'Список файлов в папке: ';
$_lang["files_directories"] = 'Папки';
$_lang["files_directory_is_empty"] = 'В этой папке нет файлов.';
$_lang["files_dirwritable"] = 'Разрешена запись в папку?';
$_lang["files_editfile"] = 'Редактировать файл';
$_lang["files_file_type"] = 'Тип файла: ';
$_lang["files_filename"] = 'Имя файла';
$_lang["files_fileoptions"] = 'Параметры';
$_lang["files_files"] = 'Файлы';
$_lang["files_filesize"] = 'Размер файла';
$_lang["files_filetype_notok"] = 'Загрузка файлов такого типа запрещена';
$_lang["files_management"] = 'Файлы';
$_lang["files_management_no_permission"] =
    'У вас нет достаточно прав для просмотра или редактирования этих файлов. Обратитесь к администратору, чтобы предоставить вам доступ к <b>%s</b>.';
$_lang["files_modified"] = 'Изменен';
$_lang["files_top_level"] = 'На корневой уровень';
$_lang["files_up_level"] = 'На уровень выше';
$_lang["files_upload_copyfailed"] = 'Не удалось скопировать файл в нужную папку - загрузка прервана!';
$_lang["files_upload_error"] = 'Ошибка';
$_lang["files_upload_error0"] = 'Возникла проблема во время загрузки.';
$_lang["files_upload_error1"] = 'Файл, который вы пытаетесь загрузить, слишком велик.';
$_lang["files_upload_error2"] = 'Файл, который вы пытаетесь загрузить, слишком велик.';
$_lang["files_upload_error3"] = 'Файл, который вы пытались загрузить, загружен лишь частично.';
$_lang["files_upload_error4"] = 'Вы должны выбрать файл для загрузки.';
$_lang["files_upload_error5"] = 'Возникли проблемы с загрузкой.';
$_lang["files_upload_inhibited_msg"] =
    '<b>Функция загрузки файлов на сервер файлов недоступна</b> - убедитесь, что папка доступна PHP для записи.';
$_lang["files_upload_ok"] = 'Файл успешно загружен';
$_lang["files_upload_permissions_error"] =
    'Возможно ошибка прав доступа - папка, в которую вы хотите загрузить данные, не доступна для записи на вашем сервере.';
$_lang["files_uploadfile"] = 'Загрузить';
$_lang["files_uploadfile_msg"] = 'Выберите файлы для загрузки:';
$_lang["files_uploading"] = 'Загружается файл <b>%s</b> в <b>%s/</b><br />';
$_lang["files_viewfile"] = 'Просмотр файла';
$_lang["folder"] = 'Папка';
$_lang["forgot_password_email_fine_print"] =
    '* Указанный адрес станет недействительным, как только вы поменяете пароль (или автоматически послезавтра).';
$_lang["forgot_password_email_instructions"] = 'Вы сможете изменить свой пароль, редактируя учетную запись.';
$_lang["forgot_password_email_intro"] = 'Был сделан запрос на изменение пароля вашей учетной записи.';
$_lang["forgot_password_email_link"] = 'Нажмите здесь для завершения процесса.';
$_lang["forgot_your_password"] = 'Забыли свой пароль?';
$_lang["friday"] = 'Пятница';
$_lang["friendly_alias_message"] =
    'Если сайт использует дружественные URL, и ресурс имеет псевдоним, то при включении этого параметра URL ресурса будет иметь вид: \'http://mysite.com/псевдоним\'. Если определены суффикс (например \'.html\') и/или префикс (например \'page-\') дружественных URL, адрес страницы будет следующий: \'http://mysite.com/page-псевдоним.html\'. Если не заданы псевдонимы, суффиксы и префиксы, Evolution CMS сгенерирует такой URL: \'http://mysite.com/2\', где 2 - ID ресурса.';
$_lang["friendly_alias_title"] = 'Использовать псевдонимы в URL:';
$_lang["friendlyurls_message"] =
    'Данный параметр позволяет разрешить использование дружественных URL на сайте. Помните, что данная возможность доступна лишь тогда, когда Evolution CMS работает на сервере Apache с установленным mod_rewrite; кроме того, необходимо изменить файл .htaccess. Для информации по подробным настройкам посмотрите файл .htaccess, входящий в дистрибутив Evolution CMS.';
$_lang["friendlyurls_title"] = 'Использовать дружественные URL:';
$_lang["friendlyurlsprefix_message"] =
    'Здесь вы можете указать особый префикс для дружественных URL. Например, если в качестве такого префикса вы укажете слово \'page\', то URL типа /index.php?id=2 будет преобразован в /page2.html (в качестве суффикса URL здесь выступает \'.html\').';
$_lang["friendlyurlsprefix_title"] = 'Префикс для дружественных URL:';
$_lang["friendlyurlsuffix_message"] =
    'Здесь вы можете указать суффикс для дружественных URL. Указав \'.html\', вы добавите .html ко всем дружественным URL.';
$_lang["friendlyurlsuffix_title"] = 'Суффикс для дружественных URL:';
$_lang["functionnotimpl"] = 'Увы';
$_lang["functionnotimpl_message"] = 'Эта функция еще не используется данной версией Evolution CMS.';
$_lang["further_info"] = 'Подробная информация';
$_lang["global_tabs"] = 'Глобальные вкладки';
$_lang["go"] = 'Перейти';
$_lang["group_access_permissions"] = 'Доступ групп пользователей';
$_lang['group_tvs'] = 'Группировать ТВ параметры';
$_lang["guid"] = 'GUID';
$_lang["help"] = 'Помощь';
$_lang["help_msg"] =
    '<p>Вы можете получить бесплатную помощь сообщества Evolution CMS <a href="http://modx.im" target="_blank">на форумах Evolution CMS</a>. Смотрите также <a href="http://docs.evolution-cms.com" target="_blank">\'Документация и уроки по Evolution CMS\'</a>, где подробно описан каждый аспект системы.</p>';
$_lang["help_title"] = 'Помощь';
$_lang["hide_tree"] = 'Спрятать дерево';
$_lang["home"] = 'Главная';
$_lang["htmlsnippet"] = 'Чанк';
$_lang["htmlsnippets"] = 'Чанки';
$_lang["htmlsnippet_desc"] = 'Описание';
$_lang["htmlsnippet_management_msg"] =
    '<b>Чанки</b> - это куски (X)HTML-кода, используемые в неизменном виде в нескольких местах. Чтобы иметь возможность централизованно редактировать повторяющийся код, вынесите его в чанк. Чанки не могут прямо содержать исполняемый код, однако могут включать в себя вызовы <i>сниппетов</i> и/или <i>параметров (TV)</i>, обеспечивающих динамическую логику.</p><p><b>Использование:</b> вставьте <code>{{chunkName}}</code> где-либо в <i>шаблоне</i>, в <i>области контента</i>, в коде другого чанка или в <i>параметре (TV)</i>.</p><p><b>Вызов через Evolution CMS API:</b> <code>$modx->getChunk(\'chunkName\'); $modx->putChunk(\'chunkName\');</code></p><p><br />Выберите чанк для редактирования или создайте новый.';
$_lang["htmlsnippet_msg"] =
    'Здесь вы можете создать / отредактировать чанк. <br /> Помните, чанки – чистый HTML-код, и любые php-скрипты выполняться в них не будут.';
$_lang["htmlsnippet_name"] = 'Название чанка';
$_lang["htmlsnippet_title"] = 'Создать / редактировать чанк';
$_lang["icon"] = 'Значок';
$_lang["icon_description"] = 'CSS класс';
$_lang["id"] = 'ID';
$_lang["illegal_parent_child"] = 'Смена родительского ресурса: \n\nресурс является дочерним к выбранному.';
$_lang["illegal_parent_self"] =
    'Смена родительского ресурса: \n\nвыбранный ресурс не может быть присвоен как родитель самому себе.';
$_lang["images_management"] = 'Изображения';
$_lang["import_files_found"] = '<b>Найдено %s ресурсов для импорта...</b>';
$_lang["import_params"] = 'Импортировать общие параметры модуля';
$_lang["import_params_msg"] =
    'Вы можете импортировать параметры и установки модуля, выбрав его название из списка вверху.<br /><b>Примечание:</b> для того, чтобы модули отображались в меню, этот плагин/сниппет должен быть одной из зависимостей модуля и у модуля должны быть включены общие параметры.';
$_lang["import_parent_resource"] = 'Родительский ресурс:';
$_lang["update_tree"] = 'Перестроить дерево';
$_lang["update_tree_description"] = '<ul>
                    <li>- Closure table патерн проектирования Базы данных который делает более удобной и быстрой работу с деревом документов</li>
                    <li>- Если данные в дереве обновляются не через models то есть вероятнось некоректной связки документов в базе</li>
                    <li>- Данная операция исправляет проблему, когда site_content обновляются не через модель(save,create) и не обновляются связи (Closure table)</li>
                    <li>- Так же возможно выполнить данную операцию в режиме CLI через команду \'php artisan closuretable:rebuild\'</li>
                </ul>';
$_lang["update_tree_danger"] =
    'Если у вас более 1000 ресурсов лучше выполнить данную операцию в режиме CLI через команду \'php artisan closuretable:rebuild\'';
$_lang["update_tree_time"] =
    'Обновление дерева завершено.<br> Документов обработано: <b>%s</b><br>Процесс занял <b>%s</b> секунд.';
$_lang["inbox"] = 'Входящие';
$_lang["info"] = 'Информация';
$_lang["information"] = 'Информация';
$_lang["inline"] = 'Отображаемое';
$_lang["insert"] = 'Вставить';
$_lang["maxImageWidth"] = 'Максимальная ширина изображения';
$_lang["maxImageHeight"] = 'Максимальная высота изображения';
$_lang["clientResize"] = 'Изменение размера изображений на стороне клиента';
$_lang["clientResize_message"] = 'Если включено, изображения будут изменяться браузером до загрузки на сервер';
$_lang["noThumbnailsRecreation"] = 'Создание эскизов только при загрузке изображения';
$_lang["noThumbnailsRecreation_message"] =
    'Файловый менеджер будет создавать эскизы только при загрузке; если для некоторых изображений нет эскизов, они не будут созданы';
$_lang["thumbWidth"] = 'Максимальная ширина превью';
$_lang["thumbHeight"] = 'Максимальная высота превью';
$_lang["thumbsDir"] = 'Папка для хранения превью';
$_lang["jpegQuality"] = 'Степень сжатия JPEG';
$_lang["denyZipDownload"] = 'Запретить скачивание zip-архивов';
$_lang["denyExtensionRename"] = 'Запретить переименование расширений файлов';
$_lang["maxImageWidth_message"] =
    'Если изображение шире, чем указано, то оно будет уменьшено. Укажите 0, чтобы не изменять ширину изображения при загрузке.';
$_lang["maxImageHeight_message"] =
    'Если изображение выше, чем указано, то оно будет уменьшено. Укажите 0, чтобы не изменять высоту изображения при загрузке.';
$_lang["thumbWidth_message"] = 'Максимальная ширина превью';
$_lang["thumbHeight_message"] = 'Максимальная высота превью';
$_lang["thumbsDir_message"] = 'Название папки, в которой будут храниться превью';
$_lang["jpegQuality_message"] = 'Степень сжатия изображений и превью JPEG-формата';
$_lang["showHiddenFiles"] = 'Показывать скрытые файлы';
$_lang["keyword"] = 'Ключевое слово';
$_lang["keywords"] = 'Ключевые слова';
$_lang["keywords_intro"] =
    'Для редактирования ключевого слова просто введите новое значение рядом с существующим. Для удаления - поставьте галочку в поле \'удалить\'.';
$_lang["language_message"] = 'Выберите язык системы управления сайтом.';
$_lang["language_title"] = 'Язык системы управления:';
$_lang["last_update"] = 'Последние обновления';
$_lang["launch_site"] = 'Запустить сайт';
$_lang["license"] = 'Лицензия';
$_lang["link_attributes"] = 'Атрибуты ссылки';
$_lang["link_attributes_help"] =
    'Здесь вы можете ввести атрибуты ссылки для этой страницы, например target=&quot;_blank&quot; или rel=&quot;external&quot;.';
$_lang["list_mode"] = 'Включить/выключить режим списка - используется для вывода списка записей.';
$_lang["loading_doc_tree"] = 'Загружается дерево сайта...';
$_lang["loading_menu"] = 'Загружается меню...';
$_lang["loading_page"] = 'Пожалуйста, подождите...';
$_lang["localtime"] = 'Местное время';
$_lang["lock_htmlsnippet"] = 'Ограничить доступ к редактированию чанка';
$_lang["lock_htmlsnippet_msg"] = 'Только администраторы (ID роли - 1) могут редактировать этот чанк.';
$_lang["lock_module"] = 'Ограничить доступ к редактированию модуля';
$_lang["lock_module_msg"] = 'Только администраторы (ID роли - 1) могут редактировать этот модуль.';
$_lang["lock_msg"] =
    '<b>%s</b> сейчас редактирует <b>%s</b>. Пожалуйста, подождите, пока другой пользователь закончит с редактированием, и попробуйте снова.';
$_lang["lock_plugin"] = 'Ограничить доступ к редактированию плагина';
$_lang["lock_plugin_msg"] = 'Только администраторы (ID роли - 1) имеют право редактировать этот плагин.';
$_lang["lock_settings_msg"] =
    '<b>%s</b> сейчас редактирует системные установки. Пожалуйста, подождите, пока другой пользователь закончит редактирование, и попробуйте снова.';
$_lang["lock_snippet"] = 'Ограничить доступ к редактированию сниппета';
$_lang["lock_snippet_msg"] = 'Только администраторы (ID роли - 1) могут редактировать этот сниппет.';
$_lang["lock_template"] = 'Ограничить доступ к редактированию шаблона';
$_lang["lock_template_msg"] = 'Только администраторы (ID роли - 1) могут редактировать этот шаблон.';
$_lang["lock_tmplvars"] = 'Ограничить доступ к редактированию параметра';
$_lang["lock_tmplvars_msg"] = 'Только администраторы (ID роли - 1) могут редактировать этот параметр.';
$_lang["locked"] = 'Заблокирован';
$_lang["login_allowed_days"] = 'Разрешенные дни';
$_lang["login_allowed_days_message"] = 'Выберите дни, в которые этот пользователь может входить.';
$_lang["login_allowed_ip"] = 'Разрешенный IP-адрес';
$_lang["login_allowed_ip_message"] =
    'Введите IP-адрес, с которого разрешено заходить этому пользователю.<br /><b>Примечание:</b> несколько IP-адресов разделяйте запятыми (,)';
$_lang["login_button"] = 'Войти';
$_lang["login_cancelled_install_in_progress"] =
    'В данный момент выполняется установка/обновление сайта. <br />Повторите попытку через пару минут!<br />';
$_lang["login_cancelled_site_was_updated"] =
    'Процесс установки/обновления сайта завершен успешно. Требуется повторная авторизация в системе!<br />';
$_lang["login_captcha_message"] =
    'Введите код подтверждения. \n\nЕсли у вас возникли трудности с прочтением кода, нажмите на него, чтобы сгенерировать новый вариант.';
$_lang["login_homepage"] = 'Страница успешной авторизации';
$_lang["login_homepage_message"] =
    'Введите ID ресурса, который загрузится после успешной авторизации пользователя.<br /><b>Примечание:</b> убедитесь, что этот ID принадлежит существующему ресурсу, что этот ресурс опубликован и что он доступен для данного пользователя';
$_lang["login_message"] =
    'Введите ваше имя пользователя и пароль. Обратите внимание - строчные и прописные буквы различаются.';
$_lang["logo_slogan"] = 'Создавайте больше с меньшими усилиями - \nСистема управления сайтом Evolution CMS';
$_lang["logout"] = 'Выйти';
$_lang["long_title"] = 'Расширенный заголовок';
$_lang["mail_check_timeperiod_message"] = 'Как часто проверять наличие новых сообщений в системе управления, (сек).';
$_lang["mail_check_timeperiod_title"] = 'Период проверки почты:';
$_lang["manage_depends"] = 'Зависимости';
$_lang["manage_files"] = 'Все файлы';
$_lang["manage_htmlsnippets"] = 'Чанки';
$_lang["manage_metatags"] = 'META-теги и ключевые слова';
$_lang["manage_modules"] = 'Модули';
$_lang["manage_plugins"] = 'Плагины';
$_lang["manage_snippets"] = 'Сниппеты';
$_lang["manage_templates"] = 'Шаблоны';
$_lang["manage_documents"] = 'Документы';
$_lang["manage_permission"] = 'Права доступа';
$_lang["manager"] = 'Менеджер';
$_lang["manager_lockout_message"] =
    'В данный момент вы находитесь в режиме управления сайтом. Чтобы закончить сеанс администрирования, нажмите кнопку \'Выйти\'. <p />Чтобы перейти на главную или стартовую страницу, нажмите кнопку \'Домой\'.';
$_lang["manager_permissions"] = 'Права менеджеров';
$_lang["manager_theme"] = 'Шаблон системы управления:';
$_lang["manager_theme_message"] = 'Выберите шаблон для системы управления.';
$_lang["manager_theme_mode"] = 'Цветовая схема:';
$_lang["manager_theme_mode1"] = 'Всё светлое';
$_lang["manager_theme_mode2"] = 'Шапка тёмная';
$_lang["manager_theme_mode3"] = 'Шапка и дерево тёмные';
$_lang["manager_theme_mode4"] = 'Всё тёмное';
$_lang['manager_theme_mode_message'] =
    'Этот параметр используется как \'по умолчанию\' и может быть переопределен при переключения режима цвета темы в дереве документов: <i class="fa fa-lg fa-adjust"></i>';
$_lang['manager_theme_mode_title'] = 'Переключатель цветовой схемы: 4 схемы';
$_lang["meta_keywords"] = 'Ключевые слова';
$_lang["metatag_intro"] =
    'На этой странице вы можете создавать/редактировать/удалять META-теги. Чтобы привязать META-теги к ресурсам, нажмите на вкладку <u>Ключевые слова</u>, когда редактируете ресурс, и выберите нужные ключевые слова и META-теги. Для создания нового тега введите его имя и значение и нажмите \'Создать тэг\'. Для редактирования нажмите на название тега.';
$_lang["metatag_notice"] =
    'Это <b>не полный</b> список возможных мета-тегов. Подробную информацию по использованию мета-тегов вы можете получить здесь: <a href="http://www.html-reference.com/META.asp" target="_blank">HTML Reference Guide</a>.';
$_lang["metatags"] = 'META-теги';
$_lang["mgr_access_permissions"] = 'Права доступа менеджеров';
$_lang["mgr_login_start"] = 'Авторизация менеджера сайта';
$_lang["mgr_login_start_message"] =
    'Введите ID ресурса, который вы хотите послать пользователю после авторизации в системе управления сайтом.<br /><b>Примечание:</b> убедитесь в том, что ID принадлежит существующему ресурсу, который опубликован и доступен этому пользователю';
$_lang["mgrlog_action"] = 'Действие:';
$_lang["mgrlog_actionid"] = 'ID действия:';
$_lang["mgrlog_anyall"] = 'Любое / Все';
$_lang["mgrlog_datecheckfalse"] = 'Функция checkdate() вернула значение false.';
$_lang["mgrlog_datefr"] = 'Начиная с даты';
$_lang["mgrlog_dateinvalid"] = 'Ошибочный формат даты.';
$_lang["mgrlog_dateto"] = 'Заканчивая датой';
$_lang["mgrlog_emptysrch"] = 'По вашему запросу ничего не найдено (нет записей, соответствующих заданным критериям).';
$_lang["mgrlog_field"] = 'Поле';
$_lang["mgrlog_itemid"] = 'ID ресурса';
$_lang["mgrlog_itemname"] = 'Название ресурса';
$_lang["mgrlog_msg"] = 'Сообщение';
$_lang["mgrlog_noquery"] = 'Вы не ввели запрос. Укажите критерии запроса.';
$_lang["mgrlog_qresults"] = 'Результаты запроса';
$_lang["mgrlog_query"] = 'Протокол запросов к базе';
$_lang["mgrlog_query_msg"] =
    'Пожалуйста, задайте критерии просмотра записей.</p><p><b>Примечание:</b> указанный диапазон дат не включает результаты за дату, указанную в поле \'Заканчивая датой\'. Например, чтобы сделать выборку за 25-12-2018, укажите в поле \'Начиная с даты\' значение 25-12-2018, а в поле \'Заканчивая датой\' - значение 25-12-2018.</p><p>Сообщение и действие обычно одинаковы. Если вы хотите найти какое-то конкретное сообщение, обычно лучше всего установить действие \'Любое / Все\'.';
$_lang["mgrlog_results"] = 'Отображать результаты порциями по';
$_lang["mgrlog_searchlogs"] = 'Найти записи протокола';
$_lang["mgrlog_sortinst"] =
    'Вы можете отсортировать таблицу, выбрав мышью заголовок любой колонки. Если записей станет слишком много, вы можете <a href="index.php?a=55">очистить протокол</a>. <i>ВНИМАНИЕ: это приведёт к удалению всех записей протокола по сегодняшний момент!</i>';
$_lang["mgrlog_time"] = 'Время';
$_lang["mgrlog_user"] = 'Пользователь';
$_lang["mgrlog_username"] = 'Имя пользователя';
$_lang["mgrlog_value"] = 'Значение';
$_lang["mgrlog_view"] = 'Просмотр записей протокола системы управления сайтом';
$_lang["module_code"] = 'Код модуля (php)';
$_lang["module_config"] = 'Конфигурация модуля';
$_lang["module_desc"] = 'Описание';
$_lang["module_disabled"] = 'Модуль отключен';
$_lang["module_edit_click_title"] = 'Нажмите для редактирования модуля';
$_lang["module_group_access_msg"] = 'Выберите группы пользователей, которые могут запускать этот модуль.';
$_lang["module_management"] = 'Модули';
$_lang["module_management_msg"] =
    '<b>Модуль</b> - это приложение, основанное на архитектуре Evolution CMS и расширяющее возможности системы управления. Модуль может группировать набор элементов (<i>сниппеты</i>, <i>чанки</i>, <i>данные</i>), реализуя принцип инкапсуляции через разделение интерфейса и реализации.</p><p>Выберите модуль, который вы хотите запустить или изменить, или создайте новый модуль. Для запуска модуля нажмите на значок рядом с его именем, для редактирования модуля нажмите на его название.';
$_lang["module_msg"] =
    'Здесь вы можете создавать / редактировать модули. Модуль - это набор элементов (плагинов, сниппетов и т. д.).';
$_lang["module_name"] = 'Название модуля';
$_lang["module_resource_msg"] =
    'Здесь вы можете добавить / удалить элементы, от которых зависит этот модуль. Чтобы добавить новый элемент, нажмите одну из кнопок внизу.';
$_lang["module_resource_title"] = 'Зависимости модуля';
$_lang["module_title"] = 'Создать / редактировать модуль';
$_lang["module_viewdepend_msg"] =
    'Здесь вы можете просмотреть, от каких элементов зависит этот модуль. Чтобы изменить зависимости, нажмите на \'Зависимости\'.';
$_lang["modules"] = 'Модули';
$_lang["modx_news"] = 'Новости Evolution CMS';
$_lang["modx_news_tab"] = 'Новости Evolution CMS';
$_lang["modx_news_title"] = 'Новости Evolution CMS';
$_lang["modx_security_notices"] = 'Уведомления безопасности Evolution CMS';
$_lang["modx_version"] = 'Версия Evolution CMS';
$_lang["monday"] = 'Понедельник';
$_lang["move"] = 'Переместить';
$_lang["move_resource"] = 'Переместить';
$_lang["move_resource_message"] =
    'Вы можете переместить ресурс и все его дочерние ресурсы, выбрав новый \'родительский\' ресурс. Если вы выберете в качестве родительского ресурс, не являющийся папкой, Evolution CMS автоматически сделает его папкой. Выберите новый \'родительский ресурс\' в дереве сайта слева.';
$_lang["move_resource_new_parent"] = 'Выберите новый \'родительский\' ресурс в дереве сайта слева.';
$_lang["move_resource_title"] = 'Переместить';
$_lang["name"] = 'Название';
$_lang["new_category"] = 'Новая категория';
$_lang["new_file_permissions_message"] =
    'При загрузке нового файла с помощью файл-менеджера будет сделана попытка установить права на файл в соответствии с указанным здесь значением. На некоторых системах автоматическая установка прав может быть недоступна (в частности, при использовании IIS) - в таком случае необходимо будет установить соответствующие права вручную.';
$_lang["new_file_permissions_title"] = 'Права на новый файл:';
$_lang["new_folder_permissions_message"] =
    'При создании новой папки с помощью файл-менеджера будет сделана попытка установить права на папку в соответствии с указанным здесь значением. На некоторых системах автоматическая установка прав может быть недоступна (в частности, при использовании IIS) - в таком случае необходимо будет установить соответствующие права вручную.';
$_lang["new_folder_permissions_title"] = 'Права на новую папку:';
$_lang["new_permission"] = 'Новое право доступа';
$_lang["new_htmlsnippet"] = 'Новый чанк';
$_lang["new_keyword"] = 'Добавить ключевое слово:';
$_lang["new_module"] = 'Новый модуль';
$_lang["new_parent"] = 'Новый родительский ресурс';
$_lang["new_plugin"] = 'Новый плагин';
$_lang["new_role"] = 'Новая роль';
$_lang["new_snippet"] = 'Новый сниппет';
$_lang["new_template"] = 'Новый шаблон';
$_lang["new_tmplvars"] = 'Новый параметр (TV)';
$_lang["new_user"] = 'Новый пользователь';
$_lang["new_web_user"] = 'Новый пользователь';
$_lang["new_resource"] = 'Новый ресурс';
$_lang["no"] = 'Нет';
$_lang["no_active_users_found"] = 'Не найдено активных пользователей.';
$_lang["no_activity_message"] = 'Вы не создали или не отредактировали ни одного ресурса.';
$_lang["no_category"] = 'Без категории';
$_lang["no_docs_pending_publishing"] = 'Нет ресурсов, ожидающих публикации.';
$_lang["no_docs_pending_pubunpub"] = 'События не найдены.';
$_lang["no_docs_pending_unpublishing"] = 'Нет ресурсов, ожидающих отмены публикации.';
$_lang["no_edits_creates"] = 'Созданных или отредактированных ресурсов не обнаружено.';
$_lang["no_groups_found"] = 'Групп не найдено.';
$_lang["no_keywords_found"] = 'Ключевых слов нет.';
$_lang["no_records_found"] = 'Не найдено записей.';
$_lang["no_results"] = 'Ничего не найдено';
$_lang["nologentries_message"] = 'Выберите количество записей протокола на странице при его просмотре.';
$_lang["nologentries_title"] = 'Количество записей протокола:';
$_lang["nomessages_message"] = 'Выберите количество сообщений на странице при их просмотре.';
$_lang["nomessages_title"] = 'Количество сообщений:';
$_lang["none"] = 'Нет';
$_lang["noresults_message"] = 'Введите количество элементов, отображаемых в списках и результатах поиска.';
$_lang["noresults_title"] = 'Количество результатов:';
$_lang["not_deleted"] = 'не был удален.';
$_lang["not_set"] = 'нет данных';
$_lang["offline"] = 'Оффлайн';
$_lang["online"] = 'Онлайн';
$_lang["onlineusers_action"] = 'Действие';
$_lang["onlineusers_actionid"] = 'ID действия';
$_lang["onlineusers_ipaddress"] = 'IP-адрес посетителя сайта';
$_lang["onlineusers_lasthit"] = 'Момент последнего действия';
$_lang["onlineusers_message"] =
    'Этот список показывает всех пользователей, активных за последние 20 минут (текущее время - ';
$_lang["onlineusers_title"] = 'Пользователи онлайн';
$_lang["onlineusers_user"] = 'Пользователь';
$_lang["onlineusers_userid"] = 'ID пользователя';
$_lang["optimize_table"] = 'Нажмите для оптимизации таблицы';
$_lang["page_data_alias"] = 'Псевдоним';
$_lang["page_data_cacheable"] = 'Кэшируемый';
$_lang["page_data_cacheable_help"] =
    'Отметьте для того, чтобы разрешить кэширование ресурса. Будьте внимательны в том случае, если ресурс содержит вызовы сниппетов - возможно, лучше отменить кэширование.';
$_lang["page_data_cached"] = '<b>Код взят из кэша:</b>';
$_lang["page_data_changes"] = 'Создание и изменение';
$_lang["page_data_contentType"] = 'Тип содержимого';
$_lang["page_data_contentType_help"] =
    'Выберите тип содержимого для ресурса. Если вы не уверены в том, какой тип данных должен быть у ресурса, оставьте text/html.';
$_lang["page_data_created"] = 'Создан';
$_lang["page_data_edited"] = 'Редактировался';
$_lang["page_data_editor"] = 'Использовать HTML-редактор';
$_lang["page_data_folder"] = 'Ресурс является контейнером';
$_lang["page_data_general"] = 'Общие';
$_lang["page_data_markup"] = 'Разметка/структура';
$_lang["page_data_mgr_access"] = 'Менеджерский доступ';
$_lang["page_data_notcached"] = 'Ресурс еще не кэшировался.';
$_lang["page_data_publishdate"] = 'Дата публикации';
$_lang["page_data_publishdate_help"] =
    'Если вы установите дату публикации, ресурс будет опубликован по наступлению этой даты. Нажмите на значок календаря, чтобы выбрать дату, либо на значок рядом, чтобы удалить дату публикации. Это будет означать, что ресурс не будет публиковаться автоматически.';
$_lang["page_data_published"] = 'Опубликован';
$_lang["page_data_searchable"] = 'Доступен для поиска';
$_lang["page_data_searchable_help"] =
    'Отметьте для того, чтобы разрешить поиск в содержимом этого ресурса (внутренней поисковой машиной). Этот параметр можно также использовать в разработке сниппетов.';
$_lang["page_data_source"] = 'Код';
$_lang["page_data_status"] = 'Статус';
$_lang["page_data_template"] = 'Шаблон';
$_lang["page_data_template_help"] =
    'Здесь вы можете указать, какой шаблон должен использовать ресурс. Выберите (blank), если хотите, чтобы ресурс не использовал никаких шаблонов (рекомендуется для пустых ресурсов, выполняющих только роль контейнера).';
$_lang["page_data_title"] = 'Данные ресурса (страницы)';
$_lang["page_data_unpublishdate"] = 'Дата отмены публикации';
$_lang["page_data_unpublishdate_help"] =
    'Если вы установите дату отмены публикации, ресурс будет снят с публикации по наступлению этой даты. Нажмите на значок календаря, чтобы выбрать дату, либо на значок рядом, чтобы удалить дату отмены публикации. Это будет означать, что ресурс не будет снят с публикации автоматически.';
$_lang["page_data_unpublished"] = 'Не опубликован';
$_lang["page_data_web_access"] = 'Веб-доступ';
$_lang["pagetitle"] = 'Заголовок ресурса';
$_lang["pagination_table_first"] = 'Первый';
$_lang["pagination_table_gotopage"] = 'Перейти на';
$_lang["pagination_table_last"] = 'Последний';
$_lang["paging_first"] = 'В начало';
$_lang["paging_last"] = 'В конец';
$_lang["paging_next"] = 'Дальше';
$_lang["paging_prev"] = 'Назад';
$_lang["paging_showing"] = 'Отображаются записи с';
$_lang["paging_to"] = 'по';
$_lang["paging_total"] = 'всего';
$_lang["parameter"] = 'Параметр';
$_lang["parse_docblock"] = 'Анализировать DocBlock';
$_lang["parse_docblock_msg"] =
    'Внимание (!): <b> Сброс </b> актуального имени, конфигурации, описания и категории для установки дефолту путем анализа исходного кода.';
$_lang["password"] = 'Пароль';
$_lang["password_change_request"] = 'Запрос на смену пароля';
$_lang["password_gen_gen"] = 'Позволить Evolution CMS сгенерировать пароль.';
$_lang["password_gen_length"] = 'Пароль должен содержать минимум 6 символов.';
$_lang["password_gen_method"] = 'Способ задания нового пароля';
$_lang["password_gen_specify"] = 'Я сам задам пароль:';
$_lang["password_method"] = 'Способ уведомления о новом пароле';
$_lang["password_method_email"] = 'Послать новый пароль по e-mail.';
$_lang["password_method_screen"] = 'Показать новый пароль на экране.';
$_lang["password_msg"] = 'Для пользователя <b>:username</b> задан новый пароль - <b>:password</b><br>';
$_lang["php_version_check"] = 'Evolution CMS работает с PHP версии 7.4 или выше. Пожалуйста, обновите PHP';
$_lang["plugin"] = 'Плагин';
$_lang["plugins"] = 'Плагины';
$_lang["plugin_code"] = 'Код плагина (php)';
$_lang["plugin_config"] = 'Конфигурация плагина';
$_lang["plugin_desc"] = 'Описание';
$_lang["plugin_disabled"] = 'Плагин отключен';
$_lang["plugin_event_msg"] = 'Выберите события, которые должен отслеживать плагин.';
$_lang["plugin_management_msg"] =
    '<b>Плагины</b> - это интерактивные PHP-скрипты, запускающиеся при наступлении события, которое они отслеживают.</p><p>Выберите плагин для редактирования или создайте новый. Также вы можете задать порядок вызова плагинов при наступлении событий, которые они обрабатывают.';
$_lang["plugin_msg"] = 'Здесь вы можете создать / отредактировать плагин.';
$_lang["plugin_name"] = 'Название плагина';
$_lang["plugin_priority"] = 'Редактировать порядок вызова плагинов';
$_lang["plugin_priority_instructions"] =
    'Перетащите мышью для определения порядка выполнения плагинов для каждого события. Сначала выполняется первый в списке плагин.';
$_lang["plugin_priority_title"] = 'Порядок вызова плагинов';
$_lang["purge_plugin"] = 'Удаление старых плагинов';
$_lang["purge_plugin_confirm"] = 'Вы действительно хотите удалить устаревшие плагины?';
$_lang["plugin_title"] = 'Создать / редактировать плагин';
$_lang["preview"] = 'Просмотр';
$_lang["preview_msg"] =
    'Предпросмотр последних изменений. <a href="javascript:;" onclick="saveRefreshPreview();">Сохранить и обновить</a> последние изменения';
$_lang["preview_resource"] = 'Просмотр';
$_lang["private"] = 'Личный';
$_lang["public"] = 'Доступен для всех';
$_lang["publish_date"] = 'Дата публикации';
$_lang["publish_events"] = 'События, связанные с публикацией ресурсов.';
$_lang["publish_resource"] = 'Опубликовать';
$_lang["rb_base_dir_message"] =
    'Введите физический путь к папке файлов. Обычно этот путь устанавливается автоматически. Если вы используете сервер IIS, этого может и не произойти. В таком случае введите путь, как он отображается в адресной строке Internet Explorer.<br /><b>Примечание:</b> для корректной работы браузера папка файлов должна содержать вложенные папки: images, files, flash и media.';
$_lang["rb_base_dir_title"] = 'Путь к файлам:';
$_lang["rb_base_url_message"] =
    'Введите адрес (URL) папки файлов. Обычно этот путь устанавливается автоматически. Если вы используете сервер IIS, этого может и не произойти. В таком случае введите путь, как он отображается в Internet Explorer.';
$_lang["rb_base_url_title"] = 'URL к файлам:';
$_lang["rb_message"] =
    'Выберите \'Да\', чтобы включить браузер файлов. Это позволит менеджерам загружать файлы (изображения, медиа-файлы) на сервер.';
$_lang["rb_title"] = 'Включить файл-менеджер:';
$_lang["rb_webuser_message"] =
    'Хотите ли вы, чтобы веб-пользователи использовали файл-менеджер? <b>Предупреждение:</b> Позволяя веб-пользователям использовать файл-менеджер, вы делаете доступ для всех файлов, которые доступны менеджерам. Используйте эту настройку только для проверенных веб-пользователей.';
$_lang["rb_webuser_title"] = 'Пользователи?';
$_lang["recent_docs"] = 'Последние изменения';
$_lang["recommend_setting_change_title"] = 'Рекомендуемое изменение настройки';
$_lang["recommend_setting_change_description"] =
    'Ваш сайт не настроен на проверку серверных заголовков HTTP_REFERER во входящих запросах в систему управления. Мы настоятельно рекомендуем включить этот параметр, чтобы снизить риск CSRF (Cross Site Request Forgery - подделка межсайтовых запросов) атак.';
$_lang["references"] = 'Рекомендации';
$_lang["refresh_cache"] =
    'Кэш: найдено <b>%s</b> файлов в папке кэширования и удалено <b>%d</b> кэш-файлов.<p>Новые кэш-файлы будут созданы при запросах страниц.';
$_lang["refresh_published"] = '<b>%s</b> ресурсов опубликовано.';
$_lang["refresh_site"] = 'Очистить кэш';
$_lang["refresh_title"] = 'Обновить сайт';
$_lang["refresh_tree"] = 'Обновить дерево';
$_lang["refresh_unpublished"] = '<b>%s</b> ресурсов снято с публикации.';
$_lang["release_date"] = 'Дата выпуска';
$_lang["remember_last_tab"] = 'Запоминать вкладки';
$_lang["remember_last_tab_message"] = 'Открывается не первая вкладка, а используемая при последнем посещении';
$_lang["remember_username"] = 'Запомнить меня';
$_lang["remove"] = 'Удалить';
$_lang["remove_date"] = 'Удалить дату';
$_lang["remove_locks"] = 'Удалить блокировки';
$_lang["rename"] = 'Переименовать';
$_lang["reports"] = 'Отчеты';
$_lang["report_issues"] = 'Сообщить о проблемах';
$_lang["required_field"] = 'Поле :field обязательно';
$_lang["require_tagname"] = 'Название тега обязательно';
$_lang["require_tagvalue"] = 'Значение тега обязательно';
$_lang["reserved_name_warning"] = 'Вы использовали зарезервированное имя.';
$_lang["reset"] = 'Сброс';
$_lang["reset_failedlogins"] = 'сброс';
$_lang["reset_sort_order"] = 'Сброс сортировки';
$_lang["resource"] = 'Ресурс';
$_lang["resource_alias"] = 'Псевдоним';
$_lang["resource_alias_help"] =
    'Здесь вы можете выбрать псевдоним для ресурса. Псевдоним позволяет обращаться к ресурсу по адресу: http://example.com/псевдоним. ВНИМАНИЕ: функция будет работать только при включенных \'дружественных URL\'.';
$_lang["resource_content"] = 'Содержимое ресурса';
$_lang["resource_description"] = 'Описание';
$_lang["resource_description_help"] = 'Здесь вы можете ввести описание ресурса.';
$_lang["resource_duplicate"] = 'Сделать копию';
$_lang["resource_long_title_help"] =
    'Здесь вы можете ввести расширенный заголовок вашего ресурса, что может быть полезно для поисковых систем.';
$_lang["resource_metatag_help"] =
    'Выберите META-теги и ключевые слова, которые вы хотите присвоить этому ресурсу. Для выбора нескольких ключевых слов или МЕТА-тегов нажимайте на них мышью, удерживая Ctrl.';
$_lang["resource_opt_contentdispo"] = 'Местонахождение содержимого';
$_lang["resource_opt_contentdispo_help"] =
    'Этот параметр определяет, как браузер должен обработать ресурс. Для того, чтобы ресурс стал доступным для скачивания, а не отображался в окне браузера, выберите \'Прикрепленное\'.';
$_lang["resource_opt_emptycache"] = 'Очистить кэш';
$_lang["resource_opt_emptycache_help"] =
    'Отметьте для того, чтобы очистить кэш после сохранения изменений этого ресурса. В этом случае посетители увидят свежую версию ресурса.';
$_lang["resource_opt_folder"] = 'Контейнер (содержит дочерние ресурсы)';
$_lang["resource_opt_folder_help"] =
    'Отметьте, чтобы ресурс выполнял также роль папки (родителя) для других ресурсов. Не стоит особо заострять внимание на этом параметре – Evolution CMS автоматически установит для ресурса режим папки, если внутри него начнут создаваться ресурсы.';
$_lang["resource_opt_menu_index"] = 'Позиция в меню';
$_lang["resource_opt_menu_index_help"] =
    'Позиция (индекс) в меню - это порядковый номер ресурса в меню. Эту величину можно также использовать в разработке сниппетов.';
$_lang["resource_opt_menu_title"] = 'Пункт меню';
$_lang["resource_opt_menu_title_help"] =
    'Пункт меню - это параметр, который можно использовать для отображения краткого заголовка ресурса в меню.';
$_lang["resource_opt_published"] = 'Публиковать';
$_lang["resource_opt_published_help"] = 'Отметьте, чтобы опубликовать ресурс сразу после сохранения.';
$_lang["resource_opt_richtext"] = 'Использовать HTML-редактор';
$_lang["resource_opt_richtext_help"] =
    'Отметьте, чтобы для редактирования ресурса использовался HTML-редактор. Если ресурс содержит JavaScript или формы - снимите галочку, чтобы редактировать его в режиме HTML-кода (чтобы HTML-редактор не вносил никаких изменений в код).';
$_lang["resource_opt_show_menu"] = 'Показывать в меню';
$_lang["resource_opt_show_menu_help"] =
    'Включите этот параметр для отображения ресурса в каком-либо меню сайта. Имейте в виду, некоторые сниппеты могут игнорировать этот параметр.';
$_lang["resource_opt_trackvisit_help"] = 'Отметьте, чтобы показывать дочерние ресурсы в дереве документов';
$_lang["resource_overview"] = 'Обзор ресурса';
$_lang["resource_parent"] = 'Папка';
$_lang["resource_parent_help"] =
    'Щелкните мышью на значке контейнера вверху, чтобы включить (выключить) режим выбора родительского ресурса, затем выберите его в дереве сайта слева.';
$_lang["resource_permissions_error"] =
    'Свяжите этот ресурс по крайней мере с одной группой ресурсов, к которой у Вас есть доступ.';
$_lang["resource_setting"] = 'Настройки ресурса';
$_lang["resource_summary"] = 'Аннотация (введение)';
$_lang["resource_summary_help"] = 'Введите краткое описание ресурса';
$_lang["resource_title"] = 'Заголовок';
$_lang["resource_title_help"] = 'Введите имя/заголовок ресурса. Нежелательно использовать при этом обратный слэш (\)';
$_lang["resource_to_be_moved"] = 'Перемещаемый ресурс';
$_lang["resource_type"] = 'Тип ресурса';
$_lang["resource_type_message"] =
    'Веб-ссылка на ресурс в интернете, включая другие ресурсы Evolution CMS, внешние веб-страницы, изображения или другие файлы в интернете. Для ресурса должен быть задан тип содержимого text/html, а в местонахождении содержимого - отображаемое.';
$_lang["resource_type_weblink"] = 'Веб-ссылка';
$_lang["resource_type_webpage"] = 'Веб-страница';
$_lang["resource_weblink_help"] = 'Введите адрес (URI) объекта в сети, на который должна указывать веб-ссылка.';
$_lang["resources_in_container"] = '- количество ресурсов в контейнере';
$_lang["resources_in_container_no"] = 'Текущий контейнер не содержит дочерних ресурсов.';
$_lang["role"] = 'Роль';
$_lang["role_about"] = 'Просмотр информации о системе';
$_lang["manager_access_permissions"] = 'Доступ в админку';
$_lang["manage_groups"] = 'Управление группами документов и пользователей';
$_lang["manage_document_permissions"] = 'Управление доступом к документам';
$_lang["manage_module_permissions"] = 'Управление доступом к модулям';
$_lang["manage_tv_permissions"] = 'Управление доступом к TV параметрам';
$_lang["role_actionok"] = 'Просмотр страницы подтверждения завершения действия';
$_lang["role_assets_images"] = 'Доступ к assets/images';
$_lang["role_assets_files"] = 'Доступ к assets/files';
$_lang["role_bk_manager"] = 'Использовать резервное копирование';
$_lang["role_cache_refresh"] = 'Очистка кэша';
$_lang["role_category_manager"] = 'Использовать менеджер категорий';
$_lang["role_change_password"] = 'Смена пароля';
$_lang["role_change_resourcetype"] = 'Смена типа ресурса';
$_lang["role_chunk_management"] = 'Чанки';
$_lang["role_config_management"] = 'Изменение конфигурации';
$_lang["role_content_management"] = 'Содержимое';
$_lang["role_create_chunk"] = 'Создание новых чанков';
$_lang["role_create_doc"] = 'Создание новых ресурсов';
$_lang["role_create_plugin"] = 'Создание новых плагинов';
$_lang["role_create_snippet"] = 'Создание новых сниппетов';
$_lang["role_create_template"] = 'Создание новых шаблонов';
$_lang["role_credits"] = 'Просмотр списка разработчиков';
$_lang["role_delete_chunk"] = 'Удаление чанков';
$_lang["role_delete_doc"] = 'Удаление ресурсов';
$_lang["role_delete_eventlog"] = 'Удаление протокола событий';
$_lang["role_delete_module"] = 'Удаление модулей';
$_lang["role_delete_plugin"] = 'Удаление плагинов';
$_lang["role_delete_role"] = 'Удаление ролей';
$_lang["role_delete_snippet"] = 'Удаление сниппетов';
$_lang["role_delete_template"] = 'Удаление шаблонов';
$_lang["role_delete_user"] = 'Удаление пользователей';
$_lang["role_delete_web_user"] = 'Удаление веб-пользователей';
$_lang["role_edit_chunk"] = 'Редактирование чанков';
$_lang["role_edit_doc"] = 'Редактирование ресурсов';
$_lang["role_edit_doc_metatags"] = 'Редактировать META-теги и ключевые слова';
$_lang["role_edit_module"] = 'Редактирование модулей';
$_lang["role_edit_plugin"] = 'Редактирование плагинов';
$_lang["role_edit_role"] = 'Редактирование ролей';
$_lang["role_edit_settings"] = 'Изменять конфигурацию сайта';
$_lang["role_edit_snippet"] = 'Редактирование сниппетов';
$_lang["role_edit_template"] = 'Редактирование шаблонов';
$_lang["role_edit_user"] = 'Редактирование пользователей';
$_lang["role_edit_web_user"] = 'Редактирование веб-пользователей';
$_lang["role_empty_trash"] = 'Очищение корзины';
$_lang["role_errors"] = 'Просмотр диалога ошибки';
$_lang["role_eventlog_management"] = 'Протокол событий';
$_lang["role_export_static"] = 'Экспорт статических страниц в HTML';
$_lang["role_file_management"] = 'Файлы';
$_lang["role_file_manager"] = 'Использование файл-менеджера';
$_lang["role_frames"] = 'Запрос менеджерских фреймов';
$_lang["role_help"] = 'Просмотр страниц помощи';
$_lang["role_home"] = 'Запрос входной страницы менеджера';
$_lang["role_import_static"] = 'Импорт HTML';
$_lang["role_logout"] = 'Выход из системы управления';
$_lang["role_list_module"] = 'Просмотр списка модулей';
$_lang["role_manage_metatags"] = 'META-теги и ключевые слова';
$_lang["role_management_msg"] =
    '<b>Роль</b> - это набор прав совершать определённые действия. Роли назначаются пользователям. Типичные роли:</p> <ul> <li><b>Администраторы сайта</b> - управляют пользователями и общими настройками;</li> <li><b>Разработчики</b> - пишут код и, соответственно, имеют набор прав на создание / редактирование / удаление <i>модулей</i>, <i>плагинов</i>, <i>сниппетов</i>, <i>чанков</i>, <i>параметров (TV)</i>;</li> <li><b>Дизайнеры</b> - отвечают за внешний вид и вёрстку страниц сайта, имеют набор прав на создание / редактирование / удаление <i>шаблонов</i> и <i>чанков</i>;</li> <li><b>Редакторы</b> - отвечают за содержание страниц сайта, создают, редактируют и удаляют ресурсы;</li> <li><b>Корректоры</b> - читают и корректируют ресурсы, но не имеют прав на их создание и удаление;</li> <li><b>Главный редактор</b> - принимает решение о публикации новых ресурсов, управляет расписанием публикации.</li> </ul><br /><p>Выберите роль для редактирования или создайте новую роль.';
$_lang["role_management_title"] = 'Роли';
$_lang["role_messages"] = 'Читать и отправлять сообщения';
$_lang["role_module_management"] = 'Модули';
$_lang["role_name"] = 'Название роли';
$_lang["role_new_module"] = 'Создание новых модулей';
$_lang["role_new_role"] = 'Создание новых ролей';
$_lang["role_new_user"] = 'Создание новых пользователей';
$_lang["role_new_web_user"] = 'Создание веб-пользователей';
$_lang["role_plugin_management"] = 'Плагины';
$_lang["role_publish_doc"] = 'Публикация ресурсов';
$_lang["role_remove_locks"] = 'Удалить блокировки';
$_lang["role_role_management"] = 'Роли';
$_lang["role_run_module"] = 'Запуск модулей';
$_lang["role_save_chunk"] = 'Сохранение чанков';
$_lang["role_save_doc"] = 'Сохранение ресурсов';
$_lang["role_save_module"] = 'Сохранение модулей';
$_lang["role_save_password"] = 'Сохранение пароля';
$_lang["role_save_plugin"] = 'Сохранение плагинов';
$_lang["role_save_role"] = 'Сохранение ролей';
$_lang["role_save_snippet"] = 'Сохранение сниппетов';
$_lang["role_save_template"] = 'Сохранение шаблонов';
$_lang["role_save_user"] = 'Сохранение пользователей';
$_lang["role_save_web_user"] = 'Сохранение веб-пользователей';
$_lang["role_snippet_management"] = 'Сниппеты';
$_lang["role_template_management"] = 'Шаблоны';
$_lang["role_title"] = 'Создать / редактировать роль';
$_lang["role_udperms"] = 'Доступ';
$_lang["role_user_management"] = 'Пользователи';
$_lang["role_view_docdata"] = 'Просмотр информации о ресурсе';
$_lang["role_view_eventlog"] = 'Просмотр протокола событий';
$_lang["role_view_logs"] = 'Просмотр системного протокола';
$_lang["role_view_unpublished"] = 'Просмотр неопубликованных ресурсов';
$_lang["role_web_access_persmissions"] = 'Права веб-доступа';
$_lang["role_web_user_management"] = 'Пользователи';
$_lang["rss_url_news_default"] = 'https://github.com/evocms-community/evolution/releases.atom';
$_lang["rss_url_news_message"] = 'Введите адрес (URL) RSS-ленты новостей Evolution CMS.';
$_lang["rss_url_news_title"] = 'Лента RSS новостей';
$_lang["rss_url_security_default"] = 'https://github.com/extras-evolution/security-fix/releases.atom';
$_lang["rss_url_security_message"] = 'Введите адрес (URL) RSS-ленты безопасности Evolution CMS.';
$_lang["rss_url_security_title"] = 'Лента RSS безопасности';
$_lang["run_module"] = 'Запуск модуля';
$_lang["saturday"] = 'Суббота';
$_lang["save"] = 'Сохранить';
$_lang["save_all_changes"] = 'Сохранить изменения';
$_lang["save_tag"] = 'Сохранить тег';
$_lang["saving"] = 'Сохранение ресурса, подождите пожалуйста...';
$_lang["search"] = 'Поиск';
$_lang["search_criteria"] = 'Критерий поиска';
$_lang["search_criteria_content"] = 'Искать в содержимом';
$_lang["search_criteria_content_msg"] = 'Найти все ресурсы, содержащие введенный текст в своем теле.';
$_lang["search_criteria_id"] = 'Искать по ID';
$_lang["search_criteria_id_msg"] = 'Введите ID ресурса, чтобы быстро найти его.';
$_lang["search_criteria_top"] = 'Искать по основным полям';
$_lang["search_criteria_top_msg"] = 'Заголовок, Расширенный заголовок, Псевдоним, ID';
$_lang["search_criteria_template_id"] = 'Искать по ID шаблона';
$_lang["search_criteria_template_id_msg"] = 'Найти все документы использующие указанный шаблон.';
$_lang["search_criteria_url_msg"] = 'Найти ресурс по полному URL или ID.';
$_lang["search_criteria_longtitle"] = 'Искать в расширенных заголовках';
$_lang["search_criteria_longtitle_msg"] = 'Найти все ресурсы, содержащие текст в расширенных заголовках.';
$_lang["search_criteria_title"] = 'Искать в заголовках';
$_lang["search_criteria_title_msg"] = 'Найти все ресурсы, содержащие введенный текст в заголовке.';
$_lang["search_empty"] = 'По вашему запросу ничего не найдено. Попробуйте расширить критерий поиска.';
$_lang["search_item_deleted"] = 'Удалено';
$_lang["search_results"] = 'Результаты поиска';
$_lang["search_results_returned_desc"] = 'Описание';
$_lang["search_results_returned_id"] = 'ID';
$_lang["search_results_returned_msg"] =
    'По вашему запросу найдено <b>%s</b> ресурсов. Если найдено слишком много ресурсов, попробуйте сформировать более специфический запрос. Две крайние колонки слева позволят найти ресурс в дереве сайта либо просмотреть ресурс. Две крайние колонки справа показывают, соответственно, был ли ресурс помечен на удаление и опубликован ли он.';
$_lang["search_results_returned_title"] = 'Заголовок';
$_lang["search_view_docdata"] = 'Просмотреть';
$_lang["security"] = 'Менеджеры';
$_lang["security_notices_tab"] = 'Уведомления безопасности';
$_lang["security_notices_title"] = 'Уведомления безопасности';
$_lang["select_date"] = 'Выбрать дату';
$_lang["send"] = 'Отправить';
$_lang["server_protocol_http"] = 'http';
$_lang["server_protocol_https"] = 'https';
$_lang["server_protocol_message"] = 'Если ваш сайт использует https-соединения, укажите это здесь.';
$_lang["server_protocol_title"] = 'Тип сервера:';
$_lang["serveroffset"] = 'Поправка ко времени на сервере';
$_lang["serveroffset_message"] =
    'Выберите поправку (количество часов) между временем на месте вашего пребывания и на месте нахождения сервера. Текущее время на сервере - <b>[%s]</b>, текущее время на сервере с учетом временной поправки - <b>[%s]</b>.';
$_lang["serveroffset_title"] = 'Разница во времени:';
$_lang["servertime"] = 'Время на сервере';
$_lang["set_automatic"] = 'Автоматически';
$_lang["set_default"] = 'По умолчанию';
$_lang["set_default_all"] = 'Все по умолчанию';
$_lang["settings_after_install"] =
    'Так как вы только что установили систему, следует задать основные настройки. Внесите желаемые изменения и нажмите \'Сохранить\' для вступления изменений в силу.<br /><br />';
$_lang["settings_config"] = 'Конфигурация';
$_lang["settings_dependencies"] = 'Зависимости';
$_lang["settings_events"] = 'Системные события';
$_lang["settings_furls"] = 'Дружественные URL';
$_lang["settings_general"] = 'Общие';
$_lang["settings_group_tv_message"] = 'Выберите тип группировки ТВ параметров при редактировании документа.';
$_lang["settings_group_tv_options"] =
    'Нет,Секциями на вкладке Общие,Табами на вкладке Общие,Секциями на новой вкладке,Табами на новой вкладке,На новых вкладках';
$_lang["settings_misc"] = 'Файл-менеджер';
$_lang["settings_security"] = 'Безопасность';
$_lang["settings_KC"] = 'Файл-браузер';
$_lang["settings_page_settings"] = 'Настройка страницы';
$_lang["settings_photo"] = 'Фото';
$_lang["settings_properties"] = 'Свойства';
$_lang["show_fullscreen_btn_message"] = 'Показывать на главном меню кнопку \'На весь экран\'';
$_lang["show_newresource_btn_message"] = 'Показывать на главном меню кнопку \'Новый ресурс\'';
$_lang["settings_show_picker_message"] = 'Настроить тему панели администрирования и сохранить в localstorage';
$_lang["show_fullscreen_btn"] = 'Кнопка \'На весь экран\'';
$_lang["show_newresource_btn"] = 'Кнопка \'Новый ресурс\'';
$_lang["settings_site"] = 'Сайт';
$_lang["settings_strip_image_paths_message"] =
    'Если установлено значение \'Нет\', Evolution CMS будет использовать абсолютные ссылки для изображений, файлов, анимация и тому подобного. Относительные ссылки удобнее, если вы в будущем собираетесь переместить свой сайт, например, с тестового сервера на конечный. Если вы не знаете, о чем речь, оставьте значение \'Да\'.';
$_lang["settings_strip_image_paths_title"] = 'Переписывать пути для браузера?';
$_lang["settings_templvars"] = 'Параметры (TV)';
$_lang["settings_title"] = 'Системная конфигурация';
$_lang["settings_ui"] = 'Интерфейс и представление';
$_lang["settings_users"] = 'Пользователи';
$_lang["settings_email_templates"] = 'Почта и шаблоны';
$_lang["show_meta"] = 'Показывать вкладку с META-тегами и ключевыми словами';
$_lang["show_meta_message"] =
    'Показывать нерекомендуемую вкладку с META-тегами и ключевыми словами при редактировании ресурсов.';
$_lang["show_tree"] = 'Показать дерево';
$_lang["show_picker"] = 'Показать переключатель цвета';
$_lang["showing"] = 'Показано';
$_lang["signupemail_message"] =
    'Здесь вы можете создать сообщение, которое будет отсылаться менеджерам, когда создается учетная запись нового менеджера. Письмо должно содержать имя пользователя и пароль.<br /><b>Примечание:</b> cледующие \'поля вывода\' отобразят соответствующие данные при отправлении письма: <br /><br />[+sname+] - название сайта, <br />[+saddr+] - e-mail адрес сайта, <br />[+surl+] - адрес (URL) сайта, <br />[+uid+] – имя пользователя или id пользователя, <br />[+pwd+] - пароль пользователя, <br />[+ufn+] - полное имя пользователя. <br />  [+u_first_name+] - Имя пользователя. <br />  [+u_last_name+] - Фамилия пользователя. <br />   [+u_middle_name+] - Отчество пользователя. <br />   <br /><b>Убедитесь, что в сообщении присутствуют поля [+uid+] и [+pwd+], иначе пользователь не узнает свои имя пользователя и пароль</b>';
$_lang["signupemail_title"] = 'Регистрация менеджера:';
$_lang["site"] = 'Сайт';
$_lang["site_schedule"] = 'Расписание сайта';
$_lang["sitename_message"] = 'Введите заголовок вашего сайта.';
$_lang["sitename_title"] = 'Заголовок сайта:';
$_lang["sitestart_message"] =
    'Введите ID ресурса, который вы хотите использовать как стартовую (домашнюю) страницу.<br /><b>Примечание:</b> убедитесь, что этот ID принадлежит существующему ресурсу, и что этот ресурс опубликован';
$_lang["sitestart_title"] = 'Первая страница:';
$_lang["sitestatus_message"] =
    'Выберите \'Онлайн\' для опубликования вашего сайта. Если вы выберете \'Оффлайн\', посетители сайта увидят сообщение о недоступности сайта и не смогут  просмотреть сам сайт.';
$_lang["sitestatus_title"] = 'Статус сайта:';
$_lang["siteunavailable_message"] =
    'Сообщение, выводимое в случае недоступности сайта (когда выбран статус \'Оффлайн\') или в случае возникновения ошибки.<br /><b>Примечание:</b> это сообщение выводится только в том случае, когда не выбрана страница \'Сайт недоступен\'.';
$_lang["siteunavailable_message_default"] = 'В настоящее время сайт недоступен.';
$_lang["siteunavailable_page_message"] =
    'Введите ID ресурса, который должны будут увидеть посетители, если попытаются зайти на сайт, когда он недоступен.<br /><b>Примечание:</b> убедитесь, что этот ID принадлежит существующему ресурсу, и что этот ресурс опубликован';
$_lang["siteunavailable_page_title"] = 'Страница \'Сайт недоступен\':';
$_lang["siteunavailable_title"] = 'Сообщение о недоступности сайта:';
$_lang["controller_namespace"] = 'Controller Namespace';
$_lang["controller_namespace_message"] =
    'Укажите полный Namespace из которого стоит брать контроллеры, например: <b>EvolutionCMS\\Main\\Controllers\\</b>';
$_lang["update_repository"] = 'GitHub путь к репозиторию';
$_lang["update_repository_message"] = 'Введите путь к GitHub-репозиторию, например: <b>evocms-community/evolution</b>';
$_lang["snippet"] = 'Сниппет';
$_lang["snippets"] = 'Сниппеты';
$_lang["snippet_code"] = 'Код сниппета (php)';
$_lang["snippet_desc"] = 'Описание';
$_lang["snippet_execonsave"] = 'Выполнить сниппет после сохранения';
$_lang["snippet_management_msg"] =
    '<b>Сниппеты</b> - это чистый PHP-код, обеспечивающий динамическую логику. Сниппеты позволяют отделить бизнес-логику от структуры и представления данных на веб-странице. Они могут использоваться для генерации динамических меню, вывода контента из базы данных по некоему условию (например, только для зарегистрированных пользователей), вообще, для любых действий, доступных через Evolution CMS API. Сниппеты могут (но не обязаны) принимать параметры и выводить какой-либо результат (например, генерировать HTML-код).<p/><p><b>Использование:</b> вставьте <code>[[snippetName]]</code> или <code>[!snippetName!]</code> где-либо в <i>шаблоне</i>, в <i>области контента</i>, в <i>чанке</i> или в <i>параметре (TV)</i>. Формат <code>[[snippetName]]</code> разрешает кэширование результатов выполнения сниппета, если для страницы включено кэширование. Формат <code>[!snippetName!]</code> используется для исполнения PHP-кода сниппета при каждом просмотре страницы, даже если для страницы разрешено кэширование. Чтобы при вызове PHP-кода сниппета передать в него параметры, используйте формат <code>[[snippetName? &amp;param1=\'value1\' &amp;param2=\'value2\' .. &amp;paramN=\'valueN\']]</code> (или <code>[!snippetName? &amp;param1=\'value1\' &amp;param2=\'value2\' .. &amp;paramN=\'valueN\'!]</code>). В качестве параметров вызова сниппета можно использовать вызов других сниппетов (также с параметрами) или <i>чанков</i>.</p><p><b>Вызов через Evolution CMS API:</b> <code>$modx->runSnippet(\'snippetName\');</code></p><p><br /> Выберите сниппет для редактирования или создайте новый.';
$_lang["snippet_msg"] =
    '<p>Здесь вы можете создать или отредактировать сниппет. Код сниппета должен начинаться с <code>&lt;?php</code></p> <p>Помните, сниппеты - это чистый PHP-код, и если вы хотите вывести данные сниппета в определенном месте в шаблоне, вам необходимо возвращать данные из самого сниппета.</p>';
$_lang["snippet_name"] = 'Название сниппета';
$_lang["snippet_properties"] = 'Параметры по умолчанию';
$_lang["snippet_title"] = 'Создать / редактировать сниппет';
$_lang["sort_alphabetically"] = 'Сортировать по алфавиту';
$_lang["sort_asc"] = 'По возрастанию';
$_lang["sort_desc"] = 'По убыванию';
$_lang["sort_menuindex"] = 'Сортировать по позиции в меню';
$_lang["sort_tree"] = 'Сортировать дерево';
$_lang['sort_updating'] = 'Обновление ...';
$_lang['sort_updated'] = 'Обновлено!';
$_lang['sort_nochildren'] = 'Документ не содержит дочерних документов';
$_lang["sort_elements_msg"] = 'Перетащите, чтобы изменить порядок выбранных элементов.';
$_lang["source"] = 'Код';
$_lang["stay"] = 'Продолжить';
$_lang["stay_new"] = 'Создать новый';
$_lang["submit"] = 'Выполнить';
$_lang["sunday"] = 'Воскресенье';
$_lang["sys_alert"] = 'Системное предупреждение';
$_lang["sysinfo_activity_message"] = 'Этот список показывает последние созданные/отредактированные ресурсы.';
$_lang["sysinfo_userid"] = 'Пользователь';
$_lang["system"] = 'Служебное';
$_lang["system_email_signup"] = 'Здравствуйте, [+uid+]!

Ваши данные для авторизации в системе управления сайтом [+sname+]:

Имя пользователя: [+uid+]
Пароль: [+pwd+]

После успешной авторизации в системе управления сайтом ([+surl+]), вы сможете изменить свой пароль.

С уважением, Администрация';
$_lang["system_email_webreminder"] = 'Здравствуйте, [+uid+]!

Чтобы активировать ваш новый пароль, перейдите по следующей ссылке:

[+surl+]

Позже вы сможете использовать следующий пароль для авторизации: [+pwd+]

Если это письмо пришло к вам по ошибке, пожалуйста, проигнорируйте его.

С уважением, Администрация';
$_lang["system_email_websignup"] = 'Здравствуйте, [+uid+]!

Ваши данные для авторизации на [+sname+]:

Имя пользователя: [+uid+]
Пароль: [+pwd+]

После успешной авторизации на [+sname+] ([+surl+]), вы сможете изменить свой пароль.

С уважением, Администрация';
$_lang["table_hoverinfo"] =
    'Задержите указатель мыши над строкой таблицы, чтобы увидеть короткое пояснение предназначения таблицы (комментарии есть не у всех таблиц).';
$_lang["table_prefix"] = 'Префикс таблиц базы данных';
$_lang["tag"] = 'Тег';
$_lang["template"] = 'Шаблон';
$_lang["templates"] = 'Шаблоны';
$_lang["template_assignedtv_tab"] = 'Назначенные параметры (TV)';
$_lang["template_code"] = 'Код шаблона (HTML)';
$_lang["template_desc"] = 'Описание';
$_lang["template_edit_tab"] = 'Редактировать шаблон';
$_lang["template_management_msg"] =
    '<b>Шаблоны</b> - это (X)HTML-разметка страниц сайта. Шаблон описывает структуру и дизайн отображения элементов страницы (статичных и генерируемых). Шаблон может содержать вызовы <i>сниппетов</i>, <i>чанков</i>, <i>параметров (TV)</i>, а также ссылки на CSS-файлы и другие объекты, определяющие визуальное отображение страницы и её элементов.<p><b>Использование:</b> назначьте шаблон какому-либо ресурсу.</p><p><br />Выберите шаблон для редактирования или создайте новый.';
$_lang["template_msg"] = 'Здесь вы можете создать / отредактировать шаблон.';
$_lang["template_name"] = 'Имя шаблона';
$_lang["template_no_tv"] = 'Этому шаблону не присвоены никакие параметры (TV).';
$_lang["template_notassigned_tv"] = 'Эти TV доступны для выбора.';
$_lang["template_reset_all"] = 'Сбросить все шаблоны (будет установлен шаблон по умолчанию)';
$_lang["template_reset_specific"] = 'Сбросить только страницы с шаблоном <b>%s</b>';
$_lang["template_assigned_blade_file"] = 'Соответствующий blade-файл';
$_lang["template_create_blade_file"] = 'Создать файл шаблона при сохранении';
$_lang["template_selectable"] = 'Шаблон выбирается при создании или редактировании ресурсов.';
$_lang["template_title"] = 'Создать / редактировать шаблон';
$_lang["template_tv_edit"] = 'Редактировать порядок TV';
$_lang["template_tv_edit_message"] = 'Перетащите мышью для изменения порядка параметров (TV) для этого шаблона.';
$_lang["template_tv_edit_title"] = 'Порядок сортировки параметров (TV)';
$_lang["template_tv_msg"] = 'Ниже выводятся параметры (TV), назначенные этому шаблону.';
$_lang["thursday"] = 'Четверг';
$_lang["tmplvar_access_msg"] =
    'Выберите группы ресурсов, в которых разрешена смена этого Дополнительного Параметра (TV)';
$_lang["tmplvar_change_template_msg"] =
    'Смена шаблона повлечет перезагрузку страницы. Все несохраненные изменения будут утеряны. \n\nВы уверены в том, что хотите сменить шаблон?';
$_lang["tmplvar_inuse"] =
    'Этот Параметр (TV) используют следующие шаблоны. Чтобы продолжить процесс удаления, нажмите \'Удалить\', для отмены - нажмите \'Отмена\'.';
$_lang["tmplvar_tmpl_access"] = 'Доступ шаблонов';
$_lang["tmplvar_tmpl_access_msg"] = 'Укажите шаблоны, которые могут использовать этот Параметр (TV)';
$_lang["tmplvar"] = 'Дополнительные поля';
$_lang["tmplvars"] = 'Параметры (TV)';
$_lang["tmplvars_binding_msg"] = 'Это поле поддерживает привязку данных с использованием @-команд';
$_lang["tmplvars_caption"] = 'Заголовок';
$_lang["tmplvars_default"] = 'Значение по умолчанию';
$_lang["tmplvars_description"] = 'Описание';
$_lang["tmplvars_elements"] = 'Возможные значения';
$_lang["tmplvars_inherited"] = 'Value inherited';
$_lang["tmplvars_management_msg"] =
    '<b>Параметры (TV)</b> - это динамические элементы шаблона, которые получают своё значение из некоего <i>источника данных</i>. Существуют также параметры, предопределённые для каждого конкретного ресурса (например, предопределённый параметр <code>[*pagetitle*]</code> содержит заголовок страницы). Параметры могут иметь различный тип данных и разное значение на различных страницах сайта.<p><b>Использование:</b> вставьте где-либо в <i>шаблоне</i> или в <i>области контента</i> выражение <code>[*tvName*]</code></p> <p><b>Вызов через Evolution CMS API:</b> <code>$modx-&gt;documentObject[\'variable-name\']</code></p><p><br />Выберите параметр для редактирования или создайте новый.';
$_lang["tmplvars_msg"] =
    'Здесь вы можете создать / отредактировать параметр (TV). <br /> Помните, параметры должны быть доступны для выбранных шаблонов, чтобы их можно было использовать.';
$_lang["tmplvars_name"] = 'Имя параметра';
$_lang["tmplvars_novars"] = 'Параметров (TV) не найдено';
$_lang["tmplvars_rank"] = 'Порядок в списке';
$_lang["tmplvars_rank_edit_message"] = 'Перетащите, чтобы изменить порядок TV.';
$_lang["tmplvars_reset_params"] = 'Сбросить параметры';
$_lang["tmplvars_title"] = 'Создать / редактировать параметр (TV)';
$_lang["tmplvars_type"] = 'Тип ввода';
$_lang["tmplvars_widget"] = 'Визуальный компонент';
$_lang["tmplvars_widget_prop"] = 'Свойства компонента (widget)';
$_lang["to"] = 'к';
$_lang["toggle_fullscreen"] = 'Развернуть на весь экран';
$_lang["tools"] = 'Инструменты';
$_lang["top_howmany_message"] =
    'Количество лучших показателей в отчетах статистики. Например, \'10 самых популярных...\'';
$_lang["top_howmany_title"] = 'Количество лучших показателей:';
$_lang["total"] = 'всего';
$_lang["track_visitors_message"] =
    'Предоставляет данные для плагина аналитики, например, флажок, определяющий, учитывать ли просмотры конкретного ресурса.';
$_lang["track_visitors_title"] = 'Показывать дочерние ресурсы';
$_lang["tree_page_click"] = 'Режим щелчка мышью на ресурсе';
$_lang["tree_page_click_message"] = 'Действие по умолчанию при щелчке мышью на ресурсе в дереве сайта.';
$_lang["use_breadcrumbs"] = 'Показать навигацию';
$_lang["use_breadcrumbs_message"] = 'Показывать навигацию, при создании или редактировании ресурса';
$_lang["tree_show_protected"] = 'Показывать защищенные ресурсы в дереве сайта:';
$_lang["tree_show_protected_message"] =
    'Если включено \'Нет\', то защищенные ресурсы (включая их дочерние ресурсы) не будут отображаться в дереве сайта.';
$_lang["truncate_table"] = 'Нажмите для усечения таблицы (TRUNCATE)';
$_lang["tuesday"] = 'Вторник';
$_lang["tv"] = 'Параметр (TV)';
$_lang["type"] = 'Тип';
$_lang["udperms_allowroot_message"] = 'Разрешить пользователям создавать ресурсы в корневой папке.';
$_lang["udperms_allowroot_title"] = 'Разрешить доступ к корневой папке:';
$_lang["udperms_message"] =
    'Права доступа позволяют вам определить, какие страницы могут редактировать пользователи. Для этого необходимо, чтобы пользователи принадлежали к группе пользователей, а ресурсы к группе ресурсов, и далее вы можете выбрать, какие группы ресурсов может редактировать та или иная группа пользователей. При первом включении этой функции редактировать ресурсы могут только менеджеры.';
$_lang["udperms_title"] = 'Использовать права доступа:';
$_lang["unable_set_link"] = 'Невозможно установить ссылку';
$_lang["unable_set_parent"] = 'Невозможно установить новый родительский ресурс';
$_lang["unauthorizedpage_message"] =
    'Введите ID ресурса, который должны будут увидеть посетители, если попытаются зайти на закрытую страницу (403 – доступ запрещен).<br /><b>Примечание:</b> убедитесь, что этот ID принадлежит существующему ресурсу, и что этот ресурс опубликован';
$_lang["unauthorizedpage_title"] = 'Страница \'Доступ запрещен\':';
$_lang["unblock_message"] = 'После сохранения пользователь будет разблокирован.';
$_lang["undelete_resource"] = 'Восстановить';
$_lang["unpublish_date"] = 'Дата отмены публикации';
$_lang["unpublish_events"] = 'События, связанные с отменой публикации ресурсов.';
$_lang["unpublish_resource"] = 'Отменить публикацию';
$_lang["untitled_resource"] = 'Новый ресурс';
$_lang["untitled_weblink"] = 'Новая веб-ссылка';
$_lang["update_params"] = 'Обновить параметры';
$_lang["update_settings_from_language"] = 'Изменить на:';
$_lang["upload_maxsize_message"] =
    'Задайте максимальный размер загружаемых файлов. Значение должно быть в байтах.<br /><b>Примечание:</b> большие файлы загружаются, как правило, ОЧЕНЬ долго';
$_lang["upload_maxsize_title"] = 'Максимальный размер загрузки:';
$_lang["uploadable_files_message"] =
    'Здесь вы можете указать, какие типы файлов могут быть загружены на сервер через файл-менеджер. Задайте список расширений через запятую.';
$_lang["uploadable_files_title"] = 'Разрешенные к загрузке файлы:';
$_lang["uploadable_flash_message"] =
    'Здесь вы можете ввести список файлов, которые могут быть загружены в \'assets/flash/\' с помощью файл-менеджера. Введите расширения разрешенных типов флэш-файлов, разделяя их запятыми.';
$_lang["uploadable_flash_title"] = 'Разрешенные к загрузке flash-файлы:';
$_lang["uploadable_images_message"] =
    'Здесь вы можете ввести список файлов, которые могут быть загружены в \'assets/images/\' с помощью файл-менеджера. Введите расширения разрешенных типов графических файлов, разделяя их запятыми.';
$_lang["uploadable_images_title"] = 'Разрешенные к загрузке изображения:';
$_lang["uploadable_media_message"] =
    'Здесь вы можете ввести список файлов, которые могут быть загружены в \'assets/media/\' с помощью файл-менеджера. Введите расширения разрешенных типов медиа-файлов, разделяя их запятыми.';
$_lang["uploadable_media_title"] = 'Разрешенные к загрузке медиа-файлы:';
$_lang["use_alias_path_message"] =
    'Включив эту функцию, вы получите вложенную структуру URL. Например, если дочерний ресурс называется \'дочерний\', а родительский ресурс называется \'родительский\', мы получим URL такого типа: http://example.com/родительский/дочерний.<br /><b>Внимание:</b> если эта функция включена, убедитесь, что все пути к изображениям, css, java-скриптам имеют путь типа \'/assets/images/...\', а не \'assets/images/...\', либо вы всегда можете использовать приставку [(site_url)] для правильного понимания сервером пути, например, \'[(site_url)]assets/images/...\'. Также можно использовать HTML-тег &lt;base href=\'[(site_url)]\'&gt; в HEAD-секции <i>каждой</i> страницы сайта, тогда все относительные пути будут работать правильно.';
$_lang["use_alias_path_title"] = 'Использовать вложенные URL:';
$_lang["use_editor_message"] =
    'Хотите использовать HTML-редактор? Если вы привыкли писать HTML-теги вручную, отключите данную функцию. Имейте в виду, что эта настройка применяется ко всем ресурсам для всех менеджеров';
$_lang["use_editor_title"] = 'Использовать HTML-редактор:';
$_lang["use_global_tabs"] = 'Использовать глобальные вкладки';
$_lang["user"] = 'Пользователь';
$_lang["user_block"] = 'Заблокирован';
$_lang["user_blockedafter"] = 'Заблокирован после';
$_lang["user_blockeduntil"] = 'Заблокирован до';
$_lang["user_changeddata"] = 'Данные вашей регистрации изменены. Пожалуйста, заново авторизуйтесь в системе.';
$_lang["user_country"] = 'Страна';
$_lang["user_dob"] = 'Дата рождения';
$_lang["user_doesnt_exist"] = 'Пользователь не существует';
$_lang["user_edit_self_msg"] =
    '<b>Рекомендуется выйти и снова авторизоваться для того, чтобы все изменения вступили в силу.</b><br />Также, если вы решили сгенерировать новый пароль для себя, он будет отослан вам по e-mail.';
$_lang["user_email"] = 'Адрес e-mail';
$_lang["user_failedlogincount"] = 'Отказы авторизации';
$_lang["user_fax"] = 'Факс';
$_lang["user_female"] = 'Женский';
$_lang["user_full_name"] = 'Полное имя';
$_lang["user_first_name"] = 'Имя';
$_lang["user_last_name"] = 'Фамилия';
$_lang["user_middle_name"] = 'Отчество';
$_lang["user_gender"] = 'Пол';
$_lang["user_is_blocked"] = 'Этот пользователь заблокирован';
$_lang["user_logincount"] = 'Количество авторизаций';
$_lang["user_male"] = 'Мужской';
$_lang["user_management_msg"] =
    '<b>Менеджеры</b> - это пользователи с правом авторизации в системе управления сайтом. <br /><br /> Выберите менеджера, настройки которого вы хотите редактировать, или создайте нового менеджера.';
$_lang["user_management_title"] = 'Менеджеры';
$_lang["user_mobile"] = 'Номер мобильного телефона';
$_lang["user_phone"] = 'Номер телефона';
$_lang["user_photo"] = 'Фото пользователя';
$_lang["user_photo_message"] =
    'Введите адрес (URL) изображения для этого пользователя или нажмите кнопку вставки, чтобы загрузить его на сервер.';
$_lang["user_prevlogin"] = 'Последняя авторизация';
$_lang["user_role"] = 'Роль пользователя';
$_lang["no_user_role"] = 'Без роли';
$_lang["user_state"] = 'Регион / область / район';
$_lang["user_title"] = 'Создать / редактировать пользователя';
$_lang["user_upload_message"] =
    'Если вы хотите запретить этому пользователю загрузку любых файлов данной категории, убедитесь, что флажок \'Использовать общие настройки\' не установлен, и оставьте это поле пустым.';
$_lang["user_use_config"] = 'Использовать системные настройки';
$_lang["user_verification"] = 'Пользователь проверен';
$_lang["user_zip"] = 'Почтовый индекс';
$_lang["username"] = 'Пользователь';
$_lang["username_unique"] = 'Это имя пользователя уже занято!';
$_lang["users"] = 'Пользователи';
$_lang["valid_hostnames_message"] =
    'Помогает предотвратить XSS уязвимости в системной настройке site_url предоставляя разделенный запятыми список доступных имен хостов для этой установки. Это важно для некоторых типов шаред-хостингов или хостов, доступных по IP-адресу. Первое имя хоста в списке используется, если HTTP_HOST не совпадает ни с одним доступным именем хоста из списка.';
$_lang["valid_hostnames_title"] = 'Допустимые имена хостов';
$_lang["validate_referer_message"] =
    'Проверять серверные заголовки HTTP_REFERER для защиты от уязвимостей CSRF (Cross Site Request Forgery). Если сервер не использует заголовки HTTP_REFERER данная функция не будет работать.';
$_lang["validate_referer_title"] = 'Проверять серверные заголовки HTTP_REFERER?';
$_lang["value"] = 'Значение';
$_lang["version"] = 'Версия';
$_lang["view"] = 'Просмотр';
$_lang["view_child_resources_in_container"] = 'Просмотр дочерних ресурсов';
$_lang["view_log"] = 'Просмотреть протокол';
$_lang["view_logging"] = 'Протокол системы управления';
$_lang["view_sysinfo"] = 'Системная информация';
$_lang["warning"] = 'Предупреждение';
$_lang["warning_not_saved"] =
    'Изменения не были сохранены. Вы можете остаться на этой странице для того, чтобы сохранить изменения (\'Отмена\'), либо покинуть ее, утеряв все изменения (\'OK\').';
$_lang["warning_visibility"] = 'Показывать предупреждения';
$_lang["warning_visibility_message"] = 'Показывать отчет о проверке конфигурации на странице приветствия менеджера';
$_lang["web_access_permissions"] = 'Права доступа для пользователей';
$_lang["web_access_permissions_user_groups"] = 'Группы пользователей';
$_lang["web_permissions"] = 'Права Пользователей';
$_lang["web_user_management_msg"] =
    '<b>Пользователи</b> - это зарегистрированные посетители сайта и менеджеры. <br /><br />Выберите веб-пользователя, настройки которого вы хотите редактировать, или создайте нового веб-пользователя.';
$_lang["web_user_management_title"] = 'Пользователи';
$_lang["web_user_management_select_role"] = 'Все роли';
$_lang["web_user_title"] = 'Создать / редактировать пользователя';
$_lang["web_users"] = 'Пользователи';
$_lang["weblink"] = 'Веб-ссылка';
$_lang["webpwdreminder_message"] =
    'Здесь вы можете создать сообщение, которое будет отсылаться пользователям, когда они запрашивают напоминание пароля. Письмо должно содержать имя пользователя и пароль.<br /><b>Примечание:</b> cледующие \'поля вывода\' отобразят соответствующие данные при отправлении письма: <br /><br />[+sname+] - название сайта, <br />[+saddr+] - e-mail адрес сайта, <br />[+surl+] - адрес (URL) сайта, <br />[+uid+] - имя пользователя или id пользователя, <br />[+pwd+] - пароль пользователя, <br />[+ufn+] - полное имя пользователя. <br /><br /><b>Убедитесь, что в сообщении присутствуют поля [+uid+] и [+pwd+], иначе пользователь не узнает свои имя пользователя и пароль</b>';
$_lang["webpwdreminder_title"] = 'Напоминание пароля:';
$_lang["websignupemail_message"] =
    'Здесь вы можете создать сообщение, которое будет отсылаться пользователям, когда создается учетная запись нового веб-пользователя. Письмо должно содержать имя пользователя и пароль.<br /><b>Примечание:</b> cледующие \'поля вывода\' отобразят соответствующие данные при отправлении письма: <br /><br />[+sname+] - название сайта, <br />[+saddr+] - e-mail адрес сайта, <br />[+surl+] - URL сайта, <br />[+uid+] - имя пользователя или id пользователя, <br />[+pwd+] - пароль пользователя, <br />[+ufn+] - полное имя пользователя. <br /><br /><b>Убедитесь, что в сообщении присутствуют поля [+uid+] и [+pwd+], иначе пользователь не узнает свои имя пользователя и пароль</b>';
$_lang["websignupemail_title"] = 'Регистрация пользователя:';
$_lang["allow_multiple_emails_title"] = 'Повторяющиеся e-mail у веб-пользователей';
$_lang["allow_multiple_emails_message"] =
    'Позволяет веб-пользователям использовать один и тот же адрес электронной почты для ситуаций, когда у члена может отсутствовать собственный адрес электронной почты или есть только один адрес электронной почты семейства.<br/>Примечание: Любые напоминания о пароле и логика регистрации должны учитывать этот параметр, если он установлен на \'Да\'.';
$_lang["wednesday"] = 'Среда';
$_lang["welcome_messages"] = 'В вашем ящике <b>%d</b> сообщений, из которых <b>%s</b> не прочитаны.';
$_lang["welcome_title"] = 'Добро пожаловать в систему управления сайтом';
$_lang["which_editor_message"] =
    'Выберите HTML-редактор. Вы также можете загрузить и установить редакторы из списка доступных на сайте Evolution CMS.';
$_lang["which_editor_title"] = 'Редактор:';
$_lang["working"] = 'Обработка данных...';
$_lang["wrap_lines"] = 'Переносить строки по ширине окна';
$_lang["xhtml_urls_message"] =
    'Если включен этот параметр, то все амперсанды (&) в ссылках будут заменены на конструкцию &<!-- -->amp; в соответствии с форматом XHTML.';
$_lang["xhtml_urls_title"] = 'Ссылки в формате XHTML:';
$_lang["yes"] = 'Да';
$_lang["you_got_mail"] = 'Новое сообщение';
$_lang["yourinfo_message"] = 'Этот раздел содержит некоторые данные о вас:';
$_lang["yourinfo_previous_login"] = 'Последняя авторизация:';
$_lang["yourinfo_role"] = 'Ваша роль:';
$_lang["yourinfo_title"] = 'Информация о вас';
$_lang["yourinfo_total_logins"] = 'Всего авторизаций:';
$_lang["yourinfo_username"] = 'Вы авторизованы как:';

$_lang["a17_error_reporting_title"] = 'Обнаружение уровня ошибки РНР';
$_lang["a17_error_reporting_msg"] = 'Набор обнаружения уровня ошибок РНР';
$_lang["a17_error_reporting_opt0"] = 'Игнорировать все';
$_lang["a17_error_reporting_opt1"] =
    'Игнорировать предупреждения о незначительных ошибках(<a href="https://www.google.com/search?q=E_DEPRECATED+E_STRICT" target="_blank">E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT</a>)';
$_lang["a17_error_reporting_opt2"] = 'Обнаружить все ошибки кроме E_NOTICE and E_USER_DEPRECATED';
$_lang["a17_error_reporting_opt99"] = 'Обнаружить все кроме E_USER_DEPRECATED';
$_lang["a17_error_reporting_opt199"] = 'Обнаружить все';

$_lang["pwd_hash_algo_title"] = 'Алгоритм шифрования';
$_lang["pwd_hash_algo_message"] = 'Алгоритм шифрования паролей.';

$_lang["enable_bindings_title"] = 'Разрешить @-привязки';
$_lang["enable_bindings_message"] =
    'Предотвращает исполнение PHP-кода через использование @-привязок в TV-параметрах. Требуется, если у вас есть пользователи, которые не должны иметь возможность создавать PHP-код, но могут создавать или редактировать TV-параметры. Вывод любого TV-параметра @-привязкой будет \'@-привязки запрещены\'.';
$_lang["enable_filter_title"] = 'Включить фильтры';
$_lang["enable_filter_message"] =
    'Фильтры позволяют управлять выходными данными, преобразовывая их прямо в теге внутри шаблона. Аналог PHx. <a href="https://github.com/modxcms/evolution/issues/623" target="ext_help">Больше информации</a>'; // todo: change link to documentation
$_lang["enable_filter_phx_warning"] = 'Когда плагин PHx включен, встроенные фильтры отключены по умолчанию';

$_lang["enable_at_syntax_title"] = 'Включить &lt;@SYNTAX&gt;';
$_lang["enable_at_syntax_message"] =
    '&lt;@SYNTAX&gt;(не рекомендуемый к использованию синтаксис). Добавляет поддержку условных операторов прямо в HTML коде';

$_lang["bkmgr_alert_mkdir"] = 'Файл не может быть создан. Проверьте права на папку assets/backup';
$_lang["bkmgr_restore_msg"] = '<p>Сайт может быть восстановлен с помощью файла SQL.</p>';
$_lang["bkmgr_restore_title"] = 'Восстановить';
$_lang["bkmgr_import_ok"] = 'SQL восстановление было выполнено нормально.';
$_lang["bkmgr_snapshot_ok"] = 'Резервная копия была сохранена.';
$_lang["bkmgr_run_sql_file_label"] = 'Выполнить SQL файл';
$_lang["bkmgr_run_sql_direct_label"] = 'Выполнить произвольную команду SQL';
$_lang["bkmgr_run_sql_submit"] = 'Отправить';
$_lang["bkmgr_run_sql_result"] = 'Результат';
$_lang["bkmgr_snapshot_title"] = 'Резервное копирование';
$_lang["bkmgr_snapshot_msg"] =
    '<p>Резервные копии сохраняются и восстанавливаются на сервер.<br />Путь для резервных копий: /assets/backup/</p>';
$_lang["bkmgr_snapshot_submit"] = 'Создать резервную копию';
$_lang["bkmgr_snapshot_list_title"] = 'Список резервных копий';
$_lang["bkmgr_restore_submit"] = 'Восстановить резервную копию';
$_lang["bkmgr_restore_confirm"] = 'Вы уверены, что хотите восстановить резервную копию\n[+filename+].  ?';
$_lang["bkmgr_snapshot_nothing"] = 'Нет резервных копий';

$_lang["files.dynamic.php1"] = 'Создать файл';
$_lang["files.dynamic.php2"] = 'files.dynamic.php2';
$_lang["files.dynamic.php3"] = 'files.dynamic.php3';
$_lang["files.dynamic.php4"] = 'files.dynamic.php4';
$_lang["files.dynamic.php5"] = 'Файл не может быть дублирован.';
$_lang["files.dynamic.php6"] = 'Файл или директория не могут быть переименованы.';
$_lang["files_dynamic_new_folder_name"] = 'Укажите новое имя для папки:';
$_lang["files_dynamic_new_file_name"] = 'Укажите новое имя для файла:';
$_lang["not_readable_dir"] = 'Директория недоступна для записи';
$_lang["confirm_delete_dir"] =
    'Вы уверены, что хотите удалить папку? \n\nЭто может вызвать проблемы с работой сайта. Удаляйте папку, только если вы на 100% уверены, что работа сайта не пострадает.';
$_lang["confirm_delete_dir_recursive"] =
    'Вы уверены, что хотите удалить папку со всем ее содержимым? \n\nЭто может вызвать проблемы с работой сайта. Удаляйте папку, только если вы на 100% уверены, что работа сайта не пострадает.';

$_lang["make_folders_title"] = 'Добавлять слэш к контейнеру';
$_lang["make_folders_message"] =
    'При использовании дружественных URL к ресурсу, который является контейнером, добавляется слэш.';

$_lang["check_files_onlogin_title"] = 'Проверять системные файлы на наличие изменений';
$_lang["check_files_onlogin_message"] =
    'При включении этой опции, важные системные файлы будут проверяться на наличие изменений, типичных для взломанных сайтов. Это не гарантирует полную защиту, но может помочь в предотвращении взлома.';

$_lang["configcheck_sysfiles_mod"] = 'Системные файлы были изменены.';
$_lang["configcheck_sysfiles_mod_msg"] =
    'Вы включили проверку системных файлов на наличие изменений, характерных для взломанных сайтов. Это не значит, что сайт был взломан, но желательно просмотреть измененные файлы.(index.php, .htaccess, [+MGR_DIR+]/index.php, [+MGR_DIR+]/includes/config.inc.php)';

$_lang['email_method_title'] = 'Метод отправки писем';
$_lang['email_method_mail'] = 'MAIL - cообщения отправляются с помощью функции mail().';
$_lang['email_method_smtp'] = 'Через SMTP-сервер';
$_lang['smtp_auth_title'] = 'SMTP авторизация';
$_lang['smtp_autotls_title'] = 'SMTPAutoTLS';
$_lang['smtp_host_title'] = 'Адрес SMTP-сервера';
$_lang['smtp_secure_title'] = 'Защита SMTP';
$_lang['smtp_username_title'] = 'SMTP почта';
$_lang['smtp_password_title'] = 'SMTP пароль';
$_lang['smtp_port_title'] = 'SMTP порт';

$_lang["setting_resource_tree_node_name"] = 'Название ресурса в дереве';
$_lang["setting_resource_tree_node_name_desc"] =
    'Выберите поле ресурса, которое будет использоваться в качестве названия ресурса в дереве. По умолчанию используется поле \'заголовок\'; можно использовать любое другое поле, например, \'пункт меню\', \'псевдоним\'.';
$_lang["setting_resource_tree_node_name_desc_add"] =
    'Внимание: Начиная с версии Evolution CMS 1.1 Вы можете изменить отображаемое имя ресурса через опцию \'Сортировать дерево\'. Этот параметр используется, если отображаемое имя в дереве ресурсов устанавливается на & &quot;По-умолчанию&quot;.';

$_lang["resource_opt_alvisibled"] = 'Участвует в URL';
$_lang["resource_opt_alvisibled_help"] =
    'Для участия данного документа в адресной строке поставьте галку, и наоборот - снимите, если псевдоним этого документа нужно убрать из URL.';
$_lang['resource_opt_is_published'] = 'Опубликован';
$_lang["docid_incrmnt_method_title"] = 'Способ добавления Resource ID ';
$_lang["docid_incrmnt_method_0"] = 'DB автоинкримент';
$_lang["docid_incrmnt_method_1"] = 'Минимальный пропущенный ID';
$_lang["docid_incrmnt_method_2"] = 'Максимальный ID+1';

$_lang["enable_cache_title"] = 'Способ кэширования';
$_lang["disable_chunk_cache_title"] = 'Отключить кэширование чанков';
$_lang["disable_snippet_cache_title"] = 'Отключить кэширование сниппетов';
$_lang["disable_plugins_cache_title"] = 'Отключить кэширование плагины';
$_lang["disabled_at_login"] = 'Отключить для администраторов';

$_lang["cache_type_title"] = 'Способ кэширования страниц ';
$_lang["cache_type_1"] = 'Только с учетом ID (стандартный метод)';
$_lang["cache_type_2"] = 'C учетом ID и $_GET';
$_lang["seostrict_title"] = 'Использовать SEO Strict URLs';
$_lang["seostrict_message"] = 'использование strict URLs удаляет дубли страниц по разным ссылкам';
$_lang["aliaslistingfolder_title"] = 'Использовать AliasListing только для Папок';
$_lang["full_aliaslisting_title"] = 'Выключить AliasListing для всех ресурсов';
$_lang["aliaslistingfolder_message"] =
    'Уменьшает потребление памяти и ускоряет работу сайта при большом количестве документов';

$_lang["settings_friendlyurls_alert"] =
    'Для использования дружественных URL, необходимо сменить имя файла ht.access в папке, в которую установлена Evolution CMS, на .htaccess.';
$_lang["settings_friendlyurls_alert2"] =
    'При установке Evolution CMS в подпапку необходимо внести изменения в файл .htaccess.';

$_lang["user_street"] = 'Улица';
$_lang["user_city"] = 'Город';
$_lang["user_other"] = 'Другое';

$_lang["mutate_settings.dynamic.php6"] = 'Уведомления о системных ошибках';
$_lang["mutate_settings.dynamic.php7"] = 'Не уведомлять';
$_lang["mutate_settings.dynamic.php8"] =
    'Уведомления приходят на <b>[+emailsender+]</b> (задается настройкой [(emailsender)]) в момент генериции ошибки. Детали можно увидеть в журнале ошибок.';

$_lang["error_no_privileges"] = "У вас нет соответствующих прав для выполнения данного действия.";
$_lang["error_no_optimise_tablename"] = "Нет таблиц требующих оптимизации!";
$_lang["error_no_truncate_tablename"] = "Таблица для очистки не найдена!";
$_lang["error_double_action"] = "Двойное действие (GET & POST) отправленно!";
$_lang["error_no_id"] = "Не верно указан ID в вашем запросе!";
$_lang["error_id_nan"] = "ID переданного запроса пуст!";
$_lang["error_parent_deleted"] = "Не удалось выполнить, потому что родитель отмечен как удаленный!";
$_lang["error_no_parent"] = "Не удалось найти имя родительского документа!";
$_lang["error_many_results"] = "Слишком много результатов возвращается из базы данных!";
$_lang["error_no_results"] = "Результаты из базы данных не вернулись или вернулись не полностью!";
$_lang["error_no_user_selected"] = "Не указан получатель этого сообщения!";
$_lang["error_no_group_selected"] = "Не указанна группа получателей для этого сообщения!";
$_lang["error_movedocument1"] = "Документ не может быть своим родителем!";
$_lang["error_movedocument2"] = "ID документа не прошел в запросе!";
$_lang["error_movedocument3"] = "Новый родитель не указан!";
$_lang["error_internet_connection"] = "Сервер недоступен, проверьте подключение к интернету!";

$_lang["login_processor_unknown_user"] = "Неверно указан логин или пароль!";
$_lang["login_processor_wrong_password"] = "Неверно указан логин или пароль!";
$_lang["login_processor_many_failed_logins"] = "Очень много неудачных попыток войти, вы заблокированы!";
$_lang["login_processor_verified"] = "Вам необходимо подтвердить себя!";
$_lang["login_processor_blocked1"] = "Вы заблокированы и не можете войти!";
$_lang["login_processor_blocked2"] = "Вы заблокированы и не можете войти! Попробуйте войти позже.";
$_lang["login_processor_blocked3"] = "Вы заблокированы автоматические после указанной даты, и вы не можете войти!";
$_lang["login_processor_bad_code"] = "Проверочный код введен не правильно! Попробуйте еще раз!";
$_lang["login_processor_remotehost_ip"] = "Ваше имя хоста не указывает на ваш IP!";
$_lang["login_processor_remote_ip"] = "Вы не можете войти в систему с этого места.";
$_lang["login_processor_date"] = "Вы не можете сейчас войти. Пожалуйста, повторите попытку позже.";
$_lang["login_processor_captcha_config"] = "Капча не настроенна должным образом.";

$_lang["dp_dayNames"] = "['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота']";
$_lang["dp_monthNames"] =
    "['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь']";
$_lang["dp_startDay"] = "1";

$_lang["check_all"] = "Включить все";
$_lang["check_none"] = "Выключить все";
$_lang["check_toggle"] = "Переключить";

$_lang["version_notices"] = "Уведомления о версиях";

$_lang["em_button_shift"] = "(Shift + клик, чтобы открыть несколько окон)";

$_lang["reset_sysfiles_checksum_button"] = "Обновить контрольную сумму";
$_lang["reset_sysfiles_checksum_alert"] = "Вы уверены, что хотите сбросить контрольную сумму системных файлов?";

$_lang["file_browser_disabled_msg"] = "Фаил-браузер отключен.";
$_lang["which_browser_default_title"] = "Файл-браузер по умолчанию";
$_lang["which_browser_default_msg"] =
    "Укажите Фаил-браузер по умолчанию. В настройках менеджеров вы можете указать фаил-браузер отличный от системного.";
$_lang["which_browser_title"] = "Файл-браузер";
$_lang["which_browser_msg"] = "Вы можете выбрать фаил-браузер для этого пользователя. Или оставьте по умолчанию";
$_lang["option_default"] = "По умолчанию";
$_lang["position"] = "Позиция";
$_lang["are_you_sure"] = "Вы уверены?";

$_lang['evo_downloads_title'] = "Ссылки на скачивание Evolution CMS";
$_lang['help_translating_title'] = "Помочь с переводом Evolution CMS";
$_lang['download'] = "Скачать";
$_lang['downloads'] = "Загрузки";
$_lang["previous_releases"] = "Предыдущий релиз";
$_lang["extras"] = "Дополнения";

$_lang["display_locks"] = "Отображать блокировки";
$_lang["role_display_locks"] = "Отображать блокировки";
$_lang["session_timeout"] = "Тайм-аут сессии";
$_lang["session_timeout_msg"] =
    "Evolution CMS будет пинговать сервер раз в минуту, чтобы обновить сеанс (сессию). Если последний пинг превышает этот параметр, связанный с ним сеанс будет считаться недействительным, и все связанные с ним блокировки будут автоматически удалены. Установленное значение в минутах (> 2мин, по умолчанию 15мин).";
$_lang["unlock_element_id_warning"] = "Вы уверенны что хотите разблокировать [+element_type+] (ID [+id+])?";
$_lang["lock_element_type_1"] = "Шаблон";
$_lang["lock_element_type_2"] = "Template-Variable";
$_lang["lock_element_type_3"] = "Чанк";
$_lang["lock_element_type_4"] = "Сниппет";
$_lang["lock_element_type_5"] = "Плагин";
$_lang["lock_element_type_6"] = "Модуль";
$_lang["lock_element_type_7"] = "Ресурс";
$_lang["lock_element_type_8"] = "Роль";
$_lang["lock_element_editing"] = "Вы редактируете  [+element_type+] с \n[+lasthit_df+]";
$_lang["lock_element_locked_by"] = "Этот [+element_type+] заблокирован пользователем [+username+], с ";

$_lang["minifyphp_incache_title"] = 'Сжать код php в файле кэша';
$_lang["minifyphp_incache_message"] =
    'Сжатие PHP кода(снипетов и плагинов) и сохранение в фаил кэша, реф:<a href="https://github.com/modxcms/evolution/issues/938" target="_blank">#938</a> ';

$_lang["logout_reminder_msg"] =
    "Напоминание: Похоже [+date+] Вы забыли выйти из системы. Пожалуйста, обратите внимание в будущем, нужно выходить из системы после того как закончили работу.";

$_lang["allow_eval_title"] = "Использование функции EVAL ";
$_lang["allow_eval_msg"] = "Для разработчиков: используйте \$modx-&gt;safeEval().";
$_lang["allow_eval_with_scan"] = "Выполнять только разрешенные функции указанные ниже";
$_lang["allow_eval_with_scan_at_post"] = "Разрешенны все. Но при POST только указанные ниже";
$_lang["allow_eval_everytime_eval"] = "Разрешены все (использовать только для отладки)";
$_lang["allow_eval_dont_eval"] = "Не показывать все функции";

$_lang["safe_functions_at_eval_title"] = "Разрешенные функции в EVAL";
$_lang["safe_functions_at_eval_msg"] = "Список разделенный запятыми";

$_lang["multiple_sessions_msg"] =
    "Информация: Несколько активных сессий (всего [+total+]) найдено для пользователя <b>[+username+]</b>.";
$_lang["iconv_not_available"] =
    "Важно установить/включить расширение iconv. Пожалуйста, свяжитесь со своим провайдером, если Вы не знаете, как его включить.";

$_lang["cm_create_new_category"] = "Создать новую категорию";
$_lang["cm_category_name"] = "Название категории";
$_lang["cm_category_position"] = "Позиция категории";
$_lang["cm_no_x_assigned"] = "
Не <b>%s</b> присвоено";
$_lang["cm_save_categorization"] = "Сохранить список категорий";
$_lang["cm_update_categories"] = "Обновить категории";
$_lang["cm_assigned_elements"] = "Назначенные элементы";
$_lang["cm_edit_name"] = "Редактировать имя";
$_lang["cm_mark_for_deletion"] = "Отметить к удалению";
$_lang["cm_delete_now"] = "Удалить немедленно";
$_lang["cm_delete_element_x_now"] = "
Удалить <b>%s</b> немедленно";
$_lang["cm_select_element_group"] = "Выбрать элемент группы";
$_lang["cm_global_messages"] = "Глобальные сообщения";
$_lang["cm_add_new_category"] = "Добавить новую категорию";
$_lang["cm_edit_categories"] = "Редактировать категории";
$_lang["cm_sort_categories"] = "Сортировать категории";
$_lang["cm_categorize_elements"] = "Классифицировать элементы";
$_lang["cm_translation"] = "Перевод";
$_lang["cm_translations"] = "Переводы";
$_lang["cm_categorize_x"] = "Классифицировать <b>%s</b>";
$_lang["cm_unknown_error"] = "Что-то пошло не так.";
$_lang["cm_x_assigned_to_category_y"] = "<b>%s (%s)</b> присвоено категории <b>%s</b>";
$_lang["cm_no_categorization"] = "Классификация не производилась.";
$_lang["cm_no_changes"] = "Нечего менять, поэтому изменений не было.";
$_lang["cm_x_changes_made"] = "<b>%s</b> изменений сделано";
$_lang["cm_enter_name_for_category"] = "Пожалуйста введите имя для новой категории";
$_lang["cm_category_x_exists"] = "Категория <b>%s</b> уже существует.";
$_lang["cm_category_x_saved_at_position_y"] = "Новая категория <b>%s</b> сохранена на позиции <b>%s</b>.";
$_lang["cm_category_x_moved_to_position_y"] = "Категория <b>%s</b> перемещена к позиции <b>%s</b>";
$_lang["cm_category_x_deleted"] = "Категория <b>%s</b> удалена";
$_lang["cm_category_x_renamed_to_y"] = "Категория <b>%s</b> переименована в <b>%s</b>";
$_lang["cm_translation_for_x_empty"] = "Перевод для <b>%s</b> пуст";
$_lang["cm_translation_for_x_to_y_success"] = "Перевод для <b>%s</b> к <b>%s</b> успешно сохранен";
$_lang["cm_save_new_sorting"] = "Сохранить новую сортировку";
$_lang["cm_translate_phrases"] = "Перевести фразы";
$_lang["cm_translate_module_phrases"] = "Перевести фразы модуля";
$_lang["cm_native_phrase"] = "Родная фраза";

$_lang["btn_view_options"] = 'Показать параметры';
$_lang["view_options_msg"] =
    'Отображение и перечисление элементов можно настроить с помощью кнопки \'Просмотр параметров\'. Настройки сохраняются и восстанавливаются в каждом браузере с помощью локального хранилища HTML5.';
$_lang["viewopts_title"] = 'Показать параметры';
$_lang["viewopts_cb_buttons"] = 'Кнопки';
$_lang["viewopts_cb_descriptions"] = 'Описания';
$_lang["viewopts_cb_icons"] = 'Иконки';
$_lang["viewopts_radio_list"] = 'Список';
$_lang["viewopts_radio_inline"] = 'Инлайн';
$_lang["viewopts_radio_flex"] = 'Флекс';
$_lang["viewopts_fontsize"] = 'Размер шрифта';
$_lang["viewopts_cb_alltabs"] = 'Все табы';

$_lang['email_sender_method'] = 'Адрес возврата';
$_lang['auto'] = 'Определять автоматически';
$_lang['use_emailsender'] = 'Использовать значение [(emailsender)]';
$_lang['email_sender_method_message'] =
    'Адрес возврата сообщения. Используется в заголовке Return-Path и определяет адрес, на который будут отправлены сообщения о невозможности доставки. Автоопределение будет работать в большинстве случаев.';

$_lang['login_form_position_title'] = 'Положение формы авторизации';
$_lang['login_form_position_left'] = 'Слева';
$_lang['login_form_position_center'] = 'По центру';
$_lang['login_form_position_right'] = 'Справа';
$_lang["login_form_style"] = 'Стиль формы авторизации:';
$_lang["login_form_style_dark"] = 'Тёмный';
$_lang["login_form_style_light"] = 'Светлый';
$_lang['login_logo_title'] = 'Логотип на странице авторизации';
$_lang['login_logo_message'] = 'Рекомендованный размер логотипа по ширине: 360px, тип .png';
$_lang['login_bg_title'] = 'Фоновое изображение на странице авторизации';
$_lang['login_bg_message'] = 'Рекомендованный размер фонового изображения по ширине: 1920px';

$_lang['manager_menu_position_title'] = 'Расположение основного меню';
$_lang['manager_menu_position_top'] = 'Сверху';
$_lang['manager_menu_position_left'] = 'Слева';

$_lang['invalid_event_response'] = 'Событие <b>%s</b> вернуло неверный результат';

$_lang['chunk_processor'] = 'Класс обработки чанков';

$_lang["permission_title"] = 'Создать / редактировать право доступа';
$_lang["groups_permission_title"] = 'Создать / редактировать категорию';
$_lang["lang_key_desc"] = 'Ключ языка из массива $_lang';
$_lang["key_desc"] = 'Ключь для проверки доступа';

$_lang["role_no_tv"] = 'Этой роли еще не присвоены параметры.';
$_lang["role_notassigned_tv"] = 'Эти параметры доступны для выбора.';
$_lang["role_tv_msg"] = 'Ниже выводятся параметры, назначенные этой роли.';
$_lang["tmplvar_roles_access_msg"] = 'Укажите роли, которые могут использовать этот Параметр (TV)';

$_lang["setting_from_file"] =
    '<strong class="text-danger">Значение параметра задано в core/custom/config/cms/settings</strong>';
$_lang['disable'] = 'Отключить';
$_lang['enable'] = 'Включить';

return $_lang;
